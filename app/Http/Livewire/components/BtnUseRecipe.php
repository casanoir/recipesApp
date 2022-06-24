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
    public $afterUsing=[];
    public $afterUsingIngNames;

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
                if($unitRecipe=="" || $unitRecipe=="large" ){
                    $unitRecipe="pieces";
                }
                if($unitRecipe == "g" || $unitRecipe =="ml" || $unitRecipe =="pieces" ){
                        if( $unitRecipe == $userIngredientUnit){
                            if($amountRecipe <= $userIngredientAmount){
                                $userIngredientAmountNew=$userIngredientAmount-$amountRecipe;
                                IngredientsUser::where('id' , $userIngredientId)
                                ->update([
                                    'amount' => $userIngredientAmountNew,
                                ]);
                            }
                            else{
                                $messageNotEnough="You dont have enough ".$userIngredientName." to do that recipe ";                     
                            }
                        }
                        else{                   
                            $messageWrongUnit="You ingredient -".$userIngredientName."- have the wrong unit must be -".$userIngredientUnit."-";                     
                        }
                }
                else{
                        if($unitRecipe == "kg" ){
                            $unitRecipe="g";
                            $amountRecipe=$amountRecipe*1000;
                                if( $unitRecipe == $userIngredientUnit){
                                    if($amountRecipe <= $userIngredientAmount){
                                        $userIngredientAmountNew=$userIngredientAmount-$amountRecipe;
                                        IngredientsUser::where('id' , $userIngredientId)
                                        ->update([
                                            'amount' => $userIngredientAmountNew,
                                        ]);
                                    }
                                    else{
                                        $messageNotEnough="You dont have enough ".$userIngredientName." to do that recipe.";                      
                                    }
                                }
                                else{
                                    $messageWrongUnit="You ingredient -".$userIngredientName."- have the wrong unit must be -".$userIngredientUnit."-";                     
                                }
                        }
                        elseif($unitRecipe == "L" ){
                            $unitRecipe="ml";
                            $amountRecipe=$amountRecipe*1000;
                                if( $unitRecipe == $userIngredientUnit){
                                        if($amountRecipe <= $userIngredientAmount){
                                            $userIngredientAmountNew=$userIngredientAmount-$amountRecipe;
                                            IngredientsUser::where('id' , $userIngredientId)
                                            ->update([
                                                'amount' => $userIngredientAmountNew,
                                            ]);  
                                        }
                                        else{
                                            $messageNotEnough="You dont have enough ".$userIngredientName." to do that recipe";                  
                                        }
                                }
                                else{
                                    $messageWrongUnit="You ingredient -".$userIngredientName."- have the wrong unit must be -".$userIngredientUnit."-";                                         
                                }
                        }
                        else{        array_push($this->afterUsing, $userIngredientName);                            
                        }
                }
                if(isset($messageNotEnough)){
                    $message=$messageNotEnough;
                    return $this->dispatchBrowserEvent('swal:modal',[
                        'type' => 'error',
                        'title' => $message,
                        'text' => '',
                    ]);   
                }elseif(isset($messageWrongUnit)){
                    $message=$messageWrongUnit;
                    return $this->dispatchBrowserEvent('swal:modal',[
                        'type' => 'error',
                        'title' => $message,
                    ]);   
                }
            }            
        }
        // end for each
        if(isset($this->afterUsing)){
            foreach($this->afterUsing as $string) {
                $this->afterUsingIngNames .= $string." - ";
            }
            $message="Edit after using: -".$this->afterUsingIngNames;
            return $this->dispatchBrowserEvent('swal:modal',[
                'type' => 'info',
                'title' => 'How much did you used for that recipe?',
                'text' => $message,
            ]); 
        }
    }
}
