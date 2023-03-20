<?php
    require_once '../../../includes/conexion.php';

    $sql = 'SELECT * FROM profesor_materia as pm INNER JOIN profesor as p ON pm.profesor_id = p.profesor_id INNER JOIN grados as g On pm.grado_id = g.grado_id INNER JOIN aulas as a ON pm.aula_id = a.aula_id INNER JOIN materias as m ON pm.materia_id = m.materia_id INNER JOIN periodos as pe ON pm.periodo_id = pe.periodo_id WHERE pm.estadopm !=0';
    $query = $pdo->prepare($sql);
    $query->execute();

    $consulta = $query -> fetchAll(PDO::FETCH_ASSOC);
     for($i = 0;$i < count($consulta);$i++) {
        if($consulta[$i]['estadopm'] == 1) {
            $consulta[$i]['estadopm']= '<span class="badge badge-sucess">Activo</span>';
        }else{
            $consulta[$i]['estadopm']= '<span class="badge badge-danger">Inactivo</span>';
        }

        $consulta[$i]['acciones']= '
        <button class="btn btn-primary btn-sm" title="Editar" onclick="editarProfesorMateria('.$consulta[$i]['pm_id'].')">Editar</button>
        <button class="btn btn-danger btn-sm" title="Eliminar" onclick="eliminarProfesorMateria('.$consulta[$i]['pm_id'].')">Eliminar</button>
        ';
     }

     echo json_encode($consulta, JSON_UNESCAPED_UNICODE);
?> 