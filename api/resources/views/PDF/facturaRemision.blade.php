
<style>
    .cabeceraBox{
        white-space: nowrap;    
        width: 100%;
    }

    .box {
        display: inline-block;
        width: 300px; /* Ancho de cada div */  
    
    }
 
</style>
<div class="cabeceraBox">
    <div class="box" >
        <img src="{{ $ruta_imagen }}" style="width: 100%;height: 50px;">
    </div>
    <div class="box" style="text-align: right;">
        <p>Secuecnia Interna: {{ $factura->secuencia_factura_interna }} </p>
    </div>
    <p style="text-align: center;">Resumen Remision</p>
    <table class="tabla-transparente">
        <thead>
            <tr>
                <th><p style="font-family: blod;">Remisionado a</p></th>
            </tr>
        </thead>
        <tbody>
            <tr style="height: 1px;">
                <p>Identificación :</p>
            </tr>
            <tr style="height: 1px;">
                <p>Cliente :</p>
            </tr>
            <tr>
                <p>Teléfono</p>
            </tr>
            <tr>
                <p>Direccion</p>
            </tr>
            <tr>
                <p>Correo</p>
            </tr>
        </tbody>
    </table>
</div> 