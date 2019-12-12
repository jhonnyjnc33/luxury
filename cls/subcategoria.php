<?php
	include("../includes/login.php");
	$q= 'SELECT * FROM subcategorias_blog where id_categoria='.$_POST["id"];
	$qq= mysql_query($q, $link);
	$qqq= mysql_fetch_array($qq);
	print '<option value="0">Seleccione subcategoria</option>';
	do{
		print '
				<option value="'.$qqq["id_subcategoriaBlog"].'"> '.$qqq["nombreSubBlog"].' </option>
		';
	}while($qqq= mysql_fetch_array($qq));
?>