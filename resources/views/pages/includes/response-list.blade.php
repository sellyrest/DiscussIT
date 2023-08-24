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
                                                    <a href="#"><span><i class="fa fa-reply"></i> reply</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{ $children->content }}
                        @endforeach
                        <div class="collapse" id="collapseExample{{$item->id}}">
                            <div class="card card-body">
                              Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                            </div>
                          </div>
                    </div>
                </div>
            @endforeach
            {{ $response->appends($_GET)->links() }}
        </div>
    </div>
</div>
