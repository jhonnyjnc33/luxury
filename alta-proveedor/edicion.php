<?php
include("../includes/login.php");
$condo= datos_individuales_i($link, "proveedores", "id_proveedor", $_GET["id"]);
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
    <title> Edici&oacute;n de campos de golf</title>

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
                            <a href="/proveedores">Proveedores</a>
                        </li>
                        <li>
                            Edici&oacute;n de proveedor
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
                       <!-- <li >
                            <a data-toggle="tab" href="#img">
                                Imagenes
                            </a>
                        </li> -->
                    </ul>          
                    <form role="form" id="alta">
                    	<div class="tab-content">
                    		<div id="home" class="tab-pane in active">
                                <div id="registration-form">
                                   
                                        <div class="row">
                                       		<div class="col-sm-3">
                                                <div class="form-group">
                                                    <span class="input-icon icon-right">
                                                    	<label>Clave</label>
                                                        <input type="hidden" name="id" placeholder="" id="userameInput" class="form-control" value="<?php print $_GET["id"]?>">
                                                        <input type="hidden" name="seccion" placeholder="" id="userameInput" class="form-control" value="proveedor">
                                                        <input type="text" name="clave" class="form-control" value="<?php print $condo["clave"]?>">
                                                        
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <span class="input-icon icon-right">
                                                    	<label>Nombre Comercial</label>
                                                       <input type="text" name="nombre" class="form-control" value="<?php print $condo["nombre_comercial"]?>">
                                                    </span>
                                                </div>
                                            </div>
                                       		<div class="col-sm-3">
                                                <div class="form-group">
                                                    <span class="input-icon icon-right">
                                                    	<label>Tel&eacute;fono</label>
                                                        <input type="text" name="telefono"  class="form-control" value="<?php print $condo["tel_oficina"]?>">
                                                        
                                                    </span>
                                                </div>
                                            </div>
                                       		<div class="col-sm-3">
                                                <div class="form-group">
                                                    <span class="input-icon icon-right">
                                                    	<label>Contacto</label>
                                                        <input type="text" name="contacto"  value="<?php print $condo["nombre_contacto_principal"]?>" class="form-control ">
                                                        
                                                    </span>
                                                </div>
                                              </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <span class="input-icon icon-right">
                                                    	<label>Correo Electr&oacute;nico</label>
                                                       <input type="text" name="correo" class="form-control" value="<?php print $condo["correo_contacto_principal"]?>">
                                                    </span>
                                                </div>
                                            </div>
                                       		<div class="col-sm-3">
                                                <div class="form-group">
                                                    <span class="input-icon icon-right">
                                                    	<label>Nombre Facturaci&oacute;n</label>
                                                        <input type="text" name="facturacion"  class="form-control" value="<?php print $condo["facturacion"]?>">
                                                        
                                                    </span>
                                                </div>
                                            </div>
                                       		<div class="col-sm-3">
                                                <div class="form-group">
                                                    <span class="input-icon icon-right">
                                                    	<label>RFC</label>
                                                        <input type="text" name="rfc"  value="<?php print $condo["rfc"]?>" class="form-control ">
                                                        
                                                    </span>
                                                </div>
                                            </div>
                                       		<div class="col-sm-3">
                                                <div class="form-group">
                                                    <span class="input-icon icon-right">
                                                    	<label>Domicilio</label>
                                                        <input type="text" name="direccion"  value="<?php print $condo["direccion"]?>" class="form-control ">
                                                        
                                                    </span>
                                                </div>
                                            </div>
                                       		<div class="col-sm-3">
                                                <div class="form-group">
                                                    <span class="input-icon icon-right">
                                                    	<label>Tipo de Cambio</label>
                                                        <input type="text" name="tipo_cambio"  value="<?php print $condo["tipo_cambio"]?>" class="form-control ">
                                                        
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
                            
                            <div id="img" class="tab-pane in">
                            	<h2>Logo</h2>
                            	<?php
                            		$i= mostrar_img($link, $_GET["id"], "golf", "logo");
                            		
                            		foreach ($i as $img) {
                            			print '
                            				<div class="galaeria" id="m_'.$img["id"].'">
                            					<i class="fa fa-close eliminar" data-table="imagen" data-campo="id_imagen" data-id="'.$img["id"].'"></i>
                            					<img src="/images/golf_img/'.$img["imagen"].'" width="100" />
                            				</div>
                            			';
                            		}
                            	?>
                               	<input type="file" name="logo" class="form-control" />
                               	<hr>
                               	<h2>Galer&iacute;a</h2>
                               	<?php
                            		$ii= mostrar_img($link, $_GET["id"], "golf", "galeria_golf");
                            		foreach ($ii as $imgg) {
                            			print '
                            				<div style="display: inline-block; position: relative;" class="galeria" id="m_'.$imgg["id"].'">
                            					<i class="fa fa-close eliminar" data-id="'.$imgg["id"].'" data-table="imagen" data-campo="id_imagen"></i>
                            					<img src="/images/golf_img/'.$imgg["imagen"].'"  />
                            				</div>
                            			';
                            		}
                            		
                            	?>
                            	
                               	<a href="#" id="agrega" style="clear: both;">Agregar Imagen</a> 
                               	<div id="galeria">
                               		<input type="file" name="galeria_golf[]" class="form-control g" />
                               	</div>
                            </div>
                        </div><!-- fin del tab content -->
                        <button class=" btn btn-primary" type="submit">Guardar</button>
                        
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
