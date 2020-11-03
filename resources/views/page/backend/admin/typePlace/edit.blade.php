@extends('template.index')

@section('content')
<div class="form-edit">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow p-3">
                <h3>Form Update</h3>
                <hr>
                <form action="{{ url('/updateTypePlace/'.$id->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Icon</label>
                            <input type="text" class="form-control @error('icon') is-invalid @enderror" name="icon" placeholder="name" autocomplete="off" value="{{ $id->type_icon }}">
                            @error('icon')
                                <div class="invalid-feedback pl-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Tipe</label>
                            <input type="text" class="form-control @error('type_name') is-invalid @enderror" name="type_name" placeholder="name" autocomplete="off" value="{{ $id->type_name }}">
                            @error('type_name')
                                <div class="invalid-feedback pl-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Deskripsi</label>
                            <textarea cols="12" rows="6" type="text" class="form-control @error('description') is-invalid @enderror" name="description">{{ $id->description }}</textarea>
                            @error('description')
                                <div class="invalid-feedback pl-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="">
                            <a href="{{ url('/type') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
