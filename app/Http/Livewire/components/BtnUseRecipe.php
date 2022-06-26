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
                else{
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
                        else{        array_push($this->afterUsing, $userIngredientName);                            
                        }
                }
            }  
            else{
                array_push($this->missedIngredient, $userIngredientName);  
            }          
        }
        // end for each
        if($this->missedIngredient){
            foreach($this->missedIngredient as $string) {
                $this->missedIngredientNames .= $string." - ";
            }
            $message="you need: -".$this->missedIngredientNames;
             $this->dispatchBrowserEvent('swal:modal',[
                'type' => 'error',
                'title' => 'You can not use this recipe!',
                'text' => $message,
            
            ]); 
        }
        elseif($this->wrongUnitArray){
            foreach($this->wrongUnitArray as $key => $value) {
                $this->wrongUnitKey .= $key." - ";
                $this->wrongUnitValue .= $value." - ";
            }
            $this->messageWrongUnit="your ingredient -".$this->wrongUnitKey." have the wrong unit must be -".$this->wrongUnitValue;
            $this->dispatchBrowserEvent('swal:modal',[
                'type' => 'error',
                'title' => 'The wrong unit',
                'text' => $this->messageWrongUnit,
            ]);   
        }            
        elseif($this->notEnoughArray){
            foreach($this->notEnoughArray as $string) {
                $this->notEnoughArrayName .= $string." - ";
            }
            $message="you need: -".$this->notEnoughArrayName;
             $this->dispatchBrowserEvent('swal:modal',[
                'type' => 'error',
                'title' => 'You dont have enough to do that recipe',
                'text' => $message,
            ]); 
        }
        elseif($this->amountArray){
            foreach($this->amountArray as $key => $value) {
                IngredientsUser::where('id' , $key)
                                    ->update([
                                        'amount' => $value,
                                    ]);
            }
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
            else{
                 $this->dispatchBrowserEvent('swal:modal',[
                    'type' => 'success',
                    'title' => 'Data update successfully',
                ]); 
            }
        }   
    }
}
