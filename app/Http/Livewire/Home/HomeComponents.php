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
    public function update($showComponentv){
        $this->showComponent=$showComponentv;
        return view('livewire.home.home-components',['showComponent'=>$this->showComponent]);
      
    }    
    public function render(){
        return view('livewire.home.home-components',['showComponent'=>$this->showComponent]);
    }
    public function goBack(){
        $this->showComponent="myIng";
        return view('livewire.home.home-components',['showComponent'=>$this->showComponent]);
    }
    public function showMyIngdientRecipes($selectedIngNames){
        $this->showComponent="myRec";
        $this->selectedIngNames=$selectedIngNames;
        return $this->selectedIngNames;
    }
    public function showMyIngdientInfo($id){
        $this->showComponent="myingInfo";
        $this->apiIngredientId=DB::table('ingredients')->where('id','like',$id)->value('apiIngredientId');
        return $this->apiIngredientId;
    }
}
