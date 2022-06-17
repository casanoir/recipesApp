<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;

class HomeComponents extends Component
{
    public $showComponent ='myIng';
   
    protected $listeners =[
        // allIngredients
        'emitShowComponent'=>'update',
        'emitShowMyIngdientRecipes'=>'showMyIngdientRecipes',
        
    ];
    public function update($showComponentv){
        $this->showComponent=$showComponentv;
        return view('livewire.home.home-components',['showComponent'=>$this->showComponent]);
      
    }    
    public function render(){
        return view('livewire.home.home-components',['showComponent'=>$this->showComponent]);
    }
    public function showMyIngdientRecipes($selectedIngNames){
        $this->showComponent="myRec";
        return view('livewire.home.home-components',['showComponent'=>$this->showComponent,'selectedIngNames'=>$selectedIngNames]);
    }
}
