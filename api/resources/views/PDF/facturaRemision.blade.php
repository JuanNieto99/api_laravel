
<style>
    .cabeceraBox{
        white-space: nowrap;    
        width: 100%;
    }

    .box {
        display: inline-block;
        width: 300px; /* Ancho de cada div */  
    
    }

    .table {
        border-collapse: collapse;
        width: 30%;
    }
    .table  th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
        border-color: white;
    }
    .table  tbody tr {
        height: 0;
    }
 
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
</style>
<body>
<div class="cabeceraBox">
    <div class="box" >
        <img src="{{ $ruta_imagen }}" style="width: 100%;height: 50px;">
    </div>
    <div class="box" style="text-align: right;">
        <p>Secuencia : {{ $factura->secuencia_factura_interna }} </p>
    </div> 
    <p style="text-align: center; "><strong>Resumen Remision</strong></p> 
    <br><br><br> 
    <div class="cabeceraBox">
        <div class="box">
            <table class="table">
                <thead>
                    <tr>
                        <th>Resimido a</th>
                        <th></th> 
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Cliente :</td>
                        <td>{{ $factura['cliente']['nombres'] }} {{ $factura['cliente']['apellidos'] }}</td> 
                    </tr>
                    <tr>
                        <td>Identificacion :</td>
                        <td>{{ $factura['cliente']['numero_documento'] }} </td> 
                    </tr>
                    <tr>
                        <td>Telefono :</td> 
                        <td>{{ $factura['cliente']['celular'] }} </td> 
                    </tr> 
                    <tr>
                        <td>Correo :</td> 
                        <td>{{ $factura['cliente']['correo'] }} </td> 
                    </tr>
                    <tr style="color: transparent;">
                        <td>s</td> 
                        <td>s</td> 
                    </tr>
                </tbody>
            </table> 
        </div>
        <div class="box" style="margin-left: 10%;" >
            <table class="table">
                <thead  >
                    <tr>
                        <th></th>
                        <th>Beneficiario</th> 
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Hotel :</td>
                        <td>{{ $factura['hotel']['nombre'] }} {{ $factura['cliente']['apellidos'] }}</td> 
                    </tr>
                    <tr>
                        <td>Nit :</td>
                        <td>{{ $factura['hotel']['nit'] }} </td> 
                    </tr>
                    <tr>
                        <td>Telefono :</td> 
                        <td>{{ $factura['hotel']['telefono'] }} </td> 
                    </tr> 
                    <tr>
                        <td>Dirección :</td> 
                        <td>{{ $factura['hotel']['direccion'] }} </td> 
                    </tr>
                    <tr>
                        <td>Correo :</td> 
                        <td>{{ $factura['hotel']['email'] }} </td> 
                    </tr>
                </tbody>
            </table> 
        </div>
    </div>

    <p style="text-align: center; "><strong>Resumen Productos</strong></p> 

    <table style=" 
        border: 1px solid black;
        padding: 8px;        
        border-collapse: collapse;
        width: 100%;    
        border: 1px solid black;
        padding: 8px; 
        ">
        <thead>
            <tr style="border: 1px solid black;">
                <th style="border: 1px solid black;">Nombre</th>
                <th style="border: 1px solid black;">Cantidad</th>
                <th style="border: 1px solid black;">Tipo</th>
                <th style="border: 1px solid black;">Impuesto</th>
                <th style="border: 1px solid black;">Valor</th>

            </tr>
        </thead>
        <tbody>
            @foreach($productos_detalle as $detalle)
            <tr style="border: 1px solid black;"> 
                <td style="border: 1px solid black;">{{ $detalle['nombre'] }}</td>
                <td style="border: 1px solid black;">{{ $detalle['cantidad'] }}</td>
                <td style="border: 1px solid black;">{{ $detalle['tipo'] }}</td>
                <td style="border: 1px solid black;">{{ number_format($detalle['impuesto'],2) }}</td>
                <td style="border: 1px solid black;">{{ number_format($detalle['valor'], 2) }}</td> 
            </tr> 
            @endforeach
        </tbody>
    </table>
    <p style="text-align: center; "><strong>Totales</strong></p>  
    <table style="  
        border: 1px solid black;
        padding: 8px;        
        border-collapse: collapse;
        width: 100%;    
        border: 1px solid black;
        padding: 8px; 
        ">
        <thead>
            <tr style="border: 1px solid black;">
                <th style="border: 1px solid black;">Total Impuestos</th>
                <th style="border: 1px solid black;">Subtotal</th> 
                <th style="border: 1px solid black;">Total</th> 
            </tr>
        </thead>
        <tbody>
            <tr style="border: 1px solid black;"> 
                <td style="border: 1px solid black;">{{ number_format($factura['impuesto_total'], 2) }}</td>
                <td style="border: 1px solid black;">{{ number_format($factura['sub_total'], 2) }}</td>
                <td style="border: 1px solid black;">{{ number_format($factura['total'], 2) }}</td>
            </tr>
        </tbody>
    </table>
    <div style=" margin-left: 55%;">
    <p>Fecha Generacion {{ $fecha_actual }}</p>
    </div>

</div> 

</body>


