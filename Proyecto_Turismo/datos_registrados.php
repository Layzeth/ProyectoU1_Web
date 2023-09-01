<!DOCTYPE html>
<html>
<head>
    <!-- Favicon -->
    <link href="./Imagen/favicon.png" rel="icon">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- Iconos | Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- JavaScript -->
    <script src="./JavaScript/jQuery v3.7.0.js"></script>
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

    <div class="container mt-3">
        <a href="packages.html" class="btn btn-primary"><i class="fas fa-arrow-left mr-2"></i>Volver a Inicio</a>
    </div>
</body>
</html>
