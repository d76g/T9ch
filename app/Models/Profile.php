<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'profile_image',
        'position',
        'about',
        'location',
        'website',
        'twitter',
        'facebook',
        'instagram',
        'linkedin',
        'github',
    ];
}
