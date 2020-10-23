@extends('template.index')

@section('content')
<div class="title">
    <div class="row">
        <div class="col-md-6">
            <h3>{{ $title }}</h3>
        </div>
        <div class="col-md-6">
            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addModal">Tambah {{ $title }}</button>
        </div>
    </div>
</div>
    <div class="table-responsive p-3 bg-white shadow mt-3">
        <table class="dataTable">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Link</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataSection as $item)
                <tr>
                    <td><img src="{{ asset('backend/uploads/section/'.$item->image) }}" width="80" alt=""></td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->link }}</td>
                    <td>
                        <a href="{{ url('/deleteSection/'.$item->id) }}" class="btn btn-danger btn_hapus"><i class="fas fa-trash-alt"></i></a>
                        <a href="{{ url('/editSection/'.$item->id) }}" class="btn btn-warning text-white"><i class="fas fa-edit"></i></a>
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
        <form action="{{ url('/addSection') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group">
                    <label for="image">Image <span class="text-danger">*</span></label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="image" required>
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                </div>
                <div class="form-group">
                    <label for="title">Judul <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="title" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="title">Link <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="link" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Description <span class="text-danger">*</span></label>
                    <textarea cols="12" rows="7" type="text" class="form-control" name="description" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection
