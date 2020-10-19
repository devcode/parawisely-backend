<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="backend/auth/css/style_registrasi.css">

    <title>Login</title>
</head>

<body>


    <div class="container d-flex justify-content-center my-5">
        <div class="row my-2 mx-2 main shadow">
            <div class="col-md-5 col-12 mycol">
                <img src="{{ asset('backend/auth/img/hero.png') }}" width="100%" height="100%">
            </div>
            <div class="col-md-7 col-12 xcol">
                <h2 class="title pt-5 pb-3">Login</h2>
                @if (\Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {!! \Session::get('success') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @elseif(\Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {!! \Session::get('error') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <form class="myform" method="POST" action="/procesLogin">
                    @csrf
                    <div class="row rtwo">
                        <div class="form-group col-md-12 ffour py-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="contoh@gmail.com" autocomplete="off" name="email">
                            @error('email')
                            <div class="invalid-feedback pl-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row rthree">
                        <div class="form-group col-md-12 ffive py-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                placeholder="Password" name="password">
                            @error('password')
                            <div class="invalid-feedback pl-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row rfour">
                        <div class="form-group col-md-6 fseven py-3"> <button type="submit"
                                class="btn btn-primary"><span>Login</span></button> </div>
                        <div class="form-group col-md-6 feight py-3">
                            <p class="text-muted">Belum punya akun Mitra ?<br><a
                                    href="{{ url('/registrasi') }}">Daftar</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
</body>

</html>
