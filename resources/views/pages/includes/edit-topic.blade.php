<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Topic</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
        <div class="modal-body">
            <form id="form-edit-topic" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <label for="thread-title">Thread Title:</label>
                        <input type="text" id="thread-title" name="title" value="{{ $topic->title }}" required>
                        <label for="thread-content">Thread Content:</label>
                        <textarea id="thread-content" name="content" rows="8" required>{{ $topic->content }}</textarea>
                        <label for="status">Status</label>
                        <div class="form-check">
                            <input class="form-check-input" id="flexRadioDefault1" type="radio" name="status" @if($topic->status == 1) checked @endif>

                            <label class="form-check-label" for="flexRadioDefault1">Publish</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" id="flexRadioDefault2" type="radio" name="status" @if($topic->status == 2) checked @endif>
                            <label class="form-check-label" for="flexRadioDefault2">Draft</label>
                        </div>
                        <label for="thread-image"></label>
                        <input type="file" name="image" id="" accept="image/*">
                        
                        <img src="{{asset('img/'.$topic->image)}}" class="mt-4 ms-2" alt="" width="200px">
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            <button class="btn btn-primary" type="button" onclick="saveUpdate({{$topic->id}})">Save changes</button>
        </div>
    </div>
</div>