<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Mail;


class ContactFormModal extends Component
{
    public $name;
    public $email;
    public $phone;
    public $subject;
    public $message;


    public function render()
    {
        return view('livewire.modals.contact-form-modal');
    }


    public function storeContactForm()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10|numeric',
            'subject' => 'required',
            'message' => 'required',
        ]);


        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'subject' => $this->subject,
            'message' => $this->message,
            ]);

            $this->dispatchBrowserEvent('swal:modal',[
                'type' => 'success',
                'title' => 'Contact Form Submit Successfully',
                'text' => '',
            ]);
            $this->resetData();
    }

    public function resetData() {
        $this-> name = null;
            $this-> email = null;
            $this-> phone = null;
            $this-> subject = null;
            $this-> message = null;
    }
}
