<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InProgressOrderController extends Controller
{
    public function index()
    {
        return view('admins.orders.inprogress_orders.index', ['orders' => Order::inprogress()->latest()->get()]);
    }
    
    public function show($id)

    {
        return view('admins.orders.inprogress_orders.show', ['order' => Order::with('orderItems')->findOrFail($id)]);
    }
}
