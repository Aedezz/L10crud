@extends ('layouts.app')

@section('body')
        <h1 class="mb-0">Add Book</h1>
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
    <form action="{{ route('book.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="nis" class="form-control" placeholder="NIS" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
            </div>
            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="Nama">
            </div>
            <div class="col">
                <input type="text" name="kelas" class="form-control" placeholder="Kelas">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="jurusan" class="form-control" placeholder="Jurusan">
            </div>  
            <div class="col">
                <input type="text" name="angkatan" class="form-control" placeholder="Angkatan" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
            </div>
            <div class="col">
                <input type="text" name="jk" class="form-control" placeholder="Jenis Kelamin">
            </div>
            <div class="col">
                <input type="text" name="sakit" class="form-control" placeholder="Sakit">
            </div>
            <div class="col">
                <input type="text" name="penanganan" class="form-control" placeholder="Penanganan">
            </div>
            <div class="col">
                <input type="text" name="petugas" class="form-control" placeholder="Petugas">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
    @endsection