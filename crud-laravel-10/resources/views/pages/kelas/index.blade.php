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
    
    <div class="d-flex justify-content-end mb-3">
        <form action="{{ route('search.addkelas') }}" method="POST" class="form-inline">
            @csrf
            <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-outline-primary ml-2">Search</button>
        </form>        
    </div>

    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" /> --}}
    
        <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>ID Kelas</th>
                {{-- <th>NIP</th> --}}
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
                        {{-- <td class="align-middle">{{ $kls->nip}}</td> --}}
                        <td class="align-middle">{{ $kls->ta}}</td>
                        <td class="align-middle">{{ $kls->kelas}}</td>
                        <td class="align-middle">{{ $kls->jurusan}}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('addkelas.show', $kls->kelas) }}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('addkelas.edit', $kls->kelas) }}" button type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('addkelas.destroy', $kls->kelas) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
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

        {{-- <!-- Include jQuery first -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <!-- Then include DataTables -->
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    
        <!-- Your existing script for DataTables initialization (outside document.ready) -->
        <script>
            $('#myTable').DataTable();
        </script>
    
        <script>
            $(document).ready(function () {
                // Your existing document.ready code...
            });
        </script> --}}

@endsection