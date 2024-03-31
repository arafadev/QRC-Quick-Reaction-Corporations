<?php

namespace App\Http\Controllers\Provider;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Provider\StoreCategoryRequest;
use App\Http\Requests\Provider\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        return view('providers.categories.index', ['categories' => Category::where('provider_id', auth()->user()->id)->latest()->get()]);
    }

    public function create()
    {
        return view('providers.categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {

        Category::create($request->validated() + ['provider_id' => auth()->user()->id]);
        $notification = array(
            'message' => 'Category created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('categories.index')->with($notification);
    }

    public function edit($id)
    {
        return view('providers.categories.edit', ['category' => Category::findOrFail($id)]);
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

    public function update(UpdateCategoryRequest $request, $id)
    {

        Category::findOrFail($id)->update($request->validated() + ['provider_id' => Auth::id()]);
        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('categories.index')->with($notification);
    }


    public function delete($id)
    {
        Category::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Category deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('categories.index')->with($notification);
    }
}
