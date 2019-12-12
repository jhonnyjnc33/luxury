<?php
include("../includes/login.php");
$zon= lista($link, "tipo_cliente", 'order by nombre_cliente', "");
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
    <title>Tipos</title>

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
                            Tipos
                        </li>

                    </ul>
                </div>
                <!-- /Page Breadcrumb -->
                
                <!-- Page Body -->
                <div class="page-body">
                    <div class="well with-header">
                    		

                            	<a href="#" class="btn btn-default purple margin showForm" id="bootbox-options" ><i class="fa fa-plus"></i> Agregar</a>
                            				<div id="form_alta">
								 				<?php 
								                	print alta("zonas", $link);
								                ?>
								               
                            				</div>
                            	<div class="table-scrollable">
                                 <table class="table table-striped table-bordered table-hover" id="tabla">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width:450px !important">
                                                    Nombre
                                                </th>
                                               
                                                <th scope="col">
                                                    status
                                                </th>
                                                <th scope="col">
                                                    Acciones
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                	
                                	<tbody>
                                		<?php 
	                                		foreach ($zon as $k=>$v){
	                                			if($v["status"]== "on"){
	                                				$status='<a class="btn btn-labeled btn-palegreen" href="javascript:void(0);">
						                                        <i class="btn-label glyphicon glyphicon-ok"></i>Activo
						                                    </a>';
	                                			}else{
	                                				$status= '<a class="btn btn-labeled btn-darkorange" href="javascript:void(0);">
						                                        <i class="btn-label glyphicon glyphicon-remove"></i>Desactivo
						                                    </a>';
	                                			}
	                                			print '
	                                				<tr id="fila_'.$v["id"].'">
		                                                <td>
		                                                   '.$v["nombre"].'
		                                                </td>
		                                               
		                                                <td>
		                                                    '.$status.'
		                                                </td>
		                                                <td>
		                                                    <a href="#" class="btn btn-default  btn-circle btn-xs"><i class="fa fa-edit"></i></a>
		                                                    <a href="#" class="btn btn-default  btn-circle btn-xs eliminar"  id="'.$v["id"].'"><i class="fa fa-close"></i></a>
		                                                    <p class="texto_eliminar" id="text_'.$v["id"].'">Eliminar? <a href="#" id="'.$v["id"].'" class="elim" data-table="productos" data-dato="id_producto">si</a> <a href="#" class="eliminar_no" id="'.$v["id"].'">no</a></p>
		                                                </td>
	                                			';
	                                		}
	                                	?>
                                	</tbody>
                                	</table>
                                    
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
	<script>
        //--Jquery Select2--
        $(function() {
        $("#e1, #ell, #de").select2();
	       
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
						    	$("#respuesta").append("<h3>Registro guardado. Actualizando tabla</h3>").fadeIn();
						    	$("#tabla").empty().load("/acciones/recarga.php", {tabla:"zonas", order:"order by nombre"});
						    	$("#respuesta").empty().hide().append("<h3>Tabla actualizada</h3>").fadeIn();
						    	
						    }else{
						    	$("#respuesta").append("<h3>Error.Inténtalo de nuevo</h3>").fadeIn();
						    }
						    
						});
						
						return false;
	       	
	       });
	       $(".showForm, #close_form").click(function(){
	       		$("#form_alta").slideToggle();
	       }); 
	       $(document).on("click",".eliminar", function(){
					
					var id= $(this).attr("id");
					$("#fila_" + id +" td").css("background", "#ffb7b7");
					$("#text_" + id).fadeIn();
					return false;
				});
				$(".eliminar_no").click(function(){
					var id= $(this).attr("id");
					$("#text_" + id).fadeOut();
					$("#fila_" + id +" td").css("background", "none"); 
					return false;
				});
				
				$(document).on("click" , ".elim", function(){
					var id= $(this).attr("id");
					$.post(
						"/acciones/eliminar.php",
						{id:id, tabla:"zonas", campo:"id_zona"},
						function(data){
							succes:
							if(data==1){
								$("#fila_" + id ).fadeOut();
							}else{
								alert("Error.Intentalo de nuevo");
							}
					});
					return false;
				});
	       
        });
    </script>
    
</body>
<!--  /Body -->
</html>
