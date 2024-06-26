@extends('admins.master')
@section('title', 'Edit Service Page')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Edit Service Page</h2>
                        <hr>
                        <form method="POST" action="{{ route('admins.service.update', $service->id) }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h5 class="mb-0">Name:</h5>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" required name="name"
                                        value="{{ $service->name }}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h5 class="mb-0">price:</h5>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="number" class="form-control" required name="price"
                                        value="{{ $service->price }}" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h5 class="mb-0">Select Provider:</h5>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <select class="form-select" name="provider_id" aria-label="Default select example"
                                        required>
                                        <option selected disabled>Select Provider</option>
                                        @foreach ($providers as $provider)
                                            <option value="{{ $provider->id }}"
                                                {{ $service->provider_id == $provider->id ? 'selected  ' : '' }}>
                                                {{ $provider->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h5 class="mb-0">Select Category:</h5>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <select class="form-select" name="category_id" aria-label="Default select example"
                                        required>
                                        <option selected disabled>Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $service->category_id == $category->id ? 'selected  ' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="submit" class="btn btn-primary px-4" value="Add Service" />
                                </div>
                            </div>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
