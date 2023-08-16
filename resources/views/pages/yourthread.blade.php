@extends('layouts.main')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8 col-lg-5">
                <section class="thread-form">
                    <h2>Create a New Thread</h2>
                    <form action="{{ route('topic.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="thread-title">Thread Title:</label>
                        <input type="text" id="thread-title" name="title" class="form-control" required>
                        <label for="thread-content">Thread Content:</label>
                        <textarea id="thread-content" name="content" rows="8" class="form-control" required></textarea>
                        <label for="thread-image"></label>
                        <input type="file" name="image" id="" class="form-control" accept="image/*">
                        <!-- Add any additional fields as needed (e.g., tags, categories, etc.) -->
                        <button type="submit">Create Thread</button>
                    </form>
                </section>
            </div>
        </div>
    @endsection
