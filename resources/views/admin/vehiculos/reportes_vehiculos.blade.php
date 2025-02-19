<!DOCTYPE html>
<html>
<head>
    <title>Reporte de la Gestión de Vehículos</title>
</head>
<body>
    <h2>Reporte de Vehículos</h2>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Placa</th>
                <th>Tipo de Vehículo</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Motor</th>
                <th>Kilometraje</th>
                <th>Cilindraje</th>
              
            </tr>
        </thead>
        <tbody>
            @foreach($vehiculos as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->placa }}</td>
                <td>{{ $item->tipo_vehiculo }}</td>
                <td>{{ $item->marca}}</td>
                <td>{{ $item->modelo}}</td>
                <td>{{ $item->motor}}</td>
                <td>{{ $item->kilometraje}}</td>
                <td>{{ $item->cilindraje}}</td>
              
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>