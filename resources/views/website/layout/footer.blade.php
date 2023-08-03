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
                                     <li> <i class="fa fa-university"></i> <strong>
                                             @if (session('language') == 'mar')
                                                 {{ Config::get('marathi.HOME_PAGE.COUNCIL_ADDRESS') }}
                                             @else
                                                 {{ Config::get('english.HOME_PAGE.COUNCIL_ADDRESS') }}
                                             @endif
                                         </strong><?php echo $item['marathi_address']; ?></li>
                                     <li> <i class="fa fa-envelope"></i> <strong>
                                             @if (session('language') == 'mar')
                                                 {{ Config::get('marathi.HOME_PAGE.EMAIL') }}
                                             @else
                                                 {{ Config::get('english.HOME_PAGE.EMAIL') }}
                                             @endif
                                         </strong><?php echo $item['email']; ?>
                                     </li>
                                     <li> <i class="fa fa-phone"></i> <strong>
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
                                     <li> <i class="fa fa-university"></i> <strong>
                                             @if (session('language') == 'mar')
                                                 {{ Config::get('marathi.HOME_PAGE.COUNCIL_ADDRESS') }}
                                             @else
                                                 {{ Config::get('english.HOME_PAGE.COUNCIL_ADDRESS') }}
                                             @endif
                                         </strong>
                                         <?php echo $item['english_address']; ?></li>
                                     <li> <i class="fa fa-envelope"></i> <strong>
                                             @if (session('language') == 'mar')
                                                 {{ Config::get('marathi.HOME_PAGE.EMAIL') }}
                                             @else
                                                 {{ Config::get('english.HOME_PAGE.EMAIL') }}
                                             @endif
                                         </strong>
                                         <?php echo $item['email']; ?>
                                     </li>
                                     <li> <i class="fa fa-phone"></i> <strong>
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
                                 <li><a data-id="{{ $item['id'] }}" class="department-show-btn rm cursor-pointer"><i
                                             class="fa fa-star"></i><?php echo $item['marathi_title']; ?></a></li>
                             @else
                                 <li><a data-id="{{ $item['id'] }}" class="department-show-btn rm cursor-pointer"><i
                                             class="fa fa-star"></i><?php echo $item['english_title']; ?></a></li>
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
                                             class="fa fa-star"></i><?php echo $item['marathi_title']; ?></a></li>
                             @else
                                 <li><a href="{{ $item['url'] }}" {{-- href="{{echo strpos("https://",$item['url'])}}" --}} target="_blank"><i
                                             class="fa fa-star"></i><?php echo $item['english_title']; ?></a></li>
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
                                             class="fa fa-star"></i><?php echo $item['marathi_title']; ?></a></li>
                             @else
                                 <li><a href="{{ route('privacy-policy') }}"><i
                                             class="fa fa-star"></i><?php echo $item['english_title']; ?></a></li>
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
                                             class="fa fa-star"></i><?php echo $item['marathi_title']; ?></a></li>
                             @else
                                 <li><a href="{{ route('terms_condition') }}"><i
                                             class="fa fa-star"></i><?php echo $item['english_title']; ?></a></li>
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
                            class="fa fa-star"></i>Privacy Policy</a></li>
                            <li><a href="{{ route('terms_condition') }}" target="_blank"><i
                                class="fa fa-star"></i>Terms and Conditions</a></li> --}}

                     </ul>
                 </div>
             </div>
             <!--Footer Widget End-->
             <!--Footer Widget Start-->
             <div class="col-md-3 col-sm-6">
                 <?php //print_r($common_data['twitter_feed']['url']);
                 //die();
                 ?>
                 <?php
