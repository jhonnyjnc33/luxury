<?php
include("../includes/login.php");
$to= all($link, "tipoOperacion", "order by nombre asc");
$tipoInmueble= all($link, "tipoInmueble", "order by nombre asc");
$pais= all($link, "paises", "order by nombre asc");
$amenidades= all($link, "amenidades", "where tipoAmenidad=1 order by nombre_esp asc");
$ame= all($link, "amenidades", "where tipoAmenidad=2 order by nombre_esp asc");
$s= all($link, "amenidades", "where tipoAmenidad=3 order by nombre_esp asc");
$e= all($link, "amenidades", "where tipoAmenidad=4 order by nombre_esp asc");
$moneda= all($link, "moneda", "order by nombre");
$amu= all($link, "amueblado", "order by nombre");
$edadIn= all($link, "edadInmueble", "order by edad");
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
    <title>alta inmuebles</title>

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
   
    <link id="skin-link" href="" rel="stylesheet" type="text/css" />
     <link href="/assets/css/cambios.css" rel="stylesheet" />

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
                            Alta de Inmueble
                        </li>

                    </ul>
                </div>
                <!-- /Page Breadcrumb -->
                
                <!-- Page Body -->
                <div class="page-body">
                    		
                                                	   <ul class="nav nav-tabs" id="myTab">
				                                            <li class="active">
				                                                <a data-toggle="tab" href="#home">
				                                                    Generales
				                                                </a>
				                                            </li>
				
				                                          
				                                           
				                                            <li class="tab-red">
				                                                <a data-toggle="tab" href="#aldeas">
				                                                    Ubicación
				                                                </a>
				                                            </li> 
				                                           <!--  <li class="tab-red">
				                                                <a data-toggle="tab" href="#categorias">
				                                                    Amenidades
				                                                </a>
				                                            </li>-->
				                                           <li class="tab-red">
				                                                <a data-toggle="tab" href="#amenidades">
				                                                    Amenidades
				                                                </a>
				                                            </li> 
				                                            <li class="tab-red">
				                                                <a data-toggle="tab" href="#profile"> 
				                                                    Imagenes Propiedad
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
					                                                                    <input type="text" name="nombre_esp"  class="form-control" >
					                                                                    <input type="hidden" name="seccion" placeholder="" id="userameInput" class="form-control" value="inmueble">
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Nombre (Ingles)</label>
					                                                                    <input type="text" name="nombre_eng"  class="form-control" >
					                                                                    
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
					                                                                    			print '
					                                                                    				<option value="'.$ope["idTipoOperacion"].'">'.$ope["nombre"].'</option>
					                                                                    			';
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
					                                                                    <input type="text" name="precio"  class="form-control "   >
					                                                                    
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
					                                                                    			print '
					                                                                    				<option value="'.$m["id_moneda"].'">'.$m["nombre"].'</option>
					                                                                    			';
					                                                                    		}
					                                                                    	?>
					                                                                    </select>
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-3" id="precioRenta" style="display: none">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Precio Renta </label>
					                                                                    <input type="text" name="precioRenta"  class="form-control "   >
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-1" id="monedaRenta" style="display: none">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Moneda</label>
					                                                                    <select type="text" name="precioMonedaRenta"   class="form-control" >
					                                                                    	<option value="0">Seleccione una opci&oacute;n</option>
					                                                                    	<?php
					                                                                    		foreach ($moneda as $m){
					                                                                    			print '
					                                                                    				<option value="'.$m["id_moneda"].'">'.$m["nombre"].'</option>
					                                                                    			';
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
				                                                            			<textarea name="descripcion_esp_corta" placeholder="" class="form-control" rows="7" ></textarea>
				                                                            		</div>
				                                                            	</div>
			                                                            	</div>
				                                                             <div class="row">
				                                                            	<div class="col-sm-12">
				                                                            		<div class="form-group">
				                                                            			<label>Descripción (Español)</label>
				                                                            			<textarea name="descripcion_esp" placeholder="" class="form-control" rows="7" ></textarea>
				                                                            		</div>
				                                                            	</div>
			                                                            	</div>
				                                                             <div class="row">
				                                                            	<div class="col-sm-12">
				                                                            		<div class="form-group">
				                                                            			<label>Descripcion Corta (Ingles)</label>
				                                                            			<textarea name="descripcion_eng_corta" placeholder="" class="form-control" rows="7" ></textarea>
				                                                            		</div>
				                                                            	</div>
			                                                            	</div>
																			<div class="row">
				                                                            	<div class="col-sm-12">
				                                                            		<div class="form-group">
				                                                            			<label>Descripcion (Ingles)</label>
				                                                            			<textarea name="descripcion_eng" placeholder="" class="form-control" rows="7" ></textarea>
				                                                            		</div>
				                                                            	</div>
			                                                            	</div>
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
						                                                                    			print '
						                                                                    				<option value="'.$am["idAmueblado"].'">'.$am["nombre"].'</option>
						                                                                    			';
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
						                                                                    <input type="text" name="recamara"  class="form-control "   >
						                                                                    
						                                                                </span>
						                                                            </div>
					                                                            </div>
					                                                            <div class="col-sm-3">
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Baños</label>
						                                                                    <input type="text" name="banios"  class="form-control "   >
						                                                                    
						                                                                </span>
						                                                            </div>
					                                                            </div>
					                                                            <div class="col-sm-3">
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Medios Baños</label>
						                                                                    <input type="text" name="Mediobanios"  class="form-control "   >
						                                                                    
						                                                                </span>
						                                                            </div>
					                                                            </div>
					                                                            <div class="col-sm-3">
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Metros Construcción</label>
						                                                                    <input type="text" name="metrosConstruccion"  class="form-control "   >
						                                                                    
						                                                                </span>
						                                                            </div>
					                                                            </div>
					                                                            <div class="col-sm-3">
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Metros Terreno</label>
						                                                                    <input type="text" name="metrosTerreno"  class="form-control "   >
						                                                                    
						                                                                </span>
						                                                            </div>
					                                                            </div>
					                                                            <div class="col-sm-3">
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Estacionamientos</label>
						                                                                    <input type="text" name="estacionamientos"  class="form-control "   >
						                                                                    
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
						                                                                    			print '
						                                                                    				<option value="'.$ed["idEdadInmueble"].'">'.$ed["edad"].'</option>
						                                                                    			';
						                                                                    		}
						                                                                    	?>
						                                                                    </select>
						                                                                </span>
						                                                            </div>
				                                                           		</div>
				                                                            </div>
				                                                            <div class="row">
				                                                            	
				                                                            	<h2 class="col-sm-12" style="border-top: 1px solid #ccc; margin: 10px 0; padding-top: 10px;">Posicionamiento Web</h2>
				                                                           		
				                                                           		<div class="col-sm-6">
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Tag Title esp</label>
						                                                                    <input  name="tag_title_esp" class="form-control">
						                                                                    	
						                                                                </span>
						                                                            </div>
					                                                            </div>
				                                                           		<div class="col-sm-6">
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Tag Title eng</label>
						                                                                    <input  name="tag_title_eng" class="form-control">
						                                                                    	
						                                                                </span>
						                                                            </div>
					                                                            </div>
				                                                           		
				                                                           		<div class="col-sm-6">
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Url esp</label>
						                                                                    <input id="condominio" name="url_esp" class="form-control" >
						                                                                    <i style="font-size:11px">La url debe contener palabras clave y estar separas por gu&iacute;ion medio, Ejmplo: compra-casa-cancun</i>	
						                                                                </span>
						                                                            </div>
					                                                            </div>
				                                                           		<div class="col-sm-6">
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Url Eng</label>
						                                                                    <input id="condominio" name="url_eng" class="form-control" >
						                                                                    <i style="font-size:11px">La url debe contener palabras clave y estar separas por gu&iacute;ion medio, Ejmplo: compra-casa-cancun</i>	
						                                                                </span>
						                                                            </div>
					                                                            </div>

				                                                          		 
			                                                                </div>
				                                                          
			                                                             
			                                                         
			                                                            <div class="row">
			                                                            	<div class="col-sm-12">
			                                                            		<div class="form-group">
			                                                            			<label>Tag Description Esp</label>
			                                                            			<textarea name="tag_description_esp" placeholder="" class="form-control" rows="7"></textarea>
			                                                            		</div>
			                                                            	</div>
			                                                            </div>
			                                                            <div class="row">
			                                                            	<div class="col-sm-12">
			                                                            		<div class="form-group">
			                                                            			<label>Tag Description Eng</label>
			                                                            			<textarea name="tag_description_eng" placeholder="" class="form-control" rows="7"></textarea>
			                                                            		</div>
			                                                            	</div>
			                                                            </div>
			                                                           
			                                                            <div class="form-group">
			                                                                <div class="checkbox">
			                                                                    <label>
			                                                                        <input type="checkbox" class="colored-blue" name="status" value="on">
			                                                                        <span class="text">Activo / Inactivo</span>
			                                                                    </label>
			                                                                </div>
			                                                            </div>

			                                                            <div class="form-group">
			                                                                <div class="checkbox">
			                                                                    <label>
			                                                                        <input type="checkbox" class="colored-blue" name="destacado" value="on">
			                                                                        <span class="text">Destacado / home</span>
			                                                                    </label>
			                                                                </div>
			                                                            </div>
			                                                            <div class="form-group">
			                                                                <div class="checkbox">
			                                                                	
			                                                                    <label>
			                                                                        <input type="checkbox" class="colored-blue" name="slider" value="on" >
			                                                                        <span class="text">Slider</span>
			                                                                    </label>
			                                                                </div>
			                                                            </div>
			                                                            
			                                                        
			                                                    </div>
		                                                    </div><!-- fin del primer tab id home -->
		                                                   <div id="profile"  class="tab-pane in ">
			                                                   	<h2>Slider</h2>

			                                                   	<input type="file" name="slider" class="form-control" />
			                                                   <i>Recuerda que debe estar habilidato la función slider para que puedas ver esta imagen en el slider del home. Medidas recomendads 1920px * 800</i>
		                                                    	<hr>
			                                                   	<h2> Listado</h2>
			                                                   	<input type="file" name="logo" class="form-control" />
			                                                   	<i>Tama&ntilde;o sugerido 193px * 130px</i>
			                                                   	<hr>
			                                                   	<h2>Logo Desarrollador</h2>
					                                                   	<input type="file" name="logoProveedor" class="form-control" />
					                                                   	<i>Tama&ntilde;o sugerido 193px * 130px</i>
					                                                   	<hr>
			                                                   	<h2>Galer&iacute;a</h2>
			                                                   	<a href="#" id="agrega">Agregar Imagen</a>
			                                                   	<div id="galeria">
			                                                   		<input type="file" name="galeria_golf[]" class="form-control g" />
			                                                   			<i>Tama&ntilde;o sugerido 800px * 600px (Tambien podr&iacute;an ser al doble de tama&ntilde;o)</i>
			                                                   	</div>
		                                                   </div>
		                                                   <div id="broshure" class="tab-pane in ">
			                                                   	<div class="row">
			                                                   		<div class="col-md-12">

					                                                   	<h2>Broshure</h2>

			                                                   			<input type="file" name="broshure" class="form-control" />
			                                                   			<i>PDF, Power Point, Word</i>
			                                                   		</div>
		                                                   		</div>

		                                                   		<hr>
																<div class="row">
																	<div class="col-md-12">
																			<h2>Planos</h2>
																			<a href="#" id="agregaPlano">Agregar Plano</a>
																			<div id="planos">
																			<input type="file" name="plano[]" class="form-control" />
																			</div>
																	</div>
																</div>

		                                                   
		                                                   </div>
		                                                   <div id="amenidades" class="tab-pane in ">
			                                                   	
		                                                   			<div class="row">
		                                                   				<h2 class="col-sm-12">Generales</h2>
					                                                   	<?php
					                                                   		foreach($amenidades as $am){
					                                                   			print '
					                                                   				
						                                                   				<div class="col-sm-4">
							                                                   				<div class="form-group">
								                                                                <div class="checkbox">
								                                                                    <label>
								                                                                        <input type="checkbox" class="colored-blue" name="amenidad[]" value="'.$am["id_amenidad"].'">
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
					                                                   			print '
					                                                   				
						                                                   				<div class="col-sm-4">
							                                                   				<div class="form-group">
								                                                                <div class="checkbox">
								                                                                    <label>
								                                                                        <input type="checkbox" class="colored-blue" name="amenidad[]" value="'.$amen["id_amenidad"].'">
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
					                                                   			print '
					                                                   				
						                                                   				<div class="col-sm-4">
							                                                   				<div class="form-group">
								                                                                <div class="checkbox">
								                                                                    <label>
								                                                                        <input type="checkbox" class="colored-blue" name="amenidad[]" value="'.$servicio["id_amenidad"].'">
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
					                                                                    			print '
					                                                                    				<option value="'.$p["id"].'">'.$p["nombre"].'</option> 
					                                                                    			';
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
						                                                                    foreach ($edadIn as $ed){
						                                                                    			/*print '
						                                                                    				<option value="'.$ed["idEdadInmueble"].'">'.$ed["edad"].'</option>
						                                                                    			';*/
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
						                                                                    foreach ($edadIn as $ed){
						                                                                    			/*print '
						                                                                    				<option value="'.$ed["idEdadInmueble"].'">'.$ed["edad"].'</option>
						                                                                    			';*/
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
						                                                                    foreach ($edadIn as $ed){
						                                                                    			/*print '
						                                                                    				<option value="'.$ed["idEdadInmueble"].'">'.$ed["edad"].'</option>
						                                                                    			';*/
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
						                                                                    foreach ($edadIn as $ed){
						                                                                    			/*print '
						                                                                    				<option value="'.$ed["idEdadInmueble"].'">'.$ed["edad"].'</option>
						                                                                    			';*/
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
						                                                                    <input id="condominio" name="calle" class="form-control" >
						                                                                   
						                                                                </span>
						                                                            </div>
					                                                    </div>
					                                                    <div class="col-sm-6">
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Dirección</label>
						                                                                    <input id="condominio" name="direccion" class="form-control" >
						                                                                   
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
			                                                   			print '
			                                                   				
				                                                   				<div class="col-sm-2">
					                                                   				<div class="form-group">
						                                                                <div class="checkbox">
						                                                                    <label>
						                                                                        <input type="checkbox" class="colored-blue" name="actividad[]" value="'.$ac["id"].'">
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
                                                    <div style="background: #dddd; padding: 9px; margin-top: 20px;">
                                                    	<button class="btn btn-primary" type="submit">Guardar Propiedad</button>
			                                            <img id="carga" src="/assets/img/carga.gif">
			                                            <div id="respuesta"></div>
			                                        </div>
                                   					</form>
                </div>
                <!-- /Page Body -->
            </div>
            <!-- /Page Content -->
        </div>
        <!-- /Page Container -->
        <!-- Main Container -->

    </div>
	 <!--Email Modal Templates-->
    <div id="myModal" style="display:none;">
        <div class="row">
            <div class="col-md-12">
                <?php 
                	//print alta("zonas", $link);
                ?>
            </div>
        </div>
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
    <script src="/assets/js/datetime/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAev--iJFEzNsKPli1xcQLYdt8IX9VGGB8"></script>
	<script type="text/javascript">

        //--Jquery Select2--
        $(function() {
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
        
	       $("#alta").submit(function(){
				       
			       	$("#carga").fadeIn();
			       var formData = new FormData(document.getElementById("alta"));
					$.ajax({
						    url: "/acciones/save.php",
						    type: "post",
						    dataType: "html",
						    data: formData,
						    cache: false,
						    contentType: false,
						    processData: false
						})
						.done(function(data){
						    $("#carga").fadeIn();
						    if(data==1){
						    	$("#carga").fadeOut();
						    	$("#respuesta").html("<h3>Registro guardado. Actualizando tabla</h3>").fadeIn();
						    	$("#tabla").empty().load("/acciones/recarga.php", {tabla:"zonas", order:"order by nombre"});
						    	 bootbox.alert("<center> <img src='/images/logo.png' width='200' /> </center><p style='font-size: 16px; text-align: center; margin: 20px 0 0 0; color: #53a93f; font-weight: bold; '>Registro Guardado</p>");
						    	$("#respuesta").empty().hide().append("<h3>Registro guardado</h3>").fadeIn();
						    	$("#alta").each (function() { this.reset(); });
						    	
						    }else{
						    	bootbox.alert("<center> <img src='/images/logo.png' width='200' /> </center><p style='font-size: 16px; text-align: center; margin: 20px 0 0 0; color: #d73d32; font-weight: bold; '>Error.Intentelo de nuevo</p>");
						    	$("#carga").fadeOut();
						    }
						    
					});
						
						return false;
	       	
	       });
	       
	      
	      $("#agrega").click(function(){
	      		$("#galeria").append('<input type="file" name="galeria_golf[]" class="form-control g" />');
	      });
	      $("#agregaPlano").click(function(){
	      		$("#planos").append('<input type="file" name="plano[]" class="form-control g" />');
	      });
        
				var txt = document.getElementById('two'); 
				
				
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
			      <?php
			      	if(isset($_GET["latitud"])){
			      		$l= $_GET["latitud"];
			      	}else{
			      		$l= '21.1567785';
			      	}
			      	if(isset($_GET["longitud"])){
			      		$ll= $_GET["longitud"];
			      	}else{
			      		$ll= '-86.825731';
			      	}
			      ?>
			      function initialize() {
			        var mapLat  = <?php print $l;?> ;
			        var mapLon = <?php print $ll;?>;
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
