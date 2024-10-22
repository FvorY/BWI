@extends('front')

@section('content')

  <link rel="stylesheet" href="{{asset('assets/css/fancybox.min.css')}}" type="text/css">

  <div id="section-slider2" style="background-image: url('{{url('/')}}/{{$backgroundheader->image}}');">
    <div class="swiper-container" id="headerswiper">
      <div class="swiper-wrapper d-none">
        <!-- Item -->
        {{-- @foreach ($homecontent as $key => $value) --}}
          <div class="swiper-slide">
            <div class="slider-content">
              <div class="container">
                <div class="row">
                  <div class="content col-12 col-sm-12">
                    <h1 class="ez-animate" data-animation="fadeInUp">Portofolio</h1>
                    <p class="ez-animate" data-animation="fadeInUp">&nbsp;</p>
                    <ul>
                      {{-- <li><a href="#"><img class="img-fluid ez-animate" src="assets/images/img-appstore.png" alt="Appcraft" data-animation="fadeInUp"></a></li>
                      <li><a href="#"><img class="img-fluid ez-animate" src="assets/images/img-googleplay.png" alt="Appcraft" data-animation="fadeInUp"></a></li> --}}
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            {{-- <div class="slider-image">
              @if(file_exists($backgroundheader->image))
                <img class="img-fluid" src="{{$backgroundheader->image}}">
              @else
                <img class="img-fluid" src="assets/images/slider2.jpg">
              @endif

            </div> --}}
          </div>
        {{-- @endforeach --}}

      </div>
      <!-- Add Pagination -->
      <div class="swiper-pagination"></div>
      <!-- Add Arrows -->
      {{-- <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div> --}}
  </div>
</div>

<!-- Section Features 2 -->
<div class="section-features2" style="background-image: url('{{asset('assets/images/bg-features.jpg')}}'); background-size: 100% 100%;">
  <div class="container">
    <div class="row">
      <div class="left col-sm-12 col-md-6">
        <div class="swiper-container" id="detailswiper" style=" border-radius: 20px; border: 10px solid #1b8bc2">
          <div class="swiper-wrapper d-none">

            @foreach ($image as $key => $value)
            <div class="swiper-slide">

              <a href="{{url('/')}}/{{$value->image}}" data-fancybox="gallery">
                <div class="slider-image">
                  <img class="img-fluid ez-animate" src="{{url('/')}}/{{$value->image}}" alt="Image Detail" data-animation="fadeInRight">
                </div>
              </a>
            </div>
            @endforeach


          {{-- <img class="circleicon1 ez-animate" src="assets/images/img-circleicon2.png" alt="Appcraft" data-animation="fadeInUp"> --}}

        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        </div>
      </div>
      <div class="right my-auto col-sm-12 col-md-6">
        <h2>{{$portofolio->name}}</h2>
        <p>{{$portofolio->description}}</p>

        @if ($portofolio->link != null)
          <a href="{{$portofolio->link}}" class="btn-2 shadow1 style3 bgscheme">VIEW ONLINE</a>
        @endif

      </div>
    </div>
  </div>
</div>
<!-- /.Section Features 2 -->

@endsection

@section('extra_script')
  <script src="{{asset('assets/js/fancybox.min.js')}}" charset="utf-8"></script>
  <script>
  $(document).ready(function(){
    var swiper = new Swiper('#detailswiper', {
      autoHeight: true,
      // loop: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  })

  </script>
@endsection
