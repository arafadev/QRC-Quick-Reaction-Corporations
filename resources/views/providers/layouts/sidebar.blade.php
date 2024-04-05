<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div class="">
                <img src="{{ asset(auth()->user()->image) }}" alt="" class="avatar-md rounded-circle"
                    style="width: 100px; height: 100px;">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1">{{ auth()->user()->name }}</h4>
                <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i>
                    Online</span>
            </div>
        </div>
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="{{ request()->routeIs('provider.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('provider.dashboard') }}" class="waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('users.index') }}" class="waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>User</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('categories.index') }}" class="waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Categories</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('services.index') }}" class="waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Services</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="has-arrow waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Orders</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('new_orders.index') }}">New Orders</a></li>
                        <li><a href="{{ route('inprogress_orders.index') }}">Inprogress Orders</a></li>
                        <li><a href="{{ route('finished_orders.index') }}">Finished Orders</a></li>
                        <li><a href="{{ route('cancelled_orders.index') }}">Canceled Orders</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('providers.create_message') }}" class="waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Contact Message</span>
                    </a>
                </li>
            </ul>


        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
