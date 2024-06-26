@extends('admins.master')
@section('title', 'Users Page')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Users</h2>
                        <hr>
                        <a href="{{ route('admins.user.create') }}"><button type="button"
                                class="btn btn-primary waves-effect waves-light" style="float: right;">Add User</button></a>

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
                                @foreach ($users as $user)
                                    <tr>
                                        <td><img src="{{ asset($user->image) }}" width="50px" height="50px"
                                                alt="user image"></td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>
                                            @if ($user->status == 1)
                                                <a href="{{ route('admins.user.inactive', $user->id) }}"> <button
                                                        class="btn btn-success">Active</button></a>
                                            @else
                                                <a href="{{ route('admins.user.active', $user->id) }}"> <button
                                                        class="btn btn-danger">Not
                                                        Active</button></a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admins.user.edit', $user->id) }}"><button
                                                    class="btn btn-secondary">Edit </button></a>
                                            <a href="{{ route('admins.user.delete', $user->id) }}"><button
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
