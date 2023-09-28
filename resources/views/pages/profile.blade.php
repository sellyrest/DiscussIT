@extends('layouts.main')
@section('content')
    <form action="{{ route('profile', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Profile Picture</div>
                        <div class="card-body text-center">
                            <!-- Profile picture image-->
                            <img class="img-account-profile rounded-circle mb-2" id="blah"
                                src="{{ Auth::user()->foto ? asset('img/profile/' . Auth::user()->foto) : asset('img/profile/default_fp.jpg') }}"
                                alt="">
                            <!-- Profile picture help block-->
                            <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                            <!-- Profile picture upload button-->
                            <div class="custom-file">
                                <input type="file" name="foto" id="file_upload" class="custom-file-input @error('foto') is-invalid @enderror"
                                    accept="image/*">
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Account Details</div>
                        <div class="card-body">
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Username (how your name will appear to other
                                    users on the site)</label>
                                <input class="form-control @error('username') is-invalid @enderror" id="inputUsername" type="text"
                                    placeholder="Enter your username" name="username" value="{{ Auth::user()->username }}"
                                    required>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="inputfullname">Fullname (how your name will appear to other
                                    users on the site)</label>
                                <input class="form-control @error('fullname') is-invalid @enderror" id="inputFullname" type="text"
                                    placeholder="Enter your fullname" name="fullname" value="{{ Auth::user()->fullname }}"
                                    required>
                                @error('fullname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                <input class="form-control @error('email') is-invalid @enderror" id="inputEmailAddress" type="email"
                                    placeholder="Enter your email address" name="email" value="{{ Auth::user()->email }}"
                                    required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="inputPhone">Phone number</label>
                                <input class="form-control @error('nomor_telpon') is-invalid @enderror" id="inputPhone" type="tel"
                                    placeholder="Enter your phone number" name="nomor_telpon"
                                    value="{{ Auth::user()->nomor_telpon }}" required>
                                @error('nomor_telpon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="inputPassword">Password</label>
                                <input class="form-control @error('password') is-invalid @enderror" id="inputPassword" type="text"
                                    placeholder="Enter your password" name="password">
                                <small>*if you don't want to be replaced, skip</small>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Save changes button-->
                            <button class="btn btn-primary" type="submit">Save changes</button>
                            <a href="{{ url('/') }}" class="btn btn-purple">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#file_upload").change(function() {
            readURL(this);
        });
        
    </script>
@endsection
