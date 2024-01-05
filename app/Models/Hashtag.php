<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description'
    ];
    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_hashtag');
    }
}
