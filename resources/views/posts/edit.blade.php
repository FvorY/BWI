@extends('main')
@section('content')

{{-- @include('service.tambah') --}}
<style type="text/css">
.dropzone .dz-preview .dz-image img {
  width: 100%;
  height: 100%;
}
</style>
<!-- partial -->
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb bg-info">
          <li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a></li>
          {{-- <li class="breadcrumb-item">Setup Master Tagihan</li> --}}
          <li class="breadcrumb-item active" aria-current="page">Post Management</li>
        </ol>
      </nav>
    </div>
  	<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Form Post Management</h4>

                    @if (session('sukses'))
                    <div class="alert alert-success" role="alert">
                      Success, Data berhasil disimpan
                    </div>
                    @endif

                    @if (session('gagal'))
                    <div class="alert alert-danger" role="alert">
                      Gagal, Data gagal disimpan
                    </div>
                    @endif

                    <form id="formportofolio">

                    <input type="hidden" name="id" id="id" value="{{$id}}" >

                    <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="row">

                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <label>Title</label>
                        </div>

                        <div class="col-md-10 col-sm-6 col-xs-12">
                          <div class="form-group">
                              <input type="text" class="form-control form-control-sm" name="title" id="title">
                          </div>
                        </div>

                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <label>Description</label>
                        </div>

                        <div class="col-md-10 col-sm-6 col-xs-12">
                          <div class="form-group">
                              <div class="form-group">
                                <textarea id="body" name="body"></textarea>
                              </div>
                          </div>
                        </div>

                      </div>
                    </div>
                    </div>
                </form>


                    <div id="formuploadimage">
                      <h4 class="card-title">Upload Image</h4>
                      <form action="{{url('/simpanpostscontent')}}" class="dropzone">

                      </form>
                    </div>

                    <div class="modal-footer">
                      <button class="btn btn-primary" type="button" id="btnsubmit">Process</button>
                      <a href="{{url('/postscontent')}}" class="btn btn-warning">Close</a>
                    </div>

                  </div>
                </div>
    </div>
  </div>
</div>
<!-- content-wrapper ends -->
@endsection
@section('extra_script')
<script>

$(document).ready(function() {
  $('#body').summernote();
});

Dropzone.autoDiscover = false;

var myDropzone = new Dropzone(".dropzone", {
   autoProcessQueue: false,
   uploadMultiple: true,
   addRemoveLinks: true,
   thumbnailWidth: 1140,//the "size of image" width at px
  thumbnailHeight: 380,
   url: "{{url('/simpanpostscontent')}}",
   acceptedFiles:'image/*',
   params: function params(files, xhr, chunk) { return { '_token' : "{{csrf_token()}}", 'link' : $('#link').val(), 'name' : $('#name').val(), 'description' : $('#description').val(), 'category' : $('#category').val(), 'id' : $('#id').val() }; },
   init: function() {

            this.on("removedfile", function(file, response) {
              console.log(file);

              $.ajax({
                type: 'get',
                data: {id:file.id},
                dataType: 'json',
                url: baseUrl + '/removeimagepostscontent',
                success: function(response) {

                }
              });
            })

            this.on("success", function(file, response) {
              if (response.status == 1) {
                iziToast.success({
                    icon: 'fa fa-save',
                    message: 'Data Berhasil Disimpan!',
                });
                setTimeout(function () {
                  window.location.href = "{{url('/portofoliocontent')}}";
                }, 1000);
              }else if(response.status == 2){
                iziToast.warning({
                    icon: 'fa fa-info',
                    message: 'Data Gagal disimpan!',
                });
              }else if (response.status == 3){
                iziToast.success({
                    icon: 'fa fa-save',
                    message: 'Data Berhasil Diubah!',
                });
                setTimeout(function () {
                  window.location.href = "{{url('/portofoliocontent')}}";
                }, 1000);
              }else if (response.status == 4){
                iziToast.warning({
                    icon: 'fa fa-info',
                    message: 'Data Gagal Diubah!',
                });
              }
            })
        }
});

$.ajax({
  type: 'get',
  data: {id: $('#id').val()},
  dataType: 'json',
  url: baseUrl + '/doeditpostscontent',
  success : function(response) {
    console.log(response);
    $('#title').val(response.posts.title);
    $('#body').val(response.posts.body);

    var imagevalues = new Array();

    for (var i = 0; i < response.image.length; i++) {
      imagevalues[i] = { name: response.image[i].photo_url, size: 0, id: response.image[i].id};
    }

    for (i = 0; i < imagevalues.length; i++) {
        myDropzone.emit("addedfile", imagevalues[i]);
        myDropzone.emit("thumbnail", imagevalues[i], "{{url('/')}}"+"/"+imagevalues[i].name);
        myDropzone.emit("complete", imagevalues[i]);

        myDropzone.files.push(imagevalues[i]);
    }

  }
});



$('#btnsubmit').click(function(){

    if (myDropzone.getQueuedFiles().length > 0) {
        myDropzone.processQueue();
    } else {
        $.ajax({
          type: 'post',
          data: {'_token' : "{{csrf_token()}}", 'link' : $('#link').val(), 'name' : $('#name').val(), 'description' : $('#description').val(), 'category' : $('#category').val(), 'id' : $('#id').val()},
          dataType : 'json',
          url: baseUrl + '/simpanpostscontent',
          success: function(response) {
            if (response.status == 1) {
              iziToast.success({
                  icon: 'fa fa-save',
                  message: 'Data Berhasil Disimpan!',
              });
              setTimeout(function () {
                window.location.href = "{{url('/postscontent')}}";
              }, 1000);
            }else if(response.status == 2){
              iziToast.warning({
                  icon: 'fa fa-info',
                  message: 'Data Gagal disimpan!',
              });
            }else if (response.status == 3){
              iziToast.success({
                  icon: 'fa fa-save',
                  message: 'Data Berhasil Diubah!',
              });
              setTimeout(function () {
                window.location.href = "{{url('/postscontent')}}";
              }, 1000);
            }else if (response.status == 4){
              iziToast.warning({
                  icon: 'fa fa-info',
                  message: 'Data Gagal Diubah!',
              });
          }
        }
        });
    }

});

</script>
@endsection
