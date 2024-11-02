<!-- Modal -->
<div id="tambah" class="modal fade" role="dialog">
  <div class="modal-dialog modal-xs">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-info">
        <h4 class="modal-title">Form Cities</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <table class="table table_modal">
          <tr>
            <td>No Register</td>
            <td>
              <input type="text" class="form-control form-control-sm inputtext register_no" name="register_no">
              <input type="hidden" class="form-control form-control-sm id" name="id">
            </td>
          </tr>
          <tr>
            <td>City</td>
            <td>
              <select class="form-control select2" name="city_id" id="city_id">
                <option value="">-- Select City --</option>
                @foreach ($city as $key => $value)
                  <option value="{{$value->id}}">{{$value->name}}</option>
                @endforeach
              </select>
            </td>
          </tr>
          <tr>
            <td>Subdistricts</td>
            <td>
                <select class="form-control select2" name="subdistrict_id" id="subdistrict_id">
                <option value="">-- Select Subdistricts --</option>
                @foreach ($sub as $key => $value)
                  <option value="{{$value->id}}">{{$value->name}}</option>
                @endforeach
              </select>
            </td>
          </tr>
          <tr>
            <td>Village</td>
            <td>
                <select class="form-control select2" name="village_id" id="village_id">
                <option value="">-- Select Village --</option>
                @foreach ($village as $key => $value)
                  <option value="{{$value->id}}">{{$value->name}}</option>
                @endforeach
              </select>
            </td>
          </tr>
           <tr>
            <td>Area Size</td>
            <td>
              <input type="number" class="form-control form-control-sm inputtext area_size" name="area_size">
            </td>
          </tr>
          <tr>
            <td>Used</td>
            <td>
              <input type="text" class="form-control form-control-sm inputtext used" name="used">
            </td>
          </tr>
          <tr>
            <td>Object Name</td>
            <td>
              <input type="text" class="form-control form-control-sm inputtext object_name" name="object_name">
            </td>
          </tr>
          <tr>
            <td>Address</td>
            <td>
              <input type="text" class="form-control form-control-sm inputtext address" name="address">
            </td>
          </tr>
           <tr>
            <td>Status</td>
            <td>
              <input type="text" class="form-control form-control-sm inputtext status" name="status">
            </td>
          </tr>
           <tr>
            <td>Certificate No</td>
            <td>
              <input type="text" class="form-control form-control-sm inputtext certificate_no" name="certificate_no">
            </td>
          </tr>
           <tr>
            <td>Certificate Date</td>
            <td>
              <input type="text" class="form-control form-control-sm inputtext datepicker" id="certificate_date" name="certificate_date">
            </td>
          </tr>
             <tr>
            <td>Aiw No</td>
            <td>
              <input type="text" class="form-control form-control-sm inputtext aiw_no" name="aiw_no">
            </td>
          </tr>
           <tr>
            <td>Aiw Date</td>
            <td>
              <input type="text" class="form-control form-control-sm inputtext datepicker" id="aiw_date" name="aiw_date">
            </td>
          </tr>
          <tr>
            <td>Latitude</td>
            <td>
              <input type="number" class="form-control form-control-sm inputtext latitude" name="latitude">
            </td>
          </tr>
          <tr>
            <td>Longitude</td>
            <td>
              <input type="number" class="form-control form-control-sm inputtext longitude" name="longitude">
            </td>
          </tr>
           <tr>
            <td>Wakif</td>
            <td>
                <select class="form-control select2" name="wakif_id" id="wakif_id">
                <option value="">-- Select Wakif --</option>
                @foreach ($wakif as $key => $value)
                  <option value="{{$value->id}}">{{$value->name}}</option>
                @endforeach
              </select>
            </td>
          </tr>
           <tr>
            <td>Nadzir</td>
            <td>
                <select class="form-control select2" name="nadzir_id" id="nadzir_id">
                <option value="">-- Select Nadzir --</option>
                @foreach ($nadzir as $key => $value)
                  <option value="{{$value->id}}">{{$value->name}}</option>
                @endforeach
              </select>
            </td>
          </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" id="simpan" type="button">Process</button>
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
      </div>
      </div>

  </div>
</div>
