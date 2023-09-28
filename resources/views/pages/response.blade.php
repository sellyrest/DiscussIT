@extends('layouts.main')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold role">{{ $topic->kategori->name }}</h6>
                    </div>
                    <div class="card-body">
                        <img style="height :60px; " class="rounded-circle"
                            src="{{ $topic->user->foto ? asset('img/profile/' . $topic->user->foto) : asset('img/profile/default_fp.jpg') }}"
                            alt="">
                        <h5 class="name">{{ $topic->user->fullname }}</h5>
                        <p class="time">{{ date('d F Y', strtotime($topic->updated_at)) }}</p>
                        <h4 class="title">{{ $topic->title }}</h4>
                        <p class="content">{{ $topic->content }}</p>
                        <div class="text-center">
                            <img src="{{ asset('img/' . $topic->image) }}" alt="" class="img-fluid">
                        </div>
                        <button class="p-2 justify-content-center my-3 btn-rspn" data-topic="{{$topic->id}}">Add Response</button>
                    </div>
                    <div class="col-12 text-center" id="load-icon" style="display: none">
                        <img src="{{asset('img/load.gif')}}" alt="" width="50px" >
                    </div>
                    <div id="content-response">
                    </div>
                    <div class="modal fade" id="commentModal" tabindex="-1" role="dialog"
                            aria-labelledby="commentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form id="addResponse" method="post">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="commentModalLabel">Respons</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                {{-- <label for="commentTitle">Judul</label>
                                                <input type="text" class="form-control" id="commentTitle"
                                                    name="commentTitle" required> --}}
                                                    <input type="hidden" class="form-control" id="topic_id" value="{{ $topic->id }}"
                                                        name="topic_id">
                                                    <input type="hidden" class="form-control" id="user_id"
                                                        name="user_id" value="{{ Auth::user()->id }}">
                                                    <input type="hidden" name="parent_id" id="parent_id" value="0">                                   
                                                </div>
                                            <div class="form-group">
                                                Respons</label>
                                                <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                                                <span id="error-content" class="badge badge-danger"></span>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Kirim</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>

                <div class="modal fade" id="reportModal" tabindex="-1" role="dialog"
                aria-labelledby="reportModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                       <form id="form-report" method="post">
                           @csrf
                           <input type="hidden" name="table_id" id="table_id">
                           <input type="hidden" name="table_name" id="table_name" value="{{ app(App\Models\Response::class)->getTable() }}">
                           <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                           <div class="modal-header">
                               <h5 class="modal-title" id="reportModalLabel" style="color: #000000;">Report
                               </h5>
                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                   <span class="badge badge-danger" aria-hidden="true">&times;</span>
                               </button>
                           </div>
                           <div class="modal-body">
                               <div class="form-check">
                                   <input class="form-check-input" id="reason1" type="radio" name="reason" value="Spam">
                                   <label class="form-check-label" for="reason1">Spam</label>
                               </div>
                               <div class="form-check">
                                   <input class="form-check-input" id="reason2" type="radio" name="reason" value="Hate commment">
                                   <label class="form-check-label" for="reason2">Hate commment</label>
                               </div>
                               <div class="form-check">
                                   <input class="form-check-input" id="reason3" type="radio" name="reason" value="Misinformation">
                                   <label class="form-check-label" for="reason3">Misinformation</label>
                               </div>
                               <div class="form-check">
                                   <input class="form-check-input" id="reason3" type="radio" name="reason" value="Bullying">
                                   <label class="form-check-label" for="reason3">Bullying</label>
                               </div>
                           </div>
                           <div class="modal-footer">
                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                               <button type="submit" class="btn btn-primary">Submit</button>
                           </div>
                       </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- End of Content Wrapper -->

    </div>
@endsection
@section('scripts')
<script>
    var url_response = "{{ url('response?topic_id='.$topic->id) }}"

    getResponse(url_response)

    function getResponse(url) {
            $.ajax({
                type: "GET",
                url: url,
                cache: false,
                beforeSend: function () {
                    $('#load-icon').show();
                },
                success: function (response) {
                    $('#load-icon').hide();
                    $('#content-response').html(response);
                    $('ul.pagination a').click(function (e) { 
                        e.preventDefault();
                        var href = $(this).attr('href');
                        getResponse(href)
                    });
                }
            });
            
        }
        $('.btn-rspn').click(function (e) { 
            e.preventDefault();
            // var topic_id = $(this).data('topic');
            // $('#topic_id').val(topic_id);          
            $('#commentModal').modal('show');
        });


       function addReply(e, id, username){
            e.preventDefault() // 
            var data = new FormData($("#addReply"+ id)[0])
            var usr = '<a href="">@'+username+'&nbsp;</a>'
            var content = usr+data.get('content')
            data.append('content', content)
            $.ajax({
                type: "POST",
                url: "{{ route('response.store')}}",
                data: data,
                contentType: false,
                processData: false,
                cache: false,
                success: function (response) {
                    if (response.status == 0) {
                        $.each(response.data, function (i, v) { 
                             $('#error-content').append(v);
                        });
                        
                    } else {
                        $('#addReply'+ id).trigger('reset');
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1300
                        })
                        getResponse(url_response)
                    }
                }
            });
        };
        $('#addResponse').submit(function (e) { 
            e.preventDefault() // 
            var data = new FormData($(this)[0])
            $.ajax({
                type: "POST",
                url: "{{ route('response.store')}}",
                data: data,
                contentType: false,
                processData: false,
                cache: false,
                success: function (response) {
                    if (response.status == 0) {
                        $.each(response.data, function (i, v) { 
                             $('#error-content').append(v);
                        });
                        
                    } else {
                        $('#addResponse').trigger('reset');
                        $('#commentModal').modal('hide');
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1300
                        })
                        getResponse(url_response)
                    }
                }
            });
        });
        function openReply(e, id, username) {
            e.preventDefault()
            $('#btnReply'+ id).attr('onclick', "addReply(event, "+id+",'"+username+"')");
            $('#collapseExample'+ id).fadeToggle();
        }
        

        $('#form-report').submit(function (e) { 
            e.preventDefault();
            var data = new FormData($($('#form-report'))[0])
            $.ajax({
                type: "POST",
                url: "{{ route('report.store')}}",
                data: data,
                contentType: false,
                processData: false,
                cache: false,
                success: function (response) {
                    $('#form-report').trigger('reset');
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    $('#reportModal').modal('hide');
                }
            });
        });
        function openReport(e, id, username) {
            e.preventDefault()
            $('#table_id').val(id);
            $('#reportModalLabel').html('Report '+ username);
            $('#reportModal').modal('show');

        }


</script>
    
@endsection
