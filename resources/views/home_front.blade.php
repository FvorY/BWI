@extends('front')

@section('content')

<div class="container">
                <div class="row">
                    <!-- sidebar-left -->
                    <div class="col-lg-2 col-md-3 primary-sidebar sticky-sidebar sidebar-left order-2 order-md-1">
                        <!-- Widget Weather -->
                        <div class="sidebar-widget widget-weather border-radius-10 bg-white mb-30 mt-55">
                            <div class="d-flex">
                                <div class="font-medium">
                                    <p>Monday</p>
                                    <h2>12</h2>
                                    <p><strong>August</strong></p>
                                </div>
                                <div class="font-medium ml-10 pt-20">
                                    <div id="datetime" class="d-inline-block">
                                        <ul>
                                            <li><span class="font-small">
                                                    <a class="text-primary" href="#">London</a><br>
                                                    <i class="wi wi-day-sunny mr-5"></i>32ºc
                                                </span>
                                                <p>Sunny</p>
                                            </li>
                                            <li><span class="font-small">
                                                    <a class="text-danger" href="#">Paris</a><br>
                                                    <i class="wi wi-day-cloudy mr-5"></i>28ºc
                                                </span>
                                                <p>Cloudy</p>
                                            </li>
                                            <li><span class="font-small">
                                                    <a class="text-success" href="#">New York</a><br>
                                                    <i class="wi wi-rain-mix mr-5"></i>25ºc
                                                </span>
                                                <p>Rainy</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        
                    </div>
                    <!-- main content -->
                    <div class="col-lg-10 col-md-9 order-1 order-md-2">
                        <div class="row">
                            <div class="col-lg-8 col-md-12">
                                <!-- Featured posts -->
                                <div class="featured-post mb-50">
                                    <h4 class="widget-title mb-30">Today <span>Highlight</span></h4>
                                    <div class="featured-slider-1 border-radius-10">
                                        <div class="featured-slider-1-items">
                                            <div class="slider-single p-10">
                                                <div class="img-hover-slide border-radius-15 mb-30 position-relative overflow-hidden">
                                                    <span class="top-right-icon bg-dark"><i class="mdi mdi-camera-alt"></i></span>
                                                    <a href="single.html">
                                                        <img src="assets/imgs/news-8.jpg" alt="post-slider">
                                                    </a>
                                                </div>
                                                <div class="pr-10 pl-10">
                                                    <div class="entry-meta mb-30">
                                                        <a class="entry-meta meta-0" href="category.html"><span class="post-in background1 text-danger font-x-small">Economy</span></a>
                                                        <div class="float-right font-small">
                                                            <span><span class="mr-10 text-muted"><i class="fa fa-eye" aria-hidden="true"></i></span>5.8k</span>
                                                            <span class="ml-30"><span class="mr-10 text-muted"><i class="fa fa-comment" aria-hidden="true"></i></span>2.5k</span>
                                                            <span class="ml-30"><span class="mr-10 text-muted"><i class="fa fa-share-alt" aria-hidden="true"></i></span>125k</span>
                                                        </div>
                                                    </div>
                                                    <h4 class="post-title mb-20"><a href="#">‘People Are Getting in Planes’: The Travel Business Is Picking Up</a></h4>
                                                    <div class="mb-20 overflow-hidden">
                                                        <div class="entry-meta meta-2 float-left">
                                                            <a class="float-left mr-10 author-img" href="author.html" tabindex="0"><img src="assets/imgs/authors/author.png" alt=""></a>
                                                            <a href="author.html" tabindex="0"><span class="author-name text-grey">B. Johnathan</span></a>
                                                            <br>
                                                            <span class="author-add color-grey">Maidstone, Kent</span>
                                                        </div>
                                                        <div class="float-right">
                                                            <a href="single.html" class="read-more"><span class="mr-10"><i class="fa fa-thumbtack" aria-hidden="true"></i></span>Picked by Editor</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slider-single pt-10 pl-10 pr-10 pb-10">
                                                <div class="img-hover-slide border-radius-15 mb-30 position-relative overflow-hidden">
                                                    <span class="top-right-icon bg-dark"><i class="mdi mdi-flash-on"></i></span>
                                                    <a href="single.html">
                                                        <img src="assets/imgs/slide-1.jpg" alt="post-slider">
                                                    </a>
                                                </div>
                                                <div class="pr-10 pl-10">
                                                    <div class="entry-meta mb-30">
                                                        <a class="entry-meta meta-0" href="category.html"><span class="post-in background2 text-primary font-x-small">Technology</span></a>
                                                        <div class="float-right font-small">
                                                            <span><span class="mr-10 text-muted"><i class="fa fa-eye" aria-hidden="true"></i></span>5.8k</span>
                                                            <span class="ml-30"><span class="mr-10 text-muted"><i class="fa fa-comment" aria-hidden="true"></i></span>2.5k</span>
                                                            <span class="ml-30"><span class="mr-10 text-muted"><i class="fa fa-share-alt" aria-hidden="true"></i></span>125k</span>
                                                        </div>
                                                    </div>
                                                    <h4 class="post-title mb-20"><a href="#">NASA Picks Moon Lander Designs by Elon Musk and Jeff Bezos Rocket Companies</a></h4>
                                                    <div class="mb-20 overflow-hidden">
                                                        <div class="entry-meta meta-2 float-left">
                                                            <a class="float-left mr-10 author-img" href="author.html" tabindex="0"><img src="assets/imgs/authors/author-1.png" alt=""></a>
                                                            <a href="author.html" tabindex="0"><span class="author-name text-grey">Steven Keni</span></a>
                                                            <br>
                                                            <span class="author-add color-grey">Maidstone, Kent</span>
                                                        </div>
                                                        <div class="float-right">
                                                            <a href="single.html" class="read-more"><span class="mr-10"><i class="fa fa-thumbtack" aria-hidden="true"></i></span>Picked by Editor</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="col-lg-4 col-md-12 sidebar-right">
                                <!--Post aside style 1-->
                                <div class="sidebar-widget mb-30">
                                    <div class="widget-header position-relative mb-30">
                                        <div class="row">
                                            <div class="col-7">
                                                <h4 class="widget-title mb-0">Don't <span>miss</span></h4>
                                            </div>
                                            <div class="col-5 text-right">
                                                <h6 class="font-medium pr-15">
                                                    <a class="text-muted font-small" href="#">View all</a>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post-aside-style-1 border-radius-10 p-20 bg-white">
                                        <ul class="list-post">
                                            <li class="mb-20">
                                                <div class="d-flex">
                                                    <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                                        <a class="color-white" href="single.html">
                                                            <img src="assets/imgs/thumbnail-4.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-content media-body">
                                                        <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">Federal arrests show no sign that antifa plotted protests</a></h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mb-20">
                                                <div class="d-flex">
                                                    <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                                        <a class="color-white" href="single.html">
                                                            <img src="assets/imgs/thumbnail-15.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-content media-body">
                                                        <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">How line-dried laundry gets that fresh smell</a></h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mb-20">
                                                <div class="d-flex">
                                                    <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                                        <a class="color-white" href="single.html">
                                                            <img src="assets/imgs/thumbnail-16.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-content media-body">
                                                        <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">Traveling tends to magnify all human emotions</a></h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                                        <a class="color-white" href="single.html">
                                                            <img src="assets/imgs/thumbnail-15.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-content media-body">
                                                        <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">How line-dried laundry gets that fresh smell</a></h6>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                               
                               
                                <!--Post aside style 2-->
                                <div class="sidebar-widget">
                                    <div class="widget-header mb-30">
                                        <h5 class="widget-title">Top <span>Trending</span></h5>
                                    </div>
                                    <div class="post-aside-style-2">
                                        <ul class="list-post">
                                            <li class="mb-30 wow fadeIn animated">
                                                <div class="d-flex">
                                                    <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                                        <a class="color-white" href="single.html">
                                                            <img src="assets/imgs/thumbnail-2.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-content media-body">
                                                        <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">Vancouver woman finds pictures and videos of herself online</a></h6>
                                                        <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                                                            <span class="post-by">By <a href="author.html">K. Marry</a></span>
                                                            <span class="post-on">4m ago</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mb-30 wow fadeIn animated">
                                                <div class="d-flex">
                                                    <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                                        <a class="color-white" href="single.html">
                                                            <img src="assets/imgs/thumbnail-3.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-content media-body">
                                                        <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">4 Things Emotionally Intelligent People Don’t Do</a></h6>
                                                        <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                                                            <span class="post-by">By <a href="author.html">Mr. John</a></span>
                                                            <span class="post-on">3h ago</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mb-30 wow fadeIn animated">
                                                <div class="d-flex">
                                                    <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                                        <a class="color-white" href="single.html">
                                                            <img src="assets/imgs/thumbnail-5.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-content media-body">
                                                        <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">Reflections from a Token Black Friend</a></h6>
                                                        <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                                                            <span class="post-by">By <a href="author.html">Kenedy</a></span>
                                                            <span class="post-on">4h ago</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mb-30 wow fadeIn animated">
                                                <div class="d-flex">
                                                    <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                                        <a class="color-white" href="single.html">
                                                            <img src="assets/imgs/thumbnail-7.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-content media-body">
                                                        <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">How to Identify a Smart Person in 3 Minutes</a></h6>
                                                        <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                                                            <span class="post-by">By <a href="author.html">Steven</a></span>
                                                            <span class="post-on">5h ago</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="wow fadeIn animated">
                                                <div class="d-flex">
                                                    <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                                        <a class="color-white" href="single.html">
                                                            <img src="assets/imgs/thumbnail-8.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-content media-body">
                                                        <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">Blackface Minstrel Songs Don’t Belong in Children’s Music Class</a></h6>
                                                        <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                                                            <span class="post-by">By <a href="author.html">J.Smith</a></span>
                                                            <span class="post-on">5h30 ago</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center mt-50 mb-50">
                                <div id="adsCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
                                    <div class="carousel-inner" style="height: 200px;">
                                        <div class="carousel-item active mr-3" data-interval="5000">
                                            <img class="border-radius-10 d-inline w-100 h-100" style="object-fit: cover;" src="assets/imgs/ads.jpg" alt="Advertisement 1">
                                        </div>
                                        <div class="carousel-item mr-3" data-interval="5000">
                                            <img class="border-radius-10 d-inline w-100 h-100" style="object-fit: cover;" src="assets/imgs/ads.jpg" alt="Advertisement 2">
                                        </div>
                                        <div class="carousel-item mr-3" data-interval="5000">
                                            <img class="border-radius-10 d-inline w-100 h-100" style="object-fit: cover;" src="assets/imgs/ads.jpg" alt="Advertisement 3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 col-md-12">
                                <div class="latest-post mb-50">
                                    <div class="widget-header position-relative mb-30">
                                        <div class="row">
                                            <div class="col-7">
                                                <h4 class="widget-title mb-0">Latest <span>Posts</span></h4>
                                            </div>
                                            <div class="col-5 text-right">
                                                <h6 class="font-medium pr-15">
                                                    <a class="text-muted font-small" href="#">View all</a>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="loop-list-style-1">
                                        <article class="first-post p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                                            <div class="img-hover-slide border-radius-15 mb-30 position-relative overflow-hidden">
                                                <span class="top-right-icon bg-dark"><i class="mdi mdi-flash-on"></i></span>
                                                <a href="single.html">
                                                    <img src="assets/imgs/news-21.jpg" alt="post-slider">
                                                </a>
                                            </div>
                                            <div class="pr-10 pl-10">
                                                <div class="entry-meta mb-30">
                                                    <a class="entry-meta meta-0" href="category.html"><span class="post-in background2 text-primary font-x-small">Technology</span></a>
                                                    <div class="float-right font-small">
                                                        <span><span class="mr-10 text-muted"><i class="fa fa-eye" aria-hidden="true"></i></span>5.8k</span>
                                                        <span class="ml-30"><span class="mr-10 text-muted"><i class="fa fa-comment" aria-hidden="true"></i></span>2.5k</span>
                                                        <span class="ml-30"><span class="mr-10 text-muted"><i class="fa fa-share-alt" aria-hidden="true"></i></span>125k</span>
                                                    </div>
                                                </div>
                                                <h4 class="post-title mb-20">
                                                    <span class="post-format-icon">
                                                        <ion-icon name="headset-outline"></ion-icon>
                                                    </span>
                                                    <a href="single.html">Team Bitbose geared up to attend Blockchain World Conference ’18 in Atlantic City, New Jersey</a></h4>
                                                <div class="mb-20 overflow-hidden">
                                                    <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                                                        <span class="post-by">By <a href="author.html">KNICKMEYER</a></span>
                                                        <span class="post-on">18/09/2020 09:35 EST</span>
                                                        <span class="time-reading">12 mins read</span>
                                                        <p class="font-x-small mt-10">Updated 18/09/2020 10:28 EST</p>
                                                    </div>
                                                    <div class="float-right">
                                                        <a href="single.html" class="read-more"><span class="mr-10"><i class="fa fa-thumbtack" aria-hidden="true"></i></span>Picked by Editor</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                                            <div class="d-flex">
                                                <div class="post-thumb d-flex mr-15 border-radius-15 img-hover-scale">
                                                    <a class="color-white" href="single.html">
                                                        <img class="border-radius-15" src="assets/imgs/thumbnail-15.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-content media-body">
                                                    <div class="entry-meta mb-15 mt-10">
                                                        <a class="entry-meta meta-2" href="category.html"><span class="post-in text-danger font-x-small">Politic</span></a>
                                                    </div>
                                                    <h5 class="post-title mb-15 text-limit-2-row">
                                                        <span class="post-format-icon">
                                                            <ion-icon name="videocam-outline"></ion-icon>
                                                        </span>
                                                        <a href="single.html">More than 1.5 million people sought state unemployment benefits last week even as businesses reopened.</a></h5>
                                                    <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                                                        <span class="post-by">By <a href="author.html">Sean Boynton</a></span>
                                                        <span class="post-on">15/09/2020 07:00 EST</span>
                                                        <span class="time-reading">12 mins read</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                                            <div class="d-flex">
                                                <div class="post-thumb d-flex mr-15 border-radius-15 img-hover-scale">
                                                    <a class="color-white" href="single.html">
                                                        <img class="border-radius-15" src="assets/imgs/thumbnail-13.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-content media-body">
                                                    <div class="entry-meta mb-15 mt-10">
                                                        <a class="entry-meta meta-2" href="category.html"><span class="post-in text-warning font-x-small">Religion</span></a>
                                                    </div>
                                                    <h5 class="post-title mb-15 text-limit-2-row">
                                                        <a href="single.html">Elite B.C., Ontario crime network laundering ‘hundreds of millions’ a year, inquiry hears</a></h5>
                                                    <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                                                        <span class="post-by">By <a href="author.html">Walter Cronkite</a></span>
                                                        <span class="post-on">16/09/2020 08:15 EST</span>
                                                        <span class="time-reading">14 mins read</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                                            <div class="d-flex">
                                                <div class="post-thumb d-flex mr-15 border-radius-15 img-hover-scale">
                                                    <a class="color-white" href="single.html">
                                                        <img class="border-radius-15" src="assets/imgs/thumbnail-16.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-content media-body">
                                                    <div class="entry-meta mb-15 mt-10">
                                                        <a class="entry-meta meta-2" href="category.html"><span class="post-in text-success font-x-small">Healthy</span></a>
                                                    </div>
                                                    <h5 class="post-title mb-15 text-limit-2-row">
                                                        <span class="post-format-icon">
                                                            <ion-icon name="image-outline"></ion-icon>
                                                        </span>
                                                        <a href="single.html">Daycares are opening across the country, but can they really operate safely?</a></h5>
                                                    <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                                                        <span class="post-by">By <a href="author.html">JONATHAN LEMIRE</a></span>
                                                        <span class="post-on">17/09/2020 19:35 EST</span>
                                                        <span class="time-reading">6 mins read</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                                            <div class="d-flex">
                                                <div class="post-thumb d-flex mr-15 border-radius-15 img-hover-scale">
                                                    <a class="color-white" href="single.html">
                                                        <img class="border-radius-15" src="assets/imgs/thumbnail-8.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-content media-body">
                                                    <div class="entry-meta mb-15 mt-10">
                                                        <a class="entry-meta meta-2" href="category.html"><span class="post-in text-info font-x-small">Conflicts</span></a>
                                                    </div>
                                                    <h5 class="post-title mb-15 text-limit-2-row">
                                                        <span class="post-format-icon">
                                                            <ion-icon name="chatbox-outline"></ion-icon>
                                                        </span>
                                                        <a href="single.html">Dwayne ‘The Rock’ Johnson confronts Donald Trump: ‘Where are you?’</a></h5>
                                                    <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                                                        <span class="post-by">By <a href="author.html">Walter Cronkite</a></span>
                                                        <span class="post-on">18/09/2020 09:35 EST</span>
                                                        <span class="time-reading">13 mins read</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                                <div class="pagination-area mb-30">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-start">
                                            <li class="page-item"><a class="page-link" href="#"><i class="ti-angle-left"></i></a></li>
                                            <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                            <li class="page-item"><a class="page-link" href="#">02</a></li>
                                            <li class="page-item"><a class="page-link" href="#">03</a></li>
                                            <li class="page-item"><a class="page-link" href="#">04</a></li>
                                            <li class="page-item"><a class="page-link" href="#"><i class="ti-angle-right"></i></a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
