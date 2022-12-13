@if (Session::has('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Registro exitoso',
        text: "{{ Session::get('success') }}",
    })
</script>
@endif

@if (Session::has('err'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Ups...',
        text: "{{ Session::get('err') }}",
    })
</script>
@endif

@if (count($errors))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <span class="alert-icon"><i class="fas fa-exclamation-circle"></i> ERROR </span>
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-white">{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (Session::has('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Ups...',
        text: "{{ Session::get('error') }}",
    })
</script>
@endif
