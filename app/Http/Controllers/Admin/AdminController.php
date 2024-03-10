<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('admins.admin.index', ['admins' => Admin::where('id', '!=' , auth()->user()->id)->get()]);
    }
}
