<?php
 require_once '../../../includes/conexion.php';

 if($_POST){
    $idgrado = $_POST['idgrado'];

    $sql = "UPDATE grados SET estado = 0 WHERE grado_id = ?";
    $query = $pdo -> prepare($sql);
    $result =$query->execute(array($idgrado));

    if($result){
        $respuesta = array('status' => true, 'msg' => 'Grado eliminado correctamente');
    }else{
        $respuesta = array('status' => false, 'msg' => 'Error al eliminar el grado');
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
 }
?>