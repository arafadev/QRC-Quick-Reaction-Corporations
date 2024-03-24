<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ProviderDetailsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'                    => $this->id,
            'name'                  => $this->name,
            'image'                 => $this->image,
            'details'               => $this->details,
            'map_desc'              => $this->map_desc,
            'distance'              => round($this->haversineGreatCircleDistance($request->user_lat,$request->user_lng, $this->lat, $this->lng)),
            'lat'                   => $this->lat,
            'lng'                   => $this->lng,
            'rate'                  => round($this->avg_rate, 2),
        ];
    }
}
