      <!-- left sidebar -->
      <?php $data_for_url  = getRouteDetailsPresentOrNot(session('permissions')); ?>
      <nav class="sidebar sidebar-offcanvas fixed-nav" id="sidebar">
          <ul class="nav">
              <li class="nav-item nav-profile">
                  <div class="nav-link">
                      <div class="profile-image">
                          <img src="images/faces/face5.jpg" alt="image" />
                      </div>
                      <div class="profile-name">
                          <p class="name">
                              Welcome Admin
                          </p>
                          <p class="designation">
                              Super Admin
                          </p>
                      </div>
                  </div>
              </li>
              <li class="nav-item active">
                  <a class="nav-link" href="index.html">
                      <i class="fa fa-home menu-icon"></i>
                      <span class="menu-title">Dashboard</span>
                  </a>
              </li>
            @if (
            in_array("list-social-icon", $data_for_url) ||
            in_array("list-sub-header-info", $data_for_url) 
            )
              <li class="nav-item">
                  <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false"
                      aria-controls="page-layouts">
                      <i class="fa fa-th-large menu-icon"></i>
                      <span class="menu-title">Header</span>
                      <i class="menu-arrow"></i>
                  </a>

                  <div class="collapse" id="page-layouts">
                      <ul class="nav flex-column sub-menu">
                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('list-social-icon') }}">Main Header</a></li>
                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('list-sub-header-info') }}">Sub Header</a></li>
                      </ul>
                  </div>
              </li>
              @endif
              @if (in_array("list-main-menu", $data_for_url))
              <li class="nav-item">
                  <a class="nav-link" data-toggle="collapse" href="#menu" aria-expanded="false"
                      aria-controls="menu">
                      <i class="fa fa-th-large menu-icon"></i>
                      <span class="menu-title">Menu</span>
                      <i class="menu-arrow"></i>
                  </a>

                  <div class="collapse" id="menu">
                      <ul class="nav flex-column sub-menu">
                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('list-main-menu') }}">Main Menu</a></li>
                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('list-sub-menu') }}">Sub Menu</a></li>
                      </ul>
                  </div>
              </li>
              @endif
              @if (in_array("list-dynamic-page", $data_for_url))
              <li class="nav-item">
                  <a class="nav-link" data-toggle="collapse" href="#pages" aria-expanded="false"
                      aria-controls="pages">
                      <i class="fa fa-th-large menu-icon"></i>
                      <span class="menu-title">Pages</span>
                      <i class="menu-arrow"></i>
                  </a>

                  <div class="collapse" id="pages">
                      <ul class="nav flex-column sub-menu">
                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('list-dynamic-page') }}">Dynamic Pages</a></li>
                      </ul>
                  </div>
              </li>
              @endif

              @if (
                in_array('list-marquee',$data_for_url) ||
                in_array('list-slide',$data_for_url) ||
                in_array('list-disaster-management-web-portal',$data_for_url) ||
                in_array('list-disaster-management-news',$data_for_url) ||
                in_array('list-weather',$data_for_url) ||
                in_array('list-disasterforcast',$data_for_url) ||
                in_array('list-emergency-contact',$data_for_url) ||
                in_array('list-home-tender',$data_for_url) ||
                in_array('list-general-contact',$data_for_url)
              )
              <li class="nav-item">
                  <a class="nav-link" data-toggle="collapse" href="#home" aria-expanded="false"
                      aria-controls="home">
                      <i class="fa fa-th-large menu-icon"></i>
                      <span class="menu-title">Home</span>
                      <i class="menu-arrow"></i>
                  </a>
                  <div class="collapse" id="home">
                      <ul class="nav flex-column sub-menu">
                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('list-marquee') }}">News Bar</a></li>
                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('list-slide') }}">Slider</a></li>
                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('list-disaster-management-web-portal') }}">Disaster Web Portal</a></li>
                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('list-disaster-management-news') }}">Disaster Management News</a></li>

                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('list-weather') }}">Weather</a></li>
                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('list-disasterforcast') }}">Disaster Forcast</a></li>



                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('list-emergency-contact') }}">Emergency Contact</a></li>
                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('list-home-tender') }}">Tenders</a></li>
                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('list-general-contact') }}">General Contact</a></li>


                      </ul>
                  </div>
              </li>
            @endif

              <li class="nav-item">
                  <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false"
                      aria-controls="page-layouts">
                      <i class="fa fa-th-large menu-icon"></i>
                      <span class="menu-title">About Us</span>
                      <i class="menu-arrow"></i>
                  </a>

                  <div class="collapse" id="page-layouts">
                      <ul class="nav flex-column sub-menu">
                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('list-disastermanagementportal') }}">Disaster Management Portal</a>
                          </li>
                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('list-objectivegoals') }}">Objective Goals</a></li>
                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('list-statedisastermanagementauthority') }}">State Disaster Management
                                  Authority</a></li>

                      </ul>
                  </div>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false"
                      aria-controls="page-layouts">
                      <i class="fa fa-th-large menu-icon"></i>
                      <span class="menu-title">Preparedness</span>
                      <i class="menu-arrow"></i>
                  </a>

                  <div class="collapse" id="page-layouts">
                      <ul class="nav flex-column sub-menu">
                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('list-hazard-vulnerability-assessment') }}">Hazard and Vulnerability
                              </a>
                          </li>
                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('list-early-warning-system') }}">Early Warning System</a>
                          </li>
                          <li class="nav-item d-none d-lg-block"> <a class="nav-link"
                                  href="{{ route('list-capacity-building-and-training') }}">Capacity training</a>
                          </li>
                          <li class="nav-item d-none d-lg-block"> <a class="nav-link"
                                  href="{{ route('list-public-awareness-and-education') }}">Awareness And Education </a>
                          </li>

                      </ul>
                  </div>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false"
                      aria-controls="page-layouts">
                      <i class="fa fa-th-large menu-icon"></i>
                      <span class="menu-title">Emergency Response</span>
                      <i class="menu-arrow"></i>
                  </a>

                  <div class="collapse" id="page-layouts">
                      <ul class="nav flex-column sub-menu">
                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('list-state-emergency-operations-center') }}">State Emergency
                                  Operations Center (EOC)
                              </a>
                          </li>
                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('list-district-emergency-operations-center') }}">District Emergency
                                  Operations Center (DEOC)</a>
                          </li>
                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('list-emergency-contact-numbers') }}">Emergency Contact Numbers</a>
                          </li>
                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('list-evacuation-plans') }}">Evacuation Plans</a>
                          </li>
                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('list-relief-measures-resources') }}">Relief Measures Resources</a>
                          </li>
                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('list-search-rescue-teams') }}">Search Rescue Teams</a>
                          </li>
                      </ul>
                  </div>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false"
                      aria-controls="page-layouts">
                      <i class="fa fa-th-large menu-icon"></i>
                      <span class="menu-title">Citizen Action</span>
                      <i class="menu-arrow"></i>
                  </a>

                  <div class="collapse" id="page-layouts">
                      <ul class="nav flex-column sub-menu">
                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('list-report-crowdsourcing') }}">Report Incident Crowdsourcing
                              </a>
                          </li>
                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('list-volunteer-citizen-support') }}">Volunteer Citizen Support
                              </a>
                          </li>
                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('list-citizen-feedback-and-suggestion') }}">Feedback and suggestions
                              </a>
                          </li>
                      </ul>
                  </div>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false"
                      aria-controls="page-layouts">
                      <i class="fa fa-th-large menu-icon"></i>
                      <span class="menu-title">Policies Legislation</span>
                      <i class="menu-arrow"></i>
                  </a>

                  <div class="collapse" id="page-layouts">
                      <ul class="nav flex-column sub-menu">
                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('list-state-disaster-management-plan') }}">State Disaster Management
                                  Plan
                              </a>
                          </li>
                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('list-district-disaster-management-plan') }}">District Disaster
                                  Management
                                  Plan
                              </a>
                          </li>
                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('list-state-disaster-management-policy') }}">State Disaster Management
                                  Policy
                              </a>
                          </li>
                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('list-relevant-laws-and-regulations') }}">Relevant-Laws-And-Regulations
                              </a>
                          </li>
                      </ul>
                  </div>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('list-event') }}">
                      <i class="fas fa-window-restore menu-icon"></i>
                      <span class="menu-title">Event</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('list-tenders') }}">
                      <i class="fas fa-window-restore menu-icon"></i>
                      <span class="menu-title">Tender</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('list-policiesacts') }}">
                      <i class="fas fa-window-restore menu-icon"></i>
                      <span class="menu-title">Policies & Acts</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('list-projects') }}">
                      <i class="fas fa-window-restore menu-icon"></i>
                      <span class="menu-title">Projects</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('list-metadata') }}">
                      <i class="fas fa-window-restore menu-icon"></i>
                      <span class="menu-title">Metadata</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false"
                      aria-controls="page-layouts">
                      <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false"
                          aria-controls="page-layouts">
                          <i class="fa fa-th-large menu-icon"></i>
                          <span class="menu-title">Master Management</span>
                          <i class="menu-arrow"></i>
                      </a>
                      @if (in_array('list-users',$data_for_url))
                      <?php $currenturl = Request::url(); ?>
                      <div class="collapse" id="page-layouts">
                          <ul class="nav flex-column sub-menu">
                              <li class="nav-item d-none d-lg-block"> <a class="nav-link"
                                      href="{{ route('list-users') }}">Users Master</a></li>
                          </ul>
                      </div>
                      @endif
              </li>

          </ul>
      </nav><!-- partial -->