<?php

namespace App\Http\Controllers\Provider;

use App\Models\Provider;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Provider\StoreContactMessageRequest;

class ContactMessageController extends Controller
{
    public function createMessage()
    {
        $data = ContactUs::first();

        return view('providers.contact_messages.create', ['data' => $data]);
    }

    public function create(StoreContactMessageRequest $request)
    {
        ContactMessage::create($request->validated() +
            [
                'contactable_id' => auth('provider')->user()->id,
                'contactable_type' => Provider::class
            ]);

        $notification = array(
            'message' => 'Message Sended For Administration Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
