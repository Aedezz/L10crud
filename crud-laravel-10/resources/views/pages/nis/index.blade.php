@extends('layouts.app')

@section('body')
    <div class="d-flex align-items justify-content-between">
        <h1>List NIS</h1>
        <a href="{{ route('addnis.create') }}" class="btn btn-primary">Add Siswa</a>
    </div>
    <hr />
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success')}}
    </div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <form action="{{ route('search.addnis') }}" method="POST" class="form-inline">
            @csrf
            <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-outline-primary ml-2">Search</button>
        </form>        
    </div>

    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Name</th>
                <th>Jenis Kelamin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($nis->count() > 0)
                @foreach ($nis as $n)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration}}</td>
                        <td class="align-middle">{{ $n->nis}}</td>
                        <td class="align-middle">{{ $n->name}}</td>
                        <td class="align-middle">{{ $n->jk}}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('addnis.show', $n->nis) }}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('addnis.edit', $n->nis) }}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('addnis.destroy', $n->nis) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
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
                    <td class="text-center" colspan="10">NIS Data not founded</td>
                </tr>
            @endif
        </tbody>
    </table>

    {{ $nis->links() }} 

@endsection
