<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Traits\Api\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\InProgressOrderResource;
use App\Http\Resources\Api\CancelledOrderResource;

class OrderStatusController extends Controller
{
    use ResponseTrait;

    public function ShowInprogress()
    {
        $data = Order::inprogress()->get();
        // dd($data);
        $apidata = InProgressOrderResource::collection($data);
        return $data ? $this->successData($apidata, 201) : $this->failMsg();
    }

    public function ShowFinished()
    {
        $data = Order::finished()->get();
        $apidata = InProgressOrderResource::collection($data);
        return $data ? $this->successData($apidata, 201) : $this->failMsg();
    }

    public function ShowCancelled()
    {
        $data = Order::cancelled()->get();
        $apidata = CancelledOrderResource::collection($data);
        return $data ? $this->successData($apidata, 201) : $this->failMsg();
    }
}
