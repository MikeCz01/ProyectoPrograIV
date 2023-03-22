$('#tableactividades').DataTable();
var tableactividades;
document.addEventListener('DOMContentLoaded', function(){
    tableactividades = $('#tableactividades').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url":"./models/actividades/table_actividades.php",
            "dataSrc":""
        },
        "columns":[
            {"data":"acciones"},
            {"data":"actividad_id"},
            {"data":"nombre_actividad"},
            {"data":"estado"}
        ],
        "responsive": true,
        "bDestroy":true,
        "iDisplayLength":10,
        "order": [[0,"asc"]]
    });
    var formActividad= document.querySelector('#formActividad');
    formActividad.onsubmit = function(e){
        e.preventDefault();

        var idactividad = document.querySelector('#idactividad').value;
        var nombre = document.querySelector('#nombre').value;
        var startdate = document.querySelector('#startdate').value;
        var enddate = document.querySelector('#enddate').value;
        var estado = document.querySelector('#listEstado').value;
        var listDia = document.querySelector('#listDia').value;
        if(nombre == '' || startdate == '' || enddate == '' || listDia == '' ){
            swal('Atención','Todos los campos son obligatorios','error');
            return false;
        }

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest : new ActiveXObject('Microsoft.XMLHTTP');
        var url= './models/actividades/ajax-actividades.php';
        var form = new FormData(formActividad);
        request.open('POST',url,true);
        request.send(form);
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200) {

                var data = JSON.parse(request.responseText);
                if(data.status){
                    $('#modalActividad').modal('hide'); 
                    formActividad.reset();
                    swal('Actividad',data.msg,'success');
                    window.location = "/ProyectoPrograIV/";
                }else{
                    swal('Atención',data.msg,'error');
                }
            }
        }
    }
})


function openModalActividades(){
    document.querySelector('#idactividad').value = '';
    document.querySelector('#tituloModalActividad').innerHTML = 'Nueva Actividad';
    document.querySelector('#actionActividad').innerHTML = 'Guardar';
    document.querySelector('#formActividad').reset();
    $('#modalActividad').modal('show');   
}

function editarActividad(id){
     var idactividad = id;
     document.querySelector('#tituloModalActividad').innerHTML = 'Actualizar Actividad';
     document.querySelector('#actionActividad').innerHTML = 'Actualizar';

     var request = (window.XMLHttpRequest) ? new XMLHttpRequest : new ActiveXObject('Microsoft.XMLHTTP');

        var url= './models/actividades/edit-actividad.php?idactividad='+idactividad;
        request.open('GET', url, true);
        request.send();
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                var data = JSON.parse(request.responseText);
                if(data.status){

                    document.querySelector('#idactividad').value = data.data.actividad_id;
                    document.querySelector('#nombre').value = data.data.nombre_actividad;
                    document.querySelector('#listEstado').value = data.data.estado;

                    $('#modalActividad').modal('show'); 
                }else{
                    swal('Atención',data.msg,'error');
                }
            }
        }
}

function eliminarActividad(id){
    var idactividad= id;

    swal({
       title: "Eliminar Actividad",
       text: "¿Desea eliminar esta Actividad?",
       type: "warning",
       showCancelButton: true,
       confirmButtontext: "Si, eliminar",
       cancelbuttontext: "No, cancelar",
       closeOnConfirm: false,
       closeOnCancel: true 
    },function(confirm){
        if(confirm){
           
     var request = (window.XMLHttpRequest) ? new XMLHttpRequest : new ActiveXObject('Microsoft.XMLHTTP');

     var url= './models/actividades/delet-actividad.php';
     request.open('POST', url, true);
     var strData  = "idactividad="+idactividad;
     request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     request.send(strData);
     request.onreadystatechange = function(){
         if(request.readyState == 4 && request.status == 200){
             var data = JSON.parse(request.responseText);
             if(data.status){
                swal('Eliminar',data.msg,'success');
                tableactividades.ajax.reload();
             }else{
                 swal('Atención',data.msg,'error');
             }
         }
     } 
        }
    })
}