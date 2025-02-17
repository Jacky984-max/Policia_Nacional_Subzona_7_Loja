<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Gestión - Gerencia</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Reporte de Mantenimientos</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Vehículo</th>
                <th>Kilometraje</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mantenimientos as $m)
            <tr>
                <td>{{ $m->id }}</td>
                <td>{{ $m->placa }}</td>
                <td>{{ $m->kilometraje }}</td>
                <td>{{ $m->estado }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>