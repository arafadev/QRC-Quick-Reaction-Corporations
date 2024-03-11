<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable = ['email', 'name', 'phone', 'image', 'status', 'password'];

    public static $DEFAULT_IMG = 'upload/no_image.jpg';
    public static $STATUS = [0,1];

    
    }
