<div class="card-comment">
    <div class="row">
        <div class="col-12">
            @foreach ($response as $item)
                <div class="media my-4">
                    <img class="mr-3 rounded-circle" alt=""
                        src="{{ $item->user->foto ? asset('img/profile/' . $item->user->foto) : asset('img/profile/default_fp.jpg') }}"
                        alt="" />
                    <div class="media-body">
                        <div class="row">
                            <div class="col-8 d-flex">
                                <h5>{{ $item->user->fullname }} &nbsp;</h5>
                                <span> -
                                    {{ date('d F Y H:i:s', strtotime($item->created_at)) }}</span>
                            </div>

                            <div class="col-4">

                                <div class="float-right reply">

                                    <a data-toggle="collapse" href="#collapseExample{{$item->id}}" role="button" aria-expanded="false" aria-controls="collapseExample"><span><i class="fa fa-reply"></i> reply</span></a>

                                </div>

                            </div>

                            
                        </div>

                        {{ $item->content }}
                        @foreach ( $item->children() as $children)
                        <div class="media my-4">
                            <img class="rounded-circle" alt=""
                                    src="{{ $item->user->foto ? asset('img/profile/' . $item->user->foto) : asset('img/profile/default_fp.jpg') }}"
                                    alt="" />
                                    <div class="media-body">
                                        <div class="row">
                                            <div class="col-8 d-flex">
                                                <h5>{{ $children->user->fullname }} &nbsp;</h5>
                                                <span>
                                                    {{ date('d F Y H:i:s', strtotime($children->created_at)) }}</span>
                                            </div>
                                            <div class="col-4">
                                                <div class="float-right reply">
                                                    <a href="#"><span><i class="fa fa-reply"></i>reply</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{ $children->content }}
                        @endforeach
                        <div class="collapse" id="collapseExample{{$item->id}}">
                            <div class="card">
                                <div class="modal-content">
                                    <form id="addReply" method="post">
                                        @csrf
                                        {{-- <div class="modal-header">
                                            
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div> --}}
                                        <div class="modal-body">
                                            {{-- <h5 class="modal-title" >Respons</h5> --}}
                                            <div class="form-group">
                                                {{-- <label for="commentTitle">Judul</label>
                                                <input type="text" class="form-control" id="commentTitle"
                                                    name="commentTitle" required> --}}
                                                    <input type="hidden" class="form-control" id="topic_id"
                                                        name="topic_id">
                                                    <input type="hidden" class="form-control" id="user_id"
                                                        name="user_id" value="{{ Auth::user()->id }}">
                                                    <input type="hidden" name="parent_id" id="parent_id" value="0">                                   
                                                </div>
                                            <div class="form-group">
                                                <h5 class="modal-title" id="commentModalLabel">Respons</h5>
                                                <textarea class="form-control" id="commentContent" name="commentContent" rows="5" required></textarea>
                                                <span id="error-content" class="badge badge-danger"></span>
                                            </div>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Kirim</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                          </div>
                    </div>
                </div>
            @endforeach
            {{ $response->appends($_GET)->links() }}
            
        </div>
    </div>
</div>
