<?php

require_once '../../../includes/conexion.php';

$sql = 'SELECT grado_id,nombre_grado FROM grados WHERE estado = 1';
$query = $pdo->query($sql);
$query->execute();
$data = $query->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data, JSON_UNESCAPED_UNICODE);