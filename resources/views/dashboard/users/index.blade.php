@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <h1 class="mb-4">
            Laravel 8 Datatables Tutorial <br /> ItSolutionStuff.com
        </h1>
        <a href="/dashboard/users/create" class="btn btn-primary mb-4">
            Create new User
        </a>
        @if(session()->has('success'))
            <div class="alter alert-success col-md-8 p-4" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered data-table" id="ajax-crud-datatable-user">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th width="100px">Action</th>
                </tr>
            </thead>
            <tbody>
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