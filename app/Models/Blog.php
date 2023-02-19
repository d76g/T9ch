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
        'user_id'
    ];
    public function Category()
    {
        return $this->belongsTo(Catergories::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
