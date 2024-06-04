<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BlogNewsCategory;
use App\Models\BlogNews;

class SingleNewsComponent extends Component
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
        return view('livewire.single-news-component',[
            'blogCategories'=>$blogCategories,
            'blog'=>$blog,
            'otherBlogsNews'=>$otherBlogsNews
        ])->layout('layouts.adminbase');
    }

}
