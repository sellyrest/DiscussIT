@foreach ($topic as $item)
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold role">UI/UX Designer</h6>
        </div>
        <div class="card-body">
            <img style="height :60px; "
                src="{{ $item->user->foto ? asset('img/profile/' . $item->user->foto) : asset('img/profile/default_fp.jpg') }}"
                alt="">
            <h5 class="name">{{ $item->user->name }}</h5>
            <p class="time">{{ date('d F Y', strtotime($item->updated_at)) }}</p>
            <h4 class="title">{{ $item->title }}</h4>
            <p class="content">{{ $item->content }}</p>
            <div class="text-center">
                <img src="{{ asset('img/'.$item->image) }}" alt="" class="img-fluid">
            </div>

            <button
                class="p-2 justify-content-center my-3"style="text-decoration: none; background-color: #8A7EA4 ; color: #fff; border-color:#fff ;border-radius: 10px; font-size: 15px;"
                data-toggle="modal" data-target="#commentModal">Add Response</button>
            <a href="/rspn" style="color: #C794B0; margin-left: 72%; margin-top: -50px">see all response</a>
        </div>
        <div class="card-footer">
            <button onclick="modalEdit({{$item->id}});" class="btn-edit">Edit</button>
            <button onclick="deleteTopic(event, {{$item->id}}, '{{$item->title}}')" class="btn-delete">Delete</button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="commentModalLabel">Respons</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="commentTitle">Judul</label>
                            <input type="text" class="form-control" id="commentTitle" name="commentTitle" required>
                        </div>
                        <div class="form-group">
                            Respons</label>
                            <textarea class="form-control" id="commentContent" name="commentContent" rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary">Kirim</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
