@extends('admins.master')
@section('title', 'Contact Us Page')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('admins.contact_us.update', $data->id) }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email:</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="email" name="email" class="form-control" value="{{ $data->email }}" />
                                    @error('email')
                                        <div class="bg-red-100 text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">WhatsApp:</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="whatsapp" class="form-control"
                                        value="{{ $data->whatsapp }}" />
                                    @error('whatsapp')
                                        <div class="bg-red-100 text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone </h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="phone" class="form-control"
                                        value="{{ $data->phone }}" />
                                    @error('phone')
                                        <div class="bg-red-100 text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="submit" class="btn btn-primary px-4" value="Update Changes" />
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
