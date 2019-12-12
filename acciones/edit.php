<?php
session_start();
include("../cls/funciones.php");
include("../cls/conexion.php"); 
	print editar_datos($_POST,$link); 

?>