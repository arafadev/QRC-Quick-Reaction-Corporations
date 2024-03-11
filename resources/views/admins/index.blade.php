@extends('admins.master')
@section('title', 'Admin Dashboard')
@section('content')

    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">QRC</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">Total Sales</p>
                                <h4 class="mb-2">1452</h4>
                                <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i
                                            class="ri-arrow-right-up-line me-1 align-middle"></i>9.23%</span>from
                                    previous period</p>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-primary rounded-3">
                                    <i class="ri-shopping-cart-2-line font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">New Orders</p>
                                <h4 class="mb-2">938</h4>
                                <p class="text-muted mb-0"><span class="text-danger fw-bold font-size-12 me-2"><i
                                            class="ri-arrow-right-down-line me-1 align-middle"></i>1.09%</span>from
                                    previous period</p>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-success rounded-3">
                                    <i class="mdi mdi-currency-usd font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">New Users</p>
                                <h4 class="mb-2">8246</h4>
                                <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i
                                            class="ri-arrow-right-up-line me-1 align-middle"></i>16.2%</span>from
                                    previous period</p>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-primary rounded-3">
                                    <i class="ri-user-3-line font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">Unique Visitors</p>
                                <h4 class="mb-2">29670</h4>
                                <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i
                                            class="ri-arrow-right-up-line me-1 align-middle"></i>11.7%</span>from
                                    previous period</p>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-success rounded-3">
                                    <i class="mdi mdi-currency-btc font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div><!-- end row -->

        <div class="row">
            <div class="col-xl-6">

                <div class="card">
                    <div class="card-body pb-0">

                        <h4 class="card-title mb-4">Complaints</h4>

                        <div class="text-center pt-3">
                            <div class="row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div class="d-inline-flex">
                                        <h5 class="me-2">25,117</h5>
                                        <div class="text-success font-size-12">
                                            <i class="mdi mdi-menu-up font-size-14"> </i>2.2 %
                                        </div>
                                    </div>
                                    <p class="text-muted text-truncate mb-0">Marketplace</p>
                                </div><!-- end col -->
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div class="d-inline-flex">
                                        <h5 class="me-2">$34,856</h5>
                                        <div class="text-success font-size-12">
                                            <i class="mdi mdi-menu-up font-size-14"> </i>1.2 %
                                        </div>
                                    </div>
                                    <p class="text-muted text-truncate mb-0">Last Week</p>
                                </div><!-- end col -->
                                <div class="col-sm-4">
                                    <div class="d-inline-flex">
                                        <h5 class="me-2">$18,225</h5>
                                        <div class="text-success font-size-12">
                                            <i class="mdi mdi-menu-up font-size-14"> </i>1.7 %
                                        </div>
                                    </div>
                                    <p class="text-muted text-truncate mb-0">Last Month</p>
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div>
                    </div>
                    <div class="card-body py-0 px-2">
                        <div id="area_chart" class="apex-charts" dir="ltr"></div>
                    </div>
                </div><!-- end card -->
            </div>
            <!-- end col -->
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body pb-0">

                        <h4 class="card-title mb-4">Revenue</h4>

                        <div class="text-center pt-3">
                            <div class="row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div>
                                        <h5>17,493</h5>
                                        <p class="text-muted text-truncate mb-0">Marketplace</p>
                                    </div>
                                </div><!-- end col -->
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div>
                                        <h5>$44,960</h5>
                                        <p class="text-muted text-truncate mb-0">Last Week</p>
                                    </div>
                                </div><!-- end col -->
                                <div class="col-sm-4">
                                    <div>
                                        <h5>$29,142</h5>
                                        <p class="text-muted text-truncate mb-0">Last Month</p>
                                    </div>
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div>
                    </div>
                    <div class="card-body py-0 px-2">
                        <div id="column_line_chart" class="apex-charts" dir="ltr"></div>
                    </div>
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            </div>
                        </div>

                        <h4 class="card-title mb-4">Latest Transactions</h4>

                        <div class="table-responsive">
                            <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                <thead class="table-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Mail</th>
                                        <th>status</th>
                                        <th>Start date</th>
                                        <th style="width: 120px;">Revenue</th>
                                    </tr>
                                </thead><!-- end thead -->
                                <tbody>
                                    <tr>
                                        <td>
                                            <h6 class="mb-0">rofida Casey</h6>
                                        </td>
                                        <td>01031456135</td>
                                        <td>
                                            <div class="font-size-13"><i
                                                    class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>rofida@gmail.com
                                            </div>
                                        </td>
                                        <td>
                                            <i
                                                class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>
                                            Active
                                        </td>
                                        <td>
                                            04 Apr, 2021
                                        </td>
                                        <td>$42,450</td>
                                    </tr>
                                    <!-- end -->
                                    <tr>
                                        <td>
                                            <h6 class="mb-0">rofida walid</h6>
                                        </td>
                                        <td>01031456135</td>
                                        <td>
                                            <div class="font-size-13"><i
                                                    class="ri-checkbox-blank-circle-fill font-size-10 text-warning align-middle me-2"></i>rofida@gmail.com
                                            </div>
                                        </td>
                                        <td>
                                            <i
                                                class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>
                                            Active
                                        </td>
                                        <td>
                                            01 Aug, 2021
                                        </td>
                                        <td>$25,060</td>
                                    </tr>
                                    <!-- end -->
                                    <tr>
                                        <td>
                                            <h6 class="mb-0">rofida mohamed</h6>
                                        </td>
                                        <td>01031456135</td>
                                        <td>
                                            <div class="font-size-13"><i
                                                    class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>rofida@gmail.com
                                            </div>
                                        </td>
                                        <td>
                                            <i
                                                class="ri-checkbox-blank-circle-fill font-size-10 text-warning align-middle me-2"></i>Not
                                            Active
                                        </td>
                                        <td>
                                            15 Jun, 2021
                                        </td>
                                        <td>$59,350</td>
                                    </tr>
                                    <!-- end -->
                                    <tr>
                                        <td>
                                            <h6 class="mb-0">rofida taha</h6>
                                        </td>
                                        <td>01031456135</td>
                                        <td>
                                            <div class="font-size-13"><i
                                                    class="ri-checkbox-blank-circle-fill font-size-10 text-warning align-middle me-2"></i>rofida@gmail.com
                                            </div>
                                        </td>
                                        <td>
                                            <i
                                                class="ri-checkbox-blank-circle-fill font-size-10 text-warning align-middle me-2"></i>Not
                                            Active
                                        </td>
                                        <td>
                                            01 March, 2021
                                        </td>
                                        <td>$23,700</td>
                                    </tr>
                                    <!-- end -->
                                    <tr>
                                        <td>
                                            <h6 class="mb-0">rofida mohsen</h6>
                                        </td>
                                        <td>01031456135</td>
                                        <td>
                                            <div class="font-size-13"><i
                                                    class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>rofida@gmail.com
                                            </div>
                                        </td>
                                        <td>
                                            <i
                                                class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>
                                            Active
                                        </td>
                                        <td>
                                            01 Jan, 2021
                                        </td>
                                        <td>$69,185</td>
                                    </tr>
                                    <!-- end -->
                                    <tr>
                                        <td>
                                            <h6 class="mb-0">rofida mohamed</h6>
                                        </td>
                                        <td>01031456135</td>
                                        <td>
                                            <div class="font-size-13"><i
                                                    class="ri-checkbox-blank-circle-fill font-size-10 text-warning align-middle me-2"></i>rofida@gmail.com
                                            </div>
                                        </td>
                                        <td>
                                            <i
                                                class="ri-checkbox-blank-circle-fill font-size-10 text-warning align-middle me-2"></i>Not
                                            Active
                                        </td>
                                        <td>
                                            01 Sep, 2021
                                        </td>
                                        <td>$37,845</td>
                                    </tr>
                                    <!-- end -->
                                    <tr>
                                        <td>
                                            <h6 class="mb-0">rofida taha</h6>
                                        </td>
                                        <td>01031456135</td>
                                        <td>
                                            <div class="font-size-13"><i
                                                    class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>rofida@gmail.com
                                            </div>
                                        </td>
                                        <td>
                                            <i
                                                class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active
                                        </td>
                                        <td>
                                            20 May, 2021
                                        </td>
                                        <td>$55,100</td>
                                    </tr>
                                    <!-- end -->
                                </tbody><!-- end tbody -->
                            </table> <!-- end table -->
                        </div>
                    </div><!-- end card -->
                </div><!-- end card -->
            </div>
            <!-- end col -->
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4">Monthly Earnings</h4>

                        <div class="row">
                            <div class="col-4">
                                <div class="text-center mt-4">
                                    <h5>3475</h5>
                                    <p class="mb-2 text-truncate">Market Place</p>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-4">
                                <div class="text-center mt-4">
                                    <h5>458</h5>
                                    <p class="mb-2 text-truncate">Last Week</p>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-4">
                                <div class="text-center mt-4">
                                    <h5>9062</h5>
                                    <p class="mb-2 text-truncate">Last Month</p>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="mt-4">
                            <div id="donut-chart" class="apex-charts"></div>
                        </div>
                    </div>
                </div><!-- end card -->
            </div><!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- End Page-content -->
@endsection
@section('js')

    <!-- apexcharts -->
    <script src="{{ asset('backend/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- jquery.vectormap map -->
    <script src="{{ asset('backend/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}">
    </script>
    <script src="{{ asset('backend/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') }}">
    </script>

@endsection
