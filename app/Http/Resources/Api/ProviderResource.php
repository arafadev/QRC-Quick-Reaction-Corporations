<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ProviderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'provider' => [
                'id'                  => $this->id,
                'name'                => $this->name,
                'image'               => $this->image,
                'map_desc'            => $this->map_desc,
                'distance'            => round($this->haversineGreatCircleDistance($request->lat,$request->lng, $this->lat, $this->lng)),
                'lat'                 => $this->lat,
                'lng'                 => $this->lng,
                'rate'                => round($this->avg_rate, 2),
            ],
        ];
    }
}
