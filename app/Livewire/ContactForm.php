<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;

class ContactForm extends Component
{
    public $name = '';
    public $email = '';
    public $message = '';
    public $success = false;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'message' => 'required|min:10',
    ];

    public function render()
    {
        return view('livewire.contact-form');
    }

    public function submit()
    {
        $this->validate();

        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ]);

        $this->reset(['name', 'email', 'message']);
        $this->success = true;
    }
}
