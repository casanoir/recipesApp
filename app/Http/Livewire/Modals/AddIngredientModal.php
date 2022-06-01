<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Ingredients_user;
use App\Http\Livewire\Modals\AddIngredientModal;
use DB;

class AddIngredientModal extends Component
{
    public $apiIngredientId;
    public $ingredientId;
    public $units;
    public $unit;
    public $amount;
    public $date;
    

    public function mount($apiIngredientId,$units){
        $this->ingredientId = DB::table('ingredients')->where('apiIngredientId',$apiIngredientId)->value('id');
    }
    public function render()
    {
        return view('livewire.modals.add-ingredient-modal');
    }
    private function resetInput()
    {
        $this->unit = null;
        $this->date = null;
        $this->amount = null;
    }
    public function submit(){
    
        Ingredients_user::create([
            'user_id' => Auth::id(),
            'ingredient_id' => $this->ingredientId,
            'unit' => $this->unit,
            'amount' => $this->amount,
            'date' => $this->date,
            ]
        );
        $this->resetInput();

    
    }
}
