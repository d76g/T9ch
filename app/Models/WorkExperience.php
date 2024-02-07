<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkExperience extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'position',
        'company',
        'start_date',
        'end_date',
    ];
}
