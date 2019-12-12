<?php
	include("../includes/login.php");
	$q= 'SELECT * FROM cp where cp='.$_POST["id"];
	$qq= mysql_query($q, $link);
	$qqq= mysql_fetch_array($qq);
	if($qqq){
	print '<option value="0">Seleccione colonia</option>';
	do{
		print '
				<option value="'.$qqq["id_cp"].'"> '.$qqq["direccion"].' </option>
		';
	}while($qqq= mysql_fetch_array($qq));
	}else{
		print '<option value="0">No se encontraron registros</option>';
	}	
?>