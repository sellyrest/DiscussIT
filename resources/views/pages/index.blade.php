@extends('layouts.main')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center" id="load-icon" style="display: none">
                <img src="{{ asset('img/load.gif') }}" alt="" width="50px">
            </div>
            <div class="col-xl-8 col-lg-5" id="content-topic">
                <div class="infinity-scroll">
                    @foreach ($topic as $item)
                        <div class="card shadow mb-4 content-card">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold role">{{ $item->kategori->name }}</h6>
                                
                            </div>
                            <div class="card-body">
                                @if (Auth::id()!= $item->user->id)
                                    <a class="float-end mt-3" href="javascript:void(0)" onclick="openReport(event, {{ $item->user->id }}, '{{ $item->user->username }}', '{{ app(App\Models\User::class)->getTable() }}')">
                                        <span><i class="fa-solid fa-flag"></i></span>
                                    </a>
                                @endif
                                <a href="{{ url('profile/'.$item->user->username) }}" class="text-decoration-none">
                                    <img style="height :60px;" class="rounded-circle"
                                        src="{{ $item->user->foto ? asset('img/profile/' . $item->user->foto) : asset('img/profile/default_fp.jpg') }}"
                                        alt="">
                                    <h5 class="name">{{ $item->user->fullname }}</h5>
                                    <p class="time">{{ date('d F Y', strtotime($item->updated_at)) }}</p>
                                </a>
                                
                                <hr>
                                <h4 class="title">{{ $item->title }}</h4>
                                <p class="content">{{ $item->content }}</p>
                                <div class="text-center">
                                    <img src="{{ asset('img/' . $item->image) }}" alt="" class="img-fluid">
                                </div>
                                &nbsp;
                                <hr>
                                <button
                                    class="p-2 justify-content-center my-3 btn-rspn" data-topic="{{$item->id}}">
                                    Add Response
                                </button>
                                
                                <button
                                    class="p-2 justify-content-center my-3 btn-saved @if (user_saved(Auth::user()->id, $item->id)) active @endif"
                                    data-user="{{ Auth::user()->id }}" data-topic="{{ $item->id }}">
                                    @if (!user_saved(Auth::user()->id, $item->id))
                                        Save
                                    @else
                                        Saved
                                    @endif
                                </button>
                                @if (Auth::id()!= $item->user->id)
                                <button class="btn btn-purple p-2 justify-content-center my-3" onclick="openReport(event, {{ $item->id }}, '{{ $item->title }}', '{{ app(App\Models\Topik::class)->getTable() }}')">
                                    <span><i class="fa-solid fa-flag"></i></span>
                                </button>
                                @endif
                                <a href="{{ route('topic.show', Crypt::encrypt($item->id)) }}" class="btn-allrespon float-right mb-3">see all response</a>
                            </div>

                            <!-- Modal -->
                        </div>
                        @endforeach
                        {{ $topic->appends($_GET)->links() }}
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
                                                    <input type="hidden" class="form-control" id="topic_id"
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
            </div>
            <div class="col-xl-4 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-body text-center card-profile">
                        <h3>Account</h3>
                        <hr>
                        <div class="text-center">
                            <img class="image-contact rounded-circle" src="{{ Auth::user()->foto ? asset('img/profile/' . Auth::user()->foto) : asset('img/profile/default_fp.jpg') }}" alt="">
                            <div class="name-contact">
                                <h5>{{ Auth::user()->fullname }}</h5>
                            </div>
                            <h5>contact</h5>
                            <label>Email: </label>
                            <a class="contact" href="mailto:{{ Auth::user()->email }}">
                                {{ Auth::user()->email }}
                            </a><br />
                            <label>Phone: </label>
                            <a class="contact" href="tel:+6288983879406">
                                088983879406
                            </a> <br />
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-body card-profile">
                        <h3 style="text-center">Top User</h3>
                        <div class="text-left pt-1 pb-2">
                            <hr>
                            @foreach ($topuser as $user)
                                
                            <div class="py-3">
                                <img class="image-topuser rounded-circle sm" src="{{ $user->foto ? asset('img/profile/' . $user->foto) : asset('img/profile/default_fp.jpg') }}"
                                alt="">
                                <h5 class="topuser">{{ $user->fullname }}</h5>
                                <h5 class="topic-count">{{ $user->topik_count }}</h5>
                                <h6 class="label-topuser-thread">thread</h6>
                                

                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Content Wrapper -->
    <div class="modal fade" id="reportModal" tabindex="-1" role="dialog"
                        aria-labelledby="reportModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form id="form-report" method="post">
                                    @csrf
                                    <input type="hidden" name="table_id" id="table_id">
                                    <input type="hidden" name="table_name" id="table_name" value="">
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
                                            <input class="form-check-input" id="reason1" type="radio" name="reason"
                                                value="Immoral Content">
                                            <label class="form-check-label" for="reason1">Immoral Content</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" id="reason2" type="radio" name="reason"
                                                value="Abusive">
                                            <label class="form-check-label" for="reason2">Abusive</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" id="reason3" type="radio" name="reason"
                                                value="Bullying">
                                            <label class="form-check-label" for="reason3">Bullying</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
@endsection
@section('scripts')
    <script>
        var url = "{{ route('admin.report.index') }}"
        var report = $('#report').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $(function() {
            $('ul.pagination').hide();
            $('.infinity-scroll').jscroll({
                autoTrigger: true,
                loadingHtml: '<img src="/img/load.gif" alt="" width="50px">',
                padding: 0,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.infinity-scroll',
                callback: function() {
                    $('ul.pagination').remove();
                }

            })

        });
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
                success: function(response) {
                    console.log(response);
                    if (response.status == 0) {
                        button.removeClass('active');
                        button.html('Save');
                    } else {
                        button.addClass('active');
                        button.html('Saved');


                    }
                }
            });
        })

        $('.btn-rspn').click(function (e) { 
            e.preventDefault();
            var topic_id = $(this).data('topic');
            $('#topic_id').val(topic_id);          
            $('#commentModal').modal('show');
        });


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
                    }
                }
            });
        });
        
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
        function openReport(e, id, username, table_name) {
            e.preventDefault()
            $('#table_id').val(id);
            $('#table_name').val(table_name);
            $('#reportModalLabel').html('Report '+ username);
            $('#reportModal').modal('show');

        }

    </script>
@endsection
