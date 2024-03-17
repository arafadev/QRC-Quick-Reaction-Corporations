@extends('admins.master')
@section('title', 'Show Order Page')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h2>Show Order Page</h2>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Order No:</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" disabled value="{{ $order->order_num }}" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Provider:</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="email" class="form-control" disabled value="{{ $order->provider->name }}" />

                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">User:</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="email" class="form-control" disabled value="{{ $order->user->name }}" />

                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Patient Address:</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="email" class="form-control" disabled
                                    value="{{ $order->patient_map_desc }}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Hosiptal Address:</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="email" class="form-control" disabled
                                    value="{{ $order->hospital_map_desc }}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Treatment Date:</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="email" class="form-control" disabled value="{{ $order->date }}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Treatment Time:</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="email" class="form-control" disabled value="{{ $order->time }}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Type:</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="email" class="form-control" disabled value="{{ $order->type }}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Note: </h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <textarea disabled rows="5" cols="30">{{ $order->notes }}</textarea>
                                <!-- Adjust the number of columns (cols) as needed -->
                                @error('note')
                                    <div class="bg-red-100 text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h2>Order Services </h2>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Services Names:</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                @foreach ($order->orderItems as $item)
                                    <input type="text" class="form-control mb-1" disabled
                                        value="{{ $item->service->name }}" />
                                @endforeach
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Vat Value Ratio:</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="email" class="form-control" disabled
                                    value="{{ $order->vat_value_ratio }}%" />

                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Vat Value:</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="email" class="form-control" disabled value="{{ $order->vat_value }}EG" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Shpping Price:</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="email" class="form-control" disabled
                                    value="{{ $order->shipping_price }}EG" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">App Commession:</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="email" class="form-control" disabled
                                    value="{{ $order->app_commession }}EG" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Total Price:</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="email" class="form-control" disabled
                                    value="{{ $order->total_price }}EG" />
                            </div>
                        </div>


                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h2>Order Details </h2>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Status</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="email" class="form-control" disabled
                                    value="{{ ucfirst($order->status) }}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Cancelled By </h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="email" class="form-control" disabled
                                    value="{{ ucfirst($order->cancelled_by) }}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Payment Method </h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="email" class="form-control" disabled
                                    value="{{ $order->payment_method }}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Payment Method </h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="email" class="form-control" disabled
                                    value="{{ $order->payment_method }}" />
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-12 text-center mt-3 mb-3">
                <a href="{{ redirect()->back()->getTargetUrl() }}">
                    <button class="btn btn-primary center" style="color: white !important;">
                        <h3>Back</h3>
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection
