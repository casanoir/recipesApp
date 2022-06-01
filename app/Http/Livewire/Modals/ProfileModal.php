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

    public function editUser($id){
        $user = User::where('id',$id)->first();
        $this->firstName = $user->firstName;
        $this->lastName = $user->lastName;
    }
}
