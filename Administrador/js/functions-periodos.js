$('#tableperiodos').DataTable();
var tableperiodos;
document.addEventListener('DOMContentLoaded', function(){
    tableperiodos = $('#tableperiodos').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url":"./models/periodos/table_periodos.php",
            "dataSrc":""
        },
        "columns":[
            {"data":"acciones"},
            {"data":"periodo_id"},
            {"data":"nombre_periodo"},
            {"data":"estado"}
        ],
        "responsive": true,
        "bDestroy":true,
        "iDisplayLength":10,
        "order": [[0,"asc"]]
    });
    var formPeriodo= document.querySelector('#formPeriodo');
    formPeriodo.onsubmit = function(e){
        e.preventDefault();

        var idperiodo = document.querySelector('#idperiodo').value;
        var nombre = document.querySelector('#nombre').value;
        var estado = document.querySelector('#listEstado').value;
        
        if(nombre == ''){
            swal('Atención','Todos los campos son obligatorios','error');
            return false;
        }

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest : new ActiveXObject('Microsoft.XMLHTTP');
        var url= './models/periodos/ajax-periodos.php';
        var form = new FormData(formPeriodo);
        request.open('POST',url,true);
        request.send(form);
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200) {
                var data = JSON.parse(request.responseText);
                if(data.status){
                    $('#modalPeriodo').modal('hide'); 
                    formPeriodo.reset();
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
    document.querySelector('#actionPeriodo').innerHTML = 'Guardar';
    document.querySelector('#formPeriodo').reset();
  $('#modalPeriodo').modal('show');   
}

function editarPeriodo(id){
     var idperiodo = id;
     document.querySelector('#tituloModalPeriodo').innerHTML = 'Actualizar Periodo';
     document.querySelector('#actionPeriodo').innerHTML = 'Actualizar';

     var request = (window.XMLHttpRequest) ? new XMLHttpRequest : new ActiveXObject('Microsoft.XMLHTTP');

        var url= './models/periodos/edit-periodo.php?idperiodo='+idperiodo;
        request.open('GET', url, true);
        request.send();
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                var data = JSON.parse(request.responseText);
                if(data.status){

                    document.querySelector('#idperiodo').value = data.data.periodo_id;
                    document.querySelector('#nombre').value = data.data.nombre_periodo;
                    document.querySelector('#listEstado').value = data.data.estado;

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
                swal('Eliminar',data.msg,'success');
                tableperiodos.ajax.reload();
             }else{
                 swal('Atención',data.msg,'error');
             }
         }
     } 
        }
    })
}