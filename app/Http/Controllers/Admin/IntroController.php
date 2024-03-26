<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StoreIntroRequest;
use App\Http\Requests\Admin\UpdateIntroRequest;
use App\Models\Intro;
use App\Traits\UploadIMGTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IntroController extends Controller
{
    use UploadImgTrait;
    public function index()
    {
        return view('admins.intros.index', ['intros' => Intro::latest()->get()]);
    }

    public function create()
    {
        return view('admins.intros.create');
    }

    public function store(StoreIntroRequest $request)
    {
        if ($request->file('image')) {
            $filename = $this->uploadImg($request->file('image'), 'upload/intros_images');
        } else {
            $filename = Intro::$DEFAULT_IMG;
        }

        $data = $request->validated();
        $data['image']= $filename;
        Intro::create($data);
        $notification = array(
            'message' => 'Intro created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('intros.index')->with($notification);
    }

    public function edit($id)
    {
        return view('admins.intros.edit', ['intro' => Intro::findOrFail($id)]);
    }

    public function update(UpdateIntroRequest $request, $id)
    {
        $old_img = Intro::where('id',$id)->value('image');
        if ($request->file('image')) {
            $filename = $this->uploadImg($request->file('image'), 'upload/intros_images');
            if($old_img !=  Intro::$DEFAULT_IMG)
            @unlink(public_path($old_img));  
        } else {
            $filename = $old_img;
        }
        Intro::findOrFail($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $filename,
        ]);
        $notification = array(
            'message' => 'Intro Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('intros.index')->with($notification);
    }

    public function delete($id)
    {
        $intro  = Intro::findOrFail($id);
        if($intro->image !=  Intro::$DEFAULT_IMG)
        @unlink(public_path($intro->image));      

        $intro->delete();
        $notification = array(
            'message' => 'Intro Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    
}
