<?php

namespace App\Http\Controllers\Provider;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FinishOrderController extends Controller
{
    public function index()
    {
        return view('providers.orders.finished.index', ['orders' => Order::where('provider_id', auth()->user()->id)->finished()->latest()->get()]);
    }

    public function show($id)
    {
        return view('providers.orders.finished.show', ['order' => Order::with('orderItems')->findOrFail($id)]);
    }
}
