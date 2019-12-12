<?php
include("../includes/login.php");
$condo= datos_individuales_i($link, "compras", "id_compra", $_GET["id"]);
$cat= all($link, "categorias", "order by nombre_esp asc");
$s= all($link, "subcategoria", "where categoria_id=".$condo["categoria_id"]." order by nombre_esp asc");
switch ($condo["tipo_pago"]) {
	case 'pp':
		$pago= 'Paypal';
		break;
	
	default:
		# code...
		break;
}
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
    <title> Venta </title>

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
                            <a href="/ventas">Ventas</a>
                        </li>
                        <li>
                            Edici&oacute;n de Ventas
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
				
				                                         <!--   <li class="tab-red">
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
				                                          -->
															<li class="tab-red">
				                                                <a data-toggle="tab" href="#img"> 
				                                                    Productos
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
					                                                                	<label>Folio</label>
					                                                                    <input type="hidden" name="id" placeholder="" id="userameInput" class="form-control" value="<?php print $_GET["id"]?>" >
					                                                                    <input type="hidden" name="seccion" placeholder="" id="userameInput" class="form-control" value="compra">
					                                                                    <input type="text" name="" disabled=""  class="form-control" value="AF<?php print ceros($condo["id_compra"], 4)?>">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-4">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Fecha de Compra </label>
					                                                                    <input type="text" name="fechaCompra" disabled="" class="form-control" value="<?php print $condo["fechaCompra"]?>">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-4">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Tipo de pago</label>
					                                                                    <input type="text" name="tipoPago" disabled  value="<?php print $pago?>" class="form-control ">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Nombre </label>
					                                                                    <input type="text" name="nombre"  class="form-control" value="<?php print $condo["nombre"]?>">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
			                                                           		<div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Apellido</label>
					                                                                    <input type="text" name="apellidos"  value="<?php print $condo["apellido"]?>" class="form-control ">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Email</label>
					                                                                   <input type="text" name="email"  value="<?php print $condo["email"]?>" class="form-control ">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
			                                                           		<div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Teléfono</label>
					                                                                    <input type="text" name="telefono"  value="<?php print $condo["telefono"]?>" class="form-control ">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
			                                                           		
				                                                        </div>
				                                                            <div class="row">
				                                                            	<div class="col-sm-12">
				                                                            		<div class="form-group">
				                                                            			<label>Comentarios Adicionales</label>
				                                                            			<textarea name="comentarios" placeholder="" class="form-control" rows="7"><?php print $condo["comentarios"]?></textarea>
				                                                            		</div>
				                                                            	</div>
			                                                            	</div>
				                                                            
				                                                            <div class="row">
				                                                          		 <h2 class="col-sm-12" style="border-top: 1px solid #ccc; margin: 10px 0; padding-top: 10px;">Datos del ramo</h2>
					                                                            <div class="col-sm-3">
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Quien Recibe</label>
						                                                                    <input id="" name="quienRecibe" class="form-control" value="<?php print $condo["recibe"]?>">
						                                                                    	
						                                                                </span>
						                                                            </div>
					                                                            </div> 
					                                                            
					                                                            <div class="col-sm-3">
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Fecha de Entrega</label>
						                                                                    <input id="condominio" name="url_esp" class="form-control" value="<?php print $condo["fechaEntrega"]?>">
						                                                                    	
						                                                                </span>
						                                                            </div>
					                                                            </div>
					                                                            <div class="col-sm-3">
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Tipo de Entrega</label>
						                                                                    <select name="url_eng" class="form-control" >
						                                                                    	
						                                                                    </select>
						                                                                </span>
						                                                            </div>
					                                                            </div>
					                                                            
					                                                            
			                                                                </div>
				                                                          
			                                                              
			                                                            
			                                                            <div class="row">
			                                                            	<div class="col-sm-12">
			                                                            		<div class="form-group">
			                                                            			<label>Dedicatoria</label>
			                                                            			<textarea name="dedicatoria"  class="form-control" rows="7"><?php print $condo["dedicatoria"]?></textarea>
			                                                            		</div>
			                                                            	</div>
			                                                            </div>
			                                                            
			                                                    </div>
			                                                   
		                                                    </div><!-- fin del primer tab id home -->
		                                                    
		                                                    <div id="img" class="tab-pane in">
		                                                    	
		                                                    	
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
	 $('#categoria').change(function(){
        	var id= $(this).val();
        	$.ajax({
						    url: "/acciones/sub.php",
						    type: "post",
						    dataType: "html",
						    data: {id:id},
						    
						})
						.done(function(data){
						    	$("#subcategoria").empty().append("<option>Seleccione Subcategoria</option>" + data); 
					});
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
