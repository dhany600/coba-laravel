@extends('layouts.main')

@section('container')

<div class="row">
    <div class="col-md-5 mx-auto">
        <main class="text-center">
            {{-- success --}}
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            {{-- failed --}}
            @if(session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            {{-- form here --}}
            <form class="form-signin" action="/login" method="post">
                @csrf
                <h1 class="h3 mb-3 font-weight-normal">
                    Please Login
                </h1>
                {{-- email --}}
                <label for="email" class="sr-only">Email address</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                placeholder="Email address" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                {{-- password --}}
                <label for="pasword" class="sr-only">Password</label>
                <input type="password" name="password" id="pasword" class="form-control @error('password') is-invalid @enderror"
                placeholder="Password">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                {{-- login button --}}
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Login
                </button>
            </form>
            <small class="d-block text-center mt-3">
                Not Registered? <a href="/register">Register Now</a>
            </small>
        </main>
    </div>
</div>

@endsection