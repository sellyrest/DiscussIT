{{-- <table class="table table-hover" id="content-response" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Response</th>
            <th>Content</th>
            <th>Owner</th>
            <th>Created at</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($response as $item)
            <tr>
                <td>{{ ($response->currentpage() - 1) * $response->perpage() + $loop->index + 1 }}</td>
                <td>{{$item->user->username}}</td>
                <td>{!! $item->content !!}</td>
                <td>{{$item->topic->content}}</td>
                <td>{{$item->topic->user->username}}</td>
                <td>{{$item->created_at}}</td>
                <td>
                    <a class="btn btn-outline-indigo btn-sm m-1"
                        href="{{ route('admin.response.edit', $item->id) }}">Edit</a>
                    <button class="btn btn-outline-orange btn-sm m-1"
                        onclick="deleteTopic(event, {{ $item->id }}, '{{ $item->title }}')">Delete</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $response->appends($_GET)->links() }} --}}

<table class="table table-hover" id="content-response" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>User</th>
            <th>Response</th>
            <th>Content</th>
            <th>Owner</th>
            <th>Created at</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($response as $item)
            <tr>
                <td>{{ ($response->currentpage() - 1) * $response->perpage() + $loop->index + 1 }}</td>
                <td>{{ $item->user->username }}</td>
                <td>{!! $item->content !!}</td>
                <td>{{ $item->responses->content }}</td>
                <td>{{ $item->responses->user->username }}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                    <button class="btn btn-outline-danger btn-sm"
                        onclick="deleteResponse(event, {{ $item->id }}, '{{ $item->title }}')">Delete</button>
                </td>
                
            </tr>
        @endforeach
    </tbody>
</table>
{{ $response->appends($_GET)->links() }}
