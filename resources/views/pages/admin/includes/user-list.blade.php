<table class="table table-hover" id="content-user" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Status</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($user as $item)
            <tr>
                <td>{{ ($user->currentpage() - 1) * $user->perpage() + $loop->index + 1 }}</td>
                <td>{{ $item->fullname }}</td>
                <td>{{ $item->username }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->nomor_telpon }}</td>
                <td>
                    @if ($item->status == 1)
                        <div class="badge bg-info rounded-pill">Active</div>
                    @else
                        <div class="badge bg-danger rounded-pill">Blocked</div>
                    @endif

                </td>
                <td>
                    <a class="btn btn-outline-indigo btn-sm m-1" href="{{ route('admin.user.edit', $item->id) }}">Edit</a>
                    @if ($item->status == 1)
                        <button class="btn btn-outline-orange btn-sm m-1"
                            onclick="blockUser(event, {{ $item->id }}, 0)">Block</button>
                    @else
                        <button class="btn btn-outline-blue btn-sm m-1"
                            onclick="unblockUser(event, {{ $item->id }}, 1)">Unblock</button>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $user->appends($_GET)->links() }}
