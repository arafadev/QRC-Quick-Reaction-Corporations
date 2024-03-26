@extends('admins.master')
@section('title', 'Intos')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Intros</h2>
                        <hr>
                        <a href="{{ route('intro.create') }}"><button type="button"
                                class="btn btn-primary waves-effect waves-light" style="float: right;">Add Intor</button></a>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Image </th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($intros as $intro)
                                    <tr>
                                        <td><img src="{{ asset($intro->image) }}" width="50px" height="50px"
                                                alt="intro image"></td>
                                        <td>{{ $intro->title }}</td>
                                        <td>{!! $intro->description !!}</td>
                                        <td>
                                            <a href="{{ route('intro.edit', $intro->id) }}"><button
                                                    class="btn btn-secondary">Edit </button></a>
                                            <a href="{{ route('intro.delete', $intro->id) }}"><button
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
