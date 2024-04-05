@extends('admins.master')
@section('title', 'Contact Messages')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Categories</h2>
                        <hr>
                        <a href="{{ route('admins.category.create') }}"><button type="button"
                                class="btn btn-primary waves-effect waves-light" style="float: right;">Add
                                Category</button></a>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Type</th>
                                    <th>Show</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contact_messages as $message)
                                    <tr>
                                        <td>{{ $message->email }}</td>
                                        <td>{{ $message->phone }}</td>
                                        <td>{{ $message->message }}</td>
                                        <td>{{ $message->contactable_type }}</td>
                                        <a href="{{ route('admins.cancelled_order.show', $order->id) }}"> <button
                                                type="button" class="btn btn-primary">
                                                <i class="bi bi-eye"></i>
                                                Show
                                            </button>
                                        </a>
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
