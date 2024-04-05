<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateContactUsRequest;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('admins.contact_us.index', ['data' => ContactUs::first()]);
    }

    public function update(UpdateContactUsRequest $request, $id)
    {
        $data = $request->validated();
        ContactUs::findOrFail($id)->update($data);
        $notification = array(
            'message' => 'Contact Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
