<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Make sure to import User model

class Post extends Model
{
    protected $fillable = ['title', 'content', 'category_id', 'author_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
