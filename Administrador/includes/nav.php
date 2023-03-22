<?php 
if(!empty($_SESSION['rol'])){

    $rol = $_SESSION['rol'];
}else{
    $rol =1;
}
?>
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="image/admon.png" alt="User">
        <div>
            <p class="app-sidebar__user-name"><?=$_SESSION['nombre'] ?></p>
            <p class="app-sidebar__user-designation">Administrador</p>
        </div>
    </div>
    <ul class="app-menu">
        <li><a class="app-menu__item" href="index.php"><i class="app-menu__icon fa-solid fa-house"></i><span
                    class="app-menu__label">Home</span></a></li>
        <?php if($rol==1 ){ ?>

        <li><a class="app-menu__item" href="lista_usuarios.php"><i class="app-menu__icon fas fa-users"></i><span
                    class="app-menu__label">Usuarios</span></a></li>
        <?php }?>
        <?php if($rol==1 ){ ?>
        <li><a class="app-menu__item" href="lista_profesores.php"><i
                    class="app-menu__icon fas fa-chalkboard-teacher"></i><span
                    class="app-menu__label">Docentes</span></a></li>
        <?php }?>
        <li><a class="app-menu__item" href="lista_alumnos.php"><i class="app-menu__icon fas fa-user-graduate"></i><span
                    class="app-menu__label">Alumnos</span></a>
        </li>
        <li><a class="app-menu__item" href="lista_grados.php"><i class="app-menu__icon fas fa-chalkboard-teacher"></i><span
                    class="app-menu__label">Grados</span></a></li>
        <li><a class="app-menu__item" href="lista_aulas.php"><i class="app-menu__icon fas fas fa-chalkboard"></i><span
                    class="app-menu__label">Aulas</span></a></li>
        <li><a class="app-menu__item" href="lista_materias.php"><i class="app-menu__icon fas fa-book-open"></i><span
                    class="app-menu__label">Materias</span></a></li>
        <li><a class="app-menu__item" href="lista_periodos.php"><i class="app-menu__icon fas fa-book-reader"></i><span
                    class="app-menu__label">Periodos</span></a></li>
       
        <li><a class="app-menu__item" href="lista_profesor_materia.php"><i
                    class="app-menu__icon fa-solid fa-person-chalkboard"></i><span class="app-menu__label">Procesos
                    Docentes</span></a>
        </li>
        <li><a class="app-menu__item" href="lista_alumno_profesor.php"><i
                    class="app-menu__icon fa-sharp fa-solid fa-graduation-cap"></i><span
                    class="app-menu__label">Procesos Alumnos</span></a>
        </li>
        <li><a class="app-menu__item" href="../logout.php"><i class="app-menu__icon fas fa-sign-out"></i><span
                    class="app-menu__label">Log Out</span></a></li>
    </ul>
</aside>