<?php

namespace App\Http\Livewire\Ingredients;

use Livewire\Component;
use App\Models\Ingredients_user;
use Illuminate\Support\Facades\Auth;
use DB;

class MyIngredient extends Component
{
    public $user_id;
    public $myIngredients;
    public $selectedTypes = [];
    // public $selectAllTypes=false;
    // public $bulkDisabled=true;

    public function mount(){
        // $this->bulkDisabled= count($this->selectedType) < 1;

        // 2* get the user Id 
        $this->user_id= Auth::user()->id;
         // 3*get the ingredients id's ,that the user has.
         
         $this->myIngredients=DB::table('ingredients_users')->where('user_id',$this->user_id)
            ->join('ingredients', 'ingredients.id', '=', 'ingredients_users.ingredient_id')
            ->select(
                'ingredients_users.id',
                'ingredients_users.amount',
                'ingredients_users.unit',
                'ingredients_users.date',
                'ingredients_users.created_at',
                'ingredients.name',
                'ingredients.image',
                'ingredients.apiIngredientId'
            )
            ->get();

        
            // get an array of apiIngredientId's
        
            //     $this->myapiIngredientId = DB::table('ingredients_users')
        //         ->where('user_id',$this->user_id)
        //         ->join('ingredients', 'ingredients.id', '=', 'ingredients_users.ingredient_id')
        //         ->pluck('ingredients.apiIngredientId')
        //         ->toArray();
        //     //  ---- PREFILL!!! ----
	    // 	// use the ids as the keys
	    // 	// fill the values with true so all the checkboxes are checked
	    // 	$this->selectedType = array_fill_keys($this->myapiIngredientId, false);
        //     // dd($this->selectedType);
                
        // // dd($this->myapiIngredientId);
    
    }
    public function render()
    {
        return view('livewire.ingredients.my-ingredient');
    }

    public function getRecipesIngredients(){
        // dd($this->selectedTypes);
        $this->selectedTypes =[];
        // $this->selectAllTypes =false;
    }

    // public function updatedSelectAllTypes($value){
    //     if($value){
    //     $this->selectedType = DB::table('ingredients_users')
    //     ->where('user_id',$this->user_id)
    //     ->join('ingredients', 'ingredients.id', '=', 'ingredients_users.ingredient_id')
    //     ->pluck('ingredients.apiIngredientId')
    //     ->toArray();
    //     }else{
    //         $this->selectedType =[];
    //     }

    // }
}
            
               
