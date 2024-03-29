<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category',
        'desc',
        'slug'
    ];
    public function Blogs()
    {
        return $this->hasMany(Blog::class);
    }
}
