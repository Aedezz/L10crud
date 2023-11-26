@extends('layouts.app')
@section('js')
    <script src="{{$chart->cdn()}}"></script>
    {{ $chart->script()}}
@endsection
@section('body')
    <h1>Halaman Dashboard data UKS</h1>

    <div class="card-body">
    {!! $chart->container()!!}
</div>
@endsection