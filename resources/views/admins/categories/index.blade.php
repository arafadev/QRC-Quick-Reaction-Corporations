@extends('admins.master')
@section('title', 'Category Page')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Users</h2>
                        <hr>
                        <a href="{{ route('category.create') }}"><button type="button"
                                class="btn btn-primary waves-effect waves-light" style="float: right;">Add
                                Category</button></a>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Provider Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->provider->name }}</td>
                                        <td>
                                            @if (App\Models\Category::$STATUS[1])
                                                <a href="{{ route('user.inactive', $category->id) }}"> <button
                                                        class="btn btn-success">Active</button></a>
                                            @else
                                                <a href="{{ route('user.active', $category->id) }}"> <button
                                                        class="btn btn-danger">Not
                                                        Active</button></a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('category.edit', $category->id) }}"><button
                                                    class="btn btn-secondary">Edit </button></a>
                                            <a href="{{ route('category.delete', $category->id) }}"><button
                                                    class="btn btn-danger">Delete </button></a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
