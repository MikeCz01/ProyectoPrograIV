<?php
 require_once '../../../includes/conexion.php';

 if($_POST){
    $idalumnoprofesor = $_POST['id'];

    $sql = "UPDATE alumno_profesor SET estadop = 0 WHERE ap_id = ?";
    $query = $pdo -> prepare($sql);
    $result =$query->execute(array($idalumnoprofesor));

    if($result){
        $respuesta = array('status' => true, 'msg' => 'Proceso eliminado correctamente');
    }else{
        $respuesta = array('status' => false, 'msg' => 'Error al eliminar el proceso');
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
 }
?>