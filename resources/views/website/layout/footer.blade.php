 <!--Footer Start-->
 <footer class="home3 main-footer wf100">
     <div class="container">
         <div class="row">
             <?php $data_output_contact = App\Http\Controllers\Website\IndexController::getWebsiteContact();
             $data_output_department = App\Http\Controllers\Website\IndexController::getWebAllDepartment();
             $data_output_footerlink = App\Http\Controllers\Website\IndexController::getWebAllFooterLink();
             
             $data_output_privacypolicy = App\Http\Controllers\Website\IndexController::getWebPrivacyPolicy();//   dd($data_output_contact);
             $data_output_termcondition = App\Http\Controllers\Website\IndexController::getWebTermCondition();//   dd($data_output_contact);

             ?>
             <!--Footer Widget Start-->
             @foreach ($data_output_contact as $item)
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
             @endforeach
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
                         @foreach ($data_output_department as $item)
                             @if (session('language') == 'mar')
                                 <li><a href="#"><i class="fas fa-star"></i><?php echo $item['marathi_title']; ?></a></li>
                             @else
                                 <li><a data-id="{{ $item['id'] }}" class="department-show-btn rm cursor-pointer"><i
                                             class="fas fa-star"></i><?php echo $item['english_title']; ?></a></li>
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
                     <h6>
                         @if (session('language') == 'mar')
                             {{ Config::get('marathi.HOME_PAGE.IMPORTANT_LINKS') }}
                         @else
                             {{ Config::get('english.HOME_PAGE.IMPORTANT_LINKS') }}
                         @endif
                     </h6>
                     <ul>
                         @foreach ($data_output_footerlink as $item)
                             @if (session('language') == 'mar')
                                 <li><a href="" target="_blank"><i
                                             class="fas fa-star"></i><?php echo $item['marathi_title']; ?></a></li>
                             @else
                                 <li><a href="" target="_blank"><i
                                             class="fas fa-star"></i><?php echo $item['english_title']; ?></a></li>
                             @endif
                         @endforeach
                         @foreach ($data_output_privacypolicy as $item)
                         @if (session('language') == 'mar')
                                <li><a href="{{ route('privacy-policy') }}"><i
                                     class="fas fa-star"></i><?php echo $item['marathi_title']; ?></a></li>
                                @else
                                    <li><a href="{{ route('privacy-policy') }}"><i class="fas fa-star"></i><?php echo $item['english_title']; ?></a></li>
                                @endif
                         @endforeach

                          @foreach ($data_output_termcondition as $item)
                         @if (session('language') == 'mar')
                                <li><a href="{{ route('privacy-policy') }}"><i
                                     class="fas fa-star"></i><?php echo $item['marathi_title']; ?></a></li>
                                @else
                                    <li><a href="{{ route('terms_condition') }}"><i class="fas fa-star"></i><?php echo $item['english_title']; ?></a></li>
                                @endif
                         @endforeach
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
                             @if (session('language') == 'mar')
                                 {{ Config::get('marathi.FOOTER.DATE') }}
                             @else
                                 {{ Config::get('english.FOOTER.DATE') }}
                             @endif
                         </strong> <i class="fab fa-twitter"></i>
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
             <div class="col-6">
                 <p class="copyr"> © 2023, <a href="#">
                    @if (session('language') == 'mar')
                    {{ Config::get('marathi.HOME_PAGE.ALL_RIGHT_RESERVED') }}
                    @else
                    {{ Config::get('english.HOME_PAGE.ALL_RIGHT_RESERVED') }}
                    @endif
                </a></p>
             </div>
             <div class="col-6">
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

<script>
    /* global HTMLMagnifier */
    const magnifier = new HTMLMagnifier({ width: 400 });
    magnifier.show();
  </script>
 </body>

 </html>
