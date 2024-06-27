<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Contact;

class AdminContactsComponent extends Component
{

    public function deleteContact($contact_id)
    {
        $contact = Contact::find($contact_id);
        $contact->delete();
        session()->flash('bnmessage','Contact Deleted Successfully!'); 
    }

    public function render()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->get();
        return view('livewire.admin.admin-contacts-component',[
            'contacts'=>$contacts
        ])->layout('layouts.adminbase');
    }
}
