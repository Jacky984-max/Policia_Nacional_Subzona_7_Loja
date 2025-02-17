<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Personal Policial</title>
</head>
<body>
    <h2>Reporte de Personal Policial</h2>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cédula</th>
                <th>Nombre y Apellido</th>
                <th>Ciudad de Nacimiento</th>
                <th>Rango</th>
                <th>Dependencia</th>
            </tr>
        </thead>
        <tbody>
            @foreach($personal as $persona)
            <tr>
                <td>{{ $persona->id }}</td>
                <td>{{ $persona->cedula }}</td>
                <td>{{ $persona->nombre }}</td>
                <td>{{ $persona->ciudad_nacimiento }}</td>
                <td>{{ $persona->rango }}</td>
                <td>{{ $persona->dependencia->nombre_distrito }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>