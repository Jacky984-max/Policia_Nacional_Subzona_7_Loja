<!DOCTYPE html>
<html>
<head>
    <title>Reporte de la Gestión de Usuarios</title>
</head>
<body>
    <h2>Reporte de Usuarios</h2>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Correo</th>
                <th>Rol</th>
              
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->getRoleNames()->first() }}</td>
              
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>