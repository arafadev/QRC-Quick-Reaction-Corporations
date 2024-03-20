<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CancelledOrderController extends Controller
{
    
    public function index()
    {
        return view('admins.orders.cancelled_orders.index', ['orders' => Order::cancelled()->latest()->get()]);
    }
    
    public function show($id)
    {
        return view('admins.orders.cancelled_orders.show', ['order' => Order::with('orderItems')->findOrFail($id)]);
    }
}
