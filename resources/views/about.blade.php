@extends('layouts.main')

@section('container')
    
    <h1>
        About Us
    </h1>
    <h3>
        Nama : {{ $name }}
    </h3>
    <h5>
        Email : {{ $email }}
    </h5>
    <img src="src/image/{{ $image }}" alt="{{ $name }}">
    
@endsection