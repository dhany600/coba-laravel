@extends('layouts.main')

@section('container')
    <h1 class="mb-3 text-center">
        {{ $title }}
    </h1>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/posts">
                @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
                @endif

                @if (request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search"
                    value="{{ request('search') }}">
                    <button class="btn btn-danger" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
    
    <div class="row mb-4">
        <div class="col-md-12 mx-auto">
            <img src="https://placehold.co/600x150" alt="" class="w-100">
        </div>
    </div>
    <div class="row">
        @foreach ($posts as $post)
            <article class="col-md-4 pb-4">
                <div class="border rounded h-100 p-3">

                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="" class="w-100 mb-2">
                    @else
                        <img src="https://placehold.co/600x400" alt="" class="w-100 mb-2">
                    @endif

                    
                    <h2>
                        <a href="/posts/{{ $post->slug }}">
                            {{ $post->title }}
                        </a>
                    </h2>
                    <h3>
                        By <a href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a> in <a class="text-decoration-none" href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
                    </h3>
                    <p>
                        {{ $post->excerpt }}
                    </p>
                    <a href="/posts/{{ $post->slug }}" class="btn btn-primary">
                        Read More..
                    </a>
                </div>
            </article>
        @endforeach
    </div>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto incidunt ipsum fuga optio nisi. Laborum perspiciatis sunt provident harum deserunt, nulla, laboriosam modi sed eaque quis, doloribus doloremque at quae?
    <div class="pagination-area d-flex justify-content-center mt-5">
        {{ $posts->links() }}
    </div>
@endsection

