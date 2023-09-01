<?php
$identificador = $_GET['tarjeta'];

if ($identificador) {
  $archivoConteo = 'conteo.txt';

  // Leer el valor actual del contador
  $contadorActual = 0;
  if (file_exists($archivoConteo)) {
    $contadorActual = intval(file_get_contents($archivoConteo));
  }

  // Incrementar el contador
  $contadorActual++;

  // Escribir el nuevo valor en el archivo
  file_put_contents($archivoConteo, $contadorActual);

  // Enviar una respuesta (opcional)
  echo "Conteo actualizado a: " . $contadorActual;
}
?>
