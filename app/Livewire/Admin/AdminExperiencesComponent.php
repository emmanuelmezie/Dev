<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Experience;
use Livewire\WithFileUploads;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Auth;
use illuminate\Support\Str;

class AdminExperiencesComponent extends Component
{
    use WithFileUploads;
    public $title, $description, $company_name, $start_year, $end_year;
    public $experience_id, $edittitle, $editdescription, $editcompany_name, $editstart_year, $editend_year;
    public $isLoading = false;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'required',
            'company_name' => 'required',
            'description' => 'required'
        ]);
    }

    public function showLoader()
    {
        $this->isLoading = true;
    }

    public function addExperience()
    {
        $this->validate([
            'title' => 'required',
            'company_name' => 'required',
            'description' => 'required'
        ]);

        $newExperience = new Experience();
        $newExperience->experiences_id = Str::random(10);
        $newExperience->title = $this->title;
        $newExperience->company_name = $this->company_name;
        $newExperience->description = $this->description;
        $newExperience->start_year = $this->start_year;
        $newExperience->end_year = $this->end_year;
        $newExperience->save();
        
        return redirect()->route('adminexperience')->with('bnmessage','Experience created successfully!');  
    }

    public function editExperience($experience_id)
    {
        $experience = Experience::find($experience_id);
        if($experience)
        {
            $this->experience_id= $experience->id;
            $this->edittitle= $experience->title;
            $this->editcompany_name = $experience->company_name;
            $this->editdescription = $experience->description;
            $this->editstart_year = $experience->start_year;
            $this->editend_year = $experience->end_year;
        }
    }

    public function updateExperience()
    {

        $experience = Experience::find($this->experience_id);
        $experience->title = $this->edittitle;
        $experience->company_name = $this->editcompany_name;
        $experience->description = $this->editdescription;
        $experience->start_year = $this->editstart_year;
        $experience->end_year = $this->editend_year;
        $experience->save();
        $experience->refresh();

        return redirect()->route('adminexperience')->with('bnmessage','Experience updated successfully!'); 
    }

    public function deleteExperience($experience_id)
    {
        $experience = Experience::find($experience_id);
        $experience->delete();
        session()->flash('bnmessage','Experience Deleted Successfully!'); 
    }


    public function render()
    {
        $experiences = Experience::orderBy('created_at', 'desc')->get();
        return view('livewire.admin.admin-experience-component',[
           'experiences'=>$experiences 
        ])->layout('layouts.adminbase');
    }
}
