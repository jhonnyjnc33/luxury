<?php
include("../includes/login.php");
$condo= datos_individuales_i($link, "inmuebles", "id_producto", $_GET["id"]);
$to= all($link, "tipoOperacion", "order by nombre asc");
$tipoInmueble= all($link, "tipoInmueble", "order by nombre asc");
$pais= all($link, "paises", "order by nombre asc");
$estado= all($link, "estados", "where pais=".$condo["pais"]." order by nombre asc");
$ciudad= all($link, "ciudad", "where estado_id=".$condo["estado"]." order by nombre asc");
$cp= all($link, "cp", "where ciudad_id=".$condo["ciudad"]." group by cp ");
$reg= all($link, "cp", "where  cp=".$condo["cp"]." group by cp ");
$amenidades= all($link, "amenidades", "where tipoAmenidad=1 order by nombre_esp asc");
$ame= all($link, "amenidades", "where tipoAmenidad=2 order by nombre_esp asc");
$s= all($link, "amenidades", "where tipoAmenidad=3 order by nombre_esp asc");
$e= all($link, "amenidades", "where tipoAmenidad=4 order by nombre_esp asc");
$moneda= all($link, "moneda", "order by nombre");
$amu= all($link, "amueblado", "order by nombre");
$edadIn= all($link, "edadInmueble", "order by edad");
$a_r= all($link, "r_amenidad_inmueble", "where inmueble_id=".$_GET["id"]." ");
foreach ($a_r as $value) {
	$a_rr[]=$value["amenidad_id"];
}
$typeConstruction= all($link, "typeContruction", "order by value asc");
?>
<!DOCTYPE html>
<!--
BeyondAdmin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.5
Version: 1.4.2
Purchase: http://wrapbootstrap.com
-->

<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Head -->
<head>
    <meta charset="utf-8" />
    <title> Edici&oacute;n de Producto</title>

    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="/shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <!--Basic Styles-->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="" rel="stylesheet" />
    <link href="/assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/assets/css/weather-icons.min.css" rel="stylesheet" />

    <!--Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300" rel="stylesheet" type="text/css">

    <!--Beyond styles-->
    <link id="beyond-link" href="/assets/css/beyond.min.css" rel="stylesheet" />
    <link href="/assets/css/demo.min.css" rel="stylesheet" />
    <link href="/assets/css/typicons.min.css" rel="stylesheet" />
    <link href="/assets/css/animate.min.css" rel="stylesheet" />
   <!--Page Related styles-->
   
    <link href="/assets/css/dataTables.bootstrap.css" rel="stylesheet" />
    <link id="skin-link" href="" rel="stylesheet" type="text/css" />
     <link href="/assets/css/cambios.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="/assets/css/jquery.fancybox.css?v=2.1.5" media="screen" />

    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="/assets/js/skins.min.js"></script>
