@extends('admins.master')
@section('title', 'Providers Page')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Providers</h2><hr>
                        <a href="{{ route('provider.create') }}"><button type="button"
                                class="btn btn-primary waves-effect waves-light" style="float: right;">Add Provider</button></a>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Image </th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Avg Rate</th>
                                    <th>Delivery Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($providers as $provider)
                                    <tr>
                                        <td><img src="{{ asset($provider->image) }}" width="50px" height="50px"
                                                alt="Provider image"></td>
                                        <td>{{ $provider->name }}</td>
                                        <td>{{ $provider->email }}</td>
                                        <td>{{ $provider->avg_rate }}</td>
                                        <td>{{ $provider->delivery_price }}</td>
                                        <td>
                                            @if ($provider->status == 1)
                                                <a href="{{ route('provider.inactive', $provider->id) }}">
                                                    <button class="btn btn-success">Active</button>
                                                </a>
                                            @else
                                                <a href="{{ route('provider.active', $provider->id) }}">

                                                    <button class="btn btn-danger">Not
                                                        Active</button>
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('provider.edit', $provider->id) }}"><button
                                                    class="btn btn-secondary">Edit </button></a>
                                            <a href="{{ route('provider.delete', $provider->id) }}"><button
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
