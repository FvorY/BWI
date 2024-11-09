<aside id="sidebar-wrapper" class="custom-scrollbar offcanvas-sidebar position-right">
    <button class="off-canvas-close"><i class="ti-close"></i></button>
    <div class="sidebar-inner">
        <ul class="main-menu d-none d-lg-flex justify-content-start">
            <li class="menu-item-has-children">
                <a href="{{ url('/') }}">HOME</a>
            </li>
            <li class="menu-item-has-children">
                <a><span class="mr-15"></span>PROFIL</a>
                <ul class="sub-menu text-muted font-small">
                    <li><a href="index.html">Tentang Kami</a></li>
                    <li><a href="home-2.html">Struktur Organisai 2</a></li>
                    <li><a href="{{ url('/visimisi') }}">Visi & Misi</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children">
                <a><span class="mr-15"></span>INFORMASI PUBLIK</a>
                <ul class="sub-menu text-muted font-small">
                    <li><a href="{{ url('/data-wakaf') }}">Data Tanah Wakaf</a></li>
                    <li><a href="home-2.html">Data Nazir</a></li>
                    <li><a href="home-3.html">Formulir Pergantian / Penetapan Nazir</a></li>
                    <li><a href="home-3.html">Literasi</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children">
                <a><span class="mr-15"></span>REGULASI</a>
                <ul class="sub-menu text-muted font-small">
                    <li><a href="index.html">Undang-undang Wakaf</a></li>
                    <li><a href="home-2.html">Peraturan Pemerintahan</a></li>
                    <li><a href="home-3.html">Peraturan BWI</a></li>
                    <li><a href="home-3.html">Peraturan Mentri Agama</a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside>

<!-- Main Header -->
<header class="main-header header-style-2 mb-40">
    <div class="header-bottom header-sticky text-center" style="background-color: #f1f8e9;">
        <div class="scroll-progress gradient-bg-1"></div>
        <div class="mobile_menu d-lg-none d-block"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2 col-md-3">
                    <div class="header-logo d-flex align-items-center">
                        <a href="{{ url('/') }}" class="d-flex align-items-center">
                            <img class="logo-img d-none d-lg-inline" src="{{ asset('assets/images/logo.png') }}" alt="Logo" style="height: 45px; width: 45px; object-fit: contain;">
                            <img class="logo-img d-none d-md-inline d-lg-none" src="{{ asset('assets/images/logo.png') }}" alt="Logo" style="height: 45px; width: 45px; object-fit: contain;">
                            <img class="logo-img d-inline d-md-none" src="{{ asset('assets/images/favicon.png') }}" alt="Logo" style="height: 45px; width: 45px; object-fit: contain;">
                            <span class="ml-2 font-weight-bold">BWI Jakarta</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-9 main-header-navigation">
                    <div class="main-nav d-flex justify-content-between align-items-center">
                        <nav class="flex-grow-1">

                            <ul class="main-menu d-none d-lg-flex justify-content-start">
                                <li class="menu-item-has-children">
                                    <a href="{{ url('/') }}">HOME</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a><span class="mr-15">
                                        </span>PROFIL</a>
                                    <ul class="sub-menu text-muted font-small">
                                        <li><a href="{{ url('/about') }}">Tentang Kami</a></li>
                                        <li><a href="home-2.html">Struktur Organisai 2</a></li>
                                        <li><a href="{{ url('/vision-mission') }}">Visi & Misi</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a><span class="mr-15">
                                        </span>INFORMASI PUBLIK</a>
                                    <ul class="sub-menu text-muted font-small">
                                        <li><a href="{{ url('/data-wakaf') }}">Data Tanah Wakaf</a></li>
                                        <li><a href="home-2.html">Data Nazir</a></li>
                                        <li><a href="home-3.html">Formulir Pergantian / Penetapan Nazir</a></li>
                                        <li><a href="home-3.html">Literasi</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a><span class="mr-15">
                                        </span>REGULASI</a>
                                    <ul class="sub-menu text-muted font-small">
                                        <li><a href="index.html">Undang-undang Wakaf</a></li>
                                        <li><a href="home-2.html">Peraturan Pemerintahan</a></li>
                                        <li><a href="home-3.html">Peraturan BWI</a></li>
                                        <li><a href="home-3.html">Peraturan Mentri Agama</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>