<?php

namespace App\Livewire;

use Livewire\Component;
use illuminate\Support\Str;
use App\Models\Testimonial;
use Livewire\WithFileUploads;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class TestimonyFormComponent extends Component
{
    use WithFileUploads;
    public $name, $profession, $testimony, $image;
    public $isLoading = false;

    public function showLoader()
    {
        $this->isLoading = true;
    }
    
    public function addTestimony()
    {

        $newTestimony = new Testimonial();
        $newTestimony->testimonial_id = Str::random(10);
        $newTestimony->name = $this->name;
        $newTestimony->profession = $this->profession;
        $newTestimony->testimony = $this->testimony;
        
        if($this->image)
        {
            $publicId = cloudinary()->upload($this->image->getRealPath(), [
                'folder' => 'ChimeTestimony',
                'transformation' => [
                    'quality' => 'auto',
                    'fetch_format' => 'auto'
                ]
            ])->getPublicId();
            $newTestimony->cloudinary_image_id = $publicId;
            $newTestimony->image_path = cloudinary()->getUrl($publicId);
        }

        $newTestimony->save();
        
        return redirect()->route('testimony')->with('bnmessage','Testimony created successfully!');  
    }

    public function render()
    {
        return view('livewire.testimony-form-component')->layout('layouts.base');
    }
}
