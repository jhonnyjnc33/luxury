<?php
include("../includes/login.php");
$condo= datos_individuales_i($link, "aldeas", "id", $_GET["id"]);
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
    <title> Edici&oacute;n de Aldeas</title>

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
                            <a href="/aldeas">Aldeas</a>
                        </li>
                        <li>
                            Edici&oacute;n de Aldea
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
				                                                <a data-toggle="tab" href="#profile">

				                                                    Imagenes

				                                                </a>

				                                            </li>
				                                        </ul>          
				                                     
                                                	<div class="tab-content">
                                                			<div id="home" class="tab-pane in active">
			                                                    <div id="registration-form">
			                                                        <form role="form" id="alta">
			                                                            <div class="row">
			                                                           		<div class="col-sm-6">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Nombre</label>
					                                                                    <input type="hidden" name="seccion" placeholder="" id="userameInput" class="form-control" value="aldea">
					                                                                    <input type="hidden" name="id" placeholder="" id="userameInput" class="form-control" value="<?php print $_GET["id"]?>">
					                                                                    <input type="text" name="nombre_esp"  class="form-control" value="<?php print $condo["nombre_esp"]?>">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
			                                                           		<div class="col-sm-6">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Nombre</label>
					                                                                    <input type="text" name="nombre_eng"  class="form-control" value="<?php print $condo["nombre_eng"]?>">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-12">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Mapa</label>
					                                                                    <textarea  name="mapa"  class="form-control"><?php print $condo["mapa"]?></textarea>
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            
				                                                      </div>
				                                                            
				                                                            
			                                                             <div class="row">
			                                                             	<div class="col-sm-12">
			                                                             		<h2>Posicionamiento Web</h2>
			                                                             	</div>
			                                                             	
			                                                           		<div class="col-sm-6">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Tag title esp</label>
					                                                                    <input type="text" name="tag_title_esp"  class="form-control" value="<?php print $condo["tag_title_esp"]?>">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
			                                                             	
			                                                           		<div class="col-sm-6">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Url esp</label>
					                                                                    <input type="text" name="url_esp"  class="form-control" value="<?php print $condo["url_esp"]?>">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
			                                                           		<div class="col-sm-12">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Tag Description esp</label>
					                                                                    <textarea  name="tag_description_esp"  class="form-control"><?php print $condo["tag_description_esp"]?></textarea>
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
			                                                           		<div class="col-sm-6">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Tag title eng</label>
					                                                                    <input type="text" name="tag_title_eng"  class="form-control" value="<?php print $condo["tag_title_eng"]?>">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
			                                                             	
			                                                           		<div class="col-sm-6">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Url eng</label>
					                                                                    <input type="text" name="url_eng"  class="form-control" value="<?php print $condo["url_eng"]?>">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
			                                                           		<div class="col-sm-12">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Tag Description eng</label>
					                                                                    <textarea  name="tag_description_eng"  class="form-control"><?php print $condo["tag_description_eng"]?></textarea>
					                                                                    
					                                                                </span>
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
		                                                    
		                                                    <div id="profile" class="tab-pane">
		                                                    	<h2>Imagen Banner</h2>
																<?php
																	$img = mostrar_img($link, $condo["id"], "destino", "banner");
																	
																	foreach($img as $ii){
																		$imagen= $ii["imagen"];
																	}
						                                    		print '<div style="position: relative;" class="galeria" id="m_'.$ii["id"].'"><i class="fa fa-close eliminar" data-table="imagen" data-campo="id_imagen" data-id="'.$ii["id"].'"></i><img src="/images/destino_img/'.$imagen.'" class="header-avatar" width="300" style="margin-bottom: 10px;"/></div>';
																?>
		                                                    			<p><i>Medida recomendada 1900px * 265px</i></p>
	
			                                                   	<input type="file" name="banner" class="form-control" />
			                                                   	<hr>
																	
																<h2>Imagen listado</h2>
																<?php
																	$img2 = mostrar_img($link, $condo["id"], "destino", "listado");
																	
																	foreach($img2 as $ii2){
																		$imagen2= $ii2["imagen"];
																	}
						                                    		print '<div class="galeria" id="m_'.$ii2["id"].'" ><i class="fa fa-close eliminar" data-table="imagen" data-campo="id_imagen" data-id="'.$ii2["id"].'"></i><img src="/images/destino_img/'.$imagen2.'" class="header-avatar" width="300" style="margin-bottom: 10px;"/></div>';
																?>
		                                                    	<p><i>Medida recomendada 700px * 470px</i></p>
	
			                                                   	<input type="file" name="listado" class="form-control" />

		                                                    </div><!-- fin del  tab  imagenes -->
		                                                     
		                                                   <button class=" btn btn-primary" type="submit">Guardar</button>
		                                                   </form>
                                                    </div><!-- fin del tab content -->
                                                    
			                                                            <img id="carga" src="/assets/img/carga.gif">
			                                                            <div id="respuesta"></div>
                                   					
                </div>
                <!-- /Page Body -->
            </div>
            <!-- /Page Content -->
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

	//--Jquery Select2--
	$(function() {

		$("#e1, #ell, #de").select2();

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
	});
    </script>
    
</body>
<!--  /Body -->
</html>
