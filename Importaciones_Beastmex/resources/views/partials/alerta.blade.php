@if(session()->has('Confirmacion'))
<script>
    Swal.fire(
        'Todo correcto',
        '{{session('Confirmacion')}}',
        'success'
    )
</script>
@endif

@if(session()->has('success'))
<script>
    Swal.fire(
        'Todo correcto',
        '{{session('success')}}',
        'success'
    )
</script>
@endif

@if(session()->has('Error'))
<script>
    Swal.fire(
        'Error',
        'Usuario y/o contraseña incorrectos',
        'error'
    )
</script>
@endif

@if(session()->has('stock'))
<script>
    Swal.fire(
        'Error',
        '{{session('stock')}}',
        'error'
    )
</script>
@endif