@extends('providers.master')
@section('title', 'Contact Us Page')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Contact Us:</h3>
                        <hr>

                        <strong>Email:</strong> <span class="badge bg-success mb-3 ml-5">{{ $data->email }}</span><br>
                        <strong>Mobile Number:</strong> <span class="badge bg-success mb-3">+{{ $data->phone }}</span><br>
                        <strong>Whatsapp:</strong> <span class="badge bg-success">+{{ $data->whatsapp }}</span><br>
                        <hr>
                        <form method="post" action="{{ route('providers.contact_us.create', $data->id) }}">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email:</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="email" name="email" class="form-control" />
                                    @error('email')
                                        <div class="bg-red-100 text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone </h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="number" name="phone" class="form-control" />
                                    @error('phone')
                                        <div class="bg-red-100 text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Message </h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <textarea id="elm1" name="message"></textarea>
                                    @error('message')
                                        <div class="bg-red-100 text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="submit" class="btn btn-primary px-4" value="Send Message" />
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!--tinymce js-->
    <script src="{{ asset('backend/assets/libs/tinymce/tinymce.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('backend/assets/js/pages/form-editor.init.js') }}"></script>
@endsection
