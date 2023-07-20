
$(document).ready(function () {
    $("#p1").hide();

    $("#img1").hover(
        function () {
            $("#p1").fadeIn(1000); // Mostrar el elemento con efecto fadeIn en 1 segundo
        },
        function () {
            $("#p1").fadeOut(500); // Ocultar el elemento con efecto fadeOut en 0.5 segundos
        }
    );
});

$(document).ready(function () {
    $("#p2").hide();

    $("#img2").hover(
        function () {
            $("#p2").fadeIn(1000); // Mostrar el elemento con efecto fadeIn en 1 segundo
        },
        function () {
            $("#p2").fadeOut(500); // Ocultar el elemento con efecto fadeOut en 0.5 segundos
        }
    );
});