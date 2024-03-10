<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function getLogin()
    {
        return view('admins.auth.login');
    }

    public function login(Request $request)
    {
        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {

            if (!auth('admin')->user()->status) {
                auth('admin')->logout();
              return redirect()->back()->withInput()->withErrors(['status' => 'Not activated by the administration']);
            }

            $notification = array(
                'message' => 'Admin Login Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.dashboard')->with($notification);
        } else {
            return redirect()->back()->withInput()->withErrors(['loginError' => 'Invalid email or password.']);
         } 
    }


    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $notification = [
            'msg' => 'Logout Successfully',
            'alert-type' => 'success'
        ];

        return redirect('admin/login')->with($notification);
    }

}
