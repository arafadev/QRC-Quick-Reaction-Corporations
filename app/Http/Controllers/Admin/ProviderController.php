<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admins\UpdateProviderRequest;
use App\Models\Provider;
use Illuminate\Http\Request;
use App\Traits\UploadImgTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admins\StoreProviderRequest;

class ProviderController extends Controller
{
    use UploadImgTrait;
    public function index()
    {
        return view('admins.providers.index', ['providers' => Provider::latest()->get()] );
    }

    public function create()
    {
        return view('admins.providers.create');
    }

    public function store(StoreProviderRequest $request)
    {
     
        if ($request->file('image')) {
            $filename = $this->uploadImg($request->file('image'), 'upload/providers_images');
        } else {
            $filename = Provider::$DEFAULT_IMG;
        }

        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $data['image'] =  $filename;
        $data['status'] = 1;
        Provider::create($data);
        $notification = array(
            'message' => 'Provider  created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('providers.index')->with($notification);
    }


    public function edit($id)
    {
        return view('admins.providers.edit', ['provider' => Provider::findOrFail($id)]);
    }

    public function update(UpdateProviderRequest $request, $id)
    {
        
        $old_img = Provider::where('id',$id)->value('image');
        if ($request->file('image')) {
            $filename = $this->uploadImg($request->file('image'), 'upload/providers_images');
            if($old_img != Provider::$DEFAULT_IMG)
            @unlink(public_path($old_img));  
        } else {
            $filename = $old_img;
        }

        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        if ($request->has('password')) {
            $data['password'] = Hash::make($data['password']);
        }
        $data['image'] =  $filename;
        $data['status'] = 1;
        Provider::findOrFail($id)->Update($data);
        $notification = array(
            'message' => 'Provider  Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('providers.index')->with($notification);
    }

}
