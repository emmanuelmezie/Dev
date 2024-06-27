<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Testimonial;

class AdminTestimoniesComponent extends Component
{
    public function updateTestimonyStatus($testimony_id)
    {
        $testimony = Testimonial::find($testimony_id);
        $testimony->status = true;
        $testimony->save();
        $testimony->refresh();

        return redirect()->route('admintestimonies')->with('bnmessage','Testimony status updated successfully!'); 
    }

    public function deleteTestimony($testimony_id)
    {
        $testimony = Testimonial::find($testimony_id);
        if($testimony->cloudinary_image_id)
        {
            $deleteFromCloud = Cloudinary::destroy($testimony->cloudinary_image_id);
        }
        $testimony->delete();
        session()->flash('bnmessage','Testimony Deleted Successfully!'); 
    }

    public function render()
    {
        $testimonies = Testimonial::orderBy('created_at', 'desc')->get();
        return view('livewire.admin.admin-testimonies-component',[
            'testimonies'=>$testimonies
        ])->layout('layouts.adminbase');
    }
}
