@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div id="content" class="content content-full-width">
                        <!-- begin profile -->
                        <div class="profile">
                            <div class="profile-header">
                                <!-- BEGIN profile-header-cover -->
                                <div class="profile-header-cover"></div>
                                <!-- END profile-header-cover -->
                                <!-- BEGIN profile-header-content -->
                                <div class="profile-header-content">
                                    <!-- BEGIN profile-header-img -->
                                    <div class="profile-header-img">
                                        <img class="img-fluid"
                                            src="{{ $user->foto ? asset('img/profile/' . $user->foto) : asset('img/profile/default_fp.jpg') }}"
                                            alt="">
                                    </div>
                                    <!-- END profile-header-img -->
                                    <!-- BEGIN profile-header-info -->
                                    <div class="profile-header-info">
                                        <h4 class="m-t-10 m-b-5">{{ $user->fullname }}</h4>
                                        <p class="m-b-10">{{ $user->username }} || {{ $user->email }} ||
                                            {{ $user->nomor_telpon }} || {{$followers}} Followers</p>
                                        @csrf
                                        <button class="p-2 btn-follow @if (user_follows($logged_user_id, $profile_id)) active @endif"data-user="{{ $profile_id }} "data-follower="{{ $logged_user_id }}">
                                         @if (!user_follows($logged_user_id, $profile_id))
                                            Follow
                                        @else
                                            Unfollow
                                            @endif
                                        </button>
                                    </div>

                                    <!-- END profile-header-info -->
                                </div>
                                <!-- END profile-header-content -->
                                <!-- BEGIN profile-header-tab -->
                                <ul class="profile-header-tab nav nav-tabs">
                                    <li class="nav-item"><a
                                            href="https://www.bootdey.com/snippets/view/bs4-profile-friend-list"
                                            target="__blank" class="nav-link_ active show">Threads</a></li>
                                </ul>
                                <!-- END profile-header-tab -->
                            </div>
                        </div>
                        <!-- end profile -->
                        <!-- begin profile-content -->
                        <div class="profile-content">
                            <!-- begin tab-content -->
                            <div class="tab-content p-0">
                                <!-- begin #profile-post tab -->
                                <div class="tab-pane fade active show" id="profile-post">
                                    <!-- begin timeline -->
                                    <ul class="timeline">
                                        @foreach ($user->topik()->orderByDESC('updated_at')->get() as $item)
                                            <li>
                                                <div class="timeline-time">
                                                    <span
                                                        class="date">{{ date('l', strtotime($item->updated_at)) }}</span>
                                                    <span
                                                        class="time">{{ date('H:i', strtotime($item->updated_at)) }}</span>
                                                </div>
                                                <div class="timeline-icon">
                                                    <a href="javascript:;">&nbsp;</a>
                                                </div>
                                                <!-- end timeline-icon -->
                                                <!-- begin timeline-body -->
                                                <div class="timeline-body">
                                                    <div class="timeline-header">
                                                        <span class="userimage"><img
                                                                src="{{ $item->user->foto ? asset('img/profile/' . $item->user->foto) : asset('img/profile/default_fp.jpg') }}"
                                                                alt=""></span>
                                                        <span class="username"><a
                                                                href="{{ url('profile/' . $item->user->username) }}"
                                                                class="text-decoration-none">{{ $item->user->username }}</a>
                                                            <small></small></span>
                                                    </div>
                                                    <div class="timeline-content">
                                                        <a href="{{ route('topic.show', Crypt::encrypt($item->id)) }}">
                                                            <h4 class="title">{{ $item->title }}</h4>
                                                        </a>
                                                        <p>{{ $item->content }}</p>
                                                        <div class="text-center">
                                                            <img src="{{ asset('img/' . $item->image) }}" alt=""
                                                                class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end timeline-body -->
                                            </li>
                                        @endforeach
                                    </ul>
                                    <!-- end timeline -->
                                </div>
                                <!-- end #profile-post tab -->
                            </div>
                            <!-- end tab-content -->
                        </div>
                        <!-- end profile-content -->

                    </div>
                </div>
            </div>

        </div>
    @endsection
    @section('styles')
        <link rel="stylesheet" href="{{ URL::asset('css/profile.css') }}">
    @endsection
    @section('scripts')
        <script>
            $('body').on('click', '.btn-follow', function(e) {
                e.preventDefault();
                var button = $(this)
                var user_id = $(this).data('user');
                var follower_id = $(this).data('follower')
                $.ajax({
                    type: "POST",
                    url: "{{ route('followers.store') }}",
                    data: {
                        user_id: user_id,
                        follower_id: follower_id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    cache: false,
                    success: function(response) {
                        console.log(response);
                        if (response.status == 0) {
                            button.removeClass('active');
                            button.html('Follow');
                        } else {
                            button.addClass('active');
                            button.html('Unfollow');


                        }
                    }
                });
            })
        </script>
    @endsection
