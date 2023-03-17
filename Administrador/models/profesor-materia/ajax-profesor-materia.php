<?php
 require_once '../../../includes/conexion.php';

 if(!empty($_POST)){
    if(empty($_POST['listProfesor']) || empty($_POST['listGrado']) || empty($_POST['listAula']) || empty($_POST['listMateria']) || empty($_POST['listPeriodo'])){
        $respuesta = array('status' => false, 'msg' => 'Todos los campos son necesarios');
    }else{
        $idprofesormateria = $_POST['idprofesormateria'];
        $profesor = $_POST['nombre'];
        $grado = $_POST['listGrado'];
        $aula = $_POST['listAula'];
        $materia = $_POST['listMateria'];
        $periodo = $_POST['listPeriodo'];
        $status = $_POST['listEstado'];
       
        $sql = 'SELECT * FROM profesor_materia WHERE profesor_id = ? AND grado_id = ? AND aula_id =? AND materia_id =? AND periodo_id =? AND estadopm !=0';
        $query = $pdo->prepare($sql);
        $query->execute(array($profesor,$grado.$aula,$materia,$periodo));
        $resultInsert = $query -> fetch(PDO::FETCH_ASSOC);
        
        $sql2 = 'SELECT * FROM profesor_materia WHERE profesor_id = ? AND grado_id = ? AND aula_id =? AND materia_id =? AND periodo_id =? AND estadopm !=0 AND pm_id != ?';
        $query2 = $pdo->prepare($sql2);
        $query2->execute(array($profesor,$grado.$aula,$materia,$periodo,$idprofesormateria));
        $resultUpdate = $query2 -> fetch(PDO::FETCH_ASSOC);

        if($resultInsert > 0){
            $arrResponse = array('status' => false, 'msg' => 'Datos Existentes, seleccione otros');
        }else{
            if($idprofesormateria == ""){
                $sql_insert = 'INSERT INTO profesor_materia (profesor_id, grado_id, aula_id, materia_id, periodo_id, estadopm) VALUES (?,?,?,?,?,?)';
                $query_insert = $pdo->prepare($sql_insert);
                if($request){
                    $arrResponse = array('status' => true, 'msg' => 'Proceso creado correctamente');
                }
            }
        }
        if($resultUpdate > 0){
            $arrResponse = array('status' => false, 'msg' => 'Datos Existentes, seleccione otros');
        }else{
            if($idprofesormateria == ""){
                $sql_update = 'UPDATE profesor_materia SET profesor_id=?,grado_id =?, aula_id = ?, materia_id =?, periodo_id =?, estadopm = ? WHERE pm_id = ?';
                $query_update = $pdo->prepare($sql_update);
                $reqquest2 = $query_update -> execute(array($profesor,$grado,$aula,$materia,$periodo,$status,$idprofesormateria));
                if($reqquest2){
                    $arrResponse = array('status' => true, 'msg' => 'Proceso actualizado correctamente');
                }
            }

        }

    }
    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
}
?>