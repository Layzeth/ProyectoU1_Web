$(document).ready(function(){
      $("#name").keypress(function (e) {
        if (e.which < 48 || e.which > 57) {
          return true;
        } else {
          return false;
        }
      });

      $("#Enviar").click(function () {
        let name = $("#name").val();
        let email = $("#email").val();
        let subject = $("#subject").val();
        let message = $("#message").val();
        

        if (name == "" || count < 5) {
          $("#name").addClass("validar");
          $("#mensaje1").fadeIn();

        } else {
          $("#mensaje1").fadeOut();
          $("#name").addClass("validar2");
        }
        if (message == "" || message.length < 10) {
          $("#message").addClass("validar");
          $("#mensaje2").fadeIn();

        } else {
          $("#message").addClass("validar2");
          $("#mensaje2").fadeOut();
        }
        if (subject == "" || subject.length < 10) {
            $("#subject").addClass("validar");
            $("#mensaje2").fadeIn();
  
          } else {
            $("#subject").addClass("validar2");
            $("#mensaje2").fadeOut();
          }
        if (email.indexOf("@", 0) == -1 || email == "") {
          $("#mensaje4").fadeIn();

          $("#email").addClass("validar");
        } else {
          $("#email").addClass("validar2");
          $("#mensaje4").fadeOut();
        }
      });
});