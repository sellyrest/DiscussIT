@if (Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{Session::get('success')}}
</div>
@endif

@if (Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{Session::get('error')}}
</div>
@endif