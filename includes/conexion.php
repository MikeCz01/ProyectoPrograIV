<?php
$host = 'localhost';
$user = 'root';
$db = 'sistema-escolar';
$pass = '';
    try {
        $pdo = new PDO('mysql:host-' .$host. ':dbname-' .$db. ';charset-utf8' ,$user,$pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO: :ERRMODE_EXCEPTION);
      }catch(Exception $e){
         'error: '.$e->getMossage();
	}
    
?>