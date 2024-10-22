@extends('front')

@section('content')

  <div id="section-slider2" style="background-image: url('{{$backgroundheader->image}}');">
    <div class="swiper-container" id="headerswiper">
      <div class="swiper-wrapper d-none">
        <!-- Item -->
        {{-- @foreach ($homecontent as $key => $value) --}}
          <div class="swiper-slide">
            <div class="slider-content">
              <div class="container">
                <div class="row">
                  <div class="content col-12 col-sm-12">
                    <h1 class="ez-animate" data-animation="fadeInUp">{{$pageinfo["title"]}}</h1>
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

<!-- Section Contact 1 -->
<div id="section-contact1">
  <div class="container">
    <div class="row">
      @if (session('sukses'))
      <div class="alert alert-success" role="alert">
        Success, Terimakasih telah mengirim pesan kepada kami, ditunggu balasan dari kami ya :)
      </div>
      @endif

      @if (session('gagal'))
      <div class="alert alert-danger" role="alert">
        Gagal, Maaf pesan anda tidak terkirim kepada kami, coba lagi nanti :(
      </div>
      @endif
      <div class="left ez-animate col-12 col-md-7" data-animation="fadeInLeft">
        <form action="{{url('/simpancontact')}}" method="post" id="formcontact">
        {{ csrf_field() }}
        <div class="row">
          <div class="form-group col-sm-12 col-md-12 col-lg-12">
            <input type="text" class="form-control" name="name" placeholder="Your name" required="">
          </div>
          <div class="form-group col-sm-12 col-md-12 col-lg-12">
            <input type="email" class="form-control" name="email" placeholder="Email address" required="">
          </div>
          <div class="form-group col-sm-12 col-md-12 col-lg-12">
            <input type="number" class="form-control" name="phone" placeholder="Your Phone" required="">
          </div>
          <div class="form-group col-12">
            <textarea class="form-control" name="message" placeholder="Write message here" required=""></textarea>
          </div>

          <div class="form-group col-12">
          <div class="g-recaptcha" data-sitekey="6LcD_aMZAAAAAF53Nx2w-4oiP2jJL3M-wcmbdVGR"></div>
          </div>

        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <button type="button" onclick="savecontact()" class="shadow1 style3 bgscheme">SEND</button>
          </div>
        </div>
      </form>
      </div>
      <div class="right ez-animate col-12 col-md-5" data-animation="fadeInRight">
        {{-- <h3>Do you have any question?</h3> --}}
        <ul>
          <li>Phone</li>
          <li><a href="tel:0895355153024">0895355153024</a></li>
        </ul>
        <ul>
          <li>Email</li>
          <li><a href="mailto:solitsosmed@gmail.com">solitsosmed@gmail.com</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- /.Section Contact 1 -->

@endsection

@section('extra_script')
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script>

  function savecontact() {
    if(grecaptcha && grecaptcha.getResponse().length > 0)
    {
         //the recaptcha is checked
         // Do what you want here
         // alert('Well, recaptcha is checked !');
         $('#formcontact').submit();
    }
    else
    {
        //The recaptcha is not cheched
        //You can display an error message here
        alert('Oops, check recaptcha anda!');
    }
  }

  </script>
@endsection
