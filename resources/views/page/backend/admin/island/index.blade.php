@extends('template.index')

@section('content')
<div class="title">
    <div class="row">
        <div class="col-md-4">
            <h3>{{ $title }}</h3>
        </div>
        <div class="col-md-8">
            <div class="button float-right">
                <a href="{{ url('/importIsland') }}" class="btn btn-success" data-toggle="modal" data-target="#importIsland">Import <i class="fas fa-file-excel"></i></a>
                <a href="{{ url('/exportIsland') }}" class="btn btn-success" >Export <i class="fas fa-file-excel"></i></a>
                <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Tambah {{ $title }}</button>
            </div>
        </div>
    </div>
</div>
    <div class="table-responsive p-3 bg-white shadow mt-3">
        <table class="dataTable">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataIsland as $item)
                <tr>
                    <td><img src="{{ asset('backend/uploads/island/'.$item->image) }}" width="80" alt=""></td>
                    <td>{{ $item->name }}</td>
                    <td>{{ Str::limit($item->description, 30, ' ...') }}</td>
                    <td>
                        <a href="{{ url('/deleteIsland/'.$item->id) }}" class="btn btn-danger btn_hapus"><i class="fas fa-trash-alt"></i></a>
                        <a href="{{ url('/editIsland/'.$item->id) }}" class="btn btn-warning text-white"><i class="fas fa-edit"></i></a>
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
        <form action="{{ url('/addIsland') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nama <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" placeholder="name" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Description <span class="text-danger">*</span></label>
                    <textarea cols="12" rows="7" type="text" class="form-control" name="description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="image">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
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
<div class="modal fade" id="importIsland" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Import {{ $title }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ url('/importIsland') }}" method="POST" enctype="multipart/form-data">
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
