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
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">
        <span>Tutup</span>
    </button>
    <a href="{{ url('/deleteContact/'.$id->id) }}" class="btn btn-danger btn_hapus text-white" onclick="return confirm('Anda yakin hapus pesan ini ?')">Hapus</a>
</div>
