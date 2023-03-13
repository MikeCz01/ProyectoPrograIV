<?php
 require_once 'includes/header.php';
 require_once 'includes/modals/modal_materias.php';
?>
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fas fa-list-alt"></i> Lista de Materias</h1>
          <button class= "btn btn-success" type="button" onclick="openModalMaterias()">Nueva Materia</button>
          <br>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Lista de Materias</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
          <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tablematerias">
                  <thead>
                    <tr>
                      <th>Acciones</th>
                      <th>ID</th>
                      <th>Nombre de la Materia</th>
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