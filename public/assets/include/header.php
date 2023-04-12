<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FSSAI ADMIN</title>
    <!-- global css -->
    <link rel="stylesheet" href="vendors/iconfonts/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
    <link rel="stylesheet" href="vendors/iconfonts/ti-icons/css/themify-icons.css">
    <!-- poppins font css -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- custom css -->
    <link rel="stylesheet" href="css/custom.css">
    <!-- page css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/stepwizard.css">
    <!-- favicon -->
    <link rel="shortcut icon" href="images/CMRS-logo2.png" />
</head>
 <div class="preloader">
                        <div class="jumping-dots-loader">
                          <span></span>
                          <span></span>
                          <span></span>
                        </div>
                      </div>
<body class="sidebar-icon-only">
    <div class="container-scroller">
        <!-- top navigation -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="#"><img src="images/logo.png" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="#"><img src="images/logo-mini.png" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch pr-0">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="fas fa-bars"></span>
                </button>
                <ul class="navbar-nav">
                    <li class="nav-item d-md-flex logo-title">
                        Food Imports Clearance System
                    </li>
                </ul>

                <ul class="navbar-nav navbar-nav-right">

                    <?php include 'include/notification.php';?>

                    <li class="nav-item nav-profile dropdown mr-0">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="images/faces/face4.jpg" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item">
                                <i class="fas fa-cog text-primary"></i>
                                Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="login.html">
                                <i class="fas fa-power-off text-primary"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="fas fa-bars"></span>
                </button>
            </div>
        </nav>