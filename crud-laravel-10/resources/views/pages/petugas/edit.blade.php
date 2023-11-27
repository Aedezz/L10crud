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
    <form action="{{ route('addpetugas.update', $petugas->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
            <label class="form-label">ID Petugas</label>
                <input type="text" name="idpetugas" class="form-control" placeholder="ID Petugas" value="{{ $petugas->idpetugas }}">
            </div>
            <label class="form-label">NISN</label>
                <input type="text" name="nis" class="form-control" placeholder="NISN" value="{{ $petugas->nis }}">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
    @endsection