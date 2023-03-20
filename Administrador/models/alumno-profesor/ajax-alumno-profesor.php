<?php
 require_once '../../../includes/conexion.php';

 if(!empty($_POST)){
    if(empty($_POST['listAlumno']) || empty($_POST['listProfesor']) || empty($_POST['listPeriodo'])){
        $respuesta = array('status' => false, 'msg' => 'Todos los campos son necesarios');
    }else{
        $idalumnoprofesor = $_POST['idalumnoprofesor'];
        $profesor = $_POST['nombre'];
        $alumno = $_POST['listAlumno'];
        $periodo = $_POST['listPeriodo'];
        $status = $_POST['listEstado'];
       
        $sql = 'SELECT * FROM alumno_profesor WHERE alumno_id = ? AND pm_id = ?  AND estadop !=0';
        $query = $pdo->prepare($sql);
        $query->execute(array($alumno,$profesor,$periodo));
        $resultInsert = $query -> fetch(PDO::FETCH_ASSOC);
        
        $sql2 = 'SELECT * FROM alumno_profesor WHERE alumno_id = ? AND pm_id = ?  AND estadop !=0 AND ap_id != ?';
        $query2 = $pdo->prepare($sql2);
        $query2->execute(array($alumno,$profesor,$periodo,$idalumnoprofesor));
        $resultUpdate = $query2 -> fetch(PDO::FETCH_ASSOC);

        if($resultInsert > 0){
            $arrResponse = array('status' => false, 'msg' => 'Datos Existentes, seleccione otros');
        }else{
            if($idprofesormateria == ""){
                $sql_insert = 'INSERT INTO profesor_materia (alumno_id,pm_id,periodo_id,estadop) VALUES (?,?,?,?)';
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