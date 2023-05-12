<!-- <footer class="main-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                    <div class="textwidget"> <img src="{{ asset('website_files/images/footer/footer_logo.png') }}" alt="" width="80%"><br><br>
                        <address>
                            <ul>
                            <li> <i class="fa fa-university"></i> <strong>Council Address:</strong>  DMS Office, Maharshtra,
                                INDIA</li>
                            <li> <i class="fa fa-envelope"></i> <strong>Email:</strong> contact@dms.com<br>
                                info@dms.com </li>
                            <li> <i class="fa fa-phone"></i> <strong>Call us:</strong>
                                +91 000 0000 000 </li>
                            </ul>
                        </address>
                    </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-widget">
                            <h6>Sub-Departments</h6>
                            <ul>
                            <li><a href="#"><i class="fa fa-star"></i> Emergency Management</a></li>
                            <li><a href="#"><i class="fa fa-star"></i> Public Health</a></li>
                            <li><a href="#"><i class="fa fa-star"></i> Transportation</a></li>
                            <li><a href="#"><i class="fa fa-star"></i> Communications</a></li>
                            <li><a href="#"><i class="fa fa-star"></i> Infrastructure</a></li>
                            <li><a href="#"><i class="fa fa-star"></i> Law Enforcement</a></li>
                            <li><a href="#"><i class="fa fa-star"></i> Finance and Administration</a></li>
                            <li><a href="#"><i class="fa fa-star"></i> Volunteer Management</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="footer-widget">
                            <h6>Important Links</h6>
                            <ul>
                            <li><a href="#"><i class="fa fa-star"></i> Emergency Services</a></li>
                            <li><a href="#"><i class="fa fa-star"></i> Environmental Conditions</a></li>
                            <li><a href="#"><i class="fa fa-star"></i> Disaster Preparedness</a></li>
                            <li><a href="#"><i class="fa fa-star"></i> Disaster Response</a></li>
                            <li><a href="#"><i class="fa fa-star"></i> Disaster Recovery</a></li>
                            <li><a href="#"><i class="fa fa-star"></i> Volunteer Opportunities</a></li>
                            <li><a href="#"><i class="fa fa-star"></i> Donations and Aid</a></li>
                            <li><a href="#"><i class="fa fa-star"></i> Local Resources</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="twitter-widget">
                            <div class="tw-txt">
                            <h6>@DMS.gov</h6>
                            <a href="#" class="reply-tw"><i class="fa fa-reply"></i></a>
                            <p> "Stay prepared for disasters, stay safe. Make sure you have an emergency kit, know evacuation routes, and stay informed with our updates. #DisasterPreparedness #StaySafe" </p>
                            </div>
                            <div class="tw-footer"> @dms.gov <strong>3 May, 2023</strong> <i class="fa fa-twitter"></i> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer> -->

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
                swal({
                    titile: "Error!",
                    text: "Something Went Wrong",
                    icon: "error",
                    button: "Ok",
                });
            }
        });
    });
</script>
</body>

</html>
