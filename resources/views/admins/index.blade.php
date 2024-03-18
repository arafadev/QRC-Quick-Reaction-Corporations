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
                                <h4 class="mb-2">{{ $total_sales }}EG</h4>

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
                                <p class="text-truncate font-size-14 mb-2">New Orders</p>
                                <h4 class="mb-2">{{ $new_orders }}</h4>

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
                                <p class="text-truncate font-size-14 mb-2">New Users</p>
                                <h4 class="mb-2">{{ $usersCurrentWeek }}</h4>

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
                                <p class="text-truncate font-size-14 mb-2">Finished Order</p>
                                <h4 class="mb-2">{{ $finished_orders }}</h4>

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
        </div><!-- end row -->

        <div class="row">
            <div class="col-xl-6">

                <div class="card">
                    <div class="card-body pb-0">

                        <h4 class="card-title mb-4">Orders</h4>

                        <div class="text-center pt-3">
                            <div class="row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div class="d-inline-flex">
                                        <h5 class="me-2">{{ $finished_orders }}</h5>
                                    </div>
                                    <p class="text-muted text-truncate mb-0">All Orders Finished</p>
                                </div><!-- end col -->
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div class="d-inline-flex">
                                        <h5 class="me-2">{{ $finishedOrdersLastWeek }}</h5>

                                    </div>
                                    <p class="text-muted text-truncate mb-0">Last Week</p>
                                </div><!-- end col -->
                                <div class="col-sm-4">
                                    <div class="d-inline-flex">
                                        <h5 class="me-2">{{ $finishedOrdersLastMonth }}</h5>

                                    </div>
                                    <p class="text-muted text-truncate mb-0">Last Month</p>
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div>
                    </div>
                    <div id="orders_chart" dir="ltr"></div>
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
                                        <h5>{{ $finished_orders }}</h5>
                                        <p class="text-muted text-truncate mb-0">All Orders Finished

                                        </p>
                                    </div>
                                </div><!-- end col -->
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <div>
                                        <h5>{{ $finishedOrdersLastWeek_profits }}EG</h5>
                                        <p class="text-muted text-truncate mb-0">Last Week</p>
                                    </div>
                                </div><!-- end col -->
                                <div class="col-sm-4">
                                    <div>
                                        <h5>{{ $finishedOrdersLastMonth_profits }}EG</h5>
                                        <p class="text-muted text-truncate mb-0">Last Month</p>
                                    </div>
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div>
                    </div>
                    <div id="revenues_chart" dir="ltr"></div>
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Latest Finished Orders</h4>

                        <div class="table-responsive">
                            <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                <thead class="table-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Mail</th>
                                        <th>status</th>
                                        <th>Date</th>
                                        <th style="width: 120px;">Revenue</th>
                                    </tr>
                                </thead><!-- end thead -->
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>
                                                <h6 class="mb-0">{{ $order->user->name }}</h6>
                                            </td>
                                            <td>{{ $order->user->phone }}</td>
                                            <td>
                                                <div class="font-size-13"><i
                                                        class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>{{ $order->user->email }}
                                                </div>
                                            </td>
                                            <td>
                                                <i
                                                    class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>
                                                Active
                                            </td>
                                            <td>{{ $order->created_at->translatedFormat('l, F jS, Y \a\t g:i A') }}</td>

                                            <td>{{ $order->app_commission }}EG</td>
                                        </tr>
                                    @endforeach

                                    <!-- end -->
                                </tbody><!-- end tbody -->
                            </table> <!-- end table -->
                        </div>
                    </div><!-- end card -->
                </div><!-- end card -->
            </div>
            <!-- end col -->

        </div>
        <!-- end row -->
    </div>
    <!-- End Page-content -->
@endsection
@section('js')

    <!-- apexcharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        // Define new options for the chart
        var options = {
            series: [{
                name: 'Revenue',
                data: [{{ $finished_orders }}, {{ $finishedOrdersLastWeek_profits }},
                    {{ $finishedOrdersLastMonth_profits }}
                ]
            }],
            chart: {
                type: 'bar',
                height: 350,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '20%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: ['All Orders Finished', 'Last Week', 'Last Month'],
            },
            yaxis: {
                title: {
                    text: 'Revenue'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val + "EG";
                    }
                }
            }
        };

        // Render the new chart with updated data
        var chart = new ApexCharts(document.querySelector("#revenues_chart"), options);
        chart.render();
    </script>

    <script>
        // Define new options for the chart
        var options = {
            series: [{
                name: 'Orders',
                data: [{{ $finished_orders }}, {{ $finishedOrdersLastWeek }},
                    {{ $finishedOrdersLastMonth }}
                ]
            }],
            chart: {
                type: 'bar',
                height: 350,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '20%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: ['All Orders Finished', 'Last Week', 'Last Month'],
            },
            yaxis: {
                title: {
                    text: 'Orders'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val + "EG";
                    }
                }
            }
        };

        // Render the new chart with updated data
        var chart = new ApexCharts(document.querySelector("#orders_chart"), options);
        chart.render();
    </script>


@endsection
