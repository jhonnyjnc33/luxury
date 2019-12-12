<?php
include("../includes/login.php");
$condo= datos_individuales_i($link, "articulos", "id_articulo", $_GET["id"]);
$cat= all($link, "categoria_blog", "order by nombre_esp asc");
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
    <title> Edici&oacute;n de Art&iacute;culos Blog</title>

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
                            <a href="/editar-articulos">Art&iacute;culos Blog</a>
                        </li>
                        <li>
                            Edici&oacute;n de Art&iacute;culos Blog
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
				                                            <li >
				                                                <a data-toggle="tab" href="#img">
				                                                    Imagenes
				                                                </a>
				                                            </li>
				                                        </ul>          
				                                      <form role="form" id="alta">
                                                	<div class="tab-content">
                                                			<div id="home" class="tab-pane in active">
			                                                    <div id="registration-form">
			                                                       
			                                                            <div class="row">
			                                                           		<div class="col-sm-4">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Titulo</label>
					                                                                    <input type="hidden" name="id" placeholder="" id="userameInput" class="form-control" value="<?php print $_GET["id"]?>">
					                                                                    <input type="hidden" name="seccion" placeholder="" id="userameInput" class="form-control" value="blog_articulo">
					                                                                    <input type="text" name="titulo_esp" class="form-control" value="<?php print $condo["titulo_esp"]?>">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-4">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Titulo eng</label>
					                                                                    <input type="text" name="titulo_eng" class="form-control" value="<?php print $condo["titulo_eng"]?>">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-4">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Categor&iacute;a</label>
					                                                                    <select type="text" name="categoria"  class="form-control">
					                                                                    	<option value="0">Seleccione una opci&oacute;n</option>
					                                                                    	<?php
					                                                                    		foreach ($cat as $c){
					                                                                    			if($c["id_categoria_blog"]==$condo["categoria_id"]){
						                                                                    			print '
						                                                                    				<option value="'.$c["id_categoria_blog"].'" selected>'.$c["nombre_esp"].'</option>
						                                                                    			';
					                                                                    			}else{
					                                                                    				print '
						                                                                    				<option value="'.$c["id_categoria_blog"].'" >'.$c["nombre_esp"].'</option>
						                                                                    			';
					                                                                    			}
					                                                                    		}
					                                                                    	?>
					                                                                    </select>
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
			                                                           		<div class="col-sm-4">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Autor</label>
					                                                                    <input type="text" name="autor"  class="form-control" value="<?php print $condo["autor"]?>">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
			                                                           		<div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Fecha de Publicaci&oacute;n</label>
					                                                                    <input type="text" name="fecha"  value="<?php print $condo["fecha"]?>" class="form-control date-picker" data-date-format="yyyy-mm-dd" >
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
			                                                           		
				                                                            </div>
				                                                            <div class="row">
				                                                            	<div class="col-sm-12">
				                                                            		<div class="form-group">
				                                                            			<label>Texto esp</label>
				                                                            			<textarea name="texto_esp" placeholder="" class="form-control" rows="7"><?php print $condo["texto_esp"]?></textarea>
				                                                            		</div>
				                                                            	</div>
			                                                            	</div>
				                                                             <div class="row">
				                                                            	<div class="col-sm-12">
				                                                            		<div class="form-group">
				                                                            			<label>Texto eng</label>
				                                                            			<textarea name="texto_eng" placeholder="" class="form-control" rows="7"><?php print $condo["texto_eng"]?></textarea>
				                                                            		</div>
				                                                            	</div>
			                                                            	</div>
				                                                            
				                                                            <div class="row">
				                                                          		 <h2 class="col-sm-12" style="border-top: 1px solid #ccc; margin: 10px 0; padding-top: 10px;">Posicionamiento Web</h2>
					                                                            <div class="col-sm-6">
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Tag Title esp</label>
						                                                                    <input id="condominio" name="tag_title_esp" class="form-control" value="<?php print $condo["tag_title_esp"]?>">
						                                                                    	
						                                                                </span>
						                                                            </div>
					                                                            </div>
				                                                          		 <div class="col-sm-6">
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Tag Title eng</label>
						                                                                    <input id="condominio" name="tag_title_eng" class="form-control" value="<?php print $condo["tag_title_eng"]?>">
						                                                                    	
						                                                                </span>
						                                                            </div>
					                                                            </div>
					                                                            <div class="col-sm-6">
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Url esp</label>
						                                                                    <input id="condominio" name="url_esp" class="form-control" value="<?php print $condo["url_esp"]?>">
						                                                                    	
						                                                                </span>
						                                                            </div>
					                                                            </div>
					                                                             <div class="col-sm-6">
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Url eng</label>
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
			                                                            	<div class="col-sm-12">
			                                                            		<div class="form-group">
			                                                            			<label>Tag Description eng</label>
			                                                            			<textarea name="tag_description_esp"  class="form-control" rows="7"><?php print $condo["tag_description_eng"]?></textarea>
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
		                                                    	<h2>Imagen Principal</h2>
		                                                    	<?php
		                                                    		$i= mostrar_img($link, $_GET["id"], "articulo", "principal");
		                                                    		
		                                                    		foreach ($i as $img) {
		                                                    			print '
		                                                    				<div class="galaeria" id="m_'.$img["id"].'">
		                                                    					<i class="fa fa-close eliminar" data-table="imagen" data-campo="id_imagen" data-id="'.$img["id"].'"></i>
		                                                    					<img src="/images/articulo_img/'.$img["imagen"].'" width="100" />
		                                                    				</div>
		                                                    			';
		                                                    		}
		                                                    	?>
			                                                   	<input type="file" name="principal" class="form-control" />
			                                                   	<hr>
			                                                   	<h2>Galer&iacute;a</h2>
			                                                   	<?php
		                                                    		$ii= mostrar_img($link, $_GET["id"], "articulo", "galeria");
		                                                    		foreach ($ii as $imgg) {
		                                                    			print '
		                                                    				<div style="display: inline-block; position: relative;" class="galeria">
		                                                    					<i class="fa fa-close eliminar" data-id="'.$imgg["id"].'" data-table="imagen" data-campo="id_imagen"></i>
		                                                    					<img src="/images/articulo_img/'.$imgg["imagen"].'"  />
		                                                    				</div>
		                                                    			';
		                                                    		}
		                                                    		
		                                                    	?>
		                                                    	
			                                                   	<a href="#" id="agrega" style="clear: both;">Agregar Imagen</a> 
			                                                   	<div id="galeria">
			                                                   		<input type="file" name="galeria[]" class="form-control g" />
			                                                   	</div>
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
	      		$("#galeria").append('<input type="file" name="galeria[]" class="form-control g" />');
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


	});
    </script>
    
</body>
<!--  /Body -->
</html>
