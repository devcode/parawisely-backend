<form action="{{ url('/updateComment/'.$id->id) }}" method="post">
    @csrf
    <div class="modal-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="text-primary m-0">{{ $place->name_place }}</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body" >
        <div class="row">
            <div class="col-md-6">
                <h6><i class="fas fa-user"></i> &nbsp;{{ $id->name }}</h6>
            </div>
            <div class="col-md-6">
                <h6 class="float-right">Tanggal : <span class="font-italic text-success ">{{ date("d-m-Y", strtotime($id->created_at)) }}</span></h6>
            </div>
        </div>
        <h6><i class="fas fa-envelope"></i> &nbsp;{{ $id->email }}</h6>
        <hr>
        <div class="form-group">
            <label>Ulasan</label>
            <textarea cols="12"  rows="7" {{ $dataAuth->level_id != 1 ? "readonly" : "" }} type="text" class="form-control" name="comment">{{ $id->comment }}</textarea>
        </div>
    </div>
    @if ($dataAuth->level_id == 1)
    <div class="modal-footer">
        <button type="submit" class="btn btn-warning text-white">Edit</button>
        <a href="{{ url('/deleteComment/'.$id->id) }}" class="btn btn-danger btn_hapus text-white" onclick="return confirm('Anda yakin hapus komentar ini ?')">Hapus</a>
    </div>
    @endif
</form>

