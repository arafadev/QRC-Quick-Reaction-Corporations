<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Profile\UpdateAdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Traits\UploadImgTrait;
class AdminProfileController extends Controller
{
    use UploadImgTrait;
    public function index()
    {
        return view('admins.profile.index', ['admin' => Admin::find(Auth::user()->id)]);
    }

    public function update(UpdateAdminRequest $request)
    {
        if ($request->file('image')) {
            $filename = $this->uploadImg($request->file('image'), 'upload/admin_images');
            @unlink(public_path(auth()->user()->image));
        } else {
            $filename = auth()->user()->image;
        }
        Admin::findOrFail(auth()->user()->id)->update([
        'email' => $request->email,
        'phone' => $request->phone,
        'image' => $filename,
        ]);
        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
