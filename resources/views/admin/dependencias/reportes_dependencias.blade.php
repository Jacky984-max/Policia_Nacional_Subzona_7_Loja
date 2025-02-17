<!DOCTYPE html>
<html>
<head>
    <title>Reporte de la Gestión de Dependencias</title>
</head>
<body>
    <h2>Reporte de Dependencias</h2>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Provincia</th>
                <th>Parroquia</th>
                <th>Código de Distrito</th>
                <th>Nombre de Distrito</th>
                <th>Código de Circuito</th>
                <th>Nombre de Circuito</th>
              
            </tr>
        </thead>
        <tbody>
            @foreach($dependencias as $depe)
            <tr>
                <td>{{ $depe->id }}</td>
                <td>{{ $depe->provincia }}</td>
                <td>{{ $depe->parroquia }}</td>
                <td>{{ $depe->cod_distrito}}</td>
                <td>{{ $depe->nombre_distrito}}</td>
                <td>{{ $depe->cod_circuito}}</td>
                <td>{{ $depe->nombre_circuito}}</td>
              
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>