@extends('template.index')

@section('content')
<div class="form-edit">
    <div class="row">
        <div class="col-md-7">
            <div class="card shadow p-3">
                <form action="{{ url('/updateTypePlace/'.$id->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="image">Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="type_icon" id="image">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                              </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Type Name</label>
                            <input type="text" class="form-control" name="type_name" placeholder="name" autocomplete="off" value="{{ $id->type_name }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ url('/type') }}" class="btn btn-secondary">Close</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card shadow p-3">
                <img class="mx-auto" src="{{ asset('backend/uploads/icon/'.$id->type_icon) }}" width="30" alt="">
            </div>
        </div>
    </div>
</div>
@endsection
