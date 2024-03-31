<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewOrderController extends Controller
{
    public function index()
    {
        return view('admins.orders.new_orders.index', ['orders' => Order::where('provider_id', auth()->user()->id)->new()->latest()->get()]);
    }

    public function show($id)
    {
        return view('admins.orders.new_orders.show', ['order' => Order::with('orderItems')->findOrFail($id)]);
    }
}
