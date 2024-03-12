@extends('admins.master')
@section('title', 'Edit Provider Page')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Edit Provider Page</h2>
                        <hr>
                        <form method="POST" action="{{ route('provider.update', $provider->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Name:</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" required name="name"
                                        value="{{ $provider->name }}" value="{{ old('name') }}" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email:</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="email" name="email" required class="form-control"
                                        value="{{ $provider->email }}" value="{{ old('email') }}" />
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
                                    <input type="number" name="phone" required class="form-control"
                                        value="{{ $provider->phone }}" value="{{ old('phone') }}" />
                                    @error('phone')
                                        <div class="bg-red-100 text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Details: </h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <textarea id="elm1" name="details"> {{ $provider->details }}"</textarea>
                                    @error('details')
                                        <div class="bg-red-100 text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Delivery Price: </h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="number" name="delivery_price" required class="form-control"
                                        value={{ $provider->delivery_price }} />
                                    @error('delivery_price')
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
                                        class="form-control @error('password') is-invalid @enderror" id="password" 
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
                                    <input type="password" name="password_confirmation" class="form-control" 
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
                                        src="{{ !empty($provider->image) && $provider->image != 'no_image.jpg' ? url($provider->image) : url('upload/no_image.jpg') }}"
                                        alt="Admin" style="width:100px; height: 100px;">
                                </div>
                            </div>
                            {{-- Google Map --}}
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Provider Location:</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" id="map_desc" class="form-control" name="map_desc" value=""
                                        placeholder="Enter Location">
                                    <hr>
                                    <div class="mb-2 mt-1" id="map" style="height: 500px;width: 800px;"></div>
                                    <input type="hidden" id="lat" name="lat"  value="{{ $provider->lat }}">
                                    <input type="hidden" id="lng" name="lng" value="{{ $provider->lng }}">
                                    {{-- End Google Map --}}
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
    <script>
        function initMap() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(p) {
                    const myLatlng = {
                        lat: p.coords.latitude,
                        lng: p.coords.longitude
                    };

                    const map = new google.maps.Map(document.getElementById("map"), {
                        zoom: 18,
                        center: myLatlng,
                        mapTypeControl: false,
                        streetViewControl: false,

                    });

                    $('#lat').val(p.coords.latitude)
                    $('#lng').val(p.coords.longitude)
                    GetAddress(new google.maps.LatLng(p.coords.latitude, p.coords.longitude))

                    // var input = document.getElementById('searchTextField');
                    // var autocomplete = new google.maps.places.Autocomplete(input);
                    // const geocoder = new google.maps.Geocoder();
                    //
                    // document.getElementById("searchTextField").addEventListener("keyup", () => {
                    // geocodeAddress(geocoder, map);
                    // });
                    //
                    // document.getElementById("searchTextField").addEventListener("change", () => {
                    // geocodeAddress(geocoder, map);
                    // });

                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(p.coords.latitude, p.coords.longitude),
                        map: map,
                        title: 'Set lat/lon values for this property',
                        draggable: true,
                        streetViewControl: false,

                    });

                    google.maps.event.addListener(marker, 'dragend', function(event) {
                        document.getElementById("lat").value = this.getPosition().lat();
                        document.getElementById("lng").value = this.getPosition().lng();
                        GetAddress(new google.maps.LatLng(marker.getPosition().lat(), marker.getPosition()
                            .lng()))
                    });

                    google.maps.event.addListener(map, 'click', function(event) {
                        $('#lat').val(event.latLng.lat())
                        $('#lng').val(event.latLng.lng())
                        GetAddress(new google.maps.LatLng(event.latLng.lat(), event.latLng.lng()))
                        marker.setPosition(event.latLng);
                        map.setCenter(event.latLng);
                        map.setZoom(18);

                    });
                });
            }
        }

        function GetAddress(latlng) {
            var geocoder = geocoder = new google.maps.Geocoder();
            geocoder.geocode({
                'latLng': latlng
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[1]) {
                        $("#address").val(results[1].formatted_address);
                        $("#address2").val(results[1].formatted_address);
                        document.getElementById("searchTextField").value = results[1].formatted_address;
                    }
                }
            });
        }

        function geocodeAddress(geocoder, resultsMap) {
            const address = document.getElementById("searchTextField").value;
            geocoder.geocode({
                address: address
            }, (results, status) => {
                if (status === "OK") {

                    $('#lat').val(results[0].geometry.location.lat())
                    $('#lng').val(results[0].geometry.location.lng())

                    resultsMap.setCenter(results[0].geometry.location);


                    const myLatlng = {
                        lat: results[0].geometry.location.lat(),
                        lng: results[0].geometry.location.lng()
                    };
                    const map = new google.maps.Map(document.getElementById("map"), {
                        zoom: 18,
                        center: myLatlng,
                        mapTypeControl: false,
                        streetViewControl: false,

                    });
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(results[0].geometry.location.lat(), results[0]
                            .geometry.location.lng()),
                        map: map,
                        title: 'Set lat/lon values for this property',
                        draggable: true,
                        streetViewControl: false,
                    });

                    google.maps.event.addListener(marker, 'dragend', function(event) {
                        document.getElementById("latitude").value = this.getPosition().lat();
                        document.getElementById("longitude").value = this.getPosition().lng();
                    });

                    google.maps.event.addListener(map, 'click', function(event) {
                        $('#lat').val(event.latLng.lat())
                        $('#lng').val(event.latLng.lng())
                        marker.setPosition(event.latLng);
                        map.setCenter(event.latLng);
                        map.setZoom(18);
                    });
                } else {
                    alert("Geocode was not successful for the following reason: " + status);
                }
            });
        }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9_ve_oT3ynCaAF8Ji4oBuDjOhWEHE92U&callback=initMap"
        type="text/javascript"></script>

    <!--tinymce js-->
    <script src="{{ asset('backend/assets/libs/tinymce/tinymce.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('backend/assets/js/pages/form-editor.init.js') }}"></script>
@endsection
