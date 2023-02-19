<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catergories extends Model
{
    use HasFactory;
    protected $fillable = [
        'category',
        'desc'
    ];
    public function Blogs()
    {
        return $this->hasMany(Blog::class);
    }
}
