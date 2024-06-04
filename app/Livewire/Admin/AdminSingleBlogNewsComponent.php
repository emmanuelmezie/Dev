<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\BlogNewsCategory;
use App\Models\BlogNews;

class AdminSingleBlogNewsComponent extends Component
{
    public $blog_id;

    public function mount($blog_id)
    {
        $this->blog_id = $blog_id;
    }

    public function render()
    {
        $blogCategories = BlogNewsCategory::orderBy('created_at', 'desc')->get();
        $blog = BlogNews::where('blognews_id',$this->blog_id)->first();
        $otherBlogsNews = BlogNews::where('blognews_id','<>',$this->blog_id)->get();
        return view('livewire.admin.admin-single-blog-news-component',[
            'blogCategories'=>$blogCategories,
            'blog'=>$blog,
            'otherBlogsNews'=>$otherBlogsNews
        ])->layout('layouts.adminbase');
    }
}
