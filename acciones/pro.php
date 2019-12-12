<?php
session_start();
include("../cls/funciones.php");
include("../cls/conexionDelli.php");
if($_POST["id"] != 0){
$q= 'SELECT * FROM productos where familia= '.$_POST["id"].' and Status="on" order by nombre';
$qq= mysql_query($q, $link2); 
$qqq= mysql_fetch_array($qq);
$t.='
	<div class="producto_l cot_tit" style="font-size: 13px; ">Producto</div>
	<div class="linea_t cot_tit">L&iacute;nea</div>
	<div class="linea_t cot_tit">Envace</div>
	<div class="linea_t cot_tit">Capacidad</div>
	<div class="linea_t cot_tit">Precio Rack</div>
	<div class="linea_t cot_tit">Dif. %</div>
	<div class="linea_t cot_tit">Precio Venta</div>
	
	<ul style="padding: 0;">
	
';
do{
	$familia= devuelve_campo_c("nombre", "familia", "id_familia", $_POST["id"], $link2);
	$envace= devuelve_campo_c("nombre", "envaces", "id_envace", $qqq["envace"], $link2);
	$capacidad= explode("-", $qqq["capacidad"]);
	$cap= devuelve_campo_c("capacidad", "capacidades", "id_capacidad", $capacidad[1], $link2);
	if($_POST["id"] == 15 || $_POST["id"]== 17){
		$precio= $qqq["precio"] + ($qqq["precio"] * $qqq["valor_ieps"]/100);
	}else{
		$precio= $qqq["precio"] +  $qqq["valor_ieps"];
	}
	$t.='
		<li class="checkbox">
			<label>
				<input type="checkbox" value="'.$qqq["id_producto"].'" class="colored-blue check" name="producto[]"  > 
				<span class="text">
					'.$qqq["nombre"].'
				</span>
				
			</label>
			<span class="familia" id="familia">'.$familia.'</span> 
			<span class="familia">
				'.$envace.'
				<input type="hidden" value="'.$envace.'" name="envace[]" disabled class="envace_in" />
			</span> 
			<span class="familia">
				'.$capacidad[0].' '.$cap.'
				<input type="hidden" value="'.$capacidad[0].' '.$cap.'" name="capacidad[]" disabled id="capacidad_'.$qqq["id_producto"].'" class="capacidad_in" />
			</span> 
			<span class="precio" >
				$'.$precio.'  
				<input type="hidden" value="'.$precio.' " name="precio_ratail[]" disabled id="precio_list_'.$qqq["id_producto"].'" class="precio_in" />	
			</span>
			<span class="precio" id="change_price_'.$qqq["id_producto"].'" >
				100%
				<input type="hidden" value="100%" name="porcentaje[]" id="porcentaje_desc_'.$qqq["id_producto"].'"  disabled class="porciento_in" />
			</span>
			<span class="precio input-group"><input type="text" name="precio[]" value="'.$precio.'" class="precio_change" id="'.$qqq["id_producto"].'" data-precio="'.$precio.'" disabled></span>
		</li>
	';
	
}while($qqq= mysql_fetch_array($qq));
$t.='</ul><div style="clear: both;"></div>'; 
print $t;  
}
?>