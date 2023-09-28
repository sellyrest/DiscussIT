@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Table Topic Category</h6>
        </div>
        <div class="card-body position-relative">
            <div class="row">
                <div class="col-4">
                    <a class="btn btn-primary mb-3 btn-create"  href="javascript:void(0)" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Link with href
                      </a>
                    <div class="collapse" id="collapseExample">
                      <div class="card card-body">
                        <form id="formAddCategory" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" name="name" id="name" required>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-purple" type="submit">Save</button>
                            </div>
                        </form>
                      </div>
                    </div>

                </div>
                <div class=" mb-3 col-6 offset-2">
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
            <div class="table-responsive p-3" id="content-topicCategory">

            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="formEditCategory" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="hidden" name="id" id="editId">
                    <input class="form-control" type="text" name="name" id="editName" required>
                </div>
                <div class="mb-3">
                    <button type="submit">Save</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
    <script>
        var url = "{{ route('admin.topic-category.index') }}"

        $('.search-topikKategory').keyup(function (e) { 
            e.preventDefault()
            var search = $(this).val();
            getTopikKategori(url+'?search='+ search)
            
        });

        getTopikKategori(url)

        function getTopikKategori(url) {
            $.ajax({
                type: "GET",
                url: url,
                cache: false,
                beforeSend: function() {
                    $('#load-icon').show();
                },
                success: function(response) {
                    $('#load-icon').hide();
                    $('#content-topicCategory').html(response);
                    $('ul.pagination a').click(function(e) {
                        e.preventDefault();
                        var href = $(this).attr('href');
                        getTopikKategori(href)
                    });
                }
            });

        }

        function deleteTopikKategori(e, id) {
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
                            getTopikKategori(url)
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
        $('.btn-create').click(function (e) { 
            e.preventDefault();
            $('#collapseExample').fadeToggle()
        });
        $('#formAddCategory').submit(function (e) { 
            e.preventDefault();
            var data = new FormData($(this)[0])
            $.ajax({
                type: "POST",
                url: "{{ route('admin.topic-category.store') }}",
                data: data,
                contentType: false,
                processData: false,
                cache: false,
                success: function (response) {
                    getTopikKategori(url)
                    $('#collapseExample').fadeToggle()
                    $('#formAddCategory').trigger('reset');
                }
            });
        });
        $('body').on('click','.btn-edit', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: `{{url('admin/topic-category/${id}/edit')}}`,
                cache: false,
                success: function (response) {
                    $('#editName').val(response.name);
                    $('#editId').val(response.id);
                    $('#exampleModal').modal('show');
                }
            });
        });

        $('#formEditCategory').submit(function (e) { 
            e.preventDefault();
            var data = new FormData($(this)[0])
            var id = data.get('id')
            $.ajax({
                type: "POST",
                url: `{{url('admin/topic-category/${id}')}}`,
                data: data,
                contentType: false,
                processData: false,
                cache: false,
                success: function (response) {
                    getTopikKategori(url)
                    $('#exampleModal').modal('hide');
                    $('#formEditCategory').trigger('reset');
                }
            });
        });
    </script>
@endsection