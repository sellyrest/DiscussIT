@extends('layouts.main')
@section('content')
    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="exampleFormControlInput1">Fullname</label>
                        <input class="form-control form-control-solid @error('fullname') is-invalid @enderror"
                            id="fullname" name="fullname" value="{{ $user->fullname }}" required autocomplete="fullname"
                            type="text" placeholder="full name">
                    </div>
                    @error('fullname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="mb-3">
                        <label for="exampleFormControlInput1">Username</label>
                        <input class="form-control form-control-solid @error('username') is-invalid @enderror"
                            id="username" name="username" value="{{ $user->username }}" required autocomplete="username"
                            type="text" placeholder="user name">
                    </div>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="mb-3">
                        <label for="exampleFormControlInput1">Email</label>
                        <input class="form-control form-control-solid @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ $user->email }}" required autocomplete="email" type="email"
                            placeholder="name@example.com">
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="mb-3">
                        <label for="exampleFormControlInput1">Password</label>
                        <input class="form-control form-control-solid @error('password') is-invalid @enderror" id="password" name="password"  type="text"
                            placeholder="******">
                            <span class="pw-empty">*Empty if not changed</span>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="mb-3">
                        <label for="exampleFormControlInput1">Nomor Hp</label>
                        <input class="form-control form-control-solid @error('nomor_telpon') is-invalid @enderror"
                            id="nomor_telpon" name="nomor_telpon" value="{{ $user->nomor_telpon }}" required autocomplete="nomor"
                            type="tel" placeholder="08xxxxxx">
                    </div>
                    @error('nomor_telpon')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror



                    <div class="mb-3">
                        <label for="exampleFormControlSelect1">Role</label>
                        <select class="form-control form-control-solid @error('role') is-invalid @enderror" id="role"
                            name="role" value="{{ $user->role }}" required autocomplete="role">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <button class="btn btn-outline-teal mb-3" type="submit">Update</button>
                    <a href="{{ route('admin.user.index') }}" class="btn btn-outline-orange mb-3">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
