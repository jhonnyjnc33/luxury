<?php
session_start();
include($_SERVER['DOCUMENT_ROOT']."/cls/funciones.php");
include($_SERVER['DOCUMENT_ROOT']."/cls/conexion.php");
if(!login($link)){
	header('Location: ../');
  exit();
}
?>