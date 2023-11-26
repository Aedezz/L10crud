@extends ('layouts.app')

@section('body')
        <h1 class="mb-0">Detail petugas</h1>
    </div>
    <hr />
        <div class="row">
            <div class="col mb-3">
            <label class="form-label">ID Petugas</label>
                <input type="text" name="petugas" class="form-control" placeholder="ID Petugas" value="{{ $petugas->petugas }}" readonly>
            </div>
            <label class="form-label">NISN</label>
                <input type="text" name="nis" class="form-control" placeholder="NISN" value="{{ $petugas->nis }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Created At</label>
                <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $petugas->created_at }}" readonly>
            </div>
            <div class="col mb-3">
                <label class="form-label">Updated At</label>
                <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $petugas->updated_at }}" readonly>
            </div>
        </div>
    @endsection