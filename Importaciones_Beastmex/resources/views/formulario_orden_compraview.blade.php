@extends('layouts.template')
@section('titulo','Nueva Compra')
@section('contenido')

<style>
    body {
        background-color: #1977772c;
    }
</style>
<div class="container mt-5">
            
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Proveedor</th>
                <th>Solicitante</th>
                <th>Fecha de ticket</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$proveedor[0]->Nombre}} {{$proveedor[0]->AP}} {{$proveedor[0]->AM}}</td>
                <td>{{$empleado[0]->Nombre}} {{$empleado[0]->AP}} {{$empleado[0]->AM}}</td>
                <td>{{$fechaticket[0]->created_at}}</td>
            </tr>
        </tbody>
    </table>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($poductos_ordenados as $po)
            <tr>
                <td>{{$po->Nombre}}</td>
                <td>{{$po->Costo_compra}}</td>
                <td>{{$po->Cantidad}}</td>
                <td>{{$po->Costo_compra*$po->Cantidad}}</td>
            </tr>
            @include('partials.modalordencompras')
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td>Total:</td>
                <td>{{$total}}</td>
            </tr>
        </tbody>
    </table>
    <button class="btn btn-outline-success mt-3" id="download-button">Descargar PDF</button>
    <a href="/proveedores/tickets"><button type="button" class="btn btn-outline-danger mt-3">Salir</button></a>
        <div hidden>
            <div id="invoice">
                <div class="container">
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th>Proveedor</th>
                                <th>Solicitante</th>
                                <th>Fecha de ticket</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$proveedor[0]->Nombre}} {{$proveedor[0]->AP}} {{$proveedor[0]->AM}}</td>
                                <td>{{$empleado[0]->Nombre}} {{$empleado[0]->AP}} {{$empleado[0]->AM}}</td>
                                <td>{{$fechaticket[0]->created_at}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($poductos_ordenados as $po)
                            <tr>   
                                <td></td>
                                <td>{{$po->Nombre}}</td>
                                <td>{{$po->Costo_compra}}</td>
                                <td>{{$po->Cantidad}}</td>
                                <td>{{$po->Costo_compra*$po->Cantidad}}</td>
                            </tr>
                            @include('partials.modalordencompras')
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Total:</td>
                                <td>{{$total}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>

<script>
    const button = document.getElementById('download-button');

    function generatePDF() {
        // Choose the element that your content will be rendered to.
        const element = document.getElementById('invoice');
        // Choose the element and save the PDF for your user.
        html2pdf().from(element).save();
    }

    button.addEventListener('click', generatePDF);
</script>

@endsection
