@extends('providers.master')
@section('title', 'Create Service Page')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Add Service Page</h2>
                        <hr>
                        <form method="POST" action="{{ route('service.store') }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h5 class="mb-0">Name:</h5>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" required name="name"
                                        value="{{ old('name') }}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h5 class="mb-0">price:</h5>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="number" class="form-control" required name="price"
                                        value="{{ old('price') }}" />
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
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
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
