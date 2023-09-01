<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>ZATH | Inicio</title>
    <style>

    .comment-form {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 30px;
    }

    .comment {
        background-color: rgb(194, 196, 194);
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
        box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
    }

    .comment:nth-child(odd) {
        background-color: #f8f9fa;
    }
    </style>

</head>

<body>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Reseñas y comentarios</h2>
        <p>En esta sección encontrarás comentarios, reseñas y opiniones de nuestros clientes.</p>
        <?php
        $comments = file_get_contents("comments.txt");
        $comment_array = explode("\n\n", $comments);

        foreach ($comment_array as $comment_data) {
            if (!empty($comment_data)) {
                list($name, $comment) = explode("\n", $comment_data);
                echo '<div class="comment">';
                echo "<strong>$name</strong><br>";
                echo "$comment";
                echo '</div>';
            }
        }
        ?>
    </div>
    <div class="container mt-3">
        <a href="index.html" class="btn btn-primary"><i class="fas fa-arrow-left mr-2"></i>Volver a Inicio</a>
    </div>

    
    <!-- Footer Inicio -->
    <div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-lg-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-lg-4 col-md-12 mb-5">
                <a href="index.html" class="navbar-brand">
                    <h1 class="text-primary"><span class="text-white">ZATH</span> TURISMO</h1>
                </a>
                <p class="text-justify">¡Prepárate para una aventura inolvidable en las Islas Galápagos! Explora, admira
                    y maravíllate
                    con la belleza incomparable de este destino único en el mundo.</p>
                <h6 class="text-white text-uppercase mt-4 mb-3" style="letter-spacing: 5px;">Síguenos en:</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-outline-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Nuestros servicios</h5>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Paquetes</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Actividades</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Servicios</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Contáctanos</h5>
                <p><i class="fa fa-map-marker-alt mr-2"></i>Santo Domingo, Ecuador</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+593 6721 3611</p>
                <p><i class="fa fa-envelope mr-2"></i>zathturismo@gmail.com</p>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5"
        style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="row">
            <div class="col-lg-12 text-center">
                <p class="m-0 text-white-50">Copyright &copy; <a href="#">ZATH TURISMO</a>. Todos los derechos
                    reservados.</a>
                </p>
            </div>
        </div>
    </div>
    <!-- Footer Fin -->
</body>

</html>
