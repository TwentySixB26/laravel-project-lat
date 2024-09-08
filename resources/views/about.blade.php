@extends('layouts.main')

@section('container') 	
    <h1>Halaman About</h1>
    <h4>Saya adalah : {{ $nama }} </h4>
    <p> dari gen : {{ $gen }}</p>
    <img src="/img/web progaming.jpg" alt="img" width="200">


@endsection 		
    