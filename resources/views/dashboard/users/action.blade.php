<a href="{{ route('users.show', ['user'=> $data->username]) }}" class="edit btn btn-info btn-sm">
    View
</a>
<a href="{{ route('users.edit', ['user'=> $data->username]) }}" class="edit btn btn-info btn-sm">Edit {{ $data->username }}</a>
<a href="javascript:void(0);" id="delete-compnay" onClick="deleteFuncUser({{ $data->id }})" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger">
    Delete
</a>