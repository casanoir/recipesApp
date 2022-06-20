<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;

class HomeBtn extends Component
{
    public function render()
    {
        return view('livewire.home.home-btn');
    }
    public function showMyIng(){
        $showComponentv="myIng";
        $this->emit('emitShowComponent',$showComponentv);
    }
    public function showMyFavIng(){
        $showComponentv="myFavIng";
        $this->emit('emitShowComponent',$showComponentv);
    }
    public function showMyFavRec(){
        $showComponentv="myFavRec";
        $this->emit('emitShowComponent',$showComponentv);
    }
    public function showMyHistory(){
        $showComponentv="myHis";
        $this->emit('emitShowComponent',$showComponentv);
    }
}
