<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;
    protected $fillable = [
        'provider_id',
        'user_id',
        'order_id',
        'comment',
        'rate',
    ];
    
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
