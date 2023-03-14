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
    <script src="js/functions-usuarios.js"></script>
    <script src="js/functions-profesores.js"></script>
    <script src="js/functions-alumnos.js"></script>
    <script src="js/functions-grados.js"></script>
    <script src="js/functions-aula.js"></script>
    <script src="js/functions-materia.js"></script>
    <script src="js/functions-periodos.js"></script>
    <script src="js/functions-actividades.js"></script>
	<script type="text/javascript">
      $(document).ready(function() {
      
      	$('#external-events .fc-event').each(function() {
      
      		// store data so the calendar knows to render an event upon drop
      		$(this).data('event', {
      			title: $.trim($(this).text()), // use the element's text as the event title
      			stick: true // maintain when user navigates (see docs on the renderEvent method)
      		});
      
      		// make the event draggable using jQuery UI
      		$(this).draggable({
      			zIndex: 999,
      			revert: true,      // will cause the event to go back to its
      			revertDuration: 0  //  original position after the drag
      		});
      
      	});
      
      	$('#calendar').fullCalendar({
      		header: {
      			left: 'prev,next today',
      			center: 'title',
      			right: 'month,agendaWeek,agendaDay'
      		},
      		editable: true,
      		droppable: true, // this allows things to be dropped onto the calendar
      		drop: function() {
      			// is the "remove after drop" checkbox checked?
      			if ($('#drop-remove').is(':checked')) {
      				// if so, remove the element from the "Draggable Events" list
      				$(this).remove();
      			}
      		}
      	});
      
      
      });
    </script>
  </body>
</html>