  <?php
  require_once '../includes/conexion.php';
  
  $idprofesor = $_SESSION['profesor_id'];

  $sql = "SELECT * FROM profesor_materia as pm INNER JOIN grados as g on pm.grado_id = g.grado_id inner join aulas as a on pm.aula_id = a.aula_id inner join profesor as p on pm.profesor_id = p.profesor_id inner join materias as m on pm.materia_id = m.materia_id where pm.estado !=0 and pm.profesor_id = ?";
$query = $pdo->prepare($sql);
$query->execute(array($idprofesor));
$row = $query->rowCount();
   ?>

  <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="images/user.png" alt="User Image">
          <div>
              <p class="app-sidebar__user-name"><?=$_SESSION['nombre'] ?></p>
              <p class="app-sidebar__user-designation">Profesor</p>
          </div>
      </div>
      <ul class="app-menu">
          <li class="treeview">
              <a class="app-menu_item" href="#" data-toggle="treeview">
                  <i class="app-menu-icon fa fa-laptop"></i>
                  <span class="app-menu_label">Mis Cursos</span>
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
          <li><a class="app-menu__item" href="../logout.php"><i class="app-menu__icon fas fa-sign-out"></i><span
                      class="app-menu__label">Log Out</span></a></li>
      </ul>
  </aside>