@extends ('layouts.app')

@section('body')
        <h1 class="mb-0">Edit Book</h1>
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
    <form action="{{ route('book.update', $book->iduks) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">NIS</label>
                <input type="text" name="nis" class="form-control" placeholder="NIS" value="{{ $book->nis }}">
            </div>
            {{-- <label class="form-label">Nama</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Book Name" value="{{ $book->name }}">
            </div> --}}
            <div class="col mb-3">
            <label class="form-label">Kelas</label>
                <input type="text" name="kelas" class="form-control" placeholder="Kelas" value="{{ $book->kelas }}">
            </div>
            <div class="col mb-3">
            <label class="form-label">Jurusan</label>
                <input type="text" name="jurusan" class="form-control" placeholder="Jurusan" value="{{ $book->jurusan }}">
            </div>
            <div class="col mb-3">
            <label class="form-label">Tahun Ajaran</label>
                <input type="text" name="ta" class="form-control" placeholder="Tahun Ajaran" value="{{ $book->ta }}">
            </div>
        </div>
            <label class="form-label">Jenis kelamin</label>
                <input type="text" name="jk" id="jk" class="form-control" placeholder="Jenis Kelamin" value="{{ $book->jk }}">
            </div>
            <label class="form-label">Sakit</label>
                <input type="text" name="sakit" class="form-control" placeholder="Sakit" value="{{ $book->sakit }}">
            </div>
            <label class="form-label">Penanganan</label>
                <input type="text" name="penanganan" class="form-control" placeholder="Penanganan" value="{{ $book->penanganan }}">
            </div>
            <label class="form-label">Petugas</label>
                <input type="text" name="petugas" class="form-control" placeholder="Petugas" value="{{ $book->petugas }}">
            </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
    @endsection