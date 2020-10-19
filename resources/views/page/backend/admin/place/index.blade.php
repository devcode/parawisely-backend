@php
    use Illuminate\Support\Str;
@endphp
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
                    <th>Verifikasi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataPlace as $item)
                <tr>
                    <td>{{ $item->type->type_name }}</td>
                    <td>{{ $item->name_place }}</td>
                    <td>{{ Str::limit($item->address, 30, ' ...')  }}</td>
                    <td> <input data-id="{{$item->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Aktif" data-off="Tidak Aktif" {{ $item->is_active ? 'checked' : '' }}></td>
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
<script>
    $(function() {
      $('.toggle-class').change(function() {
          var status = $(this).prop('checked') == true ? 1 : 0;
          var tempat_id = $(this).data('id');

          $.ajax({
              type: "GET",
              dataType: "json",
              url: '/changeActive',
              data: {'status': status, 'tempat_id': tempat_id},
              success: function(data){
                console.log(data.success)
              }
          });
      })
    })
</script>

@endsection
