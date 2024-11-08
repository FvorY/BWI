@extends('main')
@section('content')

@include('wakafland.tambah')
<style type="text/css">
  #map {
    height: 300px;
    width: 100%;
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
          <li class="breadcrumb-item active" aria-current="page">Wakaf Land</li>
        </ol>
      </nav>
    </div>
  	<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Wakaf Land</h4>
                    <div class="col-md-12 col-sm-12 col-xs-12" align="right" style="margin-bottom: 15px;">
                      {{-- @if(Auth::user()->akses('MASTER DATA STATUS','tambah')) --}}
                    	<button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Data</button>
                      {{-- @endif --}}
                    </div>
                    <div class="table-responsive">
        				        <table class="table table_status table-hover " id="table-data" cellspacing="0">
                            <thead class="bg-gradient-info">
                              <tr>
                                <th>No</th>
                                <th>No Register</th>
                                <th>Object Name</th>
                                <th>Action</th>
                              </tr>
                            </thead>

                            <tbody>

                            </tbody>


                        </table>
                    </div>
                  </div>
                </div>
    </div>
  </div>
</div>
<!-- content-wrapper ends -->

<!-- Modal -->
<div id="mapmodal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xs">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-info">
        <h4 class="modal-title">Pick Location</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
           <div id="map">

           </div>
        <div class="modal-footer">
          <button class="btn btn-primary" onclick="pickmap()" type="button" >Process</button>
        </div>
      </div>
      </div>

  </div>
</div>

@endsection
@section('extra_script')
<script>

var table = $('#table-data').DataTable({
        processing: true,
        // responsive:true,
        serverSide: true,
        searching: true,
        paging: true,
        dom: 'Bfrtip',
        title: '',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        ajax: {
            url:'{{ url('/wakaflandtable') }}',
        },
        columnDefs: [

              {
                 targets: 0 ,
                 className: 'center id'
              },
              {
                 targets: 1,
                 className: 'center'
              },
              {
                 targets: 2,
                 className: 'center'
              },
              {
                 targets: 2,
                 className: 'center'
              },
            ],
        "columns": [
          {data: 'DT_Row_Index', name: 'DT_Row_Index'},
          {data: 'register_no', name: 'register_no'},
          {data: 'object_name', name: 'object_name'},
          {data: 'aksi', name: 'aksi'},
        ]
  });



  function edit(id) {
    // body...
    $.ajax({
      url:baseUrl + '/editwakafland',
      data:{id},
      dataType:'json',
      success:function(data){
        $('.id').val(data.id);
        $('.register_no').val(data.register_no);
        $("#city_id").val(data.city_id).change();
        $("#subdistrict_id").val(data.subdistrict_id).change();
        $("#village_id").val(data.village_id).change();
        $('.area_size').val(data.area_size);;
        $('.used').val(data.used);;
        $('.object_name').val(data.object_name);;
        $('.address').val(data.address);;
        $('.status').val(data.status);;
        $('.certificate_no').val(data.certificate_no);;
        $('#certificate_date').val(data.certificate_date);
        $('.aiw_no').val(data.aiw_no);;
        $('#aiw_date').val(data.aiw_date);
        $('.latitude').val(data.latitude);;
        $('.longitude').val(data.longitude);;
        $("#wakif_id").val(data.wakif_id).change();
        $("#nadzir_id").val(data.nadzir_id).change();

        $('#tambah').modal('show');
      }
    });

  }

  $('#simpan').click(function(){
    $.ajax({
      type: "post",
      url: baseUrl + '/simpanwakafland?_token='+"{{csrf_token()}}&"+$('.table_modal :input').serialize(),
      processData: false, //important
      contentType: false,
      cache: false,
      success:function(data){
        if (data.status == 1) {
          iziToast.success({
              icon: 'fa fa-save',
              message: 'Data Berhasil Disimpan!',
          });
          reloadall();
        }else if(data.status == 2){
          iziToast.warning({
              icon: 'fa fa-info',
              message: 'Data Gagal disimpan!',
          });
        }else if (data.status == 3){
          iziToast.success({
              icon: 'fa fa-save',
              message: 'Data Berhasil Diubah!',
          });
          reloadall();
        }else if (data.status == 4){
          iziToast.warning({
              icon: 'fa fa-info',
              message: 'Data Gagal Diubah!',
          });
        }

      }
    });
  })


  function hapus(id) {
    iziToast.question({
      close: false,
  		overlay: true,
  		displayMode: 'once',
  		title: 'Hapus data',
  		message: 'Apakah anda yakin ?',
  		position: 'center',
  		buttons: [
  			['<button><b>Ya</b></button>', function (instance, toast) {
          $.ajax({
            url:baseUrl + '/hapuswakafland',
            data:{id},
            dataType:'json',
            success:function(data){
              iziToast.success({
                  icon: 'fa fa-trash',
                  message: 'Data Berhasil Dihapus!',
              });

              reloadall();
            }
          });
  			}, true],
  			['<button>Tidak</button>', function (instance, toast) {
  				instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
  			}],
  		]
  	});
  }

  function reloadall() {
    $('.table_modal :input').val("");
    $(".select2").val("").change();
    $(".datepicker").val("");
    $('#tambah').modal('hide');
    // // $('#table_modal :input').val('');
    // $(".inputtext").val("");
    // var table1 = $('#table_modal').DataTable();
    // table1.ajax.reload();
    table.ajax.reload();
  }

  const mymap = L.map('map');
  var latitude = 0
  var longitude = 0

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
      subdomains: ['a', 'b', 'c'],
      minZoom: 1,
      maxZoom: 19
  }).addTo(mymap);

  if ("geolocation" in navigator) {
      navigator.geolocation.getCurrentPosition(function(position) {
          const lat = position.coords.latitude;
          const lng = position.coords.longitude;

          // Set map view to the user's current location with a default zoom level
          mymap.setView([lat, lng], 13);

          // Add a marker at the user's current location
          const marker = L.marker([lat, lng]).addTo(mymap);
          marker.bindPopup("You are here!").openPopup();

          // Update input fields
          latitude = lat;
          longitude = lng;

          // Update marker location on map click
          mymap.on('click', function(e) {
              latitude = e.latlng.lat
              longitude = e.latlng.lng
              marker.setLatLng(e.latlng);
          });
      }, function(error) {
          console.error("Geolocation error:", error.message);
          alert("Geolocation failed. Please check location permissions.");
          mymap.setView([51.505, -0.09], 13); // Default to London if location fails
      });
  } else {
      alert("Geolocation is not supported by this browser.");
      mymap.setView([51.505, -0.09], 13); // Default to London if geolocation is not supported
  }

  $('#mapmodal').on('shown.bs.modal', function(){
      mymap.invalidateSize();
  });

  function pickmap() {
    document.querySelector('.latitude').value = latitude;
    document.querySelector('.longitude').value = longitude;

    $('#mapmodal').modal('hide');
  }
</script>
@endsection
