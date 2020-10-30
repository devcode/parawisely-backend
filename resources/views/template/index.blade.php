<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>{{ $dataAuth->level_id == 1 ? "Admin" : "Mitra" }}</title>

    <link rel="icon" href="{{ asset('backend/img/logo.png') }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
    integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin=""/>
    <link rel="stylesheet" type="text/css" href="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet-geocoder/0.0.1-beta.5/esri-leaflet-geocoder.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/fontawesome.min.css" integrity="sha512-kJ30H6g4NGhWopgdseRb8wTsyllFUYIx3hiUwmGAkgA9B/JbzUBDQVr2VVlWGde6sdBVOG7oU8AL35ORDuMm8g==" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
        crossorigin=""></script>
    <script src="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet/0.0.1-beta.5/esri-leaflet.js"></script>
    <script src="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet-geocoder/0.0.1-beta.5/esri-leaflet-geocoder.js"></script>

    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
    integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/fontawesome.min.js" integrity="sha512-kI12xOdWTh/nL2vIx5Yf3z/kJSmY+nvdTXP2ARhepM/YGcmo/lmRGRttI3Da8FXLDw0Y9hRAyZ5JFO3NrCvvXA==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/solid.min.js" integrity="sha512-JkeOaPqiSsfvmKzJUsqu7j2fv0KSB6Yqb1HHF0r9FNzIsfGv+zYi4h4jQKOogf10qLF3PMZEIYhziCEaw039tQ==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-127341144-1"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
            integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <!-- include summernote css/js -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header text-center">
                <h4>Parawisely</h4>
            </div>

            @if ($dataAuth->level_id == 1)
                <ul class="list-unstyled components">
                    <li class="{{ $title == "Dashboard" ? "active" : "" }}">
                        <a href="{{ url('/dashboard') }}"><i class="fas fa-tachometer-alt"></i>
                            <span class="side-link">Dashboard</span></a>
                    </li>
                    <li class="{{ $title == "Pegawai" ? "active" : "" }}">
                        <a href="{{ url('/employee') }}"><i class="fas fa-user-tie"></i>
                            <span class="side-link">Pegawai</span></a>
                    </li>
                    <li class="{{ $title == "Level" ? "active" : "" }}">
                        <a href="{{ url('/level') }}"><i class="fas fa-user-lock"></i>
                            <span class="side-link">Level Pegawai</span></a>
                    </li>
                    <li class="{{ $title == "Pulau" ? "active" : "" }}">
                        <a href="{{ url('/island') }}"><i class="fas fa-globe-asia"></i>
                            <span class="side-link">Pulau</span></a>
                    </li>
                    <li class="{{ $title == "Tipe Tempat" ? "active" : "" }}">
                        <a href="{{ url('/type') }}"><i class="fas fa-align-justify"></i>
                            <span class="side-link">Tipe Tempat</span></a>
                    </li>
                    <li class="{{ $title == "Tempat Wisata" ? "active" : "" }}">
                        <a href="{{ url('/place') }}"><i class="fas fa-map-marker-alt"></i>
                            <span class="side-link">Tempat Wisata</span></a>
                    </li>
                </ul>
            @else
                <ul class="list-unstyled components">
                    <li class="{{ $title == "Tambah Tempat" ? "active" : "" }}">
                        <a href="{{ url('/add-place') }}"><i class="fas fa-tachometer-alt"></i>
                            <span class="side-link">Tambah Tempat</span></a>
                    </li>
                    <li class="{{ $title == "Data Tempat" ? "active" : "" }}">
                        <a href="{{ url('/data-place') }}"><i class="fas fa-map-marker-alt"></i>
                            <span class="side-link">Data Tempat</span></a>
                    </li>
                    <li class="{{ $title == "Komentar" ? "active" : "" }}">
                        <a href="{{ url('/showComment') }}"><i class="fas fa-comment-dots"></i>
                            <span class="side-link">Komentar</span></a>
                    </li>
                </ul>
            @endif

            <!-- <ul class="list-unstyled CTAs">
                <li>
                    <a href="" class="article">Logout</a>
                </li>
            </ul> -->
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-sm navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-light">
                        <i class="fas fa-bars"></i>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="img-profile rounded-circle" src="{{ asset('backend/uploads/'.$dataAuth->image) }}">
                                    {{ $dataAuth->name }}
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="{{ url('/showProfile') }}">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="{{ url('/changePassword') }}">
                                        <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Ganti Password
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            @yield('content')

        </div>

@if (\Session::has('success'))
    <div class="flash-data" data-flashdata="{!! \Session::get('success') !!}" data-cek="success"></div>
@elseif(\Session::has('gagal'))
    <div class="flash-data" data-flashdata="{!! \Session::get('gagal') !!}"></div>
@endif
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin Keluar ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Logout" untuk keluar dari halaman ini.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{ url('/logout') }}">Logout</a>
            </div>
        </div>
    </div>
</div>

{{-- modal detail comment  --}}
<div class="modal fade" id="comment_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" id="comment_detail">

        </div>
    </div>
</div>

{{-- modal detail contact  --}}
<div class="modal fade bd-example-modal-xl" tabindex="-1" id="contact_modal" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" id="contact_detail">

        </div>
    </div>
    </div>


<script src="{{asset('backend/js/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('backend/js/script.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
        $('.dataTable').DataTable();
    });
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>

<script>
    function getComment(id){
        console.log(id)
        $.ajax({
            url: `{{ url('/detailComment/${id}') }}`,
            method: "get",
            data: {
                id: id
            },
            success: function(data) {
                $('#comment_modal').modal('show');
                $('#comment_detail').html(data);
                console.log(data)
            }
        })
    }

    function getContact(id){
        console.log(id)
        $.ajax({
            url: `{{ url('/detailContact/${id}') }}`,
            method: "get",
            data: {
                id: id
            },
            success: function(data) {
                $('#contact_modal').modal('show');
                $('#contact_detail').html(data);
            }
        })
    }
</script>
</body>

</html>
