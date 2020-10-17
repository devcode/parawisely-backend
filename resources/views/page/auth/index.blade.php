<!doctype html>
<html lang="en">
<<<<<<< HEAD

<head>
    <title>Login V10</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="/backend/auth/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/backend/auth/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/backend/auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/backend/auth/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/backend/auth/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/backend/auth/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/backend/auth/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/backend/auth/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/backend/auth/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/backend/auth/css/util.css">
    <link rel="stylesheet" type="text/css" href="/backend/auth/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-t-50 p-b-90">
                <form class="login100-form validate-form flex-sb flex-w" action="{{ url('/procesLogin') }}"
                    method="POST">
                    {{ csrf_field() }}
                    <span class="login100-form-title p-b-51">
                        Login
                    </span>
                    @if ($errors->any())
                    @foreach($errors->all() as $err)
                    <div class="alert alert-danger alert-dismissible fade show text-white" role="alert">
                        {{ $err }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endforeach
                    @endif
                    <div class="wrap-input100 validate-input m-b-16" data-validate="Username is required">
                        <input class="input100" type="text" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-login100-form-btn m-t-17">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
=======
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ asset('backend/auth/css/style_registrasi.css') }}">
>>>>>>> 003be4129b15852855b393e036cb6c9891ff368b

    <title>Login</title>
  </head>
  <body>

<<<<<<< HEAD
    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="/backend/auth/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="/backend/auth/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="/backend/auth/vendor/bootstrap/js/popper.js"></script>
    <script src="/backend/auth/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="/backend/auth/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="/backend/auth/js/main.js"></script>

</body>

=======

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
                @endif
                <form class="myform" method="POST" action="{{ url('/procesLogin') }}">
                    {{ csrf_field() }}
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
                        <div class="form-group col-md-12 ffive py-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password">
                            @error('password')
                                <div class="invalid-feedback pl-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row rfour">
                        <div class="form-group col-md-6 fseven py-3"> <button type="submit" class="btn btn-primary"><span>Login</span></button> </div>
                        <div class="form-group col-md-6 feight py-3">
                            <p class="text-muted">Belum punya akun Mitra ?<br><a href="{{ url('/registrasi') }}">Daftar</a></p>
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
>>>>>>> 003be4129b15852855b393e036cb6c9891ff368b
</html>
