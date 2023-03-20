<?php
 require_once '../../../includes/conexion.php';

 if(!empty($_POST)){
    if(empty($_POST['nombre']) || empty($_POST['direccion']) || empty($_POST['cedula']) || empty($_POST['telefono']) || empty($_POST['correo']) || empty($_POST['fecha_nac'])){
        $respuesta = array('status' => false, 'msg' => 'Todos los campos son necesarios');
    }else{
        $idalumno = $_POST['idalumno'];
        $nombre = $_POST['nombre'];
        $edad = $_POST['edad'];
        $direccion = $_POST['direccion'];
        $cedula = $_POST['cedula'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $fecha_nac = $_POST['fecha_nac'];
        $fecha_reg = $_POST['fecha_reg'];
        $estado = $_POST['listEstado'];
        $clave = $_POST['clave'];
        $clave = password_hash($clave,PASSWORD_DEFAULT);

       

        $sql = 'SELECT * FROM alumnos WHERE cedula = ? AND alumno_id !=? AND estado !=0';
        $query = $pdo->prepare($sql);
        $query->execute(array($cedula,$idalumno));
        $result = $query -> fetch(PDO::FETCH_ASSOC);
        $accion = 0;
        if($result > 0){
            $respuesta = array('status' => false, 'msg' => 'Alumno Existente'); 
         }else{
             if($idalumno == ""){
                 $sqlInsert = 'INSERT INTO alumnos (nombre_alumno,edad,direccion,cedula,telefono,correo,fecha_nac,fecha_reg,estado,clave) VALUES (?,?,?,?,?,?,?,?,?,?)';
                 $queryInsert = $pdo -> prepare($sqlInsert);
                 $request = $queryInsert -> execute(array($nombre,$edad,$direccion,$cedula,$telefono,$correo,$fecha_nac,$fecha_reg, $estado, $clave));
                 $accion = 1;
             }else{
                     $sqlUpdate = 'UPDATE alumnos SET nombre_alumno = ?, edad = ?, direccion = ?, cedula = ?, telefono = ?, correo = ?, fecha_nac = ?, fecha_reg = ?, estado = ?, clave = ? WHERE alumno_id =?';
                     $queryUpdate = $pdo -> prepare($sqlUpdate);
                     $request = $queryUpdate -> execute(array($nombre,$edad,$direccion,$cedula,$telefono,$correo,$fecha_nac,$fecha_reg, $estado,$clave,$idalumno));
                     $accion = 2;
                 
             }
             if($request >0){
                if($accion == 1){
                    $respuesta = array('status' => true, 'msg' => 'Alumno creado correctamente');
                }

                if($accion == 2){
                    $respuesta = array('status' => true, 'msg' => 'Alumno actualizado correctamente');
                }
                
             }
            }
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
?>