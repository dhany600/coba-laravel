@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">
            My Posts
        </h1>
    </div>
    
    @if(session()->has('success'))
        <div class="alter alert-success col-md-8 p-4" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <a href="/dashboard/posts/create" class="btn btn-primary mb-3">
            Create new Post
        </a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>
                        {{ $loop->iteration }}
                    </td>
                    <td>
                        {{ $post->title }}
                    </td>
                    <td>
                        {{ $post->category->name }}
                    </td>
                    <td>
                        <a class="px-2" href="/dashboard/posts/{{ $post->slug }}">
                            Show Detail
                        </a>
                        {{-- bisa cek route resource melalui 'php artisan route:list' --}}
                        <a class="px-2" href="/dashboard/posts/{{ $post->slug }}/edit">
                            Edit
                        </a>
                        <form action="/dashboard/posts/{{ $post->slug }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger px-2 border-0" onclick="return confirm('are you sure?')" href="/dashboard/posts/{{ $post->slug }}">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    @section('js')
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(function () {
                var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ url('/dashboard/users') }}",
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ]
                });
        
            });
            function deleteFuncUser(id) {
                if (confirm("Delete Record?") == true) {
                    var id = id;

                    // ajax
                    $.ajax({
                        type: "POST",
                        url: "{{ url('delete-user') }}",
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        success: function (res) {

                            var oTable = $('#ajax-crud-datatable-user').dataTable();
                            oTable.fnDraw(false);
                        }
                    });
                }
            }
        </script>
    @endsection
@endsection