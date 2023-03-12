<?php
 require_once '../../../includes/conexion.php';

 if(!empty($_POST)){
    if(empty($_POST['nombre']) || empty($_POST['usuario'])){
        $respuesta = array('status' => false, 'msg' => 'Todos los campos son necesarios');
    }else{
        $idusuario = $_POST['idusuario'];
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $rol = $_POST['listRol'];
        $estado = $_POST['listEstado'];

        $clave = password_hash($clave,PASSWORD_DEFAULT);

        $sql = 'SELECT * FROM usuarios WHERE usuario = ? and usuario_id !=?';
        $query = $pdo->prepare($sql);
        $query->execute(array($usuario, $idusuario));
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $accion = 0;
        if($result>0){
            $respuesta = array('status' => false, 'msg' => 'El usuario ya Existe');
        }else{

   
            if($idusuario == ""){
                $sqlInsert = 'INSERT INTO usuarios (nombre, usuario, clave, rol, estado) VALUES (?,?,?,?,?)';
                $queryInsert = $pdo -> prepare($sqlInsert);
                $request = $queryInsert -> execute(array($nombre, $usuario, $clave, $rol, $estado));
                $accion = 1;
            }else{
                if(empty($clave)){
                    $sqlUpdate = 'UPDATE usuarios SET nombre = ?, usuario = ?, rol = ?, estado = ? WHERE usuario_id =?';
                    $queryUpdate = $pdo -> prepare($sqlUpdate);
                    $request = $queryUpdate -> execute(array($nombre, $usuario, $rol, $estado, $idusuario));
                    $accion = 2;
                }
                else{
                    $sqlUpdate = 'UPDATE usuarios SET nombre = ?, usuario = ?, clave = ?, rol = ?, estado =? WHERE usuario_id =?';
                    $queryUpdate = $pdo -> prepare($sqlUpdate);
                    $request = $queryUpdate -> execute(array($nombre, $usuario, $clave, $rol, $estado, $idusuario));
                    $accion = 2; 
                }
            }
            if($request > 0){
             
                   
              
                if($accion == 1){
                    $respuesta = array('status' => true, 'msg' => 'Usuario creado correctamente');
                }

                if($accion == 2){
                    $respuesta = array('status' => true, 'msg' => 'Usuario actualizado correctamente');
                }
                
                if($accion == 0){

                    $respuesta = array('status' => false, 'msg' => 'Ocurrio un problema');
                }
                
             }
            }
            
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
}
?>