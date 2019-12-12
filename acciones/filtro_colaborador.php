<?php
session_start();
include("../cls/funciones.php");
include("../cls/conexion.php");
$t.='
	<thead> 
                                            
                                        
		<th>Nombre</th>
		<th>Correo</th> 
		<th>Tel&eacute;fono</th> 
		<th>Estatus</th> 
		<th>Acciones</th>
	</thead>
'; 
if($_POST["cliente"] !=0){
if($_POST["cliente"] != 0){
	$string.= '
		WHERE cliente_id= '.$_POST["cliente"].' 
	';
}else{
	$string.='';
}
if($_POST["nombre"] != ""){
	$string.= '
		AND nombre LIKE "%'.$_POST["nombre"].'%"
	';
}else{
	$string.='';
}
$q= 'SELECT * FROM colaboradores  '.$string.'  order by nombre';
$qq= mysql_query($q, $link); 
$qqq= mysql_fetch_array($qq);

if(empty($qqq)){


	$t.='
		<tr>
			<td colspan="5" >No se encontraron resultados</td>
			
		</tr>
	';
}else{
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
			<td>'.$qqq["correo"].'</td>
			<td>'.$qqq["telefono"].'</td>
			<td>'.$status.'</td>
			<td>
				<a href="/perfil_colaborador.php?id='.$qqq["id_colaborador"].'" alt="perfil" title="Perfil" ><i class="menu-icon fa fa-picture-o"></i></a>
				<a href="" alt="Editar" title="Editar" ><i class="fa fa-edit"></i></a>
				<a href="" alt="Eliminar" title="Eliminar" ><i class="fa fa-close"></i></a>
			</td>
		</tr>
	';
	
}while($qqq= mysql_fetch_array($qq));
}
  }else{
	$t.='<tr>
			<td colspan="5" >Debe seleccionar un cliente, su b&uacute;squeda ser&aacute; m&aacute;s acertada</td>
			
			</tr>';
}
print $t;

?>