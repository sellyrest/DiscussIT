@extends('layouts.main')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center" id="load-icon" style="display: none">
                <img src="{{asset('img/load.gif')}}" alt="" width="50px" >
            </div>
            <div class="col-12" id="content-saved">
            </div>
            
            <!-- Modal -->
            <div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="commentModalLabel">Respons</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="commentTitle">Judul</label>
                                <input type="text" class="form-control" id="commentTitle" name="commentTitle"
                                    required>
                            </div>
                            <div class="form-group">
                                Respons</label>
                                <textarea class="form-control" id="commentContent" name="commentContent" rows="5" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="button" class="btn btn-primary">Kirim</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>


@endsection
@section('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var url ="{{route('saved.index')}}"

    getSaved(url)

    function getSaved(url) {
        $.ajax({
            type: "GET",
            url: url,
            cache: false,
            beforeSend: function() {
                $('#load-icon').show();
            },
            success: function (response) {
                $('#load-icon').hide();
                $('#content-saved').html(response);
                $('ul.pagination ap').click(function (e) { 
                        e.preventDefault();
                        var href = $(this).attr('href');
                        getSaved(href)
                    });
            }
            
        });
    }

    $('body').on('click', '.btn-saved', function(e) {
        e.preventDefault();
            var button = $(this)
            var user_id = $(this).data('user');
            var topic_id = $(this).data('topic');
            $.ajax({
                type: "POST",
                url: "{{ route('saved.store') }}",
                data: {
                    user_id: user_id,
                    topic_id: topic_id,
                },
                cache: false,
                success: function (response) {
                    getSaved(url)
                }
            });
    })
        
</script>
@endsection
