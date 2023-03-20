<?php 
require_once '../../../includes/conexion.php';

if(!empty($_POST)){
        if(trim($_POST['observacion'])==''||empty($_FILES['file'])){
            $respuesta = array('status'=>false,'msg'=>'Todos los campos son necesarios')
        }else{
            $idevaluacion = $_POST['idevaluacion'];
            $idalumno = $_POST['idalumno'];
            $observacion = $_POST['observacion'];

            $material = $_FILES['file']['name'];
            $type = $_FILES['file']['type'];
            $url_temp = $_FILES['file']['tmp_name'];

            $directorio = '../../../uploads/'.rand(1000,1000);
            if(!file_exists($directorio)){
                mkdir($directorio,0777,true);
            }

            $destino = $directorio.'/'.$material;

            if($_FILES['file']['size']>15000000){
                $respuesta = array('status'=>false,'msg'=>'Solo se permite archivos hasta 15MB');
            }else{
                $sqlInsert = 'INSERT INTO ev_entregadas (evaluacion_id,alumno_id,material_alumno,observacion) VALUES (?,?,?,?)';
                $queryInsert = $pdo->prepare($sqlInsert);
                $request = $queryInsert->execute(array($idevaluacion,$idalumno,$destino,$observacion));
                move_uploaded_file($url_temp,$destino);
                if($request > 0){
                    $respuesta = array('status'=>true,'msg'=>'Evaluacion enviada correctamente')
                }
            }

        }
        echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}
?>