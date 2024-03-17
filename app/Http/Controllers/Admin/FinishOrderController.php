<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FinishOrderController extends Controller
{
    public function index()
    {
        return view('admins.orders.finished_orders.index', ['orders' => Order::where('status' , Order::$STATUS[2])->latest()->get()]);
    }
    
    public function show($id)
    {
        return view('admins.orders.finished_orders.show', ['order' => Order::with('orderItems')->findOrFail($id)]);
    }
}
