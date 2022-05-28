<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\User;

class ProfileModal extends Component
{
 public function users(){
return view('livewire.profile-modal',compact('user'));
 }
}