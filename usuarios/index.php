<?php
include("../includes/login.php");
$users= all($link, "usuarios_system", "order by nombre", '?_pagi_pg=')

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
    <title>Usuarios</title> 

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
                            Usuarios
                        </li>

                    </ul>
                </div>
                <!-- /Page Breadcrumb -->
                
                <!-- Page Body -->
                <div class="page-body">
                    <div class="well with-header">
	                    <div class="row">
	                    		<div class="header bordered-palegreen">
	                        	 		 <a href="/altas_usuarios" >Agregar</a>
	                        	 	</div>
			              </div> 
                             
                             <br>
                            <div class="well with-header with-footer"> 
                                <div class="table-scrollable">
                                    <table class="table table-striped table-bordered table-hover" id="tabla">
                                    	<thead>                                         
										<th>Nombre</th>
										<th>Usuario</th> 
										<th>Contrase&ntilde;a</th> 
										<th>Correo</th> 
										<th>Perfil</th> 
										<th>Acciones</th>
									</thead>
                                      <?php
                                      	foreach ($users as $x=>$v) {
                                      		$perfil= devuelve_campo_c("nombre", "type_user", "id_type_user", $v["perfil"], $link);
                                      		print '
                                      			<tr id="fila_'.$v["id"].'">
                                      				<td>'.$v["nombre"].'</td>
                                      				<td>'.$v["usuario"].'</td>
                                      				<td>'.$v["pass"].'</td>
                                      				<td>'.$v["correo"].'</td>
                                      				<td>'.$perfil.'</td>
                                      				<td>
		                                                    <a href="/altas_usuarios/edicion.php?id='.$v["id"].'" class="   btn-xs"><i class="fa fa-edit"></i></a>
		                                                    <a href="#" class=" btn-xs eliminar"  id="'.$v["id"].'"><i class="fa fa-close"></i></a>
		                                                    <p class="texto_eliminar" id="text_'.$v["id"].'">Eliminar? <a href="#" id="'.$v["id"].'" class="elim" data-table="productos" data-dato="id_producto">si</a> <a href="#" class="eliminar_no" id="'.$v["id"].'">no</a></p>
		                                                </td>
                                      			</tr>
                                      		';
                                      		
                                      	}
                                      ?>
                                    </table> 
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

    <!--Basic Scripts-->
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/slimscroll/jquery.slimscroll.min.js"></script>

    <!--Beyond Scripts-->
    <script src="/assets/js/beyond.min.js"></script>
    <!--Jquery Select2-->
    <script src="/assets/js/select2/select2.js"></script>
	<script>
        //--Jquery Select2--
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
						{id:id, tabla:"usuarios_system", campo:"id_user_system"},
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
    </script>
    
</body>
<!--  /Body -->
</html>
