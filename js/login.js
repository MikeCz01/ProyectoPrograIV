$(document).ready(function(){
    $('#loginUsuario').on('click',function(){
        loginUsuario();
    });
    $('#loginProfesor').on('click',function(){
        loginProfesor();
    });
})

function loginUsuario() {
    var login = $('#usuario').val();
    var pass = $('#pass').val();

$.ajax({
    url: './includes/loginUsuario.php',
    method: 'POST',
    data: {
        login:login,
        pass:pass
    },
    success: function(data) {
        $('#messageUsuario').html(data);
       if(data.indexOf('Redirecting') >= 0) {
           window.location = 'Administrador/';  
        }else if(data.indexOf('vacios') >= 0){
            Swal.fire(":(", "Todos los campos son obligatorios", "error");
        }else if(data.indexOf('Usuario o contraseña incorrectos') >= 0){
            Swal.fire(":(", "El usuario o la contraseña son incorrectos", "error");
        }
}
})
}

function loginProfesor() {
    var loginProfesor = $('#usuarioProfesor').val();
    var passProfesor = $('#passProfesor').val();
    
    $.ajax({
        url: '/includes/loginUsuario.php',
        method: 'POST',
        data: {
            login:loginProfesor,
            pass:passProfesor
        },
        success: function(data) {
            $('#messageProfesor').html(data);
           if(data.indexOf('Redirecting') >= 0) {
               window.location = 'Docente/';
    }
    }
    })
    }