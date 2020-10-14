@extends('template.index')

@section('content')
<div class="title">
    <div class="row">
        <div class="col-md-6">
            <h3>{{ $title }}</h3>
        </div>
        <div class="col-md-6">
            <a href="{{ url('/addPlace') }}" class="btn btn-primary float-right" >Tambah {{ $title }}</a>
        </div>
    </div>
</div>
    <div class="table-responsive p-3 bg-white shadow mt-3">
        <table class="dataTable">
            <thead>
                <tr>
                    <th>Tipe</th>
                    <th>Nama Tempat</th>
                    <th>Alamat</th>
                    <th>Aktif</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataPlace as $item)
                <tr>
                    <td>{{ $item->type->type_name }}</td>
                    <td>{{ $item->name_place }}</td>
                    <td>{{ $item->address }}</td>
                    <td>@if ($item->is_active != null)
                        Aktif
                        @else
                        Tidak Aktif
                    @endif</td>
                    <td>
                        <a href="{{ url('/deletePlace/'.$item->id) }}" class="btn btn-danger btn-sm btn_hapus"><i class="fas fa-trash-alt"></i></a>
                        <a href="{{ url('/editPlace/'.$item->id) }}" class="btn btn-warning btn-sm text-white"><i class="fas fa-edit"></i></a>
                        <a href="{{ url('/showPlace/'.$item->id) }}" class="btn btn-success btn-sm text-white"><i class="fas fa-search-plus"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<div class="line"></div>
@endsection
