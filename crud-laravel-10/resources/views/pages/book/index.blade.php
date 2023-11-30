@extends ('layouts.app')

@section('body')
    <div class="d-flex align-items justify-content-between">
        <h1>List Data UKS</h1>
        <a href="{{ route('book.create') }}" class="btn btn-primary">Add Data</a>
    </div>
    <hr />
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    {{-- <div class="d-flex justify-content-end mb-3">
        <form action="{{ route('search.books') }}" method="POST" class="form-inline">
            @csrf
            <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-outline-primary ml-2">Search</button>
        </form>        
    </div> --}}

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
      
    <table class="table table-hover" id="myTable">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Name</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Tahun Ajaran</th>
                <th>Jenis Kelamin</th>
                <th>Sakit</th>
                <th>Penanganan</th>
                <th>Petugas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($books->count() > 0)
                @foreach ($books as $book)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration}}</td>
                        <td class="align-middle">{{ $book->nis}}</td>
                        <td class="align-middle">{{ $book->name}}</td>
                        {{-- <td class="align-middle">{{ $book->idkelas}}</td> --}}
                        <td class="align-middle">{{ $book->kelas}}</td>
                        <td class="align-middle">{{ $book->jurusan}}</td>
                        <td class="align-middle">{{ $book->ta}}</td>
                        <td class="align-middle">{{ $book->jk}}</td>
                        <td class="align-middle">{{ $book->sakit}}</td>
                        <td class="align-middle">{{ $book->penanganan}}</td>
                        <td class="align-middle">{{ $book->petugas}}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('book.show', $book->iduks) }}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('book.edit', $book->iduks) }}" button type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('book.destroy', $book->iduks) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
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
                    <td class="text-center" colspan="10">Book not founded</td>
                </tr>
            @endif
        </tbody>
    </table>

    {{ $books->links() }}  

        <!-- Include jQuery first -->
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
    </script>

    

@endsection