if (isset($common_data['twitter_feed']) && is_array($common_data['twitter_feed'])) {
    foreach ($common_data['twitter_feed'] as $feed) {
        if (isset($feed['url']) && $feed['url'] !=='null') {
            // echo $feed['url'] . '<br>';
            ?>
                 <iframe frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="yes"
                     style="position: static; visibility: visible; height: 52vh; width: 100%; display: block; flex-grow: 1;"
                     title="Twitter Timeline" src="{{ $feed['url'] }}"></iframe>


                   

                 <?php 
        }
        else {
            ?>
                 <div class="twitter-widget">
                     <div class="tw-txt">
                         <h6>
                             @if (session('language') == 'mar')
                                 {{ Config::get('marathi.FOOTER.TWEET_HEADING1') }}
                             @else
                                 {{ Config::get('english.FOOTER.TWEET_HEADING1') }}
                             @endif
                         </h6>
                         <a href="#" class="reply-tw"><i class="fa fa-reply"></i></a>
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
                             <?php echo date('dS M Y'); ?>
                             {{-- @if (session('language') == 'mar')
{{ Config::get('marathi.FOOTER.DATE') }}
@else
{{ Config::get('english.FOOTER.DATE') }}
@endif --}}
                         </strong>
                         <i class="fab fa-twitter"></i>
                     </div>
                 </div>
                 <?php 
                //   echo 'URL is not defined.';
              } 
    }
}
?>
                 <?php
                 //if (isset($common_data['twitter_feed']) && isset($common_data['twitter_feed']['url'])) {
                 // echo $common_data['twitter_feed']['url'];
                 //} else {
                 //echo 'URL is not defined.';
                 //}
                 //die();
                 ?>


                 {{-- @if (isset($common_data['twitter_feed']['url']) && $common_data['twitter_feed']['url'] == null)
                     @forelse ($common_data['twitter_feed'] as $item)
                         <iframe frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="yes"
                             style="position: static; visibility: visible; height: 52vh; display: block; flex-grow: 1;"
                             title="Twitter Timeline" src="{{ $item['url'] }}"></iframe>
                     @empty
                         <p>
                             @if (session('language') == 'mar')
                                 {{ Config::get('marathi.FOOTER.TERM_CONDITION') }}
                             @else
                                 {{ Config::get('english.FOOTER.TERM_CONDITION') }}
                             @endif
                         </p>
                     @endforelse
                 @else
                     <div class="twitter-widget">
                         <div class="tw-txt">
                             <h6>
                                 @if (session('language') == 'mar')
                                     {{ Config::get('marathi.FOOTER.TWEET_HEADING1') }}
                                 @else
                                     {{ Config::get('english.FOOTER.TWEET_HEADING1') }}
                                 @endif
                             </h6>
                             <a href="#" class="reply-tw"><i class="fa fa-reply"></i></a>
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
                             <strong> --}}
                 <?php //echo date('dS M Y');
                 ?>
                 {{-- @if (session('language') == 'mar')
                {{ Config::get('marathi.FOOTER.DATE') }}
            @else
                {{ Config::get('english.FOOTER.DATE') }}
            @endif --}}
                 {{-- </strong>
                             <i class="fab fa-twitter"></i>
                         </div>
                     </div>
                 @endif --}}
             </div>
         </div>
     </div>
 </footer>
 <!--Footer Start-->
 <!--Footer Start-->
 <footer class="home3 footer wf100">
     <div class="container">
         <div class="row">
             <div class="col-lg-6 col-md-6 col-sm-12">
                 <p class="copyr"> ©
                     <script>
                         document.write(new Date().getFullYear());
                     </script> , <a href="#">
                         @if (session('language') == 'mar')
                             {{ Config::get('marathi.HOME_PAGE.ALL_RIGHT_RESERVED') }}
                         @else
                             {{ Config::get('english.HOME_PAGE.ALL_RIGHT_RESERVED') }}
                         @endif
                     </a>
                 </p>
             </div>
             <div class="col-lg-6 col-md-6 col-sm-12 d-flex justify-content-end">
                 <ul class="footer-social">
                     @forelse ($common_data['social_link'] as $item)
                         @if (session('language') == 'mar')
                             <li><a href="{{ $item['url'] }}" target="_blank" class="fb" target="_blank">
                                     {{-- <i class="fab fa-facebook-f"></i> --}}
                                     <img src="{{ Config::get('DocumentConstant.SOCIAL_ICON_VIEW') }}{{ $item['icon'] }}"
                                         width="25" height="25" alt="...">
                                 </a></li>
                         @else
                             <li><a href="{{ $item['url'] }}" target="_blank" class="fb" target="_blank">
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
 {{-- <script src="{{ asset('website_files/assets/js/jquery-3.7.0.min.js') }}"></script> --}}
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

 {{-- <script>
     $('#zoomtextbody').click(function() {
         $("body").attr("style", "font-size:16px !important;");
     });
     $('#zoomouttextbody').click(function() {
         $("body").attr("style", "font-size:12px !important;");
     });
 </script> --}}
 {{-- <script>
    // Save the default font sizes in a variable
    var defaultFontSizes = {
      "body": "16px",
      "h1": "50px",
      "h2": "26px",
      "h3": "32px",
      "p": "17px",
      "span": "14px",
    //   "a":"12px",
      "li":"19px"
      
    };
  
    $('#zoomtextbody').click(function() {
      // Increase font size by a certain factor (you can adjust this value as needed)
      $("body").css("font-size", parseInt($("body").css("font-size")) + 1 + "px");
      $("h1").css("font-size", parseInt($("h1").css("font-size")) + 5 + "px");
      $("h2").css("font-size", parseInt($("h2").css("font-size")) + 3 + "px");
      $("h3").css("font-size", parseInt($("h3").css("font-size")) + 3 + "px");
      $("p").css("font-size", parseInt($("p").css("font-size")) + 1 + "px");
      $("span").css("font-size", parseInt($("span").css("font-size")) + 1 + "px");
    //   $("a").css("font-size", parseInt($("a").css("font-size")) + 1 + "px");
      $("li").css("font-size", parseInt($("li").css("font-size")) + 1 + "px");
    });
  
    $('#zoomouttextbody').click(function() {
      // Decrease font size by a certain factor (you can adjust this value as needed)
      $("body").css("font-size", parseInt($("body").css("font-size")) - 1 + "px");
      $("h1").css("font-size", parseInt($("h1").css("font-size")) - 5 + "px");
      $("h2").css("font-size", parseInt($("h2").css("font-size")) - 3 + "px");
      $("h3").css("font-size", parseInt($("h3").css("font-size")) - 3 + "px");
      $("p").css("font-size", parseInt($("p").css("font-size")) - 1 + "px");
      $("span").css("font-size", parseInt($("span").css("font-size")) - 1 + "px");
    //   $("a").css("font-size", parseInt($("a").css("font-size")) - 1 + "px");
      $("li").css("font-size", parseInt($("li").css("font-size")) - 1 + "px");
    });
  
    // Reset font sizes to default when "A" button is clicked
    $('#resetfontsize').click(function() {
      $("body").css("font-size", defaultFontSizes["body"]);
      $("h1").css("font-size", defaultFontSizes["h1"]);
      $("h2").css("font-size", defaultFontSizes["h2"]);
      $("h3").css("font-size", defaultFontSizes["h3"]);
      $("p").css("font-size", defaultFontSizes["p"]);
      $("span").css("font-size", defaultFontSizes["span"]);
      $("a").css("font-size", defaultFontSizes["a"]);
    });
</script> --}}


