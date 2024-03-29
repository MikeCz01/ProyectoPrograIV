<?php
 require_once '../../../includes/conexion.php';

 if(!empty($_POST)){
    if(empty($_POST['nombre'])){
        $respuesta = array('status' => false, 'msg' => 'Todos los campos son necesarios');
    }else{
        $idactividad = $_POST['idactividad'];
        $nombre = $_POST['nombre'];
        $startdate = $_POST['startdate'];
        $enddate = $_POST['enddate'];
        $listDia = $_POST['listDia'];
        $estado = $_POST['listEstado'];

       

        $sql = 'SELECT * FROM actividad WHERE nombre_actividad = ? AND actividad_id !=? AND estado !=0';
        $query = $pdo->prepare($sql);
        $query->execute(array($nombre,$idactividad));
        $result = $query -> fetch(PDO::FETCH_ASSOC);

        if($result > 0){
            $respuesta = array('status' => false, 'msg' => 'Actividad Existente'); 
         }else{
             if($idactividad == ""){
                 $sqlInsert = 'INSERT INTO actividad (nombre_actividad,estado,startdate,enddate, allday) VALUES (?,?,?,?,?)';
                 $queryInsert = $pdo -> prepare($sqlInsert);
                 $request = $queryInsert -> execute(array($nombre,$estado,$startdate,$enddate, $listDia));
                 $accion = 1;
             }else{
                     $sqlUpdate = 'UPDATE actividad SET nombre_actividad = ?, estado =?, startdate=?, enddate=?, allday=? WHERE actividad_id =?';
                     $queryUpdate = $pdo -> prepare($sqlUpdate);
                     $request = $queryUpdate -> execute(array($nombre,$estado,$startdate,$enddate, $listDia,$idactividad));
                     $accion = 2;
                 
             }
             if($request >0){
                if($accion == 1){
                    $respuesta = array('status' => true, 'msg' => 'Actividad creada correctamente');
                }

                if($accion == 2){
                    $respuesta = array('status' => true, 'msg' => 'Actividad actualizada correctamente');
                }
             }
            }
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
?>