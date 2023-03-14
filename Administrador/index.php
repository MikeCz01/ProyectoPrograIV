<?php
require_once 'includes/header.php';
?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-calendar"></i> Calendario</h1>
          <p>Calendario de Actividades</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Calendario</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile row">
            <div class="col-md-3">
              <div id="external-events">
                <h4 class="mb-4">Eventos Interactivos</h4>
                <div class="fc-event">Evento</div>
                <p class="animated-checkbox mt-20">
                  <label>
                    <input id="drop-remove" type="checkbox"><span class="label-text">Eliminar al soltar</span>
                  </label>
                </p>
              </div>
            </div>
            <div class="col-md-9">
              <div id="calendar"></div>
            </div>
          </div>
        </div>
      </div>
    </main>
<?php
require_once 'includes/footer.php';
?>