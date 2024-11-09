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
                                    <h4 class="widget-title mb-0">About <span>Us</span></h4>
                                </div>
                            </div>
                        </div>
                        <div class="loop-list-style-1">
                            <article class="p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                                <div class="pr-10 pl-10">
                                    <div class="entry-meta meta-1 font-x-small color-grey float-left">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 sidebar-right">
                    <div class="sidebar-widget">
                        <div class="widget-header mb-30">
                            <h5 class="widget-title">Contact <span>Info</span></h5>
                        </div>
                        <div class="post-aside-style-2">
                            <ul class="list-post">
                                <li class="mb-30 wow fadeIn animated">
                                    <div class="d-flex">
                                        <div class="post-content media-body">
                                            <h6 class="post-title mb-10">Address</h6>
                                            <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                                                123 Main Street, City, Country
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-30 wow fadeIn animated">
                                    <div class="d-flex">
                                        <div class="post-content media-body">
                                            <h6 class="post-title mb-10">Phone</h6>
                                            <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                                                +1 234 567 890
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="wow fadeIn animated">
                                    <div class="d-flex">
                                        <div class="post-content media-body">
                                            <h6 class="post-title mb-10">Email</h6>
                                            <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                                                info@example.com
                                            </div>
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