<script>
    // Save the default font sizes in a variable
    var defaultFontSizes = {
      "body": "16px",
      "h1": "50px",
      "h2": "26px",
      "h3": "32px",
      "p": "17px",
      "span": "14px",
      // "a":"12px",
      "li": "12px"
    };
  
    // Variable to keep track of font size changes
    var fontSizeIncreases = 0;
    var fontSizeDecreases = 0;
  
    $('#zoomtextbody').click(function () {
      if (fontSizeIncreases < 2) {
        // Increase font size by a certain factor (you can adjust this value as needed)
        fontSizeIncreases++;
        $("body").css("font-size", parseInt($("body").css("font-size")) + 1 + "px");
        $("h1").css("font-size", parseInt($("h1").css("font-size")) + 5 + "px");
        $("h2").css("font-size", parseInt($("h2").css("font-size")) + 3 + "px");
        $("h3").css("font-size", parseInt($("h3").css("font-size")) + 3 + "px");
        $("p").css("font-size", parseInt($("p").css("font-size")) + 1 + "px");
        $("span").css("font-size", parseInt($("span").css("font-size")) + 1 + "px");
        // $("a").css("font-size", parseInt($("a").css("font-size")) + 1 + "px");
        $("li").css("font-size", parseInt($("li").css("font-size")) + 1 + "px");
      }
    });
  
    $('#zoomouttextbody').click(function () {
      if (fontSizeDecreases < 2) {
        // Decrease font size by a certain factor (you can adjust this value as needed)
        fontSizeDecreases++;
        $("body").css("font-size", parseInt($("body").css("font-size")) - 1 + "px");
        $("h1").css("font-size", parseInt($("h1").css("font-size")) - 5 + "px");
        $("h2").css("font-size", parseInt($("h2").css("font-size")) - 3 + "px");
        $("h3").css("font-size", parseInt($("h3").css("font-size")) - 3 + "px");
        $("p").css("font-size", parseInt($("p").css("font-size")) - 1 + "px");
        $("span").css("font-size", parseInt($("span").css("font-size")) - 1 + "px");
        // $("a").css("font-size", parseInt($("a").css("font-size")) - 1 + "px");
        $("li").css("font-size", parseInt($("li").css("font-size")) - 1 + "px");
      }
    });
  
    // Reset font sizes to default when "A" button is clicked
    $('#resetfontsize').click(function () {
      fontSizeIncreases = 0;
      fontSizeDecreases = 0;
      $("body").css("font-size", defaultFontSizes["body"]);
      $("h1").css("font-size", defaultFontSizes["h1"]);
      $("h2").css("font-size", defaultFontSizes["h2"]);
      $("h3").css("font-size", defaultFontSizes["h3"]);
      $("p").css("font-size", defaultFontSizes["p"]);
      $("span").css("font-size", defaultFontSizes["span"]);
      // $("a").css("font-size", defaultFontSizes["a"]);
      $("li").css("font-size", defaultFontSizes["li"]);
    });
  </script>
  

  
 {{-- <script src="{{ asset('website_files/assets/js/html-magnifier.js') }}"></script> --}}


 {{-- <script>
     $(document).ready(function() {
         $('[data-toggle="tooltip"]').tooltip();

         const magnifier = new HTMLMagnifier({
             width: 400
         });
         magnifier.hide(); // Hide the magnifier initially

         document.getElementById("magnifier").addEventListener("click", function() {
             if (magnifier.isVisible()) {
                 magnifier.hide();
             } else {
                 magnifier.show();
             }
         });
     });
 </script>  --}}
 <script>
   //defaults - not recommended to change

