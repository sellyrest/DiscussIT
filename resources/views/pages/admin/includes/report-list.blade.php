<table class="table datatable-table mt-4" id="content-report" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Owner</th>
            <th>Report Content</th>
            <th>Type</th>
            <th>Username</th>
            <th>Reason</th>
            <th>Report Time</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($report as $item) 
        <tr>
            <td>{{ ($report->currentpage()-1) * $report->perpage() + $loop->index + 1 }}</td>
            <td>{{$item->username ? $item->username : $item->user->username}}</td>
            <td>{{$item->content}}</td>
            <td>
                {{ $item->report[0]->table_name }}
            </td>
            <td>
                @foreach ($item->report as $r)
                   {{ $r->user->username }} <br>
                @endforeach
            </td>
            <td>
                @foreach ($item->report as $r)
                    {{ $r->reason }} <br>
                @endforeach
            </td>
            <td>
                @foreach ($item->report as $r)
                    {{ $r->created_at }} <br>
                @endforeach
            </td>
            <td>
                @if ($item->status == '0')
                <span class="badge bg-red">Blocked</span>
                @endif
            </td>
            <td>
                @if ($item->status == '0')
                <a href="javascript:void(0)" onclick="unblockResponse(event, {{$item->id}}, '{{$item->report[0]->table_name}}', 1)" class="btn-status btn btn-outline-orange btn-sm m-2"><i class="fa-solid fa-xmark"></i>&nbsp; Unblock</a>
                @endif
                @if ($item->status != '0')
                <button class="btn btn-outline-dark btn-sm" onclick="blockResponse(event, {{$item->id}}, '{{$item->report[0]->table_name}}', 0)"><i class="fa-solid fa-ban"></i>&nbsp;Block</button>   
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="float-right">
{{ $report->appends($_GET)->links() }}
</div>