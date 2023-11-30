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
                <input type="text" name="nis" id="nis" class="form-control" placeholder="NIS" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
            </div>
            <div class="col">
                <input type="text" name="name" id="name" class="form-control" placeholder="Nama" readonly>
            </div>
            <div class="col">
                <select name="idkelas" id="idkelas" class="form-control">
                    <option value="">-- Pilih Kelas --</option>
                    @foreach ($kelas as $k)
                    <option value="{{$k->idkelas}}">{{ $k->kelas}} | {{ $k->jurusan}} | {{ $k->ta}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="jk" id="jk" class="form-control" placeholder="Jenis Kelamin" readonly>
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $("#nis").focusout(function(e){
            // alert($(this).val());
            var nis = $(this).val();
            $.ajax({
            type: "POST",
            url: "{{ route('books.getfield') }}",
            data: {
                'nis': nis,
                '_token': '{{ csrf_token() }}' // Include the CSRF token
            },
            dataType: 'json',
            success: function (data) {
                $('#name').val(data.name);
                $('#jk').val(data.jk);
            },
            error: function (response) {
                alert(response.responseJSON.message);
            }
        });
    });
    </script>
@endsection