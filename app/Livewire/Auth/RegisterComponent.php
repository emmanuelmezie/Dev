<?php

namespace App\Livewire\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use illuminate\Support\Str;

use Livewire\Component;

class RegisterComponent extends Component
{

    public $name, $email, $password;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
    }

    public function adminCreateAccount()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $newUser = new User();
        $newUser->name = $this->name;
        $newUser->email = $this->email;
        $newUser->password = Hash::make($this->password);
        $newUser->save();
        $newUser->refresh();

        return redirect()->route('login')->with('message','Account Created Successfully. Please Login.');
    }

    public function render()
    {
        return view('livewire.auth.register-component')->layout('layouts.appauth');
    }
}
