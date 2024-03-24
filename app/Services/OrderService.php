<?php

namespace App\Services;
use DB;
use App\Models\Provider;
use App\Http\Requests\Api\HomeRequest;
use App\Models\Service;

class OrderService
{
    public function calculateOrderPrice($servicesIds, $providerId)
    {
        $serviceAndPrice = Service::whereIn('id', $servicesIds)->get();
        $provider = Provider::findOrFail($providerId);
        $items_price = $serviceAndPrice->sum('price');
        $app_commission = $items_price + 5;
        $vat_value = ($items_price *  5) / 100; 
        $orderItems = [];
        foreach ($serviceAndPrice as $key => $item) {
            $orderItems[$key]['service_id'] = $item->service_id;
            $orderItems[$key]['price'] = $item->price;
        }
        return [
            'serviceAndPrice' => $serviceAndPrice,
            'app_commission' => $app_commission,
            'provider'  => $provider,
            'items_price' => $items_price,
            'shipping_price' => $provider->delivery_price,
            'vat_value_ratio' => 5,
            'vat_value' => $vat_value,
            'total_price' => $vat_value + $items_price + $provider->delivery_price,
            'order_items' => $orderItems,
        ];
    }
}
