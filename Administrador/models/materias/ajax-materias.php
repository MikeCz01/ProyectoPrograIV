<?php
 require_once '../../../includes/conexion.php';

 if(!empty($_POST)){
    if(empty($_POST['nombre'])){
        $respuesta = array('status' => false, 'msg' => 'Todos los campos son necesarios');
    }else{
        $idmateria = $_POST['idmateria'];
        $nombre = $_POST['nombre'];
        $estado = $_POST['listEstado'];

       

        $sql = 'SELECT * FROM materias WHERE nombre_materia = ? AND materia_id !=? AND estado !=0';
        $query = $pdo->prepare($sql);
        $query->execute(array($nombre,$idmateria));
        $result = $query -> fetch(PDO::FETCH_ASSOC);

        if($result > 0){
            $respuesta = array('status' => false, 'msg' => 'Materia Existente'); 
         }else{
             if($idmateria == ""){
                 $sqlInsert = 'INSERT INTO materias (nombre_materia,estado) VALUES (?,?)';
                 $queryInsert = $pdo -> prepare($sqlInsert);
                 $request = $queryInsert -> execute(array($nombre,$estado));
                 $accion = 1;
             }else{
                     $sqlUpdate = 'UPDATE materias SET nombre_materia = ?, estado =? WHERE materia_id =?';
                     $queryUpdate = $pdo -> prepare($sqlUpdate);
                     $request = $queryUpdate -> execute(array($nombre,$estado,$idmateria));
                     $accion = 2;
                 
             }
             if($request >0){
                if($accion == 1){
                    $respuesta = array('status' => true, 'msg' => 'Materia creada correctamente');
                }

                if($accion == 2){
                    $respuesta = array('status' => true, 'msg' => 'Materia actualizada correctamente');
                }
             }
            }
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
?>