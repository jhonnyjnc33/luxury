<?php
session_start();
include("../cls/funciones.php");
include("../cls/conexion.php");
if($_POST["zona"] != 0){
	$string.= '
		AND zona_cliente= '.$_POST["zona"].' 
	';
}else{
	$string.='';
}
if($_POST["cadena"] != 0){
	$string.= '
		AND cadena_cliente= '.$_POST["cadena"].' 
	';
}else{
	$string.='';
}
if($_POST["tipo"] != 0){
	$string.= '
		AND tipo_cliente= '.$_POST["tipo"].' 
	';
}else{
	$string.='';
}
if($_POST["modo"] != 0){
	$string.= '
		AND modo_cliente= '.$_POST["modo"].' 
	';
}else{
	$string.='';
}
if($_POST["categoria"] != 0){
	$string.= '
		AND categoria_cliente= '.$_POST["categoria"].' 
	';
}else{
	$string.='';
} 
$q= 'SELECT * FROM clientes where status= "'.$_POST["status"].'" '.$string.'  order by nombre';
$qq= mysql_query($q, $link); 
$qqq= mysql_fetch_array($qq);
$t.='
	<thead> 
                                            
                                        
		<th>Nombre</th>
		<th>Zona</th> 
		<th>Cadena</th> 
		<th>Estatus</th> 
		<th>Acciones</th>
	</thead>
';
do{
	$zona= devuelve_campo_c("nombre","zonas", "id_zona", $qqq["zona_cliente"], $link);
	$cadena= devuelve_campo_c("nombre","cadenas", "id_cadena", $qqq["cadena_cliente"], $link);
	if($qqq["status"]== "on"){
	        $status='<a class="btn btn-labeled btn-palegreen" href="javascript:void(0);">
						<i class="btn-label glyphicon glyphicon-ok"></i>Activo
					</a>';
	  }else{
	       $status= '<a class="btn btn-labeled btn-darkorange" href="javascript:void(0);">
			 <i class="btn-label glyphicon glyphicon-remove"></i>Desactivo
			</a>';
	 }
	$t.='
		<tr>
			<td>'.$qqq["nombre"].'</td>
			<td>'.$zona.'</td>
			<td>'.$cadena.'</td>
			<td>'.$status.'</td>
			<td>
				<a href="/perfil.php?id='.$qqq["id_cliente"].'" alt="perfil" title="Perfil" ><i class="menu-icon fa fa-picture-o"></i></a>
				<a href="/altas_clientes/edicion.php?id='.$qqq["id_cliente"].'" alt="Editar" title="Editar" ><i class="fa fa-edit"></i></a>
				<a href="" alt="Eliminar" title="Eliminar" ><i class="fa fa-close"></i></a>
			</td>
		</tr>
	';
	
}while($qqq= mysql_fetch_array($qq));

print $t;  

?>