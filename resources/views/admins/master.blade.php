<!doctype html>
<html lang="en">

@include('admins.layouts.head')


<body data-topbar="dark">


    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('admins.layouts.header')
        @include('admins.layouts.sidebar')

        <div class="main-content">

            <!--    Start content -->
            <div class="page-content">
                @yield('content')
            </div>
            <!-- End Page-content -->

            <!-- Start Footer -->
            @include('admins.layouts.footer')
            <!-- End Footer -->
            
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->
    @include('admins.layouts.js')
</body>


</html>
