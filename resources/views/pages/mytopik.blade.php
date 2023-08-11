@extends('layouts.main')
@section('styles')
    <style>
        .name {
            margin-left: 70px; color:#000; margin-top: -50px; font-size: 17px;
        }
        .time {
            margin-left: 70px; font-size: 13px;
        }
        .role {
            color: #DDC3DF;
        }
        .content {
            color:#000; font-size: 15px;
        }

    </style>
@endsection
@section('content')

    
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12 text-center" id="load-icon" style="display: none">
            <img src="{{asset('img/load.gif')}}" alt="" width="50px" >
        </div>
        <div class="col-xl-8 col-lg-5" id="content-topic">
            
            
            
        </div>
    </div>






</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
</div>
<!-- End of Content Wrapper -->
@endsection
@section('scripts')
    <script>
        var url = "{{ route('topic.index') }}"
        getTopic(url)

        function getTopic(url) {
            $.ajax({
                type: "GET",
                url: url,
                cache: false,
                beforeSend: function () {
                    $('#load-icon').show();
                },
                success: function (response) {
                    $('#load-icon').hide();
                    $('#content-topic').html(response);
                }
            });
            
        }

        function modalEdit(id) {
            $.ajax({
                type: "GET",
                url: `{{url('topic/${id}/edit')}}`,
                cache: false,
                success: function (response) {
                    $('#exampleModal').html(response);
                    $('#exampleModal').modal('show');
                }
            });
        }
    </script>
@endsection