<?php
	include("../includes/login.php");
	print $q= 'SELECT * FROM cp where ciudad_id='.$_POST["id"].' group by cp';
	$qq= mysql_query($q, $link);
	$qqq= mysql_fetch_array($qq);
	if($qqq){
	print '<option value="0">Seleccione cp</option>';
	do{
		print '
				<option value="'.$qqq["cp"].'"> '.$qqq["cp"].' </option>
		';
	}while($qqq= mysql_fetch_array($qq));
	}else{
		print '<option value="0">No se encontraron registros</option>';
	}	
?>