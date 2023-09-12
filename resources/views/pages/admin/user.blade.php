@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table User</h6>
            </div>
            <div class="card-body position-relative">
                <div class="row">
                    <div class="col-3">
                        <a href="{{ route('admin.user.create') }}" class="btn btn-outline-teal mb-3">Create</a>

                    </div>
                    <div class=" mb-3 col-6 offset-3">
                        <form method="GET"
                        class="d-none d-sm-inline-block form-inline navbar-search float-end w-100">
                        <div class="input-group">
                            <input name="keyword" type="text" class="form-control bg-light border-0 small search-user"
                                placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
                <div id="load-icon" class="spinner position-absolute start-50 top-50" style="display: none"></div>
                <div class="table-responsive p-3" id="content-user">

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        var url = "{{ route('admin.user.index') }}"

        $('.search-user').keyup(function (e) { 
            e.preventDefault()
            var search = $(this).val();
            getUser(url+'?search='+ search)
            
        });

        getUser(url)

        function getUser(url) {
            $.ajax({
                type: "GET",
                url: url,
                cache: false,
                beforeSend: function() {
                    $('#load-icon').show();
                },
                success: function(response) {
                    $('#load-icon').hide();
                    $('#content-user').html(response);
                    $('ul.pagination a').click(function(e) {
                        e.preventDefault();
                        var href = $(this).attr('href');
                        getUser(href)
                    });
                }
            });

        }

        function deleteUser(e, id) {
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
                        url: "{{ url('admin/user') }}/" + id,
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
                            getUser(url)
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
    </script>
@endsection
