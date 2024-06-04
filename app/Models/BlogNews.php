<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogNews extends Model
{
    use HasFactory;

    protected $table = "blog_news";

    public function blogcategory()
    {
        return $this->belongsTo(BlogNewsCategory::class,'category_id');
    }

    public function blogeditor()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
