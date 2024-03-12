@extends('admins.master')
@section('title', 'Services Page')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Services</h2>
                        <hr>
                        <a href="{{ route('service.create') }}"><button type="button"
                                class="btn btn-primary waves-effect waves-light" style="float: right;">Add
                                Service</button></a>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Service Name</th>
                                    <th>Price Name</th>
                                    <th>Category Name</th>
                                    <th>provider Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                    <tr>
                                        <td>{{ $service->name }}</td>
                                        <td>{{ $service->price }} Eg</td>
                                        <td>{{ $service->category->name }}</td>
                                        <td>{{ $service->provider->name }}</td>
                                        <td>
                                            @if ($service->status == App\Models\Service::$STATUS[1])
                                                <a href="{{ route('service.inactive', $service->id) }}"> <button
                                                        class="btn btn-success">Active</button></a>
                                            @else
                                                <a href="{{ route('service.active', $service->id) }}"> <button
                                                        class="btn btn-danger">Not
                                                        Active</button></a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('service.edit', $service->id) }}"><button
                                                    class="btn btn-secondary">Edit </button></a>
                                            <a href="{{ route('service.delete', $service->id) }}"><button
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
