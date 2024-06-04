<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use illuminate\Support\Str;
use App\Models\Portfolio;
use Livewire\WithFileUploads;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class AdminPortfolioComponent extends Component
{
    use WithFileUploads;
    public $portfolio_id, $portfolio_type, $project_url, $project_name, $description, $image;
    public $editportfolio_type, $editproject_name, $editproject_url, $editdescription, $editimage;
    public $isLoading = false;


    public function showLoader()
    {
        $this->isLoading = true;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'portfolio_type' => 'required',
            'project_name' => 'required'
        ]);
    }

    public function addPortfolio()
    {
        $this->validate([
            'portfolio_type' => 'required',
            'project_name' => 'required',
        ]);

        $newPortfolio = new Portfolio();
        $newPortfolio->portfolio_id = Str::random(10);
        $newPortfolio->project_name = $this->project_name;
        $newPortfolio->project_url = $this->project_url;
        $newPortfolio->portfolio_type = $this->portfolio_type;
        $newPortfolio->description = $this->description;
        
        if($this->image)
        {
            $publicId = cloudinary()->upload($this->image->getRealPath(), [
                'folder' => 'Blog',
                'transformation' => [
                    'quality' => 'auto',
                    'fetch_format' => 'auto'
                ]
            ])->getPublicId();
            $newPortfolio->cloudinary_image_id = $publicId;
            $newPortfolio->image_path = cloudinary()->getUrl($publicId);
        }

        $newPortfolio->save();
        
        return redirect()->route('adminportfolios')->with('bnmessage','Blog post created successfully!');  
    }

    public function editPortfolio($portfolioid)
    {
        $portfolio = Portfolio::find($portfolioid);
        if($portfolio)
        {
            $this->portfolio_id= $portfolio->id;
            $this->editportfolio_type= $portfolio->portfolio_type;
            $this->editproject_url= $portfolio->project_url;
            $this->editproject_name = $portfolio->project_name;
            $this->editdescription = $portfolio->description;
        }
    }

    public function updatePortfolio()
    {

        $portfolio = Portfolio::find($this->portfolio_id);
        $portfolio->project_name = $this->editproject_name;
        $portfolio->portfolio_type = $this->editportfolio_type;
        $portfolio->project_url = $this->editproject_url;
        $portfolio->description = $this->editdescription;
        $portfolio->save();
        $portfolio->refresh();

        return redirect()->route('adminportfolios')->with('bnmessage','Portfolio updated successfully!'); 
    }

    public function deletePortfolio($portfolio_id)
    {
        $portfolio = Portfolio::find($portfolio_id);
        $portfolio->delete();
        session()->flash('bnmessage','Portfolio Deleted Successfully!'); 
    }


    public function render()
    {
        $portfolios = Portfolio::orderBy('created_at', 'desc')->get();
        return view('livewire.admin.admin-portfolios-component',[
            'portfolios'=>$portfolios
        ])->layout('layouts.adminbase');
    }
}
