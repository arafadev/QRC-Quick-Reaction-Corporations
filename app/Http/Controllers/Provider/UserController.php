<?php

namespace App\Http\Controllers\Provider;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return view('providers.users.index', [
            'users' => User::whereHas('orders', function ($query) {
                $query->where('provider_id', auth('provider')->user()->id);
            })->get()
        ]);
    }


}
