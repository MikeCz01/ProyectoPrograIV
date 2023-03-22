<?php

require_once '../../../includes/conexion.php';

if(!empty($_POST)){
    if(trim($_POST['nota']) == ''){
        $respuesta = array('status' => false, 'msg' =>  'Todos los campos son necesarios');
    } else {

    $ideventregada = $_POST['ideventregada'];
    $nota = $_POST['nota'];

         $sqlInsert = 'INSERT INTO notas (ev_entregadas_id,valor_nota) VALUES (?,?)';
         $queryInsert = $pdo -> prepare($sqlInsert);
         $request = $queryInsert -> execute(array($ideventregada,$nota));
    
       
            if($request >0){
                    $respuesta = array('status' => true, 'msg' => 'Evaluacion creado correctamente');
                }else{
                    $respuesta = array('status' => false, 'msg' => 'Error al guardar nota');
                }
             
         }
        echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
    }