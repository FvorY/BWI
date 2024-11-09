@extends('front')

@section('content')
<div class="container">
    <div class="row">
        <!-- main content -->
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="latest-post mb-50">
                        <div class="widget-header position-relative mb-30">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="widget-title mb-0">Vision & <span>Mission</span></h4>
                                </div>
                            </div>
                        </div>
                        <div class="loop-list-style-1">
                            <article class="p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                                <div class="post-thumb d-flex mb-15 border-radius-10 img-hover-scale">
                                    <img class="border-radius-10" src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Vision & Mission">
                                </div>
                            </article>

                            <article class="p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                                <div class="pr-10 pl-10">
                                    <h5 class="post-title mb-15">Our Vision</h5>
                                    <div class="entry-meta meta-1 font-x-small color-grey float-left">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    </div>
                                </div>
                            </article>

                            <article class="p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                                <div class="pr-10 pl-10">
                                    <h5 class="post-title mb-15">Our Mission</h5>
                                    <div class="entry-meta meta-1 font-x-small color-grey float-left">
                                        <ul class="mb-10">
                                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                                            <li>Sed do eiusmod tempor incididunt ut labore et dolore</li>
                                            <li>Ut enim ad minim veniam, quis nostrud exercitation</li>
                                            <li>Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 sidebar-right">
                    <div class="sidebar-widget">
                        <div class="widget-header mb-30">
                            <h5 class="widget-title">Quick <span>Links</span></h5>
                        </div>
                        <div class="post-aside-style-2">
                            <ul class="list-post">
                                <li class="mb-30 wow fadeIn animated">
                                    <div class="d-flex">
                                        <div class="post-content media-body">
                                            <h6 class="post-title mb-10 text-limit-2-row"><a href="#">About Us</a></h6>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-30 wow fadeIn animated">
                                    <div class="d-flex">
                                        <div class="post-content media-body">
                                            <h6 class="post-title mb-10 text-limit-2-row"><a href="#">Our Services</a></h6>
                                        </div>
                                    </div>
                                </li>
                                <li class="wow fadeIn animated">
                                    <div class="d-flex">
                                        <div class="post-content media-body">
                                            <h6 class="post-title mb-10 text-limit-2-row"><a href="#">Contact Us</a></h6>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
