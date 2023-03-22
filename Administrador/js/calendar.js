document.addEventListener("DOMContentLoaded", function () {
  var calendarEl = document.getElementById("calendar");

  var dataActividades;

  var calendar = new FullCalendar.Calendar(calendarEl, {
    headerToolbar: {
      left: "prev,next today",
      center: "title",
      right: "dayGridMonth",
    },
    initialDate: new Date(),
    locale: "es", // establece el idioma español
    navLinks: true, // can click day/week names to navigate views
    selectable: true,
    selectMirror: true,
    select: function (arg) {
        
      const datos = {
        start: arg.start,
        end: arg.end,
        allDay: arg.allDay,
      };
      openModalActividades(datos);
      calendar.unselect();
    },
    eventClick: function (arg) {
      

      eliminarActividad(arg.event.groupId)
    },
    editable: true,
    dayMaxEvents: true, // allow "more" link when too many events
    events: [],
  });

  var request = window.XMLHttpRequest
    ? new XMLHttpRequest()
    : new ActiveXObject("Microsoft.XMLHTTP");
  var url = "./models/actividades/get-all-actividades.php";
  request.open("GET", url, true);
  request.send();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var data = JSON.parse(request.responseText);
      if (data.status) {
        data.data.forEach((dataActividades) => {
          const datos = {
            title: dataActividades.nombre_actividad,
            start: getDateInitial(dataActividades.startdate),
            end: getDateFinal(dataActividades.enddate),
            allDay: dataActividades.allday === 1 ? true : false,
            groupId: dataActividades.actividad_id,
          };
          calendar.addEvent(datos);
          calendar.unselect();
        });
      }
    }
  };

  calendar.render();
});

function getDateInitial(dateInitial) {
  let fechaDate = new Date(dateInitial);
  
  fechaDate.setHours(0, 0, 0, 0);
  return fechaDate;
}

function getDateFinal(dateFinal) {
  let fechaDate = new Date(dateFinal);
  fechaDate.setHours(0, 0, 0, 0);

  return fechaDate;
}

function openModalActividades(datos) {
  const start = datos.start.toISOString().slice(0, 10);
  const end = datos.end.toISOString().slice(0, 10);
  document.querySelector("#tituloModalActividad").innerHTML = "Nueva Actividad";
  document.querySelector("#actionActividad").innerHTML = "Guardar";
  document.querySelector("#startdate").value = start;
  document.querySelector("#enddate").value = end;
  document.querySelector("#idactividad").value = "";

  $("#modalActividad").modal("show");
}

function eliminarActividad(id) {
  var idactividad = id;

  swal(
    {
      title: "Eliminar Actividad",
      text: "¿Desea eliminar esta Actividad?",
      type: "warning",
      showCancelButton: true,
      confirmButtontext: "Si, eliminar",
      cancelbuttontext: "No, cancelar",
      closeOnConfirm: false,
      closeOnCancel: true,
    },
    function (confirm) {
      if (confirm) {
        var request = window.XMLHttpRequest
          ? new XMLHttpRequest()
          : new ActiveXObject("Microsoft.XMLHTTP");

        var url = "./models/actividades/delet-actividad.php";
        request.open("POST", url, true);
        var strData = "idactividad=" + idactividad;
        request.setRequestHeader(
          "Content-type",
          "application/x-www-form-urlencoded"
        );
        request.send(strData);
        request.onreadystatechange = function () {
          if (request.readyState == 4 && request.status == 200) {
            var data = JSON.parse(request.responseText);
            if (data.status) {
              swal("Eliminar", data.msg, "success");
              window.location = "/ProyectoPrograIV/";
            } else {
              swal("Atención", data.msg, "error");
            }
          }
        };
      }
    }
  );
}
