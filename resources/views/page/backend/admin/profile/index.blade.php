@extends('template.index')

@section('content')
<div class="form-edit">
    <div class="row">
        <div class="col-md-7">
            <div class="card shadow p-3">
                <form action="{{ url('/updateProfile/'.$dataAuth->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Name</label>
                            <input type="text" class="form-control" name="name" autocomplete="off" value="{{ $dataAuth->name }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email</label>
                            <input type="text" class="form-control" name="email" autocomplete="off" value="{{ $dataAuth->email }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Level</label>
                            <input type="text" class="form-control" name="level" readonly value="{{ $dataAuth->level->name_level }}">
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
                        <a href="{{ $dataAuth->level_id == 1 ? url('/employee') : url('/add-place')  }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card shadow p-3">
                <img class="mx-auto" src="{{ asset('backend/uploads/'.$dataAuth->image) }}" width="350" alt="">
            </div>
        </div>
    </div>
</div>
@endsection
