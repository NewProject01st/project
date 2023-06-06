 <!--Footer Start-->
 <footer class="home3 main-footer wf100">
    <div class="container">
        <div class="row">
            <!--Footer Widget Start-->
            <div class="col-md-3 col-sm-6">
                <div class="textwidget"> <img src="{{ asset('website_files/images/footer/footer_logo.png') }}" alt=""
                        width="80%"><br><br>
                    <address>
                        <ul>
                            <li> <i class="fas fa-university"></i> <strong>Council Address:</strong> DMS Office,
                                Maharshtra,
                                INDIA</li>
                            <li> <i class="fas fa-envelope"></i> <strong>Email:</strong> contact@dms.com<br>
                                info@dms.com </li>
                            <li> <i class="fas fa-phone"></i> <strong>Call us:</strong>
                                +91 000 0000 000 </li>
                        </ul>
                    </address>
                </div>
            </div>
            <!--Footer Widget End-->
            <!--Footer Widget Start-->
            <div class="col-md-3 col-sm-6">
                <div class="footer-widget">
                    <h6>Departments</h6>
                    <ul>
                        <li><a href="#"><i class="fas fa-star"></i> Emergency Management</a></li>
                        <li><a href="#"><i class="fas fa-star"></i> Public Health</a></li>
                        <li><a href="#"><i class="fas fa-star"></i> Transportation</a></li>
                        <li><a href="#"><i class="fas fa-star"></i> Communications</a></li>
                        <li><a href="#"><i class="fas fa-star"></i> Infrastructure</a></li>
                        <li><a href="#"><i class="fas fa-star"></i> Law Enforcement</a></li>
                        <li><a href="#"><i class="fas fa-star"></i> Finance and Administration</a></li>
                        <li><a href="#"><i class="fas fa-star"></i> Volunteer Management</a></li>
                    </ul>
                </div>
            </div>
            <!--Footer Widget End-->
            <!--Footer Widget Start-->
            <div class="col-md-3 col-sm-6">
                <div class="footer-widget">
                    <h6>Important Links</h6>
                    <ul>
                        <li><a href="#"><i class="fas fa-star"></i> Emergency Services</a></li>
                        <li><a href="#"><i class="fas fa-star"></i> Environmental Conditions</a></li>
                        <li><a href="#"><i class="fas fa-star"></i> Disaster Preparedness</a></li>
                        <li><a href="#"><i class="fas fa-star"></i> Disaster Response</a></li>
                        <li><a href="#"><i class="fas fa-star"></i> Disaster Recovery</a></li>
                        <li><a href="#"><i class="fas fa-star"></i> Volunteer Opportunities</a></li>
                        <li><a href="#"><i class="fas fa-star"></i> Donations and Aid</a></li>
                        <li><a href="#"><i class="fas fa-star"></i> Local Resources</a></li>
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
    $(document).ready(function()
    {
            $('#order-listing').DataTable({searching: true,ordering: false,lengthChange: false,showNEntries: false});
    });
</script>
</body>

</html>
