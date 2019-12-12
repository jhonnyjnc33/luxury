<?php
include("../includes/login.php");
$c= 'SELECT * FROM categorias where id_categoria='.$_GET["id"]; 
$cc= mysql_query($c, $link);
$ccc= mysql_fetch_array($cc);

if($ccc["status"]== "on"){
	$status= 'checked';
}else{
	$status='';
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

    <title> Edicion de Categorias</title>



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
                            Edici&oacute;n de categorias
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
				                                           <!-- <li class="tab-red">
				                                                <a data-toggle="tab" href="#profile">

				                                                    Imagenes

				                                                </a>

				                                            </li>

				                                            <li class="tab-red">

				                                                <a data-toggle="tab" href="#alertas">

				                                                    Eventos

				                                                </a>

				                                            </li>

				-->

				                                           

				                                        </ul>          

				                                    <form role="form" id="editar"> 

                                                	<div class="tab-content">

                                                			<div id="home" class="tab-pane in active">

			                                                    <div id="registration-form">

			                                                           <div class="row">

			                                                           		<div class="col-sm-6">

					                                                            <div class="form-group">

					                                                                <span class="input-icon icon-right">
																						<label>Nombre esp</label>
					                                                                    <input type="hidden" name="seccion" placeholder="" id="userameInput" class="form-control" value="categorias">
																						<input type="hidden" name="id" placeholder="" id="" class="form-control" value="<?php print $ccc["id_categoria"]?>">
					                                                                    <input type="text" name="nombre_esp"  id="userameInput" class="form-control" value="<?php print $ccc["nombre_esp"];?>" >

					                                                                    

					                                                                </span>

					                                                            </div>

				                                                            </div>

				                                                            <div class="col-sm-6">

					                                                            <div class="form-group">

					                                                                <span class="input-icon icon-right">
																						<label>Nombre Eng</label>
					                                                                    <input type="text" name="nombre_eng" id="emailInput" class="form-control" value="<?php print $ccc["nombre_eng"];?>">

					                                                                   

					                                                                </span>

					                                                            </div>

				                                                            </div>

			                                                            </div>

			                                                          <div class="row">
			                                                            <h2 class="col-sm-12" style="border-top: 1px solid #ccc; margin: 10px 0; padding-top: 10px;">Posicionamiento Web</h2>
					                                                            <div class="col-sm-12">
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Tag Title esp</label>
						                                                                    <textarea name="tag_title_esp" placeholder="" class="form-control" rows="7"><?php print $ccc["tag_title_esp"];?></textarea>
						                                                                    	
						                                                                </span>
						                                                            </div>
					                                                            </div>
				                                                          </div>	 
			                                                            <div class="row">
			                                                            	<div class="col-sm-12">
			                                                            		<div class="form-group">
			                                                            			<label>Tag Description esp</label>
			                                                            			<textarea name="tag_description_esp" placeholder="" class="form-control" rows="7"><?php print $ccc["tag_description_esp"];?></textarea>
			                                                            		</div>
			                                                            	</div>
			                                                            	<div class="col-sm-12">
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Url esp</label>
						                                                                    <input id="condominio" name="url_esp" class="form-control" value="<?php print $ccc["url_esp"];?>">
						                                                                    <i style="font-size:11px">La url debe contener palabras clave y estar separas por gu&iacute;ion medio, Ejmplo: compra-casa-cancun</i>	
						                                                                </span>
						                                                            </div>
					                                                            </div>
			                                                            </div>
			                                                            <div class="row">
					                                                            <div class="col-sm-12">
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Tag Title eng</label>
						                                                                    <textarea name="tag_title_eng" placeholder="" class="form-control" rows="7"><?php print $ccc["tag_title_eng"];?></textarea>
						                                                                    	
						                                                                </span>
						                                                            </div>
					                                                            </div>
				                                                          </div>	 
			                                                            <div class="row">
			                                                            	<div class="col-sm-12">
			                                                            		<div class="form-group">
			                                                            			<label>Tag Description eng</label>
			                                                            			<textarea name="tag_description_eng" placeholder="" class="form-control" rows="7"><?php print $ccc["tag_title_eng"];?></textarea>
			                                                            		</div>
			                                                            	</div>
			                                                            	<div class="col-sm-12">
						                                                            <div class="form-group">
						                                                                <span class="input-icon icon-right">
						                                                                	<label>Url eng</label>
						                                                                    <input id="condominio" name="url_eng" class="form-control" value="<?php print $ccc["url_eng"];?>">
						                                                                    <i style="font-size:11px">La url debe contener palabras clave y estar separas por gu&iacute;ion medio, Ejmplo: compra-casa-cancun</i>	
						                                                                </span>
						                                                            </div>
					                                                            </div>
			                                                            </div>

			                                                            <div class="form-group">

			                                                                <div class="checkbox">

			                                                                    <label>

			                                                                        <input type="checkbox" class="colored-blue" name="status" value="on" <?php print $status;?>>

			                                                                        <span class="text">Activo / Inactivo</span>

			                                                                    </label>

			                                                                </div>

			                                                            </div>

			                                                            

			                                                        

			                                                    </div>

		                                                    </div><!-- fin del primer tab id home -->

		                                                    <div id="profile" class="tab-pane">
		                                                    	<h2>Imagen Banner</h2>
																<?php
																	$img = mostrar_img($link, $ccc["id_categoria"], "categoria", "banner");
																	foreach($img as $i){
																		$img= $i["imagen"];
																	}
						                                    		print '<img src="/images/categoria_img/'.$img.'" class="header-avatar" width="100" style="margin-bottom: 10px;"/>';
																						?>
		                                                    		

																
																		<p><i>Medida recomendada 1900 * 265px</i></p>

																		<input type="file" id="files" name="banner" class="form-control" />

																	<hr>

		                                                    	<h2>Imagen Carrusel</h2>
																<?php
																	$img2 = mostrar_img($link, $ccc["id_categoria"], "categoria", "icono");
																	
																	foreach($img2 as $i2){
																		$img2= $i2["imagen"];
																	}
						                                    		print '<img src="/images/categoria_img/'.$img2.'" class="header-avatar" width="100" style="margin-bottom: 10px;"/>';
																						?>
		                                                    		

																
																		<p><i>Medida recomendada 256px * 256px</i></p>

																		<input type="file" id="files" name="logo" class="form-control" />

																	<hr>

		                                                    	<h2>Icono</h2>
																<?php
																	$img = mostrar_img($link, $ccc["id_categoria"], "categoria", "iconito");
																	foreach($img as $i){
																		$imagen= $i["imagen"];
																	}
						                                    		print '<img src="/images/categoria_img/'.$imagen.'" class="header-avatar" width="100" style="margin-bottom: 10px;"/>';
																						?>
																		<p>Arrastrar  o click para subir foto de perfil <i>Medida recomendada 128px * 128px</i></p>

																		<input type="file" id="files" name="icono" class="form-control" />

																	<hr>

		                                                    </div><!-- fin del  tab  imagenes -->

		                                                    <div id="alertas" class="tab-pane">

		                                                    		<a href="#" id="agregar_evento">Agregar Evento</a>
																	<?php
																		foreach ($alertas_list as $a=>$aa) {
																			switch ($aa["tipo_evento"]) {
																				case 1:
																						$tipo_evento=	'<option value="0">Tipo de evento</option>
									                                                                			<option value="1" selected>Visita Programada</option>
									                                                                			<option value="2">Cumplea&ntilde;os</option>
									                                                                			<option value="3" >Aniversario</option>
									                                                                			<option value="4">Otro</option>';
																					break;
																				case 2:
																						$tipo_evento=	'<option value="0">Tipo de evento</option>
									                                                                			<option value="1">Visita Programada</option>
									                                                                			<option value="2" selected>Cumplea&ntilde;os</option>
									                                                                			<option value="3" >Aniversario</option>
									                                                                			<option value="4">Otro</option>';
																					break;
																				case 3:
																						$tipo_evento=	'<option value="0">Tipo de evento</option>
									                                                                			<option value="1">Visita Programada</option>
									                                                                			<option value="2">Cumplea&ntilde;os</option>
									                                                                			<option value="3" selected>Aniversario</option>
									                                                                			<option value="4">Otro</option>';
																					break;
																				case 4:
																						$tipo_evento=	'<option value="0">Tipo de evento</option>
									                                                                			<option value="1">Visita Programada</option>
									                                                                			<option value="2">Cumplea&ntilde;os</option>
									                                                                			<option value="3" >Aniversario</option>
									                                                                			<option value="4" selected>Otro</option>';
																					break;
																			
																				default:
																					$tipo_evento=	'<option value="0">Tipo de evento</option>
									                                                                			<option value="1">Visita Programada</option>
									                                                                			<option value="2">Cumplea&ntilde;os</option>
									                                                                			<option value="3" >Aniversario</option>
									                                                                			<option value="4">Otro</option>';
																					break;
																			}
																			
																			switch ($aa["repeticion"]) {
																				case 1:
																						$repeticion=	'
																								<option value="0">Repeticion evento</option>
									                                                                			<option value="1" selected>Semanal</option>
									                                                                			<option value="2">15 d&iacute;as</option>
									                                                                			<option value="3">Mensual</option>
									                                                                			<option value="4">Anual</option>
																						';
																					break;
																			
																				case 2:
																						$repeticion=	'
																								<option value="0">Repeticion evento</option>
									                                                                			<option value="1" >Semanal</option>
									                                                                			<option value="2" selected>15 d&iacute;as</option>
									                                                                			<option value="3">Mensual</option>
									                                                                			<option value="4">Anual</option>
																						';
																					break;
																			
																				case 3:
																						$repeticion=	'
																								<option value="0">Repeticion evento</option>
									                                                                			<option value="1" >Semanal</option>
									                                                                			<option value="2">15 d&iacute;as</option>
									                                                                			<option value="3" selected>Mensual</option>
									                                                                			<option value="4">Anual</option>
																						';
																					break;
																			
																				case 4:
																						$repeticion=	'
																								<option value="0">Repeticion evento</option>
									                                                                			<option value="1" >Semanal</option>
									                                                                			<option value="2">15 d&iacute;as</option>
									                                                                			<option value="3">Mensual</option>
									                                                                			<option value="4" selected>Anual</option>
																						';
																					break;
																			
																				default:
																					$repeticion=	'
																								<option value="0">Repeticion evento</option>
									                                                                			<option value="1">Semanal</option>
									                                                                			<option value="2">15 d&iacute;as</option>
									                                                                			<option value="3">Mensual</option>
									                                                                			<option value="4">Anual</option>
																						';
																					break;
																			}
																			print '
																					<div class="evento">
							                                                    		<div class="row">
								                                                           		
									                                                            <div class="col-sm-3">
										                                                            <div class="form-group">
										                                                                <span class="input-icon icon-right">
										                                                                    <input type="text" name="fecha_evento[]" data-mask="9999/99/99" class="form-control" placeholder="Fecha del Evento YYYY/MM/DD" value="'.$aa["fecha"].'">
										                                                                </span>
										                                                            </div>
									                                                            </div>
									                                                            <div class="col-sm-3">
										                                                            <div class="form-group">
										                                                                <span class="input-icon icon-right">
										                                                                    <select name="tipo_evento[]"  style="width: 100%">
									                                                                			'.$tipo_evento.'
									                                                                		</select>
										                                                                </span>
										                                                            </div>
									                                                            </div>
									                                                            <div class="col-sm-3">
										                                                            <div class="form-group">
										                                                                <span class="input-icon icon-right">
										                                                                    <select name="repeticion_evento[]"  style="width: 100%">
									                                                                			'.$repeticion.'
									                                                                		</select>
										                                                                </span>
										                                                            </div>
									                                                            </div>
								                                                            </div>
							                                                    		<div class="row">
								                                                           		<div class="col-sm-12">
										                                                            <div class="form-group">
										                                                                <span class="input-icon icon-right">
										                                                                    <textarea name="observaciones_evento[]" placeholder="Observaciones" id="" class="form-control" rows="6">'.$aa["observaciones"].'</textarea>
										                                                                </span>
										                                                            </div>
									                                                            </div>
								                                                        </div>
				
							                                                        </div>
																			';
																		}
																	?>
		                                                    		

		                                                    

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

	       $("#editar").submit(function(){
			       	$("#carga").fadeIn();
			       var formData = new FormData(document.getElementById("editar"));
					$.ajax({
						    url: "/acciones/edit.php",
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
						    	bootbox.alert("<center> <img src='/images/logo.png' width='200' /> </center><p style='font-size: 16px; text-align: center; margin: 20px 0 0 0; color: #53a93f; font-weight: bold; '>Registro Guardado</p>");
					    	
						    }else{
						    	
						    	$("#carga").fadeOut();
						    	alert("Error.Intentelo de nuevo");
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
					$("#alertas").append('<div class="evento"><div class="row"></div></div><div class="col-sm-3"><div class="form-group"><span class="input-icon icon-right"><input type="text"  placeholder="Fecha del Evento YYYY/MM/DD" class="form-control" data-mask="9999/99/99" name="fecha_evento[]"></span></div></div><div class="col-sm-3"><div class="form-group"><span class="input-icon icon-right"><select style="width: 100%" name="tipo_evento[]"><option value="0">Tipo de evento</option><option value="1">Visita Programada</option><option  value="2">Cumplea&ntilde;os</option><option value="3">Aniversario</option><option value="4">Otro</option></select></span></div></div><div class="col-sm-3"><div class="form-group"><span class="input-icon icon-right"><select style="width: 100%" name="repeticion_evento[]"><option value="0">Repeticion evento</option><option value="1">Semanal</option><option value="2">15 d&iacute;as</option><option  value="3">Mensual</option><option value="4">Anual</option></select></span></div></div></div><div class="row"><div class="col-sm-12"><div class="form-group"><span class="input-icon icon-right"><textarea rows="6" class="form-control" id="" placeholder="Observaciones" name="observaciones_evento[]"></textarea></span></div></div></div></div>');
					return false;
				});
	       	$("#e1, #ell, #de").select2();

        });

    </script>

    

</body>

<!--  /Body -->

</html>

