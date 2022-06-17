<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class HomeBtn extends Component
{
    public function render()
    {
        return view('livewire.components.home-btn');
    }
    public function showMyRec(){
        $showComponentv="myRec";
        $this->emit('emitShowComponent',$showComponentv);
    }
    public function showMyIng(){
        $showComponentv="myIng";
        $this->emit('emitShowComponent',$showComponentv);
    }
    public function showMyfav(){
        $showComponentv="myfav";
        $this->emit('emitShowComponent',$showComponentv);
    }
}
