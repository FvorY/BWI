@extends('front')

@section('content')

  <style media="screen">

    .item {
    margin: 20px;
    width: 350px;
    height: 450px;
    background: #fff;
    position: relative;
    box-shadow: -15px 7px 30px rgba(0, 0, 0, 0.2);
    overflow: hidden;
    border-radius: 10px;
    }
    .item .img {
    width: 100%;
    height: 50%;
    background: black;
    border-radius: 10px 10px 0 0;
    position: absolute;
    z-index: 5;
    overflow: hidden;
    }
    .item .img-content {
    width: 100%;
    height: 100%;
    transition: 0 !important;
    background-size: cover;
    background-position: top center;
    background-repeat: no-repeat;
    }
    .item.showfull .text-container {
    height: 90%;
    }
    .item.showfull .content {
    height: 78%;
    }
    .item.showfull .social {
    top: 25px;
    }
    .item.showfull .img-content {
    transform: scale(1.04);
    filter: blur(5px);
    }
    .item.showfull .like {
    margin-top: 100px;
    }
    .item .text-container {
    width: 100%;
    height: 55%;
    background: #fff;
    border-radius: 10px;
    position: absolute;
    bottom: 0;
    z-index: 5;
    box-shadow: -3px -10px 10px rgba(0, 0, 0, 0.3);
    overflow: hidden;
    padding: 30px 20px 20px 20px;
    display: flex;
    flex-direction: column;
    }
    .item .content {
    height: 63%;
    margin-bottom: 10px;
    overflow: hidden;
    }
    .item .social {
    width: 100%;
    height: 50px;
    position: absolute;
    z-index: 15;
    top: 40%;
    display: flex;
    justify-content: flex-end;
    }
    .item h2 {
    margin-bottom: 10px;
    margin-top: 10px;
    }
    .item .social div {
    width: 50px;
    height: 50px;
    background: green;
    margin: 0 5px;
    border-radius: 50%;
    cursor: pointer;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
    display: flex;
    justify-content: center;
    align-items: center;
    color: #fff;
    }
    .item .social div:hover {
    transform: scale(1.1);
    }
    .item .social a:last-child {
    margin-right: 20px;
    }
    .item a .tw {
    background-color: #0084b4;
    }
    .item a .fb {
    background-color: #3b5998;
    }
    .item a .ig {
    background-color: #cd486b;
    }
    .item .like {
    position: absolute;
    width: 30px;
    height: 30px;
    background: #a37f7f;
    border-radius: 50%;
    color: #fff;
    right: 30px;
    top: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 10;
    }
    .item .like:hover {
    transform: scale(1.1);
    }
    .item .like i {
    font-size: 15px;
    }
    .item .like.clicked {
    background: #ffcece;
    }
    .item .like.clicked i {
    color: #e60026;
    }
    .item .readmore {
    display: flex;
    padding-bottom: 5px;
    }
    .item .readmore h3 {
    display: block;
    padding: 10px 15px;
    border-radius: 40px;
    border: 1px solid;
    cursor: pointer;
    font-size: 10px;
    margin-bottom: 5px;
    }

  </style>

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

{{-- <div id="section-bloglist1"> --}}
  <div class="container">
    <div class="row text-center" style="display: inline">
      <div class="category-portofolio">
        <ul style="padding-inline-start: 0px !important;">

            <li>
                <a class="categoryoption active" href="{{url('/portofolio')}}">All</a>

                    <span class="span-triangle"></span>

            </li>

            @foreach ($category as $key => $value)
              <li>
                  <a class="categoryoption" onclick="selectcategory(this)" datax="{{encrypt($value->id)}}">{{$value->title}}</a>
              </li>
            @endforeach

        </ul>
      </div>

    </div>
  </div>
{{-- </div> --}}

<!-- Section Features 3 -->
<div id="section-bloglist1" style="margin-bottom: 50px;">
  <div class="container">
    <div class="row item-list" id="listdata">

    @foreach ($portofolio as $key => $value)

      <div class="item item-1 ez-animate" data-animation="fadeInUp">
        <a href="{{url('/portofolio/detail')}}/{{$value["urlsegment"]}}">
        <div class="img">
          <div class="img-content" style="background-image: url({{$value['image']}})"></div>
        </div>
        <div class="text-container">
          <h2 class="title">{{$value["name"]}}</h2>
          <div class="content">
            <p>{{stringlimit($value["description"], 61, "...")}}</p>
          </div>
        </div>
        </a>
      </div>

    @endforeach

      <!-- Load More Button -->
      <div class="col-12 text-center lh0 ez-animate" data-animation="fadeInUp">
        <a onclick="loadmore()" class="btn-1 shadow1 style3 bgscheme">LOAD MORE</a>
      </div>
      <!-- /.Load More Button -->
    </div>
  </div>
</div>

@endsection

@section('extra_script')
  <script>
  var category = "";
  var limit = 6;

  function selectcategory(attr) {
    $('.categoryoption').removeClass("active")
    $(attr).addClass("active");
    category = $(attr).attr("datax");

    doload();
  }

  function loadmore() {
    limit += 6;

    doload();
  }

  function doload() {
    var html = "";
    var loadmore = '<div class="col-12 text-center lh0 ez-animate" data-animation="fadeInUp">'+
                      '<a onclick="loadmore()" class="btn-1 shadow1 style3 bgscheme">LOAD MORE</a>'+
                  '</div>';
    $.ajax({
      type: "post",
      dataType: "json",
      url: base_url + "/portofolio/filter",
      data: {category: category, limit: limit, _token: "{{csrf_token()}}"},
      success : function(response) {
        for (var i = 0; i < response.data.length; i++) {
          var data = response.data[i];

          html += '<div class="item item-1 ez-animate" data-animation="fadeInUp">'+
                    '<a href="'+base_url+'/portofolio/detail/'+data.urlsegment+'">'+
                    '<div class="img">'+
                      '<div class="img-content" style="background-image: url('+data.image+')"></div>'+
                    '</div>'+
                    '<div class="text-container">'+
                      '<h2 class="title">'+data.name+'</h2>'+
                      '<div class="content">'+
                        '<p>'+data.description+'</p>'+
                      '</div>'+
                    '</div>'+
                    '</a>'+
                  '</div>';


        }

        if (response.data.length != 0) {
          html += loadmore;
        }

        $('#listdata').html(html);
      }
    });
  }
  </script>
@endsection
