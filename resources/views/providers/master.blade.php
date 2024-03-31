<!doctype html>
<html lang="en">

@include('providers.layouts.head')


<body data-topbar="dark">


    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('providers.layouts.header')
        @include('providers.layouts.sidebar')

        <div class="main-content">

            <!--    Start content -->
            <div class="page-content">
                @yield('content')
            </div>
            <!-- End Page-content -->

            <!-- Start Footer -->
            @include('providers.layouts.footer')
            <!-- End Footer -->
            
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->
    @include('providers.layouts.js')
</body>


</html>
