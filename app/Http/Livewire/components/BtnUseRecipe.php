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
    
    public $missedIngredientNames;
    public $notEnoughArrayName;
    public $afterUsingIngNames;
    public $wrongUnitKey;
    public $wrongUnitValue;
    public $messageWrongUnit;
    public $messageAmountArray;
    
    public $missedIngredient=[];
    public $amountArray=[];
    public $wrongUnitArray=[];
    public $notEnoughArray=[];
    public $afterUsing=[];

    public function mount($recipeIngredients)
    {
        $this->extendedIngredients=$recipeIngredients;
        return $this->extendedIngredients;
    }
  
    public function useRecipe(){
        //Get user's list of avaiable ingredient ids
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

                //change unit type to pieces if needed
                if($unitRecipe=="" || $unitRecipe=="large" ){
                    $unitRecipe="pieces";
                }

                //check if the right unit is used if not try to fix it
                if($unitRecipe == "g" || $unitRecipe =="ml" || $unitRecipe =="pieces" ){
                        //check if the unit type of the database equals that of the api
                        if( $unitRecipe == $userIngredientUnit){
                            //check if the amount of the ingredient is enough
                            if($amountRecipe <= $userIngredientAmount){
                                //calculate new amount of this ingredient and prepare an array to be send
                                $userIngredientAmountNew=$userIngredientAmount-$amountRecipe;
                                $this->amountArray += [ $userIngredientId => $userIngredientAmountNew ];
                            }
                            else{ //if amount is not enough put this ingredient in the error array
                                array_push($this->notEnoughArray, $userIngredientName); 

                            }
                        }
                        else{ //if the unit type is not correct put this ingredient in the error array
                            $this->wrongUnitArray += [ $userIngredientName => $unitRecipe ];
                                                
                        }
                }
                else{ //if the unit type is not supported try to change it to a supported one
                        //kg fix (structure is the same as above so see there for more clear commenting)
                        if($unitRecipe == "kg" ){
                            $unitRecipe="g";
                            $amountRecipe=$amountRecipe*1000;
                                if( $unitRecipe == $userIngredientUnit){
                                    if($amountRecipe <= $userIngredientAmount){
                                        $userIngredientAmountNew=$userIngredientAmount-$amountRecipe;
                                        $this->amountArray += [ $userIngredientId => $userIngredientAmountNew ];
                                    }
                                    else{
                                        array_push($this->notEnoughArray, $userIngredientName);                   
                                    }
                                }
                                else{
                                    $this->wrongUnitArray += [ $userIngredientName => $unitRecipe ];                  
                                }
                        }
                        //L fix (structure is the same as above so see there for more clear commenting)
                        elseif($unitRecipe == "L" ){
                            $unitRecipe="ml";
                            $amountRecipe=$amountRecipe*1000;
                                if( $unitRecipe == $userIngredientUnit){
                                        if($amountRecipe <= $userIngredientAmount){
                                            $userIngredientAmountNew=$userIngredientAmount-$amountRecipe;
                                            $this->amountArray += [ $userIngredientId => $userIngredientAmountNew ];
                                        }
                                        else{
                                            array_push($this->notEnoughArray, $userIngredientName);                 
                                        }
                                }
                                else{
                                    $this->wrongUnitArray += [ $userIngredientName => $unitRecipe ];                                      
                                }
                        }
                        else{ array_push($this->afterUsing, $userIngredientName);                            
                        }
                }
            }  
            else{ //if the user doesnt have this ingredient in the database put into error array
                array_push($this->missedIngredient, $userIngredientName);  
            }          
        } // end for each
        
        //check if any ingredients were missing
        if($this->missedIngredient){
            foreach($this->missedIngredient as $string) {
                $this->missedIngredientNames .= $string." - ";
            }
            //construct missing ingredients message
            $message="you need: -".$this->missedIngredientNames;
             $this->dispatchBrowserEvent('swal:modal',[
                'type' => 'error',
                'title' => 'You can not use this recipe!',
                'text' => $message,
            
            ]); 
        }
        //check if any ingredients still have the wrong unit
        elseif($this->wrongUnitArray){
            foreach($this->wrongUnitArray as $key => $value) {
                $this->wrongUnitKey .= $key." - ";
                $this->wrongUnitValue .= $value." - ";
            }
            //construct wrong unit message
            $this->messageWrongUnit="your ingredient -".$this->wrongUnitKey." have the wrong unit must be -".$this->wrongUnitValue;
            $this->dispatchBrowserEvent('swal:modal',[
                'type' => 'error',
                'title' => 'The wrong unit',
                'text' => $this->messageWrongUnit,
            ]);   
        }
        //check if any ingredients dont have the right amount            
        elseif($this->notEnoughArray){
            foreach($this->notEnoughArray as $string) {
                $this->notEnoughArrayName .= $string." - ";
            }
            //construct not enough message
            $message="you need: -".$this->notEnoughArrayName;
             $this->dispatchBrowserEvent('swal:modal',[
                'type' => 'error',
                'title' => 'You dont have enough to do that recipe',
                'text' => $message,
            ]); 
        }
        //all clear start putting data in database
        elseif($this->amountArray){
            //update user ingredients amounts
            foreach($this->amountArray as $key => $value) {
                IngredientsUser::where('id' , $key)
                                    ->update([
                                        'amount' => $value,
                                    ]);
            }
            //if we dont have the unit type tell user to update manually
            if($this->afterUsing){
                foreach($this->afterUsing as $string) {
                    $this->afterUsingIngNames .= $string." - ";
                }
                $message="Edit after using: -".$this->afterUsingIngNames;
                 $this->dispatchBrowserEvent('swal:modal',[
                    'type' => 'info',
                    'title' => 'How much did you used for that recipe?',
                    'text' => $message,
                ]); 
                
            }
            else{ //if no problems success message
                 $this->dispatchBrowserEvent('swal:modal',[
                    'type' => 'success',
                    'title' => 'Data update successfully',
                ]); 
            }
        }   
    }
}
