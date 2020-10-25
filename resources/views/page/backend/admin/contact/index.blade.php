@extends('template.index')

@section('content')
<div class="container">
    <div class="title">
        <h3>{{ $title }}</h3>
    </div>

    <div class="content mt-4">
        <div class="card shadow">
            {{-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold">Komentar Terbaru</h6>
            </div> --}}
            <div class="card-body pb-0 pt-3">
                @if ($dataContactCount != 0)
                    @foreach ($dataContact as $item)
                        <div class="komentar">
                            <h6 class="text-primary">{{ $item->email }}</h6>
                            <h6><i class="fas fa-user"></i> {{ $item->name }} , <span class="font-italic text-success">{{ date("d-m-Y", strtotime($item->created_at)) }}</span></h6>
                            <p class="text-dark font-weight-normal text-justify" style="font-size:15px;">{{ Str::limit($item->message, 100, ' ...')  }} <a onclick="getContact({{ $item->id }})" class="text-primary" style="cursor: pointer">Detail</a>
                            <hr>
                        </div>
                    @endforeach
                @else
                    <div class="komentar">
                        <h6 class="text-primary">Tidak ada Pesan</h6>
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
@endsection
