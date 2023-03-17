<?php
if(!empty($_get['curso'] || !empty($_get['alumno'])))
{
    $curso= $_GET['curso'];
    $alumno= $_GET['alumno'];
} else {
    header("location: profesor/");
}
require_once 'includes/header.php';
require_once '../includes/conexion.php';
require_once '../includes/funciones.php';


 $idProfesor = $_SESSION['profesor_id'];

$sql = "SELECT * FROM notas as n inner join ev_entregadas as ev_e on n.ev_entregadas_id = ev_e.ev_entregadas_id INNER JOIN alumnnos as al on ev_e.alumno_id = al.alumno_id
INNER JOIN evaluaciones as ev ON ev_e.ev_evaluacion_id = ev.ev_evaluacion_id INNER JOIN contenidos as c ON ev.contenidos_id = c.contenidos_id INNER JOIN 
profesor_materia as pm ON c.pm_id = pm.pm_id WHERE al.alumno_id = $alumno AND pm.pm_id = $curso";
$query = $pdo->prepare($sql);
$query->execute(array($alumno,$curso));
$row = $query->rowCount();

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
                                        <th>Evaluacion</th>
                                        <th>Nota</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($rowc> 0){
                                        while($data->$queryc->fetch()){
                                            ?>
                                    <tr>
                                        <td><?= $data["titulo"] ?></td>
                                        <td>
                                            <?= $data["valor_nota"] ?>
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
            <div class="col-lg-12">
                <div class="bs-component">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span class="tag tag-default tag-pill float-xs-right">
                                <strong>
                                    PROMEDIO: <?= formato(promedio($alumno)); ?>
                                </strong>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <a href="notas.php?curso=<?$curso;?>" class="btn btn-info">
            << Volver Atras</a>
    </div>
</main>
<?php
 require_once 'includes/footer.php';
?>