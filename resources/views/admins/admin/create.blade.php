@extends('admins.master')
@section('title', 'Create Admin Page')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Add Admin Page</h2><hr>
                        <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Name:</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" required name="name" value="{{ old('name') }}" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email:</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="email" name="email" required class="form-control" value="{{ old('email') }}" />
                                    @error('email')
                                        <div class="bg-red-100 text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone: </h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="number" name="phone" required  class="form-control" value="{{ old('phone') }}" />
                                    @error('phone')
                                        <div class="bg-red-100 text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Password: </h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" id="password" required
                                        placeholder="New Password" />
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Confirm Password: </h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="password" name="password_confirmation" class="form-control" required
                                        id="password_confirmation" placeholder="Confirm Password" />
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Image:</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="file" name="image" class="form-control" id="image" />
                                    @error('image')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0"> </h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <img id="showImage"
                                        src="{{ !empty($admin->image) && $admin->image != 'no_image.jpg' ? url($admin->image) : url('upload/no_image.jpg') }}"
                                        alt="Admin" style="width:100px; height: 100px;">
                                </div>  
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
