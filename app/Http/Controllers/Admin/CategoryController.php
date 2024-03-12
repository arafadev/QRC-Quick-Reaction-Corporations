<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Provider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admins.categories.index', ['categories' => Category::latest()->get()]);
    }

    public function create()
    {
        return view('admins.categories.create', ['providers' => Provider::where('status' , Provider::$STATUS[1])->latest()->get()]);
    }

    public function store(StoreCategoryRequest $request)
    {
    
        Category::create($request->validated());
        $notification = array(
            'message' => 'Category  created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('categories.index')->with($notification);

    }

    public function edit($id)
    {
        $category =  Category::findOrFail($id);
        $providers = Provider::where('status' , Provider::$STATUS[1])->latest()->get();
    return view('admins.categories.edit', compact('category', 'providers'));
    }


    public function update(UpdateCategoryRequest $request, $id)
    {
        
        Category::findOrFail($id)->update($request->validated());
        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('categories.index')->with($notification);
    }

    public function active($id)
    {
        Category::findOrFail($id)->update(['status' => Category::$STATUS[1]]);
        $notification = array(
            'message' => 'Category Active Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id)
    {
        Category::findOrFail($id)->update(['status' => Category::$STATUS[0]]);
        $notification = array(
            'message' => 'Category InActive Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }



    public function delete($id)
    {
        Category::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Category  deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('categories.index')->with($notification);
    }
}
