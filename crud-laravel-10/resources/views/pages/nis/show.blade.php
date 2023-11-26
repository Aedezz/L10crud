@extends ('layouts.app')

@section('body')
        <h1 class="mb-0">Detail NIS</h1>
    </div>
    <hr />
        <div class="row">
            <div class="col mb-3">
            <label class="form-label">NIS</label>
                <input type="text" name="nis" class="form-control" placeholder="NIS" value="{{ $nis->nis }}" readonly>
            </div>
            <label class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $nis->name }}" readonly>
            </div>
            <div class="col mb-3">
            <label class="form-label">Jenis kelamin</label>
                <input type="text" name="jk" class="form-control" placeholder="Jenis Kelamin" value="{{ $nis->jk }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Created At</label>
                <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $nis->created_at }}" readonly>
            </div>
            <div class="col mb-3">
                <label class="form-label">Updated At</label>
                <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $nis->updated_at }}" readonly>
            </div>
        </div>
    @endsection