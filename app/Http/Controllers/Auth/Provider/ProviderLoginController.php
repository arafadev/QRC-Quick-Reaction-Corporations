<?php

namespace App\Http\Controllers\Auth\Provider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProviderLoginController extends Controller
{
    public function getLogin()
    {
        return view('providers.auth.login');
    }

    public function login(Request $request)
    {
        if (auth()->guard('provider')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {

            if (!auth('provider')->user()->status) {
                auth('provider')->logout();
              return redirect()->back()->withInput()->withErrors(['status' => 'Not Activated By The Administration']);
            }
            $notification = array(
                'message' => 'Provider Login Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('provider.dashboard')->with($notification);
        } else {
            return redirect()->back()->withInput()->withErrors(['loginError' => 'Invalid Email Or Password.']);
        } 
    }

    
    public function logout(Request $request)
    {
        Auth::guard('provider')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $notification = [
            'msg' => 'Provider Successfully',
            'alert-type' => 'success'
        ];

        return redirect('provider/login')->with($notification);
    }

}
