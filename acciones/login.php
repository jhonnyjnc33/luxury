<?php
session_start();
include("../cls/funciones.php");
include("../cls/conexion.php");
$_SESSION['us']["user"] = utf8_decode($_POST["user"]);
$_SESSION['us']["pass"]= utf8_decode($_POST["pass"]);
$login = login($link);
if($login==true){
	header('Location: ../principal/');
}else{
	header('Location: ../');
}

?>