<?php
require_once 'includes/header.php';
require_once '../includes/conexion.php';

$idprofesor = $_SESSION['profesor_id'];

$sql = "SELECT * FROM profesor_materia as pm INNER JOIN grados as g on pm.grado_id = g.grado_id inner join aulas as a on pm.aula_id = a.aula_id inner join profesor as p on pm.profesor_id = p.profesor_id inner join materias as m on pm.materia_id = m.materia_id where pm.estadopm != 0 and pm.profesor_id = ?";
$query = $pdo->prepare($sql);
$query->execute(array($idprofesor));
$row = $query->rowCount();

?>
<main class="app-content">
    <div class="row">
        <div class="col-md-12 border shadow p-2 bg-info text-white">
            <h3 class="display-4">ROYAL LEGACY</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center border mt-3 p-4 bg-light">
            <h4>Mis Cursos</h4>
        </div>
    </div>
    <div class="row">
        <?php if ($row > 0) {
        while ($data = $query->fetch()) {
          ?>
        <div class="col-md-4 text-center border mt-3 p-4 bg-light">
            <div class="card m-2 shadow">
                <img src="image/grado.jpg" class="card-imag-top" alt="...">
                <div class="card-body">
                    <h4 class="card-title text center"><?= $data['nombre_materia'] ?></h4>
                    <h5 class="card-title">Grado<kbd class="bg-info"><?= $data['nombre_grado'] ?></kbd> - Aula <kbd
                            class="bg-info"><?= $data
              ['nombre_aula'] ?></kbd></h5>
                    <a href="contenido.php?curso=<?= $data['pm_id'] ?>" class="btn btn-primary">Acceder</a>
                    <a href="alumnos.php?curso=<?= $data['pm_id'] ?>" class="btn btn-primary">Ver Alumnos</a>
                </div>
            </div>
        </div>
        <?php } } ?>
    </div>
</main>
<?php
require_once 'includes/footer.php';
?>