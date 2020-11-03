@extends('template.index')

@section('content')
<div class="title mb-3">
    <div class="row">
        <div class="col-md-6">
            <h3>Tambah {{ $title }}</h3>
            <small class="form-text text-muted">Klick tempat kamu di map agar data bisa terkirim <span class="text-danger">*</span>.</small>
        </div>
        <div class="col-md-6">
            <div class="text float-right">
                Latitude : <span id="latitude-text"></span> &nbsp;
                Longitude : <span id="longitude-text"></span>
            </div>
        </div>
    </div>
</div>
<div class="form-tambah">
    <form action="{{ url('/addPlace') }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow">
                    <div class="card-body">
                        <div id="map"></div>
                        <div class='pointer'><< Klik untuk mencari tempat</div>
                        <div class="form-group mt-2">
                            <label for="address" class="control-label">Alamat <span class="text-danger">*</span></label>
                            <textarea id="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" rows="6">{{ old('address') }}</textarea>
                            {!! $errors->first('address', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name_palce" class="control-label">Nama Tempat<span class="text-danger"> *</span></label>
                            <input id="name_place" type="text" class="form-control @error('name_place') is-invalid @enderror" name="name_place" value="{{ old('name_place') }}"  autocomplete="off">
                            @error('name_place')
                                <div class="invalid-feedback pl-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address" class="control-label">Tipe Tempat<span class="text-danger"> *</span></label>
                                    <select name="type_place" id="type" class="form-control @error('type_place') is-invalid @enderror" >
                                        <option disabled selected>--SELECT TYPE--</option>
                                        @foreach ($dataType as $row)
                                            <option value="{{ $row->id }}">{{ $row->type_name }}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('address', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="island" class="control-label">Pulau<span class="text-danger"> *</span></label>
                                    <select name="island" id="island" class="form-control @error('island') is-invalid @enderror" >
                                        <option disabled selected>--PILIH PULAU--</option>
                                        @foreach ($dataIsland as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('island', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="provinsi" class="control-label">Provinsi<span class="text-danger"> *</span></label>
                                    <select class="custom-select @error('propinsi') is-invalid @enderror" name="propinsi" id="propinsi">
                                        <option value="" selected>--Select Provinsi--</option>
                                    </select>
                                    @error('propinsi')
                                        <div class="invalid-feedback pl-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kabupaten" class="control-label">Kab / Kota</label><span class="text-danger"> *</span>
                                    <select class="custom-select @error('kabupaten') is-invalid @enderror" name="kabupaten" id="kabupaten">
                                        <option value="" selected>--Select Kabupaten--</option>
                                    </select>
                                    @error('kabupaten')
                                        <div class="invalid-feedback pl-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="control-label">Deskripsi<span class="text-danger"> *</span></label>
                            <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description') }}</textarea>
                            {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                        </div>
                            <div class="form-group">
                                <input id="latitude" type="text" hidden class="form-control{{ $errors->has('latitude') ? ' is-invalid' : '' }}" name="latitude" value="{{ old('latitude', request('latitude')) }}" >
                            </div>
                            <div class="form-group">
                                <input id="longitude" type="text" hidden class="form-control{{ $errors->has('longitude') ? ' is-invalid' : '' }}" name="longitude" value="{{ old('longitude', request('longitude')) }}" >
                            </div>
                        <div class="form-group">
                            <label for="image">Image<span class="text-danger"> *</span></label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" name="image" id="image">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                                @error('image')
                                    <div class="invalid-feedback pl-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="footer">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    var mapCenter = [{{ request('latitude', config('leaflet.map_center_latitude')) }}, {{ request('longitude', config('leaflet.map_center_longitude')) }}];
    var map = L.map('map').setView(mapCenter, {{ config('leaflet.zoom_level') }});

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var searchControl = new L.esri.Controls.Geosearch().addTo(map);

    var results = new L.LayerGroup().addTo(map);

    searchControl.on('results', function(data){
        results.clearLayers();
        for (var i = data.results.length - 1; i >= 0; i--) {
            results.addLayer(L.marker(data.results[i].latlng));
        }
    });

    var marker = L.marker(mapCenter).addTo(map);
    function updateMarker(lat, lng) {
        marker
        .setLatLng([lat, lng])
        .bindPopup("Lokasi :  " + marker.getLatLng().toString())
        .openPopup();
        return false;
    };

    map.on('click', function(e) {
        let latitude = e.latlng.lat.toString().substring(0, 15);
        let longitude = e.latlng.lng.toString().substring(0, 15);
        $('#latitude').val(latitude);
        $('#longitude').val(longitude);
        $('#latitude-text').html(latitude);
        $('#longitude-text').html(longitude);
        updateMarker(latitude, longitude);
    });

    var updateMarkerByInputs = function() {
        return updateMarker( $('#latitude').val() , $('#longitude').val());
    }
    $('#latitude').on('input', updateMarkerByInputs);
    $('#longitude').on('input', updateMarkerByInputs);
</script>
<script type="text/javascript">
    var return_first = function() {
      var tmp = null;
      $.ajax({
          'async': false,
          'type': "get",
          'global': false,
          'dataType': 'json',
          'url': 'https://x.rajaapi.com/poe',
          'success': function(data) {
              tmp = data.token;
          }
      });
      return tmp;
  }();
    $(document).ready(function () {
        $.ajax({
            url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/provinsi',
            type: 'GET',
            dataType: 'json',
            success: function (json) {
                if (json.code == 200) {
                    for (i = 0; i < Object.keys(json.data).length; i++) {
                        $('#propinsi').append($('<option>').text(json.data[i].name).attr('value', json.data[i].name).attr('data-prov',json.data[i].id));
                    }
                } else {
                    $('#kabupaten').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan').attr('data-prov',json.data[i].id));
                }
            }
        });
        $("#propinsi").change(function () {
            var propinsi = $(this).find(':selected').data('prov');
            console.log(propinsi)
            $.ajax({
                url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/kabupaten',
                data: "idpropinsi=" + propinsi,
                type: 'GET',
                cache: false,
                dataType: 'json',
                success: function (json) {
                    $("#kabupaten").html('');
                    if (json.code == 200) {
                        for (i = 0; i < Object.keys(json.data).length; i++) {
                            $('#kabupaten').append($('<option>').text(json.data[i].name).attr('value', json.data[i].name));
                        }
                        $('#kecamatan').html($('<option>').text('-- Pilih Kecamatan --').attr('value', '-- Pilih Kecamatan --'));
                        $('#kelurahan').html($('<option>').text('-- Pilih Kelurahan --').attr('value', '-- Pilih Kelurahan --'));

                    } else {
                        $('#kabupaten').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
                    }
                }
            });
        });
    });
</script>
<script>
    setTimeout(function(){$('.pointer').fadeOut('slow');},3400);
</script>
@endsection
