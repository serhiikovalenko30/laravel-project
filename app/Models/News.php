<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Tag;

class News extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsToMany(Category::class, 'news_category');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
