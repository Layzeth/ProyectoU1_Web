<!DOCTYPE html>
<html>
<head>
    <title>Datos Registrados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        h1 {
            text-align: center;
            padding: 20px;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #dddddd;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Datos Registrados</h1>
    
    <?php
    $contenido = file_get_contents("datos_pago.txt");
    $lineas = explode("\n\n", $contenido);

    echo "<table>";
    echo "<tr><th>Nombre</th><th>Apellido</th><th>Ciudad</th><th>Código Postal</th><th>País</th><th>Número de Tarjeta</th><th>CVV</th><th>Monto a Pagar</th></tr>";

    foreach ($lineas as $linea) {
        if (!empty($linea)) {
            $datos = explode("\n", $linea);
            echo "<tr>";
            foreach ($datos as $dato) {
                list($clave, $valor) = explode(": ", $dato);
                echo "<td>$valor</td>";
            }
            echo "</tr>";
        }
    }
    
    echo "</table>";
    ?>
</body>
</html>
