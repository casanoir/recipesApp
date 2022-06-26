<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use DB;

class HomeComponents extends Component
{
    public $showComponent ='myIng';
    public $apiIngredientId;
    public $selectedIngNames;
   
    protected $listeners =[
        'emitShowComponent'=>'update',
        'emitShowMyIngdientRecipes'=>'showMyIngdientRecipes',
        'emitshowMyIngdientInfo'=>'showMyIngdientInfo',
        
    ];

    //listen for the view update and show right home component
    public function update($showComponentv){
        $this->showComponent=$showComponentv;
        return view('livewire.home.home-components',['showComponent'=>$this->showComponent]);
    } 
    
    //set view to my ingredients and render
    public function render(){
        return view('livewire.home.home-components',['showComponent'=>$this->showComponent]);
    }

    //show the button to go back to home ingredient list when viewing single ingredient
    public function goBack(){
        $this->showComponent="myIng";
        return view('livewire.home.home-components',['showComponent'=>$this->showComponent]);
    }

    //show the button to search for recipes using selected ingredients
    public function showMyIngdientRecipes($selectedIngNames){
        $this->showComponent="myRec";
        $this->selectedIngNames=$selectedIngNames;
        return $this->selectedIngNames;
    }

    //show the info of a specific ingredientby clicking on the "i"
    public function showMyIngdientInfo($id){
        $this->showComponent="myingInfo";
        $this->apiIngredientId=DB::table('ingredients')->where('id','like',$id)->value('apiIngredientId');
        return $this->apiIngredientId;
    }
}
