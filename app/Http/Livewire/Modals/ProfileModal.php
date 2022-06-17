<?php

namespace App\Http\Livewire\Modals;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
class ProfileModal extends Component
{
    public $user_id;
    public $firstName;
    public $lastName;
    
    public function mount(){
        $this->user_id = Auth::user()->id;
        $this->firstName = Auth::user()->firstName;
        $this->lastName = Auth::user()->lastName;
    }

    public function editUser(){
        User::where('id',Auth::user()->id)->update([
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
        ]);
        
        // // Sweet Alert
        // $this->dispatchBrowserEvent('swal:modal',[
        //     'type' => 'success',
        //     'title' => 'Profile edited successfully',
        //     'text' => '',
        // ]);
    }
}
