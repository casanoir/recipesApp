<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Home extends Component
{
    public $showComponent ='myIng';
   
    protected $listeners =[
        // allIngredients
        'emitShowComponent'=>'update',
        'emitShowMyIngdientRecipes'=>'showMyIngdientRecipes',
        
    ];
    public function update($showComponentv){
        $this->showComponent=$showComponentv;
        return view('livewire.components.home',['showComponent'=>$this->showComponent]);
      
    }    
    public function render(){
        return view('livewire.components.home',['showComponent'=>$this->showComponent]);
    }
    public function showMyIngdientRecipes($selectedIngNames){
        $this->showComponent="myRec";
        return view('livewire.components.home',['showComponent'=>$this->showComponent,'selectedIngNames'=>$selectedIngNames]);
    }
}
