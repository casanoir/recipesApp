<?php

namespace App\Http\Livewire\Ingredients;

use Livewire\Component;
use App\Models\IngredientsUser;
use Illuminate\Support\Facades\Auth;
use DB;
use Livewire\WithPagination;

class MyIngredient extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 15;
    public $sortField = 'ingredients.name';
    public $sortAsc = true;
    public $selected = [];

    public function showIngredientInfo($ingredientId)
    {
        //
        
    }
  

    public function deleteIngredient($ingredientId)
	{
        
		$ingredient = DB::table("ingredients_users")
                                ->where('user_id',Auth::user()->id)
                                ->where('ingredient_id',$ingredientId)
                                ->delete();
       
                                $this->dispatchBrowserEvent('swal:modal',[
            'type' => 'success',
            'title' => 'Ingredient deleted successfully',
            'text' => '',
        ]);
                                
	}




    public function searchRecipes()
    {
        dd($this->selected);
    }
    
    
    public function render()
    {
        return view('livewire.ingredients.my-ingredient', [
            'myIngredients' => IngredientsUser::search($this->search)
                ->where('user_id',Auth::user()->id)
                ->join('ingredients', 'ingredients.id', '=', 'ingredients_users.ingredient_id')
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage),
                
        ]);
    }

}     
               
