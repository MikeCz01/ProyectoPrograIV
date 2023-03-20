<?php

require_once '../../../includes/conexion.php';

if(!empty($_POST)){
    if(empty($_POST['titulo']) || empty($_POST['descripcion'])){
        $respuesta = array('status' => false, 'msg' =>  'Todos los campos son necesarios');
    } else {

    $idcontenido = $_POST['idcontenido'];
    $idcurso = $_POST['idcurso'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];

    $material = $_FILES['file']['name'];
    $type = $_FILES['file']['type'];
    $url_temp = $_FILES['file']['tmp_name'];

    $directorio = '../../../uploads/'.rand(1000,10000);
    if(!file_exists($directorio)){
        mkdir($directorio, 0777,true);
    }

    $destino = $directorio.'/'.$material;

    $sql = "SELECT * from contenidos where contenido_id = ?";
    $query = $pdo->prepare($sql);
    $query->execute(array($idcontenido));
    $data = $query->fetch(PDO::FETCH_ASSOC);

    if($_FILES['file']['size'] > 15000000){
        $respuesta = array('status' => false, 'msg' => 'solo se permiten archivos hasta 15MB'); 
     }else{
         if($idcontenido == ""){
             $sqlInsert = 'INSERT INTO contenidos (titulo,descripcion,material,pm_id) VALUES (?,?,?,?)';
             $queryInsert = $pdo -> prepare($sqlInsert);
             $request = $queryInsert -> execute(array($titulo,$descripcion,$destino,$idcurso));
                move_uploaded_file($url_temp,$destino);
             $accion = 1;
         }else{
             if(empty($_FILES['file']['name'])){
                 $sqlUpdate = 'UPDATE contenidos SET titulo = ?, descripcion = ?, pm_id = ? WHERE contenido_id  =?';
                 $queryUpdate = $pdo -> prepare($sqlUpdate);
                 $request = $queryUpdate -> execute(array($titulo, $descripcion, $idcurso, $idcontenido));
                 $accion = 2;
             }else{
                    $sqlUpdate = 'UPDATE contenidos SET titulo = ?, descripcion = ?,material = ?, pm_id = ? WHERE contenido_id  =?';
                    $queryUpdate = $pdo -> prepare($sqlUpdate);
                    $request = $queryUpdate -> execute(array($titulo, $destino,$descripcion, $idcurso, $idcontenido));
                    if($data['material'] != ''){
                        unlink($data['material']);
                    }
                    move_uploaded_file($url_temp,$destino);
                    $accion = 3;
                }
         
            }
            if($request >0){
                if($accion == 1){
                    $respuesta = array('status' => true, 'msg' => 'Contenido creado correctamente');
                }else{
                    $respuesta = array('status' => true, 'msg' => 'Contenido actualizado correctamente');
                }
             }
         }
        }
        echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
    }