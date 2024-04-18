<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Traits\Api\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\OrderRequest;
use App\Http\Resources\OrderInfosResource;
use App\Http\Resources\Api\CategoryResource;
use App\Http\Resources\Api\ProviderResource;
use App\Http\Requests\Api\CreateOrderRequest;
use App\Http\Requests\Api\OrderDetailsRequest;
use App\Http\Resources\Api\OrderDetailsResource;
use App\Http\Resources\Api\ServicePriceResource;
use App\Http\Requests\Api\ProviderServiceRequest;

class OrderController extends Controller
{
    use ResponseTrait;
    public function showProviderServices(ProviderServiceRequest $request)
    {
        return $this->successData(CategoryResource::collection(Category::whereHas('services')
            ->with('services')
            ->where('provider_id', $request->provider_id)
            ->get()));
    }

    public function calculateOrder(OrderRequest $request)
    {

        $calculateOrderPrice = (new OrderService())->calculateOrderPrice($request->service_ids, $request->provider_id);
        return $this->successData([
            'services' => ServicePriceResource::collection($calculateOrderPrice['serviceAndPrice']),
            'shipping_price' => $calculateOrderPrice['shipping_price'],
            'items_price' => $calculateOrderPrice['items_price'],
            'vat_value' => $calculateOrderPrice['vat_value'],
            'total' => $calculateOrderPrice['total_price'],
            'provider' => new ProviderResource($calculateOrderPrice['provider']),
        ]);
    }


    public function createOrder(CreateOrderRequest $request)
    {
        $calculateOrderPrice = (new OrderService())->calculateOrderPrice($request->service_ids, $request->provider_id);
        $type = isset($request->hospital_map_desc) && isset($request->hospital_lat) && isset($request->hospital_lng) ? 'normal' : 'abnormal';

        $order = Order::create(
            $request->validated() +
            ['user_id' => 1] +
            ['items_price' => $calculateOrderPrice['items_price']] +
            ['shipping_price' => $calculateOrderPrice['shipping_price']] +
            ['vat_value_ratio' => $calculateOrderPrice['vat_value_ratio']] +
            ['app_commission' => $calculateOrderPrice['app_commission']] +
            ['vat_value' => $calculateOrderPrice['vat_value']] +
            ['type' => $type] +
            ['order_num' => 'ORD' . str_pad(rand(1, 100), 3, '0', STR_PAD_LEFT)] +
            ['total_price' => $calculateOrderPrice['total_price']],

        );
        $order->orderItems()->createMany($calculateOrderPrice['order_items']);
        return $this->successMsg('Order Created Successfully');
    }

    public function orderDetails(OrderDetailsRequest $request)
    {
        $order = Order::with(['orderItems'])->findOrFail($request->order_id);
        return $this->successData(new OrderDetailsResource($order));
    }


    public function orderInfos(Request $request, $id)
    {
        $order = Order::with(['orderItems'])->findOrFail($id);
        $data = new OrderInfosResource($order);
        return $this->successData($data);
    }
    // public function newOrders()
    // {
    //     return (new OrderService)->orderByStatus('new', 'new_orders');
    // }

    // public function progressOrders()
    // {
    //     return (new OrderService)->orderByStatus('inprogress', 'progress_orders');
    // }

    // public function finishedOrders()
    // {
    //     return (new OrderService)->orderByStatus('finished', 'finished_orders');
    // }

    // public function cancelOrder($order_id)
    // {
    //     Order::findOrFail($order_id)->update(['cancelled_by' => 'user']);
    //     return $this->successMsg('تم الغاء الطلب بنجاح');
    // }

}
