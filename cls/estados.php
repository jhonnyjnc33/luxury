<?php
	include("../includes/login.php");
	$q= 'SELECT * FROM estados where pais='.$_POST["id"];
	$qq= mysql_query($q, $link);
	$qqq= mysql_fetch_array($qq);
	if($qqq){
	print '<option value="0">Seleccione un estado</option>';
	do{
		print '
				<option value="'.$qqq["id"].'"> '.$qqq["nombre"].' </option>
		';
	}while($qqq= mysql_fetch_array($qq));
	}else{
		print '<option value="0">No se encontraron registros</option>';
	}	
?>