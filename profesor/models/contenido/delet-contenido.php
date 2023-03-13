<?php

require_once '../../../includes/conexion.php';

if($_POST){
    $idcontenido = $_POST['idcontenido'];

    $sql = "Select * from contenidos where contenido_id = ?";
    $query = $pdo->prepare($sql);
    $query->execute(array($idcontenido));
    $data = $query->fetch(PDO::FETCH_ASSOC);

    $sqle = "Select * from evaluaciones where contenido_id = ?";
    $querye = $pdo->prepare($sqle);
    $querye->execute(array($idcontenido));
    $data2 = $query->fetch(PDO::FETCH_ASSOC);

    if(empty($data2)){
        $sql_update = "delete from contenidos where contenido_id = ?";
        $query_update = $pdo -> prepare($query_update);
        $request = $query_update -> execute(array($idcontenido));
         
        if($result){
            if($data['material'] != ''){
                unlink($data['material']);
            }
            $arrResponse = array('status' => true, 'msg' =>  'Eliminado Correctamente');
        } else {
            $arrResponse = array('status' => false, 'msg' =>  'Error al Eliminar');
        }
    } else{
            $arrResponse = array('status' => false, 'msg' =>  'No se puede eliminar, ya tiene una evaluacion asignada');
        }
        echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
    }

