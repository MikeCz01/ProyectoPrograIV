<?php
require_once '../../../includes/conexion.php';

if(!empty($_GET)){
    $idmateria = $_GET['idmateria'];

    $sql = 'SELECT * FROM materias WHERE materia_id = ?';
    $query = $pdo -> prepare($sql);
    $query -> execute(array($idmateria));
    $result = $query -> fetch(PDO::FETCH_ASSOC);

    if(empty($result)){
        $respuesta = array('status' => false, 'msg' => 'Datos no encontrados');
    }else{
        $respuesta = array('status' => true, 'data' => $result);
    }
     
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
?>