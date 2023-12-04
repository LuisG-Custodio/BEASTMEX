@extends('layouts.template')
@section('titulo','BEASTMEX')
@section('contenido')
<style>
    body {
        background-color: #1977772c;
    }
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</style>

<body>  
    <div class="container">
        {{--<div class="row mt-5">
            <div class="col-md-3">
                <a href="/clientes" class="btn btn-primary btn-lg btn-block">VENTAS</a>
            </div>
            <div class="col-md-3">
                <a href="/productos" class="btn btn-success btn-lg btn-block">ALMACÉN</a>
            </div>
            <div class="col-md-3">
                <a href="/proveedores" class="btn btn-info btn-lg btn-block">COMPRAS</a>
            </div>
            <div class="col-md-3">
                <a href="/empleados" class="btn btn-warning btn-lg btn-block">GERENCIA</a>
            </div>
        </div>--}}
        
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="alert alert-success card">
                    <div class="card-body alert-success" role="alert">
                        <h2 class="card-title">Información de Envíos y Seguimiento</h2>
                        <hr>
                        <p class="card-text">Ofrecemos varias opciones de envío para garantizar la entrega segura y oportuna de sus productos. Las opciones de envío incluyen:</p>
                        
                        <ul>
                            <li><strong>Envío Estándar:</strong> Entrega en 5-7 días hábiles a tarifas económicas.</li>
                            <li><strong>Envío Rápido:</strong> Entrega en 2-3 días hábiles con tarifas ligeramente más altas.</li>
                            <li><strong>Envío Express:</strong> Entrega al día siguiente para las necesidades más urgentes.</li>
                        </ul>
                        
                        <p class="card-text">Para rastrear su paquete, utilice el número de seguimiento proporcionado en el correo electrónico de confirmación del pedido. Puede ingresar el número de seguimiento en nuestra página de <a href="#">Seguimiento de Pedidos</a> para conocer el estado actual de su envío.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div id="carouselExampleIndicators" class="carousel slide" style="max-width: 530px; margin: 0 auto;">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://c.pxhere.com/photos/64/95/computer_cpu_data_fan_intel_it_motherboard_pc-923864.jpg!d" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                            <img src="https://c.pxhere.com/photos/64/95/computer_cpu_data_fan_intel_it_motherboard_pc-923864.jpg!d" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://c.pxhere.com/photos/64/95/computer_cpu_data_fan_intel_it_motherboard_pc-923864.jpg!d" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection










