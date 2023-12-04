@extends('layouts.template')
@section('titulo','Nueva Compra')
@section('contenido')

<style>
    body {
        background-color: #1977772c;
    }
</style>
<div class="container mt-5">
    <form action="/guardar_orden_compra/{{$id}}" method="POST">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label for="inputProducto" class="form-label">Producto a Comprar</label>
                <br>
                <select name="_Producto" id="inputStock">
                    <option value="" @if (null == old('_Producto')) selected @endif>Selecciona una opción</option>
                    @foreach($productos as $i)
                    <option value="{{$i->id_producto}}" @if ($i->id_producto == old('_Producto')) selected @endif>{{$i->Nombre}}</option>
                    @endforeach
                </select>
                @if($errors->first('_Producto'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('_Producto') }}
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                <label for="inputCantidad" class="form-label">Cantidad a Comprar</label>
                <input type="number" class="form-control" id="inputCantidad" name="_Cantidad" value="{{ old('_Cantidad') }}">
                @if($errors->first('_Cantidad'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('_Cantidad') }}
                    </div>
                @endif
            </div>
        </div>




        <div class="row row-cols-auto">
            <div class="col">
                <button type="submit" class="btn btn-outline-success mt-3">Registrar</button>
            </div>
            <div class="col">
                <a href="/proveedores"><button type="button" class="btn btn-outline-danger mt-3">Salir</button></a>
            </div>
        </div>
    </form>
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
        <thead>
            <tr>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Dirección</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$proveedor[0]->Telefono}} </td>
                <td>{{$proveedor[0]->Correo}}</td>
                <td>{{$proveedor[0]->Direccion}}</td>
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
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($poductos_ordenados as $po)
            <tr>
                <td>{{$po->Nombre}}</td>
                <td>{{number_format($po->Costo_compra, 2) }}</td>
                <td>{{$po->Cantidad}}</td>
                <td>{{number_format($po->Costo_compra*$po->Cantidad, 2) }}</td>
                <td>
                    <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eliminarOrden{{$po->id_ordencompra}}"><i class="bi bi-trash"></i></button>
                </td>
            </tr>
            @include('partials.modalordencompras')
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td>Total:</td>
                <td>{{number_format($total,2)}}</td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <button class="btn btn-outline-success mt-3" id="download-button">Descargar PDF</button>
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
                        <thead>
                            <tr>
                                <th>Telefono</th>
                                <th>Correo</th>
                                <th>Dirección</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$proveedor[0]->Telefono}} </td>
                                <td>{{$proveedor[0]->Correo}}</td>
                                <td>{{$proveedor[0]->Direccion}}</td>
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
                                <td>{{number_format($po->Costo_compra, 2) }}</td>
                                <td>{{$po->Cantidad}}</td>
                                <td>{{number_format($po->Costo_compra *$po->Cantidad, 2) }}</td>
                            </tr>
                            @include('partials.modalordencompras')
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Total:</td>
                                <td>{{number_format($total,2)}}</td>
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
        
        // Specify the options for the PDF generation, including the file name.
        const pdfOptions = {
            margin: 10,
            filename: 'orden_{{$id}}.pdf', // Concatenate the id variable in the file name
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' },
        };

        // Generate and save the PDF using html2pdf with the specified options.
        html2pdf().from(element).set(pdfOptions).save();
    }

    button.addEventListener('click', generatePDF);
</script>


@endsection
