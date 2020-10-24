@php
    use Illuminate\Support\Str;
@endphp

@extends('template.index')

@section('content')
<h3 class="mb-4">{{ $title }}</h3>
<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Mitra</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dataEmployee }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Halaman Section</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dataSection }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-credit-card fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Tempat</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $dataPlace }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-map-marker-alt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-7 col-lg-6">
        <div class="card shadow">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold">Komentar Terbaru</h6>
                <a href="{{ url('/showComment') }}" class="text-primary">Lihat Semua</a>
            </div>
            <div class="card-body pb-0 pt-3">
                @if ($dataCommentCount != 0)
                    @foreach ($dataComment as $item)
                        <div class="komentar">
                            <h6 class="text-primary">{{ $item->place->name_place }}</h6>
                            <h6><i class="fas fa-user"></i> {{ $item->name }} , <span class="font-italic text-success">{{ date("d-m-Y", strtotime($item->created_at)) }}</span></h6>
                            <p class="text-dark font-weight-normal text-justify" style="font-size:15px;">{{ Str::limit($item->comment, 100, ' ...')  }} <a onclick="getComment({{ $item->id }})" class="text-primary" style="cursor: pointer" >Detail</a>
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
    <div class="col-xl-5 col-lg-4">
        <div class="card shadow">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold">Pesan Terbaru</h6>
                <a href="{{ url('/showComment') }}" class="text-primary">Lihat Semua</a>
            </div>
            <div class="card-body pb-0 pt-3">
                @if ($dataContactCount != 0)
                    @foreach ($dataContact as $row)
                        <div class="contact">
                            <h6 class="text-primary">{{ $row->email }}</h6>
                            <h6><i class="fas fa-user"></i> {{ $row->name }} , <span class="font-italic text-success">{{ date("d-m-Y", strtotime($row->created_at)) }}</span></h6>
                            <p class="text-dark font-weight-normal text-justify" style="font-size:15px;">{{ Str::limit($row->message, 100, ' ...')  }} <a href="{{ url('/detailContact/'.$row->id) }}" class="text-primary" style="cursor: pointer">Detail</a>
                            <hr>
                        </div>
                    @endforeach
                @else
                    <div class="contact">
                        <h6 class="text-primary">Tidak ada pesan</h6>
                        <hr>
                    </div>
                @endif
                <div class="bawah m-0 float-right">
                    <p class="text-danger font-weight-normal text-justify" style="font-size:15px;">Jumlah Pesan {{ $dataContactCount }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->

<div class="line"></div>

@endsection
