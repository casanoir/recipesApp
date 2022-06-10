<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Ingredients_user;
use DB;

class AddIngredientModal extends Component
{
    public $ingredientId;
    public $units=['g','ml','pieces'];

    public $unit;
    public $amount;
    public $date;
    
    protected $listeners =[
        'emitIngredientId'=>'update',
    ];
        
    // Update Method nested with Ingredient Info Blade ->check ingeredient in the database
    public function update($ingredientId){
        $this->ingredientId=$ingredientId;
        return $this->ingredientId;
    }

    // store the data to the database "Create ingredients_user"
    public function submit(){

        // check the input fields
        $this->validate([
            // 'user_id' => 'required|nullable',
            // 'ingredient_id' => 'required|nullable',
            'unit' => 'required',
            'amount' => 'required ',
        ]);
    
        $this->data=[
            'user_id' => Auth::id(),
            'ingredient_id' => $this->ingredientId,
            'unit' => $this->unit,
            'amount' => $this->amount,
            'date' => $this->date,
        ];
        // Add the ingredient to the user
        Ingredients_user::create($this->data
        );

        // update the btnAction to edit 
        $this->emit('refreshBtnAction');

        // Sweet Alert
        $this->dispatchBrowserEvent('swal:modal',[
            'type' => 'success',
            'title' => 'Ingredient added successfully',
            'text' => '',
        ]);

        // reset the input fields
        $this->resetInput();

    }

    // reset the from after submit
    private function resetInput()
    {
        $this->unit = null;
        $this->date = null;
        $this->amount = null;
    }
    
    
}
