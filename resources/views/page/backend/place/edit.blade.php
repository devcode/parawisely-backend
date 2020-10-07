@extends('template.index')

@section('content')
<form method="POST" action="{{ url('/updatePlace/'.$id->id) }}" accept-charset="UTF-8" enctype="multipart/form-data">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">Form Uplate Place</div>
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name_palce" class="control-label">Place Name</label>
                            <input id="name_place" type="text" class="form-control{{ $errors->has('name_place') ? ' is-invalid' : '' }}" name="name_place" value="{{ old('name_place',$id->name_place) }}" required>
                            {!! $errors->first('name_place', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                        </div>
                        <div class="form-group">
                            <label for="address" class="control-label">Address</label>
                            <textarea id="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" rows="4">{{ old('address',$id->address) }}</textarea>
                            {!! $errors->first('address', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                        </div>
                        <div class="form-group">
                            <label for="description" class="control-label">Description</label>
                            <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description',$id->description) }}</textarea>
                            {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                        </div>
                        <div class="form-group">
                            <label for="address" class="control-label">Place Type</label>
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
                                    <label for="latitude" class="control-label">Latitude</label>
                                    <input id="latitude" type="text" class="form-control{{ $errors->has('latitude') ? ' is-invalid' : '' }}" name="latitude" value="{{ old('latitude', $id->latitude) }}" required>
                                    {!! $errors->first('latitude', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="longitude" class="control-label">Longitude</label>
                                    <input id="longitude" type="text" class="form-control{{ $errors->has('longitude') ? ' is-invalid' : '' }}" name="longitude" value="{{ old('longitude', $id->longitude) }}" required>
                                    {!! $errors->first('longitude', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                </div>
                            </div>
                        </div>
                        <div id="map"></div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ url('/place') }}" class="btn btn-danger">Cancel</a>
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
@endsection
