<!DOCTYPE html>
<html>
<head>
    <title>Reporte del Registro de Asistencias del Personal Policial</title>
</head>
<body>
    <h2>Reporte de Asistencias</h2>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Policia</th>
                <th>Código Personal</th>
                <th>Fecha</th>
                <th>Hora de Entrada</th>
                <th>Hora de Salida</th>
               
              
            </tr>
        </thead>
        <tbody>
            @foreach($asistencias as $asis)
            <tr>
                <td>{{ $asis->id }}</td>
                <td>{{ $asis->personalPolicial->nombre ?? 'No asignado' }}</td>
                <td>{{ $asis->personalPolicial->codigo_personal ?? 'No asignado' }} </td>
                <td>{{ $asis->fecha }}</td>
                <td>{{ $asis->hora_entrada ?? 'Sin registro' }}</td>
                <td>{{ $asis->hora_salida ?? 'Sin registro' }}</td>
              
              
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>