<?php
	include($_SERVER['DOCUMENT_ROOT']."/includes/login.php");
	$c= 'SELECT * FROM clientes where id_cliente='.$_GET["id"];
	$cc= mysql_query($c, $link);
	$ccc= mysql_fetch_array($cc);
	$zona= devuelve_campo_c("nombre", "zonas","id_zona", $ccc["zona_cliente"], $link );
	$cadena= devuelve_campo_c("nombre", "cadenas","id_cadena", $ccc["cadena_cliente"], $link );
	$tipo= devuelve_campo_c("nombre_cliente", "tipo_cliente","id_tipo_cliente", $ccc["tipo_cliente"], $link );
	$modo= devuelve_campo_c("nombre_modo_cliente", "modo_cliente","id_modo_cliente", $ccc["modo_cliente"], $link );
	$categoria= devuelve_campo_c("nombre_categoria_cliente", "categoria_cliente","id_categoria_cliente", $ccc["categoria_cliente"], $link );
	$puesto= lista($link, "puestos_asociados", "order by nombre asc", "?_pagi_pg=");
	$centroConsumo= lista($link, "tipos_centro_consumo", "order by nombre asc", "?_pagi_pg=");
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
    <title><? print $ccc["nombre"]?></title>
    <meta name="description" content="user profile" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <!--Basic Styles-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="" rel="stylesheet" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/weather-icons.min.css" rel="stylesheet" />
    <!--Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300" rel="stylesheet" type="text/css">
    <!--Beyond styles-->
    <link id="beyond-link" href="assets/css/beyond.min.css" rel="stylesheet" />
    <link href="assets/css/demo.min.css" rel="stylesheet" />
    <link href="assets/css/typicons.min.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet" />
    <link id="skin-link" href="" rel="stylesheet" type="text/css" />
	<link href="assets/css/cambios.css" rel="stylesheet" />
    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="assets/js/skins.min.js"></script>
