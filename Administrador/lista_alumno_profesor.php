<?php
 require_once 'includes/header.php';
 require_once 'includes/modals/modal_alumno_profesor.php';
?>
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fas fa-chalkboard-teacher"></i> Lista de Procesos Alumnos</h1>
          <button class= "btn btn-success" type="button" onclick="openModalAlumnoProfesor()">Nuevo Proceso Alumno</button>
          <br>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Lista de Procesos Alumnos</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
          <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tablealumnoprofesor">
                  <thead>
                    <tr>
                      <th>Acciones</th>
                      <th>ID</th>
                      <th>Nombre del Alumno</th>
                      <th>Nombre del Docente</th>
                      <th>Grado</th>
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