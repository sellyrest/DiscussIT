@extends('layouts.main')
@section('styles')
    <style>
        .name {
            margin-left: 70px; color:#000; margin-top: -50px; font-size: 17px;
        }
        .time {
            margin-left: 70px; font-size: 13px;
        }
        .role {
            color: #DDC3DF;
        }
        .content {
            color:#000; font-size: 15px;
        }

    </style>
@endsection
@section('content')

    
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12 text-center" id="load-icon" style="display: none">
            <img src="{{asset('img/load.gif')}}" alt="" width="50px" >
        </div>
        <div class="col-xl-8 col-lg-5" id="content-topic">          
            
            
        </div>
        <div class="col-xl-4 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-body text-center card-profile">
                    <h3>Account</h3>
                    <hr>
                    </hr>
                    <div class="text-center pt-4 pb-2">
                        <img src="{{Auth::user()->foto ? asset('img/profile/'.Auth::user()->foto) : asset('img/profile/default_fp.jpg') }}" alt="">
                        <div class="py-3">
                            <h5>{{Auth::user()->name}}</h5>
                        </div>
                        <div class="contact">
                            <h5>contact</h5>
                        </div>
                        <label>Email: </label>
                        <a href="mailto:{{Auth::user()->email}}">
                            {{Auth::user()->email}}
                        </a><br />
                        <label>Phone: </label>
                        <a href="tel:+6288983879406">
                            088983879406
                        </a> <br />
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-body card-profile">
                    <h3 style="text-center">Attendence</h3>
                    <div class="text-left pt-1 pb-2">
                        <hr>
                        </hr>
                        <div class="py-3">
                            <img style="height :60px; " src="img/Marettha.png" alt="">
                            <h5 style="margin-left: 70px; color:#7E6F6F; margin-top: -40px; font-size: 17px;">Marettha
                                Angelina</h5>
                        </div>
                        <div class="py-3">
                            <img style="height :60px; " src="img/alex.png" alt="">
                            <h5 style="margin-left: 70px; color:#7E6F6F; margin-top: -40px; font-size: 17px;">Alexxandra
                                Pasha</h5>
                        </div>
                        <div class="py-3">
                            <img style="height :60px; " src="img/leonna.png" alt="">
                            <h5 style="margin-left: 70px; color:#7E6F6F; margin-top: -40px; font-size: 17px;">Leonna
                                Lea</h5>
                        </div>
                        <div class="py-3">
                            <img style="height :60px; " src="img/chella.png" alt="">
                            <h5 style="margin-left: 70px; color:#7E6F6F; margin-top: -40px; font-size: 17px;">Christy
                                Alveria</h5>
                        </div>
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
        var url_topic = "{{route('data.topic')}}"
        getTopic(url_topic)

        function getTopic(url) {
            $.ajax({
                type: "GET",
                url: url,
                cache: false,
                beforeSend: function () {
                    $('#load-icon').show();
                },
                success: function (response) {
                    $('#load-icon').hide();
                    $('#content-topic').html(response);
                }
            });
            
        }
    </script>
@endsection