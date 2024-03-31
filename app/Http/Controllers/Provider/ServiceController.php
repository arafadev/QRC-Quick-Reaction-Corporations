<?php

namespace App\Http\Controllers\Provider;

use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Provider\StoreServiceRequest;
use App\Http\Requests\Provider\UpdateServiceRequest;

class ServiceController extends Controller
{
    public function index()
    {
        return view('providers.services.index', ['services' => Service::where('provider_id', auth()->user()->id)->get()]);
    }

    public function create()
    {
        $categories = Category::active()->get();
        return view('providers.services.create', ['categories' => $categories]);
    }

    public function store(StoreServiceRequest $request)
    {
        Service::create($request->validated() + ['provider_id' => auth()->user()->id]);
        $notification = array(
            'message' => 'Service Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('services.index')->with($notification);
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $categories = Category::active()->get();
        return view('providers.services.edit', compact('service', 'categories'));
    }

    public function update(UpdateServiceRequest $request, $id)
    {
        Service::findOrFail($id)->update($request->validated() + [auth()->user()->id]);
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
