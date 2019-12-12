<?php
include("../includes/login.php");
header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
$e= datos_individuales($link, "complementos_condo","id_complemento_condo", $_POST["id"]);
$uso= lista($link, "uso_construccion", "order by nombre", "") ;
$user= lista($link, "user_construccion", "order by nombre", "") ;

?>
 
<form class="alta edi" id="edicion">
<h2>Edicion de "<?php print $e["nombre"]?>"</h2>
<a href="#" table="<?php print $_POST["table"];?>" cliente="<?php print $_POST["cliente"]?>" type="<?php print $_POST["type"]?>" class="c btn btn-primary" id="c_complemento" class=""> Regresar</a>
<div class="clear"></div>
<?php
 if($e["tipo"]==1){
	$img= explode("-", mostrar_img($link, $_POST["id"],"complementos", "construccion"));	
	?>

	
		                                                    		<div class="row">
				                                                            <div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Tipo de construcci&oacute;n</label>
					                                                                    <input type="text" placeholder="" id="confirmPasswordInput" name="nombre_construccion" class="form-control" value="<?php print $e["nombre"]; ?>">
					                                                                    <input type="hidden" name="seccion" value="construccion" />
					                                                                    <input type="hidden" name="tipo_contruccion" value="<?php print $e["tipo"]?>" />
					                                                                    <input type="hidden" name="id" value="<?php print $_POST["id"]?>" id="id_cliente_c" />
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-2">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>ML</label>
					                                                                    <input type="text" placeholder="" value="<?php print $e["medidaml"]?>" id="id_cliente_c" id="confirmPasswordInput" name="medidaml_construccion" class="form-control">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-2">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label> M2</label>
					                                                                    <input type="text" placeholder="" value="<?php print $e["medidam2"]?>" id="id_cliente_c" id="confirmPasswordInput" name="medidam2_construccion" class="form-control">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-2">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Cantidad</label>
					                                                                    <input type="text" placeholder="" id="confirmPasswordInput" value="<?php print $e["cantidad"]?>" id="id_cliente_c" name="cantidad_construccion" class="form-control">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Capacidad</label>
					                                                                    <input type="text" placeholder="" value="<?php print $e["capacidad"]?>" id="id_cliente_c" id="confirmPasswordInput" name="capacidad_construccion" class="form-control">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
			                                                            </div>
			                                                            
			                                                            <div class="row">
				                                                            <div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Usuarios</label>
					                                                                    <select name="user_construccion" class="form-control">
					                                                                    	<option>Seleccione una opci&oacute;n</option>
					                                                                    	<?php
					                                                                    		foreach ($user as $uu){
					                                                                    			if($uu["id"]==$e["user_construccion"]){ 
						                                                                    			print '
						                                                                    				<option value="'.$uu["id"].'" selected> '.$uu["nombre"].' </option>
						                                                                    			';
					                                                                    			}else{
					                                                                    				print '
						                                                                    				<option value="'.$uu["id"].'" > '.$uu["nombre"].' </option>
						                                                                    			';
					                                                                    			}
					                                                                    		} 
					                                                                    	?>
					                                                                    </select>
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Uso</label>
					                                                                    <select name="uso_construccion" class="form-control">
					                                                                    	<option>Seleccione una opci&oacute;n</option>
					                                                                    	<?php
					                                                                    		foreach ($uso as $u){
					                                                                    			if($u["id"]==$e["uso"]){
						                                                                    			print '
						                                                                    				<option value="'.$u["id"].'" selected> '.$u["nombre"].' </option>
						                                                                    			';
					                                                                    			}else{
					                                                                    				print '
						                                                                    				<option value="'.$u["id"].'" > '.$u["nombre"].' </option>
						                                                                    			';
					                                                                    			}
					                                                                    		}
					                                                                    	?>
					                                                                    </select>
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Dictamen Tecnico Independiente?</label>
					                                                                    <div class="checkbox">
									                                                        <label>
									                                                            <input type="radio" class="inverted" name="dictamen_construccion" value="no" <?php if($e["dictamen"]=="no"){ print 'checked'; }?>>
									                                                            <span class="text">No</span>
									                                                        </label>
									                                                    </div>
					                                                                    <div class="checkbox">
					                                                                    	
									                                                        <label>
									                                                            <input type="radio" class="inverted" name="dictamen_construccion" value="yes" <?php if($e["dictamen"]=="yes"){ print 'checked'; }?> >
									                                                            <span class="text">Si</span>
									                                                        </label>
									                                                    </div>
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-3">
				                                                            		<a href="/images/complementos/<?php print $img[0]; ?>" class="fancybox" id="fancy">
				                                                            			<img src="/images/complementos/<?php print $img[0]; ?>" width="50%" id="img_l" />
				                                                            		</a>
					                                                           		<div class="form-group">
					                                                           			<span class="input-icon icon-right">
				                                                            			<input type="file" name="img_construccion" class="form-control" id="cons" />
				                                                            			</span>
				                                                            		</div>		
				                                                            </div>
			                                                            </div>
<?php } 
elseif($e["tipo"]==2){
	$img= explode("-", mostrar_img($link, $_POST["id"],"complementos", "equipamiento"));
	?>

<div class="row">
				                                                            <div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Tipo de equipamiento</label>
					                                                                    <input type="text" placeholder="" id="confirmPasswordInput" name="nombre_equipamiento" class="form-control" value="<?php print $e["nombre"]; ?>">
					                                                                    <input type="hidden" name="seccion" value="equipamiento" />
					                                                                    <input type="hidden" name="tipo_equipamiento" value="<?php print $e["tipo"]?>" />
					                                                                    <input type="hidden" name="id" value="<?php print $_POST["id"]?>" id="id_cliente_c" />
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-2">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>ML</label>
					                                                                    <input type="text" placeholder="" value="<?php print $e["medidaml"]?>" id="id_cliente_c" id="confirmPasswordInput" name="medidaml_equipamiento" class="form-control">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-2">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label> M2</label>
					                                                                    <input type="text" placeholder="" value="<?php print $e["medidam2"]?>" id="id_cliente_c" id="confirmPasswordInput" name="medidam2_equipamiento" class="form-control">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Capacidad</label>
					                                                                    <input type="text" placeholder="" value="<?php print $e["capacidad"]?>" id="id_cliente_c" id="confirmPasswordInput" name="capacidad_equipamiento" class="form-control">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-2">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Cantidad</label>
					                                                                    <input type="text" placeholder="" id="confirmPasswordInput" value="<?php print $e["cantidad"]?>" id="id_cliente_c" name="cantidad_equipamiento" class="form-control">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            
			                                                            </div>
			                                                            <div class="row">
				                                                            <div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Usuarios</label>
					                                                                    <select name="user_equipamiento" class="form-control">
					                                                                    	<option>Seleccione una opci&oacute;n</option>
					                                                                    	<?php
					                                                                    		foreach ($user as $uu){
					                                                                    			if($uu["id"]==$e["user_construccion"]){ 
						                                                                    			print '
						                                                                    				<option value="'.$uu["id"].'" selected> '.$uu["nombre"].' </option>
						                                                                    			';
					                                                                    			}else{
					                                                                    				print '
						                                                                    				<option value="'.$uu["id"].'" > '.$uu["nombre"].' </option>
						                                                                    			';
					                                                                    			}
					                                                                    		} 
					                                                                    	?>
					                                                                    </select>
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Uso</label>
					                                                                    <select name="uso_equipamiento" class="form-control">
					                                                                    	<option>Seleccione una opci&oacute;n</option>
					                                                                    	<?php
					                                                                    		foreach ($uso as $u){
					                                                                    			if($u["id"]==$e["uso"]){
						                                                                    			print '
						                                                                    				<option value="'.$u["id"].'" selected> '.$u["nombre"].' </option>
						                                                                    			';
					                                                                    			}else{
					                                                                    				print '
						                                                                    				<option value="'.$u["id"].'" > '.$u["nombre"].' </option>
						                                                                    			';
					                                                                    			}
					                                                                    		}
					                                                                    	?>
					                                                                    </select>
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-3">
							                                                           	<div class="form-group">
							                                                                <span class="input-icon icon-right">
							                                                                	<label>Responsable/asignado a</label>
							                                                                    <input type="text" class="form-control" name="responsable_equipamiento" id="confirmPasswordInput" placeholder="" value="<?php print $e["responsable"]?>">
							                                                                    
							                                                                </span>
							                                                            </div>
						                                                            </div>
				                                                            <div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Dictamen Tecnico Independiente?</label>
					                                                                    <div class="checkbox">
									                                                        <label>
									                                                            <input type="radio" class="inverted" name="dictamen_equipamiento" value="no" <?php if($e["dictamen"]=="no"){ print 'checked'; }?>>
									                                                            <span class="text">No</span>
									                                                        </label>
									                                                    </div>
					                                                                    <div class="checkbox">
					                                                                    	
									                                                        <label>
									                                                            <input type="radio" class="inverted" name="dictamen_equipamiento" value="yes" <?php if($e["dictamen"]=="yes"){ print 'checked'; }?> >
									                                                            <span class="text">Si</span>
									                                                        </label>
									                                                    </div>
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            
			                                                            </div>
			                                                            <div class="row">
			                                                            	<div class="col-sm-3">
				                                                            		
					                                                           		<div class="form-group">
					                                                           			<span class="input-icon icon-right">
					                                                           			<label>Ubicaci&oacute;n</label>
				                                                            			<input type="text" name="ubicacion" class="form-control" value="<?php print $e["ubicacion"];
				                                                            			?>" />
				                                                            			</span>
				                                                            		</div>		
				                                                            </div>
			                                                            	<div class="col-sm-3">
				                                                            		<a href="/images/complementos/<?php print $img[0]; ?>" class="fancybox" id="fancy">
				                                                            			<img src="/images/complementos/<?php print $img[0]; ?>" width="50%" id="img_l" />
				                                                            		</a>
					                                                           		<div class="form-group">
					                                                           			<span class="input-icon icon-right">
				                                                            			<input type="file" name="img_equipamiento" class="form-control" id="cons" />
				                                                            			</span>
				                                                            		</div>		
				                                                            </div>
			                                                            
			                                                            </div>
<?php }elseif($e["tipo"]==3){
	$img= explode("-", mostrar_img($link, $_POST["id"],"complementos", "amenidad"));
	?>
																		<div class="row">
				                                                            <div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Tipo de Amenidad</label>
					                                                                    <input type="text" placeholder="" id="confirmPasswordInput" name="nombre_amenidad" class="form-control" value="<?php print $e["nombre"]; ?>">
					                                                                    <input type="hidden" name="seccion" value="amenidad" />
					                                                                    <input type="hidden" name="tipo_amenidad" value="<?php print $e["tipo"]?>" />
					                                                                    <input type="hidden" name="id" value="<?php print $_POST["id"]?>" id="id_cliente_c" />
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-2">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>ML</label>
					                                                                    <input type="text" placeholder="" value="<?php print $e["medidaml"]?>" id="id_cliente_c" id="confirmPasswordInput" name="medidaml_amenidad" class="form-control">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-2">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label> M2</label>
					                                                                    <input type="text" placeholder="" value="<?php print $e["medidam2"]?>" id="id_cliente_c" id="confirmPasswordInput" name="medidam2_amenidad" class="form-control">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                             <div class="col-sm-2">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Capacidad</label>
					                                                                    <input type="text" placeholder="" value="<?php print $e["capacidad"]?>" id="id_cliente_c" id="confirmPasswordInput" name="capacidad_amenidad" class="form-control">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Cantidad</label>
					                                                                    <input type="text" placeholder="" id="confirmPasswordInput" value="<?php print $e["cantidad"]?>" id="id_cliente_c" name="cantidad_amenidad" class="form-control">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                           
			                                                            </div>
			                                                             <div class="row">
				                                                            <div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Usuarios</label>
					                                                                    <select name="user_amenidad" class="form-control">
					                                                                    	<option>Seleccione una opci&oacute;n</option>
					                                                                    	<?php
					                                                                    		foreach ($user as $uu){
					                                                                    			if($uu["id"]==$e["user_construccion"]){ 
						                                                                    			print '
						                                                                    				<option value="'.$uu["id"].'" selected> '.$uu["nombre"].' </option>
						                                                                    			';
					                                                                    			}else{
					                                                                    				print '
						                                                                    				<option value="'.$uu["id"].'" > '.$uu["nombre"].' </option>
						                                                                    			';
					                                                                    			}
					                                                                    		} 
					                                                                    	?>
					                                                                    </select>
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Uso</label>
					                                                                    <select name="uso_amenidad" class="form-control">
					                                                                    	<option>Seleccione una opci&oacute;n</option>
					                                                                    	<?php
					                                                                    		foreach ($uso as $u){
					                                                                    			if($u["id"]==$e["uso"]){
						                                                                    			print '
						                                                                    				<option value="'.$u["id"].'" selected> '.$u["nombre"].' </option>
						                                                                    			';
					                                                                    			}else{
					                                                                    				print '
						                                                                    				<option value="'.$u["id"].'" > '.$u["nombre"].' </option>
						                                                                    			';
					                                                                    			}
					                                                                    		}
					                                                                    	?>
					                                                                    </select>
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-3">
							                                                           	<div class="form-group">
							                                                                <span class="input-icon icon-right">
							                                                                	<label>Responsable/asignado a</label>
							                                                                    <input type="text" class="form-control" name="responsable_amenidad" id="confirmPasswordInput" placeholder="" value="<?php print $e["responsable"]?>">
							                                                                    
							                                                                </span>
							                                                            </div>
						                                                            </div>
				                                                            <div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Ubicaci&oacute;n</label>
									                                                            <input type="text"  name="ubicacion_amenidad" value="<?php print $e["ubicacion"]?>" class="form-control" >
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            
			                                                            </div>
			                                                            <div class="row">
						                                                            	<div class="col-sm-3">
						                                                            		<div class="form-group">
								                                                                <span class="input-icon icon-right">
								                                                                	<label>Dictamen T&eacute;cnico Independiente?</label>
								                                                                    <div class="checkbox">
												                                                        <label>
												                                                            <input type="radio" value="no" name="dictamen_amenidad" class="inverted" <?php if($e["dictamen"]=="no"){ print 'checked'; }?> >
												                                                            <span class="text">No</span>
												                                                        </label>
												                                                    </div>
								                                                                    <div class="checkbox">
												                                                        <label>
												                                                            <input type="radio" value="yes" name="dictamen_amenidad" class="inverted" <?php if($e["dictamen"]=="yes"){ print 'checked'; }?>>
												                                                            <span class="text">Si</span>
												                                                        </label>
												                                                    </div>
								                                                                </span>
								                                                            </div>
						                                                            	</div>
						                                                            	<div class="col-sm-3">
						                                                            		<div class="form-group">
								                                                                <span class="input-icon icon-right">
								                                                                	<label>Reservable</label>
								                                                                    <div class="checkbox">
												                                                        <label>
												                                                            <input type="radio" value="no" name="reserva_amenidad" class="inverted" <?php if($e["reservable"]=="no"){ print 'checked'; }?>>
												                                                            <span class="text">No</span>
												                                                        </label>
												                                                    </div>
								                                                                    <div class="checkbox">
												                                                        <label>
												                                                            <input type="radio" value="yes" name="reserva_amenidad" class="inverted" <?php if($e["reservable"]=="yes"){ print 'checked'; }?>>
												                                                            <span class="text">Si</span>
												                                                        </label>
												                                                    </div>
								                                                                </span>
								                                                            </div>
						                                                            	</div>
						                                                            	 <div class="col-sm-3">
						                                                            	 		<a href="/images/complementos/<?php print $img[0]; ?>" class="fancybox" id="fancy">
							                                                            			<img src="/images/complementos/<?php print $img[0]; ?>" width="50%" id="img_l" />
							                                                            		</a>
								                                                           		<div class="form-group">
								                                                           			<span class="input-icon icon-right">
								                                                           			<label>Imagen</label>
							                                                            			<input type="file" class="form-control" name="img_amenidad">
							                                                            			</span>
							                                                            		</div>		
							                                                            </div>
						                                                            </div>

<?php 
	}elseif($e["tipo"]==4){
	$area= lista($link, "area_personal", "order by nombre asc", "");
	?>
		<div class="row">
			<div class="col-sm-3">
				<div class="form-group">
					<span class="input-icon icon-right">
					<label>Nombre</label>
						<input type="text" placeholder="" id="personal_in" name="nombre_personal" class="form-control" value="<?php print $e["nombre"]?>">
						<input type="hidden" placeholder="" id="" name="tipo_personal" value="4" class="form-control">
						<input type="hidden" placeholder="" id="id_cliente_pe" name="id" value="<?php print $_POST["id"]?>" class="form-control">
						<input type="hidden" placeholder="" id="" name="seccion" value="personal" class="form-control">
					</span> 
				</div>
			</div>
			<div class="col-sm-2">
								                                                            <div class="form-group">
								                                                                <span class="input-icon icon-right">
								                                                                	<label>&Aacute;rea de responsabilidad</label>
								                                                                    <select name="area_presonal" class="form-control">
								                                                                    	<?php
								                                                                    		foreach ($area as $p){
								                                                                    			if($e["area_responsabilidad"]==$p["id"]){
								                                                                    				print '<option value="'.$p["id"].'" selected>'.$p["nombre"].'</option>';
								                                                                    			}else{
								                                                                    				print '<option value="'.$p["id"].'" >'.$p["nombre"].'</option>';
								                                                                    			}
								                                                                    		}
								                                                                    	?>
								                                                                    </select>
								                                                                    
								                                                                </span>
								                                                            </div>
							                                                            </div>
							                                                            <div class="col-sm-2">
								                                                            <div class="form-group">
								                                                                <span class="input-icon icon-right">
								                                                                	<label>Fecha de Inicio</label>
								                                                                    <input type="text" placeholder="" data-date-format="dd-mm-yyyy" id="" name="fecha_ini" class="form-control date-picker" value="<?php print $e["fecha_ini"]?>">
								                                                                    
								                                                                </span>
								                                                            </div>
							                                                            </div>
							                                                            <div class="col-sm-2">
								                                                            <div class="form-group">
								                                                                <span class="input-icon icon-right">
								                                                                	<label>Fecha de terminaci&oacute;n</label>
								                                                                    <input type="text" placeholder="" data-date-format="dd-mm-yyyy" id="id-date-picker-1" name="fecha_fin" class="form-control date-picker" value="<?php print $e["fecha_terminacion"]?>">
								                                                                    
								                                                                </span>
								                                                            </div>
							                                                            </div>
							                                                            <div class="col-sm-3">
								                                                            <div class="form-group">
								                                                                <span class="input-icon icon-right">
								                                                                	<label>Correo @</label>
								                                                                    <input type="email" placeholder=""  id="confirmPasswordInput" name="correo_personal" class="form-control" value="<?php print $e["correo"]?>" >
								                                                                    
								                                                                </span>
								                                                            </div>
							                                                            </div>
																			</div>
																			<div class="row">
						                                                            	<div class="col-sm-3">
								                                                            <div class="form-group">
								                                                                <span class="input-icon icon-right">
								                                                                	<label>Tel&eacute;fono Movil</label>
								                                                                    <input type="text" placeholder="" id="" name="movil" class="form-control" value="<?php print $e["movil"]?>">
								                                                                    
								                                                                </span>
								                                                            </div>
							                                                            </div>
						                                                            	<div class="col-sm-3">
								                                                            <div class="form-group">
								                                                                <span class="input-icon icon-right">
								                                                                	<label>Tel&eacute;fono Casa / Oficina</label>
								                                                                    <input type="text" placeholder="" id="personal_in" name="telefono" class="form-control" value="<?php print $e["telefono"]?>">
								                                                                    
								                                                                </span>
								                                                            </div>
							                                                            </div>
						                                                            </div>
<?php }?>
			                                                            <div class="row">
				                                                            <div class="col-sm-12">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Descripci&oacute;n General</label>
					                                                                    <textarea name="descripcion_amenidad"  id="id_cliente_c" class="form-control" rows="8"><?php print $e["descripcion"]?></textarea>
					                                                                </span>
					                                                            </div>
					                                                            
				                                                            </div>
				                                                         <div class="row">
				                                                         	 <div class="col-sm-12" style="padding-left: 30px;">
						                                                         <div class="form-group">
					                                                                <div class="checkbox">
					                                                                    <label>
					                                                                        <input type="checkbox" class="colored-blue" name="status" value="on" <?php if($e["status"]=="on"){ print checked;}?> >
					                                                                        <span class="text" >Activo / Inactivo</span>
					                                                                    </label>
					                                                                </div>
					                                                                <br>
							                                                            <button class="btn btn-primary">Guardar</button>  <img id="carga_c" src="/assets/img/carga.gif" class="oculto"> 
							                                                            <div id="respuesta_c"></div>
					                                                            </div>
				                                                            </div>
			                                                            </div>
			                                                            
			                                                            
				                                                            </form>
	<script type="text/javascript">
	
	
        //--Jquery Select2--
        $(function() {
        		$('.date-picker').datepicker();
       			$('.fancybox').fancybox();
        });
    </script>