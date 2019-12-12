<?php
include("../includes/login.php");
$condo= datos_individuales_i($link, "tour", "id_tour", $_GET["id"]);
$aldeas_r= total($link, "r_aldea_tour", " where tour_id=".$_GET["id"], "aldea_id");
$amenidad_r= total($link, "r_amenidad_tour", " where tour_id=".$_GET["id"], "amenidad_id");
$actividad_r= total($link, "r_actividad_tour", " where tour_id=".$_GET["id"], "actividad_id");
$categoria_r= total($link, "r_categoria_tour", " where tour_id=".$_GET["id"], "categoria_id");
$proveedor= lista($link, "proveedores", "order by nombre_comercial asc", "");
$aldeas= lista($link, "aldeas", "order by nombre_esp asc", "");
$amenidades= lista($link, "amenidades", "order by nombre_esp asc", "");
$actividades= lista($link, "actividades", "order by nombre_esp asc", "");
$categorias= lista($link, "categorias", "order by nombre_esp asc", "");
$periodo= lista($link, "periodo_circuito", "where tour_id= ".$condo["id_tour"]." order by id_periodo asc", "");
$itinerario= lista($link, "itinerario", "where tour_id= ".$condo["id_tour"]." order by dia asc", "");
$dias= array(
			array("id"=>1, "dia"=>"Lunes"),
			array("id"=>2, "dia"=>"Martes"),
			array("id"=>3, "dia"=>"Miercoles"),
			array("id"=>4, "dia"=>"Jueves"),
			array("id"=>5, "dia"=>"Viernes"),
			array("id"=>6, "dia"=>"Sabado"),
			array("id"=>7, "dia"=>"Domingo")
);

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
    <title> Edici&oacute;n de Circuitos</title>

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
                            <a href="/circuitos">Circuitos</a>
                        </li>
                        <li>
                            Edici&oacute;n de Circuitos
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
				                                                <a data-toggle="tab" href="#img"> 
				                                                    Imagenes
				                                                </a>
				                                            </li> 
				                                        </ul>          
				                                      <form role="form" id="alta">
                                                	<div class="tab-content">
                                                			<div id="periodo" class="tab-pane in ">
                                                				
	                                                			<?php 
	                                                				if(!empty($periodo)){
	                                                					$a= 0;
	                                                					foreach($periodo as $p){
	                                                						$a++;
	                                                						print '
	                                                						    <div class="row">
		                                                							<div class="col-sm-1 periodo">
							                                                  			<div class="form-group">
									                                                                <span class="input-icon icon-right">
									                                                                	<label>Periodo <span class="periodo_num">'.$a.'</span> </label>
									                                                                </span>
									                                                            </div>
						                                                  			</div>
							                                                  		<div class="col-sm-4">
									                                                            <div class="form-group">
									                                                                <span class="input-icon icon-right">
									                                                                    <input type="text" name="fecha_periodo_1[]"  placeholder="Fecha Inicio" class="form-control fecha_periodo" value="'.$p["fecha_inicio"].'"  data-date-format="yyyy-mm-dd">
									                                                                </span>
									                                                            </div>
								                                                     </div>
							                                                  		<div class="col-sm-4">
									                                                            <div class="form-group">
									                                                                <span class="input-icon icon-right">
									                                                                    <input type="text" name="fecha_periodo_2[]" placeholder="Fecha Fin"  class="form-control fecha_periodo" value="'.$p["fecha_fin"].'"  data-date-format="yyyy-mm-dd">
									                                                                </span>
									                                                            </div>
								                                                      </div>
						                                                      </div>
	                                                						';
			                                                  			}
			                                                  			$a= $a + 1;
			                                                  			for ($x=$a; $x<= 6; $x++){
			                                                  				print '
			                                                  					<div class="row">
		                                                							<div class="col-sm-1 periodo">
							                                                  			<div class="form-group">
									                                                                <span class="input-icon icon-right">
									                                                                	<label>Periodo <span class="periodo_num">'.$x.'</span> </label>
									                                                                </span>
									                                                            </div>
						                                                  			</div>
						                                                  		<div class="col-sm-4">
								                                                            <div class="form-group">
								                                                                <span class="input-icon icon-right">
								                                                                    <input type="text" name="fecha_periodo_1[]"  placeholder="Fecha Inicio" class="form-control fecha_periodo"   data-date-format="yyyy-mm-dd">
								                                                                </span>
								                                                            </div>
							                                                     </div>
						                                                  		<div class="col-sm-4">
								                                                            <div class="form-group">
								                                                                <span class="input-icon icon-right">
								                                                                    <input type="text" name="fecha_periodo_2[]" placeholder="Fecha Fin"  class="form-control fecha_periodo"   data-date-format="yyyy-mm-dd">
								                                                                </span>
								                                                            </div>
							                                                      </div>
						                                                      </div>
	                                                						';
			                                                  			}
	                                                				}else{
	                                                					for ($x=1; $x<= 6; $x++){
	                                                					print '
	                                                						
					                                                  		<div class="row">
						                                                  		<div class="col-sm-1 periodo">
						                                                  			<div class="form-group">
								                                                                <span class="input-icon icon-right">
								                                                                	<label>Periodo <span class="periodo_num">'.$x.'</span> </label>
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
					                                                  	
	                                                					';
	                                                					
	                                                					}
	                                                				}
			                                                  	?>
		                                                  </div>
		                                                  <div id="itinerario" class="tab-pane in ">
		                                                  	<div class="row">
		                                                  		
			                                                  	<div id="iti" >
			                                                  		<?php
			                                                  			foreach ($itinerario as $it){
			                                                  				print '
			                                                  					<div>
																        			<div class="col-sm-2">
																        			 <div class="form-group">
																					        <span class="input-icon icon-right">
																					        	<label style="color: #fbfbfb;">.</label>
																					          <input type="text" name="dia[]" value=" Dia '.$it["dia"].'"  class="form-control " readonly >
																					       </span>
																					  </div>
																        			</div>
																        			<div class="col-sm-5">
																        			 <div class="form-group">
																					        <span class="input-icon icon-right">
																					        <label>Itinerario Esp</label>
																					          <textarea name="itinerario_esp[]"  class="form-control " row="5" >'.$it["esp"].'</textarea>
																					       </span>
																					  </div>
																        			</div>
																        			<div class="col-sm-5">
																        			 <div class="form-group">
																					        <span class="input-icon icon-right">
																					        <label>Itinerario Eng</label>
																					          <textarea  name="itinerario_eng[]"  class="form-control " row="5"  >'.$it["eng"].'</textarea>
																					       </span>
																					  </div>
																        			</div>
															        			</div>
			                                                  				';
			                                                  			}
			                                                  		?>
			                                                  	</div>
			                                                  </div>
		                                                  </div>
                                                			<div id="home" class="tab-pane in active">
			                                                    <div id="registration-form">
			                                                       
			                                                            <div class="row">
			                                                           		<div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Clave</label>
					                                                                    <input type="hidden" name="id" placeholder="" id="userameInput" class="form-control" value="<?php print $_GET["id"]?>">
					                                                                    <input type="hidden" name="seccion" placeholder="" id="userameInput" class="form-control" value="tour">
					                                                                    <input type="hidden" name="circuito" placeholder="" class="form-control" value="on">
					                                                                    <input type="text" name="clave" class="form-control" value="<?php print $condo["clave"]?>">
					                                                                     
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Nombre Esp</label>
					                                                                    <input type="text" name="nombre_esp"  class="form-control" value="<?php print $condo["nombre_esp"]?>">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
			                                                           		<div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Nombre Eng</label>
					                                                                    <input type="text" name="nombre_eng"  value="<?php print $condo["nombre_eng"]?>" class="form-control ">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Proveedor</label>
					                                                                    <select type="text" name="proveedor"  class="form-control">
					                                                                    	<option value="0">Seleccione una opci&oacute;n</option>
					                                                                    	<?php
					                                                                    		foreach ($proveedor as $c){
					                                                                    			if($c["id"]==$condo["proveedor_id"]){
						                                                                    			print '
						                                                                    				<option value="'.$c["id"].'" selected>'.$c["nombre_comercial"].'</option>
						                                                                    			';
					                                                                    			}else{
					                                                                    				print '
						                                                                    				<option value="'.$c["id"].'" >'.$c["nombre_comercial"].'</option>
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
					                                                                	<label>N&uacute;mero de d&iacute;as</label>
					                                                                    <input type="text" name="num_dias"  class="form-control" value="<?php print $condo["num_dias_circuito"]?>" id="numero_dias">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
			                                                           		<div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Precio ADL usd</label>
					                                                                    <input type="text" name="precio_adulto_usd"  class="form-control" value="<?php print $condo["precio_adulto_usd"]?>">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
			                                                           		<div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Precio MNR usd</label>
					                                                                    <input type="text" name="precio_nino_usd"  value="<?php print $condo["precio_nino_usd"]?>" class="form-control ">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
			                                                           		<div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Precio ADL mxp</label>
					                                                                    <input type="text" name="precio_adulto_mx"  class="form-control" value="<?php print $condo["precio_adulto_mx"]?>">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
			                                                           		<div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Precio MNR mxp</label>
					                                                                    <input type="text" name="precio_nino_mx"  value="<?php print $condo["precio_nino_mx"]?>" class="form-control ">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                           
				                                                             <div class="col-sm-12">
				                                                            	<strong>D&iacute;as de Operaci&oacute;n</strong>
				                                                            </div>
				                                                            <?php
				                                                            	$dd= explode(",", $condo["dias"]);
				                                                            	foreach($dias as $d){
				                                                            		if(in_array($d["id"], $dd)){
					                                                            		print '
					                                                            			<div class="col-sm-1">
								                                                           		<div class="form-group">
									                                                                <div class="checkbox">
									                                                                    <label>
									                                                                        <input type="checkbox" class="colored-blue" name="dias[]" value="'.$d["id"].'" checked>
									                                                                        <span class="text"> '.$d["dia"].' </span>
									                                                                    </label>
									                                                                </div>
							                                                                	</div>
							                                                            	</div>
					                                                            		';
				                                                            		}else{
				                                                            			print '
					                                                            			<div class="col-sm-1">
								                                                           		<div class="form-group">
									                                                                <div class="checkbox">
									                                                                    <label>
									                                                                        <input type="checkbox" class="colored-blue" name="dias[]" value="'.$d["id"].'" >
									                                                                        <span class="text"> '.$d["dia"].' </span>
									                                                                    </label>
									                                                                </div>
							                                                                	</div>
							                                                            	</div>
					                                                            		';
				                                                            			
				                                                            		}
				                                                            	}
				                                                            
				                                                            ?>
				                                                            
				                                                            </div>
				                                                            <div class="row">
				                                                            	<div class="col-sm-12">
				                                                            		<div class="form-group">
				                                                            			<label>Mapa Ubicaci&oacute;n</label>
				                                                            			<textarea name="mapa" placeholder="" class="form-control" rows="7"><?php print $condo["mapa"]?></textarea>
				                                                            		</div>
				                                                            	</div>
			                                                            	</div>
				                                                             <div class="row">
				                                                            	<div class="col-sm-12">
				                                                            		<div class="form-group">
				                                                            			<label>Informaci&oacute;n General Esp (Descipci&oacute;n)</label>
				                                                            			<textarea name="info_esp" placeholder="" class="form-control" rows="7"><?php print $condo["info_esp"]?></textarea>
				                                                            		</div>
				                                                            	</div>
			                                                            	</div>
				                                                            <div class="row">
				                                                            	<div class="col-sm-12">
				                                                            		<div class="form-group">
				                                                            			<label>Informaci&oacute;n General Eng (Descipci&oacute;n)</label>
				                                                            			<textarea name="info_eng" placeholder="" class="form-control" rows="7"><?php print $condo["info_eng"]?></textarea>
				                                                            		</div>
				                                                            	</div>
			                                                            	</div>
				                                                             <div class="row">
				                                                            	<div class="col-sm-12">
				                                                            		<div class="form-group">
				                                                            			<label>Recomendaciones esp</label>
				                                                            			<textarea name="recomendaciones_esp" placeholder="" class="form-control" rows="7"><?php print $condo["espe_esp"]?></textarea>
				                                                            		</div>
				                                                            	</div>
			                                                            	</div>
				                                                             <div class="row">
				                                                            	<div class="col-sm-12">
				                                                            		<div class="form-group">
				                                                            			<label>Recomendaciones eng</label>
				                                                            			<textarea name="recomendaciones_eng" placeholder="" class="form-control" rows="7"><?php print $condo["espe_eng"]?></textarea>
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
						                                                                    <input name="precio_adulto_usd_promo" class="form-control" type="text" value="<?php print $condo["precio_adulto_promo_usd"]?>">
						                                                                    
						                                                                </span>
						                                                            </div>
					                                                            </div>
					                                                            <div class="col-sm-3">
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Precio MNR usd</label>
						                                                                    <input name="precio_nino_usd_promo" class="form-control " type="text" value="<?php print $condo["precio_nino_promo_usd"]?>">
						                                                                    
						                                                                </span>
						                                                            </div>
					                                                            </div>
					                                                            <div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Precio ADL mxp</label>
					                                                                    <input name="precio_adulto_mx_promo" class="form-control" type="text" value="<?php print $condo["precio_adulto_promo_mx"]?>">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Precio MNR mxp</label>
					                                                                    <input name="precio_nino_mx_promo" class="form-control " type="text" value="<?php print $condo["precio_nino_promo_mx"]?>">
					                                                                    
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
			                                                            
			                                                        
			                                                    </div>
			                                                   
		                                                    </div><!-- fin del primer tab id home -->
		                                                    
		                                                    <div id="img" class="tab-pane in">
		                                                    	<h2>Banner</h2>
		                                                    	<?php
		                                                    		$i= mostrar_img($link, $_GET["id"], "tour", "banner");
		                                                    		
		                                                    		foreach ($i as $img) {
		                                                    			print '
		                                                    				<div class="galeria" id="m_'.$img["id"].'">
		                                                    					<i class="fa fa-close eliminar" data-table="imagen" data-campo="id_imagen" data-id="'.$img["id"].'"></i>
		                                                    					<img src="/images/tour_img/'.$img["imagen"].'" width="100" />
		                                                    				</div>
		                                                    			';
		                                                    		}
		                                                    	?>
		                                                    	<i>Medidas sugeridas 1920px * 265px </i>
			                                                   	<input type="file" name="banner" class="form-control" />
			                                                   	<hr>
		                                                    	<h2>Logo</h2>
		                                                    	<?php
		                                                    		$i= mostrar_img($link, $_GET["id"], "tour", "logo");
		                                                    		
		                                                    		foreach ($i as $img) {
		                                                    			print '
		                                                    				<div class="galeria" id="m_'.$img["id"].'">
		                                                    					<i class="fa fa-close eliminar" data-table="imagen" data-campo="id_imagen" data-id="'.$img["id"].'"></i>
		                                                    					<img src="/images/tour_img/'.$img["imagen"].'" width="100" />
		                                                    				</div>
		                                                    			';
		                                                    		}
		                                                    	?>
			                                                   	<input type="file" name="logo" class="form-control" />
			                                                   	<hr>
			                                                   	<h2>Galer&iacute;a</h2>
			                                                   	<?php
		                                                    		$ii= mostrar_img($link, $_GET["id"], "tour", "galeria_tour");
		                                                    		foreach ($ii as $imgg) {
		                                                    			print '
		                                                    				<div style="display: inline-block; position: relative;" class="galeria" id="m_'.$imgg["id"].'">
		                                                    					<i class="fa fa-close eliminar" data-id="'.$imgg["id"].'" data-table="imagen" data-campo="id_imagen"></i>
		                                                    					<img src="/images/tour_img/'.$imgg["imagen"].'"  />
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
			                                                   	<?php
			                                                   		foreach($amenidades as $am){
			                                                   			if(in_array($am["id"], $amenidad_r)){
			                                                   				$chn= 'checked';
			                                                   			}else{
			                                                   				$chn= '';
			                                                   			}
			                                                   			print '
			                                                   				
				                                                   				<div class="col-sm-2">
					                                                   				<div class="form-group">
						                                                                <div class="checkbox">
						                                                                    <label>
						                                                                        <input type="checkbox" class="colored-blue" name="amenidad[]" value="'.$am["id"].'" '.$chn.'>
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
			                                                   			if(in_array($al["id"], $aldeas_r)){
			                                                   				$ch= 'checked';
			                                                   			}else{
			                                                   				$ch= '';
			                                                   			}
			                                                   			print '
			                                                   				
				                                                   				<div class="col-sm-2">
					                                                   				<div class="form-group">
						                                                                <div class="checkbox">
						                                                                    <label>
						                                                                        <input type="checkbox" class="colored-blue" name="aldea[]" value="'.$al["id"].'" '.$ch.'>
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
    <script>
    InitiateSearchableDataTable.init();
    </script>
	<script type="text/javascript">

	$(document).ready(function() {
		// initialize();
			
	});
	 $("#agrega").click(function(){
	      		$("#galeria").append('<input type="file" name="galeria_golf[]" class="form-control g" />');
	      });
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
		$('.fecha_periodo').datepicker({dateFormat:'yy-mm-dd'});

	});
    </script>
   
</body>
<!--  /Body -->
</html>
