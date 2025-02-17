<!DOCTYPE html>
<html>
<head>
    <title>Reporte de la Gestión de Mantenimientos</title>
</head>
<body>
    <h2>Reporte de Mantenimientos</h2>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Vehiculo o Placa</th>
                <th>Tipo de Mantenimiento</th>
                <th>Asunto</th>
              
            </tr>
        </thead>
        <tbody>
            @foreach($mantenimientos as $mante)
            <tr>
                <td>{{ $mante->id }}</td>
                <td>{{ $mante->placa }}</td>
                <td>{{ $mante->tipo_mantenimiento }}</td>
                <td>{{ $mante->asunto}}</td>
              
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>