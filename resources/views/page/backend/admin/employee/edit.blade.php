@extends('template.index')

@section('content')
<div class="form-edit">
    <div class="row">
        <div class="col-md-7">
            <div class="card shadow p-3">
                <form action="{{ url('/updateEmployee/'.$id->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama</label>
                            <input type="text" class="form-control" name="name" value="{{ $id->name }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email</label>
                            <input type="text" class="form-control" name="email" value="{{ $id->email }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Level</label>
                            <select class="form-control" name="level">
                              <option disabled selected>--SELECT LEVEL--</option>
                              @foreach ($dataLevel as $row)
                                @if ($row->id == $id->level_id)
                                <option value="{{ $row->id }}" selected>{{ $row->name_level }}</option>
                                @else
                                <option value="{{ $row->id }}">{{ $row->name_level }}</option>
                                @endif
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
                        <a href="{{ url('/employee') }}" class="btn btn-secondary">Close</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card shadow p-3">
                <img class="mx-auto" src="{{ asset('backend/uploads/'.$id->image) }}" width="350" alt="">
            </div>
        </div>
    </div>
</div>
@endsection
