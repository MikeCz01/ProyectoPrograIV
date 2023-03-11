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
        var estado = document.querySelector('#estado').value;
        
        if(nombre == ''){
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
                if(request.status){
                    $('#modalActividad').modal('hide'); 
                    formMateria.reset();
                    swal('Periodo',data.msg,'success');
                    tableperiodos.ajax.reload();
                }else{
                    swal('Atención',data.msg,'error');
                }
            }
        }
    }
})


function openModalPeriodos(){
    document.querySelector('#idperiodo').value = '';
    document.querySelector('#tituloModalPeriodo').innerHTML = 'Nuevo Periodo';
    document.querySelector('#action').innerHTML = 'Guardar';
    document.querySelector('#formPeriodo').reset();
  $('#modalPeriodo').modal('show');   
}

function editarPeriodo(id){
     var idperiodo = id;
     document.querySelector('#tituloModalPeriodo').innerHTML = 'Actualizar Periodo';
     document.querySelector('#action').innerHTML = 'Actualizar';

     var request = (window.XMLHttpRequest) ? new XMLHttpRequest : new ActiveXObject('Microsoft.XMLHTTP');

        var url= './models/periodos/edit-periodo.php?idperiodo='+idperiodo;
        request.open('GET', url, true);
        request.send();
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                var data = JSON.parse(request.responseText);
                if(data.status){

                    document.querySelector('#idperiodo').value = data.data.period_id;
                    document.querySelector('#nombre').value = data.data.nombre_periodo;
                    document.querySelector('#estado').value = data.data.estado;

                    $('#modalPeriodo').modal('show'); 
                }else{
                    swal('Atención',data.msg,'error');
                }
            }
        }
}

function eliminarPeriodo(id){
    var idperiodo= id;

    swal({
       title: "Eliminar Periodo",
       text: "¿Desea eliminar este Periodo?",
       type: "warning",
       showCancelButton: true,
       confirmButtontext: "Si, eliminar",
       cancelbuttontext: "No, cancelar",
       closeOnConfirm: false,
       closeOnCancel: true 
    },function(confirm){
        if(confirm){
           
     var request = (window.XMLHttpRequest) ? new XMLHttpRequest : new ActiveXObject('Microsoft.XMLHTTP');

     var url= './models/periodos/delet-periodo.php';
     request.open('POST', url, true);
     var strData  = "idperiodo="+idperiodo;
     request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     request.send(strData);
     request.onreadystatechange = function(){
         if(request.readyState == 4 && request.status == 200){
             var data = JSON.parse(request.responseText);
             if(data.status){
                swal('Eliminar',data.msg,'sucess');
                tableperiodos.ajax.reload();
             }else{
                 swal('Atención',data.msg,'error');
             }
         }
     } 
        }
    })
}