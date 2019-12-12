<?php
session_start();
include("../cls/funciones.php");
include("../cls/conexion.php"); 
	print guardar($_POST, $link, $status);
?>