<?php

require_once '../../../includes/conexion.php';

$sql = 'SELECT alumno_id,nombre_alumno FROM alumnos WHERE estado = 1';
$query = $pdo->query($sql);
$query->execute();
$data = $query->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data, JSON_UNESCAPED_UNICODE);