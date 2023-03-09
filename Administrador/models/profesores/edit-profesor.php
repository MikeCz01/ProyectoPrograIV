<?php
require_once '../../../includes/conexion.php';

if(!empty($_GET)){
    $idprofesor = $_GET['idprofesor'];

    $sql = 'SELECT * FROM profesor WHERE profesor_id = ?';
    $query = $pdo -> prepare($sql);
    $query -> execute(array($idprofesor));
    $result = $query -> fetch(PDO::FETCH_ASSOC);

    if(empty($result)){
        $respuesta = array('status' => false, 'msg' => 'Datos no encontrados');
    }else{
        $respuesta = array('status' => true, 'data' => $result);
    }
     
    echo json_encode($respuesta, json_UNESCAPED_UNICODE);
}
?>