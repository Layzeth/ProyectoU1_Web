<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitizeInput($_POST["name"]);
    $email = sanitizeInput($_POST["email"]);
    $subject = sanitizeInput($_POST["subject"]);
    $message = sanitizeInput($_POST["message"]);

    if (!isValidEmail($email)) {
        header("Location: contacto.html");
        exit(); // Termina la ejecución del script
    }

    $data = "Nombre: $name, Correo: $email, Asunto: $subject, Mensaje: $message" . PHP_EOL;

    $file = "contacto.txt";
    if (file_exists($file)) {
        if (is_writable($file)) {
            if ($handle = fopen($file, "a")) {
                if (fwrite($handle, $data) === false) {
                    echo "Error al escribir en el archivo.";
                }
                fclose($handle);
            } else {
                echo "Error al abrir el archivo.";
            }
        } else {
            echo "El archivo no tiene permisos de escritura.";
        }
    } else {
        echo "El archivo no existe.";
    }
    header("Location: contacto.html");
    exit(); // Termina la ejecución del script 
    
}

function sanitizeInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

?>
