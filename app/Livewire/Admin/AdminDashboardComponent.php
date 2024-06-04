<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\BlogNewsCategory;
use App\Models\BlogNews;
use App\Models\Experience;

class AdminDashboardComponent extends Component
{
    
    public function render()
    {
        $blogCategories = BlogNewsCategory::orderBy('created_at', 'desc')->get();
        $blogNews = BlogNews::orderBy('created_at', 'desc')->get();
        $experiences = Experience::orderBy('created_at', 'desc')->get();
        return view('livewire.admin.admin-dashboard-component',[
            'blogCategories'=>$blogCategories,
            'blogNews'=>$blogNews,
            'experiences'=>$experiences
        ])->layout('layouts.adminbase');
    }
}
