@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">
            Create New Post
        </h1>
    </div>

    <div class="row">
        <div class="col-md-8">
            <form action="/dashboard/posts" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">
                        Title
                    </label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" autofocus required>
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">
                        Slug
                    </label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" required>
                    @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- Category input --}}
                <div class="mb-3">
                    <label for="category" class="form-label">
                        Category
                    </label>
                    <select class="form-control" id="category_id" name="category_id">
                        @foreach ($categories as $category)
                            @if (old('category_id') == $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                {{-- input image here --}}
                <div class="mb-3">
                    <label for="image" class="form-label">
                        Post Image
                    </label>
                    <img src="" alt="" class="img-preview img-fluid">
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"
                    onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- Body textarea wysiwyg --}}
                <div class="mb-3">
                    <label for="body" class="form-label">
                        Body
                    </label>
                    @error('body')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                    <trix-editor input="body"></trix-editor>
                </div>
                <button type="submit" class="btn btn-primary">
                    Create Post
                </button>
            </form>
        </div>
    </div>

    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function(){
            // checkSlug call into web.php
            fetch('/dashboard/posts/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e){
            e.preventDefault();
        });
    </script>

    <script>
        function previewImage(){
            const image = document.querySelector('#image');
            const imgPrewview = document.querySelector('.image-preview');
        };
    </script>

    <style>
        span.trix-button-group.trix-button-group--file-tools{
            display: none;
        }
    </style>
@endsection