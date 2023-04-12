<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>.:: FSSAI ::.</title>
    <!-- css global-->
    <link rel="stylesheet" href="{{asset('assets/vendors/iconfonts/font-awesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.addons.css')}}">
    <!-- poppins font css -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- page style css -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
</head>
<body>
<!--  header --><!--Container Scroller Start-->
 <div class="container-scroller">
     <div class="container-fluid page-body-wrapper full-page-wrapper">
         <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
             <div class="row flex-grow">
                 <div class="col-lg-6 d-flex align-items-center justify-content-center">
                     <div class="auth-form-transparent text-left p-3">
                        <!--  Brand Logo -->
                         <div class="brand-logo">
                             <img src="{{asset('assets/images/logo.png')}}" alt="logo">
                         </div>
                         <!--  Login Form -->
                         <form class="pt-3 login_wrap">
                             <div class="form-group">
                                 <div class="input-group">
                                     <div class="input-group-prepend bg-transparent">
                                         <span class="input-group-text bg-transparent border-right-0">
                                             <i class="fa fa-user text-primary"></i>
                                         </span>
                                     </div>
                                     <input type="text" class="form-control form-control-lg border-left-0" id="exampleInputEmail" placeholder="Username">
                                 </div>
                             </div>
                             <div class="form-group">
                                 <div class="input-group">
                                     <div class="input-group-prepend bg-transparent">
                                         <span class="input-group-text bg-transparent border-right-0">
                                             <i class="fa fa-lock text-primary"></i>
                                         </span>
                                     </div>
                                     <input type="text" class="form-control form-control-lg border-left-0" id="exampleInputEmail" placeholder="Password">
                                 </div>
                             </div>
                        
                             <div class="my-3">
                                 <button type="button" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" data-toggle="modal" data-target="#exampleModal-4" data-whatever="@mdo">Proceed</button>
                                 <div class="d-flex justify-content-sm-between mt-3 fo14">
                                     <a href="#" class="text-dark">Forgot Username</a>
                                     <a href="#" class="text-dark">Forgot Password</a>
                                 </div>
                                 <div class="border-line"></div>
                                 <div class="modal fade" id="exampleModal-4" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                     <div class="modal-dialog" role="document">
                                         <div class="modal-content">
                                             <div class="modal-header">
                                                 <h5 class="modal-title" id="ModalLabel">OTP Verification</h5>
                                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                     <span aria-hidden="true">&times;</span>
                                                 </button>
                                             </div>
                                             <div class="modal-body">
                                                 <div class="form-group otp_wrap">
                                                     <label for="exampleInputPassword">Enter The 4 Digit OTP</label>
                                                     <div class="row">
                                                         <div class="digit-group col-auto" data-group-name="digits" data-autosubmit="false" autocomplete="off">
                                                             <input type="text" id="digit-1" name="digit-1" data-next="digit-2" />
                                                             <input type="text" id="digit-2" name="digit-2" data-next="digit-3" data-previous="digit-1" />
                                                             <input type="text" id="digit-3" name="digit-3" data-next="digit-4" data-previous="digit-2" />
                                                             <input type="text" id="digit-4" name="digit-4" data-next="digit-5" data-previous="digit-3" />
                                                         </div>
                                                         <div class="col-auto text-right">
                                                             <a href="dashboard.php" class="btn bg-org text-white  btn-lg">Login Now</a>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="text-center mt-3 font-weight-light">
                                                     Didn't Get The OTP? &nbsp;&nbsp;<strong><a href="#" class="text-primary" style="text-decoration:underline;">Resend OTP</a></strong>
                                                 </div>
                                             </div>
                                             <div class="modal-footer">
                                                 <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="text-center mt-3 font-weight-light">
                                 <a href="user-register.php" class="color-org"> Don't have an account? Sign Up !</a>
                             </div>
                         </form>
                         <!--  Login Form -->
                     </div>
                 </div>
                  <!--  Copyright text -->
                 <div class="col-lg-6 login-half-bg d-flex flex-row">
                     <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright © 2021. All rights reserved with FSSAI.</p>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- container-scroller end-->
<!--footer-->
     <!-- global js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <script src="vendors/js/vendor.bundle.addons.js"></script>
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/misc.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <script>
        $('.digit-group').find('input').each(function() {
            $(this).attr('maxlength', 1);
            $(this).on('keyup', function(e) {
                var parent = $($(this).parent());

                if (e.keyCode === 8 || e.keyCode === 37) {
                    var prev = parent.find('input#' + $(this).data('previous'));

                    if (prev.length) {
                        $(prev).select();
                    }
                } else if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {
                    var next = parent.find('input#' + $(this).data('next'));

                    if (next.length) {
                        $(next).select();
                    } else {
                        if (parent.data('autosubmit')) {
                            parent.submit();
                        }
                    }
                }
            });
        });
    </script>
    <script>
        $(".btn-otp").click(function() {
            $(".otp-area").slideUp();
            $(".redirect").slideDown();
        });

        $(".btn-otp2").click(function() {
            $(".otp-area2").slideUp();
            $(".redirecting2").slideDown();
        });

        $(".btn-auth").click(function() {
            $(".business-details").slideDown();
        });

        $(".btn-auth-2").click(function() {
            $(".business-details-2").slideDown();
        });

        $(".btn-non-impo").click(function() {
            $(".non-food-importer").slideDown();
            $(".food-importer").slideUp();
            $(".authorized-user").slideUp();
            $(".btn-non-impo").addClass("btn-register-active");
            $(".btn-autho-user").removeClass("btn-register-active");
            $(".btn-importer").removeClass("btn-register-active");
        });

        $(".btn-autho-user").click(function() {
            $(".authorized-user").slideDown();
            $(".food-importer").slideUp();
            $(".non-food-importer").slideUp();
            $(".btn-autho-user").addClass("btn-register-active");
            $(".btn-importer").removeClass("btn-register-active");
            $(".btn-non-impo").removeClass("btn-register-active");
        });

        $(".btn-importer").click(function() {
            $(".food-importer").slideDown();
            $(".authorized-user").slideUp();
            $(".non-food-importer").slideUp();
            $(".btn-autho-user").removeClass("btn-register-active");
            $(".btn-importer").addClass("btn-register-active");
            $(".btn-non-impo").removeClass("btn-register-active");
        });
    </script>
    </body>

    </html>