@extends ('layouts.app')

@section('body')
        <h1 class="mb-0">Edit Kelas</h1>
    </div>
    <hr />
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('addkelas.update', $kelas->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
            <label class="form-label">ID Kelas</label>
                <input type="text" name="idkelas" class="form-control" placeholder="ID Kelas" value="{{ $kelas->idkelas }}">
            </div>
            <label class="form-label">NIS</label>
                <input type="text" name="nis" class="form-control" placeholder="NIS" value="{{ $kelas->nis }}">
            </div>
            <label class="form-label">Tahun ajaran</label>
                <input type="text" name="ta" class="form-control" placeholder="Tahun Ajaran" value="{{ $kelas->ta }}">
            </div>
            <div class="col mb-3">
            <label class="form-label">Kelas</label>
                <input type="text" name="kelas" class="form-control" placeholder="Kelas" value="{{ $kelas->kelas }}">
            </div>
            <label class="form-label">Jurusan</label>
                <input type="text" name="jurusan" class="form-control" placeholder="Jurusan" value="{{ $kelas->jurusan }}">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
    @endsection