<?php
include("../includes/login.php");
$proveedor= lista($link, "proveedores", "order by nombre_comercial asc", "");
$aldeas= lista($link, "aldeas", "order by nombre_esp asc", "");
$amenidades= lista($link, "amenidades", "order by nombre_esp asc", "");
$actividades= lista($link, "actividades", "order by nombre_esp asc", "");
$categorias= lista($link, "categorias", "order by nombre_esp asc", "");

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
    <title>alta Circuito</title>

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
                            Alta de Circuito
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
				                                                    Aldeas
				                                                </a>
				                                            </li> 
				                                            <li class="tab-red">
				                                                <a data-toggle="tab" href="#categorias">
				                                                    Categorias
				                                                </a>
				                                            </li>
				                                            <li class="tab-red">
				                                                <a data-toggle="tab" href="#amenidades">
				                                                    Amenidades
				                                                </a>
				                                            </li> 
				                                            <li class="tab-red">
				                                                <a data-toggle="tab" href="#actividades">
				                                                    Actividades
				                                                </a>
				                                            </li> 
															<li class="tab-red">
				                                                <a data-toggle="tab" href="#periodo"> 
				                                                    Periodos
				                                                </a>
				                                            </li> 
															<li class="tab-red">
				                                                <a data-toggle="tab" href="#itinerario"> 
				                                                    Itinerario
				                                                </a>
				                                            </li> 
															<li class="tab-red">
				                                                <a data-toggle="tab" href="#profile"> 
				                                                    Imagenes
				                                                </a>
				                                            </li> 
				                                           
				                                        </ul>          
				                                    <form role="form" id="alta"> 
                                                	<div class="tab-content">
                                                			<div id="periodo" class="tab-pane in ">
	                                                			<?php 
	                                                				
	                                                				for($x=0; $x<=5; $x++){
	                                                			?>
			                                                  	<div class="row">
			                                                  		
			                                                  		<div class="col-sm-1 periodo">
			                                                  			<div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Periodo <span class="periodo_num"><?php print $x+1; ?></span> </label>
					                                                                </span>
					                                                            </div>
			                                                  		</div>
			                                                  		<div class="col-sm-4">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                    <input type="text" name="fecha_periodo_1[]"  placeholder="Fecha Inicio" class="form-control fecha_periodo"  data-date-format="yyyy-mm-dd">
					                                                                </span>
					                                                            </div>
				                                                      </div>
			                                                  		<div class="col-sm-4">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                    <input type="text" name="fecha_periodo_2[]" placeholder="Fecha Fin"  class="form-control fecha_periodo"  data-date-format="yyyy-mm-dd">
					                                                                </span>
					                                                            </div>
				                                                      </div>
			                                                  	</div>
			                                                  	<?php 
			                                                  		}
			                                                  	?>
		                                                  </div>
		                                                  <div id="itinerario" class="tab-pane in ">
		                                                  	<div class="row">
		                                                  		
			                                                  	<div id="iti" >
			                                                  	
			                                                  	</div>
			                                                  </div>
		                                                  </div>
                                                			<div id="home" class="tab-pane in active">
			                                                    <div id="registration-form">
			                                                        
			                                                           <div class="row">
			                                                           		<div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Clave </label>
					                                                                    <input type="hidden" name="seccion" placeholder="" id="userameInput" class="form-control" value="tour">
					                                                                    <input type="hidden" name="circuito" placeholder="" id="userameInput" class="form-control" value="on">
					                                                                    <input type="text" name="clave"  class="form-control" required>
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Nombre Esp</label>
					                                                                    <input type="text" name="nombre_esp"  class="form-control" required>
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Nombre Eng</label>
					                                                                    <input type="text" name="nombre_eng"  class="form-control" required>
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
			                                                           		<div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Proveedor</label>
					                                                                    <select type="text" name="proveedor"  class="form-control" required>
					                                                                    	<option></option>
					                                                                    	<option value="0">Seleccione una opci&oacute;n</option>
					                                                                    	<?php
					                                                                    		foreach ($proveedor as $pro){
					                                                                    			print '
					                                                                    				<option value="'.$pro["id"].'">'.$pro["nombre_comercial"].'</option>
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
					                                                                	<label>N&uacute;mero de d&iacute;as</label>
					                                                                    <input type="text" name="num_dias"  id="numero_dias" class="form-control" required>
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Precio ADL usd</label>
					                                                                    <input type="text" name="precio_adulto_usd"  class="form-control" required>
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
			                                                           		<div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Precio MNR usd</label>
					                                                                    <input type="text" name="precio_nino_usd"  class="form-control "  required >
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Precio ADL mxp</label>
					                                                                    <input type="text" name="precio_adulto_mx"  class="form-control">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
			                                                           		<div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Precio MNR mxp</label>
					                                                                    <input type="text" name="precio_nino_mx"  class="form-control "  >
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
			                                                           		
			                                                           		 <div class="col-sm-12">
				                                                            	<strong>D&iacute;as de Operaci&oacute;n</strong>
				                                                            </div>
				                                                            <div class="col-sm-1">
				                                                           		<div class="form-group">
					                                                                <div class="checkbox">
					                                                                    <label>
					                                                                        <input type="checkbox" class="colored-blue" name="dias[]" value="1">
					                                                                        <span class="text"> Lunes </span>
					                                                                    </label>
					                                                                </div>
			                                                                	</div>
			                                                            	</div>
				                                                            <div class="col-sm-1">
				                                                           		<div class="form-group">
					                                                                <div class="checkbox">
					                                                                    <label>
					                                                                        <input type="checkbox" class="colored-blue" name="dias[]" value="2">
					                                                                        <span class="text">Martes</span>
					                                                                    </label>
					                                                                </div>
			                                                                	</div>
			                                                            	</div>
				                                                            <div class="col-sm-1">
				                                                           		<div class="form-group">
					                                                                <div class="checkbox">
					                                                                    <label>
					                                                                        <input type="checkbox" class="colored-blue" name="dias[]" value="3">
					                                                                        <span class="text">Miercoles</span>
					                                                                    </label>
					                                                                </div>
			                                                                	</div>
			                                                            	</div>
				                                                            <div class="col-sm-1">
				                                                           		<div class="form-group">
					                                                                <div class="checkbox">
					                                                                    <label>
					                                                                        <input type="checkbox" class="colored-blue" name="dias[]" value="4">
					                                                                        <span class="text">Jueves</span>
					                                                                    </label>
					                                                                </div>
			                                                                	</div>
			                                                            	</div>
				                                                            <div class="col-sm-1">
				                                                           		<div class="form-group">
					                                                                <div class="checkbox">
					                                                                    <label>
					                                                                        <input type="checkbox" class="colored-blue" name="dias[]" value="5">
					                                                                        <span class="text">Viernes</span>
					                                                                    </label>
					                                                                </div>
			                                                                	</div>
			                                                            	</div>
				                                                            <div class="col-sm-1">
				                                                           		<div class="form-group">
					                                                                <div class="checkbox">
					                                                                    <label>
					                                                                        <input type="checkbox" class="colored-blue" name="dias[]" value="6">
					                                                                        <span class="text">Sabado</span>
					                                                                    </label>
					                                                                </div>
			                                                                	</div>
			                                                            	</div>
				                                                            <div class="col-sm-1">
				                                                           		<div class="form-group">
					                                                                <div class="checkbox">
					                                                                    <label>
					                                                                        <input type="checkbox" class="colored-blue" name="dias[]" value="7">
					                                                                        <span class="text">Domingo</span>
					                                                                    </label>
					                                                                </div>
			                                                                	</div>
			                                                            	</div>
				                                                            
				                                                            </div>
				                                                            
				                                                             <div class="row">
				                                                            	<div class="col-sm-12">
				                                                            		<div class="form-group">
				                                                            			<label>Mapa Ubicaci&oacute;n</label>
				                                                            			<textarea name="mapa" placeholder="" class="form-control" rows="7"></textarea>
				                                                            		</div>
				                                                            	</div>
			                                                            	</div>
				                                                             <div class="row">
				                                                            	<div class="col-sm-12">
				                                                            		<div class="form-group">
				                                                            			<label>Informaci&oacute;n General Esp (Descipci&oacute;n)</label>
				                                                            			<textarea name="info_esp" placeholder="" class="form-control" rows="7" required></textarea>
				                                                            		</div>
				                                                            	</div>
			                                                            	</div>
				                                                             <div class="row">
				                                                            	<div class="col-sm-12">
				                                                            		<div class="form-group">
				                                                            			<label>Informaci&oacute;n General Eng (Descipci&oacute;n)</label>
				                                                            			<textarea name="info_eng" placeholder="" class="form-control" rows="7" required></textarea>
				                                                            		</div>
				                                                            	</div>
			                                                            	</div>
				                                                            
				                                                             <div class="row">
				                                                            	<div class="col-sm-12">
				                                                            		<div class="form-group">
				                                                            			<label>Recomendaciones Esp</label>
				                                                            			<textarea name="recomendaciones_esp" placeholder="" class="form-control" rows="7" required></textarea>
				                                                            		</div>
				                                                            	</div>
			                                                            	</div>
				                                                             <div class="row">
				                                                            	<div class="col-sm-12">
				                                                            		<div class="form-group">
				                                                            			<label>Recomendaciones Eng</label>
				                                                            			<textarea name="recomendaciones_eng" placeholder="" class="form-control" rows="7" required></textarea>
				                                                            		</div>
				                                                            	</div>
				                                                            	<div class="col-sm-12">
				                                                            		<div class="form-group">
				                                                            			<label>Incluye Esp</label>
				                                                            			<textarea name="incluye_esp" placeholder="" class="form-control" rows="7"><?php print $condo["incluye_esp"]?></textarea>
				                                                            		</div>
				                                                            	</div>
				                                                            	<div class="col-sm-12">
				                                                            		<div class="form-group">
				                                                            			<label>Incluye Eng</label>
				                                                            			<textarea name="incluye_eng" placeholder="" class="form-control" rows="7"><?php print $condo["incluye_eng"]?></textarea>
				                                                            		</div>
				                                                            	</div>
				                                                            	<div class="col-sm-12">
				                                                            		<div class="form-group">
				                                                            			<label>No Incluye Esp</label>
				                                                            			<textarea name="no_incluye_esp" placeholder="" class="form-control" rows="7"><?php print $condo["no_incluye_esp"]?></textarea>
				                                                            		</div>
				                                                            	</div>
				                                                            	<div class="col-sm-12">
				                                                            		<div class="form-group">
				                                                            			<label>No Incluye Eng</label>
				                                                            			<textarea name="no_incluye_eng" placeholder="" class="form-control" rows="7"><?php print $condo["no_incluye_eng"]?></textarea>
				                                                            		</div>
				                                                            	</div>
				                                                            	<div class="col-sm-12">
				                                                            		<div class="form-group">
				                                                            			<label>Importante Esp</label>
				                                                            			<textarea name="importante_esp" placeholder="" class="form-control" rows="7"><?php print $condo["importante_esp"]?></textarea>
				                                                            		</div>
				                                                            	</div>
				                                                            	<div class="col-sm-12">
				                                                            		<div class="form-group">
				                                                            			<label>Importante Eng</label>
				                                                            			<textarea name="importante_eng" placeholder="" class="form-control" rows="7"><?php print $condo["importante_eng"]?></textarea>
				                                                            		</div>
				                                                            	</div>
				                                                            	<div class="col-sm-12">
				                                                            		<div class="form-group">
				                                                            			<label>Restricciones Esp</label>
				                                                            			<textarea name="restricciones_esp" placeholder="" class="form-control" rows="7"><?php print $condo["restricciones_esp"]?></textarea>
				                                                            		</div>
				                                                            	</div>
				                                                            	<div class="col-sm-12">
				                                                            		<div class="form-group">
				                                                            			<label>Restricciones Eng</label>
				                                                            			<textarea name="restricciones_eng" placeholder="" class="form-control" rows="7"><?php print $condo["restricciones_eng"]?></textarea>
				                                                            		</div>
				                                                            	</div>
				                                                            	<div class="col-sm-12">
				                                                            		<strong>Promoci&oacute;n?</strong>
				                                                            	</div>
				                                                            	<div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Precio ADL usd</label>
					                                                                    <input type="text" name="precio_adulto_usd_promo"  class="form-control">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
			                                                           		<div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Precio MNR usd</label>
					                                                                    <input type="text" name="precio_nino_usd_promo"  class="form-control "  >
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Precio ADL mxp</label>
					                                                                    <input type="text" name="precio_adulto_mx_promo"  class="form-control">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
			                                                           		<div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Precio MNR mxp</label>
					                                                                    <input type="text" name="precio_nino_mx_promo"  class="form-control "  >
					                                                                    
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
						                                                                    <input id="condominio" name="tag_title_esp" class="form-control">
						                                                                    	
						                                                                </span>
						                                                            </div>
					                                                            </div>
				                                                           		<div class="col-sm-6">
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Tag Title eng</label>
						                                                                    <input id="condominio" name="tag_title_eng" class="form-control">
						                                                                    	
						                                                                </span>
						                                                            </div>
					                                                            </div>
				                                                           		
				                                                           		
				                                                           		<div class="col-sm-6">
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Url esp</label>
						                                                                    <input id="condominio" name="url_esp" class="form-control" required>
						                                                                    <i style="font-size:11px">La url debe contener palabras clave y estar separas por gu&iacute;ion medio, Ejmplo: compra-casa-cancun</i>	
						                                                                </span>
						                                                            </div>
					                                                            </div>
				                                                           		
				                                                           		<div class="col-sm-6">
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Url eng</label>
						                                                                    <input id="condominio" name="url_eng" class="form-control" required>
						                                                                    <i style="font-size:11px">La url debe contener palabras clave y estar separas por gu&iacute;ion medio, Ejmplo: compra-casa-cancun</i>	
						                                                                </span>
						                                                            </div>
					                                                            </div>
				                                                           		
				                                                          		 
			                                                                </div>
				                                                          
			                                                             
			                                                         
			                                                            <div class="row">
			                                                            	<div class="col-sm-12">
			                                                            		<div class="form-group">
			                                                            			<label>Tag Description</label>
			                                                            			<textarea name="tag_description_esp" placeholder="" class="form-control" rows="7"></textarea>
			                                                            		</div>
			                                                            	</div>
			                                                            </div>
			                                                         
			                                                            <div class="row">
			                                                            	<div class="col-sm-12">
			                                                            		<div class="form-group">
			                                                            			<label>Tag Description eng</label>
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
			                                                            
			                                                        
			                                                    </div>
		                                                    </div><!-- fin del primer tab id home -->
		                                                   <div id="profile"  class="tab-pane in ">
			                                                   	
			                                                   	<h2>Logo</h2>
			                                                   	<input type="file" name="logo" class="form-control" />
			                                                   	<i>Tama&ntilde;o sugerido 193px * 130px</i>
			                                                   	<hr>
			                                                   	<h2>Galer&iacute;a</h2>
			                                                   	<a href="#" id="agrega">Agregar Imagen</a>
			                                                   	<div id="galeria">
			                                                   		<input type="file" name="galeria_golf[]" class="form-control g" />
			                                                   			<i>Tama&ntilde;o sugerido 800px * 600px (Tambien podr&iacute;an ser al doble de tama&ntilde;o)</i>
			                                                   	</div>
		                                                   </div>
		                                                   <div id="categorias" class="tab-pane in ">
			                                                   	
		                                                   			<div class="row">
			                                                   	<?php
			                                                   		foreach($categorias as $cat){
			                                                   			print '
			                                                   				
				                                                   				<div class="col-sm-2">
					                                                   				<div class="form-group">
						                                                                <div class="checkbox">
						                                                                    <label>
						                                                                        <input type="checkbox" class="colored-blue" name="categoria[]" value="'.$cat["id"].'">
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
			                                                   	<?php
			                                                   		foreach($amenidades as $am){
			                                                   			print '
			                                                   				
				                                                   				<div class="col-sm-2">
					                                                   				<div class="form-group">
						                                                                <div class="checkbox">
						                                                                    <label>
						                                                                        <input type="checkbox" class="colored-blue" name="amenidad[]" value="'.$am["id"].'">
						                                                                        <span class="text">'.$am["nombre_esp"].'</span>
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
			                                                   	<?php
			                                                   		foreach($aldeas as $al){
			                                                   			print '
			                                                   				
				                                                   				<div class="col-sm-2">
					                                                   				<div class="form-group">
						                                                                <div class="checkbox">
						                                                                    <label>
						                                                                        <input type="checkbox" class="colored-blue" name="aldea[]" value="'.$al["id"].'">
						                                                                        <span class="text">'.$al["nombre_esp"].'</span>
						                                                                    </label>
						                                                                </div>
						                                                            </div>
					                                                            </div>
				                                                           
			                                                   			';
			                                                   		
			                                                   		}
			                                                   	
			                                                   	?>
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
                                                    <button class="btn btn-primary" type="submit">Guardar</button>
			                                                            <img id="carga" src="/assets/img/carga.gif">
			                                                            <div id="respuesta"></div>
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
	<script type="text/javascript">
	
	 $(document).ready(function() {
       // initialize();
      });
		
        //--Jquery Select2--
        $(function() {
        	
        $("#numero_dias").keyup(function(){
        	var i;
        	var num= $(this).val();
        	$("#iti").empty();
        	for(i=1; i<=num; i++ ){
        		$("#iti").append('\
        			<div>\
	        			<div class="col-sm-2">\
	        			 <div class="form-group">\
						        <span class="input-icon icon-right">\
						        	<label style="color: #fbfbfb;">.</label>\
						          <input type="text" name="dia[]" value=" Dia '+ i+'"  class="form-control " readonly >\
						       </span>\
						  </div>\
	        			</div>\
	        			<div class="col-sm-5">\
	        			 <div class="form-group">\
						        <span class="input-icon icon-right">\
						        <label>Itinerario Esp</label>\
						          <textarea name="itinerario_esp[]"  class="form-control " row="5" ></textarea>\
						       </span>\
						  </div>\
	        			</div>\
	        			<div class="col-sm-5">\
	        			 <div class="form-group">\
						        <span class="input-icon icon-right">\
						        <label>Itinerario Eng</label>\
						          <textarea  name="itinerario_eng[]"  class="form-control " row="5"  ></textarea>\
						       </span>\
						  </div>\
	        			</div>\
        			</div>\
        		');
        	}
        });
       
        
        
	       $("#alta").submit(function(){
				       	if($("#nombre_condo").val()==""){
				       		bootbox.alert("<center> <img src='images/logo.png' width='200' /> </center><p style='font-size: 16px; text-align: center; margin: 20px 0 0 0; color: #d73d32; font-weight: bold; '>Error.El campo nombre es obligatorio</p>");
				       		$("#nombre_condo").focus().css("border","1px solid #d70000");
				       		return false;
				       	}
	                      
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
				 $('.fecha_periodo').datepicker({dateFormat:'yy-mm-dd'});
	       
        });
    </script>
    
</body>
<!--  /Body -->
</html>
