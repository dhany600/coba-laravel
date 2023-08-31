<a href="/dashboard/posts/{{ $model->slug }}">Edit</a>

<form action="/dashboard/posts/{{ $model->slug }}" method="post">
    @method('delete')
    @csrf
    <button class="badge bg-danger px-2 border-0" onclick="return confirm('are you sure?')" href="/dashboard/posts/{{ $model->slug }}">
        Delete
    </button>
</form>
