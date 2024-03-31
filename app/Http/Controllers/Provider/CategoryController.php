<?php

namespace App\Http\Controllers\Provider;

use App\Http\Requests\Provider\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        return view('providers.categories.index', ['categories' => Category::where('provider_id', auth()->user()->id)->get()]);
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
    return view('admins.categories.edit', ['category' => Category::findOrFail($id)]);
    }

}
