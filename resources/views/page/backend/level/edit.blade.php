@extends('template.index')

@section('content')
<div class="form-edit">
    <div class="row">
        <div class="col-md-7">
            <div class="card shadow p-3">
                <form action="{{ url('/updateLevel/'.$id->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Name</label>
                            <input type="text" class="form-control" name="name_level" value="{{ $id->name_level }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ url('/level') }}" class="btn btn-secondary">Close</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
