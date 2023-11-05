@if(session()->has('Confirmacion'))
<script>
    Swal.fire(
        'Todo correcto',
        '{{session('Confirmacion')}}',
        'success'
    )
</script>
@endif