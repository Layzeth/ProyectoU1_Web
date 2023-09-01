<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <!--Favicon-->
    <link rel="shortcut icon" href="./Imagen/favicon.png" type="image/x-icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="./JavaScript/jQuery v3.7.0.js"></script>
    <script src="./JavaScript/jQuery Easing.js"></script>
    <title>ZATH | Método de Pago</title>
    <style>
        .text-primary {
            color: #7AB730 !important;
        }

        .text-uppercase {
            text-transform: uppercase !important;
        }

        .bg-white {
            background-color: #fcf9f9 !important;
        }

        .titulo {
            margin-top: 30px;
            margin-bottom: 0px;
        }

        /*Menu desplegable*/
        #menu {
            width: 150px;
            background-color: rgb(98, 147, 38);
            border-radius: 0px 60px 60px 0px;
            padding: 20px 20px 20px 8px;
            position: fixed;
            z-index: 100;
            left: -130px;
        }

        #menu a {
            color: white;
        }

        #menu a:hover {
            font-weight: bold;
            text-decoration: none;
            transition: text-decoration 0.3s ease;
        }

        .menu-des {
            line-height: 70px;
        }

        .menu-item a {
            position: relative;
            color: rgba(255, 255, 255, 0.4);
            text-decoration: none;
        }

        .menu-item a:hover,
        .menu-item a:focus {
            color: rgba(255, 255, 255, 0.4);
            outline: none;
        }

        .menu-item a:before {
            content: "";
            position: absolute;
            width: 100%;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #ffffff;
            visibility: hidden;
            transform: scaleX(0);
            transition: 0.3s;
        }

        .menu-item a:hover:before,
        .menu-item a:focus:before {
            visibility: visible;
            transform: scaleX(1);
        }
    </style>

 <script>
        $(function () {
            $("body").hide().fadeIn(1000);
        });
        // Menu desplegable
        $(document).ready(function () {
            $('#menu').hover(function () {
                $(this).stop().animate({
                    left: "0px",
                }, 500, 'easeInBack');
            }, function () {
                $(this).stop().animate({
                    left: "-130px",
                }, 800, 'easeOutBack');
            });
        });
       
        $(document).ready(function () {
    $("#contactForm").submit(function (event) {
        event.preventDefault(); // Evitar el envío predeterminado del formulario
        
        // Obtener los valores de los campos
        var nombre = $("#nombre").val();
        var apellido = $("#apellido").val();
        var ciudad = $("#ciudad").val();
        var codigoPostal = $("#codigoPostal").val();
        var pais = $("#pais").val();
        var numeroTarjeta = $("#numeroTarjeta").val();
        var cvv = $("#cvv").val();
        var monto = $("#monto").val();

        // Realizar las validaciones
        if (!validarCampos(nombre, apellido, ciudad, codigoPostal, pais, numeroTarjeta, cvv, monto)) {
            return; // Si hay errores en las validaciones, detener el proceso
        }

        // Almacenar los datos en el archivo de texto usando Ajax
        $.ajax({
            url: "guardar_datos.php", // Archivo PHP para almacenar datos
            type: "POST",
            data: {
                nombre: nombre,
                apellido: apellido,
                ciudad: ciudad,
                codigoPostal: codigoPostal,
                pais: pais,
                numeroTarjeta: numeroTarjeta,
                cvv: cvv,
                monto: monto
            },
            success: function (response) {
                // Mostrar mensaje de éxito y redirigir a la página de datos registrados
                Swal.fire({
                    icon: 'success',
                    title: '¡Excelente!',
                    text: '¡Pago realizado con éxito!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "datos_registrados.php";
                    }
                });
            },
            error: function (xhr, status, error) {
                console.error(error);
                // Mostrar mensaje de error
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Hubo un problema al procesar el pago. Por favor, inténtalo nuevamente.'
                });
            }
        });
    });

    // Resto del código de validación...
    function validarCampos(nombre, apellido, ciudad, codigoPostal, pais, numeroTarjeta, cvv, monto) {
        // Realizar todas las validaciones aquí
        
        // Si alguna validación falla, mostrar mensaje de error y retornar falso
        if (nombre.trim() === "") {
            mostrarError("#nombre", "Por favor, ingrese su nombre.");
            return false;
        }
        // ... Repetir para todos los campos
        
        // Si todas las validaciones son exitosas, retornar verdadero
        return true;
    }

    // Resto del código de validación...
    function mostrarError(campo, mensaje) {
        $(campo).next(".help-block").text(mensaje);
    }

    // Resto del código de validación...
    function validarTarjeta(numeroTarjeta) {
        var digits = numeroTarjeta.split("").map(Number);
        var sum = 0;
        var shouldDouble = false;

        for (var i = digits.length - 1; i >= 0; i--) {
            var digit = digits[i];

            if (shouldDouble) {
                digit *= 2;
                if (digit > 9) {
                    digit -= 9;
                }
            }

            sum += digit;
            shouldDouble = !shouldDouble;
        }

        return sum % 10 === 0;
    }
});
</script>
</body>
</html>
    <!-- Fondo Inicio -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Método de pago</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="packages.html">Paquetes</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Método de pago</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Fondo Fin -->

    <!-- Inicio Menú desplegable -->
    <div id="menu">
        <div class="menu-item">
            <i class="fa-solid fa-box-open" style="color: white;"></i>
            <a class="menu-des" href="packages.html">Paquetes</a>
        </div>
    </div>
    <!-- Final Menú desplegable -->


    <!--Inicio de formulario-->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="titulo text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase">Método de Pago</h6>
                <h1>Obtén los mejores paquetes</h1>
            </div>
            <!-- Resto del contenido -->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form bg-white" style="padding: 30px;">
                        <!-- Resto del contenido -->
                        <form action="guardar_datos.php" name="sentMessage" id="contactForm" method="post" novalidate="novalidate">
                            <!-- Resto del contenido -->
                            <div class="form-row">
                                <div class="col-sm-6 form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control p-4" id="nombre" placeholder="Nombre"
                                        required="required">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="apellido">Apellido</label>
                                    <input type="text" class="form-control p-4" id="apellido" placeholder="Apellido"
                                        required="required">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-6 form-group">
                                    <label for="ciudad">Ciudad</label>
                                    <input type="text" class="form-control p-4" id="ciudad" placeholder="Ciudad"
                                        required="required">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="codigoPostal">Código Postal</label>
                                    <input type="text" class="form-control p-4" id="codigoPostal"
                                        placeholder="Código Postal" required="required">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pais">País</label>
                                <input type="text" class="form-control p-4" id="pais" placeholder="País"
                                    required="required">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-6 form-group">
                                    <label for="numeroTarjeta">Número de Tarjeta</label>
                                    <input type="number" class="form-control p-4" id="numeroTarjeta"
                                        placeholder="Número de Tarjeta" required="required">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="cvv">CVV</label>
                                    <input type="number" class="form-control p-4" id="cvv" placeholder="CVV"
                                        required="required">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="monto">Monto a Pagar</label>
                                <input type="number" class="form-control p-4" id="monto" placeholder="Monto a Pagar"
                                    required="required">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg" name="enviar">Pagar</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Fin de formulario-->
    
    <!-- Footer Inicio -->
    <div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-lg-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-lg-4 col-md-12 mb-5">
                <a href="index.html" class="navbar-brand">
                    <h1 class="text-primary"><span class="text-white">ZATH</span> TURISMO</h1>
                </a>
                <p class="text-justify">¡Prepárate para una aventura inolvidable en las Islas
                    Galápagos! Explora, admira
                    y maravíllate
                    con la belleza incomparable de este destino único en el mundo.</p>
                <h6 class="text-white text-uppercase mt-4 mb-3" style="letter-spacing: 5px;">
                    Síguenos en:</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-outline-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Nuestros
                    servicios</h5>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Paquetes</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Actividades</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Servicios</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">
                    Contáctanos</h5>
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
                <p class="m-0 text-white-50">Copyright &copy; <a href="#">ZATH TURISMO</a>.
                    Todos los derechos
                    reservados.</a>
                </p>
            </div>
        </div>
    </div>
    <!-- Footer Fin -->

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>