
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
        <p>Secuecnia Interna: {{ $factura->secuencia_factura_interna }} </p>
    </div> 
    <p style="text-align: center;">Resumen Remision</p> 
    <br> 
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
        </tbody>
    </table> 

    <table style="margin-top: 10%;   border: 1px solid black;
        padding: 8px;        border-collapse: collapse;
        width: 100%;    border: 1px solid black;
        padding: 8px;
        text-align: left;">
        <thead>
            <tr >
                <th>Encabezado 1</th>
                <th>Encabezado 2</th>
                <th>Encabezado 3</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Dato 1</td>
                <td>Dato 2</td>
                <td>Dato 3</td>
            </tr>
            <tr>
                <td>Dato 4</td>
                <td>Dato 5</td>
                <td>Dato 6</td>
            </tr>
            <tr>
                <td>Dato 7</td>
                <td>Dato 8</td>
                <td>Dato 9</td>
            </tr>
        </tbody>
    </table>
    <div style=" margin-left: 55%;">
    <p>Fecha Generacion {{ $fecha_actual }}</p>
</div>
</div> 

</body>


