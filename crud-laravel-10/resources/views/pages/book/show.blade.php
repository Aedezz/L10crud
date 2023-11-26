@extends ('layouts.app')

@section('body')
        <h1 class="mb-0">Detail Book</h1>
    </div>
    <hr />
        <div class="row">
            <div class="col mb-3">
            <label class="form-label">NIS</label>
                <input type="text" name="nis" class="form-control" placeholder="NIS" value="{{ $book->nis }}" readonly>
            </div>
            <label class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" placeholder="Book Name" value="{{ $book->name }}" readonly>
            </div>
            <div class="col mb-3">
            <label class="form-label">Kelas</label>
                <input type="text" name="kelas" class="form-control" placeholder="Kelas" value="{{ $book->kelas }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
            <label class="form-label">Jurusan</label>
                <input type="text" name="jurusan" class="form-control" placeholder="Jurusan" value="{{ $book->jurusan }}" readonly>
            </div>
            <div class="col mb-3">
                <label class="form-label">Angkatan</label>
                <input type="text" name="angkatan" class="form-control" placeholder="Angkatan" value="{{ $book->angkatan }}" readonly>
            </div>
            <label class="form-label">Jenis kelamin</label>
                <input type="text" name="jk" class="form-control" placeholder="Jenis Kelamin" value="{{ $book->jk }}" readonly>
            </div>
            <label class="form-label">Sakit</label>
                <input type="text" name="sakit" class="form-control" placeholder="Sakit" value="{{ $book->sakit }}" readonly>
            </div>
            <label class="form-label">Penanganan</label>
                <input type="text" name="penanganan" class="form-control" placeholder="Penanganan" value="{{ $book->penanganan }}" readonly>
            </div>
            <label class="form-label">Petugas</label>
                <input type="text" name="petugas" class="form-control" placeholder="Petugas" value="{{ $book->petugas }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Created At</label>
                <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $book->created_at }}" readonly>
            </div>
            <div class="col mb-3">
                <label class="form-label">Updated At</label>
                <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $book->updated_at }}" readonly>
            </div>
        </div>
    @endsection