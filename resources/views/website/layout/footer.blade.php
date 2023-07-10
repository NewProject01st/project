 <!--Footer Start-->
 <footer class="home3 main-footer wf100">
     <div class="container">
         <div class="row">
             <?php 
             $common_data = App\Http\Controllers\Website\IndexController::getCommonWebData();
             ?>
             <!--Footer Widget Start-->
             @forelse ($common_data['website_contact_details'] as $item)
                 @if (session('language') == 'mar')
                     <div class="col-md-3 col-sm-6">
                         <div class="textwidget"> <img src="{{ asset('website_files/images/footer/footer_logo.png') }}"
                                 alt="" width="80%"><br><br>
                             <address>
                                 <ul>
                                     <li> <i class="fas fa-university"></i> <strong>
                                             @if (session('language') == 'mar')
                                                 {{ Config::get('marathi.HOME_PAGE.COUNCIL_ADDRESS') }}
                                             @else
                                                 {{ Config::get('english.HOME_PAGE.COUNCIL_ADDRESS') }}
                                             @endif
                                         </strong><?php echo $item['marathi_address']; ?></li>
                                     <li> <i class="fas fa-envelope"></i> <strong>
                                             @if (session('language') == 'mar')
                                                 {{ Config::get('marathi.HOME_PAGE.EMAIL') }}
                                             @else
                                                 {{ Config::get('english.HOME_PAGE.EMAIL') }}
                                             @endif
                                         </strong><?php echo $item['email']; ?>
                                     </li>
                                     <li> <i class="fas fa-phone"></i> <strong>
                                             @if (session('language') == 'mar')
                                                 {{ Config::get('marathi.HOME_PAGE.CALL_US') }}
                                             @else
                                                 {{ Config::get('english.HOME_PAGE.CALL_US') }}
                                             @endif
                                         </strong>
                                         <?php echo $item['marathi_number']; ?> </li>
                                 </ul>
                             </address>
                         </div>
                     </div>
                 @else
                     <div class="col-md-3 col-sm-6">
                         <div class="textwidget"> <img src="{{ asset('website_files/images/footer/footer_logo.png') }}"
                                 alt="" width="80%"><br><br>
                             <address>
                                 <ul>
                                     <li> <i class="fas fa-university"></i> <strong>
                                             @if (session('language') == 'mar')
                                                 {{ Config::get('marathi.HOME_PAGE.COUNCIL_ADDRESS') }}
                                             @else
                                                 {{ Config::get('english.HOME_PAGE.COUNCIL_ADDRESS') }}
                                             @endif
                                         </strong>
                                         <?php echo $item['english_address']; ?></li>
                                     <li> <i class="fas fa-envelope"></i> <strong>
                                             @if (session('language') == 'mar')
                                                 {{ Config::get('marathi.HOME_PAGE.EMAIL') }}
                                             @else
                                                 {{ Config::get('english.HOME_PAGE.EMAIL') }}
                                             @endif
                                         </strong>
                                         <?php echo $item['email']; ?>
                                     </li>
                                     <li> <i class="fas fa-phone"></i> <strong>
                                             @if (session('language') == 'mar')
                                                 {{ Config::get('marathi.HOME_PAGE.CALL_US') }}
                                             @else
                                                 {{ Config::get('english.HOME_PAGE.CALL_US') }}
                                             @endif
                                         </strong>
                                         <?php echo $item['english_number']; ?></li>
                                 </ul>
                             </address>
                         </div>
                     </div>
                 @endif
                 @empty
                                <h4>
                                    @if (session('language') == 'mar')
                                        {{ Config::get('marathi.FOOTER.WEBSITE_CONTACT') }}
                                    @else
                                        {{ Config::get('english.FOOTER.WEBSITE_CONTACT') }}
                                    @endif
                                </h4>
             @endforelse
             <!--Footer Widget End-->
             <!--Footer Widget Start-->
             <div class="col-md-3 col-sm-6">
                 <div class="footer-widget">
                     <h6>
                         @if (session('language') == 'mar')
                             {{ Config::get('marathi.HOME_PAGE.DEPARTMENTS_FOOTER') }}
                         @else
                             {{ Config::get('english.HOME_PAGE.DEPARTMENTS_FOOTER') }}
                         @endif
                     </h6>
                     <ul>
                        @forelse ($common_data['web_department_data']  as $item)
                             @if (session('language') == 'mar')
                                 <li><a data-id="{{ $item['id'] }}" class="department-show-btn rm cursor-pointer"><i class="fas fa-star"></i><?php echo $item['marathi_title']; ?></a></li>
                             @else
                                 <li><a data-id="{{ $item['id'] }}" class="department-show-btn rm cursor-pointer"><i
                                             class="fas fa-star"></i><?php echo $item['english_title']; ?></a></li>
                             @endif
                              @empty
                                <h4>
                                    @if (session('language') == 'mar')
                                        {{ Config::get('marathi.FOOTER.DEPARTMENT_DATA') }}
                                    @else
                                        {{ Config::get('english.FOOTER.DEPARTMENT_DATA') }}
                                    @endif
                                </h4>
                             @endforelse
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
                     <h6>
                         @if (session('language') == 'mar')
                             {{ Config::get('marathi.HOME_PAGE.IMPORTANT_LINKS') }}
                         @else
                             {{ Config::get('english.HOME_PAGE.IMPORTANT_LINKS') }}
                         @endif
                     </h6>
                     <ul>
                        @forelse ($common_data['weballfooterlink_data']  as $item)
                             @if (session('language') == 'mar')
                                 <li><a href="{{ $item['url'] }}" target="_blank"><i
                                             class="fas fa-star"></i><?php echo $item['marathi_title']; ?></a></li>
                             @else
                                 <li><a href="{{ $item['url'] }}" target="_blank"><i
                                             class="fas fa-star"></i><?php echo $item['english_title']; ?></a></li>
                             @endif
                             @empty
                             <h4>
                                 @if (session('language') == 'mar')
                                     {{ Config::get('marathi.FOOTER.WEB_FOOTER_LINK') }}
                                 @else
                                     {{ Config::get('english.FOOTER.WEB_FOOTER_LINK') }}
                                 @endif
                             </h4>
                             @endforelse
                             @forelse ($common_data['privacypolicy_data'] as $item)
                             @if (session('language') == 'mar')
                                <li><a href="{{ route('privacy-policy') }}"><i
                                     class="fas fa-star"></i><?php echo $item['marathi_title']; ?></a></li>
                                @else
                                    <li><a href="{{ route('privacy-policy') }}"><i class="fas fa-star"></i><?php echo $item['english_title']; ?></a></li>
                                @endif
                                @empty
                                <p>
                                    @if (session('language') == 'mar')
                                        {{ Config::get('marathi.FOOTER.PRIVACY_POLICY') }}
                                    @else
                                        {{ Config::get('english.FOOTER.PRIVACY_POLICY') }}
                                    @endif
                                </p>
                                @endforelse

                                @forelse ($common_data['termcondition_data'] as $item)
                         @if (session('language') == 'mar')
                                <li><a href="{{ route('privacy-policy') }}"><i
                                     class="fas fa-star"></i><?php echo $item['marathi_title']; ?></a></li>
                                @else
                                    <li><a href="{{ route('terms_condition') }}"><i class="fas fa-star"></i><?php echo $item['english_title']; ?></a></li>
                                @endif
                                @empty
                                <p>
                                    @if (session('language') == 'mar')
                                        {{ Config::get('marathi.FOOTER.TERM_CONDITION') }}
                                    @else
                                        {{ Config::get('english.FOOTER.TERM_CONDITION') }}
                                    @endif
                                </p>
                                @endforelse
                         {{-- <li><a href="{{ route('privacy-policy') }}"  target="_blank"><i
                            class="fas fa-star"></i>Privacy Policy</a></li>
                            <li><a href="{{ route('terms_condition') }}" target="_blank"><i
                                class="fas fa-star"></i>Terms and Conditions</a></li> --}}

                     </ul>
                 </div>
             </div>
             <!--Footer Widget End-->
             <!--Footer Widget Start-->
             <div class="col-md-3 col-sm-6">
                 <div class="twitter-widget">
                     <div class="tw-txt">
                         <h6>
                             @if (session('language') == 'mar')
                                 {{ Config::get('marathi.FOOTER.TWEET_HEADING1') }}
                             @else
                                 {{ Config::get('english.FOOTER.TWEET_HEADING1') }}
                             @endif
                         </h6>
                         <a href="#" class="reply-tw"><i class="fas fa-reply"></i></a>
                         <p>
                             @if (session('language') == 'mar')
                                 {{ Config::get('marathi.FOOTER.TWEET_FEED_INFO') }}
                             @else
                                 {{ Config::get('english.FOOTER.TWEET_FEED_INFO') }}
                             @endif
                         </p>
                     </div>
                     <div class="tw-footer">
                         @if (session('language') == 'mar')
                             {{ Config::get('marathi.FOOTER.TWEET_HEADING2') }}
                         @else
                             {{ Config::get('english.FOOTER.TWEET_HEADING2') }}
                         @endif
                         <strong>
                            <?php
                            echo date('dS M Y');
                            ?>
                             {{-- @if (session('language') == 'mar')
                                 {{ Config::get('marathi.FOOTER.DATE') }}
                             @else
                                 {{ Config::get('english.FOOTER.DATE') }}
                             @endif --}}
                         </strong> <i class="fab fa-twitter"></i>
                     </div>

                 </div>
             </div>

             {{-- @forelse ($common_data['twitter_feed']  as $item)
             @if (session('language') == 'mar')
             <iframe 
              frameborder="0" 
              allowtransparency="true" 
              allowfullscreen="true" 
              scrolling="yes"
            style="position:static; visibility:visible; height:52vh; display:block; flexGrow:1;" 
              title="Twitter Timeline"
               src="{{ $item['url'] }}" 
               ></iframe>
              @else
              <iframe 
              frameborder="0" 
              allowtransparency="true" 
              allowfullscreen="true" 
              scrolling="yes"
            style="position:static; visibility:visible; height:52vh; display:block; flexGrow:1;" 
              title="Twitter Timeline"
               src="{{ $item['url'] }}" 
               ></iframe>
          @endif
          @empty
          <p>
              @if (session('language') == 'mar')
                  {{ Config::get('marathi.FOOTER.TERM_CONDITION') }}
              @else
                  {{ Config::get('english.FOOTER.TERM_CONDITION') }}
              @endif
          </p>
          @endforelse --}}
             <!--Footer Widget End-->
         </div>
     </div>
 </footer>
 <!--Footer Start-->
 <!--Footer Start-->
 <footer class="home3 footer wf100">
     <div class="container">
         <div class="row">
             <div class="col-6">
                 <p class="copyr"> © <script>document.write(new Date().getFullYear());</script> , <a href="#">
                    @if (session('language') == 'mar')
                    {{ Config::get('marathi.HOME_PAGE.ALL_RIGHT_RESERVED') }}
                    @else
                    {{ Config::get('english.HOME_PAGE.ALL_RIGHT_RESERVED') }}
                    @endif
                </a></p>
             </div>
             {{-- <div class="col-6">
                 <ul class="footer-social">
                     <li><a href="https://www.facebook.com/mynashikmc/" class="fb" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                     <li><a href="https://twitter.com/my_nmc" target="_blank" class="tw"><i class="fab fa-twitter"></i></a></li>
                     <li><a href="https://instagram.com/my_nmc" target="_blank"  class="insta"><i class="fab fa-instagram"></i></a></li>
                     <li><a href="https://www.youtube.com/c/mynmc" target="_blank" class="yt"><i class="fab fa-youtube"></i></a></li>
                     <li><a href="https://nmc.gov.in" target="_blank" class="yt"><i class='fas fa-globe' style='font-size:20px;color:#fff'></i></a></li>
                 </ul>
             </div> --}}



             <div class="col-6 d-flex justify-content-end">
                <ul class="footer-social">
             @forelse ($common_data['social_link'] as $item)
             
                 @if (session('language') == 'mar')
                 <li><a href="{{ $item['url'] }}" target="_blank"
                    class="fb" target="_blank">
                    {{-- <i class="fab fa-facebook-f"></i> --}}
                    <img src="{{ Config::get('DocumentConstant.SOCIAL_ICON_VIEW') }}{{ $item['icon'] }}"
                    width="25" height="25" alt="...">
                </a></li>
                 @else
                        <li><a href="{{ $item['url'] }}" target="_blank"
                            class="fb" target="_blank">
                            {{-- <i class="fab fa-facebook-f"></i> --}}
                            <img src="{{ Config::get('DocumentConstant.SOCIAL_ICON_VIEW') }}{{ $item['icon'] }}"
                            width="25" height="25" alt="...">
                        </a></li>
                 @endif
               
         @empty
         </ul>
        </div>
             <h4>
                 @if (session('language') == 'mar')
                     {{ Config::get('marathi.CITIZEN_ACTION.NO_DATA_FOUND_CITIZEN_FEEDBACK_SUGGESTION') }}
                 @else
                     {{ Config::get('english.CITIZEN_ACTION.NO_DATA_FOUND_CITIZEN_FEEDBACK_SUGGESTION') }}
                 @endif
             </h4>
         @endforelse

             

         </div>
        </div>
 </footer>
 <!--Footer End-->

 {{-- <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
 <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> --}}
 <script src="{{ asset('website_files/assets/js/jquery.dataTables.min.js') }}"></script>
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

<script>
    $('.disaster-show-btn').click(function(e) {
        // alert("hiii");
        // alert($(this).attr("data-id"));
        $("#disaster_show_id").val($(this).attr("data-id"));
        $("#disastershowform").submit();
    })
</script>


 <!-- webpage A+ A- button script -->


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
         $("body").attr("style", "font-size:16px !important;");
     });
     $('#zoomouttextbody').click(function() {
         $("body").attr("style", "font-size:12px !important;");
     });
 </script>
   <script src="{{ asset('website_files/assets/js/html-magnifier.js') }}"></script>

   
 <script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();

         const magnifier = new HTMLMagnifier({ width: 400 });
        magnifier.hide(); // Hide the magnifier initially

        document.getElementById("magnifier").addEventListener("click", function() {
            if (magnifier.isVisible()) {
                magnifier.hide();
            } else {
                magnifier.show();
            }
        });
    });

   
</script> 





 </body>



 </html>
