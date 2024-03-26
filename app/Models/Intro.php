<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intro extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'image', 'description'];
    public static $DEFAULT_IMG = 'upload/no_image.jpg';

}
