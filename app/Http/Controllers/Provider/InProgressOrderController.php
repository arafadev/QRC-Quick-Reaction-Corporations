<?php

namespace App\Http\Controllers\Provider;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InProgressOrderController extends Controller
{
    public function index()
    {
        return view('providers.orders.inprogress.index', ['orders' => Order::inprogress()->where('provider_id', auth()->user()->id)->latest()->get()]);
    }

    public function show($id)
    {
        return view('providers.orders.inprogress.show', ['order' => Order::with('orderItems')->findOrFail($id)]);
    }

}
