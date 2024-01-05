<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'content',
        'blog_photo',
        'reading_time',
        'category_id',
        'user_id',
        'language_id'
    ];
    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
    public function Language()
    {
        return $this->belongsTo(Language::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Hashtags()
    {
        return $this->belongsToMany(Hashtag::class, 'blog_hashtag');
    }

}
