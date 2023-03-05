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
    url: '/includes/loginUsuario.php',
    method: 'POST',
    data: {
        login:login,
        pass:pass
    },
    success: function(data) {
        $('#messageUsuario').html(data);
       if(data.indexOf('Redirecting') >= 0) {
           window.location = 'administrador/';
}
}
})
}

function loginProfesor() {
    var login = $('#usuario').val();
    var pass = $('#pass').val();
    
    $.ajax({
        url: '/includes/loginUsuario.php',
        method: 'POST',
        data: {
            login:login,
            pass:pass
        },
        success: function(data) {
            $('#messageProfesor').html(data);
           if(data.indexOf('Redirecting') >= 0) {
               window.location = 'Docente/';
    }
    }
    })
    }