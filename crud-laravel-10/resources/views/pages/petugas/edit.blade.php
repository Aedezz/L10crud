@extends('layouts.app')

@section('body')
    <div class="mb-3">
        <h1>Edit Petugas</h1>
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

    <form action="{{ route('addpetugas.update', $petugas->idpetugas) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col">
                <label class="form-label">ID Petugas</label>
                <input type="text" name="idpetugas" class="form-control" placeholder="ID Petugas" value="{{ $petugas->idpetugas }}">
            </div>
            <div class="col">
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
