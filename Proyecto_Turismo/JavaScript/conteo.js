
function contabilizar(identificador) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      // Maneja la respuesta si es necesario
    }
  };
  xmlhttp.open("GET", "contabilizar.php?tarjeta=" + encodeURIComponent(identificador), true);
  xmlhttp.send();
}
