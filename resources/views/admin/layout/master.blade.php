<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> ADMIN</title>
    <!-- global css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.addons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/ti-icons/css/themify-icons.css') }}">
    <!-- poppins font css -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <!-- page css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/stepwizard.css') }}">
    <!-- favicon -->
    <link rel="shortcut icon" href="images/CMRS-logo2.png" />
    <!-- toastr-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <!-- {{-- CKEditor CDN --}} -->
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    <!-- Summernote Editor -->

    
  
   <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
      {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    {{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>  --}}

    <link rel="stylesheet" href="{{ asset('assets/vendors/summernote/dist/summernote-bs4.css') }}" >
    <script src="{{ asset('assets/vendors/summernote/dist/summernote-bs4.min.js') }}"></script>

    <!-- Summernote Editor End -->
</head>


<body class="sidebar-icon-only">
    <div class="container-scroller">
        <!-- top navigation -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="#"><img src="{{ asset('assets/images/logo.png') }}"
                        alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="#"><img
                        src="{{ asset('assets/images/logo-mini.png') }}" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch pr-0">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="fas fa-bars"></span>
                </button>
                <ul class="navbar-nav">
                    <li class="nav-item d-md-flex logo-title">
                        {{ env('APP_NAME') }}
                    </li>
                </ul>

                <ul class="navbar-nav navbar-nav-right">

                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                            data-toggle="dropdown">
                            <i class="fas fa-bell mx-0"></i>
                            <span class="count">13</span>
                        </a>
                        <div class="dropdown-menu nf-dropdown dropdown-menu-right navbar-dropdown preview-list"
                            aria-labelledby="notificationDropdown">
                            <a class="dropdown-item">
                                <p class="mb-0 float-left"><span id="overall_count_text">You have 13 new
                                        notifications</span></p>
                            </a>

                            <div class="dropdown-divider"></div>

                            <div class="dropdown-submenu">
                                <a class="test dropdown-item preview-item" tabindex="-1" href="#">
                                    <div class="preview-item-content d-flex justify-content-between">
                                        <h6 class="preview-subject font-weight-medium">Application </h6>
                                        <div class="nav-link count-indicator"><i class="fas fa-bell"></i><span
                                                class="count" id="all_proposal_notifications">3</span></div>
                                    </div>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a tabindex="-1" href="#" class="nav-link">New BOE(s) <span
                                                class="count countbg1" id="majaor_notifications">3</span></a></li>
                                    <li><a tabindex="-1" href="#" class="nav-link">Accepted BOE(s) <span
                                                class="count countbg2" id="minor_notifications">0</span></a></li>
                                    <li><a tabindex="-1" href="#" class="nav-link">Rejected BOE(s) <span
                                                class="count countbg3" id="unlisted_notifications">0</span></a></li>
                                </ul>
                            </div>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item" href="#">
                                <div class="preview-item-content d-flex justify-content-between">
                                    <h6 class="preview-subject font-weight-medium">Scrutiny</h6>
                                    <div class="nav-link count-indicator"><i class="fas fa-bell"></i><span
                                            class="count" id="periodic_inspection">2</span></div>

                                </div>
                            </a>
                            <div class="dropdown-divider"></div>



                            <a class="dropdown-item preview-item" href="#">
                                <div class="preview-item-content d-flex justify-content-between">
                                    <h6 class="preview-subject font-weight-medium">Payment</h6>
                                    <p class="nav-link count-indicator"><i class="fas fa-bell"></i><span
                                            class="count" id="all_approve_reject_count">1</span></p>
                                </div>
                            </a>

                            <div class="dropdown-divider"></div>


                            <a class="dropdown-item preview-item" href="#prop-nf-collapse" data-toggle="collapse">
                                <div class="preview-item-content d-flex justify-content-between">
                                    <h6 class="preview-subject font-weight-medium">Visual Inspection </h6>
                                    <div class="nav-link count-indicator"><i class="fas fa-bell"></i><span
                                            class="count" id="accident_notifications">2</span></div>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item" href="#">
                                <div class="preview-item-content d-flex justify-content-between">
                                    <h6 class="preview-subject font-weight-medium">Laboratory</h6>
                                    <p class="nav-link count-indicator"><i class="fas fa-bell"></i><span
                                            class="count" id="all_approve_reject_count">1</span></p>
                                </div>
                            </a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item" href="#">
                                <div class="preview-item-content d-flex justify-content-between">
                                    <h6 class="preview-subject font-weight-medium">NOC/NCC</h6>
                                    <p class="nav-link count-indicator"><i class="fas fa-bell"></i><span
                                            class="count" id="all_approve_reject_count">1</span></p>
                                </div>
                            </a>


                        </div>
                    </li>
                    <li class="nav-item nav-profile dropdown mr-0">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"
                            id="profileDropdown">
                            <img src="{{ asset('assets/images/faces/face4.jp') }}g" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item">
                                <i class="fas fa-cog text-primary"></i>
                                Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ url('log-out') }}">
                                <i class="fas fa-power-off text-primary"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="fas fa-bars"></span>
                </button>
            </div>
        </nav>
        <div class="container-fluid page-body-wrapper">
            @include('admin.layout.sidebar')
            @yield('content')
            @extends('admin.layout.footer')
