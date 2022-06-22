<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\IngredientsUser;
use DB;

class BtnUseRecipe extends Component
{
    public $extendedIngredients;

    public function mount($recipeIngredients)
    {
        $this->extendedIngredients=$recipeIngredients;
        return $this->extendedIngredients;
    }
  
    public function useRecipe(){
        $user_id= Auth::user()->id;
        $myIngredientsId = DB::table('ingredients_users')->where('user_id',$user_id)->pluck('ingredient_id')->toArray();
        
        foreach($this->extendedIngredients as $recipeIngredient){
            //  Recipe's ingredient : get id as apiIngredientId amout as amountRecipe unitShort as unitRecipe
            $apiIngredientId = $recipeIngredient['id'];
            $userIngredientName=$recipeIngredient['name'];
            $amountRecipe= $recipeIngredient['measures']['metric']['amount'] ;
            $unitRecipe= $recipeIngredient['measures']['metric']['unitShort'] ;
            // From table ingredients in the database get the id's value using apiIngredientId  
            $ingredient_id= DB::table("ingredients")
            ->where('apiIngredientId',$apiIngredientId)
            ->value('id');
            
            //  check of the user has the ingredient
            if (in_array($ingredient_id, $myIngredientsId)){
            	
                //  get user's ingredient from database
                $userIngredient = DB::table("ingredients_users")
                                ->where('user_id',Auth::user()->id)
                                ->where('ingredient_id',$ingredient_id)
                                ->get();
                //  get user's ingredient amount and unit from database
                foreach ($userIngredient as $ingredient){
                    $userIngredientId=$ingredient->id;
                    $userIngredientUnit = $ingredient->unit;
                    $userIngredientAmount = $ingredient->amount;
                }
               if($unitRecipe == "g" || $unitRecipe =="ml" || $unitRecipe =="pieces" ){
                    if( $unitRecipe = $userIngredientUnit){
                        if($amountRecipe < $userIngredientAmount){
                            $userIngredientAmount=$userIngredientAmount-$amountRecipe;
                            IngredientsUser::where('id' , $userIngredientId)->update([
                                'amount' => $userIngredientAmount,
                                ]
                            );
                        }
                        else{
                            $message="you dont have enough ".$userIngredientName." to do that recipe";
                        }
                    }
                    else{
                        $message="you ingredient".$userIngredientName." have the wrong unit , must be ".$userIngredientUnit;                        
                        return $message;                     
                    }
               }
               else{
                    if($unitRecipe == "kg" ){
                       $unitRecipe="g";
                       $amountRecipe=$amountRecipe*1000;
                            if( $unitRecipe = $userIngredientUnit){
                                if($amountRecipe < $userIngredientAmount){
                                    $userIngredientAmount=$userIngredientAmount-$amountRecipe;
                                    IngredientsUser::where('id' , $userIngredientId)->update([
                                        'amount' => $userIngredientAmount,
                                        ]
                                    );
                                }
                                else{
                                    $message="you dont have enough ".$userIngredientName." to do that recipe";
                                }
                            }
                            else{
                                $message="you ingredient".$userIngredientName." have the wrong unit , must be ".$userIngredientUnit;                        
                                return $message;                     
                            }
                    }
                    elseif($unitRecipe == "L" ){
                        $unitRecipe="ml";
                        $amountRecipe=$amountRecipe*1000;
                            if( $unitRecipe = $userIngredientUnit){
                                    if($amountRecipe < $userIngredientAmount){
                                        $userIngredientAmount=$userIngredientAmount-$amountRecipe;
                                        IngredientsUser::where('id' , $userIngredientId)->update([
                                            'amount' => $userIngredientAmount,
                                            ]
                                        );
                                    }
                                    else{
                                        $message="you dont have enough ".$userIngredientName." to do that recipe";
                                    }
                            }
                            else{
                                $message="you ingredient".$userIngredientName." have the wrong unit , must be ".$userIngredientUnit;                        
                                return $message;                     
                            }
                    }
                    else{
                        $message="you dont have enough ".$userIngredientName." to do that recipe";    
                    }
               }
            }
        }

    }
}
