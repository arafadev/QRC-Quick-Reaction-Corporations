<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'email',
        'phone',
        'image',
        'blocked',
        'social_id',
        'status'
    ];

    public static $STATUS = [0,1];
    public static $DEFAULT_IMG = 'upload/no_image.jpg';

    public function isActive()
    {
        return $this->status;
    }
    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

}
