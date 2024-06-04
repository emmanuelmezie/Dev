<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\BlogNewsCategory;
use App\Models\BlogNews;
use App\Models\Experience;
use App\Models\Portfolio;

class AdminDashboardComponent extends Component
{
    
    public function render()
    {
        $blogCategories = BlogNewsCategory::orderBy('created_at', 'desc')->get();
        $blogNews = BlogNews::orderBy('created_at', 'desc')->get();
        $experiences = Experience::orderBy('created_at', 'desc')->get();
        $portfolios = Portfolio::orderBy('created_at', 'desc')->get();
        return view('livewire.admin.admin-dashboard-component',[
            'blogCategories'=>$blogCategories,
            'blogNews'=>$blogNews,
            'experiences'=>$experiences,
            'portfolios'=>$portfolios
        ])->layout('layouts.adminbase');
    }
}
