<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $comment = $_POST["comment"];

    $data = "Nombre: $name\nComentario: $comment\n\n";

    if (file_put_contents("comments.txt", $data, FILE_APPEND)) {
        header("Location: index.html");
        exit;
    } else {
        echo "Error al guardar el comentario.";
    }
}
?>
