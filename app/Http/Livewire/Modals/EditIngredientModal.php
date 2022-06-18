<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use App\Models\IngredientsUser;
use Illuminate\Support\Facades\Auth;
use DB;


class EditIngredientModal extends Component
{
    public $ingredientId;
    public $units=['g','ml','pieces'];
    public $ingredientUserData;
    public $ingredientUserId;
    public $unit;
    public $amount;
    public $date;

    protected $listeners =[
        'emitIngredientId'=>'update',
    ];

    public function mount($ingredientId){
        $this->ingredientId=$ingredientId;
        $this->update($ingredientId);

    }

    public function render()
    {
        return view('livewire.modals.edit-ingredient-modal');
    }
    
   
        
    // Update Method nested with Ingredient Info Blade ->check ingeredient in the database
    public function update($ingredientId){
        $this->ingredientId=$ingredientId;
        $this->ingredientUserData= DB::table('ingredients_users')->where('user_id',Auth::user()->id)
                                ->where('ingredient_id',$ingredientId)
                                ->get();
        $this->ingredientUserId=$this->ingredientUserData[0]->id;
        $this->unit=$this->ingredientUserData[0]->unit;
        $this->amount=$this->ingredientUserData[0]->amount;
        $this->date=$this->ingredientUserData[0]->date;
        
        return $this->ingredientUserData;
    }

    // store the data to the database "Create ingredients_user"
    public function edit($ingredientUserId){

        // check the input fields
        $this->validate([
            'unit' => 'required',
            'amount' => 'required ',
        ]);
    
        // Add the ingredient to the user
        IngredientsUser::where('id' , $ingredientUserId)->update([
            'user_id' => Auth::id(),
            'ingredient_id' => $this->ingredientId,
            'unit' => $this->unit,
            'amount' => $this->amount,
            'date' => $this->date,
            ]
        );

        // Sweet Alert
        $this->dispatchBrowserEvent('swal:modal',[
            'type' => 'success',
            'title' => 'Ingredient edited successfully',
            'text' => '',
        ]);

    }

}
