  <?php
  require_once '../includes/conexion.php';
  
  $idprofesor = $_SESSION['profesor_id'];

  $sql = "SELECT * FROM profesor_materia as pm INNER JOIN grados as g on pm.grado_id = g.grado_id inner join aulas as a on pm.aula_id = a.aula_id inner join profesor as p on pm.profesor_id = p.profesor_id inner join materias as m on pm.materia_id = m.materia_id where pm.estadopm !=0 and pm.profesor_id = ?";
$query = $pdo->prepare($sql);
$query->execute(array($idprofesor));
$row = $query->rowCount();

$sqln = "SELECT * FROM profesor_materia as pm INNER JOIN grados as g on pm.grado_id = g.grado_id inner join aulas as a on pm.aula_id = a.aula_id inner join profesor as p on pm.profesor_id = p.profesor_id inner join materias as m on pm.materia_id = m.materia_id where pm.estadopm !=0 and pm.profesor_id = ?";
$queryn = $pdo->prepare($sqln);
$queryn->execute(array($idprofesor));
$rown = $queryn->rowCount();

   ?>

  <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="image/docente.png" alt="User Image">
          <div>
              <p class="app-sidebar__user-name"><?=$_SESSION['nombre'] ?></p>
              <p class="app-sidebar__user-designation">Profesor</p>
          </div>
      </div>
      <ul class="app-menu">
          <li><a class="app-menu__item" href="index.php">
          <i class="app-menu__icon fa fa-home"></i><span class="app-menu__label">Inicio</span></a></li>
          <li class="treeview">
              <a class="app-menu__item" href="#" data-toggle="treeview">
                  <i class="app-menu__icon fas fa-chalkboard-teacher"></i>
                  <span class="app-menu__label">Mis Cursos</span>
                  <i class="treeview-indicator fa fa-angle-right"></i>
              </a>
              <ul class="treeview-menu">
                  <?php if ($row > 0) {
    while ($data = $query->fetch()) {
      ?>
                  <li><a class="treeview-item" href="contenido.php?curso=<?=$data['pm_id']?>"><i
                              class="icon fa fa-circle-o"></i><?= $data['nombre_materia']; ?> - <?=
      $data['nombre_grado']; ?> - <?= $data['nombre_aula']; ?></a></li>
                  <?php }} ?>
              </ul>
          </li>

          <li class="treeview">
              <a class="app-menu__item" href="#" data-toggle="treeview">
                  <i class="app-menu__icon fas fa-book-open"></i>
                  <span class="app-menu__label">Calificaciones</span>
                  <i class="treeview-indicator fa fa-angle-right"></i>
              </a>
              <ul class="treeview-menu">
                  <?php if ($rown > 0) {
    while ($datan = $queryn->fetch()) {
      ?>
                  <li><a class="treeview-item" href="notas.php?curso=<?=$datan['pm_id']?>"><i
                              class="icon fa fa-circle-o"></i><?= $datan['nombre_materia']; ?> - <?=
      $datan['nombre_grado']; ?> - <?= $datan['nombre_aula']; ?></a></li>
                  <?php }} ?>
              </ul>
          </li>


          <li><a class="app-menu__item" href="../logout.php"><i class="app-menu__icon fas fa-sign-out"></i><span
                      class="app-menu__label">Log Out</span></a></li>
      </ul>
  </aside>