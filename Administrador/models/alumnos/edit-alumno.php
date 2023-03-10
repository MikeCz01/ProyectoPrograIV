<?php
require_once '../../../includes/conexion.php';

if(!empty($_GET)){
    $idalumno = $_GET['idalumno'];

    $sql = 'SELECT * FROM alumnos WHERE alumno_id = ?';
    $query = $pdo -> prepare($sql);
    $query -> execute(array($idalumno));
    $result = $query -> fetch(PDO::FETCH_ASSOC);

    if(empty($result)){
        $respuesta = array('status' => false, 'msg' => 'Datos no encontrados');
    }else{
        $respuesta = array('status' => true, 'data' => $result);
    }
     
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
?>