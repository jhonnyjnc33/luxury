<?php
	include($_SERVER['DOCUMENT_ROOT']."/includes/login.php");
	$c= 'SELECT * FROM colaboradores where id_colaborador='.$_GET["id"]; 
	$cc= mysql_query($c, $link);
	$ccc= mysql_fetch_array($cc);
	$puesto= devuelve_campo_c("nombre", "puestos_asociados","id_puesto_asociado", $ccc["puesto"], $link ); 
	$cliente= devuelve_campo_c("nombre", "clientes","id_cliente", $ccc["cliente_id"], $link ); 
	$tipo= devuelve_campo_c("nombre_cliente", "tipo_cliente","id_tipo_cliente", $ccc["tipo_cliente"], $link );
	$modo= devuelve_campo_c("nombre_modo_cliente", "modo_cliente","id_modo_cliente", $ccc["modo_cliente"], $link );
	$categoria= devuelve_campo_c("nombre_categoria_cliente", "categoria_cliente","id_categoria_cliente", $ccc["categoria_cliente"], $link );
	$alertas= lista($link,"alertas","where colaborador_id=".$_GET["id"], "");
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
                            <a href="#">Pages</a>
                        </li>
                        <li class="active">Profile</li>
                    </ul>
                </div>
                <!-- /Page Breadcrumb -->
                <!-- Page Header -->
                <div class="page-header position-relative">
                    <div class="header-title">
                        <h1>
                            Perfil de Colaborador
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
                                    		$img = mostrar_img($link, $ccc["id_colaborador"], "colaborador", "perfil");
                                    		$i=explode("-", $img);
                                    		print '<img src="/images/colaboradores_img/'.$i[0].'" class="header-avatar" />';
                                    
                                    	?>
                                        
                                    </div>
                                    <div class="col-lg-5 col-md-8 col-sm-12 profile-info">
                                        <div class="header-fullname"><?php print $ccc["nombre"]?></div>
                                        <a href="/alta_colaborador/edicion.php?id=<?php print $ccc["id_colaborador"]?>" class="btn btn-palegreen btn-sm  btn-follow">
                                            <i class="fa fa-check"></i>
                                            Editar
                                        </a>
                                        <div class="header-information">
                                            <?php
                                               $nacimiento= fecha_nacimiento($ccc["fecha_nacimiento"]);
                                               
                                               $f_n= $nacimiento["dia"]." de ".$nacimiento["mes"]["texto"]." del ".$nacimiento["anio"];
                                               print nl2br($ccc["observaciones"])."<p><i><strong>Direcci&oacute;n: </strong>".$ccc["direccion"]."</i></p>";
                                               print '<p><strong>Correo: </strong> '.$ccc["correo"].'</p>';
                                               print '<p><strong>Fecha de nacimiento: </strong> '.$f_n.'</p>';
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 profile-stats">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 stats-col">
                                            	<div class="stats-title">Puesto</div>
                                                <div class="stats-value pink"><?php print $puesto?></div>
                                                
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 stats-col">
                                            	<div class="stats-title">Colaborador de</div>
                                                <div class="stats-value pink"><?php print $cliente; ?></div> 
                                                
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inlinestats-col pink">
                                                 Tel. : <?php print $ccc["telefono"]; ?>
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
                                                        <strong>EVENTOS (Alertas);</strong>
                                                    </a>
                                                </li>
                                                
                                            </ul>
                                            <div class="tab-content tabs-flat">
                                                
                                                <div id="timeline" class="tab-pane active">
                                                	 <ul class="timeline animated fadeInDown">
                                                	 	<?php
                                                	 		
                                                	 		$a= 0;
                                                	 		$fecha_actual= date("Y-m-d");
                                                	 		foreach ($alertas as $kkey=> $vvalue) {
                                                	 			$a++;
                                                	 			$c= $a%2;
                                                	 			if($c==1){
                                                	 				$clase= '';
                                                	 			}else{
                                                	 				$clase='class="timeline-inverted"';
                                                	 			}
                                                	 			$tipo= tipo_evento($vvalue["titulo"]);
                                                	 			$fff= fecha_nacimiento($vvalue["fecha"]);
                                                	 			$s = strtotime($vvalue["fecha"])-strtotime($fecha_actual);  
															    $d = intval($s/86400);  
															    $diferencia = $d;  
                                                	 			print '
                                                	 				<li '.$clase.'>
			                                                            <div class="timeline-datetime">
			                                                                <span class="timeline-time">
			                                                                   '.$fff["dia"].' de '.$fff["mes"]["texto"].' de '.$fff["anio"].'
			                                                               </span><span class="timeline-date">Faltan '.$diferencia.' dia(s)</span> 
			                                                            </div>
			                                                            <div class="timeline-badge blue">
			                                                                <i class="fa fa-tag"></i>
			                                                            </div>
			                                                            <div class="timeline-panel">
			                                                                <div class="timeline-header bordered-bottom bordered-blue">
			                                                                    <span class="timeline-title">
			                                                                       '.$tipo.'
			                                                                    </span>
			                                                                    <p class="timeline-datetime">
			                                                                        <small class="text-muted">
			                                                                            <i class="glyphicon glyphicon-time">
			                                                                            </i>
			                                                                            <span class="timeline-date">Today</span>
			                                                                            -
			                                                                            <span class="timeline-time">8:19</span>
			                                                                        </small>
			                                                                    </p>
			                                                                </div>
			                                                                <div class="timeline-body">
			                                                                    <p>'.$vvalue["observaciones"].'</p>
			                                                                </div>
			                                                            </div>
			                                                        </li>
			                                                	 			
			                                                	 	';
                                                	 		}
                                                	 	?>
                                                        
                                                        </ul>
                                                </div>
		                                    </div><!-- fin del tab content -->
		                                </div>
		                           </div>
		                      </div>
                                                 
								               
                            						
            </div>
            <!-- /Page Content -->
        </div>
        <!-- /Page Container -->
        <!-- Main Container -->

    </div>

    <!--Basic Scripts-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/slimscroll/jquery.slimscroll.min.js"></script>

    <!--Beyond Scripts-->
    <script src="assets/js/beyond.min.js"></script>

    
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
    <script>
        $(window).bind("load", function () {
            $("#e1, #ell, #de").select2();
            $('.date-picker').datepicker();
            $("#ratio_ocupacion").submit(function(){
            	var datos = $(this).serialize();
            	$.post(
            		"/acciones/ratio_ocupacion.php",
            		datos,
            		function(data){
            			succes:
            			$("#r").html(data);
            	});
            	return false;
            });
            $(".showForm, #close_form").click(function(){
	       		$("#form_alta").slideToggle();
	       		return false;
	       }); 
            $(".showFormC, #close_formC").click(function(){
	       		$("#form_altaC").slideToggle();
	       		return false;
	       }); 
	       
	       $("#alta").submit(function(){
			       $("#carga").fadeIn();
			       var id_cliente= $("#id_cliente").val();
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
						    	$("#tabla").empty().load("/acciones/recarga.php", {tabla:"colaboradores", order:"where cliente_id= " + id_cliente + " order by nombre"});
						    	$("#respuesta").empty().hide().append("<h3>Registro guardado</h3>").fadeIn();
						    	$("#alta").each (function() { this.reset(); });
						    }else{
						    	$("#respuesta").html("<h3>Error.Int&eacute;ntalo de nuevo</h3>").fadeIn();
						    	$("#carga").fadeOut();
						    }
						});
						return false;
	       });
	       
	       $("#altaC").submit(function(){
			       $("#cargaC").fadeIn();
			       var id_cliente= $("#id_clienteC").val();
			       var formData = new FormData(document.getElementById("altaC"));
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
						    $("#cargaC").fadeIn();
						    if(data==1){
						    	$("#cargaC").fadeOut();
						    	$("#respuestaC").html("<h3>Registro guardado. Actualizando tabla</h3>").fadeIn();
						    	$("#tablaC").empty().load("/acciones/recarga.php", {tabla:"centrosConsumo", order:"where cliente_id_centro= " + id_cliente + " order by nombre"});
						    	$("#respuestaC").empty().hide().append("<h3>Registro guardado</h3>").fadeIn();
						    	$("#altaC").each (function() { this.reset(); });
						    }else{
						    	$("#respuestaC").html("<h3>Error.Int&eacute;ntalo de nuevo</h3>").fadeIn();
						    	$("#cargaC").fadeOut();
						    }
						});
						return false;
	       });
	       
	       
	       $(document).on("click" , "#agregar_evento", function(){
					$(".evento").clone().appendTo("#alertas");
					return false;
				});
				
				$(".clean_foto").click(function () {
						
		            $("#filesC").remove();
		            $("#file_inC").append('<input type="file" id="filesC" name="logo" style="opacity: 0; border: 1px solid #000;" multiple />');
		            return false;
        });
        });
        
        
      
      /* para eliminar*/
      $(document).on("click",".eliminar", function(){
					var from= $(this).attr("from-data");
					var id= $(this).attr("id");
					switch(from){
						case "centro_consumo":
								
								var from_var= "centro";
								break;
						case "colaborador":
								
								var from_var= "colaborador";
								break;
					}
					$("#fila_" + from_var + "_" + id +" td").css("background", "#ffb7b7");
					$("#text_" + from_var + "_" + id).fadeIn();
					return false;
				});
				$(document).on ("click", ".eliminar_no",function(){
					var from= $(this).attr("from-data");
					switch(from){
						case "centro_consumo":
								
								var from_var= "centro";
								break;
						case "colaborador":
								
								var from_var= "colaborador";
								break;
					}
					var id= $(this).attr("id");
					$("#text_" + from_var+ "_" + id).fadeOut();
					$("#fila_" + from_var + "_" + id +" td").css("background", "none"); 
					return false;
				});
				
				$(document).on("click" , ".elim", function(){
					var id= $(this).attr("id");
					var tabla= $(this).attr("data-table");
					var campo= $(this).attr("data-dato");
					var from= $(this).attr("from-data");
					switch(from){
						case "centro_consumo":
									var from_var= "centro";
									break;
						case "colaborador":
									var from_var= "colaborador";
									break;
					}
					$.post(
						"/acciones/eliminar.php",
						{id:id, tabla:tabla, campo:campo},
						function(data){
							succes:
							if(data==1){
								$("#fila_" + from_var + "_"  + id ).fadeOut();
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
