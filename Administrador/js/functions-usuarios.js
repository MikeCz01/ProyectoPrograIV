$('#tableusuarios').DataTable();
var tableusuarios;
document.addEventListener('DOMContentLoaded', function(){
    tableusuarios = $('#tableusuarios').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url":"./models/usuarios/tablaUsuarios.php",
            "dataSrc":"",
        },
        "columns":[
            {"data":"acciones"},
            {"data":"usuario_id"},
            {"data":"nombre"},
            {"data":"usuario"},
            {"data":"nombre_rol"},
            {"data":"estado"}
        ],
        "responsive": true,
        "bDestroy":true,
        "iDisplayLength":10,
        "order": [[0,"asc"]]
    });
    var formUsuario = document.querySelector('#formUsuario');
    formUsuario.onsubmit = function(e){
        e.preventDefault();

        var nombre = document.querySelector('#nombre').value;
        var usuario = document.querySelector('#usuario').value;
        var clave = document.querySelector('#clave').value;
        var rol = document.querySelector('#listRol').value;
        var estado = document.querySelector('#listEstado').value;

        if(nombre == "" || usuario == "" || clave == ""){
            swal('Atención','Todos los campos son obligatorios','warning');
            return false;
        }

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest : new ActiveXObject('Microsoft.XMLHTTP');
        var url= './models/usuarios/ajax-usuarios.php';
        var form = new FormData(formUsuario);
        request.open('POST', url, true);
        request.send(form);
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                var data = JSON.parse(request.responseText);
                if(request.status == 200){
                    $('#modalUsuario').modal('hide'); 
                    formUsuario.reset();
                    swal('Usuario',data.msg,'success');
                    tableusuarios.ajax.reload();
                }else{
                    swal('Usuario',data.msg,'warning');
                }
            }
        }
    }
})


function openModal(){
  $('#modalUsuario').modal('show');   
}