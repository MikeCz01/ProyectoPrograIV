<?php
session_start();
if(!empty($_POST)){
    if(empty($_POST['login']) || empty($_POST['pass'])) {
    echo '<div class="alert alert-danger">Todos los campos son
     necesarios</div>';
} else {
 require_once 'conexion.php';
 $login = $_POST['login'];
 $pass = $_POST['pass'];

 $sql = 'SELECT * FROM usuarios as u INNER JOIN rol as r ON u.rol = r.rol_id WHERE u.usuario = ? AND u.estado !=0';
 $query = $pdo->prepare($sql);
 $query->execute(array($login));
 $result = $query->fetch(PDO::FETCH_ASSOC);

 if($query->rowCount() > 0) {
     if(password_verify($pass, $result['clave'])) {
        if($result['estado'] == 1) {
            $_SESSION['active'] = true;
            $_SESSION['id_usuario'] = $result['usuario_id'];
            $_SESSION['nombre'] = $result['nombre'];
            $_SESSION['rol'] = $result['rol_id'];
            $_SESSION['nombre_rol'] = $result['nombre_rol'];
            
         echo '<div class="alert alert-success">Redirecting</div>';
        }else{
            echo '<div class="alert alert-warning">Usuario Inactivo, comuniquese con el admininstrador</div>';
        }
         
 }
 else{
     echo '<div class="alert alert-danger">Usuario o Clave
     incorrectos </div>';
}
  } else {
     echo '<div class="alert alert-danger">Usuario o Clave
     incorrectos </div>';
}
}
}
?>
