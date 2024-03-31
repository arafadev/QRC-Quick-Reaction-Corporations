<?php

namespace App\Http\Controllers\Provider;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewOrderController extends Controller
{
    public function index()
    {
        return view('providers.orders.new_orders.index', ['orders' => Order::where('provider_id', auth()->user()->id)->new()->latest()->get()]);
    }

    public function show($id)
    {
        return view('providers.orders.new_orders.show', ['order' => Order::with('orderItems')->findOrFail($id)]);
    }

    public function accept_order($id)
    {
        Order::findOrFail($id)->update(['status' => Order::$STATUS[1]]);
        $notification = array(
            'message' => 'Order Inprogress Now',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function finished_order($id)
    {
        Order::findOrFail($id)->update(['status' => Order::$STATUS[2]]);
        $notification = array(
            'message' => 'Order Finished Now',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function cancelled_order($id)
    {
        Order::findOrFail($id)->update(['status' => Order::$STATUS[3], 'cancelled_by' => Order::$CANCELLED_BY[1]]);
        $notification = array(
            'message' => 'Order Cancelled Now',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
