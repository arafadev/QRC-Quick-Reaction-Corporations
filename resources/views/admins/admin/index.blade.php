@extends('admins.master')
@section('title', 'Admins')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Admins</h2><hr>
                        <a href="{{ route('admin.create') }}"><button type="button"
                                class="btn btn-primary waves-effect waves-light" style="float: right;">Add Admin</button></a>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Image </th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                    <tr>
                                        <td><img src="{{ asset($admin->image) }}" width="50px" height="50px"
                                                alt="admin image"></td>
                                        <td>{{ $admin->name }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td>{{ $admin->phone }}</td>
                                        <td>
                                            @if ($admin->status == 1)
                                                <a href="{{ route('admin.inactive', $admin->id) }}">
                                                    <button class="btn btn-success">Active</button>
                                                </a>
                                            @else
                                                <a href="{{ route('admin.active', $admin->id) }}">

                                                    <button class="btn btn-danger">Not
                                                        Active</button>
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.edit', $admin->id) }}"><button
                                                    class="btn btn-secondary">Edit </button></a>
                                            <a href="{{ route('admin.delete', $admin->id) }}"><button
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