</head>
<!-- /Head -->
<!-- Body -->
<body>
   <?php 
   include("../includes/topvar.php");
    ?>
    <!-- Main Container -->
    <div class="main-container container-fluid">
        <!-- Page Container -->
        <div class="page-container">
            <!-- Page Sidebar -->
            <div class="page-sidebar" id="sidebar">
                <?php 
                include("../includes/menu.php");
                ?>
            </div>
            <!-- /Page Sidebar -->
            <!-- Page Content -->
            <div class="page-content">
                <!-- Page Breadcrumb -->
                <div class="page-breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                            <a href="/principal">Home</a>
                        </li>
                        <li>
                            <a href="/inmuebles">Inmuebles</a>
                        </li>
                        <li>
                            Edici&oacute;n de inmueble
                        </li>

                    </ul>
                </div>
                <!-- /Page Breadcrumb -->
                
                <!-- Page Body -->
                <div class="page-body">
                    		
                                                	   <ul class="nav nav-tabs" id="myTab">
				                                            <li class="active">
				                                                <a data-toggle="tab" href="#home">
				                                                    Datos
				                                                </a>
				                                            </li>
				
				                                          <li class="tab-red">
				                                                <a data-toggle="tab" href="#aldeas">
				                                                    Ubicación
				                                                </a>
				                                            </li> 
				                                              <li class="tab-red">
				                                                <a data-toggle="tab" href="#amenidades">
				                                                    Amenidades
				                                                </a>
				                                            </li> 
				                                           
				                                            <!--  <li class="tab-red">
				                                                <a data-toggle="tab" href="#categorias">
				                                                    Categorias
				                                                </a>
				                                            </li>
				                                          
				                                            <li class="tab-red">
				                                                <a data-toggle="tab" href="#actividades">
				                                                    Actividades
				                                                </a>
				                                            </li> 
				                                          -->
															<li class="tab-red">
				                                                <a data-toggle="tab" href="#img"> 
				                                                    Imagenes
				                                                </a>
				                                            </li> 
				                                             <li class="tab-red">
				                                                <a data-toggle="tab" href="#broshure">
				                                                    Broshure y Planos
				                                                </a>
				                                            </li>
				                                        </ul>          
				                                      <form role="form" id="alta">
                                                	<div class="tab-content">
                                                			<div id="home" class="tab-pane in active">
			                                                    <div id="registration-form">
			                                                       
			                                                            <div class="row">
				                                                            <div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Nombre (Español)</label>
					                                                                	<input type="hidden" name="id" placeholder="" id="userameInput" class="form-control" value="<?php print $_GET["id"]?>">
					                                                                    <input type="hidden" name="seccion" placeholder="" id="userameInput" class="form-control" value="inmueble">
					                                                                    <input type="text" name="nombre_esp"  class="form-control" value="<?php print $condo["nombre_esp"]?>">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
			                                                           		<div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Nombre (Ingles)</label>
					                                                                    <input type="text" name="nombre_eng"  value="<?php print $condo["nombre_eng"]?>" class="form-control ">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Tipo </label>
					                                                                    <select type="text" name="typeConstruccion" id=""  class="form-control" >
					                                                                    	<option value="0">Seleccione una opci&oacute;n</option>
					                                                                    	<?php
					                                                                    		foreach ($typeConstruction as $ty){
					                                                                    			if($ty["idTypeConstruction"]==$condo["idTypeConstruction"]){
						                                                                    			print '
						                                                                    				<option value="'.$ty["idTypeConstruction"].'" selected>'.$ty["value"].'</option>
						                                                                    			';
						                                                                    		}else{
						                                                                    			print '
						                                                                    				<option value="'.$ty["idTypeConstruction"].'" >'.$ty["value"].'</option>
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
					                                                                	<label>Operación</label>
					                                                                    <select type="text" name="operacion" id="ope"  class="form-control" >
					                                                                    	<option value="0">Seleccione una opci&oacute;n</option>
					                                                                    	<?php
					                                                                    		foreach ($to as $ope){
					                                                                    			if($condo["operacionId"]==$ope["idTipoOperacion"]){
						                                                                    			print '
						                                                                    				<option value="'.$ope["idTipoOperacion"].'" selected>'.$ope["nombre"].'</option>
						                                                                    			';
						                                                                    		}else{
						                                                                    			print '
						                                                                    				<option value="'.$ope["idTipoOperacion"].'" >'.$ope["nombre"].'</option>
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
					                                                                	<label>Tipo</label>
					                                                                    <select type="text" name="tipoInmueble" class="form-control" >
					                                                                    	<option value="0">Seleccione una opci&oacute;n</option>
					                                                                    	<?php
					                                                                    		foreach ($tipoInmueble as $tipo){
					                                                                    			if($tipo["idTipoInmueble"]== $condo["tipoInmuebleId"]){
					                                                                    				$sel='selected';
					                                                                    			}else{
					                                                                    				$sel='';
					                                                                    			}
					                                                                    			print '
					                                                                    				<option value="'.$tipo["idTipoInmueble"].'" '.$sel.'>
																										   '.$tipo["nombre"].'
																										 </option>
					                                                                    			';
					                                                                    			$subTipo='';
					                                                                    		}
					                                                                    	?>
					                                                                    </select>
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
			                                                           		<div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Precio (Venta O renta)</label>
					                                                                    <input type="text" name="precio"  class="form-control " value="<?php print $condo["precio"]?>"  >
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-1">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Moneda</label>
					                                                                    <select type="text" name="precioMoneda"   class="form-control" >
					                                                                    	<option value="0">Seleccione una opci&oacute;n</option>
					                                                                    	<?php
					                                                                    		foreach ($moneda as $m){
					                                                                    			if($condo["precioMonedaId"]==$m["id_moneda"]){
						                                                                    			print '
						                                                                    				<option value="'.$m["id_moneda"].'" selected>'.$m["nombre"].'</option>
						                                                                    			';
						                                                                    		}else{
						                                                                    			print '
						                                                                    				<option value="'.$m["id_moneda"].'" >'.$m["nombre"].'</option>
						                                                                    			';
						                                                                    		}
					                                                                    		}
					                                                                    	?>
					                                                                    </select>
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <?
				                                                            	if($condo["operacionId"]== 4){
				                                                            		$st= 'style="display: block"';
				                                                            	}else{
				                                                            		$st= 'style="display: none;"';
				                                                            	}
				                                                            ?>
				                                                            <div class="col-sm-3" id="precioRenta" >
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Precio Renta </label>
					                                                                    <input type="text" name="precioRenta"  class="form-control " <?php print $st;?> value="<?php print $condo["precioRenta"]?>" >
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-1" id="monedaRenta" <?php print $st;?> >
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Moneda</label>
					                                                                    <select type="text" name="precioMonedaRenta"   class="form-control" >
					                                                                    	<option value="0">Seleccione una opci&oacute;n</option>
					                                                                    	<?php
					                                                                    		foreach ($moneda as $m){
					                                                                    			if($condo["precioMonedaIdRenta"]== $m["id_moneda"]){
					                                                                    			print '
					                                                                    				<option value="'.$m["id_moneda"].'" selected>'.$m["nombre"].'</option>
					                                                                    			';
					                                                                    			}else{
					                                                                    				print '
					                                                                    				<option value="'.$m["id_moneda"].'">'.$m["nombre"].'</option>
					                                                                    			';
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
						                                                                	<label>Url Video</label>
						                                                                    <input type="text" name="urlVideo"  class="form-control " value="<?php print $condo["urlVideo"]?>"  >
						                                                                    
						                                                                </span>
						                                                            </div>
				                                                        		</div>
				                                                            	<div class="col-sm-12">
				                                                            		<div class="form-group">
				                                                            			<label>Descripción Corta (Español)</label>
				                                                            			<textarea name="descripcion_esp_corta" placeholder="" class="form-control" rows="7"><?php print $condo["descripcion_esp_corta"]?></textarea>
				                                                            		</div>
				                                                            	</div>
			                                                            	</div>
				                                                            <div class="row">
				                                                            	<div class="col-sm-12">
				                                                            		<div class="form-group">
				                                                            			<label>Descripción (Español)</label>
				                                                            			<textarea name="descripcion_esp" placeholder="" class="form-control" rows="7"><?php print $condo["descripcion_esp"]?></textarea>
				                                                            		</div>
				                                                            	</div>
			                                                            	</div>
				                                                             <div class="row">
				                                                            	<div class="col-sm-12">
				                                                            		<div class="form-group">
				                                                            			<label>Descripcion Corta (Ingles)</label>
				                                                            			<textarea name="descripcion_eng_corta" placeholder="" class="form-control" rows="7"><?php print $condo["descripcion_eng_corta"]?></textarea>
				                                                            		</div>
				                                                            	</div>
			                                                            	</div>
																			
				                                                             <div class="row">
				                                                            	<div class="col-sm-12">
				                                                            		<div class="form-group">
				                                                            			<label>Descripcion (Ingles)</label>
				                                                            			<textarea name="descripcion_eng" placeholder="" class="form-control" rows="7"><?php print $condo["descripcion_eng"]?></textarea>
				                                                            		</div>
				                                                            	</div>
			                                                            	</div>
			                                                            	<!-- Datos geberales-->
			                                                            	<div class="row">
			                                                            			<h2 class="col-sm-12" style="border-top: 1px solid #ccc; margin: 10px 0; padding-top: 10px;"> Datos Espesíficos</h2>
				                                                            	<div class="col-sm-3" >
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Amueblado</label>
						                                                                    <select type="text" name="amueblado"   class="form-control" >
						                                                                    	<option value="0">Seleccione una opci&oacute;n</option>
						                                                                    	<?php
						                                                                    		foreach ($amu as $am){
						                                                                    			if($am["idAmueblado"]==$condo["amuebladoId"]){
							                                                                    			print '
							                                                                    				<option value="'.$am["idAmueblado"].'" selected>'.$am["nombre"].'</option>
							                                                                    			';
							                                                                    		}else{
							                                                                    			print '
							                                                                    				<option value="'.$am["idAmueblado"].'">'.$am["nombre"].'</option>
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
						                                                                	<label>Recamaras</label>
						                                                                    <input type="text" name="recamara"  class="form-control " value="<?php print $condo["recamara"]?>"  >
						                                                                    
						                                                                </span>
						                                                            </div>
					                                                            </div>
					                                                            <div class="col-sm-3">
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Baños</label>
						                                                                    <input type="text" name="banios"  class="form-control " value="<?php print $condo["banios"]?>"  >
						                                                                    
						                                                                </span>
						                                                            </div>
					                                                            </div>
					                                                            <div class="col-sm-3">
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Medios Baños</label>
						                                                                    <input type="text" name="Mediobanios"  class="form-control " value="<?php print $condo["mediobanios"]?>"  >
						                                                                    
						                                                                </span>
						                                                            </div>
					                                                            </div>
					                                                            <div class="col-sm-3">
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Metros Construcción</label>
						                                                                    <input type="text" name="metrosConstruccion"  class="form-control " value="<?php print $condo["metrosConstruccion"]?>"  >
						                                                                    
						                                                                </span>
						                                                            </div>
					                                                            </div>
					                                                            <div class="col-sm-3">
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Metros Terreno</label>
						                                                                    <input type="text" name="metrosTerreno"  class="form-control " value="<?php print $condo["metrosTerreno"]?>"  >
						                                                                    
						                                                                </span>
						                                                            </div>
					                                                            </div>
					                                                            <div class="col-sm-3">
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Estacionamientos</label>
						                                                                    <input type="text" name="estacionamientos"  class="form-control " value="<?php print $condo["estacionamiento"]?>"  >
						                                                                    
						                                                                </span>
						                                                            </div>
					                                                            </div>
					                                                            <div class="col-sm-3" >
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Edad</label>
						                                                                    <select type="text" name="edadInmueble"   class="form-control" >
						                                                                    	<option value="0">Seleccione una opci&oacute;n</option>
						                                                                    	<?php
						                                                                    		foreach ($edadIn as $ed){
						                                                                    			if($condo["edadInmuebleId"]==$ed["idEdadInmueble"]){
							                                                                    			print '
							                                                                    				<option value="'.$ed["idEdadInmueble"].'" selected>'.$ed["edad"].'</option>
							                                                                    			';
						                                                                    			}else{
						                                                                    				print '
							                                                                    				<option value="'.$ed["idEdadInmueble"].'" >'.$ed["edad"].'</option>
							                                                                    			';
						                                                                    			}
						                                                                    		}
						                                                                    	?>
						                                                                    </select>
						                                                                </span>
						                                                            </div>
				                                                           		</div>
			                                                            	</div>




				                                                            
				                                                            <div class="row">
				                                                          		 <h2 class="col-sm-12" style="border-top: 1px solid #ccc; margin: 10px 0; padding-top: 10px;">Posicionamiento Web</h2>
					                                                            <div class="col-sm-3">
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Tag Title esp</label>
						                                                                    <input id="" name="tag_title_esp" class="form-control" value="<?php print $condo["tag_title_esp"]?>">
						                                                                    	
						                                                                </span>
						                                                            </div>
					                                                            </div> 
					                                                            <div class="col-sm-3">
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Tag Title eng</label>
						                                                                    <input id="" name="tag_title_eng" class="form-control" value="<?php print $condo["tag_title_eng"]?>">
						                                                                    	
						                                                                </span>
						                                                            </div>
					                                                            </div>
				                                                          		 
					                                                            <div class="col-sm-3">
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Url Esp</label>
						                                                                    <input id="condominio" name="url_esp" class="form-control" value="<?php print $condo["url_esp"]?>">
						                                                                    	
						                                                                </span>
						                                                            </div>
					                                                            </div>
					                                                            <div class="col-sm-3">
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Url Eng</label>
						                                                                    <input id="condominio" name="url_eng" class="form-control" value="<?php print $condo["url_eng"]?>">
						                                                                    	
						                                                                </span>
						                                                            </div>
					                                                            </div>
					                                                            
					                                                            
			                                                                </div>
				                                                          
			                                                              
			                                                            
			                                                            <div class="row">
			                                                            	<div class="col-sm-12">
			                                                            		<div class="form-group">
			                                                            			<label>Tag Description esp</label>
			                                                            			<textarea name="tag_description_esp"  class="form-control" rows="7"><?php print $condo["tag_description_esp"]?></textarea>
			                                                            		</div>
			                                                            	</div>
			                                                            </div>
			                                                            <div class="row">
			                                                            	<div class="col-sm-12">
			                                                            		<div class="form-group">
			                                                            			<label>Tag Description eng</label>
			                                                            			<textarea name="tag_description_eng"  class="form-control" rows="7"><?php print $condo["tag_description_eng"]?></textarea>
			                                                            		</div>
			                                                            	</div>
			                                                            </div>
			                                                            <div class="form-group">
			                                                                <div class="checkbox">
			                                                                	<?php
			                                                                	if($condo["status"]=="on"){
			                                                                		$s= 'checked';
			                                                                	}else{
			                                                                		$s='';
			                                                                	}
			                                                                	?>
			                                                                    <label>
			                                                                        <input type="checkbox" class="colored-blue" name="status" value="on" <?php print $s;?>>
			                                                                        <span class="text">Activo / Inactivo</span>
			                                                                    </label>
			                                                                </div>
			                                                            </div>
			                                                            <div class="form-group">
			                                                                <div class="checkbox">
			                                                                	<?php
			                                                                	if($condo["destacado"]=="on"){
			                                                                		$ss= 'checked';
			                                                                	}else{
			                                                                		$ss='';
			                                                                	}
			                                                                	?>
			                                                                    <label>
			                                                                        <input type="checkbox" class="colored-blue" name="destacado" value="on" <?php print $ss;?>>
			                                                                        <span class="text">Destacado / Home</span>
			                                                                    </label>
			                                                                </div>
			                                                            </div>
			                                                            <div class="form-group">
			                                                                <div class="checkbox">
			                                                                	<?php
			                                                                	if($condo["slider"]=="on"){
			                                                                		$ssl= 'checked';
			                                                                	}else{
			                                                                		$ssl='';
			                                                                	}
			                                                                	?>
			                                                                    <label>
			                                                                        <input type="checkbox" class="colored-blue" name="slider" value="on" <?php print $ssl;?>>
			                                                                        <span class="text">Slider</span>
			                                                                    </label>
			                                                                </div>
			                                                            </div>
			                                                        
			                                                    </div>
			                                                   
		                                                    </div><!-- fin del primer tab id home -->
		                                                    
		                                                    <div id="img" class="tab-pane in">
		                                                    	<h2>Slider</h2>
		                                                    	<?php
		                                                    		$iii= mostrar_img($link, $_GET["id"], "producto", "slider");
		                                                    		
		                                                    		foreach ($iii as $imgi) {
		                                                    			print '
		                                                    				<div class="galeria" id="m_'.$imgi["id"].'">
		                                                    					<i class="fa fa-close eliminar" data-table="imagen" data-campo="id_imagen" data-id="'.$imgi["id"].'"></i>
		                                                    					<img src="/images/producto_img/'.$imgi["imagen"].'" width="100" />
		                                                    				</div>
		                                                    			';
		                                                    		}
		                                                    	?>
																

			                                                   	<input type="file" name="slider" class="form-control" />
			                                                   <i>Recuerda que debe estar habilidato la función slider para que puedas ver esta imagen en el slider del home. Medidas recomendads 1920px * 800</i>
		                                                    	<hr>
		                                                    	<h2>Listado</h2>
		                                                    	<?php
		                                                    		$i= mostrar_img($link, $_GET["id"], "producto", "listado");
		                                                    		
		                                                    		foreach ($i as $img) {
		                                                    			print '
		                                                    				<div class="galeria" id="m_'.$img["id"].'">
		                                                    					<i class="fa fa-close eliminar" data-table="imagen" data-campo="id_imagen" data-id="'.$img["id"].'"></i>
		                                                    					<img src="/images/producto_img/'.$img["imagen"].'" width="100" />
		                                                    				</div>
		                                                    			';
		                                                    		}
		                                                    	?>
			                                                   	<input type="file" name="logo" class="form-control" />
			                                                   	<hr>
																<h2>Logo Proveedor</h2>
		                                                    	<?php
		                                                    		$loPro= mostrar_img($link, $_GET["id"], "producto", "logoProveedor");
		                                                    		
		                                                    		foreach ($loPro as $imgLogProv) {
		                                                    			print '
		                                                    				<div class="galeria" id="m_'.$imgLogProv["id"].'">
		                                                    					<i class="fa fa-close eliminar" data-table="imagen" data-campo="id_imagen" data-id="'.$imgLogProv["id"].'"></i>
		                                                    					<img src="/images/producto_img/'.$imgLogProv["imagen"].'" width="100" />
		                                                    				</div>
		                                                    			';
		                                                    		}
		                                                    	?>
			                                                   	<input type="file" name="logoProveedor" class="form-control" />
			                                                   	<hr>
			                                                   	<h2>Galer&iacute;a</h2>
			                                                   	<?php
		                                                    		$ii= mostrar_img($link, $_GET["id"], "producto", "galeria_producto");
		                                                    		//print_r($ii);
;		                                                    		foreach ($ii as $imgg) {
		                                                    			print '
		                                                    				<div style="display: inline-block; position: relative;" class="galeria" id="m_'.$imgg["id"].'">
		                                                    					<i class="fa fa-close eliminar" data-id="'.$imgg["id"].'" data-table="imagen" data-campo="id_imagen"></i>
		                                                    					<img src="/images/producto_img/'.$imgg["imagen"].'"  />
		                                                    				</div>
		                                                    			';
		                                                    		}
		                                                    		
		                                                    	?>
		                                                    	<i style="display: block; clear: both;">Medidas sugeridas 960px * 540px</i>
			                                                   	<a href="#" id="agrega" style="clear: both;">Agregar Imagen</a> 
			                                                   	<div id="galeria">
			                                                   		<input type="file" name="galeria_golf[]" class="form-control g" />
			                                                   	</div>
		                                                    </div>
		                                                    <div id="broshure" class="tab-pane in">
																<h2>Broshure</h2>
		                                                    	<?php
		                                                    		$i= mostrar_img($link, $_GET["id"], "producto", "broshure");
		                                                    		
		                                                    		foreach ($i as $img) {
		                                                    			print '
		                                                    				<div class="galeria" id="m_'.$img["id"].'">
		                                                    					<i class="fa fa-close eliminar" data-table="imagen" data-campo="id_imagen" data-id="'.$img["id"].'"></i>
		                                                    					<a href="/images/producto_img/'.$img["imagen"].'" target="_blank">Ver Broshure</a>
		                                                    				</div>
		                                                    			';
		                                                    		}
		                                                    	?>
			                                                   	<input type="file" name="broshure" class="form-control" />
			                                                   	<hr>
			                                                   	<h2>Planos</h2>
			                                                   	<?php
		                                                    		$pl= mostrar_img($link, $_GET["id"], "producto", "plano");
		                                                    		foreach ($pl as $plano) {
		                                                    			print '
		                                                    				<div style="display: inline-block; position: relative;" class="galeria" id="m_'.$plano["id"].'">
		                                                    					<i class="fa fa-close eliminar" data-id="'.$plano["id"].'" data-table="imagen" data-campo="id_imagen"></i>
		                                                    					<img src="/images/producto_img/'.$plano["imagen"].'"  />
		                                                    				</div>
		                                                    			';
		                                                    		}
		                                                    		
		                                                    	?>
		                                                    	<div class="clear"></div>
		                                                    	<a href="#" id="agregaPlano">Agregar Plano</a>
																<div id="planos">
																	<input type="file" name="plano[]" class="form-control" />
																</div>
		                                                    </div>
		                                                    
		                                                    <div id="categorias" class="tab-pane in ">
			                                                   	
		                                                   			<div class="row">
			                                                   	<?php
			                                                   		foreach($categorias as $cat){
			                                                   			if(in_array($cat["id"], $categoria_r)){
			                                                   				$chnt= 'checked';
			                                                   			}else{
			                                                   				$chnt= '';
			                                                   			}
			                                                   			print '
			                                                   				
				                                                   				<div class="col-sm-2">
					                                                   				<div class="form-group">
						                                                                <div class="checkbox">
						                                                                    <label>
						                                                                        <input type="checkbox" class="colored-blue" name="categoria[]" value="'.$cat["id"].'" '.$chnt.'>
						                                                                        <span class="text">'.$cat["nombre_esp"].'</span>
						                                                                    </label>
						                                                                </div>
						                                                            </div>
					                                                            </div>
				                                                           
			                                                   			';
			                                                   		
			                                                   		}
			                                                   	
			                                                   	?>
		                                                   		 </div>
		                                                   
		                                                   </div>
		                                                   <div id="amenidades" class="tab-pane in ">
			                                                   	
		                                                   			<div class="row">
			                                                   <h2 class="col-sm-12">Generales</h2>
					                                                   	<?php
					                                                   		foreach($amenidades as $am){
					                                                   			if(in_array($am["id_amenidad"], $a_rr)){
					                                                   				$fc='checked';
					                                                   			}else{
					                                                   				$fc='';
					                                                   			}
					                                                   			print '
					                                                   				
						                                                   				<div class="col-sm-4">
							                                                   				<div class="form-group">
								                                                                <div class="checkbox">
								                                                                    <label>
								                                                                        <input type="checkbox" '.$fc.' class="colored-blue" name="amenidad[]" value="'.$am["id_amenidad"].'">
								                                                                        <span class="text">'.$am["nombre_esp"].'</span>
								                                                                    </label>
								                                                                </div>
								                                                            </div>
							                                                            </div>
						                                                           
					                                                   			';
					                                                   		
					                                                   		}
					                                                   	
					                                                   	?>
					                                                   <hr style="border-top: 1px solid #eee; height: 1px;"> 
					                                                   	<h2 class="col-sm-12">Amenidades</h2>
					                                                   	<?php
					                                                   		foreach($ame as $amen){
					                                                   			if(in_array($amen["id_amenidad"], $a_rr)){
					                                                   				$cc='checked';
					                                                   			}else{
					                                                   				$cc='';
					                                                   			}
					                                                   			print '
					                                                   				
						                                                   				<div class="col-sm-4">
							                                                   				<div class="form-group">
								                                                                <div class="checkbox">
								                                                                    <label>
								                                                                        <input type="checkbox" class="colored-blue" name="amenidad[]" value="'.$amen["id_amenidad"].'" '.$cc.'>
								                                                                        <span class="text">'.$amen["nombre_esp"].'</span>
								                                                                    </label>
								                                                                </div>
								                                                            </div>
							                                                            </div>
						                                                           
					                                                   			';
					                                                   		
					                                                   		}
					                                                   	
					                                                   	?>
					                                                   <hr style="border-top: 1px solid #eee; height: 1px;"> 
					                                                   	<h2 class="col-sm-12">Servicios</h2>
					                                                   	<?php
					                                                   		foreach($s as $servicio){
					                                                   			if(in_array($amen["id_amenidad"], $a_rr)){
					                                                   				$dd='checked';
					                                                   			}else{
					                                                   				$dd='';
					                                                   			}
					                                                   			print '
					                                                   				
						                                                   				<div class="col-sm-4">
							                                                   				<div class="form-group">
								                                                                <div class="checkbox">
								                                                                    <label>
								                                                                        <input type="checkbox" class="colored-blue" name="amenidad[]" value="'.$servicio["id_amenidad"].'" '.$dd.'>
								                                                                        <span class="text">'.$servicio["nombre_esp"].'</span>
								                                                                    </label>
								                                                                </div>
								                                                            </div>
							                                                            </div>
						                                                           
					                                                   			';
					                                                   		
					                                                   		}
					                                                   	
					                                                   	?>
					                                                   		<hr style="border-top: 1px solid #eee; height: 1px;"> 
					                                                   	<h2 class="col-sm-12">Exteriores</h2>
					                                                   	<?php
					                                                   		foreach($e as $ex){
					                                                   			print '
					                                                   				
						                                                   				<div class="col-sm-4">
							                                                   				<div class="form-group">
								                                                                <div class="checkbox">
								                                                                    <label>
								                                                                        <input type="checkbox" class="colored-blue" name="amenidad[]" value="'.$ex["id_amenidad"].'">
								                                                                        <span class="text">'.$ex["nombre_esp"].'</span>
								                                                                    </label>
								                                                                </div>
								                                                            </div>
							                                                            </div>
						                                                           
					                                                   			';
					                                                   		
					                                                   		}
					                                                   	
					                                                   	?>
		                                                   		 </div>
		                                                   
		                                                   </div>
		                                                   <div id="aldeas" class="tab-pane in ">
		                                                   		<div class="row">
			                                                   	<div class="col-sm-3" >
						                                                     <div class="form-group">
						                                                        <label>País</label>
						                                                        <select type="text" name="pais" id="pais"  class="form-control" style="width: 100%" >
						                                                            <option value="0">Seleccione una opci&oacute;n</option> 
						                                                                <?php
						                                                                    
					                                                                    		foreach ($pais as $p){
					                                                                    			if($p["id"]==$condo["pais"]){
						                                                                    			print '
						                                                                    				<option value="'.$p["id"].'" selected>'.$p["nombre"].'</option> 
						                                                                    			';
						                                                                    		}else{
						                                                                    			print '
						                                                                    				<option value="'.$p["id"].'" >'.$p["nombre"].'</option> 
						                                                                    			';
						                                                                    		}
					                                                                    		}
					                                                                    	?>
						                                                                    	
						                                                         </select>
						                                                     </div>
				                                                        </div>
				                                                        <div class="col-sm-3" >
						                                                     <div class="form-group">
						                                                        <span class="input-icon icon-right">
						                                                        <label>Estado</label>
						                                                        <select type="text" name="estado" id="estado"  class="form-control" style="width: 100%"  >
						                                                            <option value="0">Seleccione una opci&oacute;n</option>
						                                                                <?php
						                                                                    foreach ($estado as $ed){
						                                                                    	if($condo["estado"]==$ed["id"]){
						                                                                    			print '
						                                                                    				<option value="'.$ed["id"].'" selected>'.$ed["nombre"].'</option>
						                                                                    			';
						                                                                    		}else{
						                                                                    			print '
						                                                                    				<option value="'.$ed["id"].'" >'.$ed["nombre"].'</option>
						                                                                    			';
						                                                                    		}
						                                                                    	}
						                                                                    	?>
						                                                         </select>
						                                                         </span>
						                                                     </div>
				                                                        </div>
				                                                        <div class="col-sm-3" >
						                                                     <div class="form-group">
						                                                        <span class="input-icon icon-right">
						                                                        <label>Ciudad</label>
						                                                        <select type="text" name="ciudad" id="ciudad"  class="form-control" style="width: 100%"  >
						                                                            <option value="0">Seleccione una opci&oacute;n</option>
						                                                                <?php
						                                                                    foreach ($ciudad as $ciu){
						                                                                    	if($condo["ciudad"]==$ciu["id_ciudad"]){
						                                                                    			print '
						                                                                    				<option value="'.$ciu["id_ciudad"].'" selected>'.$ciu["nombre"].'</option>
						                                                                    			';
						                                                                    		}else{
						                                                                    			print '
						                                                                    				<option value="'.$ciu["id_ciudad"].'" >'.$ciu["nombre"].'</option>
						                                                                    			';
						                                                                    		}
						                                                                    	}
						                                                                    	?>
						                                                         </select>
						                                                         </span>
						                                                     </div>
				                                                        </div>
				                                                        <div class="col-sm-3" >
						                                                     <div class="form-group">
						                                                        <span class="input-icon icon-right">
						                                                        <label>CP</label>
						                                                        <select type="text" name="cp" id="cp"  class="form-control" style="width: 100%"  >
						                                                            <option value="0">Seleccione una opci&oacute;n</option>
						                                                                <?php
						                                                                    foreach ($cp as $c){
						                                                                    	if($condo["cp"]==$c["cp"]){
						                                                                    			print '
						                                                                    				<option value="'.$c["cp"].'" selected>'.$c["cp"].'</option>
						                                                                    			';
						                                                                    	}else{
						                                                                    		print '
						                                                                    				<option value="'.$c["cp"].'" >'.$c["cp"].'</option>
						                                                                    			';
						                                                                    	} 
						                                                                    }
						                                                                    	?>
						                                                         </select>
						                                                         </span>
						                                                     </div>
				                                                        </div>
				                                                        
				                                                        
			                                                   			<div class="col-sm-3" >
						                                                     <div class="form-group">
						                                                        <span class="input-icon icon-right">
						                                                        <label>Colonia / Fraccionamiento</label>
						                                                        <select type="text" name="colonia" id="colonia"  class="form-control" style="width: 100%"  >
						                                                            <option value="0">Seleccione una opci&oacute;n</option>
						                                                                <?php
						                                                                    foreach ($reg as $re){

						                                                                    		if($condo["colonia"]==$re["id_cp"]){
						                                                                    			print '
						                                                                    				<option value="'.$re["id_cp"].' " selected>'.$re["direccion"].' </option>
						                                                                    			';
						                                                                    		}else{
						                                                                    			print '
						                                                                    				<option value="'.$re["id_cp"].' ">'.$re["direccion"].' </option>
						                                                                    			';
						                                                                    		}	
						                                                                    	}

						                                                                    	?>
						                                                         </select>
						                                                         </span>
						                                                     </div>
				                                                        </div>
				                                                        <div class="col-sm-12"></div>
				                                                        <div class="col-sm-6">
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Calle o Avenida</label>
						                                                                    <input id="condominio" name="calle" class="form-control" value="<?php print $condo["calle"]?>" >
						                                                                   
						                                                                </span>
						                                                            </div>
					                                                    </div>
					                                                    <div class="col-sm-6">
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Dirección</label>
						                                                                    <input id="condominio" name="direccion" class="form-control" value="<?php print $condo["direccion"]?>" >
						                                                                   
						                                                                </span>
						                                                            </div>
					                                                    </div>
			                                                   		<div class="col-sm-12">
			                                                   				 <div id="map-canvas" style="width:100%; height:350px;"></div>
										                                     <input type="hidden" name="latitud" value="" placeholder="Latitud" class="form-control" id="mapLat">
										                                     <input type="hidden" name="longitud" value="" placeholder="Longitud" class="form-control" id="mapLon">
										                                     <br>
			                                                   		</div><!-- Termina mapa -->
		                                                   		 </div>
		                                                   
		                                                   </div>
		                                                   <div id="actividades" class="tab-pane in ">
			                                                   		<div class="row">
			                                                   	<?php
			                                                   		foreach($actividades as $ac){
			                                                   			if(in_array($ac["id"], $actividad_r)){
			                                                   				$chnr= 'checked';
			                                                   			}else{
			                                                   				$chnr= '';
			                                                   			}
			                                                   			print '
			                                                   				
				                                                   				<div class="col-sm-2">
					                                                   				<div class="form-group">
						                                                                <div class="checkbox">
						                                                                    <label>
						                                                                        <input type="checkbox" class="colored-blue" name="actividad[]" value="'.$ac["id"].'" '.$chnr.'>
						                                                                        <span class="text">'.$ac["nombre_esp"].'</span>
						                                                                    </label>
						                                                                </div>
						                                                            </div>
					                                                            </div>
				                                                           
			                                                   			';
			                                                   		
			                                                   		}
			                                                   	
			                                                   	?>
		                                                   </div>
		                                                   
                                                    </div><!-- fin del tab content -->
                                                    <button class=" btn btn-primary" type="submit">Guardar</button>
                                                    
			                                                            <img id="carga" src="/assets/img/carga.gif">
			                                                            <div id="respuesta"></div>
                                   					
                </div>
                <!-- /Page Body -->
            </div>
            <!-- /Page Content -->
             </form>
        </div>
        <!-- /Page Container -->
        <!-- Main Container -->

    </div>
	
    <!--End Email Templates-->
    <!--Basic Scripts-->
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/slimscroll/jquery.slimscroll.min.js"></script>

    <!--Beyond Scripts-->
    <script src="/assets/js/beyond.min.js"></script>
    <!--Jquery Select2-->
    <script src="/assets/js/select2/select2.js"></script>
    <script src="/assets/js/bootbox/bootbox.js"></script>
    <!--Page Related Scripts-->
    <script src="/assets/js/datatable/jquery.dataTables.min.js"></script>
    <script src="/assets/js/datatable/ZeroClipboard.js"></script>
    <script src="/assets/js/datatable/dataTables.tableTools.min.js"></script>
    <script src="/assets/js/datatable/dataTables.bootstrap.min.js"></script>
    <script src="/assets/js/datatable/datatables-init.js"></script>
    <script src="/assets/js/eliminar_datos.js"></script>
    <script type="text/javascript" src="/assets/js/jquery.fancybox.js?v=2.1.5"></script>
    <script src="/assets/js/datetime/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAev--iJFEzNsKPli1xcQLYdt8IX9VGGB8"></script>
    <script>
    InitiateSearchableDataTable.init();
    </script>
	<script type="text/javascript">

	$("#pais, #estado, #ciudad, #cp, #colonia").select2();	
        
        $('#ope').change(function(){
        	var id= $(this).val();

        	if(id==4){
        		$("#precioRenta, #monedaRenta").fadeIn();
        	}else{
        		$("#precioRenta, #monedaRenta").fadeOut();
        	}
        });
        $(document).on("change", "#pais", function(){
        	var id= $(this).val();
        	$.ajax({
						    url: "/cls/estados.php",
						    type: "post",
						    dataType: "html",
						    data: {id:id},
						    
						})
						.done(function(data){
						   $("#estado").empty().append(data);
						   $("#estado").select2();
					});
        });
        $(document).on("change", "#estado", function(){
        	var id= $(this).val();
        	$.ajax({
						    url: "/cls/ciudad.php",
						    type: "post",
						    dataType: "html",
						    data: {id:id},
						    
						})
						.done(function(data){
						   $("#ciudad").empty().append(data);
						   $("#ciudad").select2();
					});
        });
        $(document).on("change", "#ciudad", function(){
        	var id= $(this).val();
        	$.ajax({
						    url: "/cls/cp.php",
						    type: "post",
						    dataType: "html",
						    data: {id:id},
						    
						})
						.done(function(data){
						   $("#cp").empty().append(data);
						   $("#cp").select2();
					});
        });
        $(document).on("change", "#cp", function(){
        	var id= $(this).val();
        	$.ajax({
						    url: "/cls/colonia.php",
						    type: "post",
						    dataType: "html",
						    data: {id:id},
						    
						})
						.done(function(data){
						   $("#colonia").empty().append(data);
						   $("#colonia").select2();
					});
        });
	 $("#agrega").click(function(){
	      		$("#galeria").append('<input type="file" name="galeria_golf[]" class="form-control g" />');
	      });
	 $("#agregaPlano").click(function(){
	      		$("#planos").append('<input type="file" name="plano[]" class="form-control g" />');
	      });
        
	//--Jquery Select2--
	$(function() {

		$("#e1, #ell, #de").select2();
		$(".eliminar").click(function(){
			var tabla= $(this).attr("data-table");
			var campo= $(this).attr("data-campo");
			var id= $(this).attr("data-id");
			$.post(
				"/acciones/eliminar.php",
				{id:id, campo:campo, tabla:tabla},
				function(data){
					if(data=="1"){
						$("#m_" + id).fadeIn().remove();
					}else{
						alert("Error.Intentalo de nuevo");
					}
			});
		});
		$(".agregar_a").click(function(){
			var id= $(this).attr("id");
			$("#m_"+ id).slideToggle();
		});
		function mostrarImagen(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					$('#img_l').attr('src', e.target.result);

				}
				reader.readAsDataURL(input.files[0]);
			}
		}
		$('.date-picker').datepicker();
		$(document).on("change", "#cons", function(){
			mostrarImagen(this);
		});

		function myFunc(e) {
				    var val = this.value;
				    var re = /^([0-9]+[\.]?[0-9]?[0-9]?|[0-9]+)$/g;
				    var re1 = /^([0-9]+[\.]?[0-9]?[0-9]?|[0-9]+)/g;
				    if (re.test(val)) {
				        //do something here
				
				    } else {
				        val = re1.exec(val);
				        if (val) {
				            this.value = val[0];
				        } else {
				            this.value = "";
				        }
				    }
				}

				  var geocoder = new google.maps.Geocoder();
			      var marker = null;
			      var map = null;
			    
			      function initialize() {
			        var mapLat  = <?php print $condo["latitud"];?> ;
			        var mapLon = <?php print $condo["longitud"];?>;
			        var latLng = new google.maps.LatLng(mapLat, mapLon);
			        map = new google.maps.Map(document.getElementById('map-canvas'),{
			          zoom: 12,
			          center: latLng,
			          mapTypeId: google.maps.MapTypeId.ROADMAP
			        });
			        marker = new google.maps.Marker({
			          position: latLng,
			          map: map,
			          draggable: true
			        });
			        updateMarkerPosition(latLng);
			        updateZoom(map.zoom);
			        geocodePosition(latLng);
			        google.maps.event.addListener(marker, 'drag', function() {
			          updateMarkerPosition(marker.getPosition());
			        });
			        google.maps.event.addListener(marker, 'dragend', function() {
			          geocodePosition(marker.getPosition());
			        });
			      }
			      function geocodePosition(pos) {
			        geocoder.geocode({
			          latLng: pos
			        },
			        function(responses) {
			          void(0);
			        });
			      }
			      //UPDATE FORM FIELDS FOR LAT/LONG
			      function updateMarkerPosition(latLng) {
			        $('#mapLat').val(latLng.lat());
			        $('#mapLon').val(latLng.lng());
			      }
			      function updateZoom(zoom) {
			        $('#google_zoom').val(zoom);
			      } 

	       initialize();
		

	});
    </script>
   
</body>
<!--  /Body -->
</html>
