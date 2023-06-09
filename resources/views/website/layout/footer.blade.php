 <!--Footer Start-->
 <footer class="home3 main-footer wf100">
     <div class="container">
         <div class="row">
            <?php $data_output_contact = App\Http\Controllers\Website\IndexController::getWebsiteContact(); 
              $data_output_department = App\Http\Controllers\Website\IndexController::getWebAllDepartment();
              $data_output_footerlink = App\Http\Controllers\Website\IndexController::getWebAllFooterLink();  
             ?>
             <!--Footer Widget Start-->
             @foreach ($data_output_contact as $item)
             @if (session('language') == 'mar')
             <div class="col-md-3 col-sm-6">
                 <div class="textwidget"> <img src="{{ asset('website_files/images/footer/footer_logo.png') }}" alt=""
                         width="80%"><br><br>
                     <address>
                         <ul>
                             <li> <i class="fas fa-university"></i> <strong>Council
                                     Address:</strong><?php echo $item['marathi_address'] ?></li>
                             <li> <i class="fas fa-envelope"></i> <strong>Email:</strong><?php echo $item['email'] ?>
                             </li>
                             <li> <i class="fas fa-phone"></i> <strong>Call us:</strong>
                                 <?php echo $item['marathi_contact'] ?> </li>
                         </ul>
                     </address>
                 </div>
             </div>
             @else
             <div class="col-md-3 col-sm-6">
                 <div class="textwidget"> <img src="{{ asset('website_files/images/footer/footer_logo.png') }}" alt=""
                         width="80%"><br><br>
                     <address>
                         <ul>
                             <li> <i class="fas fa-university"></i> <strong>Council
                                     Address:</strong><?php echo $item['english_address'] ?></li>
                             <li> <i class="fas fa-envelope"></i> <strong>Email:</strong> <?php echo $item['email'] ?>
                             </li>
                             <li> <i class="fas fa-phone"></i> <strong>Call us:</strong>
                                 <?php echo $item['english_contact'] ?></li>
                         </ul>
                     </address>
                 </div>
             </div>
             @endif
             @endforeach
             <!--Footer Widget End-->
             <!--Footer Widget Start-->
             <div class="col-md-3 col-sm-6">
                 <div class="footer-widget">
                     <h6>Departments</h6>
                     <ul>
                        @foreach ($data_output_department as $item)
             @if (session('language') == 'mar')
                         <li><a href="#"><i class="fas fa-star"></i><?php echo $item['marathi_title'] ?></a></li>
                         @else
                         <li><a data-id="{{ $item['id'] }}" class="department-show-btn rm cursor-pointer"><i class="fas fa-star"></i><?php echo $item['english_title'] ?></a></li>
                         @endif
                         @endforeach 
                     </ul>
                     <form method="POST" action="{{ url('/particular-department-information') }}"
                     id="departmentshowform">
                     @csrf
                     <input type="hidden" name="department_show_id" id="department_show_id" value="">
                 </form>
                 </div>
             </div>
             <!--Footer Widget End-->
             <!--Footer Widget Start-->
             <div class="col-md-3 col-sm-6">
                 <div class="footer-widget">
                     <h6>Important Links</h6>
                     <ul>
                        @foreach ($data_output_footerlink as $item)
                        @if (session('language') == 'mar')
                         <li><a href="https://www.google.com/" target="_blank"><i class="fas fa-star"></i><?php echo $item['marathi_title'] ?></a></li>
                         @else
                         <li><a href="https://www.google.com/" target="_blank"><i class="fas fa-star"></i><?php echo $item['english_title'] ?></a></li>
                         @endif
                         @endforeach 
                     </ul>
                 </div>
             </div>
             <!--Footer Widget End-->
             <!--Footer Widget Start-->
             <div class="col-md-3 col-sm-6">
                 <div class="twitter-widget">
                     <div class="tw-txt">
                         <h6>@DMS.gov</h6>
                         <a href="#" class="reply-tw"><i class="fas fa-reply"></i></a>
                         <p> "Stay prepared for disasters, stay safe. Make sure you have an emergency kit, know
                             evacuation routes, and stay informed with our updates. #DisasterPreparedness #StaySafe"
                         </p>
                     </div>
                     <div class="tw-footer"> @dms.gov <strong>3 May, 2023</strong> <i class="fab fa-twitter"></i>
                     </div>
                     
                 </div>
             </div>
             <!--Footer Widget End-->
         </div>
     </div>
 </footer>
 <!--Footer Start-->
 <!--Footer Start-->
 <footer class="home3 footer wf100">
     <div class="container">
         <div class="row">
             <div class="col-md-7 col-sm-7">
                 <p class="copyr"> © 2023, <a href="#">All rights reserved</a></p>
             </div>
             <div class="col-md-5 col-sm-5">
                 <ul class="footer-social">
                     <li><a href="#" class="fb"><i class="fab fa-facebook-f"></i></a></li>
                     <li><a href="#" class="tw"><i class="fab fa-twitter"></i></a></li>
                     <li><a href="#" class="insta"><i class="fab fa-instagram"></i></a></li>
                     <li><a href="#" class="linken"><i class="fab fa-linkedin-in"></i></a></li>
                     <li><a href="#" class="yt"><i class="fab fa-youtube"></i></a></li>
                 </ul>
             </div>
         </div>
     </div>
 </footer>
 <!--Footer End-->

 <script type="text/javascript">
$("#language").change(function() {
    $.ajax({
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{ env('APP_URL') }}/change-language",
        cache: false,
        success: function(response) {
            location.reload();
        },
        data: {
            'language': $("#language").val()
        },
        error: function(errorResponse) {

        }
    });
});
 </script>

 <script>
$(document).ready(function() {
    $('.marquee-scroll').hover(function() {
        $(this).attr('scrollamount', '0');
    }, function() {
        $(this).attr('scrollamount', '10');
    });
});
 </script>

 <script>
$('.show-btn').click(function(e) {
    // alert("hiii");
    // alert($(this).attr("data-id"));
    $("#show_id").val($(this).attr("data-id"));
    $("#showform").submit();
})
 </script>
 <script>
$('.department-show-btn').click(function(e) {
    // alert("hiii");
    // alert($(this).attr("data-id"));
    $("#department_show_id").val($(this).attr("data-id"));
    $("#departmentshowform").submit();
})
 </script>

 <!-- webpage A+ A- button script -->

 <script>
var zoom = 1;
var zoomStep = 0.2;

document.getElementById("zoomIn").addEventListener("click", function() {
    zoom += zoomStep;
    document.getElementById("zoomtext").style.transform = "scale(" + zoom + ")";
});
document.getElementById("zoomOut").addEventListener("click", function() {
    if (zoom > zoomStep) {
        zoom -= zoomStep;
        document.getElementById("zoomtext").style.transform = "scale(" + zoom + ")";
    }
});
 </script>

 <!-- end webpage A+ A- button script -->
 <script>
$(document).ready(function() {
    $('#order-listing').DataTable({
        searching: true,
        ordering: false,
        lengthChange: false,
        showNEntries: false
    });
});
 </script>

  <script>
        $('#zoomtextbody').click(function() {
            $("body").attr("style","font-size:16px !important;");
        });
        $('#zoomouttextbody').click(function() {
            $("body").attr("style","font-size:12px !important;");
        });
    </script>
 </body>

 </html>