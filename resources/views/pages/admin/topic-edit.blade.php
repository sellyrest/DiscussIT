@extends('layouts.main')
@section('content')
    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Topic</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.topic.update', $topic->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="exampleFormControlInput1">Title</label>
                        <input class="form-control form-control-solid @error('title') is-invalid @enderror"
                            id="title" name="title" value="{{ $topic->title }}" required autocomplete="title"
                            type="text" placeholder="title">
                    </div>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="mb-3">
                        <label for="exampleFormControlInput1">Content</label>
                        <input class="form-control form-control-solid @error('Content') is-invalid @enderror"
                            id="content" name="content" value="{{ $topic->content }}" required autocomplete="content"
                            type="text" placeholder="content">
                    </div>
                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="mb-3">
                        <div class="custom-file">
                            <input type="file" name="image" id="" class="custom-file-input" accept="image/*">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                          </div>
                    </div>
                    @error('image')
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
