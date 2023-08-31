@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2 class="mb-3">
                    {{ $user->name }}
                    {{ $user->id }}
                </h2>
                <div class="item-container mb-4">
                    <a href="/dashboard/users" class="btn btn-success">
                        Back to User Dashboard
                    </a>
                    <a href="/dashboard/users/{{ $user->username }}/edit" class="btn btn-warning">
                        Edit
                    </a>
                    <form class="d-inline" action="/dashboard/users/{{ $user->id }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('are you sure?')" href="/dashboard/users/{{ $user->id }}">
                            Delete
                        </button>
                    </form>
                </div>
                <h3 class="mb-2">
                    Name
                </h3>
                <p class="mb-4">
                    {{ $user->name }}
                </p>
                <h3 class="mb-2">
                    Username
                </h3>
                <p class="mb-4">
                    {{ $user->username }}
                </p>
                <h3 class="mb-2">
                    Email
                </h3>
                <p class="mb-4">
                    {{ $user->email }}
                </p>
                {{-- <h3 class="mb-5">
                    By <a href="/posts?author={{ $post->author->username }}"
                        class="text-decoration-none">{{ $post->author->name }}</a> in <a
                        href="/posts?categories={{ $post->category->slug }}"
                        class="text-decoration-none">{{ $post->category->name }}</a>
                </h3> --}}
                {{-- @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}"
                    class="content-image w-100 mb-3 rounded" alt="">
                @else
                <img src="https://compote.slate.com/images/5294e6d0-53ed-4a4a-a350-7eaeab72ac93.jpeg?crop=1560%2C1040%2Cx0%2Cy0"
                    class="content-image w-100 mb-3 rounded" alt="">
                @endif
                <div>
                    {!! $post->body !!}
                </div> --}}
                <a href="/dashboard/users">
                    Back to Users Dashboard
                </a>
            </div>
        </div>
    </div>

@endsection