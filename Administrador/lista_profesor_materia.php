<?php
 require_once 'includes/header.php';
 require_once 'includes/modals/modal_profesor_materia.php';
?>
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa-solid fa-person-chalkboard"></i> Lista de Procesos Docentes</h1>
          <button class= "btn btn-success" type="button" onclick="openModalDocenteMateria()">Nuevo Proceso</button>
          <br>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Lista de Procesos</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
          <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tableprofesoresmaterias">
                  <thead>
                    <tr>
                      <th>Acciones</th>
                      <th>ID</th>
                      <th>Nombre del Docente</th>
                      <th>Grado</th>
                      <th>Aula</th>
                      <th>Materia</th>
                      <th>Periodo</th>
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