const SCALE = 1.3; //magnification
const SIZE = 150; // diameter
const LENSE_OFFSET_X = SIZE / 10.2;
const LENSE_OFFSET_Y = SIZE / 10.2;

document.documentElement.style.setProperty("--scale", SCALE);
document.documentElement.style.setProperty("--size", SIZE + "px");

//create magnifying glass (lense)
const handle = document.createElement("div");
handle.classList.add("handle");

const magnifyingGlass = document.createElement("div");
magnifyingGlass.classList.add("magnifying-glass");
magnifyingGlass.style.top = LENSE_OFFSET_Y + "px";
magnifyingGlass.style.left = LENSE_OFFSET_X + "px";

handle.append(magnifyingGlass);

const magnifyButton = document.getElementById("magnify");

const addMagnifyingGlass = () => {
  const bodyClone = document.body.cloneNode(true);
  bodyClone.classList.add("body-clone");
  bodyClone.style.top = "0px";
  bodyClone.style.left = "0px";
  magnifyingGlass.append(bodyClone);
  document.body.append(handle);
};

magnifyButton.addEventListener("click", addMagnifyingGlass);

const moveMagnifyingGlass = (event) => {
  let pointerX = event.pageX;
  let pointerY = event.pageY;
  //move magnifying glass with cursor
  handle.style.left = pointerX - SIZE / 1.7 + "px";
  handle.style.top = pointerY - SIZE / 1.7 + "px";
  if (magnifyingGlass.children[0]) {
    //align magnified document
    let offsetX = (SIZE * Math.pow(SCALE, 2)) / 2 - pointerX * SCALE;
    let offsetY = (SIZE * Math.pow(SCALE, 2)) / 2 - pointerY * SCALE;
    magnifyingGlass.children[0].style.left = offsetX + "px";
    magnifyingGlass.children[0].style.top = offsetY + "px";
  }
};

document.addEventListener("pointermove", moveMagnifyingGlass);

const removeMagnifiyingGlass = (event) => {
  magnifyingGlass.children[0].remove();
  handle.remove();
};

magnifyingGlass.addEventListener("dblclick", removeMagnifiyingGlass);


//issues 
//- lots of magin numbers for alignment
//- background gradient doesn't show over images
  </script>

 <script>
     $(document).ready(() => {
         $("#media_upload").change(function() {
             $("#media_imgPreview").show();

             const file = this.files[0];
             if (file) {
                 let reader = new FileReader();
                 reader.onload = function(event) {
                     $("#media_imgPreview")
                         .attr("src", event.target.result);
                 };
                 reader.readAsDataURL(file);
             }
         });
     });
 </script>
 <script>
    $(document).ready(() => {
        $("#ngo_photo").change(function() {
            $("#ngo_photoPreview").show();

            const file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    $("#ngo_photoPreview")
                        .attr("src", event.target.result);
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>

{{-- <script>
    $(document).ready(function() {
      //var divTop = 100; // Initial top position

      // Function to move the div and update its top position
      function moveDiv(divTop) {
        divTop = -divTop;
        $('.magnifier-content').css('top', divTop + 'px');
      }

      // Example: move the div up by 20 pixels
      $('#magnifier').on('click', function() {
        divTop += 20; // Decrease the top position by 20 pixels
        moveDiv(divTop);
      });
      


      function handleScrollEvent() {
      // Get the scroll positions
      const scrollX = window.scrollX || window.pageXOffset; // For horizontal scroll
      const scrollY = window.scrollY || window.pageYOffset; // For vertical scroll

      console.log("Scroll X:", scrollX);
      console.log("Scroll Y:", scrollY);
      moveDiv(scrollY);
      // You can use these scrollX and scrollY values as needed for your event handling.
    }

    // Attach the handleScrollEvent function to the 'scroll' event of the window
    window.addEventListener('scroll', handleScrollEvent);


    });
  </script> --}}

<script>
    $(document).ready(function () {
        // Get the total record count from a hidden input field or data attribute on the page
        var totalRecords1 = parseInt($('#totalRecordsInput1').val()); // Replace 'totalRecordsInput' with the actual ID or attribute

        // Check the totalRecords value and hide/show the button accordingly
        if (totalRecords1 <= 6) {
            $('#readMoreBtn1').hide();
        } else {
            $('#readMoreBtn1').show();
        }
    });
</script>

 </body>



 </html>
