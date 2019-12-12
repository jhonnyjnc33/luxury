<?php
include("../includes/login.php");
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
    <title> Alta de slider | Deleitate</title>
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

                            Alta de Slider

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

				                                            <!-- <li class="tab-red">

				                                                <a data-toggle="tab" href="#alertas">

				                                                    Eventos

				                                                </a>

				                                            </li>

				                                             -->

				                                           

				                                        </ul>          

				                                    <form role="form" id="alta" autocomplete="off"> 

                                                	<div class="tab-content">

                                                			<div id="home" class="tab-pane in active">

			                                                    <div id="registration-form">

			                                                           <div class="row">

			                                                           		<div class="col-sm-6">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
																						<label>Titulo 1 Esp</label>		
					                                                                    <input type="hidden" name="seccion" placeholder="" id="userameInput" class="form-control" value="slider">
					                                                                    <input type="text" name="nombre_esp" placeholder="Nombre esp" id="userameInput" class="form-control">
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-6">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
																						<label>Titulo 1 Eng</label>
					                                                                    <input type="text" name="nombre_eng" placeholder="Nombre eng" id="emailInput" class="form-control">
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-6">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
																						<label>Titulo 2 Esp</label>		
					                                                                    <input type="text" name="nombre2_esp" placeholder="Nombre 2 esp" id="userameInput" class="form-control">
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-6">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
																						<label>Titulo 2 Eng</label>
					                                                                    <input type="text" name="nombre2_eng" placeholder="Nombre 2 eng" id="emailInput" class="form-control">
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

		                                                    <div id="profile" class="tab-pane">

		                                                    		<h2>Imagen Banner</h2>

																	<div id="file_in">

																		<p>Arrastrar  o click para subir foto de perfil <i>Medida recomendada 2000px * 540px</i></p>

																		<input type="file" id="files" name="banner" class="form-control"  />

																	</div>
																	<hr>

		                                                    		<!-- <h2>Icono</h2>

																	<div id="file_in">

																		<p>Arrastrar  o click para subir foto de perfil <i>Medida recomendada 256px * 256px</i></p>

																		<input type="file" id="files" name="icono" class="form-control"  />

																	</div>
																	<hr> -->
																
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

						                                                                    <select name="Repeticion_evento[]"  style="width: 100%">

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

    <!--Page Related Scripts-->

    <script src="/assets/js/inputmask/jasny-bootstrap.min.js"></script>

	<script>

        //--Jquery Select2--

        $(function() {
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
						    	$("#respuesta").html("<h3>Registro guardado. Actualizando tabla</h3>").fadeIn();
						    	$("#tabla").empty().load("/acciones/recarga.php", {tabla:"zonas", order:"order by nombre"});
						    	$("#respuesta").empty().hide().append("<h3>Registro guardado</h3>").fadeIn();
						    	$("#alta").each (function() { this.reset(); });
						    }else{
						    	$("#respuesta").html("<h3>Error.Int&eacute;ntalo de nuevo</h3>").fadeIn();
						    	$("#carga").fadeOut();
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

				$(document).on("click" , "#agregar_evento", function(){

					

					$(".evento").clone().appendTo("#alertas");

					

					return false;

				});

	       	$("#e1, #ell, #de").select2();

        });

    </script>

    

</body>

<!--  /Body -->

</html>

