<?php

namespace App\Services;
use DB;
use App\Models\Provider;
use App\Http\Requests\Api\HomeRequest;

class ProviderService
{
    public function index(HomeRequest $requestData)
    {
        $providers = Provider::select('id', 'name', 'details', 'map_desc', 'avg_rate', 'delivery_price', 'image')
        ->selectRaw("6371 * acos(cos(radians(" . $requestData->lat . "))
                * cos(radians(lat)) * cos(radians(lng) - radians(" . $requestData->lng . "))
                 + sin(radians(" . $requestData->lat . ")) * sin(radians(lat))) AS distance")
        ->where('status', 1)
        ->when($requestData->name, function ($q) use ($requestData) {
            $q->where('name', 'LIKE', '%' . $requestData->name . '%');
        })
        ->get();
    
    return $providers;
    
    }
}
