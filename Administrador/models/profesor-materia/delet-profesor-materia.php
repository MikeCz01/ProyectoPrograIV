<?php
 require_once '../../../includes/conexion.php';

 if($_POST){
    $idprofesormateria = $_POST['id'];

    $sql = "UPDATE profesor_materia SET estadopm = 1 WHERE pm_id = ?";
    $query = $pdo -> prepare($sql);
    $result =$query->execute(array($idprofesormateria));

    if($result){
        $respuesta = array('status' => true, 'msg' => 'Proceso eliminado correctamente');
    }else{
        $respuesta = array('status' => false, 'msg' => 'Error al eliminar el proceso');
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
 }
?>