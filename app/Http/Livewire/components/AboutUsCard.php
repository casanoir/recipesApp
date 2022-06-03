<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class AboutUsCard extends Component
{
    public $aboutUsImgUrl;

    public  $linkedinAccount;
    public $linkedinName ;

    public function mount($aboutUsImgUrl,$linkedinAccount,$linkedinName){


    }


    public function render()
    {
        return view('livewire.components.about-us-card');
    }
}
