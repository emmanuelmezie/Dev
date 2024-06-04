<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Contact;

class AdminContactsComponent extends Component
{
    public function render()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->get();
        return view('livewire.admin.admin-contacts-component',[
            'contacts'=>$contacts
        ])->layout('layouts.adminbase');
    }
}
