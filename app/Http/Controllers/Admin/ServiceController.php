<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StoreServiceRequest;
use App\Http\Requests\Admin\UpdateServiceRequest;
use App\Models\Service;
use App\Models\Category;
use App\Models\Provider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index()
    {
        return view('admins.services.index', ['services' => Service::latest()->get()]);
    }

    public function create()
    {
        $categories =  Category::where('status', Category::$STATUS[1])->get();
        $providers = Provider::where('status' , Provider::$STATUS[1])->latest()->get();
        return view('admins.services.create', compact('categories', 'providers'));
    }


    public function store(StoreServiceRequest $request )
    {
        Service::create($request->validated());
        $notification = array(
            'message' => 'Service Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('services.index')->with($notification);
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $categories =  Category::where('status', Category::$STATUS[1])->get();
        $providers = Provider::where('status' , Provider::$STATUS[1])->latest()->get();
        return view('admins.services.edit', compact('service','categories', 'providers'));
    }

    public function update(UpdateServiceRequest $request, $id)
    {
        Service::findOrFail($id)->update($request->validated());
        $notification = array(
            'message' => 'Service Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('services.index')->with($notification);
    }

    
    public function active($id)
    {
        Service::findOrFail($id)->update(['status' => Service::$STATUS[1]]);
        $notification = array(
            'message' => 'Service Active Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id)
    {
        Service::findOrFail($id)->update(['status' => Service::$STATUS[0]]);
        $notification = array(
            'message' => 'Service InActive Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function delete($id)
    {
        Service::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Service Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('services.index')->with($notification);
    }
}
