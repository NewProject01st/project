      <!-- left sidebar -->
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
                                  href="{{ route('list-users') }}">Users</a></li>
                      </ul>
                  </div>

                  <div class="collapse" id="page-layouts">
                      <ul class="nav flex-column sub-menu">
                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('constitutionHistory.index') }}">Constitution & History</a></li>
                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('organizationchart.index') }}">Organization Chart</a></li>
                          <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                  href="{{ route('budget.index') }}">Budget</a></li>
                      </ul>
                  </div>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('tender.index') }}">
                      <i class="fas fa-window-restore menu-icon"></i>
                      <span class="menu-title">Tender</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false"
                      aria-controls="page-layouts">
                      <i class="fa fa-th-large menu-icon"></i>
                      <span class="menu-title">Master Management</span>
                      <i class="menu-arrow"></i>
                  </a>
                  @if(getRouteDetailsPresentOrNot('list-users',session('permissions')))
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
