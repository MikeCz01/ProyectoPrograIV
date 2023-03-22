<?php

require_once '../../../includes/conexion.php';

if(!empty($_GET)){
    $idevaluacion = $_GET['idevaluacion'];

    $sql = "SELECT * from evaluaciones where evaluacion_id = ?";
    $query = $pdo->prepare($sql);
    $query->execute(array($idevaluacion));
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if(empty($result)){
        $respuesta = array('status' => false, 'msg' =>  'datos no encontrados');
    } else {
        $respuesta = array('status' => true, 'data' => $result);
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}
