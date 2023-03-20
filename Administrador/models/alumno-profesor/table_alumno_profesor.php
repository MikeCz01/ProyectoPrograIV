<?php
    require_once '../../../includes/conexion.php';

    $sql = 'SELECT * FROM alumno_profesor as ap INNER JOIN alumnos as a ON ap.alumno_id = a.alumno_id INNER JOIN profesor_materia as pm On ap.pm_id = pm.pm_id INNER JOIN aulas as au ON pm.aula_id = au.aula_id INNER JOIN materias as m ON pm.materia_id = m.materia_id INNER JOIN periodos as pe ON ap.periodo_id = pe.periodo_id INNER JOIN grados as g ON pm.grado_id = g.grado_id INNER JOIN profesor as p ON pm.profesor_id = p.profesor_id WHERE ap.estadop !=0';
    $query = $pdo -> prepare($sql);
    $query ->execute();

    $consulta = $query -> fetchAll(PDO::FETCH_ASSOC);
     for($i = 0;$i < count($consulta);$i++) {
        if($consulta[$i]['estadop'] == 1) {
            $consulta[$i]['estadop']= '<span class="badge badge-sucess">Activo</span>';
        }else{
            $consulta[$i]['estadop']= '<span class="badge badge-danger">Inactivo</span>';
        }

        $consulta[$i]['acciones']= '
        <button class="btn btn-primary btn-sm" title="Editar" onclick="editarAlumnoProfesor('.$consulta[$i]['ap_id'].')">Editar</button>
        <button class="btn btn-danger btn-sm" title="Eliminar" onclick="eliminarAlumnoProfesor('.$consulta[$i]['ap_id'].')">Eliminar</button>
        ';
     }

     echo json_encode($consulta, JSON_UNESCAPED_UNICODE);
?> 