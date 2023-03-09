<?php
 require_once '../../../includes/conexion.php';

 if($_POST){
    $idusario = $_POST['idususario'];

    $sql = "UPDATE usuarios SER estado = 0 WHERE usuario_id = ?";
    $query = $pdo -> prepare($sql);
    $result =$query->execute(array($idusario));

    if($result){
        $respuesta = array('status' => true, 'msg' => 'Usuario eliminado correctamente');
    }else{
        $respuesta = array('status' => false, 'msg' => 'Error al eliminar el usuario');
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
 }
?>