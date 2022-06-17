<?php

namespace App\Http\Livewire\AboutUs;

use Livewire\Component;

class AboutUsCard extends Component
{
    public $teamMembers;

    public function mount($teamMembers){
      $this->teamMembers = $teamMembers;

       
    }


    public function render()
    {
        return view('livewire.about-us.about-us-card');
    }
}
