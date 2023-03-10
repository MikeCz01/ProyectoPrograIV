<?php
 require_once '../../../includes/conexion.php';

 if($_POST){
    $idaula = $_POST['idaula'];

    $sql = "UPDATE aulas SET estado = 0 WHERE aula_id = ?";
    $query = $pdo -> prepare($sql);
    $result =$query->execute(array($idaula));

    if($result){
        $respuesta = array('status' => true, 'msg' => 'Aula eliminada correctamente');
    }else{
        $respuesta = array('status' => false, 'msg' => 'Error al eliminar el aula');
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
 }
?>