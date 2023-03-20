<?php

require_once '../../../includes/conexion.php';

if(empty($_GET['idcontenido'])){
    $respuesta = array('status' => false, 'msg' => 'No se pudo leer un id');
}else{
    $idcontenido = $_GET['idcontenido'];
    $sql = "SELECT * from contenidos where contenido_id = ?";
    $query = $pdo->prepare($sql);
    $query->execute(array($idcontenido));
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if($result<0){
        $respuesta = array('status' => false, 'msg' =>  'datos no encontrados');
    } else {
        $respuesta = array('status' => true, 'data' => $result);
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}