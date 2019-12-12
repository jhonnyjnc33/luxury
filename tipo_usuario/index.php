<?php
include("../includes/login.php");
$users= all($link, "type_user", "order by nombre");
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
    <title>Perfil Usuarios</title> 

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
	                        	 		 <a href="/altas_perfil" >Agregar Perfil</a>
	                        	 	</div>
			              </div> 
                             
                             <br>
                            <div class="well with-header with-footer"> 
                                <div class="table-scrollable">
                                    <table class="table table-striped table-bordered table-hover" id="tabla">
                                    	<thead>                                         
										<th>Nombre</th>

										<th>Agregar</th> 
										<th>Editar</th> 
										<th>Eliminar</th> 
										<th>Estatus</th> 
										<th>Acciones</th>
									</thead>
                                      <?php
                                      if (!empty($users)){
                                      	foreach ($users as $v) {
                                      		if($v["add"]=="on"){
                                      			$add= '<a href="javascript:void(0);" class="btn btn-success btn-xs icon-only white"> <i class="fa fa-check "></i></a>';
                                      		}else{
                                      			$add='<a href="javascript:void(0);" class="btn btn-danger btn-xs icon-only white"><i class="fa fa-times"></i> </a>';
                                      		}
                                      		if($v["delete"]=="on"){
                                      			$del= '<a href="javascript:void(0);" class="btn btn-success btn-xs icon-only white"> <i class="fa fa-check "></i></a>';
                                      		}else{
                                      			$del='<a href="javascript:void(0);" class="btn btn-danger btn-xs icon-only white"><i class="fa fa-times"></i> </a>';
                                      		}
                                      		if($v["edit"]=="on"){
                                      			$edit= '<a href="javascript:void(0);" class="btn btn-success btn-xs icon-only white"> <i class="fa fa-check "></i></a>';
                                      		}else{
                                      			$edit='<a href="javascript:void(0);" class="btn btn-danger btn-xs icon-only white"><i class="fa fa-times"></i> </a>';
                                      		}
                                      		if($v["status"]=="on"){
                                      			$status= '<a href="javascript:void(0);" class="btn btn-default btn-xs shiny icon-only success"><i class="fa fa-check "></i></a>';
                                      		}else{
                                      			$status='<a href="javascript:void(0);" class="btn btn-default btn-xs shiny icon-only danger"><i class="fa fa-check "></i></a>';  
                                      		} 
                                      		print '
                                      			<tr id="fila_'.$v["id_type_user"].'">
                                      				<td>'.$v["nombre"].'</td>
                                      				<td>'.$add.'</td>
                                      				<td>'.$edit.'</td>
                                      				<td>'.$del.'</td>
                                      				<td>'.$status.'</td>
                                      				<td>
		                                                    <a href="/altas_perfil/edicion.php?id='.$v["id_type_user"].'" class="btn btn-default  btn-circle btn-xs"><i class="fa fa-edit"></i></a>
		                                                    <a href="#" class="btn btn-default  btn-circle btn-xs eliminar"  id="'.$v["id_type_user"].'"><i class="fa fa-close"></i></a>
		                                                    <p class="texto_eliminar" id="text_'.$v["id_type_user"].'">Eliminar? <a href="#" id="'.$v["id_type_user"].'" class="elim" data-table="productos" data-dato="id_producto">si</a> <a href="#" class="eliminar_no" id="'.$v["id_type_user"].'">no</a></p>
		                                                </td>
                                      			</tr>
                                      		';
                                      		
                                      	}
                                      	}else{
                                      		print 'vacio';
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
						{id:id, tabla:"type_user", campo:"id_type_user"},
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
