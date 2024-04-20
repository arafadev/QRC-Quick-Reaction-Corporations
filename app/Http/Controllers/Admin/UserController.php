<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admins\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\UploadImgTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admins\StoreUserRequest;

class UserController extends Controller
{
    use UploadImgTrait;
    public function index()
    {
        return view('admins.users.index', ['users' => User::latest()->get()]);
    }

   
    public function create()
    {
        return view('admins.users.create');
    }

public function store(StoreUserRequest $request)
    {
        if ($request->file('image')) {
            $filename = $this->uploadImg($request->file('image'), 'upload/users_images');
        } else {
            $filename = User::$DEFAULT_IMG;
        }

        $data = $request->validated();
        $data['image']= $filename;
        $data['status'] = 1;
        User::create($data);
        $notification = array(
            'message' => 'User created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admins.users.index')->with($notification);
      
    }
    
    public function edit($id)
    {
        return view('admins.users.edit', ['user' => User::findOrFail($id)]);
    }
    public function update(UpdateUserRequest $request , $id)
    {

        $old_img = User::where('id',$id)->value('image');
        if ($request->file('image')) {
            $filename = $this->uploadImg($request->file('image'), 'upload/users_images');
            if($old_img !=  User::$DEFAULT_IMG)
            @unlink(public_path($old_img));  
        } else {
            $filename = $old_img;
        }
        User::findOrFail($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $filename,
        ]);
        $notification = array(
            'message' => 'User Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admins.users.index')->with($notification);
    }


    public function inactive($id)
    {
        User::findOrFail($id)->update(['status' => User::$STATUS[0]]);
        $notification = array(
            'message' => 'User InActive Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function active($id)
    {
        User::findOrFail($id)->update(['status' => User::$STATUS[1]]);
        $notification = array(
            'message' => 'User Active Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function delete($id)
    {
        $user  = User::findOrFail($id);
        if($user->image !=  User::$DEFAULT_IMG)
        @unlink(public_path($user->image));      

        $user->delete();
        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    

}
