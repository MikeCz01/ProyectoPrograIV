<?php
if(!empty($_get['curso']))
{
    $curso= $_GET['curso'];
} else {
    header("location: profesor/");
}
require_once 'includes/header.php';
require_once '../includes/conexion.php';

 $idProfesor = $_SESSION['profesor_id'];

$sql = "SELECT * from alumno_profesor as ap inner join profesor_materia as pm on ap.pm_id = pm.pm_id inner join alumnos as a on ap.alumno = a.alumno_id where pm.pm_id = $curso";
$query = $pdo->prepare($sql);
$query->execute();
$row = $query->rowCount();
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Lista de alumnos</h1>
            <br>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Lista de alumnos</a></li>
        </ul>
    </div>
    <div class="row">
       
        <div class="col-md-12">
            <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tablealumnos">
                  <thead>
                    <tr>
                      <th>ALUMNO</th>
                      <th>CEDULA</th>
                      <th>ULTIMO ACCESO</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if($row > 0 ){
            while($data = $query->fetch()){
                $codAlumno= $data['alumno_id'];
                $sql_acceso = "SELECT u_acceso from alumnos where alumno_id = $codAlumno";
                $query_acceso = $pdo->prepare($sql_acceso);
                $query_acceso->execute();
                $res_acceso = $query_acceso->fetch();
            ?>
                    <tr>
                      <td><?= $data['nombre_alumno']?></td>
                      <td><?= $data['cedula']?></td>
                      <td>
                        <?php
                        if($res_acceso['u_acceso'] == null){
                            echo '<kbd class="badge badge-danger">Nunca</kbd>';
                        }else {
                                echo $res_acceso['u_acceso'];
                        }
                            ?>
                      </td>
                    </tr>
              <?php } }?>
                  </tbody>
                </table>
              </div>
            </div>
            </div>
        </div>
    </div>
    <div class="row">
        <a href="index.php" class="btn btn-info">
            << Volver Atras</a>
    </div>
</main>
<?php
 require_once 'includes/footer.php';
?>