<?php
session_start();
include("../cls/funciones.php");
include("../cls/conexion.php");
$lista= lista($link, $_POST["tabla"], $_POST["order"], "");

switch ($_POST["tabla"]){
	
	case "complementos_condo":
				if($_POST["type"]==1){
					$t.='
						<thead>                                         
							<th width="30%">Nombre</th>
							<th width="5%">ML</th> 
							<th width="5%">M2</th> 
							<th width="5%">Capacidad</th> 
							<th width="5%">Usuarios</th> 
							<th width="12%">Uso</th> 
							<th width="5%">Estatus</th> 
							<th width="5%">Editar</th>
							<th width="5%">Eliminar</th>
						</thead>
					
					';
					foreach ($lista as $k=>$v){
		                                			if($v["status"]== "on"){
		                                				$status='<a class="btn-label glyphicon glyphicon-ok btn btn-default btn-sm  icon-only success " href="#">
							                                    </a>';
		                                			}else{
		                                				$status= '<a class="btn-label glyphicon glyphicon-remove btn btn-default btn-sm shiny icon-only danger " href="#">
							                                    </a>';
		                                			}
		                                			$uso= devuelve_campo_c("nombre", "uso_construccion", "id_uso_construccion", $v["uso"], $link);
													$user= devuelve_campo_c("nombre", "user_construccion", "id_user_construccion", $v["user_construccion"], $link);
		                                			switch ($v["tipo"]){
		                                				case 1:
		                                						$tipo="construccion";
		                                						break;
		                                			}
		                                			$t.='
		                                						<tr id="fila_'.$tipo.'_'.$v["id"].'">
					                                                <td>
					                                                   '.$v["nombre"].'
					                                                </td>
					                                                <td>
					                                                   '.$v["medidaml"].'
					                                                </td>
					                                                <td>
					                                                   '.$v["medidam2"].'
					                                                </td>
					                                                <td>
					                                                   '.$v["capacidad"].'
					                                                </td>
					                                               
					                                                <td>
					                                                   '.$user.'
					                                                </td>
					                                               
					                                                <td>
					                                                   '.$uso.'
					                                                </td>
					                                               
					                                                <td>
					                                                    '.$status.'
					                                                </td>
					                                                <td>
					                                                    <a href="#" id="'.$v["id"].'" class="  editar  btn-xs btn btn-default btn-sm  icon-only success" table="tabla_c" content-edit="edicion_c" type="1" data-cliente="'.$_POST["cliente"].'"><i class="fa fa-edit"></i></a>
					                                                </td>
					                                                <td>
																			<a href="#" class=" btn-xs eliminar btn btn-default btn-sm shiny icon-only danger"  id="'.$v["id"].'" from-data="construccion"><i class="fa fa-close"></i></a>
																			<p class="texto_eliminar eliminar_show" id="text_'.$tipo.'_'.$v["id"].'">Eliminar? <span href="#" id="'.$v["id"].'" class="elim" data-table="complementos_condo" data-dato="id_complemento_condo" from-data="construccion">si</span> <span href="#" class="eliminar_no" id="'.$v["id"].'" from-data="construccion">no</span></p>
																	 </td>
					                                              </tr>
		                                			';
					}
				}elseif($_POST["type"]==2){
						$t.='
						<thead>                                         
							<th width="30%">Tipo de equipamiento</th>
							<th width="5%">ML</th> 
							<th width="5%">M2</th> 
							<th width="5%">Capacidad</th> 
							<th width="5%">Usuario</th> 
							<th width="12%">Uso</th> 
							<th width="12%">Responsable</th> 
							<th width="5%">Estatus</th> 
							<th width="5%">Editar</th>
							<th width="5%">Eliminar</th>
						</thead>
					
					';
					
					
					foreach ($lista as $k=>$v){
		                                			if($v["status"]== "on"){
		                                				$status='<a class="btn-label glyphicon glyphicon-ok btn btn-default btn-sm  icon-only success " href="#">
							                                    </a>';
		                                			}else{
		                                				$status= '<a class="btn-label glyphicon glyphicon-remove btn btn-default btn-sm shiny icon-only danger " href="#">
							                                    </a>';
		                                			}
		                                			$uso= devuelve_campo_c("nombre", "uso_construccion", "id_uso_construccion", $v["uso"], $link);
													$user= devuelve_campo_c("nombre", "user_construccion", "id_user_construccion", $v["user_construccion"], $link);
		                                			
		                                			$t.='
		                                						<tr id="fila_equipamiento_'.$v["id"].'">
					                                                <td>
					                                                   '.$v["nombre"].'
					                                                </td>
					                                                <td>
					                                                   '.$v["medidaml"].'
					                                                </td>
					                                                <td>
					                                                   '.$v["medidam2"].'
					                                                </td>
					                                                <td>
					                                                   '.$v["capacidad"].'
					                                                </td>
					                                                <td>
					                                                   '.$user.'
					                                                </td>
					                                                <td>
					                                                   '.$uso.'
					                                                </td>
					                                                <td>
					                                                   '.$v["responsable"].'
					                                                </td>
					                                                <td>
					                                                    '.$status.'
					                                                </td>
					                                                <td>
					                                                    <a href="#" id="'.$v["id"].'" class="  editar  btn-xs btn btn-default btn-sm  icon-only success" table="tabla_e" content-edit="edicion_e" type="1" data-cliente="'.$_POST["cliente"].'"><i class="fa fa-edit"></i></a>
					                                                </td>
					                                                <td>
																			<a href="#" class=" btn-xs eliminar btn btn-default btn-sm shiny icon-only danger"  id="'.$v["id"].'" from-data="equipamiento"><i class="fa fa-close"></i></a>
																			<p class="texto_eliminar eliminar_show" id="text_equipamiento_'.$v["id"].'">Eliminar? <span href="#" id="'.$v["id"].'" class="elim" data-table="complementos_condo" data-dato="id_complemento_condo" from-data="equipamiento">si</span> <span href="#" class="eliminar_no" id="'.$v["id"].'" from-data="equipamiento">no</span></p>
																	 </td>
					                                              </tr>
		                                			';
					}
				}elseif($_POST["type"]==3){
					$t.='
						<thead>                                         
							<th width="30%">Tipo de Amenidad</th>
							<th width="5%">ML</th> 
							<th width="5%">M2</th> 
							<th width="5%">Capacidad</th> 
							<th width="5%">Usuario</th> 
							<th width="12%">Uso</th> 
							<th width="12%">Responsable</th> 
							<th width="5%">Estatus</th> 
							<th width="5%">Editar</th>
							<th width="5%">Eliminar</th>
						</thead>
					
					';
					
					
					foreach ($lista as $k=>$v){
		                                			if($v["status"]== "on"){
		                                				$status='<a class="btn-label glyphicon glyphicon-ok btn btn-default btn-sm  icon-only success " href="#">
							                                    </a>';
		                                			}else{
		                                				$status= '<a class="btn-label glyphicon glyphicon-remove btn btn-default btn-sm shiny icon-only danger " href="#">
							                                    </a>';
		                                			}
		                                			$uso= devuelve_campo_c("nombre", "uso_construccion", "id_uso_construccion", $v["uso"], $link);
													$user= devuelve_campo_c("nombre", "user_construccion", "id_user_construccion", $v["user_construccion"], $link);
		                                			
		                                			$t.='
		                                						<tr id="fila_amenidad_'.$v["id"].'">
					                                                <td>
					                                                   '.$v["nombre"].'
					                                                </td>
					                                                <td>
					                                                   '.$v["medidaml"].'
					                                                </td>
					                                                <td>
					                                                   '.$v["medidam2"].'
					                                                </td>
					                                                <td>
					                                                   '.$v["capacidad"].'
					                                                </td>
					                                                <td>
					                                                   '.$user.'
					                                                </td>
					                                                <td>
					                                                   '.$uso.'
					                                                </td>
					                                                <td>
					                                                   '.$v["responsable"].'
					                                                </td>
					                                                <td>
					                                                    '.$status.'
					                                                </td>
					                                                <td>
					                                                    <a href="#" id="'.$v["id"].'" class="  editar  btn-xs btn btn-default btn-sm  icon-only success" table="tabla_a" content-edit="edicion_a" type="1" data-cliente="'.$_POST["cliente"].'"><i class="fa fa-edit"></i></a>
					                                                </td>
					                                                <td>
																			<a href="#" class=" btn-xs eliminar btn btn-default btn-sm shiny icon-only danger"  id="'.$v["id"].'" from-data="amenidad"><i class="fa fa-close"></i></a>
																			<p class="texto_eliminar eliminar_show" id="text_amenidad_'.$v["id"].'">Eliminar? <span href="#" id="'.$v["id"].'" class="elim" data-table="complementos_condo" data-dato="id_complemento_condo" from-data="amenidad">si</span> <span href="#" class="eliminar_no" id="'.$v["id"].'" from-data="amenidad">no</span></p>
																	 </td>
					                                              </tr>
		                                			';
					}
				}
				elseif($_POST["type"]==4){
					$t.='
						<thead>                                         
							<th width="20%">Nombre del Personal Clave</th>
							<th width="20%"> &Aacute;rea de responsabilida</th> 
							<th width="20%">Tel&eacute;fono movil</th> 
							<th width="20%">Tel&eacute;fono</th> 
							<th width="20%">Correo @</th> 
							<th width="5%">Estatus</th> 
							<th width="5%">Editar</th>
							<th width="5%">Eliminar</th>
						</thead>
					
					';
					
					
					foreach ($lista as $k=>$v){
		                                			if($v["status"]== "on"){
		                                				$status='<a class="btn-label glyphicon glyphicon-ok btn btn-default btn-sm  icon-only success " href="#">
							                                    </a>';
		                                			}else{
		                                				$status= '<a class="btn-label glyphicon glyphicon-remove btn btn-default btn-sm shiny icon-only danger " href="#">
							                                    </a>';
		                                			}
		                                			
		                                			$t.='
		                                						<tr id="fila_amenidad_'.$v["id"].'">
					                                                <td>
					                                                   '.$v["nombre"].'
					                                                </td>
					                                                <td>
					                                                   '.$v["area_responsabilidad"].'
					                                                </td>
					                                                <td>
					                                                   '.$v["movil"].'
					                                                </td>
					                                                <td>
					                                                   '.$v["telefono"].'
					                                                </td>
					                                                <td>
					                                                   '.$v["correo"].'
					                                                </td>
					                                               
					                                                <td>
					                                                    '.$status.'
					                                                </td>
					                                                <td>
					                                                    <a href="#" id="'.$v["id"].'" class="  editar  btn-xs btn btn-default btn-sm  icon-only success" table="tabla_a" content-edit="edicion_a" type="1" data-cliente="'.$_POST["cliente"].'"><i class="fa fa-edit"></i></a>
					                                                </td>
					                                                <td>
																			<a href="#" class=" btn-xs eliminar btn btn-default btn-sm shiny icon-only danger"  id="'.$v["id"].'" from-data="amenidad"><i class="fa fa-close"></i></a>
																			<p class="texto_eliminar eliminar_show" id="text_amenidad_'.$v["id"].'">Eliminar? <span href="#" id="'.$v["id"].'" class="elim" data-table="complementos_condo" data-dato="id_complemento_condo" from-data="amenidad">si</span> <span href="#" class="eliminar_no" id="'.$v["id"].'" from-data="amenidad">no</span></p>
																	 </td>
					                                              </tr>
		                                			';
					}
				}
				
                                	
				break;
				
	case "condominos":	
					
						$t.='
							<thead>                                         
								<th width="">Nombre del Cond&oacute;mino</th>
								<th width="">Tipo de Cond&oacute;mino</th> 
								<th width="">C&oacute;digo</th> 
								<th width="">Uso del Inmueble</th> 
								<th width="">Tipo de Pago</th> 
								<th width="">Tel&eacute;fono M&oacute;vil</th> 
								<th width="">Correo @</th> 
								<th width="">Restricciones</th> 
								<th width="">Estatus</th> 
								<th width="">Editar</th>
								<th width="">Eliminar</th>
							</thead>
						';
						foreach ($lista as $k=>$v){
		                                			if($v["status"]== "on"){
		                                				$status='<a class="btn-label glyphicon glyphicon-ok btn btn-default btn-sm  icon-only success " href="#">
							                                    </a>';
		                                			}else{
		                                				$status= '<a class="btn-label glyphicon glyphicon-remove btn btn-default btn-sm shiny icon-only danger " href="#">
							                                    </a>';
		                                			}
		                                			$tipo= devuelve_campo_c("nombre", "tipo_condomino", "id_tipo_condomino", $v["tipo_condomino"], $link);
													$uso_inm= devuelve_campo_c("nombre_inmueble", "uso_inmuebles", "id_inmueble", $v["uso_inmueble"], $link);
													$tipo_pago= devuelve_campo_c("valor", "tipo_pago", "id_pago", $v["tipo_pago"], $link);
													$restriccion= devuelve_campo_c("nombre", "type_user", "id_type_user", $v["restriccion"], $link);
		                                			if($v["uso_inmueble"]== 1){
																                                				$movil= $v["movil_arrendador"];
																                                				$correo= $v["correo_arrendador"];
																                                			}else{
																                                				$movil= $v["movil_propietario"];
																                                				$correo= $v["correo_propietario"];
																                                			}
		                                			$t.='
		                                						<tr id="fila_condo_'.$v["id"].'">
																   <td>'.$v["nombre"].'</td>
																   <td>'.$tipo.'</td>
																   <td>'.$v["codigo"].'</td>
																   <td>'.$uso_inm.'</td>
																   <td>'.$tipo_pago.'</td>
																   <td>'.$movil.'</td>
																   <td>'.$correo.'</td>
																   <td>'.$restriccion.'</td>
					                                               
					                                                <td>
					                                                    '.$status.'
					                                                </td>
					                                                <td>
					                                                    <a href="#" id="'.$v["id"].'" class="  editar_condo  btn-xs btn btn-default btn-sm  icon-only success" table="tabla_condo" content-edit="edicion_condo" data-cliente="'.$_POST["cliente"].'"><i class="fa fa-edit"></i></a>
					                                                </td>
					                                                <td>
																			<a href="#" class=" btn-xs eliminar btn btn-default btn-sm shiny icon-only danger"  id="'.$v["id"].'" from-data="condo"><i class="fa fa-close"></i></a>
																			<p class="texto_eliminar eliminar_show" id="text_condo_'.$v["id"].'">Eliminar? <span href="#" id="'.$v["id"].'" class="elim" data-table="condominos" data-dato="id_condomino" from-data="condo">si</span> <span href="#" class="eliminar_no" id="'.$v["id"].'" from-data="condo">no</span></p>
																	 </td>
					                                              </tr>
		                                			';
					}
				
		break;
	
}

print $t;  

?>