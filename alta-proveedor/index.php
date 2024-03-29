<?php
include("../includes/login.php");
$cat= lista($link, "proveedores", "order by nombre_comercial asc", "");
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
    <title>Alta proveedor</title>

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
                            Alta de Proveedor
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
				
				                                          
				                                           <!--  <li class="tab-red">
				                                                <a data-toggle="tab" href="#profile">
				                                                    Imagenes
				                                                </a>
				                                            </li> 
				                                          <li class="tab-red">
				                                                <a data-toggle="tab" href="#amenidades">
				                                                    Amenidades
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
					                                                                    <input type="hidden" name="seccion" placeholder="" id="userameInput" class="form-control" value="proveedor">
					                                                                    <input type="text" name="clave"  class="form-control">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Nombre Comercial</label>
					                                                                    <input type="text" name="nombre"  class="form-control">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
			                                                           		<div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Contacto</label>
					                                                                    <input type="text" name="contacto"  class="form-control">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
			                                                           		<div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Tel&eacute;fono</label>
					                                                                    <input type="text" name="telefono"  class="form-control">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
			                                                           		<div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Correo Electr&oacute;nico</label>
					                                                                    <input type="text" name="correo"  class="form-control "  >
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
			                                                           		<div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Nombre Facturaci&oacute;n</label>
					                                                                    <input type="text" name="facturacion"  class="form-control "  >
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
			                                                           		<div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>RFC</label>
					                                                                    <input type="text" name="rfc"  class="form-control "  >
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
			                                                           		<div class="col-sm-3">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                	<label>Domicilio</label>
					                                                                    <input type="text" name="domicilio"  class="form-control "  >
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                             <div class="col-sm-3">
								                                                <div class="form-group">
								                                                    <span class="input-icon icon-right">
								                                                    	<label>Tipo de Cambio</label>
								                                                        <input type="text" name="tipo_cambio"  value="" class="form-control ">
								                                                        
								                                                    </span>
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
        	
        
        $('.date-picker').datepicker();
        
        
	       $("#alta").submit(function(){
				       	if($("#nombre_condo").val()==""){
				       		bootbox.alert("<center> <img src='http://admin.fibmex.com/images/logo.png' width='200' /> </center><p style='font-size: 16px; text-align: center; margin: 20px 0 0 0; color: #d73d32; font-weight: bold; '>Error.El campo nombre es obligatorio</p>");
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
						    	 bootbox.alert("<center> <img src='http://admin.fibmex.com/images/logo.png' width='200' /> </center><p style='font-size: 16px; text-align: center; margin: 20px 0 0 0; color: #53a93f; font-weight: bold; '>Registro Guardado</p>");
						    	$("#respuesta").empty().hide().append("<h3>Registro guardado</h3>").fadeIn();
						    	$("#alta").each (function() { this.reset(); });
						    	
						    }else{
						    							    	bootbox.alert("<center> <img src='http://admin.fibmex.com/images/logo.png' width='200' /> </center><p style='font-size: 16px; text-align: center; margin: 20px 0 0 0; color: #d73d32; font-weight: bold; '>Error.Intentelo de nuevo</p>");
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
	       
        });
    </script>
    
</body>
<!--  /Body -->
</html>
