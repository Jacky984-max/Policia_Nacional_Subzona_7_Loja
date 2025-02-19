<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Reportes de Reclamos o Sugerencias</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            padding: 20px;
        }

        .header,
        .footer {
            text-align: center;
            padding: 10px 0;
        }

        .header {
            border-bottom: 1px solid #ddd;
        }

        .footer {
            border-top: 1px solid #ddd;
            font-size: 12px;
            color: #777;
        }

        h1,
        h2,
        h3 {
            margin: 0;
        }

        .content {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            padding: 8px 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="text-center">
            <h3 class="text-primary" style="margin-bottom: 8px;">SISTEMA GESTIÓN FLOTA POLICIAL</h3>
            <p>Sub-Zona 7 Loja</p>
        </div>

        <div class="content">
        
            <table>
                <thead>
                    <tr>

                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Tipo</th>
                        <th>Circuito</th>
                        <th>Subcircuito</th>
                        <th>Nombre del Denunciante</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($reclamo as $item)
                    <tr>
                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                        <td>{{ $item->updated_at->format('d-m-Y') }}</td>
                        <td>{{ $item->tipo }}</td>
                        <td>{{ $item->nombre_circuito }}</td>
                        <td>{{ $item->nombre_sub_circuito }}</td>
                        <td>{{ $item->nombres }} {{ $item->apellidos }}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>

            <h3></h3> <br>

            <h3></h3>

        </div>
        <div class="footer">
            <p>&copy; 2025</p>
        </div>
    </div>
</body>

</html>
