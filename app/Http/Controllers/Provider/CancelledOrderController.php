<?php

namespace App\Http\Controllers\Provider;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CancelledOrderController extends Controller
{
    public function index()
    {
        return view('providers.orders.cancelled.index', ['orders' => Order::where('provider_id', auth()->user()->id)->cancelled()->latest()->get()]);
    }

    public function show($id)
    {
        return view('providers.orders.cancelled.show', ['order' => Order::with('orderItems')->findOrFail($id)]);
    }
}
