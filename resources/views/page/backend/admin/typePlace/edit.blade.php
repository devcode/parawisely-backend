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
                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" name="image" id="image">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            @error('image')
                                <div class="invalid-feedback pl-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Type Name</label>
                            <input type="text" class="form-control @error('type_name') is-invalid @enderror" name="type_name" placeholder="name" autocomplete="off" value="{{ $id->type_name }}">
                            @error('type_name')
                                <div class="invalid-feedback pl-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Description</label>
                            <textarea cols="12" rows="6" type="text" class="form-control @error('description') is-invalid @enderror" name="description">{{ $id->description }}</textarea>
                            @error('description')
                                <div class="invalid-feedback pl-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="">
                            <a href="{{ url('/type') }}" class="btn btn-secondary">Close</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
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
