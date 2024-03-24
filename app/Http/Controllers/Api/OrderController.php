<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Traits\Api\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\OrderRequest;
use App\Http\Resources\Api\CategoryResource;
use App\Http\Resources\Api\ProviderResource;
use App\Http\Resources\Api\ServicePriceResource;
use App\Http\Requests\Api\ProviderServiceRequest;

class OrderController extends Controller
{
    use ResponseTrait;
    public function showProviderServices(ProviderServiceRequest $request)
    {
        return $this->successData( CategoryResource::collection(Category::whereHas('services')->with('services')->get()));
    }

    public function calculateOrder(OrderRequest $request)
    {

         $calculateOrderPrice = (new OrderService())->calculateOrderPrice($request->service_ids, $request->provider_id);
         return $this->successData( [
            'services'       => ServicePriceResource::collection($calculateOrderPrice['serviceAndPrice']),
            'shipping_price' => $calculateOrderPrice['shipping_price'],
            'items_price'    => $calculateOrderPrice['items_price'],
            'vat_value'      => $calculateOrderPrice['vat_value'],
            'total'         =>  $calculateOrderPrice['total_price'],
            'provider'     => new ProviderResource($calculateOrderPrice['provider']),
        ]);
    }
    
}
