<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;

class HomeBtn extends Component
{
    public function render()
    {
        return view('livewire.home.home-btn');
    }
    //show my ingredient list
    public function showMyIng(){
        $showComponentv="myIng";
        $this->emit('emitShowComponent',$showComponentv);
    }
    //show my favorite ingredients
    public function showMyFavIng(){
        $showComponentv="myFavIng";
        $this->emit('emitShowComponent',$showComponentv);
    }
    //show my faorite recipes
    public function showMyFavRec(){
        $showComponentv="myFavRec";
        $this->emit('emitShowComponent',$showComponentv);
    }
}
