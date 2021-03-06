@php
    use Illuminate\Support\Str;
@endphp
@extends('template.index')

@section('content')
<div class="title">
    <div class="row">
        <div class="col-md-4">
            <h3>{{ $title }}</h3>
        </div>
        <div class="col-md-8">
            <div class="button float-right">
                <a href="{{ url('/importPlace') }}" class="btn btn-success" data-toggle="modal" data-target="#importPlace">Import <i class="fas fa-file-excel"></i></a>
                <a href="{{ url('/exportPlace') }}" class="btn btn-success" >Export <i class="fas fa-file-excel"></i></a>
                <a href="{{ url('/addPlace') }}" class="btn btn-primary" >Tambah {{ $title }}</a>
            </div>
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
                    <th width="14%" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataPlace as $item)
                <tr>
                    <td>{{ $item->type->type_name }}</td>
                    <td>{{ $item->name_place }}</td>
                    <td>{{ Str::limit($item->address, 30, ' ...')  }}</td>
                    <td> <input data-id="{{$item->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Aktif" data-off="Tidak Aktif" {{ $item->is_active ? 'checked' : '' }}></td>
                    <td class="text-center">
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
<!-- Modal -->
<div class="modal fade" id="importPlace" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Import {{ $title }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ url('/file-import') }}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                <div class="form-group mb-4">
                    <div class="custom-file text-left">
                        <input type="file" name="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>
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
