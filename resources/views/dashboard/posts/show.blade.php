@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2 class="mb-3">
                    <a href="/posts/{{ $post->id }}" class="text-decoration-none">
                        {{ $post->title }}
                    </a>
                </h2>
                <div class="item-container">
                    <a href="/dashboard" class="btn btn-success">
                        Back to my post
                    </a>
                    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning">
                        Edit
                    </a>
                    <form action="/dashboard/posts/{{ $post->slug }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('are you sure?')" href="/dashboard/posts/{{ $post->slug }}">
                            Delete
                        </button>
                    </form>
                </div>
                <h3 class="mb-5">
                    By <a href="/posts?author={{ $post->author->username }}"
                        class="text-decoration-none">{{ $post->author->name }}</a> in <a
                        href="/posts?categories={{ $post->category->slug }}"
                        class="text-decoration-none">{{ $post->category->name }}</a>
                </h3>
                @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}"
                    class="content-image w-100 mb-3 rounded" alt="">
                @else
                <img src="https://compote.slate.com/images/5294e6d0-53ed-4a4a-a350-7eaeab72ac93.jpeg?crop=1560%2C1040%2Cx0%2Cy0"
                    class="content-image w-100 mb-3 rounded" alt="">
                @endif
                <div>
                    {!! $post->body !!}
                </div>
                <a href="/blog">
                    Back to Blog
                </a>
            </div>
        </div>
    </div>

@endsection