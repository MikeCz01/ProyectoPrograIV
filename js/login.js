$(document).ready(function () {
  $("#loginUsuario").on("click", function () {
    loginUsuario();
  });
  $("#loginProfesor").on("click", function () {
    loginProfesor();
  });
  $("#loginAlumno").on("click", function () {
    loginAlumno();
  });
  $("#logoutbtn").on("click", function () {
    logout();
  });
});

function loginUsuario() {
  var login = $("#usuario").val();
  var pass = $("#pass").val();

  $.ajax({
    url: "./includes/loginUsuario.php",
    method: "POST",
    data: {
      login: login,
      pass: pass,
    },
    success: function (data) {
      $("#messageUsuario").html(data);
      if (data.indexOf("Redirecting") >= 0) {
        window.location = "Administrador/";
      } else if (data.indexOf("vacios") >= 0) {
        Alert("Todos los campos son obligatorios");
      } else if (data.indexOf("Usuario o contraseña incorrectos") >= 0) {
        Alert("El usuario o la contraseña son incorrectos");
      }
    },
  });
}

function loginProfesor() {
  var loginProfesor = $("#usuarioProfesor").val();
  var passProfesor = $("#passProfesor").val();

  $.ajax({
    url: "./includes/loginProfesor.php",
    method: "POST",
    data: {
      login: loginProfesor,
      pass: passProfesor,
    },
    success: function (data) {
      $("#messageProfesor").html(data);
      if (data.indexOf("Redirecting") >= 0) {
        window.location = "Profesor/";
      }
    },
  });
}

function loginAlumno() {
  var loginAlumno = $("#usuarioAlumno").val();
  var passAlumno = $("#passAlumno").val();

  $.ajax({
    url: "./includes/loginAlumno.php",
    method: "POST",
    data: {
      login: loginAlumno,
      pass: passAlumno,
    },
    success: function (data) {
      $("#messageAlumno").html(data);
      if (data.indexOf("Redirecting") >= 0) {
        window.location = "Alumno/";
      }
    },
  });
}

function logout() {
  $.ajax({
    url: "../logout.php",
    method: "POST",
    success: function () {
      window.location = "/ProyectoPrograIV/";
    },
  });
}
