@extends('layouts.main')

@section('container')

<div class="row">
    <div class="col-md-5 mx-auto">
        <main class="text-center">
            <form class="form-registration" action="/register" method="post">
                @csrf
                <h1 class="h3 mb-3 font-weight-normal">
                    Registration Form
                </h1>
                {{-- name --}}
                <input type="text" name="name" id="name" class="form-control @error('name')is-invalid @enderror" placeholder="Name" required value="{{ old('name') }}">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                {{-- username --}}
                <input type="text" name="username" id="username" class="form-control @error('username')is-invalid @enderror" placeholder="Username" required value="{{ old('username') }}">
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                {{-- email --}}
                <input type="email" name="email" id="email" class="form-control @error('email')is-invalid @enderror" placeholder="Email" required value="{{ old('email') }}">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                {{-- password --}}
                <input type="password" name="password" id="password" class="form-control @error('password')is-invalid @enderror" placeholder="Password" required>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

                <button class="btn btn-lg btn-primary btn-block mt-5" type="submit">
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