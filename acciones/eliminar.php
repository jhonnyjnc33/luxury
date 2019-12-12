<?php
session_start();
include("../includes/login.php");
if($_POST["tabla"]=="tour"){
	$dd= eliminar("r_actividad_tour", "tour_id", $link, $_POST["id"]) ;
	$ddd= eliminar("r_aldea_tour", "tour_id", $link, $_POST["id"]) ;
	$a= eliminar("r_amenidad_tour", "tour_id", $link, $_POST["id"]) ;
	$aa= eliminar("r_categoria_tour", "tour_id", $link, $_POST["id"]) ;
}elseif($_POST["tabla"]=="complementos_condo"){
	$c= eliminar("imagen","id_content",$link, $_POST["id"]);
}
$d= eliminar($_POST["tabla"], $_POST["campo"], $link, $_POST["id"]) ; 
if($d){
	 print 1;
}else{
	print 0;
}

?>