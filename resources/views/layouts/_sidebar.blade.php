<!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="{{url('/home')}}">
          {{-- <img src="{{asset('assets/atonergi.png')}}" alt="logo" style="margin-left: auto;"> --}}
          <h1 style="margin:auto; ">{{config('app.name')}}</h1>
        </a>
        <a class="navbar-brand brand-logo-mini" href="{{url('/home')}}">
          {{-- <img src="{{asset('assets/atonergi-mini.png')}}" alt="logo"/> --}}
          <h1 style="margin:auto; ">{{getsingkatan(config('app.name'))}}</h1>
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button>
        <div class="search-field ml-4 d-none d-md-block">
          <form class="d-flex align-items-stretch h-100" action="#">
            <div class="input-group">
              <input id="filterInput" type="text" class="form-control bg-transparent border-0" placeholder="Search Menu">
              <div class="input-group-btn">
                <button id="btn-reset" type="button" class="btn bg-transparent px-0 d-none" style="cursor: pointer;"><i class="fa fa-times"></i></button>
                <!-- <button type="button" class="btn bg-transparent dropdown-toggle px-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="mdi mdi-earth"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="#">Today</a>
                  <a class="dropdown-item" href="#">This week</a>
                  <a class="dropdown-item" href="#">This month</a>
                  <div role="separator" class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Month and older</a>
                </div> -->
              </div>
              <div class="input-group-addon bg-transparent border-0 search-button">
                <button type="button" class="btn btn-sm bg-transparent px-0" id="btn-search-menu">
                  <i class="mdi mdi-magnify"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item d-none d-lg-block full-screen-link">
            <a class="nav-link">
              <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
            </a>
          </li>
         <!--  <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="mdi mdi-email-outline"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <h6 class="p-3 mb-0">Messages</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="{{asset('assets/images/faces/face4.jpg')}}" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                  <p class="text-gray mb-0">
                    1 Minutes ago
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="{{asset('assets/images/faces/face2.jpg')}}" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                  <p class="text-gray mb-0">
                    15 Minutes ago
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="{{asset('assets/images/faces/face3.jpg')}}" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6>
                  <p class="text-gray mb-0">
                    18 Minutes ago
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <h6 class="p-3 mb-0 text-center">4 new messages</h6>
            </div>
          </li> -->

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle nav-profile" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              {{-- <img src="{{asset('assets/image/faces1.jpg')}}" alt="image"> --}}
              <span class="d-none d-lg-inline">{{Auth::user()->name}}</span>
            </a>
            <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">

              <a class="dropdown-item" href="{{ url('logout') }}">
                <i class="mdi mdi-logout mr-2 text-primary"></i>
                Signout
              </a>
            </div>
          </li>
          <li class="nav-item nav-logout d-none d-lg-block" title="Logout">
            <a class="nav-link" href="{{ url('logout') }}">
              <i class="mdi mdi-power"></i>
            </a>
          </li>
          <form id="logout-form" action="{{ url('logout') }}" method="post" style="display: none;">
              {{ csrf_field() }}
          </form>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="row row-offcanvas row-offcanvas-right">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav" id="ayaysir">
            <li class="nav-item {{Request::is('/') ? 'active' : ''}}">
              <a class="nav-link" href="{{url('/')}}">
                <span class="menu-title">Live Preview</span>
                {{-- <span class="menu-sub-title">( 2 new updates )</span> --}}
                <i class="fa fa-desktop"></i>
              </a>
            </li>

            <li class="nav-item {{Request::is('/users') ? 'active' : ''}}">
              <a class="nav-link" href="{{url('/users')}}">
                <span class="menu-title">User Management</span>
                {{-- <span class="menu-sub-title">( 2 new updates )</span> --}}
                <i class="fa fa-user"></i>
              </a>
            </li>

            <li class="nav-item {{Request::is('/postscontent') ? 'active' : ''}}">
              <a class="nav-link" href="{{url('/postscontent')}}">
                <span class="menu-title">Post Management</span>
                {{-- <span class="menu-sub-title">( 2 new updates )</span> --}}
                <i class="fa fa-newspaper-o"></i>
              </a>
            </li>


            <li class="nav-item {{Request::is('/cities') ? 'active' : ''}}">
              <a class="nav-link" href="{{url('/cities')}}">
                <span class="menu-title">Cities</span>
                {{-- <span class="menu-sub-title">( 2 new updates )</span> --}}
                <i class="fa fa-newspaper-o"></i>
              </a>
            </li>

              <li class="nav-item {{Request::is('/subdistricts') ? 'active' : ''}}">
              <a class="nav-link" href="{{url('/subdistricts')}}">
                <span class="menu-title">Subdistricts</span>
                {{-- <span class="menu-sub-title">( 2 new updates )</span> --}}
                <i class="fa fa-newspaper-o"></i>
              </a>
            </li>

              <li class="nav-item {{Request::is('/vilages') ? 'active' : ''}}">
              <a class="nav-link" href="{{url('/vilages')}}">
                <span class="menu-title">Vilages</span>
                {{-- <span class="menu-sub-title">( 2 new updates )</span> --}}
                <i class="fa fa-newspaper-o"></i>
              </a>
            </li>

             <li class="nav-item {{Request::is('/wakafland') ? 'active' : ''}}">
              <a class="nav-link" href="{{url('/wakafland')}}">
                <span class="menu-title">Wakaf Land</span>
                {{-- <span class="menu-sub-title">( 2 new updates )</span> --}}
                <i class="fa fa-newspaper-o"></i>
              </a>
            </li>

            <li class="nav-item {{Request::is('profil') ? 'active' : '' || Request::is('profil/*') ? 'active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#profil" aria-expanded="false" aria-controls="ui-basic">
                  <span class="menu-title">Profil</span>
                  <span class="d-none">
                    Profil
                  </span>
                  <i class="menu-arrow"></i>
                  <i class="mdi mdi-account-search"></i>
                </a>
                <div class="collapse {{Request::is('profil') ? 'show' : '' || Request::is('profil/*') ? 'show' : '' }}" id="profil">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link {{Request::is('profil/visimisi') ? 'active' : '' || Request::is('profil/visimisi/*') ? 'active' : '' }}" href="{{url('profil/visimisi')}}">Visi Misi<span class="d-none">Visi Misi</span></a></li>
                  </ul>
                  </div>
              </li>

          </ul>

        </nav>
