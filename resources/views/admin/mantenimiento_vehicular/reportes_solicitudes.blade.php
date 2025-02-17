<!DOCTYPE html>
<html>
<head>
    <title>Reporte de la Gestión de Solicitudes de Vehículos</title>
</head>
<body>
    <h2>Reporte de Solicitudes</h2>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Solicitante</th>
                <th>Vehículo</th>
                <th>Descripción del Problema</th>
                <th>Fecha y Hora de Solicitud</th>
              
            </tr>
        </thead>
        <tbody>
            @foreach($solicitudes as $soli)
            <tr>
                <td>{{ $soli->id }}</td>
                <td>  {{ $soli->personalPolicial->nombre ?? 'No asignado' }}</td>
                <td> {{ $soli->vehiculo->placa }}</td>
                <td> {{ $soli->observacion }}</td>
                <td>{{ $soli->fecha_hora }}</td>
              
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>