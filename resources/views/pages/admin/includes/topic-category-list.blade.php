<table class="table table-hover" id="content-topicCategory" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($topic as $item)
            <tr>
                <td>{{ ($topic->currentpage() - 1) * $topic->perpage() + $loop->index + 1 }}</td>
                <td>{{ $item->name }}</td>
                <td>
                    <a class="btn btn-edit btn-outline-indigo btn-sm m-1"
                        href="javascript:void(0)" data-id="{{ $item->id }}">Edit</a>

                    <button class="btn btn-outline-orange btn-sm m-1"
                        onclick="deleteTopic(event, {{ $item->id }}, '{{ $item->title }}')">Delete</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $topic->appends($_GET)->links() }}
