@extends('template.index')

@section('content')
<div class="card shadow col-md-8">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Form ganti password</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('/procesChange/'.$dataAuth->id) }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1">Kata sandi saat ini</label>
                <input type="password" class="form-control" name="now_password" placeholder="Kata sandi saat ini">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password Baru</label>
                <input type="password" class="form-control" name="old_password" placeholder="Password Baru">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Ulangi Password Baru</label>
                <input type="password" class="form-control" name="retype_old_password" placeholder="Ulangi Password Baru">
            </div>
            <hr>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection
