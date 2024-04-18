<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderInfosResource extends JsonResource
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
            'id' => $this->id,
            'items' => $this->orderItems->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->service->name,
                    'price' => $item->price,
                ];
            }),
            'shipping_price' => $this->shipping_price,
            'items_price' => $this->items_price,
            'total' => $this->total_price,
            'date' => $this->date,
            'time' => $this->time,
            'payment_method' => $this->payment_method,
            'provider' => [
                'name' => $this->provider->name,
                'image' => $this->provider->image,
                'map_desc' => $this->provider->map_desc,
                'distance' => round($this->haversineGreatCircleDistance($request->user_lat, $request->user_lng, $this->lat, $this->lng)),
                'lat' => $this->provider->lat,
                'lng' => $this->provider->lng,
            ],
            'status' => $this->status,
            'approved_by_provider' => $this->approved_by_provider,


        ];
    }
}
