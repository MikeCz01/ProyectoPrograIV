<?php
 require_once 'includes/header.php';
 require_once 'includes/modals/modal_grado.php';
?>
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fas fa-list-alt"></i> Lista de Grados</h1>
          <button class= "btn btn-success" type="button" onclick="openModalGrados()">Nuevo Grado</button>
          <br>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fas fa-list-alt"></i></li>
          <li class="breadcrumb-item"><a href="#">Lista de Grados</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
          <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tablegrados">
                  <thead>
                    <tr>
                      <th>Acciones</th>
                      <th>ID</th>
                      <th>Nombre del Grado</th>
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