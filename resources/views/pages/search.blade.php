@extends('layouts.main')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center" id="load-icon" style="display: none">
                <img src="{{ asset('img/load.gif') }}" alt="" width="50px">
            </div>
            <div class="col-12" id="content-topic">
                <div class="card">
                    
                    <div class="container bootstrap snippets bootdey">
                        <div class="header">
                            <h3 class="text-muted prj-name">
                                <span class="fa fa-users fa-2x"></span>
                                Users
                            </h3>
                        </div>

                        <div class="jumbotron" style="min-height:100px;height:auto;">
                            <ul class="list-group">
                                @foreach ($user as $item)
                                    
                                <li class="list-group-item user-item text-left">
                                    <img class="img-circle img-user img-thumbnail "
                                    src="{{ $item->foto ? asset('img/profile/' . $item->foto) : asset('img/profile/default_fp.jpg') }}"
                                    alt="">
                                    <h3>
                                        <a href="{{ url('profile/'.$item->username) }}">{{ $item->fullname }}</a><br>
                                    </h3>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
                &nbsp;
                <div class="infinity-scroll">
                    @foreach ($topic as $item)
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold role">{{ $item->kategori->name }}</h6>
                            </div>
                            <div class="card-body">
                                <img style="height :60px; " class="rounded-circle"
                                    src="{{ $item->user->foto ? asset('img/profile/' . $item->user->foto) : asset('img/profile/default_fp.jpg') }}"
                                    alt="">
                                <h5 class="name">{{ $item->user->fullname }}</h5>
                                <p class="time">{{ date('d F Y', strtotime($item->updated_at)) }}</p>
                                <h4 class="title">{{ $item->title }}</h4>
                                <p class="content">{{ $item->content }}</p>
                                <div class="text-center">
                                    <img src="{{ asset('img/' . $item->image) }}" alt="" class="img-fluid">
                                </div>
                                <a href="{{ route('topic.show', Crypt::encrypt($item->id)) }}"
                                    class="btn-allrespon float-right mb-3">see all response</a>
                            </div>
                    @endforeach
                    {{ $topic->appends($_GET)->links() }}
                </div>

            </div>
        </div>
    </div>
    <!-- End of Content Wrapper -->
@endsection
@section('scripts')
    <script>
        $(function() {
            $('ul.pagination').hide();
            $('.infinity-scroll').jscroll({
                autoTrigger: true,
                loadingHtml: '<img src="/img/load.gif" alt="" width="50px">',
                padding: 0,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.infinity-scroll',
                callback: function() {
                    $('ul.pagination').remove();
                }

            })
        });
    </script>
@endsection
@section('styles')
    <link href="https://getbootstrap.com/examples/jumbotron-narrow/jumbotron-narrow.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    <link rel="stylesheet"  href="{{ URL::asset('css/search.css')}}">
@endsection
