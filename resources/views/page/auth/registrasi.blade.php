<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="backend/auth/css/style_registrasi.css">
    <link rel="icon" href="{{ asset('backend/img/logo.png') }}">

    <title>Registrasi</title>
  </head>
  <body>


    <div class="container d-flex justify-content-center my-5">
        <div class="row my-2 mx-2 main shadow">
            <div class="col-md-5 col-12 mycol">
               <img src="{{ asset('backend/auth/img/hero.png') }}" width="100%" height="100%">
            </div>
            <div class="col-md-7 col-12 xcol">
                <h2 class="title pt-5 pb-3">Registrasi</h2>
                <form class="myform" method="POST" action="/procesRegister">
                    @csrf
                    <div class="row rone">
                        <div class="form-group col-md-12 fone py-3">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama" autocomplete="off" name="name">
                            @error('name')
                                <div class="invalid-feedback pl-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row rtwo">
                        <div class="form-group col-md-12 ffour py-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="contoh@gmail.com" autocomplete="off" name="email">
                            @error('email')
                                <div class="invalid-feedback pl-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row rthree">
                        <div class="form-group col-md-6 ffive py-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password">
                            @error('password')
                                <div class="invalid-feedback pl-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 fsix py-3">
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password" name="password_confirmation">
                            @error('password_confirmation')
                                <div class="invalid-feedback pl-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row rfour">
                        <div class="form-group col-md-6 fseven py-3"> <button type="submit" class="btn btn-primary"><span>Submit</span></button> </div>
                        <div class="form-group col-md-6 feight py-3">
                            <p class="text-muted">Sudah punya Akun ?<br><a href="{{ url('/') }}">Login</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  </body>
</html>
