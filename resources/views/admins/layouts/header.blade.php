   <!-- Start Header -->
   <header id="page-topbar">
       <div class="navbar-header">
           <div class="d-flex">
               <!-- LOGO -->
               <div class="navbar-brand-box">
                   <a href="index.html" class="logo logo-dark">
                       <span class="logo-sm">
                           <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="logo-sm" height="22">
                       </span>
                       <span class="logo-lg">
                           <img src="{{ asset('backend/assets/images/logo-dark.png') }}" alt="logo-dark" height="20">
                       </span>
                   </a>

                   <a href="{{ route('admin.dashboard') }}" class="logo logo-light">
                       <span class="logo-sm">
                           <img src="{{ asset('backend/assets/images/logo.png') }}" alt="logo-sm-light" height="150">
                       </span>
                       <span class="logo-lg">
                           <img src="{{ asset('backend/assets/images/logo.png') }}" alt="logo-light" height="200"
                               width="200">
                       </span>
                   </a>
               </div>

               <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect"
                   id="vertical-menu-btn">
                   <i class="ri-menu-2-line align-middle"></i>
               </button>


           </div>
           <div class="d-flex">
               <div class="dropdown d-inline-block d-lg-none ms-2">
                   <button type="button" class="btn header-item noti-icon waves-effect"
                       id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                       <i class="ri-search-line"></i>
                   </button>
                   <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                       aria-labelledby="page-header-search-dropdown">

                       <form class="p-3">
                           <div class="mb-3 m-0">
                               <div class="input-group">
                                   <input type="text" class="form-control" placeholder="Search ...">
                                   <div class="input-group-append">
                                       <button class="btn btn-primary" type="submit"><i
                                               class="ri-search-line"></i></button>
                                   </div>
                               </div>
                           </div>
                       </form>
                   </div>
               </div>

               <div class="dropdown d-none d-sm-inline-block">

                   <div class="dropdown-menu dropdown-menu-end">
                   </div>
               </div>



               <div class="dropdown d-none d-lg-inline-block ms-1">
                   <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                       <i class="ri-fullscreen-line"></i>
                   </button>
               </div>

               <div class="dropdown d-inline-block">
                   <button type="button" class="btn header-item noti-icon waves-effect"
                       id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                       <i class="ri-notification-3-line"></i>
                       <span class="noti-dot"></span>
                   </button>
                   <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                       aria-labelledby="page-header-notifications-dropdown">
                       <div class="p-3">
                           <div class="row align-items-center">
                               <div class="col">
                                   <h6 class="m-0"> Notifications ({{ Auth::User()->unreadNotifications->count() }})
                                   </h6>
                               </div>
                               {{-- <div class="col-auto">
                                   <a href="#!" class="small"> View All</a>
                               </div> --}}
                           </div>
                       </div>
                       <div data-simplebar style="max-height: 230px;">
                           @foreach (auth()->user()->unreadNotifications() as $notification)
                               <a href="" class="text-reset notification-item">
                                   <div class="d-flex">
                                       <div class="avatar-xs me-3">
                                           <span class="avatar-title bg-primary rounded-circle font-size-16">
                                               @php
                                                   $provider_image = App\Models\Provider::findOrFail(
                                                       $notification->data['provider_id'],
                                                   )->image;
                                               @endphp
                                               <img src="{{ asset($provider_image) }}" width="40px" height="40px"
                                                   alt="provider image">
                                           </span>
                                       </div>
                                       <div class="flex-1">
                                           <h6 class="mb-1">{{ $notification->data['provider_name'] }} </h6>
                                           <div class="font-size-12 text-muted">
                                               <p class="mb-1">
                                                   @if ($notification->type == 'App\Notifications\CreateCategory')
                                                       {{ $notification->data['category_name'] }} Category Is Added By
                                                       {{ $notification->data['provider_name'] }}
                                                   @else
                                                       {{ $notification->data['service_name'] }} Service Is Added By
                                                       {{ $notification->data['provider_name'] }}
                                                   @endif
                                               </p>
                                               <p class="mb-0">
                                                   {{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans(null, true) }}
                                               </p>
                                           </div>
                                       </div>
                                   </div>
                               </a>
                           @endforeach
                       </div>
                       <div class="p-2 border-top">
                           <div class="d-grid">
                               <a class="btn btn-sm btn-link font-size-14 text-center"
                                   href="{{ route('admins.notifications') }}">
                                   <i class="mdi mdi-arrow-right-circle me-1"></i> View More..
                               </a>
                           </div>
                       </div>
                   </div>
               </div>

               <div class="dropdown d-inline-block user-dropdown">
                   <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <img class="rounded-circle header-profile-user" src="{{ asset(auth()->user()->image) }}"
                           alt="Header Avatar">
                       <span class="d-none d-xl-inline-block ms-1">{{ auth()->user()->name }}</span>
                       <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                   </button>
                   <div class="dropdown-menu dropdown-menu-end">
                       <!-- item-->
                       <a class="dropdown-item" href="{{ route('admin.profile') }}"><i
                               class="ri-user-line align-middle me-1"></i> Profile</a>

                       <div class="dropdown-divider"></div>
                       <a class="dropdown-item text-danger" href="{{ route('admin.logout') }}"><i
                               class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                   </div>
               </div>


           </div>
       </div>
   </header>
   <!-- End Header -->
