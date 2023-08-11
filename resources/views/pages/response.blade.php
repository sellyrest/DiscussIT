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
                                    <img style="height :60px; " src="img/fely.png" alt="">
                                    <h5 style="margin-left: 70px; color:#000; margin-top: -50px; font-size: 17px;">Fely Calista</h5>
                                    <p style="margin-left: 70px; font-size: 13px;">1h ago</p>
                                    <h4 style="color: #DDC3DF;">#ui/ux</h4>
                                    <p style="color:#000; font-size: 15px;">Hey guys! i'm looking for free icons, any recomendations?</p>
                                    <button class="p-2 justify-content-center my-3"style="text-decoration: none; background-color: #DDC3DF; color: #fff; border-color:#fff ;border-radius: 10px; font-size: 15px;"
                                    data-toggle="modal" data-target="#commentModal">Add Response</button>
                                    <a href="/home" style="color: #87AEB7; margin-left: 72%; margin-top: -50px">< back</a>
                                    <hr></hr>
                                    <div class="forum-post">
                                        <img style="height :60px; " src="img/Marettha.png" alt="">
                                        <h5 style="margin-left: 70px; color:#7E6F6F; margin-top: -40px; font-size: 17px;">Marettha Angelina</h5>
                                        <div class="py-4">
                                            <h7 style="color:#000">You can get free icons from freepik or flaticon</h7>
                                            <div class="py-4">
                                                <button class="like-button">Like</button>
                                                <button class="save-button">Save</button>
                                                <button class="reply-button">Reply</button>
                                            </div>
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
