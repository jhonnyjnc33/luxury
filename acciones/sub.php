<?php
session_start();
include("../cls/funciones.php");
include("../cls/conexion.php");

$q= 'SELECT * FROM subcategoria where categoria_id= "'.$_POST["id"].'"  order by nombre_esp asc';
$qq= mysql_query($q, $link); 
$qqq= mysql_fetch_array($qq);
if($qqq){
do{
	
	
	$t.='
		<option value="'.$qqq["id_subcategoria"].'">'.$qqq["nombre_esp"].'</option>
	';
	
}while($qqq= mysql_fetch_array($qq));
}else{
	$t= '<option>No se encontraron registros</option> ';
}
print $t;  

?>