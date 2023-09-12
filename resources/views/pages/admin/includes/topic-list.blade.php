<table class="table table-hover" id="content-topic" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Content</th>
            <th>Image</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($topic as $item)
            <tr>
                <td>{{ ($topic->currentpage() - 1) * $topic->perpage() + $loop->index + 1 }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->content }}</td>
                <td> <img src="{{ asset('img/' . $item->image) }}" alt="" width="200px">
                </td>
                <td>
                    <a class="btn btn-outline-indigo btn-sm m-1"
                        href="{{ route('admin.topic.edit', $item->id) }}">Edit</a>
                    <button class="btn btn-outline-orange btn-sm m-1"
                        onclick="deleteTopic(event, {{ $item->id }}, '{{ $item->title }}')">Delete</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $topic->appends($_GET)->links() }}
