
<?php
require_once '../../../includes/conexion.php';


    $sql = 'SELECT * FROM actividad WHERE estado !=0';
    $query = $pdo -> prepare($sql);
    $query -> execute();
    $result = $query -> fetchAll(PDO::FETCH_ASSOC);
    if(empty($result)){
        $respuesta = array('status' => false, 'msg' => 'Datos no encontrados');
    }else{
    
        $respuesta = array('status' => true, 'data' => $result);
    }
     
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
?>