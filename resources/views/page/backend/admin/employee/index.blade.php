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
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataEmployee as $item)
                <tr>
                    <td><img src="{{ asset('backend/uploads/'.$item->image) }}" width="80" alt=""></td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->level->name_level }}</td>
                    <td>
                        <a href="{{ url('/deleteEmployee/'.$item->id) }}" class="btn btn-danger btn_hapus"><i class="fas fa-trash-alt"></i></a>
                        <a href="{{ url('/editEmployee/'.$item->id) }}" class="btn btn-warning text-white"><i class="fas fa-edit"></i></a>
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
        <form action="{{ url('/addEmployee') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nama <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" placeholder="name" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="email" placeholder="example@gmail.com" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" name="password" placeholder="password" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Level <span class="text-danger">*</span></label>
                    <select class="form-control" name="level" required>
                      <option disabled selected>--PILIH LEVEL--</option>
                      @foreach ($dataLevel as $row)
                        <option value="{{ $row->id }}">{{ $row->name_level }}</option>
                      @endforeach
                    </select>
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
@endsection
