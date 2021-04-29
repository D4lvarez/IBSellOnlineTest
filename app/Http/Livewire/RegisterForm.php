<?php

namespace App\Http\Livewire;

use App\Mail\NotifyRegistration;
use Livewire\WithFileUploads;


use App\Models\NewUser;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class RegisterForm extends Component
{
    use WithFileUploads;

    public $username;
    public $email;
    public $phone;
    public $userImage;

    protected $rules = [
        'username' => 'required|min:5|max:12',
        'email' => 'required|email',
        'phone' => 'required|min:7',
        'userImage' => 'required|image'
    ];

    public function render()
    {
        return view('livewire.register-form');
    }

    public function registerUser()
    {
        $this->validate();

        $new_user = NewUser::create([
            'username' => $this->username,
            'email' => $this->email,
            'image' => $this->userImage->store('media', 'public'),
            'phone' => $this->phone,
        ]);

        if (!$new_user) {
            session()->flash('error', 'Sorry, try later.');
        }

        $this->emitTo('table-row', 'userAdded');
        session()->flash('message', 'User created.');

        Mail::to($this->email)
            ->bcc('raluca.manea@ibsell.net')
            ->send(new NotifyRegistration($this->username, $this->email));
    }
}
