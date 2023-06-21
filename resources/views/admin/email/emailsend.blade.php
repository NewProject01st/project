<!DOCTYPE html>
<html>
<body>

<div class="content-wrapper registration-outer d-flex align-items-stretch auth auth-img-bg">
   <div class="row flex-grow">
      <div class="col-lg-6 d-flex align-items-center justify-content-center">
         <div class="auth-form-transparent text-left p-3">
            <!--  brand logo -->
            <div class="brand-logo d-flex justify-content-center align-items-center mb-0">
              
               <img src="{{ asset('storage/images/header/sub-header/logo.png') }}" class="logo-mini" alt="logo">
            </div>
            <div class="row w-100 ">
               <div class="col-lg-12 mx-auto">
                  <div class="auth-form-light text-center login_wrap">

                     {{-- 
                     <div class="thanks-icon mt-0"><i class="fa fa-check"></i></div> --}}
                     <div class="thanks-icon mt-0">
                       <img src="assets/images/swal-images/swal-submit.png" class="thank-you-img img-fluid ">
                     </div>
                     

                     <h1>Hi  </h1>
                     <h5>Please find the database backup for dated {{date('d-m-Y')}} </h5>
                     <div class="text-center mt-4 font-weight-light">
                   <a href="{{url('/')}}" class=" btn btn-primary-new btn-lg mb-2">Go to Sign In</a>
                </div>

                  </div>
               </div>
            </div>
           
         </div>
      </div>
          <!--  Copyright text -->
          <div class="col-lg-6 login-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright © {{date('Y')}}. All rights reserved with Disaster Management.</p>
         </div>
   </div>
</div>       

</body>
</html>