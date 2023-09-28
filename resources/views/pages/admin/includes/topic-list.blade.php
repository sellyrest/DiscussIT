<table class="table table-hover" id="content-topic" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Owner</th>
            <th>Title</th>
            <th>Content</th>
            <th>Image</th>
            <th>Status</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($topic as $item)
            <tr>
                <td>{{ ($topic->currentpage() - 1) * $topic->perpage() + $loop->index + 1 }}</td>
                <td>{{ $item->user->username }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->content }}</td>
                <td> <img src="{{ asset('img/' . $item->image) }}" alt="" width="200px">
                </td>
                <td>
                    @if ($item->status == '0')
                    <span class="badge bg-red">Blocked</span>
                    @elseif ($item->status == '1')
                    <span class="badge bg-green">Publish</span>
                    @elseif ($item->status == '2')
                    <span class="badge bg-orange">Draft</span>
                    @elseif ($item->status == '3')
                    <span class="badge bg-cyan">Requested</span>
                    @endif
                </td>
                <td>
                    <a class="btn btn-outline-indigo btn-sm m-1"
                        href="{{ route('admin.topic.edit', $item->id) }}">Edit</a>
                        @if ($item->status == '0')
                        <a href="javascript:void(0)" data-status="Unblock" data-title="{{ $item->title }}" data-url="{{ route('admin.topic.status', $item->id)}}?status=1" class="btn-status btn btn-outline-orange btn-sm m-2"><i class="fa-solid fa-xmark"></i>&nbsp; Unblock</a>
        
                        @elseif ($item->status == '1')
                        <a href="javascript:void(0)" data-status="Cancel" data-title="{{ $item->title }}" data-url="{{ route('admin.topic.status', $item->id)}}?status=3" class="btn-status btn btn-outline-orange btn-sm m-2"><i class="fa-solid fa-xmark"></i>&nbsp; Cancel</a>
        
                        @elseif ($item->status == '2')
                        <a href="javascript:void(0)" data-status="Publish" data-title="{{ $item->title }}" data-url="{{ route('admin.topic.status', $item->id)}}?status=1" class="btn-status btn btn-outline-primary btn-sm m-2"><i class="fa-solid fa-upload"></i>&nbsp; Publish</a>
        
                        @elseif ($item->status == '3')
                        <a href="javascript:void(0)" data-status="Accept" data-title="{{ $item->title }}" data-url="{{ route('admin.topic.status', $item->id)}}?status=1" class="btn-status btn btn-outline-blue btn-sm m-2"><i class="fa-solid fa-check"></i>&nbsp; Accept</a>
                        <a href="javascript:void(0)" data-status="Decline" data-title="{{ $item->title }}" data-url="{{ route('admin.topic.status', $item->id)}}?status=2" class="btn-status btn btn-outline-orange btn-sm m-2"><i class="fa-solid fa-xmark"></i>&nbsp; Decline</a>
        
                        @endif
        
                        <a class="btn btn-outline-info btn-sm m-2" href="{{ route('admin.topic.show', $item->id)}}"><i class="fa-regular fa-eye"></i>&nbsp; View</a>
                        <a class="btn btn-outline-success btn-sm m-2" href="{{ route('admin.topic.edit', $item->id)}}"><i class="fa-regular fa-pen-to-square"></i>&nbsp; Edit</a>
                        <button class="btn btn-outline-danger btn-sm m-2" onclick="deleteTopic(event, {{$item->id}}, '{{$item->title}}')"><i class="fa-solid fa-trash-can"></i>&nbsp; Delete</button>
        
                        @if ($item->status != '0')
                        <a href="javascript:void(0)" data-status="Block" data-title="{{ $item->title }}" data-url="{{ route('admin.topic.status', $item->id)}}?status=0" class="btn-status btn btn-outline-dark btn-sm"><i class="fa-solid fa-ban"></i>&nbsp; Block</a>   
                        @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $topic->appends($_GET)->links() }}
