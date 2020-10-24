@extends('template.index')

@section('content')
<a href="{{ url('/dashboard') }}" class="btn btn-primary">Kembali</a>
<br>
<br>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="text-primary m-0">{{ $id->email }}</h6>
            </div>
            <div class="card-body" >
                <div class="row">
                    <div class="col-md-6">
                        <h6><i class="fas fa-user"></i> &nbsp; Nama : {{ $id->name }}</h6>
                    </div>
                    <div class="col-md-6">
                        <h6 class="float-right">Tanggal : <span class="font-italic text-success ">{{ date("d-m-Y", strtotime($id->created_at)) }}</span></h6>
                    </div>
                </div>
                <h6><i class="fas fa-envelope"></i> &nbsp; Subject : {{ $id->subject }}</h6>
                <hr>
                <div class="form-group">
                    <label>Pesan</label>
                    <textarea cols="12"  rows="7" readonly type="text" class="form-control" name="comment">{{ $id->message }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0">Balas Pesan</h6>
            </div>
            <div class="card-body" >
                <form action="{{ url('/sendEmail') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <h6>Pengirim : apps.parawisely@gmail.com</h6>
                        <input type="text" class="form-control" name="name_recipe" hidden value="{{ $id->name }}">
                        <input type="text" class="form-control" name="email_recipe" hidden value="{{ $id->email }}">
                    </div>
                    <hr>
                    <div class="form-group">
                        <textarea cols="12"  rows="5" type="text" class="form-control" name="message" placeholder="Tulis Pesan disini......">Terimakasih Telah memberi masukan kepada kami</textarea>
                    </div>

                    <div class="button float-right">
                        <button class="btn btn-danger" type="reset">Batal</button>
                        <button class="btn btn-primary" type="submit">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
