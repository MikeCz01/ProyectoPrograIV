<?php
session_start();
if(!empty($_POST)){
    if(empty($_POST['login']) || empty($_POST['pass'])) {
    echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"></button>Todos los campos son
     necesarios</div>';
} else {
 require_once 'conexion.php';
 $login = $_POST['login'];
 $pass = $_POST['pass'];

 $sql = 'SELECT * FROM profesor WHERE cedula = ?';
 $query = $pdo->prepare($sql);
 $query->execute(array($login));
 $result = $query->fetch(PDO::FETCH_ASSOC);

 if($query->rowCount() > 0) {
     if(password_verify($pass, $result['clave'])) {
        if($result['estado'] == 1) {
            $_SESSION['activeP'] = true;
            $_SESSION['profesor_id'] = $result['profesor_id'];
            $_SESSION['nombre'] = $result['nombre'];
            $_SESSION['cedula'] = $result['cedula'];
            
         echo '<div class="alert alert-success"><button type="button" class-close" data-dismiss?"alert"></button>Redirecting</div>';
        }else{
            echo '<div class="alert alert-warning"><button type="button" class-close" data-dismiss?"alert"></button>Usuario Inactivo, comuniquese con el admininstrador</div>';
        }
         
 }
 else{
     echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"></button>Usuario o Clave
     incorrectos </div>';
}
  } else {
     echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"></button>Usuario o Clave
     incorrectos </div>';
}
}
}
?>
