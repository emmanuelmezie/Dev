<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use illuminate\Support\Str;
use App\Models\BlogNewsCategory;
use App\Models\BlogNews;
use Livewire\WithFileUploads;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Auth;

class AdminNewsComponent extends Component
{
    use WithFileUploads;
    public $categoryName;
    public $cat_id, $editcategoryName, $image;
    public $newsContent = "";
    public $title, $buttonTitle, $externalLink, $category_id;
    public $isSlideChecked = false;
    public $blog_id;
    public $editCatName;
    public $editTitle, $editCategoryId, $editButtonTitle, $editnewsContent, $editExternalLink, $editSlideFeatured, $editImagePath, $new_image;
    public $isLoading = false;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'required',
            'newsContent' => 'required',
            'category_id' => 'required',
        ]);
    }

    public function showLoader()
    {
        $this->isLoading = true;
    }


    public function addBlogNews()
    {
        $this->validate([
            'title' => 'required',
            'newsContent' => 'required',
            'category_id' => 'required',
        ]);

        $newBlogNews = new BlogNews();
        $newBlogNews->blognews_id = Str::random(10);
        $newBlogNews->user_id = Auth::user()->id;
        $newBlogNews->title = $this->title;
        $newBlogNews->category_id = $this->category_id;
        $newBlogNews->news_content = $this->newsContent;
        $newBlogNews->button_title = $this->buttonTitle;
        $newBlogNews->external_link = $this->externalLink;
        $newBlogNews->slideFeatured = $this->isSlideChecked;
        
        if($this->image)
        {
            $publicId = cloudinary()->upload($this->image->getRealPath(), [
                'folder' => 'Blog',
                'transformation' => [
                    'quality' => 'auto',
                    'fetch_format' => 'auto'
                ]
            ])->getPublicId();
            $newBlogNews->cloudinary_image_id = $publicId;
            $newBlogNews->image_path = cloudinary()->getUrl($publicId);
        }

        $newBlogNews->save();
        
        return redirect()->route('adminnews')->with('bnmessage','Blog post created successfully!');  
    }

    public function editBlognews($blogid)
    {
        $blogNews = BlogNews::find($blogid);
        if($blogNews)
        {
            //dd($blogcat->cat_name);
            $this->blog_id= $blogNews->id;
            $this->editTitle= $blogNews->title;
            $this->editnewsContent = $blogNews->news_content;
            $this->editButtonTitle = $blogNews->button_title;
            $this->editExternalLink = $blogNews->external_link;
            $this->editSlideFeatured = $blogNews->slideFeatured;
            $this->editImagePath = $blogNews->image_path;
        }
    }

    public function updateBlogNews()
    {

        $blogNews = BlogNews::find($this->blog_id);
        if($this->new_image)
        {
            if($blogNews->cloudinary_image_id)
            {
                $deleteFromCloud = Cloudinary::destroy($blogNews->cloudinary_image_id);
            }
            $publicId = cloudinary()->upload($this->new_image->getRealPath(), [
                'folder' => 'Blog',
                'transformation' => [
                    'quality' => 'auto',
                    'fetch_format' => 'auto'
                ]
            ])->getPublicId();
            $blogNews->cloudinary_image_id = $publicId;
            $blogNews->image_path = cloudinary()->getUrl($publicId);
        }

        $blogNews->title = $this->editTitle;
        $blogNews->news_content = $this->editnewsContent;
        $blogNews->button_title = $this->editButtonTitle;
        $blogNews->external_link = $this->editExternalLink;
        $blogNews->slideFeatured = $this->editSlideFeatured;
        $blogNews->save();
        $blogNews->refresh();

        return redirect()->route('adminnews')->with('bnmessage','News updated successfully!'); 
    }



    public function addNewCategory()
    {
        $newCategory = new BlogNewsCategory();
        $newCategory->cat_id = Str::random(8);
        $newCategory->cat_name = $this->categoryName;
        $newCategory->save();

        return redirect()->route('adminnews')->with('cmessage','Category added successfully!'); 
    }

    public function editBlogCategory($categoryid)
    {
        $category = BlogNewsCategory::find($categoryid);
        if($category)
        {
            $this->cat_id= $category->id;
            $this->editcategoryName = $category->cat_name;
        }
    }

    public function updateBlogCategory()
    {
        BlogNewsCategory::where('id',$this->cat_id)->update([
            'cat_name'=>$this->editcategoryName
        ]);
        return redirect()->route('adminnews')->with('cmessage','Category updated successfully!'); 
    }

    public function deleteBlogCategory($cat_id)
    {
        $category = BlogNewsCategory::find($cat_id);
        $category->delete();
        session()->flash('cmessage','Category Deleted Successfully!'); 
    }

    public function deleteBlognews($blog_id)
    {
        $blognews = BlogNews::find($blog_id);
        if($blognews->cloudinary_image_id)
        {
            $deleteFromCloud = Cloudinary::destroy($blognews->cloudinary_image_id);
        }
        $blognews->delete();
        session()->flash('bnmessage','Blog News Deleted Successfully!'); 
    }


    public function render()
    {
        $blogCategories = BlogNewsCategory::orderBy('created_at', 'desc')->get();
        $blogNews = BlogNews::orderBy('created_at', 'desc')->get();
        
        return view('livewire.admin.admin-news-component',[
            'blogCategories'=>$blogCategories,
            'blogNews'=>$blogNews
        ])->layout('layouts.adminbase');
    }
}
