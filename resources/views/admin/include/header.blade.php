<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Industro - Admin Panel</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
                
        <!-- DataTables -->
        <link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="{{asset('assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" type="text/css">
    
        <!-- Dropzone css -->
        <link href="{{asset('assets/plugins/dropzone/dist/dropzone.css')}}" rel="stylesheet" type="text/css">
        <!-- Summernote css -->
        <link href="{{asset('assets/plugins/summernote/summernote.css')}}" rel="stylesheet" />

    </head>

    <body class="fixed-left">

        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner"></div>
            </div>
        </div>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                    <i class="ion-close"></i>
                </button>

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="{{route('admin.deshboard')}}" class="logo">COMPANY NAME</a>
                    </div>
                </div>

                <div class="sidebar-inner slimscrollleft">

                    <div class="user-details">
                        <div class="user-info">
                            <span class="text-muted user-status"> Admin</span>
                        </div>
                    </div>

                    <div id="sidebar-menu">
                        <ul>
                            <li class="active">
                                <a href="{{route('admin.deshboard')}}" class="waves-effect"><i class="mdi mdi-view-dashboard"></i><span> Dashboard </span></a>
                            </li>
                            <li>
                                <a href="{{route('admin.pages.list')}}" class="waves-effect"><i class="fa fa-product-hunt"></i> <span> Product </span> </a>
                            </li>
                            {{-- <li>
                                <a href="{{route('admin.appointment.list')}}" class="waves-effect"><i class="fa fa-handshake-o"></i> <span> Appointments </span> </a>
                            </li> 
                            <li>
                                <a href="{{route('admin.pressrelease.list')}}" class="waves-effect"><i class="mdi mdi-microphone-variant"></i> <span> Press Releases </span> </a>
                            </li>
                            <li>
                                <a href="{{route('admin.review.list')}}" class="waves-effect"><i class="typcn typcn-thumbs-ok"></i> <span> Reviews </span> </a>
                            </li>
                            <li>
                                <a href="{{route('admin.category.list')}}" class="waves-effect"><i class="fa fa-th-large"></i> <span> Catagory Pages </span> </a>
                            </li>
                            <li>
                                <a href="{{route('admin.subcategory.list')}}" class="waves-effect"><i class="dripicons-document"></i> <span> Menu Pages </span> </a>
                            </li>
                            <li>
                                <a href="{{route('admin.about.list')}}" class="waves-effect"><i class="fa fa-gears"></i><span> Addtional Pages </span></a>
                            </li> --}}
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-blogger"></i><span> Menu Pages </span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('admin.about_view')}}">About Us</a></li>
                                    <li><a href="{{route('admin.subcategory.product_list')}}">Product</a></li>
                                    <li><a href="{{route('admin.subcategory.calibration_list')}}">Calibration Services</a></li>
                                    <li><a href="{{route('admin.distributor.list')}}">Distributor</a></li>
                                    <li><a href="{{route('admin.knowledge.list')}}">Knowledge</a></li>
                                </ul>
                            </li>
                            {{-- <li>
                                <a href="{{route('admin.contact.list')}}" class="waves-effect"><i class="ion-android-contacts"></i> <span> Contacts </span> </a>
                            </li> --}}

                            {{-- <li>
                                <a href="{{route('admin.contact.user_list')}}" class="waves-effect"><i class="ion-android-contacts"></i> <span> Users </span> </a>
                            </li> --}}
                            
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-multiple"></i><span>Contact & Inquery</span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('admin.contact.allList',['page_slug'=>'feedback','page_id'=>'1'])}}">Feedback</a></li>
                                    <li><a href="{{route('admin.contact.allList',['page_slug'=>'customer_queries','page_id'=>'2'])}}">Customer Queries</a></li>
                                    <li><a href="{{route('admin.contact.allList',['page_slug'=>'product_catalog_request','page_id'=>'3'])}}">Product Catalog Request</a></li>
                                    <li><a href="{{route('admin.contact.allList',['page_slug'=>'request_quote','page_id'=>'4'])}}">Request Quote</a></li>
                                </ul>
                            </li>  
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-settings"></i><span>Settings</span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('admin.webSliderList')}}"> Homepage Slider</a></li>
                                    <li><a href="{{route('admin.intro_view')}}"> Homepage Intro</a></li>
                                    <li><a href="{{route('admin.home_product_view')}}"> Homepage Product</a></li>
                                    <li><a href="{{route('admin.client.list')}}">Client</a></li>
                                    <li><a href="{{route('admin.customer_support.view')}}">Customer Support</a></li>
                                </ul>
                            </li>  
                           
                            <li>
                                <a href="{{route('admin.change_password_form')}}" class="waves-effect"><i class="mdi mdi-account-key"></i> <span> Change Password </span> </a>
                            </li>

                            <li>
                                <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="waves-effect"><i class="mdi mdi-lock-outline"></i><span> Logout </span></a>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                            
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
            </div>
            <!-- Left Sidebar End -->

            <!-- Start right Content here -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <!-- Top Bar Start -->
                    <div class="topbar hidden-lg">

                        <nav class="navbar-custom">

                            <ul class="list-inline float-right mb-0">
                                <li class="list-inline-item dropdown notification-list">
                                    {{-- <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                                       aria-haspopup="false" aria-expanded="false">
                                        <i class="ion-ios7-bell noti-icon"></i>
                                        <span class="badge badge-success noti-icon-badge">3</span>
                                    </a> --}}
                                    {{-- <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
                                        <!-- item-->
                                        <div class="dropdown-item noti-title">
                                            <h5><span class="badge badge-danger float-right">87</span>Notification</h5>
                                        </div>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-primary"><i class="mdi mdi-cart-outline"></i></div>
                                            <p class="notify-details"><b>Your order is placed</b><small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-primary"><i class="mdi mdi-message"></i></div>
                                            <p class="notify-details"><b>New Message received</b><small class="text-muted">You have 87 unread messages</small></p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-primary"><i class="mdi mdi-martini"></i></div>
                                            <p class="notify-details"><b>Your item is shipped</b><small class="text-muted">It is a long established fact that a reader will</small></p>
                                        </a>

                                        <!-- All-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            View All
                                        </a>

                                    </div> --}}
                                </li>

                                {{-- <li class="list-inline-item dropdown notification-list">
                                    <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                                       aria-haspopup="false" aria-expanded="false">
                                        <img src="{{ asset('assets/images/users/avatar-1.jpg')}}" alt="user" class="rounded-circle">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                                        <a class="dropdown-item" style="padding: 6px 10px;" href="#"><i class="mdi mdi-settings m-r-5 text-muted"></i> Change Password</a>
                                        <a onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item" style="padding: 6px 10px;" href="#"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li> --}}

                            </ul>

                            <ul class="list-inline menu-left mb-0" style="border: 1px dashed #6dc0f5">
                                <li class="list-inline-item">
                                    <button type="button" class="button-menu-mobile open-left waves-effect">
                                        <i class="ion-navicon"></i>
                                    </button>
                                </li>
                                <li class="hide-phone list-inline-item app-search">
                                    <h3 class="page-title" style="line-height: 40px;"> Adminpanel</h3>
                                </li>
                            </ul>

                            <div class="clearfix"></div>

                        </nav>

                    </div>
                    <!-- Top Bar End -->