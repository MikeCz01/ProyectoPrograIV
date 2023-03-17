<!-- Essential javascripts for application to work-->
<script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
	<script type="text/javascript" src="../js/plugins/jquery-ui.custom.min.js"></script>
	<script type="text/javascript" src="../js/plugins/moment.min.js"></script>
	<script type="text/javascript" src="../js/plugins/fullcalendar.min.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../js/plugins/pace.min.js"></script>
    <script type="text/javascript" src="../js/plugins/sweetalert.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Google analytics script-->
    <!-- Data table plugin-->
    <script type="text/javascript" src="../js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/plugins/dataTables.bootstrap.min.js"></script>
	<script src='../js/plugins/index.global.js'></script>
	<script src='../js/locales/es.global.js'></script>
    <script src="js/functions-usuarios.js"></script>
    <script src="js/functions-profesores.js"></script>
    <script src="js/functions-alumnos.js"></script>
    <script src="js/functions-grados.js"></script>
    <script src="js/functions-aula.js"></script>
    <script src="js/functions-materia.js"></script>
    <script src="js/functions-periodos.js"></script>
    <script src="js/functions-actividades.js"></script>
    <script src="js/functions-profesor-materia.js"></script>
    <script src="../js/login.js"></script>
	<script>

document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    initialDate: '2023-01-12',
    locale: 'es', // establece el idioma español
    navLinks: true, // can click day/week names to navigate views
    selectable: true,
    selectMirror: true,
    select: function(arg) {
      var title = prompt('Agregar Evento:');
      if (title) {
        calendar.addEvent({
          title: title,
          start: arg.start,
          end: arg.end,
          allDay: arg.allDay
        })
      }
      calendar.unselect()
    },
    eventClick: function(arg) {
      if (confirm('¿Deseas eliminar el evento?')) {
        arg.event.remove()
      }
    },
    editable: true,
    dayMaxEvents: true, // allow "more" link when too many events
    events: [
    ]
  });

  calendar.render();
});
</script>
<style>

  body {
    margin: 40px 40px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #calendar {
	max-height: 700px;
    max-width: 1000px;
    margin: 0 auto 0 300px;
	margin-top: 100px;
  }

</style>