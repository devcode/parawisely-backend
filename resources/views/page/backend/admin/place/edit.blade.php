@extends('template.index')

@section('content')
<form method="POST" action="{{ url('/updatePlace/'.$id->id) }}" accept-charset="UTF-8" enctype="multipart/form-data">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">Form Update Tempat</div>
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name_palce" class="control-label">Nama Tempat</label>
                            <input id="name_place" type="text" class="form-control{{ $errors->has('name_place') ? ' is-invalid' : '' }}" name="name_place" value="{{ old('name_place',$id->name_place) }}" required>
                            {!! $errors->first('name_place', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                        </div>
                        <div class="form-group">
                            <label for="address" class="control-label">Alamat</label>
                            <textarea id="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" rows="4">{{ old('address',$id->address) }}</textarea>
                            {!! $errors->first('address', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="provinsi" class="control-label">Provinsi</label>
                                    <select class="form-control" name="propinsi" id="propinsi">
                                        <option value="" selected>--Select Provinsi--</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kabupaten" class="control-label">Kab / Kota</label>
                                    <select class="form-control" name="kabupaten" id="kabupaten">
                                        <option value="" selected>--Select Kabupaten--</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="control-label">Deskripsi</label>
                            <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="8">{{ old('description',$id->description) }}</textarea>
                            {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                        </div>
                        <div class="form-group">
                            <label for="address" class="control-label">Tipe Tempat</label>
                            <select name="type_place" id="type" class="form-control">
                                @foreach ($dataType as $row)
                                    @if ($row->id == $id->type_id)
                                        <option value="{{ $row->id }}" selected>{{ $row->type_name }}</option>
                                    @else
                                        <option value="{{ $row->id }}">{{ $row->type_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            {!! $errors->first('address', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="latitude" type="text" class="form-control{{ $errors->has('latitude') ? ' is-invalid' : '' }}" name="latitude" value="{{ old('latitude', $id->latitude) }}" required hidden>
                                    {!! $errors->first('latitude', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="longitude" type="text" class="form-control{{ $errors->has('longitude') ? ' is-invalid' : '' }}" name="longitude" value="{{ old('longitude', $id->longitude) }}" required hidden>
                                    {!! $errors->first('longitude', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                </div>
                            </div>
                        </div>
                        <div id="map"></div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ $dataAuth->level_id == 1 ? url('/place') : url('/data-place') }}" class="btn btn-danger">Kembali</a>
                    </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('backend/uploads/placeImage/'.$id->image) }}" width="100%" height="auto" alt="">
                    <div class="image mt-3">
                        <div class="form-group">
                            <label for="image">Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="image">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
    <script>
        var mapCenter = [{{ $id->latitude }}, {{ $id->longitude }}];
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
            .bindPopup("Your location :  " + marker.getLatLng().toString())
            .openPopup();
            return false;
        };

        map.on('click', function(e) {
            let latitude = e.latlng.lat.toString().substring(0, 15);
            let longitude = e.latlng.lng.toString().substring(0, 15);
            $('#latitude').val(latitude);
            $('#longitude').val(longitude);
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
            console.log("{{ $id->provinsi }}")
            $.ajax({
                url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/provinsi',
                type: 'GET',
                dataType: 'json',
                success: function (json) {
                    if (json.code == 200) {
                        for (i = 0; i < Object.keys(json.data).length; i++) {
                            if ("{{ $id->provinsi }}" == json.data[i].name) {
                                $('#propinsi').append($('<option selected>').text(json.data[i].name).attr('value', json.data[i].name).attr('data-prov',json.data[i].id));
                            } else {
                                $('#propinsi').append($('<option>').text(json.data[i].name).attr('value', json.data[i].name).attr('data-prov',json.data[i].id));
                            }
                        }
                    } else {
                        $('#kabupaten').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
                    }
                }
            });
            var propinsi ="";
            $("#propinsi").change(function () {
                propinsi = $(this).find(':selected').data('prov');
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

            getKabupaten();
        });

        function getKabupaten(){
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
                            if ("{{ $id->kabupaten }}" == json.data[i].name) {
                                $('#kabupaten').append($('<option selected>').text(json.data[i].name).attr('value', json.data[i].name));
                            } else {
                                $('#propinsi').append($('<option>').text(json.data[i].name).attr('value', json.data[i].name));
                                $('#kabupaten').append($('<option>').text(json.data[i].name).attr('value', json.data[i].name));
                            }
                        }
                    } else {
                        $('#kabupaten').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
                    }
                }
            });
        }
    </script>
@endsection
