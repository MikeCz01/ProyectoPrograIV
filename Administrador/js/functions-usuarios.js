$('#tableusuarios').DataTable();
var tableusuarios;
document.addEventListener('DOMContentLoaded', function(){
    tableusuarios = $('#tableusuarios').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar MENU registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando un total de TOTAL registros",
            "sInfoEmpty":      "Mostrando un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de MAX registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            }
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
            {"data":"rol"},
            {"data":"estado"}
        ],
        "responsive": true,
        "bDestroy":true,
        "iDisplayLength":10,
        "order": [[0,"asc"]]
    })
})


function openModal(){
  $('#modalUsuario').modal('show');   
}