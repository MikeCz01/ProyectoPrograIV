<?php
 require_once 'includes/header.php';
 require_once 'includes/modals/modal_profesor.php';
?>
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fas fa-chalkboard-teacher"></i> Lista de Docentes</h1>
          <button class= "btn btn-success" type="button" onclick="openModalDocentes()">Nuevo Docente</button>
          <br>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Lista de Docentes</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
          <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tableprofesores">
                  <thead>
                    <tr>
                      <th>Acciones</th>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Dirección</th>
                      <th>Cédula</th>
                      <th>Teléfono</th>
                      <th>Correo</th>
                      <th>Nivel de Est.</th>
                      <th>Estado</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
<?php
 require_once 'includes/footer.php';
?>