<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class ProviderDashboardController extends Controller
{
  public function index()
  {
    $total_sales = Order::where('provider_id', auth()->user()->id)->sum('total_price');
    $new_orders = Order::where('provider_id', auth()->user()->id)->where('status', 'new')->count();
    $finished_orders = Order::where('provider_id', auth()->user()->id)->where('status', 'finished')->count();
    $finished_orders_last_week = Order::where('provider_id', auth()->user()->id)->where('status', 'finished')
      ->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()])
      ->count();
    $finished_orders_last_week_profits = Order::where('provider_id', auth()->user()->id)->where('status', 'finished')
      ->whereBetween('created_at', [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()])
      ->sum('total_price');
    $finished_orders_last_month = Order::where('status', 'finished')->where('provider_id', auth()->user()->id)
      ->whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()])
      ->count();
    $finished_orders_last_month_profits = Order::where('provider_id', auth()->user()->id)->where('status', 'finished')
      ->whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()])
      ->sum('total_price');
    $users_last_week = User::whereHas('orders', function ($q) {
      $q->where('provider_id', auth()->user()->id)
        ->where('created_at', '>=', now()->subDays(7));
    })->count();
    $orders = Order::where('provider_id', auth()->user()->id)->where('status', Order::$STATUS[2])->latest()->get();
    return view('providers.index', compact('orders', 'total_sales', 'new_orders', 'finished_orders', 'finished_orders_last_week', 'finished_orders_last_week_profits', 'finished_orders_last_month', 'finished_orders_last_month_profits', 'users_last_week'));
  }
}
