<?php
include("../includes/login.php");

$e= datos_individuales($link, "condominos","id_condomino", $_POST["id"]);
$uso= lista($link, "uso_construccion", "order by nombre", "") ;
$user= lista($link, "user_construccion", "order by nombre", "") ;
$inmueble= lista($link, "uso_inmuebles"," order by nombre_inmueble asc", "");
$pago= lista($link, "tipo_pago"," order by valor asc", "");
$restriccion= lista($link, "type_user"," where restriccion='on' order by nombre asc", "");
$tipo_condomino= lista($link, "tipo_condomino","  order by nombre asc", "");
?>
 
<form class="alta edi" id="edicion">
<h2>Edicion de "<?php print $e["nombre"]?>"</h2>
<a href="#" table="<?php print $_POST["table"];?>" cliente="<?php print $_POST["cliente"]?>" type="<?php print $_POST["type"]?>" class="c btn btn-primary" id="c_complemento" class=""> Regresar</a>
<div class="clear"></div>

	
		                                                    		<div class="row">
							                                                            <div class="col-sm-4">
								                                                            <div class="form-group">
								                                                                <span class="input-icon icon-right">
								                                                                	<label>Nombre del Propietario</label>
								                                                                    <input type="text" placeholder="" id="condomino_in" name="nombre_condomino" class="form-control" value="<?php print $e["nombre"]?>">
								                                                                    <input type="hidden" placeholder="" id="id_cliente_condo" name="id" value="<?php print $_POST["id"]?>" class="form-control">
								                                                                    <input type="hidden" placeholder="" id="" name="seccion" value="condomino" class="form-control">
								                                                                    
								                                                                </span>
								                                                            </div>
							                                                            </div>
							                                                            <div class="col-sm-2">
								                                                            <div class="form-group">
								                                                                <span class="input-icon icon-right">
								                                                                	<label>C&oacute;digo</label>
								                                                                   <input type="text" class="form-control" name="codigo" value="<?php print $e["codigo"]?>" />
								                                                                    
								                                                                </span>
								                                                            </div>
							                                                            </div>
							                                                            <div class="col-sm-2">
								                                                            <div class="form-group">
								                                                                <span class="input-icon icon-right">
								                                                                	<label>% Pro Indiviso</label>
								                                                                    <input type="text" placeholder=""  id="" name="indiviso" class="form-control" value="<?php print $e["indiviso"]?>">
								                                                                    
								                                                                </span>
								                                                            </div>
							                                                            </div>
							                                                            <div class="col-sm-4">
								                                                            <div class="form-group">
								                                                                <span class="input-icon icon-right">
								                                                                	<label>Uso del Inmueble</label>
								                                                                    <select  name="uso_inmueble" class="form-control" id="inmueble">
								                                                                    	<option value="0"> Seleccione una opci&oacute;n</option>
								                                                                    	<?php
								                                                                    		foreach ($inmueble as $i){
								                                                                    			if($e["uso_inmueble"]==$i["id"]){
								                                                                    				print '<option value="'.$i["id"].'" selected> '.$i["nombre"].' </option>';
								                                                                    			}else{
								                                                                    				print '<option value="'.$i["id"].'"> '.$i["nombre"].' </option>';
								                                                                    			}
								                                                                    		}
								                                                                    	?>
								                                                                    </select>
								                                                                </span>
								                                                            </div>
							                                                            </div>
							                                                           
							                                                            
						                                                            </div>
						                                                            <div class="row">
						                                                            	<div class="col-sm-3">
								                                                            <div class="form-group">
								                                                                <span class="input-icon icon-right">
								                                                                	<label>Correo @ Propietario</label>
								                                                                    <input type="text" placeholder="" id="" name="correo" class="form-control" value="<?php print $e["correo_propietario"]?>">
								                                                                    
								                                                                </span>
								                                                            </div>
							                                                            </div>
						                                                            	<div class="col-sm-3">
								                                                            <div class="form-group">
								                                                                <span class="input-icon icon-right">
								                                                                	<label>Tel&eacute;fono M&oacute;vil Propietario</label>
								                                                                    <input type="text"  name="movil_propietario" class="form-control" value="<?php print $e["movil_propietario"]?>">
								                                                                    
								                                                                </span>
								                                                            </div>
							                                                            </div>
						                                                            	<div class="col-sm-3">
								                                                            <div class="form-group">
								                                                                <span class="input-icon icon-right">
								                                                                	<label>Tel&eacute;fono casa Propietario</label>
								                                                                    <input type="text"  name="casa_propietario" class="form-control" value="<?php print $e["telefono_propietario"]?>">
								                                                                    
								                                                                </span>
								                                                            </div>
							                                                            </div>
						                                                            	<div class="col-sm-3">
								                                                            <div class="form-group">
								                                                                <span class="input-icon icon-right">
								                                                                	<label>Tipo de Pago</label>
								                                                                    <select name="tipo_pago" class="form-control">
								                                                                    	<option value="0">Seleccione una opci&oacute;n</option>
								                                                                    	<?php
								                                                                    		foreach ($pago as $p){
								                                                                    			if($e["tipo_pago"]== $p["id"]){
								                                                                    				print '<option value="'.$p["id"].'" selected> '.$p["nombre"].' </optio>';
								                                                                    			}else{
								                                                                    				print '<option value="'.$p["id"].'"> '.$p["nombre"].' </optio>';
								                                                                    			}
								                                                                    		}
								                                                                    	?>
								                                                                    </select>
								                                                                </span>
								                                                            </div>
							                                                            </div>
						                                                            </div>
						                                                            <div class="row">
						                                                            	<div class="col-sm-3">
								                                                            <div class="form-group">
								                                                                <span class="input-icon icon-right">
								                                                                	<label>Calle / Vialidad / Boulevard / Privada</label>
								                                                                    <input type="text" placeholder="" id="" name="calle" class="form-control" value="<?php print $e["calle"]?>">
								                                                                    
								                                                                </span>
								                                                            </div>
							                                                            </div>
						                                                            	<div class="col-sm-3">
								                                                            <div class="form-group">
								                                                                <span class="input-icon icon-right">
								                                                                	<label>Lote / No. Interior / Departamento</label>
								                                                                    <input type="text"  name="lote" class="form-control" value="<?php print $e["lote"]?>">
								                                                                    
								                                                                </span>
								                                                            </div>
							                                                            </div>
						                                                            	<div class="col-sm-3">
								                                                            <div class="form-group">
								                                                                <span class="input-icon icon-right">
								                                                                	<label>Manzana</label>
								                                                                    <input type="text"  name="manzana" class="form-control" value="<?php print $e["manzana"]?>">
								                                                                    
								                                                                </span>
								                                                            </div>
							                                                            </div>
						                                                            	<div class="col-sm-3">
								                                                            <div class="form-group">
								                                                                <span class="input-icon icon-right">
								                                                                	<label>Supermanzana / Colonia</label>
								                                                                    <input type="text"  name="supermanzana" class="form-control" value="<?php print $e["smza"]?>">
								                                                                </span>
								                                                            </div>
							                                                            </div>
						                                                            </div>
						                                                            <div class="row">
						                                                            	<div class="col-sm-3">
						                                                            		<label>Tipo de Cond&oacute;mino</label>
							                                                            	<div class="form-group">
							                                                            		<select name="tipo_condo">
							                                                            			<option value="0"> Seleccione una opci&oacute;n</option>
							                                                            			<?php
							                                                            				foreach ($tipo_condomino as $t){
							                                                            					if($e["tipo_condomino"]==$t["id"]){
								                                                            					print '<option value="'.$t["id"].'" selected> '.$t["nombre"].' </option>';
							                                                            					}else{
							                                                            						print '<option value="'.$t["id"].'"> '.$t["nombre"].' </option>';
							                                                            					}
							                                                            				}
							                                                            			?>
							                                                            		</select>
							                                                            	</div>
						                                                            	</div>
						                                                            	<div class="col-sm-3">
						                                                            		<label>Restricciones Amenidades</label>
							                                                            	<div class="form-group">
							                                                            		<select name="restriccion">
							                                                            			<option value="0"> Seleccione una opci&oacute;n</option>
							                                                            			<?php
							                                                            				foreach ($restriccion as $r){
							                                                            					if($e["restriccion"]==$r["id"]){
							                                                            						print '<option value="'.$r["id"].'" selected> '.$r["nombre"].' </option>';
							                                                            					}else{
							                                                            						print '<option value="'.$r["id"].'"> '.$r["nombre"].' </option>';
							                                                            					}
							                                                            				}
							                                                            			?>
							                                                            		</select>
							                                                            	</div>
						                                                            	</div>
						                                                            	<div class="col-sm-3">
						                                                            		<label>Contrase&ntilde;a</label>
							                                                            	<div class="form-group">
							                                                            		<input name="pass" value="<?php print $e["pass"]?>" class="form-control">
							                                                            			
							                                                            	</div>
						                                                            	</div>
						                                                            </div>
						                                                            <div class="row <?php if($e["uso_inmueble"] != 1){ print 'oculto';}?> " id="arrendador2" >
						                                                            	<div class="col-sm-3">
						                                                            		<label>Nombre Arrendador</label>
							                                                            	<div class="form-group">
							                                                            		<input type="text" class="form-control" name="nombre_arrendador" value="<?php print $e["nombre_arrendador"]?>" />
							                                                            	</div>
						                                                            	</div>
						                                                            	<div class="col-sm-3">
						                                                            		<label>Correo @ Arrendador</label>
							                                                            	<div class="form-group">
							                                                            		<input type="text" class="form-control" name="correo_arrendador" value="<?php print $e["correo_arrendador"]?>" />
							                                                            	</div>
						                                                            	</div>
						                                                            	<div class="col-sm-3">
						                                                            		<label>Tel&eacute;fono Casa Arrendador</label>
							                                                            	<div class="form-group">
							                                                            		<input type="text" class="form-control" name="telefono_arrendador" value="<?php print $e["telefono_arrendador"]?>" />
							                                                            	</div>
						                                                            	</div>
						                                                            	<div class="col-sm-3">
						                                                            		<label>Tel&eacute;fono Movil Arrendador</label>
							                                                            	<div class="form-group">
							                                                            		<input type="text" class="form-control" name="movil_arrendador" value="<?php print $e["movil_arrendador"]?>" />
							                                                            	</div>
						                                                            	</div>
						                                                            </div>
						                                                            <div class="row">
						                                                            	<div class="col-sm-12">
						                                                            		<label>Comentarios</label>
							                                                            	<div class="form-group">
							                                                            		<textarea class="form-control" rows="8" name="comentarios"><?php print $e["comentarios"]?></textarea>
							                                                            	</div>
						                                                            	</div>
						                                                            </div>
						                                                            <div class="row">
						                                                         		 <div style="padding-left: 30px;" class="col-sm-12">
										                                                         <div class="form-group">
									                                                                <div class="checkbox">
									                                                                    <label>
									                                                                    	<?php
									                                                                    		if($e["status"]=="on"){
									                                                                    			$status="checked";
									                                                                    		}else{
									                                                                    			$status="";
									                                                                    		}
									                                                                    	?>
									                                                                        <input type="checkbox" value="on" name="status" class="colored-blue" <?php print $status; ?>>
									                                                                        <span class="text">Activo / Inactivo</span>
									                                                                    </label>
									                                                                </div>
									                                                                <br>
											                                                           <button class="btn btn-primary">Guardar</button>  <img class="oculto" src="/assets/img/carga.gif" id="carga_condo"> 
									                                                            </div>
								                                                            </div>
							                                                          </div>

			                                                            
				                                                            </form>
