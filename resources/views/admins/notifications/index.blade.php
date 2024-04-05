@extends('admins.master')
@section('title', 'Notifications Page')
@section('content')
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">

    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Notification</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Notifications</a></li>
                            <li class="breadcrumb-item active">Index</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <!-- Left sidebar -->
                <div class="email-leftbar card">
                    <div class="d-grid">
                        <!-- Button to trigger delete action -->
                        <button type="button" class="btn btn-danger waves-effect waves-light"
                            onclick="deleteSelectedNotifications()">
                            Delete
                        </button>
                    </div>
                </div>
                <!-- End Left sidebar -->
                <!-- Right Sidebar -->
                <div class="email-rightbar mb-3">
                    <div class="card" id="notificationList"> <!-- Add an id to this div -->
                        @foreach ($notifications as $notification)
                            @if ($notification->type == 'App\Notifications\CreateCategory')
                                <ul class="message-list" id="notification{{ $notification->id }}">
                                    <!-- Add an id to each notification -->
                                    <li>
                                        <div class="col-mail col-mail-1">
                                            <div class="checkbox-wrapper-mail">
                                                <!-- Checkbox for each notification -->
                                                <input type="checkbox" name="noty_ids[]" id="chk.{{ $notification->id }}"
                                                    value="{{ $notification->id }}">
                                                <label class="form-label" for="chk.{{ $notification->id }}"
                                                    class="toggle"></label>
                                            </div>
                                            <span href="#" class="title">
                                                @php
                                                    $data = json_decode($notification->data, true);
                                                    $providerName = isset($data['provider_name'])
                                                        ? $data['provider_name']
                                                        : 'Unknown Provider';
                                                    echo $providerName;
                                                @endphp
                                            </span>
                                        </div>
                                        <div class="col-mail col-mail-2">
                                            <a href="#" class="subject">–
                                                <span class="teaser">
                                                    @php
                                                        $categoryName = isset($data['category_name'])
                                                            ? $data['category_name']
                                                            : 'Unknown Category';
                                                        echo $categoryName . ' Category Is Added By ' . $providerName;
                                                    @endphp
                                                </span>
                                            </a>
                                            <div class="date">
                                                {{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans(null, true) }}
                                            </div>

                                        </div>
                                    </li>
                                </ul>
                            @else
                                <ul class="message-list" id="notification{{ $notification->id }}">
                                    <!-- Add an id to each notification -->
                                    <li>
                                        <div class="col-mail col-mail-1">
                                            <div class="checkbox-wrapper-mail">
                                                <!-- Checkbox for each notification -->
                                                <input type="checkbox" name="noty_ids[]" id="chk.{{ $notification->id }}"
                                                    value="{{ $notification->id }}">
                                                <label class="form-label" for="chk.{{ $notification->id }}"
                                                    class="toggle"></label>
                                            </div>
                                            <span href="#" class="title">
                                                @php
                                                    $data = json_decode($notification->data, true);
                                                    $providerName = isset($data['provider_name'])
                                                        ? $data['provider_name']
                                                        : 'Unknown Provider';
                                                    echo $providerName;
                                                @endphp
                                            </span>
                                        </div>
                                        <div class="col-mail col-mail-2">
                                            <a href="#" class="subject">–
                                                <span class="teaser">
                                                    @php
                                                        $serviceName = isset($data['service_name'])
                                                            ? $data['service_name']
                                                            : 'Unknown service';
                                                        echo $serviceName . ' Service Is Added By ' . $serviceName;
                                                    @endphp
                                                </span>
                                            </a>
                                            <div class="date">
                                                {{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans(null, true) }}
                                            </div>

                                        </div>
                                    </li>
                                </ul>
                            @endif
                        @endforeach
                    </div> <!-- card -->

                  
                </div> <!-- end Col-9 -->
            </div>
        </div><!-- End row -->
    </div> <!-- container-fluid -->
@endsection
@section('js')
    <script>
        // Function to handle delete action
        function deleteSelectedNotifications() {
            // Get all checkboxes
            var checkboxes = document.querySelectorAll('input[name="noty_ids[]"]:checked');
            var notificationIds = [];

            // Iterate over checkboxes to get their values (notification IDs)
            checkboxes.forEach(function(checkbox) {
                notificationIds.push(checkbox.value);
            });

            // Send an AJAX request to delete selected notifications
            if (notificationIds.length > 0) {
                // You need to replace the URL with your actual delete route
                var url = '{{ route('admins.notifications.delete') }}';

                // Send an AJAX request
                fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            ids: notificationIds
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Handle response
                        if (data.success) {
                            // Remove the deleted notifications from the screen
                            notificationIds.forEach(id => {
                                var notificationElement = document.getElementById('notification' + id);
                                if (notificationElement) {
                                    notificationElement.remove();
                                }
                            });
                            // Show success message
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: data.message
                            });
                        } else {
                            // Show error message
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: data.message
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        // Show error message
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Failed to delete notifications'
                        });
                    });
            } else {
                alert('No notifications selected for deletion.');
            }
        }
    </script>
@endsection
