<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefaultImage extends Model
{
    use HasFactory;

    protected $table = 'default_images';

    protected $fillable = [
        'property_default_pic'
    ];
}
