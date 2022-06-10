<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class AboutUsCard extends Component
{
    public $teamMembers;

    public function mount($teamMembers){
      $this->teamMembers = $teamMembers;

       
    }


    public function render()
    {
        return view('livewire.components.about-us-card');
    }
}
