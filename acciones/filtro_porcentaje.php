<?php
session_start();
include("../cls/funciones.php");
include("../cls/conexion.php");

if($_POST["anio"] != 0){
	$anio.= '
		AND anio= '.$_POST["anio"].'  
	';
}else{
	$anio.='';
}

if($_POST["categoria"] != 0){
	$anio.= '
		 AND categoria_id_cliente= '.$_POST["categoria"].' 
	';
}else{
	$anio.='';
}

$q= 'SELECT * FROM porcentajes where zona_id= "'.$_POST["zona"].'" '.$anio.'  order by mes, categoria_id_cliente';
$qq= mysql_query($q, $link); 
$qqq= mysql_fetch_array($qq);
$t.='
	<thead> 
										<th>A&ntilde;o</th>
										<th>Mes</th> 
										<th>Zona</th> 
										<th>Categor&iacute;a</th> 
										<th>Valor</th> 
	</thead>
';
do{
	$mes= mes($qqq["mes"]);
	$zona= devuelve_campo_c("nombre", "zonas", "id_zona", $qqq["zona_id"], $link);
	$categoria= devuelve_campo_c("nombre_categoria_cliente", "categoria_cliente", "id_categoria_cliente", $qqq["categoria_id_cliente"], $link);
	$t.='
			<tr>
				<td>'.$qqq["anio"].'</td>
				<td>'.$mes["texto"].'</td>
				<td>'.$zona.'</td>
				<td>'.$categoria.'</td>
				<td>'.$qqq["valor"].' % </td>
			</tr>
		';
	
}while($qqq= mysql_fetch_array($qq));

print $t;  

?>