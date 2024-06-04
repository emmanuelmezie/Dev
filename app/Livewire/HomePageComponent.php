<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BlogNews;
use App\Models\Experience;
use App\Models\Portfolio;
use App\Models\Testimonial;
use App\Models\Contact;

class HomePageComponent extends Component
{

    public $name, $email, $subject, $message; 

    public function addContact()
    {

        $newContact = new Contact();
        $newContact->name = $this->name;
        $newContact->email = $this->email;
        $newContact->subject = $this->subject;
        $newContact->message = $this->message;
        $newContact->save();
        
        return redirect()->route('index')->with('bnmessage','Thank you for reaching out. I will surely keep in touch!');  
    }


    public function render()
    {
        $blogNews = BlogNews::orderBy('created_at', 'desc')->get();
        $experiences = Experience::orderBy('created_at', 'desc')->get();
        $portfolios = Portfolio::orderBy('created_at', 'desc')->get();
        $testimonials = Testimonial::orderBy('created_at', 'desc')->where('status',true)->get();
        return view('livewire.home-page-component',[
            'blogNews'=>$blogNews,
            'experiences'=>$experiences,
            'portfolios'=>$portfolios,
            'testimonials'=>$testimonials,
        ])->layout('layouts.base');
    }
}
