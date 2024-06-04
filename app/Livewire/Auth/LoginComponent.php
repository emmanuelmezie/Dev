<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use illuminate\Support\Str;

class LoginComponent extends Component
{
    public $email, $password;

    public function adminLogin()
    {
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];
        if (Auth::attempt($credentials)) {
            $this->reset(['email', 'password']);
            session(['id' => Auth::id()]);
            $role = Auth::user()->utype;
            switch ($role) {
            case 'ADM': //Admin
                return redirect()->route('admindashboard');
            default:
                return redirect('/');
            }
        }
        else {
            session()->flash('errormessage','Invalid credentials!'); 
        }

    }


    public function render()
    {
        return view('livewire.auth.login-component')->layout('layouts.appauth');
    }
}
