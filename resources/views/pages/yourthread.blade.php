@extends('layouts.main')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <section class="thread-form">
                    <h2>Create a New Thread</h2>
                    <form action="{{ route('topic.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="thread-title">Thread Title:</label>
                        <input type="text" id="thread-title" name="title" class="form-control" required>
                        <label for="thread-content">Thread Content:</label>
                        <textarea id="thread-content" name="content" rows="8" class="form-control" required></textarea>
                        <label for="thread-image"></label>
                        <div class="custom-file">
                            <input type="file" name="image" id="" class="custom-file-input" accept="image/*">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                          </div>
                          <label for="Category">
                            Category
                          </label>
                          <select class="form-control form-control-solid mb-3" name="kategori_id" id="kategori_id">
                            <option value="0">Select Category</option>
                            @foreach ($category as $item)
                                
                            <option value="{{ $item->id }}">
                                {{ $item->name }}
                            </option>
                            @endforeach
                          </select>
                        <button class="btn-thread" type="submit">Create Thread</button>
                    </form>
                </section>
            </div>
        </div>
    @endsection
