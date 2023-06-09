  <?php
  $common_data = App\Http\Controllers\Website\IndexController::getCommonWebData();
  ?>

  <div class="sidebar">
      <!--Widget Start-->
      <div class="widget">
          <h4>Upcoming Events</h4>
          <div class="upcoming-events inner">
              <ul>
                  @forelse($common_data['upcoming_event']  as $event)
                      <?php
                      $date_event = explode('-', $event['start_date']);
                      $monthNum = $date_event[2];
                      $monthName = date('F', mktime(0, 0, 0, $monthNum, 10)); // March
                      ?>
                      <li>
                          <div class="edate"> <strong>{{ $date_event[0] }}</strong> {{ $monthName }} <span
                                  class="year">{{ $date_event[2] }}</span>
                          </div>
                          @if (session('language') == 'mar')
                              <h6> <a href="#">{{ $event['marathi_title'] }}</a>
                              @else
                                  <h6> <a href="#">{{ $event['english_title'] }}</a>
                          @endif
                          </h6>
                          {{-- <span class="loc">Maharashtra, India</span> --}}
                      </li>
                  @empty
                      <p>No Upcoming Event</p>
                  @endforelse
              </ul>
          </div>
      </div>
      <!--Widget End-->

      {{--          <div class="widget">
              <h4>Important Links</h4>
              <div class="archives inner">
                  <ul>
                      <li><a href="#">Emergency Services</a></li>
                      <li><a href="#">Environmental Conditions</a></li>
                      <li><a href="#">Disaster Preparedness</a></li>
                      <li><a href="#">Disaster Response</a></li>
                      <li><a href="#">Disaster Recovery</a></li>
                      <li><a href="#">Volunteer Opportunities</a></li>
                      <li><a href="#">Donations and Aid</a></li>
                      <li><a href="#">Local Resources</a></li>
                  </ul>
              </div>
          </div>
          --}}
      <!--Widget End-->
  </div>
  </div>
