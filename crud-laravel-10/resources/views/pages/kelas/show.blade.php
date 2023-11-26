@extends ('layouts.app')

@section('body')
        <h1 class="mb-0">Detail kelas</h1>
    </div>
    <hr />
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">ID Kelas</label>
                <input type="text" name="idkelas" class="form-control" placeholder="ID kelas" value="{{ $kelas->idkelas }}" readonly>
            </div>
            <label class="form-label">NIS</label>
                <input type="text" name="nis" class="form-control" placeholder="NIS" value="{{ $kelas->nis }}" readonly>
            </div>
            <label class="form-label">Tahun ajaran</label>
                <input type="text" name="ta" class="form-control" placeholder="Tahun Ajaran" value="{{ $kelas->ta }}" readonly>
            </div>
            <div class="col mb-3">
            <label class="form-label">Kelas</label>
                <input type="text" name="kelas" class="form-control" placeholder="Kelas" value="{{ $kelas->kelas }}" readonly>
            </div>
            <label class="form-label">Jurusan</label>
                <input type="text" name="jurusan" class="form-control" placeholder="jurusan" value="{{ $kelas->kelas }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Created At</label>
                <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $kelas->created_at }}" readonly>
            </div>
            <div class="col mb-3">
                <label class="form-label">Updated At</label>
                <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $kelas->updated_at }}" readonly>
            </div>
        </div>
    @endsection