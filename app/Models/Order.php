<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'provider_id',
        'patient_map_desc',
        'patient_lng',
        'patient_lat',
        'hospital_map_desc',
        'hospital_lng',
        'hospital_lat',
        'date',
        'time',
        'notes',
        'order_num',
        'items_price',
        'vat_value_ratio',
        'vat_value',
        'shipping_price',
        'app_commission',
        'total_price',
        'cancelled_by',
        'type',
        'approved_by_provider',
        'status',
        'payment_method',
    ];
    public static $STATUS = ['new', 'inprogress', 'finished', 'cancelled'];
    public static $CANCELLED_BY = ['user', 'provider'];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function scopeNew($query)
    {
        return $query->where('status','new');
    }
    public function scopeInprogress($query)
    {
        return $query->where('status', 'finished');
    }
    public function scopeFinished($query)
    {
        return $query->where('status', 'finished');
    }
    public function scopeCancelled($query)
    {
        return $query->where('status', 'cancelled');
    }
    
    function haversineGreatCircleDistance(
        $latitudeFrom,
        $longitudeFrom,
        $latitudeTo,
        $longitudeTo,
        $earthRadius = 6371000
    ) {
        // convert from degrees to radians
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
            cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return round($angle * $earthRadius, 1);
    }
}
