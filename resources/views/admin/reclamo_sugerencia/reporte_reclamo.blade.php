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

        <!--<div class="header">
            <h1>Detalle del Pedido #</h1>
        </div>-->

        <div class="content">
            <!--<p><strong>Número de Pedido:</strong> </p>
            <p><strong>Fecha:</strong></p>
            <p><strong>Cliente:</strong> </p>
            <p><strong>Creado Por:</strong> </p>
            <h2>Productos</h2>-->
            <table>
                <thead>
                    <tr>

                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Tipo</th>
                        <th>Circuito</th>
                        <th>Subcircuito</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($repo as $item)
                        <tr>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>

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
