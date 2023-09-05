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
                                <h6 class="m-0 font-weight-bold role">UI/UX Designer</h6>
                            </div>
                            <div class="card-body">
                                <img style="height :60px; "
                                    src="{{ $item->user->foto ? asset('img/profile/' . $item->user->foto) : asset('img/profile/default_fp.jpg') }}"
                                    alt="">
                                <h5 class="name">{{ $item->user->fullname }}</h5>
                                <p class="time">{{ date('d F Y', strtotime($item->updated_at)) }}</p>
                                <h4 class="title">{{ $item->title }}</h4>
                                <p class="content">{{ $item->content }}</p>
                                <div class="text-center">
                                    <img src="{{ asset('img/' . $item->image) }}" alt="" class="img-fluid">
                                </div>


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
                                <a href="{{ route('topic.show', Crypt::encrypt($item->id)) }}" class="btn-allrespon">see all response</a>
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
                                                <textarea class="form-control" id="commentContent" name="commentContent" rows="5" required></textarea>
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
                            <img class="image-contact" src="{{ Auth::user()->foto ? asset('img/profile/' . Auth::user()->foto) : asset('img/profile/default_fp.jpg') }}" alt="">
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
                                <img class="image-topuser" src="{{ $user->foto ? asset('img/profile/' . $user->foto) : asset('img/profile/default_fp.jpg') }}"
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
@endsection
@section('scripts')
    <script>
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

    </script>
@endsection
