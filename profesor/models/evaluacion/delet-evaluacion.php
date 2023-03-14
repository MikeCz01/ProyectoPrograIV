<?php

require_once '../../../includes/conexion.php';

if($_POST){
    $idcontenido = $_POST['idevaluacion'];


    if(empty($data2)){
        $sql_update = "delete from evaluaciones where evaluacion_id = ?";
        $query_update = $pdo -> prepare($query_update);
        $request = $query_update -> execute(array($idevaluacion));
         
        if($result){
            $arrResponse = array('status' => true, 'msg' =>  'Eliminado Correctamente');
        } else {
            $arrResponse = array('status' => false, 'msg' =>  'Error al Eliminar');
        }
    } else{
            $arrResponse = array('status' => false, 'msg' =>  'No se puede eliminar, ya tiene una evaluacion asignada');
        }
        echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
    }