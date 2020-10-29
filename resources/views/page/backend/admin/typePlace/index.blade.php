@extends('template.index')

@section('content')
<div class="title">
    <div class="row">
        <div class="col-md-4">
            <h3>{{ $title }}</h3>
        </div>
        <div class="col-md-8">
            <div class="button float-right">
                <a href="{{ url('/importType') }}" class="btn btn-success" data-toggle="modal" data-target="#importType">Import <i class="fas fa-file-excel"></i></a>
                <a href="{{ url('/exportType') }}" class="btn btn-success" >Export <i class="fas fa-file-excel"></i></a>
                <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Tambah {{ $title }}</button>
            </div>
        </div>
    </div>
</div>
    <div class="table-responsive p-3 bg-white shadow mt-3">
        <table class="dataTable">
            <thead>
                <tr>
                    <th>Icon</th>
                    <th>Nama Tempat</th>
                    <th>Deskripsi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataType as $item)
                <tr>
                    <td>{{ $item->type_icon }}</td>
                    <td>{{ $item->type_name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>
                        <a href="{{ url('/deleteTypePlace/'.$item->id) }}" class="btn btn-danger btn_hapus"><i class="fas fa-trash-alt"></i></a>
                        <a href="{{ url('/editTypePlace/'.$item->id) }}" class="btn btn-warning text-white"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<div class="line"></div>

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form {{ $title }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ url('/addTypePlace') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group">
                    <label for="image">Icon <a class="text-primary" href="https://labs.mapbox.com/maki-icons/">https://labs.mapbox.com/maki-icons/</a> <span class="text-danger">*</span></label>
                    {{-- <div class="custom-file">
                        <input type="file" class="custom-file-input" name="type_icon" id="image" required>
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div> --}}
                    <input type="text" class="form-control" name="icon" placeholder="nama icon" autocomplete="off" required>
                    <small id="emailHelp" class="form-text text-muted">Untuk menambahkan icon pilih nama icon dari link di atas.</small>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nama Tipe <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="type_name" placeholder="nama tipe" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Description <span class="text-danger">*</span></label>
                    <textarea cols="12" rows="7" type="text" class="form-control" name="description" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
      </div>
    </div>
  </div>

    <!-- Modal -->
<div class="modal fade" id="importType" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Import {{ $title }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ url('/importType') }}" method="POST" enctype="multipart/form-data">
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
@endsection
