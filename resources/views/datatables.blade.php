<link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet">
@extends('layouts.main')

@section('container')
    <div class="container">
        <table id="myTable" class="table table-stripped">
            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Email
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

<script>
    let table = new DataTable('#myTable');
</script>
<script src="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.js"></script>