</head>
<!-- /Head -->
<!-- Body -->
<body>
    <?php
    	include("includes/topvar.php"); 
    ?>
    <!-- Main Container -->
    <div class="main-container container-fluid">
        <!-- Page Container -->
        <div class="page-container">

            <!-- Page Sidebar -->

            <div class="page-sidebar" id="sidebar">

                <?php 

                	include("includes/menu.php");

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

                            <a href="#">Home</a>

                        </li>

                        <li>

                            <a href="/clientes">Consulta</a>

                        </li>

                        <li class="active">Profile</li>

                    </ul>

                </div>

                <!-- /Page Breadcrumb -->

                <!-- Page Header -->

                <div class="page-header position-relative">

                    <div class="header-title">

                        <h1>

                            User Profile

                        </h1>

                    </div>

                    <!--Header Buttons-->

                    <div class="header-buttons">

                        <a class="sidebar-toggler" href="#">

                            <i class="fa fa-arrows-h"></i>

                        </a>

                        <a class="refresh" id="refresh-toggler" href="">

                            <i class="glyphicon glyphicon-refresh"></i>

                        </a>

                        <a class="fullscreen" id="fullscreen-toggler" href="#">

                            <i class="glyphicon glyphicon-fullscreen"></i>

                        </a>

                    </div>

                    <!--Header Buttons End-->

                </div>

                <!-- /Page Header -->

                <!-- Page Body -->

                <div class="page-body">

                    <div class="row">

                        <div class="col-md-12">

                            <div class="profile-container">

                                <div class="profile-header row">

                                    <div class="col-lg-2 col-md-4 col-sm-12 text-center">

                                    	<?php

                                    		$img = mostrar_img($link, $ccc["id_cliente"], "clientes", "logo");

                                    		$i=explode("-", $img);

                                    		print '<img src="/images/clientes_img/'.$i[0].'" class="header-avatar" />';

                                    

                                    	?>

                                        

                                    </div>

                                    <div class="col-lg-5 col-md-8 col-sm-12 profile-info">

                                        <div class="header-fullname"><?php print $ccc["nombre"]?></div>

                                        <a href="/altas_clientes/edicion.php?id=<?php print $ccc["id_cliente"]?>" class="btn btn-palegreen btn-sm  btn-follow">

                                            <i class="fa fa-check"></i>

                                            Editar

                                        </a>

                                        <div class="header-information">

                                            <?php

                                               print nl2br($ccc["comentarios"])."<p><i>".$ccc["direccion_cliente"]."</i></p>";

                                            ?>

                                        </div>

                                    </div>

                                    <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 profile-stats">

                                        <div class="row">

                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 stats-col">

                                                <div class="stats-value pink"><?php print $ccc["habitaciones_cliente"]?></div>

                                                <div class="stats-title">Habitaciones</div>

                                            </div>

                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 stats-col">

                                                <div class="stats-value pink"><?php print substr($categoria, 0, 11);  ?></div> 

                                                <div class="stats-title">Categor&iacute;a</div>

                                            </div>

                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 stats-col">

                                                <div class="stats-value pink">120 K</div>

                                                <div class="stats-title">Acumulable del mes</div>

                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 inlinestats-col">

                                                <i class="glyphicon glyphicon-map-marker"></i> Zona: <?php print $zona; ?>

                                            </div>

                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 inlinestats-col">

                                                Modo: <strong><?php print $modo; ?></strong>

                                            </div>

                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 inlinestats-col">

                                                Pax Prom.: <strong><?php print $ccc["pack_cliente"]?></strong>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="profile-body">

                                    <div class="col-lg-12">

                                        <div class="tabbable">

                                            <ul class="nav nav-tabs tabs-flat  nav-justified" id="myTab11">

                                                <li class="active">

                                                    <a data-toggle="tab" href="#overview">

                                                        Datos

                                                    </a>

                                                </li>

                                                <li class="tab-red">

                                                    <a data-toggle="tab" href="#timeline">

                                                        Colaboradores

                                                    </a>

                                                </li>

                                                <li class="tab-palegreen">

                                                    <a data-toggle="tab" id="contacttab" href="#contacts">

                                                        Centros de consumo

                                                    </a>

                                                </li>

                                                <li class="tab-yellow">

                                                    <a data-toggle="tab" href="#settings">

                                                        Ratio de ocupaci&oacute;n

                                                    </a>

                                                </li>

                                                <li class="tab-yellow">

                                                    <a data-toggle="tab" href="#cotizaciones">

                                                        Cotizaciones

                                                    </a>

                                                </li>

                                            </ul>

                                            <div class="tab-content tabs-flat">

                                                <div id="overview" class="tab-pane active">

                                                    

                                                        <div class="form-title">

                                                            Datos

                                                        </div>

                                                        <div class="row">

                                                            <div class="col-sm-6 form-group">

                                                                Cadena: <strong><?php print $cadena?></strong> 

                                                            </div>

                                                            <div class="col-sm-6 form-group">

                                                                Tipo: <strong><?php print $tipo?></strong>

                                                            </div>

                                                        </div>

                                                        <div class="row">

                                                            <div class="col-sm-6 form-group">

                                                                No. Cliente: <strong><?php print $ccc["No_cliente"];?></strong>

                                                            </div>

                                                            <div class="col-sm-6 form-group">

                                                                <div class="form-group">

                                                                     Raz&oacute;n Social: <strong><?php print $ccc["rz_cliente"];?></strong>

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="row">

                                                            <div class="col-sm-6 form-group">

                                                                No. De habitaciones: <strong><?php print $ccc["habitaciones_cliente"];?></strong>

                                                            </div>

                                                            <div class="col-sm-6 form-group">

                                                                <div class="form-group">

                                                                     Tel&eacute;fono: <strong><?php print $ccc["telefono_cliente"];?></strong>

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="row">

                                                            <div class="col-sm-6 form-group">

                                                                Web: <strong><?php print $ccc["web_cliente"];?></strong>

                                                            </div>

                                                            <div class="col-sm-6 form-group">

                                                                <div class="form-group">

                                                                     Raz&oacute;n Social: <strong><?php print $ccc["rz_cliente"];?></strong>

                                                                </div>

                                                            </div>

                                                        </div>

                                                       

                                                        <hr class="wide">

                                                        <h4>Localizaci&oacute;n</h4>

                                                        <div class="row">

                                                        	<div class="col-sm-12">

                                                        		<div id="map-canvas" style="width:100%; height:350px;"></div>

                                                        	</div>

                                                        </div>

                                                        

                                                        

                                                

                                                </div>

                                                <div id="timeline" class="tab-pane">

                                                	<button class="btn btn-palegreen btn-sm  btn-follow showForm " style="margin-bottom: 15px" >Agregar Colaborador</button>

                                                	

                                                	<div id="form_alta">

                                                		 <a id="close_form" href="#"><i class="fa fa-close"></i></a>

										 				 <ul class="nav nav-tabs" id="myTab">



				                                            <li class="active">



				                                                <a data-toggle="tab" href="#home">



				                                                    Datos



				                                                </a>



				                                            </li>



				                                            <li class="tab-red">



				                                                <a data-toggle="tab" href="#profile">



				                                                    Imagenes



				                                                </a>



				                                            </li>



				                                            <li class="tab-red">



				                                                <a data-toggle="tab" href="#alertas">



				                                                    Eventos



				                                                </a>



				                                            </li>



				                                        </ul>          



				                                    <form role="form" id="alta"> 



                                                	<div class="tab-content" style="margin-top: 0;">



                                                			<div id="home" class="tab-pane in active">



			                                                    <div id="registration-form">



			                                                           <div class="row">



			                                                           		<div class="col-sm-6">



					                                                            <div class="form-group">



					                                                                <span class="input-icon icon-right">



					                                                                    <input type="hidden" name="seccion" placeholder="" id="" class="form-control" value="colaborador">

					                                                                    <input type="text" name="nombre" placeholder="Nombre" id="userameInput" class="form-control">

					                                                                </span>



					                                                            </div>



				                                                            </div>



				                                                            <div class="col-sm-6">



					                                                            <div class="form-group">



					                                                                <span class="input-icon icon-right">



					                                                                    <input type="text" name="correo" placeholder="Correo" id="emailInput" class="form-control">



					                                                                   



					                                                                </span>



					                                                            </div>



				                                                            </div>



			                                                            </div>



			                                                            <div class="row">



				                                                            <div class="col-sm-6">



					                                                            <div class="form-group">



					                                                                <span class="input-icon icon-right">



					                                                                    <input type="text" placeholder="direccion" name="direccion" id="" class="form-control">



					                                                                   



					                                                                </span>



					                                                            </div>



				                                                            </div>



				                                                            <div class="col-sm-6">



					                                                            <div class="form-group">



					                                                                <span class="input-icon icon-right">



					                                                                    <input type="text" placeholder="Tel&eacute;fono" id="confirmPasswordInput" name="telefono" data-mask="(999) 999-9999 " class="form-control">



					                                                                    



					                                                                </span>



					                                                            </div>



				                                                            </div>



			                                                            </div>



			                                                            



			                                                            



			                                                            <div class="row">



				                                                            <div class="col-sm-6">



					                                                            <div class="form-group">



					                                                                <span class="input-icon icon-right">



					                                                                    <input type="text" placeholder="Celular" id="confirmPasswordInput" name="celular" class="form-control" data-mask="(999) 999-9999 ">



					                                                                    



					                                                                </span> 



					                                                            </div>



				                                                            </div>



				                                                            <div class="col-sm-6">



					                                                            <div class="form-group">



					                                                                <span class="input-icon icon-right">



					                                                                    <input class="form-control " name="fecha_nacimiento" data-mask="9999/99/99" class="form-control"  type="text" placeholder="Fecha de Nacimiento YYYY/MM/DD" >



					                                                                    



					                                                                </span>



					                                                            </div>



				                                                            </div>



			                                                            </div>



			                                                            



			                                                            



			                                                            <div class="row">



				                                                            <div class="col-sm-6">



					                                                            <div class="form-group">

																						<input class="form-control " name="w"  class="form-control"  type="text" placeholder="Cliente: <?php print $ccc["nombre"]?>" disabled />

																						<input class="form-control" name="cliente"  class="form-control"  type="hidden" placeholder="" value="<?php print $ccc["id_cliente"]; ?>" />



					                                                            </div>



				                                                            </div>



				                                                            <div class="col-sm-6">



					                                                            <div class="form-group">



					                                                                	<select name="puesto" id="e1" style="width: 100%">



					                                                                	<option value="0">Seleccione puesto</option>



					                                                                    <?php



					                                                                    	foreach ($puesto as $kk=>$vv){



					                                                                    		print '



					                                                                    			<option value="'.$vv["id"].'"> '.$vv["nombre"].' </option>



					                                                                    		';



					                                                                    	}



					                                                                    ?>



					                                                                    </select>



					                                                            </div>



				                                                            </div>



			                                                            </div>



			                                                           



			                                                            



			                                                            <div class="row">



			                                                            	<div class="col-sm-12">



			                                                            		<div class="form-group">



			                                                            			<textarea name="observaciones" placeholder="Observaciones" class="form-control" rows="7"></textarea>



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



		                                                    <div id="profile" class="tab-pane">



		                                                    		



		                                                    	<style>



																	  #progress_bar {



																	    margin: 10px 0;



																	    padding: 3px;



																	    border: 1px solid #000;



																	    font-size: 14px;



																	    clear: both;



																	    opacity: 0;



																	    -moz-transition: opacity 1s linear;



																	    -o-transition: opacity 1s linear;



																	    -webkit-transition: opacity 1s linear;



																	  }



																	  #progress_bar.loading {



																	    opacity: 1.0;



																	  }



																	  #progress_bar .percent {



																	    background-color: #99ccff;



																	    height: auto;



																	    width: 0;



																	  }



																	  #file_in{



																	  	background: #fff none repeat scroll 0 0;



																	    border: 2px dashed #2dc3e8;



																	    border-radius: 0;



																	    height: 150px;



																	    width: 300px;



																	    position: relative;



																	    overflow: hidden;



																	    cursor: pointer;



																	  }



																	  #file_in img{



																	  	position: absolute;



																	  	width: 100%;



																	  	top: 0;



																	  	left: 0;



																	  	z-index: 2;



																	  }



																	  #file_in p{



																	  	color: #d3d3d3;



																	    font-size: 20px;



																	    left: 50%;



																	    margin-left: -46%;



																	    padding: 0 4%;



																	    position: absolute;



																	    text-align: center;



																	    top: 30%;



																	    width: 92%;



																	    z-index: 1;



																	  }



																	  #file_in p i{



																	  	font-size: 12px;



																	  	display: block;  



																	  }



																	  #file_in input{



																		 position: absolute;



																		 z-index: 1;



																	    height: 150px;



																	    width: 300px;



																	    cursor: pointer;



																	    z-index: 3;



																	  }



																	  .thumb{



																	  	width: 150px;



																	  	box-shadow: 0 0 3px rgba(0,0,0,.4);



																	  }



																	</style>



																	<div id="file_in">



																		<p>Arrastrar  o click para subir foto de perfil <i>Medida recomendada 256px * 256px</i></p>



																		<input type="file" id="files" name="logo" style="opacity: 0; border: 1px solid #000;" />



																	</div>



																	<div id="progress_bar"><div class="percent">0%</div></div>



																	<output id="list"></output>



																	



																	<script>



																	  var reader;



																	  var progress = document.querySelector('.percent');



																	



																	  function abortRead() {



																	    reader.abort();



																	  }



																	



																	  function errorHandler(evt) {



																	    switch(evt.target.error.code) {



																	      case evt.target.error.NOT_FOUND_ERR:



																	        alert('File Not Found!');



																	        break;



																	      case evt.target.error.NOT_READABLE_ERR:



																	        alert('File is not readable');



																	        break;



																	      case evt.target.error.ABORT_ERR:



																	        break; // noop



																	      default:



																	        alert('An error occurred reading this file.');



																	    };



																	  }



																	



																	  function updateProgress(evt) {



																	    // evt is an ProgressEvent.



																	    if (evt.lengthComputable) {



																	      var percentLoaded = Math.round((evt.loaded / evt.total) * 100);



																	      // Increase the progress bar length.



																	      if (percentLoaded < 100) {



																	        progress.style.width = percentLoaded + '%';



																	        progress.textContent = percentLoaded + '%';



																	      }



																	    }



																	  }



																	



																	  function handleFileSelect(evt) {



																	    // Reset progress indicator on new file selection.



																	    progress.style.width = '0%';



																	    progress.textContent = '0%';



																	



																	    reader = new FileReader();



																	    reader.onerror = errorHandler;



																	    reader.onprogress = updateProgress;



																	    reader.onabort = function(e) {



																	      alert('File read cancelled');



																	    };



																	    reader.onloadstart = function(e) {



																	      document.getElementById('progress_bar').className = 'loading';



																	    };



																	    reader.onload = function(e) {



																	      // Ensure that the progress bar displays 100% at the end.



																	      progress.style.width = '100%';



																	      progress.textContent = '100%';



																	      setTimeout("document.getElementById('progress_bar').className='';", 2000);



																	    }



																	



																	    // Read in the image file as a binary string.



																	    reader.readAsBinaryString(evt.target.files[0]);



																	    var files = evt.target.files; // FileList object







																	    // Loop through the FileList and render image files as thumbnails.



																	    for (var i = 0, f; f = files[i]; i++) {



																	



																	      // Only process image files.



																	      if (!f.type.match('image.*')) {



																	        continue;



																	      }



																	



																	      var reader = new FileReader();



																	



																	      // Closure to capture the file information.



																	      reader.onload = (function(theFile) {



																	        return function(e) {



																	        	document.getElementById("list").innerHTML="";



																	          // Render thumbnail.



																	          var span = document.createElement('span');



																	          span.innerHTML = ['<img class="thumb" src="', e.target.result,



																	                            '" title="', escape(theFile.name), '"/>'].join('');



																	          document.getElementById('file_in').insertBefore(span, null);



																	        };



																	      })(f);



																	



																	      // Read in the image file as a data URL.



																	      reader.readAsDataURL(f);



																	    }



																																		  }



																	



																	  document.getElementById('files').addEventListener('change', handleFileSelect, false);



																	</script>



		                                                    



		                                                    </div><!-- fin del  tab  imagenes -->



		                                                    <div id="alertas" class="tab-pane">



		                                                    		<a href="#" id="agregar_evento">Agregar Evento</a>



		                                                    		<div class="evento">



			                                                    		<div class="row">



				                                                           		<div class="col-sm-4">



						                                                            <div class="form-group">



						                                                                <span class="input-icon icon-right">







						                                                                    <select name="titulo_evento[]"  style="width: 100%">



					                                                                			<option value="0">Tipo de evento</option>



					                                                                			<option value="1">Visita Programada</option>



					                                                                			<option value="2">Cumplea&ntilde;os</option>



					                                                                			<option value="3">Aniversaio</option>



					                                                                			<option value="4">Otro</option>



					                                                                		</select>



						                                                                </span>



						                                                            </div>



					                                                            </div>



					                                                            <div class="col-sm-4">



						                                                            <div class="form-group">



						                                                                <span class="input-icon icon-right">



						                                                                    <input type="text" name="fecha_evento[]" data-mask="9999/99/99" class="form-control" placeholder="Fecha del Evento YYYY/MM/DD">



						                                                                   



						                                                                </span>



						                                                            </div>



					                                                            </div>



					                                                            <div class="col-sm-4">



						                                                            <div class="form-group">



						                                                                <span class="input-icon icon-right">



						                                                                    <select name="repeticion_evento[]"  style="width: 100%">



					                                                                			<option value="0">Repeticion evento</option>



					                                                                			<option value="1">Semanal</option>



					                                                                			<option value="2">15 d&iacute;as</option>



					                                                                			<option value="3">Mensual</option>



					                                                                			<option value="4">Anual</option>



					                                                                		</select>



						                                                                   



						                                                                </span>



						                                                            </div>



					                                                            </div>



				                                                            </div>



			                                                    



			                                                    		<div class="row">



				                                                           		<div class="col-sm-12">



						                                                            <div class="form-group">



						                                                                <span class="input-icon icon-right">



						                                                                    <textarea name="observaciones_evento[]" placeholder="Observaciones" id="" class="form-control" rows="6"></textarea>



						                                                                    



						                                                                </span>



						                                                            </div>



					                                                            </div>



					                                                            



				                                                        </div>



			                                                        </div>



		                                                    



		                                                    </div><!-- fin del  tab  alertas -->



                                                    </div><!-- fin del tab content -->

                                                    <button class="btn btn-blue" type="submit">Guardar</button>



			                                                            <img id="carga" src="/assets/img/carga.gif">



			                                                            <div id="respuesta"></div>



                                   					</form>

								               

                            						</div> <!-- fin de alta -->

                            						

                                                	<div class="table-scrollable">

		                                                    <table class="table table-striped table-bordered table-hover" id="tabla">

						                                       <thead> 

																	<th>Nombre</th>

																	<th>Correo</th> 

																	<th>Puesto</th> 

																	<th>Tel&eacute;fono</th> 

																	<th>Direcci&oacute;n</th> 

																	<th>Acciones</th>

																</thead>

																<?php

																	$a= 'SELECT * FROM colaboradores where cliente_id='.$ccc["id_cliente"];

																	$aa= mysql_query($a, $link);

																	$aaa= mysql_fetch_array($aa);

																	do{

																		$puesto= devuelve_campo_c("nombre","puestos_asociados", "id_puesto_asociado", $aaa["puesto"], $link);

																		print '<tr id="fila_colaborador_'.$aaa["id_colaborador"].'"> 

																				<td>'.$aaa["nombre"].'</td>

																				<td>'.$aaa["correo"].'</td>

																				<td>'.$puesto.'</td>

																				<td>'.$aaa["telefono"].'</td>

																				<td>'.$aaa["direccion"].'</td>

																				<td>

																					<a href="/perfil_colaborador.php?id='.$aaa["id_colaborador"].'" alt="perfil" title="Perfil" ><i class="menu-icon fa fa-picture-o"></i></a>

																					<a href="/perfil_colaborador.php?id='.$aaa["id_colaborador"].'" alt="Editar" title="Editar" class="editar" id="'.$aaa["id_colaborador"].'" from-data="colaborador" ><i class="fa fa-edit"></i></a>

																					<a href="#" alt="Eliminar" title="Eliminar" class="eliminar" id="'.$aaa["id_colaborador"].'" from-data="colaborador" ><i class="fa fa-close"></i></a>

																					<p class="texto_eliminar" id="text_colaborador_'.$aaa["id_colaborador"].'">

																						Eliminar? 

																						<a href="#" id="'.$aaa["id_colaborador"].'" class="elim" data-table="colaboradores" data-dato="id_colaborador" from-data="colaborador">si</a> 

																						<a href="#" class="eliminar_no" id="'.$aaa["id_colaborador"].'" from-data="colaborador">no</a>

																					</p>

																				</td>

																			</tr>';

																	}while($aaa= mysql_fetch_array($aa));

																?>

						                                    </table> 

				                                    </div>

                                                </div>

                                                <div id="contacts" class="tab-pane">

                                                		

                                                		<button class="btn btn-palegreen btn-sm  btn-follow showFormC " style="margin-bottom: 15px" >Agregar Centro Consumo</button>

                                                		<div id="form_altaC">

                                                		 <a id="close_form" href="#"><i class="fa fa-close"></i></a>

										 				 <ul class="nav nav-tabs" id="tab">



				                                            <li class="active">



				                                                <a data-toggle="tab" href="#datosC">



				                                                    Datos



				                                                </a>



				                                            </li>



				                                            

				                                            

				                                        </ul>          



				                                    <form role="form" id="altaC"> 



                                                	<div class="tab-content" style="margin-top: 0;">



                                                			<div id="datosC" class="tab-pane in active">



			                                                    <div id="registration-form">



			                                                           <div class="row">



			                                                           		<div class="col-sm-6">



					                                                            <div class="form-group">



					                                                                <span class="input-icon icon-right">

					                                                                    <input type="text" name="nombre" placeholder="Nombre" id="userameInput" class="form-control">

					                                                                    <input type="hidden" name="seccion" placeholder="Nombre" id="userameInput" class="form-control" value="c_consumo">

					                                                                </span>



					                                                            </div>



				                                                            </div>



				                                                            <div class="col-sm-6">



					                                                            <div class="form-group">



					                                                                <span class="input-icon icon-right">



					                                                                    <input type="text" name="no_clientes" placeholder="No. Clientes" id="emailInput" class="form-control">



					                                                                   



					                                                                </span>



					                                                            </div>



				                                                            </div>



			                                                            </div>



			                                                            

			                                                            

			                                                            



			                                                            <div class="row">



				                                                            <div class="col-sm-6">



					                                                            <div class="form-group">

																						<input class="form-control " name="w"  class="form-control"  type="text" placeholder="Cliente: <?php print $ccc["nombre"]?>" disabled />

																						<input class="form-control" id="id_clienteC" name="cliente"  class="form-control"  type="hidden" placeholder="" value="<?php print $ccc["id_cliente"]; ?>" />



					                                                            </div>



				                                                            </div>



				                                                            <div class="col-sm-6">



					                                                            <div class="form-group">

																						

					                                                                	<select name="tipo_c_consumo" id="e1" style="width: 100%">



					                                                                	<option value="0">Seleccione Tipo centro Consumo</option>



					                                                                    <?php



					                                                                    	foreach ($centroConsumo as $ccon=>$cnv){



					                                                                    		print '



					                                                                    			<option value="'.$cnv["id"].'"> '.$cnv["nombre"].' </option>



					                                                                    		';



					                                                                    	}



					                                                                    ?>



					                                                                    </select>



					                                                            </div>



				                                                            </div>



			                                                            </div>



			                                                           



			                                                            



			                                                            <div class="row">



			                                                            	<div class="col-sm-12">



			                                                            		<div class="form-group">



			                                                            			<textarea name="observaciones" placeholder="Observaciones" class="form-control" rows="7"></textarea>



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

															



                                                    </div><!-- fin del tab content -->

                                                    <button class="btn btn-blue" type="submit">Guardar</button>



			                                                            <img id="cargaC" src="/assets/img/carga.gif" style="display: none; "> 



			                                                            <div id="respuestaC"></div>



                                   					</form>

								               

                            						</div> <!-- fin de alta -->

                                                			

                                                		



                                                		<div class="table-scrollable">

		                                                    <table class="table table-striped table-bordered table-hover" id="tablaC">

						                                       <thead> 

																	<th>Nombre</th>

																	<th>Capacidad</th> 

																	<th>Tipo</th> 

																	<th>Observaciones</th> 

																	

																	<th>Estatus</th> 

																	<th>Acciones</th>

																</thead>

																<?php

																	$centro= 'SELECT * FROM centrosConsumo where cliente_id_centro='.$ccc["id_cliente"];

																	$centro_q= mysql_query($centro, $link);

																	$ccentro= mysql_fetch_array($centro_q);

																	do{

																		$tipo= devuelve_campo_c("nombre", "tipos_centro_consumo", "id_tipo_centro_consumo", $ccentro["tipo_centro_consumo"], $link) ;

																		$puesto= devuelve_campo_c("nombre","puestos_asociados", "id_puesto_asociado", $aaa["puesto"], $link);

																		if($ccentro["status"]== "on"){

								                                				$st='<a class="btn btn-labeled btn-palegreen" href="#">

													                                        <i class="btn-label glyphicon glyphicon-ok"></i>Activo

													                                    </a>';

								                                			}else{

								                                				$st= '<a class="btn btn-labeled btn-darkorange" href="#">

													                                        <i class="btn-label glyphicon glyphicon-remove"></i>Desactivo

													                                    </a>';

								                                			}

																		print '<tr id="fila_centro_'.$ccentro["id_centro_consumo"].'">

																				<td>'.$ccentro["nombre"].'</td>

																				<td>'.$ccentro["no_clientes"].'</td>

																				<td>'.$tipo.'</td> 

																				<td>'.$ccentro["bbservaciones"].'</td>

																				<td>'.$st.'</td>

																				<td>



																					<a href="#" alt="Editar" title="Editar" class="editar" id="'.$ccentro["id_centro_consumo"].'" from-data="centro_consumo" ><i class="fa fa-edit"></i></a>

																					<a href="#" alt="Eliminar" title="Eliminar" class="eliminar" id="'.$ccentro["id_centro_consumo"].'" from-data="centro_consumo" ><i class="fa fa-close"></i></a>

																					<p class="texto_eliminar" id="text_centro_'.$ccentro["id_centro_consumo"].'">

																						Eliminar? 

																						<a href="#" id="'.$ccentro["id_centro_consumo"].'" class="elim" data-table="centrosConsumo" data-dato="id_centro_consumo" from-data="centro_consumo">si</a> 

																						<a href="#" class="eliminar_no" id="'.$ccentro["id_centro_consumo"].'" from-data="centro_consumo">no</a>

																					</p>

																				</td>

																			</tr>';

																	}while($ccentro= mysql_fetch_array($centro_q));

																?>

						                                    </table> 

				                                    </div>

                                                

                                                

                                                </div>

                                                

                                                <div id="settings" class="tab-pane">

                                                    <form role="form" id="ratio_ocupacion">

                                                        <div class="form-title">

                                                           Selecciona rango de fechas a comparar

                                                        </div>

                                                        <div class="row">

                                                            	<form method="GET">

                                                        		<div class="col-lg-6 col-sm-6 col-xs-12">



								                                        <div class="form-group">

								                                            <label for="reservation">Fecha inicio</label>

								                                            <div class="controls">

								                                                <div class="input-group">

								                                                    <span class="input-group-addon">

								                                                        <i class="fa fa-calendar"></i>

								                                                    </span><input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" data-date-viewmode="years" type="text"  name="fecha" />

								                                                </div>

								                                            </div>

								                                        </div>

								                               </div>

                                                        		<div class="col-lg-6 col-sm-6 col-xs-12">





								                                        <div class="form-group">

								                                            <label for="reservation">Fecha final</label>

								                                            <div class="controls">

								                                                <div class="input-group">

								                                                    <span class="input-group-addon">

								                                                        <i class="fa fa-calendar"></i>

								                                                    </span><input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" data-date-viewmode="years" type="text"  name="fecha2" />

								                                                </div>

								                                            </div>



								                                        <input type="hidden" value="<?php print $_GET["id"] ?>" name="id" id="id_cliente"  />

								                                        <input type="hidden" value="<?php print $ccc["zona_cliente"] ?>" name="zona_cliente"  />

								                                        <input type="hidden" value="<?php print $ccc["categoria_cliente"] ?>" name="categoria_cliente"  />

								                                        <input type="hidden" value="<?php print $ccc["habitaciones_cliente"] ?>" name="habitaciones"  />

								                                        <input type="hidden" value="<?php print $ccc["pack_cliente"] ?>" name="pack"  />

								                                        

								                                    </div>

								                                    

								                               </div>

								                               		<div class="col-lg-6 col-sm-6 col-xs-12">

								                               			<input type="submit" value="Calcular Ratio" />

								                               		</div>

																

								                               		<div class="col-lg-12 col-sm-12 col-xs-12" id="r">

								                               			

								                               		</div>

																

								                               </form>

                                                        </div>

                                                       

                                                </div>

                                                <div id="cotizaciones" class="tab-pane" > 

														<button style="margin-bottom: 15px" class="btn btn-palegreen btn-sm  btn-follow showNewC ">Agregar Cotizaci&oacute;n</button> 

														

														<div id="cotizacion" style="display:none">

															<form id="cotizacion_form">

																<a href="#" class="btn btn-default shiny tooltips" id="agregar_cot"  data-toggle="tooltip" data-original-title="La Familia se agregar&aacute; debajo">Agregar familia</a>

																<i class="alert alert-info fade in">A los productos que le competen el precio rack ya incluyen IEPS</i>

																<div id="insert_cotizacion">

																	<div id="coti_1" class="cot_content">

																	<?php

																				include("cls/conexionDelli.php");

																				 $f= 'SELECT * FROM familia';

																				$ff= mysql_query($f, $link2);

																				$fff= mysql_fetch_array($ff);

																				

																			?>

																		<select class="familias familia_unico" id="1" name="familia[]">

																			<option>Seleccciona una  familia</optioon>

																			<?php

																				do{

																					print '<option value="'.$fff["id_familia"].'">'.$fff["nombre"].'</option>';

																				}while($fff= mysql_fetch_array($ff));

																			?>

																		</select> 

																		<div id="pro_1" >

																			<center><img src="/images/Preloader_7.gif" class="prel" id="pre_1" /></center>

																			<div id="proo_1" class="pro">

																				

																			</div>

																		</div>

																	</div>

																</div>

																<textarea placeholder="Observaciones" name="observaciones" class="form-control" rows="8" id="observaciones"></textarea>

																<input type="hidden" name="seccion" value="cotizacion" />

																<input type="hidden" name="id_cliente" value="<?php print $_GET["id"] ?>" />
																<input type="hidden" name="user" value="<?php print $_SESSION["us"]["id"] ?>" />

																<input type="hidden" name="fecha" value="<?php print date("Ymd") ?>" />

															</form>

															

															 <div class="progress progress-striped active" id="cargaCot" style="display: none; ">

					                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">

					                                               

					                                            </div>

					                                        </div>

					                                         

															<div id="respuestaCot"></div>

															<a href="#" class="btn btn-palegreen shiny" id="guardar_cotizacion">Guardar Cotizaci&oacute;n</a>

															<div class="clear" ></div>

														</div> 

														

														

														

														<div style="margin: 5px 0 5px 0;"></div>

                                                        <div class="table-scrollable">

		                                                    <table class="table table-striped table-bordered table-hover" id="tablaCot">

						                                       <thead> 

																	<th>Folio</th>

																	<th>Fecha de realizaci&oacute;n</th> 

																	<th>Observaciones</th> 

																	<th>Acciones</th>

																</thead>

																<?php

																	$cot= 'SELECT * FROM cotizaciones where cliente_id='.$ccc["id_cliente"].' AND user_id='.$_SESSION["us"]["id"];

																	$cot_q= mysql_query($cot, $link);

																	$cott= mysql_fetch_array($cot_q);

																	if($cott){

																	do{

																		

																		

																		print '<tr id="fila_coti_'.$cott["id_cotizacion"].'">

																				<td>'.$cott["folio"].'</td>

																				<td>'.fecha($cott["fecha"]).'</td>

																				<td>'.cortar($cott["observaciones"], 20, 10, 1).'...</td>



																				<td>



																					<a href="/pdf/'.$cott["pdf"].'" alt="Ver PDF" title="Ver PDF" target="_blank"><i class="fa fa-file-pdf-o"></i></a>

																					<!-- <a href="#" alt="Editar" title="Editar" data-title="'.$cott["folio"].'"  class="editar" id="'.$cott["id_cotizacion"].'" from-data="coti" data-toggle="modal" data-target=".bs-example-modal-lg" ><i class="fa fa-edit"></i></a>

																					<a href="#" alt="Eliminar" title="Eliminar" class="eliminar" id="'.$cott["id_cotizacion"].'" from-data="coti" ><i class="fa fa-close"></i></a>

																					<p class="texto_eliminar" id="text_coti_'.$cott["id_cotizacion"].'">

																						Eliminar? 

																						<a href="#" id="'.$cott["id_cotizacion"].'"  class="elim" data-table="cotizaciones" data-dato="id_cotizacion" from-data="coti">si</a> 

																						<a href="#" class="eliminar_no" id="'.$cott["id_cotizacion"].'" from-data="coti">no</a>

																					</p> -->

																				</td>

																			</tr>';

																	}while($cott= mysql_fetch_array($cot_q));

																	}else{

																		print '<tr>

																					<td colspan="4">No existen cotizaciones</td>

																					

																				</tr>

																		';

																	}

																?>

						                                    </table> 

				                                    	</div>

												</div><!-- fin del tab cotizaciones -->

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- /Page Body -->

            </div>

            <!-- /Page Content -->

        </div>

        <!-- /Page Container -->

        <!-- Main Container -->

    </div>
	<!--LArge Modal Templates-->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel"></h4>
                </div>
                <div class="modal-body" id="edicion">
                   
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!--Basic Scripts-->

    <script src="assets/js/jquery.min.js"></script>

    <script src="assets/js/bootstrap.min.js"></script>

    <script src="assets/js/slimscroll/jquery.slimscroll.min.js"></script>

    <!--Beyond Scripts-->

    <script src="assets/js/beyond.min.js"></script>

     <!--Page Related Scripts-->

    <script src="assets/js/toastr/toastr.js"></script>

    <script src="assets/js/charts/flot/jquery.flot.js"></script>

    <script src="assets/js/charts/flot/jquery.flot.resize.js"></script>

   <!--Bootstrap Date Picker-->

    <script src="assets/js/datetime/bootstrap-datepicker.js"></script>



	<!--Page Related Scripts-->

    <script src="/assets/js/inputmask/jasny-bootstrap.min.js"></script>

    <!--Jquery Select2-->

    <script src="/assets/js/select2/select2.js"></script>

    <script src="/assets/js/bootbox/bootbox.js"></script>

     <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

     <script src="/assets/js/perfil.js"></script>

     <script>

     	$(document).ready(function() {

        initialize();

      });

		 //SET SOME INITIAL VARIABLES THAT WILL BE USED

      var geocoder = new google.maps.Geocoder();

      var marker = null;

      var map = null;



      function initialize() {

        var mapLat  = <?php print $ccc["latitud"]?>;

        var mapLon = <?php print $ccc["longitud"]?>;

        var latLng = new google.maps.LatLng(mapLat, mapLon);

        map = new google.maps.Map(document.getElementById('map-canvas'),{

          zoom: 12,

          center: latLng,

          mapTypeId: google.maps.MapTypeId.ROADMAP

        });

        marker = new google.maps.Marker({

          position: latLng,

          map: map,

          draggable: false

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

     </script>

</body>

<!--  /Body -->

</html>