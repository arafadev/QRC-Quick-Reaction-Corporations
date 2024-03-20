<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
          $total_sales =  Order::sum('total_price');
          $new_orders =  Order::where('status', 'new')->count();
          $finished_orders =  Order::where('status', 'finished')->count();
          $finishedOrdersLastWeek = Order::where('status', 'finished')
            ->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()])
            ->count();
            $finishedOrdersLastWeek_profits = Order::where('status', 'finished')
            ->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()])
            ->sum('total_price');
          $finishedOrdersLastMonth = Order::where('status', 'finished')
            ->whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()])
            ->count();
            $finishedOrdersLastMonth_profits = Order::where('status', 'finished')
            ->whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()])
            ->sum('total_price');
            $usersLastWeek = User::where('created_at', '>=', now()->subDays(7))->count();

         $orders =  Order::where('status' , Order::$STATUS[2])->latest()->get();

        return view('admins.index' ,compact('total_sales', 'new_orders', 'finished_orders', 'usersLastWeek', 'finishedOrdersLastWeek', 'finishedOrdersLastMonth', 'finishedOrdersLastWeek_profits', 'finishedOrdersLastMonth_profits', 'orders'));
    }
}
