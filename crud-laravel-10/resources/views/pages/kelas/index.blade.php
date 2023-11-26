@extends ('layouts.app')

@section('body')
    <div class="d-flex align-items justify-content-between">
        <h1>List Kelas</h1>
        <a href="{{ route('addkelas.create') }}" class="btn btn-primary">Add kelas</a>
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
                <th>ID Kelas</th>
                <th>NIS</th>
                <th>Tahun ajaran</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($kelas->count() > 0)
                @foreach ($kelas as $kls)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration}}</td>
                        <td class="align-middle">{{ $kls->idkelas}}</td>
                        <td class="align-middle">{{ $kls->nis}}</td>
                        <td class="align-middle">{{ $kls->ta}}</td>
                        <td class="align-middle">{{ $kls->kelas}}</td>
                        <td class="align-middle">{{ $kls->jurusan}}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('addkelas.show', $kls->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('addkelas.edit', $kls->id) }}" button type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('addkelas.destroy', $kls->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
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
                    <td class="text-center" colspan="10">Data Kelas not founded</td>
                </tr>
            @endif
        </tbody>
    </table>

    {{ $kelas->links() }}  

@endsection