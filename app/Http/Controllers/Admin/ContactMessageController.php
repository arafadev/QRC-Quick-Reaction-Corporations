<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {

        return view('admins.contact_messages.index', ['contact_messages' => ContactMessage::get()]);
    }
}
