<?php

namespace App\Http\Controllers\Provider;

use App\Models\Provider;
use Illuminate\Http\Request;
use App\Traits\UploadImgTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Provider\UpdateProviderProfileRequest;

class ProviderProfileController extends Controller
{
    use UploadImgTrait;
    public function index()
    {
        return view('providers.profile.index');
    }

    public function update(UpdateProviderProfileRequest $request)
    {
        if ($request->file('image')) {
            $filename = $this->uploadImg($request->file('image'), 'upload/providers_images');
            if (auth()->user()->image != Provider::$DEFAULT_IMG)
                @unlink(public_path(auth()->user()->image));
        } else {
            $filename = auth()->user()->image;
        }
        auth('provider')->user()->update([
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
