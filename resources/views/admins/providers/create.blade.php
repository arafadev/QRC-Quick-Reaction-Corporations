@extends('admins.master')
@section('title', 'Create Provider Page')
@section('css')
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css' rel='stylesheet' />
    <style>
        #map { height: 400px; width: 100%; }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Add Provider Page</h2>
                        <hr>
                        <form method="POST" action="{{ route('provider.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Name:</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" required name="name"
                                        value="{{ old('name') }}" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email:</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="email" name="email" required class="form-control"
                                        value="{{ old('email') }}" />
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
                                        value="{{ old('phone') }}" />
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
                                    <textarea id="elm1" name="details"></textarea>
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
                                        value="{{ old('delivery_price') }}" />
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
                                    <div id='map'></div>
                                        <input type="hidden" id="latitude" name="lat">
                                        <input type="hidden" id="longitude" name="lng">
                                        <input type="hidden" id="map_desc" name="map_desc">
                                </div>
                            </div>
                            {{-- End Google Map --}}

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
        mapboxgl.accessToken = 'pk.eyJ1IjoiYWIwMGQwIiwiYSI6ImNsdHVoNTM3NzFhcHUyaXVseGFkczg3aWUifQ.tQCDTO7PvIduAsBQVAKo3g';

        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/satellite-v9',
            zoom: 12 // Initial zoom level
        });

        // Add navigation controls to the map
        map.addControl(new mapboxgl.NavigationControl());

        // Initialize marker variable
        var marker = null;

        // Function to fetch address based on coordinates
        function fetchAddress(latitude, longitude) {
            fetch(
                    `https://api.mapbox.com/geocoding/v5/mapbox.places/${longitude},${latitude}.json?access_token=${mapboxgl.accessToken}`)
                .then(response => response.json())
                .then(data => {
                    var address = data.features[0].place_name;
                    document.getElementById('map_desc').value = address;
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        // Function to handle map click event
        function handleMapClick(e) {
            var latitude = e.lngLat.lat;
            var longitude = e.lngLat.lng;

            // Remove the existing marker if it exists
            if (marker) {
                marker.remove();
            }

            // Add a marker at the clicked location
            marker = new mapboxgl.Marker()
                .setLngLat([longitude, latitude])
                .addTo(map);

            // Update form inputs with selected coordinates and fetch address
            document.getElementById('latitude').value = latitude;
            document.getElementById('longitude').value = longitude;
            fetchAddress(latitude, longitude);
        }

        // Get user's current location
        navigator.geolocation.getCurrentPosition(function(position) {
            var defaultLongitude = position.coords.longitude;
            var defaultLatitude = position.coords.latitude;

            map.setCenter([defaultLongitude, defaultLatitude]);

            // Add a marker for the current location
            marker = new mapboxgl.Marker()
                .setLngLat([defaultLongitude, defaultLatitude])
                .addTo(map);

            // Update form inputs with current coordinates and fetch address
            document.getElementById('latitude').value = defaultLatitude;
            document.getElementById('longitude').value = defaultLongitude;
            fetchAddress(defaultLatitude, defaultLongitude);
        });

        // Add a marker on click to select location
        map.on('click', handleMapClick);
    </script>
    <!--tinymce js-->
    <script src="{{ asset('backend/assets/libs/tinymce/tinymce.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('backend/assets/js/pages/form-editor.init.js') }}"></script>
@endsection
