<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DiscussIT-Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .bg-register{
            background-color: white;
        }
        .btn-register{
            background-color: #3B4A54;
            color: white;
            border-radius: 20%;
        }
        .logo-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .logo-container img {
            width: 100px;
            height: auto;
        }
        .form-container {
            padding: 20px;
        }
    </style>


</head>

<body class="bg-register">

    <div class="container-fluid">
        <div class="row">

            <!-- Bagian kiri fullscreen -->
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="d-flex align-items-center justify-content-center h-100">
                    <div class="o-hidden w-100">
                        <div class="form-container">
                            <div class="logo-container">
                                <img src="./img/logo-login.png" class="img-fluid" alt="Logo">
                            </div>
                            <h1 class="h4 text-gray-900 mb-4 text-center">Create an Account!</h1>
                            <form class="user" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <input id="username" type="text" class="form-control form-control-user @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Username">
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="fullname" type="text" class="form-control form-control-user @error('fullname') is-invalid @enderror" name="fullname" value="{{ old('fullname') }}" required autocomplete="fullname" autofocus placeholder="Full Name">
                                    @error('fullname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="Nomor" type="number" class="form-control form-control-user @error('nomor') is-invalid @enderror" name="nomor" value="{{ old('nomor') }}" required autocomplete="nomor" placeholder="Nomor Telepon">
                                    @error('nomor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-register btn-user btn-block">
                                    Register Account
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Bagian kanan fullscreen -->
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="d-flex align-items-center justify-content-center h-100">
                    <img src="./img/login-img.png" class="img-fluid" alt="Gambar" style="max-width: 70%;">
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>


</html>
