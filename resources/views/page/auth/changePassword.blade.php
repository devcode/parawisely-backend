@extends('template.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ url('/changePassword') }}" method="post">
                        @csrf
                        <h3 class="mb-3">{{ $title }}</h3>
                        <hr>
                        @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div class="form-group">
                            <label>Password Saat ini</label>
                            <input type="password" class="form-control @error('password_now') is-invalid @enderror" name="password_now" placeholder="password saat ini">
                            @error('password_now')
                                <div class="invalid-feedback pl-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password Baru</label>
                            <input type="password" class="form-control @error('password_new') is-invalid @enderror" name="password_new" placeholder="password baru">
                            @error('password_new')
                                <div class="invalid-feedback pl-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Ulangi Password Baru</label>
                            <input type="password" class="form-control @error('password_new_confirmation') is-invalid @enderror" name="password_new_confirmation" placeholder="ulangi password baru">
                            @error('password_new_confirmation')
                                <div class="invalid-feedback pl-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <hr>
                        <div class="row ml-auto">
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <button type="submit" class="btn btn-primary ml-2">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
