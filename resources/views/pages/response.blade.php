@extends('layouts.main')
@section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-8 col-lg-5">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold role">UI/UX Designer</h6>
                                </div>
                                <div class="card-body">
                                    <img style="height :60px; "
                                        src="{{ $topic->user->foto ? asset('img/profile/' . $topic->user->foto) : asset('img/profile/default_fp.jpg') }}"
                                        alt="">
                                    <h5 class="name">{{ $topic->user->fullname }}</h5>
                                    <p class="time">{{ date('d F Y', strtotime($topic->updated_at)) }}</p>
                                    <h4 class="title">{{ $topic->title }}</h4>
                                    <p class="content">{{ $topic->content }}</p>
                                    <div class="text-center">
                                        <img src="{{ asset('img/'.$topic->image) }}" alt="" class="img-fluid">
                                    </div>
                        
                                    <button
                                        class="p-2 justify-content-center my-3"style="text-decoration: none; background-color: #8A7EA4 ; color: #fff; border-color:#fff ;border-radius: 10px; font-size: 15px;"
                                        data-toggle="modal" data-target="#commentModal">Add Response</button>
                                        <a href="{{ route('topic.show', Crypt::encrypt($topic->id))}}" style="color: #C794B0; margin-left: 72%; margin-top: -50px">see all response</a>
                                </div>
                                    <hr>
                                    <div class="forum-post">
                                        <img style="height :60px; " src="img/Marettha.png" alt="">
                                        <h5 style="margin-left: 70px; color:#7E6F6F; margin-top: -40px; font-size: 17px;">Marettha Angelina</h5>
                                        <div class="py-4">
                                            <h5 style="color:#000">You can get free icons from freepik or flaticon</h5>
                                        </div>
                                </div>

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
