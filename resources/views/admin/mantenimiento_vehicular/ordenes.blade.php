<!DOCTYPE html>
<html>

<head>
    <title>Orden de Trabajo</title>
</head>

<body onload="window.print()">
    <h2>Orden de Trabajo #{{ $orden->id }}</h2>
    <p><strong>Fecha:</strong> {{ $orden->fecha_generacion }}</p>
    <p><strong>Detalle:</strong> {{ $orden->detalle_mantenimiento }}</p>
    <!--<p><strong>Total:</strong> ${{ number_format($orden->total, 2) }}</p>-->
    


</body>

</html>
