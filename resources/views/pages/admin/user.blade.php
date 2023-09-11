@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table User</h6>
            </div>
            <div class="card-body position-relative">
                <a href="{{ route('admin.user.create') }}" class="btn btn-outline-teal mb-3">Create</a>
                <div id="load-icon" class="spinner position-absolute start-50" style="display: none"></div>
                <div class="table-responsive"  id="content-user">

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    var url = "{{ route('admin.user.index') }}"
    getUser(url)

function getUser(url) {
    $.ajax({
        type: "GET",
        url: url,
        cache: false,
        beforeSend: function () {
            $('#load-icon').show();
        },
        success: function (response) {
            $('#load-icon').hide();
            $('#content-user').html(response);
            $('ul.pagination ap').click(function (e) { 
                e.preventDefault();
                var href = $(this).attr('href');
                getUser(href)
            });
        }
    });
    
}
</script>
@endsection