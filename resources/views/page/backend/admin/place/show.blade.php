@extends('template.index')

@section('content')
<style>
    #mapid { height: 400px; }
</style>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ $id->name_place }}</div>
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td>Nama Tempat</td><td>{{ $id->name_place }}</td></tr>
                        <tr><td>Alamat</td><td>{{ $id->address }}</td></tr>
                        <tr><td>Latitude</td><td>{{ $id->latitude }}</td></tr>
                        <tr><td>Longitude</td><td>{{ $id->longitude }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a href="{{ $dataAuth->creator_id == 1 ? url('/place') : url('/data-place') }}" class="btn btn-danger"><i class="fas fa-backward"></i> Kembali</a>
                <a href="{{ url('/editPlace/'.$id->id) }}" class="btn btn-warning text-white"><i class="fas fa-edit"></i> edit </a>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header">Informasi Tempat</div>
            <div class="card-body">
                <img src="{{ asset('backend/uploads/placeImage/'.$id->image) }}" width="100%" height="200" alt="">
                <div class="description mt-3">
                    <p class="text-dark">{{ $id->description }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Lokasi</div>
            <div class="card-body" id="mapid"></div>
        </div>
    </div>
</div>
<script>
    var map = L.map('mapid').setView([{{ $id->latitude }}, {{ $id->longitude }}], {{ config('leaflet.detail_zoom_level') }});

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([{{ $id->latitude }}, {{ $id->longitude }}]).addTo(map)
        .bindPopup('{!! $id->description !!}');
</script>
@endsection
