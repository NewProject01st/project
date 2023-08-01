  <?php
  $common_data = App\Http\Controllers\Website\IndexController::getCommonWebData();
  ?>

  <div class="sidebar">
      <!--Widget Start-->
      <div class="widget">
          <h4>
              @if (session('language') == 'mar')
                  {{ Config::get('marathi.HOME_PAGE.UPCOMING_EVENTS') }}
              @else
                  {{ Config::get('english.HOME_PAGE.UPCOMING_EVENTS') }}
              @endif
          </h4>
          <div class="upcoming-events inner">
              <ul>
                  @forelse($common_data['upcoming_event']  as $event)
                      <?php
                    //   $date_event = explode('-', $event['end_date']);
                    //   $monthNum = $date_event[2];
                    //   $monthName = date('F', mktime(0, 0, 0, $monthNum, 10)); // March                        

                        $date_event = explode('-', $event['end_date']);
                        $day = $date_event[2];
                        $monthNum = $date_event[1];
                        $year = $date_event[0];

                        $monthName = date('F', mktime(0, 0, 0, $monthNum, $day, $year));
                        // echo $monthName;
                        
                      ?>
                      <li>
                          <div class="edate"> <strong>{{ $date_event[2] }}</strong> {{ $monthName }} <span
                                  class="year">{{ $date_event[0] }}</span>
                          </div>
                          @if (session('language') == 'mar')
                              <h6> <a href="#">{{ strip_tags($event['marathi_title']) }}</a>
                              @else
                                  <h6> <a href="#">{{ strip_tags($event['english_title']) }}</a>
                          @endif
                          </h6>
                          {{-- <span class="loc">Maharashtra, India</span> --}}
                      </li>
                  @empty
                      <p>
                        @if (session('language') == 'mar')
                        {{ Config::get('marathi.TRAINING_WORKSHOP.No_UPCOMING_EVENT') }}
                    @else
                        {{ Config::get('english.TRAINING_WORKSHOP.No_UPCOMING_EVENT') }}
                    @endif
                        </p>
                  @endforelse
              </ul>
          </div>
      </div>
    
  </div>
  </div>
