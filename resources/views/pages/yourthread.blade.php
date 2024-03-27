@extends('layouts.main')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-5 mb-4">
                <div class="card">
                    <div class="card-body">
                        <section class="thread-form">
                            <h2 class="card-title">Create a New Thread</h2>
                            <form action="{{ route('topic.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="thread-title" class="form-label">Thread Title:</label>
                                    <input type="text" id="thread-title" name="title" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="thread-content" class="form-label">Thread Content:</label>
                                    <textarea id="thread-content" name="content" rows="8" class="form-control" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="thread-image" class="form-label">Upload Image:</label>
                                    <div class="custom-file">
                                        <input type="file" name="image" id="thread-image" class="custom-file-input" accept="image/*">
                                        <label class="custom-file-label" for="thread-image">Choose file</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="category" class="form-label">Category:</label>
                                    <select class="form-control" name="kategori_id" id="kategori_id">
                                        <option value="0">Select Category</option>
                                        @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button class="btn btn-primary" type="submit">Create Thread</button>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
