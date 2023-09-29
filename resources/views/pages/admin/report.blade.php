@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Table Report</h6>
        </div>
        <div class="card-body position-relative">
            <div class="row">
                <div class="col-3">
                    <div class="mb-3">
                        <label for="exampleFormControlSelect1">Report Select</label>
                        <select class="form-control" name="report_select" id="report">
                            <option value="users">User</option>
                            <option value="topiks">Topic</option>
                            <option value="responses">Response</option>
                        </select>
                    </div>
                </div>
                <div class=" mb-3 col-6 offset-3">
                    <form method="GET"
                    class="d-none d-sm-inline-block form-inline navbar-search float-end w-100">
                    <div class="input-group-lg float-end">
                        <input name="keyword" type="text" class="form-control bg-light border-0 small search-topic"
                            placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        </div>
                    </div>
                </form>
                </div>
            </div>
            <div id="load-icon" class="spinner position-absolute start-50 top-50" style="display: none"></div>
            <div class="table-responsive p-3" id="content-report">

            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        var url = "{{ route('admin.report.index') }}"
        var report = $('#report').val();

        $('.search-report').keyup(function (e) { 
            e.preventDefault()
            var search = $(this).val();
            getReport(url+'?search='+ search)
            
        });

        $('#report').change(function (e) { 
        e.preventDefault();
        report = $(this).val();
        getReport(url)
    });

        getReport(url)

        function getReport(url) {
        $.ajax({
            type: "GET",
            url: url,
            data: {
                report: report
            },
            cache: false,
            beforeSend: function () {
                $('#load-icon').show();
            },
            success: function (response) {
                $('#load-icon').hide();  
                $('#content-report').html(response); 
                $('ul.pagination a').click(function (e) { 
                e.preventDefault();
                var href = $(this).attr('href');
                getReport(href)
                });
            }
        });
    }

        function deleteReport(e, id) {
            e.preventDefault()
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ url('admin/report') }}/" + id,
                        cache: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            if (response.status == true) {
                                swalWithBootstrapButtons.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                            } else {
                                swalWithBootstrapButtons.fire(
                                    'Error!',
                                    'This user owns a topic so it cant be deleted',
                                    'error'
                                )
                            }
                            getReport(url)
                        }
                    });
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your imaginary file is safe',
                        'error'
                    )
                }
            })
            // var result = confirm('Apakah Anda Yakin Menghapus Topic  '+title+' ? ')
            // if (result) {
            //     
            // } else {
            //     alert('Data Aman!')
            // }
        }

        function blockResponse(e, id, table_name, status) {
        e.preventDefault()
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success m-1',
            cancelButton: 'btn btn-danger m-1'
        },
        buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, block it!',
        cancelButtonText: 'Cancel!',
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "PUT",
                url: "{{ url('admin/report') }}/"+id,
                data: {
                    table_name,
                    status
                },
                cache: false,
                headers: {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.status == true) {
                        swalWithBootstrapButtons.fire(
                        'Blocked!',
                        'Report has been blocked.',
                        'success'
                        )   
                    } else {
                        swalWithBootstrapButtons.fire(
                        'Error!',
                        'This report cant be blocked',
                        'error'
                        )
                    }
                    getReport(url)
                }
            });
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe',
            'error'
            )
        }
        })
    }

    function unblockResponse(e, id, table_name, status) {
        e.preventDefault()
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success m-1',
            cancelButton: 'btn btn-danger m-1'
        },
        buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You will be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, unblock it!',
        cancelButtonText: 'Cancel!',
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "PUT",
                url: "{{ url('admin/report') }}/"+id,
                data: {
                    table_name,
                    status
                },
                cache: false,
                headers: {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.status == true) {
                        swalWithBootstrapButtons.fire(
                        'unblocked!',
                        'Report has been unblocked.',
                        'success'
                        )   
                    } else {
                        swalWithBootstrapButtons.fire(
                        'Error!',
                        'This report cant be unblocked',
                        'error'
                        )
                    }
                    getReport(url)
                }
            });
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe',
            'error'
            )
        }
        })
    }
    </script>
@endsection