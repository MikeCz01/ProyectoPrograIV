<?php
if(!empty($_get['curso']) || !empty($_get['curso']))
{
    $curso= $_GET['curso'];
    $contenido= $_GET['contenido'];
} else {
    header("location: profesor/");
}
require_once 'includes/header.php';
require_once '../includes/conexion.php';
 require_once 'includes/modals/modal-contenido.php';

 $idProfesor = $_SESSION['profesor_id'];

$sql = "select *, date_format(fecha,'%d/%m/%Y as fecha' from evaluaciones where contenido_id = $contenido";
$query = $pdo->prepare($sql);
$query->execute();
$row = $query->rowCount();
?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Asignar Evaluacion</h1>
            <button class="btn btn-success" type="button" onclick="openModalEvaluacion()">Nuevo Evaluacion</button>
            <br>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Asignar Evaluacion</a></li>
        </ul>
    </div>
    <div class="row">
        <?php if($row > 0 ){
            while($data = $query->fetch()){
            ?>
        <div class="col-md-12">
            <div class="tile">
                <div class="tile">
                    <div class="tile-tile-w-btn">
                        <h3 class="title"><?=$data['titulo']; ?></h3>
                        <p><button class="btn btn-info-btn"
                                onclick="editarEvaluacion(<?= $data['evaluacion_id']; ?>)"><?=$data['evaluacion_id']; ?>)"><i
                                    class="fa fa-edit"></i>Editar Evaluacion</i>
                            </button> <button class="btn btn-danger icon-btn"
                                onclick="eliminarEvaluacion(<?= $data['evaluacion_id'] ?>)"><i
                                    class="fa fa-delet"></i>Eliminar Evaluacion</button>
                            <a class="btn btn-warning icon-btn"
                                href="entregas.php?curso=<?= $data['pm_id']; ?>&eva=<?= $data['evaluacion_id']; ?>"><i
                                    class="fa fa-edit"></i>Ver Entregas</a>
                        </p>
                    </div>
                    <div class="tile-body">
                        <b><?= $data['descripcion']; ?></b><br><br>
                        <b>Fecha: <kbd class= "bg-info"><?= $data['fecha']; ?></kbd></b><br><br>
                        <b>Valor: <?= $data['porcentaje']; ?></b>
                    </div>
                </div>
            </div>
        </div>
        <?php } }?>
    </div>
    <div class="row">
        <a href="contenido.php?curso=" <?= $curso ?>class="btn btn-info">
            << Volver Atras</a>
    </div>
</main>
<?php
 require_once 'includes/footer.php';
?>