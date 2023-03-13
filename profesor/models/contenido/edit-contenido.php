<?php

require_once '../../../includes/conexion.php';

if(!empty($_GET)){
    $idcontenido = $_GET['idcontenido'];

    $sql = "Select * from contenidos where contenido_id = ?";
    $query = $pdo->prepare($sql);
    $query->execute(array($idcontenido));
    $data = $query->fetch(PDO::FETCH_ASSOC);

    if(empty($result));{
        $respuesta = array('status' => false, 'msg' =>  'datos no encontrados');
    } else {
        $respuesta = array('status' => false, 'data' => $result);
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}
