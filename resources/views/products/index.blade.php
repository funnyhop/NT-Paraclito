@extends('layouts.app')
@section('content')
    <h1>producs controller</h1>
    <h2>Title: {{ $title }}</h2>
    <h2>Name: 
        @foreach ($myphone as $key => $item)
           <h3>{{ $item }}</h3> 
        @endforeach    
    </h2>
    {{-- <h3>phone detail of {{ $product }}</h3> --}}
@endsection