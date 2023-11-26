@extends('layouts.app')

@section('body')
    <div class="d-flex align-items justify-content-between">
        <h1>List Petugas</h1>
        <a href="{{ route('addpetugas.create') }}" class="btn btn-primary">Add Petugas Siswa</a>
    </div>
    <hr />
    @if(Session::has('succes'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('succes')}}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>ID Petugas</th>
                <th>NISN</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($petugas->count() > 0)
                @foreach ($petugas as $p)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration}}</td>
                        <td class="align-middle">{{ $p->idpetugas}}</td>
                        <td class="align-middle">{{ $p->nis}}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('addpetugas.show', $p->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('addpetugas.edit', $p->id) }}" button type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('addpetugas.destroy', $p->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="10">Petugas Data not founded</td>
                </tr>
            @endif
        </tbody>
    </table>

    {{ $petugas->links() }} 

@endsection
