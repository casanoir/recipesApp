<?php

namespace App\Http\Livewire\Recipes;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FilterSearchedRecipes extends Component
{
    public $searchFilterParameters=[];
    public $cuisines="";
    public $cuisinesArray=[
        'Chinese',
        'Eastern European',
        'European',
        'French',
        'German',
        'Greek',
        'Indian',
        'Irish',
        'Italian',
        'Japanese',
        'Jewish',
        'Korean',
        'Latin American',
        'Mediterranean',
        'Mexican',
        'Middle Eastern',
        'Nordic',
        'Southern',
        'Spanish',
        'Thai',
        'Vietnamese',
    ];
    public $diets="";
    public $dietsArray=[
        'Vegetarian',
        'Lacto-Vegetarian',
        'Ovo-Vegetarian',
        'Vegan',
        'Pescetarian',
        'Paleo',
        'Primal',
        'Low FODMAP',
        'Whole30',
    ];
    
    public function filter(){
        if($this->diets && $this->cuisines){
            $this->searchFilterParameters += [ 'cuisine' =>$this->cuisines ];
            $this->searchFilterParameters += [ 'diet' => $this->diets ];
            $this->emit('filerSearchParameters',$this->searchFilterParameters);        }
       
       else{
        if($this->diets){
            $this->searchFilterParameters += [ 'diet' => $this->diets ];
            $this->emit('filerSearchParameters',$this->searchFilterParameters);

           }
           elseif($this->cuisines){
            $this->searchFilterParameters += [ 'cuisine' =>$this->cuisines ];
            $this->emit('filerSearchParameters',$this->searchFilterParameters);

           }
           else{
            $this->dispatchBrowserEvent('swal:modal',[
                'type' => 'info',
                'title' => 'You can not use this recipe!',
            
            ]); 
           }
       }
      $this->searchFilterParameters=[];
      $this->diets="";
      $this->cuisines="";
    }
}
