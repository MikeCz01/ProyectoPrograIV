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

$sqlc = "SELECT * FROM alumno_profesor as ap inner join profesor_materia as pm on ap.pm_id = pm.pm_id INNER JOIN alumnnos as al on ap.alumno_id = al.alumno_id";
$queryc = $pdo->prepare($sqlc);
$queryc->execute();
$rowc = $queryc->rowCount();

?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i>Notas Cargadas</h1>
            <br>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Notas Cargadas</a></li>
        </ul>
    </div>
    <div class="row">
     
        <div class="col-md-12">
            <div class="tile">
                <div class="tile">
                    <div class="title-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Alumno</th>
                                        <th>Ver Notas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($rowc> 0){
                                        while($data->$queryc->fetch()){
                                            ?>
                                    <tr>
                                        <td><?= $data["nombre_alumno"] ?></td>
                                        <td><a class="btn btn-primary btm-sm" title="Ver Notas"
                                                href="list-notas.php?alumno=<?= $data["alumno_id"] ?>$curso=<?= $data["pm_id"] ?>">
                                                <li class="fas fa-list"></li>
                                            </a></td>
                                    </tr>
                                    <?php } }?>
                                </tbody>
                            </table>
                        </div>
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