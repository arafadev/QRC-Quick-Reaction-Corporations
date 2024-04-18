<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InProgressOrderResource extends JsonResource
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
            'order_num' => $this->order_num,
            'user_name' => $this->user->name,
            'provider_name' => $this->provider->name,
            'type' => $this->type,
            'total_price' => $this->total_price,
            'date' => $this->date,
            'created_at' => $this->created_at,
        ];
    }
}
