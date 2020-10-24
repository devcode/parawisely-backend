@php
    use Illuminate\Support\Str;
@endphp
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
                <a href="{{ $dataAuth->level_id == 1 ? url('/place') : url('/data-place') }}" class="btn btn-danger"><i class="fas fa-backward"></i> Kembali</a>
                <a href="{{ url('/editPlace/'.$id->id) }}" class="btn btn-warning text-white"><i class="fas fa-edit"></i> edit </a>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header">Informasi Tempat</div>
            <div class="card-body">
                <img src="{{ asset('backend/uploads/placeImage/'.$id->image) }}" width="100%" height="200" alt="">
                <div class="description mt-3">
                    <p class="text-dark font-weight-normal text-justify description-text">{{ $id->description }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Lokasi</div>
            <div class="card-body" id="mapid"></div>
        </div>
        <div class="card mt-4">
            <div class="card-header">Komentar</div>
            <div class="card-body">
                @if ($dataCommentCount != 0)
                    @foreach ($dataComment as $item)
                        <div class="komentar">
                            <h6 class="text-primary">{{ $item->place->name_place }}</h6>
                            <h6><i class="fas fa-user"></i> {{ $item->name }} , <span class="font-italic text-success">{{ date("d-m-Y", strtotime($item->created_at)) }}</span></h6>
                            <p class="text-dark font-weight-normal text-justify" style="font-size:15px;">{{ Str::limit($item->comment, 100, ' ...')  }} <a onclick="getComment({{ $item->id }})" class="text-primary" style="cursor: pointer">Detail</a>
                            <hr>
                        </div>
                    @endforeach
                @else
                    <div class="komentar">
                        <h6 class="text-primary">Tidak ada komentar</h6>
                        <hr>
                    </div>
                @endif
                <div class="bawah m-0 float-right">
                    <p class="text-danger font-weight-normal text-justify" style="font-size:15px;">Jumlah Komentar {{ $dataCommentCount }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var map = L.map('mapid').setView([{{ $id->latitude }}, {{ $id->longitude }}], {{ config('leaflet.detail_zoom_level') }});

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([{{ $id->latitude }}, {{ $id->longitude }}]).addTo(map)
        .bindPopup("{!! Str::limit($id->description, 30, ' ...') !!}");
</script>
@endsection
