<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Traits\UploadImgTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admins\StoreAdminRequest;
use App\Http\Requests\Admins\AdminUpdateRequest;
use App\Http\Requests\Admin\Profile\UpdateAdminRequest;

class AdminController extends Controller
{
    use UploadImgTrait;
    public function index()
    {
        return view('admins.admin.index', ['admins' => Admin::where('id', '!=' , auth()->user()->id)->latest()->get()]);
    }

    public function create()
    {
        return view('admins.admin.create');
    }
    
    public function store(StoreAdminRequest $request)
    {
        if ($request->file('image')) {
            $filename = $this->uploadImg($request->file('image'), 'upload/admin_images');
        } else {
            $filename = Admin::$DEFAULT_IMG;
        }

        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $data['image']= $filename;
        $data['status'] = 1;
        Admin::create($data);
        $notification = array(
            'message' => 'Admin  created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.index')->with($notification);
      

    }

    public function edit($id)
    {
        return view('admins.admin.edit', ['admin' => Admin::findOrFail($id)]);
    }

    public function update(AdminUpdateRequest $request , $id)
    {
        $old_img = Admin::where('id',$id)->value('image');
        if ($request->file('image')) {
            $filename = $this->uploadImg($request->file('image'), 'upload/admin_images');
            if($old_img != User::$DEFAULT_IMG)
            @unlink(public_path($old_img));  
        } else {
            $filename = $old_img;
        }
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $data['image']= $filename;
        $data['status'] = 1;
        Admin::findOrFail($id)->update($data);
        $notification = array(
            'message' => 'Admin  updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.index')->with($notification);
    }


    public function inactive($id)
    {
        Admin::findOrFail($id)->update(['status' => Admin::$STATUS[0]]);
        $notification = array(
            'message' => 'Admin InActive Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function active($id)
    {
        Admin::findOrFail($id)->update(['status' => Admin::$STATUS[1]]);
        $notification = array(
            'message' => 'Admin Active Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function delete($id)
    {
        $admin  = Admin::findOrFail($id);
        if($admin->image !=  Admin::$DEFAULT_IMG)
        @unlink(public_path($admin->image));      

        $admin->delete();
        $notification = array(
            'message' => 'Admin Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    
}
