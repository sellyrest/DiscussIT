@extends('layouts.main')
@section('content')
    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Create Topic</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.topic.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="mb-3">
                        <label for="exampleFormControlInput1">Title</label>
                        <input class="form-control form-control-solid @error('title') is-invalid @enderror"
                            id="title" name="title" value="{{ old('title') }}" required autocomplete="title"
                            type="text" placeholder="full name">
                    </div>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="mb-3">
                        <label for="exampleFormControlInput1">Content</label>
                        <input class="form-control form-control-solid @error('content') is-invalid @enderror"
                            id="content" name="content" value="{{ old('content') }}" required autocomplete="content"
                            type="text" placeholder="user name">
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
                    <select class="form-control form-control-solid mb-3" name="kategori_id" id="">
                        <option value="0">Select Category</option>
                        @foreach ($category as $item)
                            
                        <option value="{{ $item->id }}">
                            {{ $item->name }}
                        </option>
                        @endforeach
                      </select>
                    <button class="btn btn-outline-teal mb-3" type="submit">Create</button>
                    <a href="{{ route('admin.topic.index') }}" class="btn btn-outline-orange mb-3">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
