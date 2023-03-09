<?php
 require_once '../../../includes/conexion.php';

 if(!empty($_POST)){
    if(empty($_POST['nombre']) || empty($_POST['direccion']) || empty($_POST['cedula']) || empty($_POST['telefono']) || empty($_POST['correo']) || empty($_POST['nivel_est'])){
        $respuesta = array('status' => false, 'msg' => 'Todos los campos son necesarios');
    }else{
        $idprofesor = $_POST['idprofesor'];
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $cedula = $_POST['cedula'];
        $clave = $_POST['clave'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $nivel_est = $_POST['nivel_est'];
        $estado = $_POST['listEstado'];

        $clave = password_hash($clave,PASSWORD_DEFAULT);

        $sql = 'SELECT * FROM profesor WHERE cedula = ? AND profesor_id !=? AND estado !=0';
        $query = $pdo->prepare($sql);
        $query->execute(array($cedula,$idprofesor));
        $result = $query -> fetch(PDO::FETCH_ASSOC);

        if($result > 0){
            $respuesta = array('status' => false, 'msg' => 'Docente Existente'); 
         }else{
             if($idprofesor == 0){
                 $sqlInsert = 'INSERT INTO profesor (nombre, direccion, cedula, clave, telefono, correo, nivel_est, estado) VALUES (?,?,?,?,?,?,?,?)';
                 $queryInsert = $pdo -> prepare($sqlInsert);
                 $request = $queryInsert -> execute(array($nombre, $direccion, $cedula $clave, $telefono,$correo,$nivel_est, $estado));
                 $accion = 1;
             }else{
                 if(empty($clave)){
                     $sqlUpdate = 'UPDATE profesor SET nombre = ?, direccion = ?, cedula = ?, telefono = ?, correo = ?, nivel_est = ?, estado =? WHERE profesor_id =?';
                     $queryUpdate = $pdo -> prepare($sqlUpdate);
                     $request = $queryUpdate -> execute(array($nombre, $direccion, $cedula, $telefono,$correo, $nivel_est, $estado, $idprofesor));
                     $accion = 2;
                 }
                 else{
                    $sqlUpdate = 'UPDATE profesor SET nombre = ?, direccion = ?, cedula = ?, clave = ?, telefono = ?, correo = ?, nivel_est = ?, estado =? WHERE profesor_id =?';
                    $queryUpdate = $pdo -> prepare($sqlUpdate);
                    $request = $queryUpdate -> execute(array($nombre, $direccion, $cedula,$clave, $telefono,$correo, $nivel_est, $estado, $idprofesor));
                    $accion = 3;
                 }
             }
             if($request >0){
                if($accion == 1){
                    $respuesta = array('status' => true, 'msg' => 'Docente creado correctamente');
                }else{
                    $respuesta = array('status' => false, 'msg' => 'Docente actualizado correctamente');
                }
             }
            }
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
?>