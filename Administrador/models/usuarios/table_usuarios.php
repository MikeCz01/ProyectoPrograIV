<?php
    require_once '../../../includes/conexion.php';

    $sql = 'SELECT * FROM usuarios WHERE estado !=0';
    $query = $pdo -> prepare($sql);
    $query -> execute();

    $consulta = $query -> fetchAll(PDO::FETCH_ASSOC);
     for($i=0;$i<count($consulta);$i++) {
        if($consulta[$i]['estado'] == 1) {
            $consulta[$i]['estado']= '<'
        }
     }
?>     