<?php
include("../includes/login.php");
$cl= 'SELECT * from usuarios_system where id_user_system='.$_GET["id"];
$cll= mysql_query($cl, $link);
$clll= mysql_fetch_array($cll);

$perfil= lista($link, "type_user", "order by nombre", '?_pagi_pg=');

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
    <title> Edici&oacute;n</title>

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
                           <a href="/usuarios">Consulta Usuarios</a>
                        </li>
                        <li>
                            Edici&oacute;n 
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
				
				                                           
				                                        </ul>          
				                                    <form role="form" id="editar"> 
                                                	<div class="tab-content">
                                                			<div id="home" class="tab-pane in active">
			                                                    <div id="registration-form">
			                                                        
			                                                           <div class="row">
			                                                           		<div class="col-sm-6">
					                                                            <div class="form-group">
					                                                            	<label>Nombre</label>
					                                                                <span class="input-icon icon-right">
					                                                                    <input type="hidden" name="seccion" placeholder="" id="userameInput" class="form-control" value="usuarios">
					                                                                    <input type="hidden" name="id_cliente" placeholder="" id="" class="form-control" value="<?php print $clll["id_user_system"]?>">
					                                                                    <input type="text" name="nombre" placeholder="Nombre" id="userameInput" class="form-control" value="<?php print $clll["nombre"]?>" >
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-6">
					                                                            <div class="form-group">
					                                                            	<label>Correo</label>
					                                                                <span class="input-icon icon-right">
					                                                                    <input type="text" name="correo" placeholder="Correo" id="emailInput" class="form-control" value="<?php print $clll["correo"]?>" >
					                                                                   
					                                                                </span>
					                                                            </div>
				                                                            </div>
			                                                            </div>
			                                                            <div class="row">
				                                                            <div class="col-sm-6">
					                                                            <div class="form-group">
					                                                            	<label>Tel&eacute;fono</label>
					                                                                <span class="input-icon icon-right">
					                                                                    <input type="text" placeholder="Tel&eacute;fono" name="telefono" id="" class="form-control" value="<?php print $clll["telefono"]?>" >
					                                                                   
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-6">
					                                                            <div class="form-group">
					                                                            	<label>Direcci&oacute;n</label>
					                                                                <span class="input-icon icon-right">
					                                                                    <input type="text" placeholder="Direcci&oacute;n" id="confirmPasswordInput" name="direccion" class="form-control" value="<?php print $clll["direccion"]?>">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
			                                                            </div>
			                                                            <div class="row">
			                                                            	<div class="col-sm-6">
					                                                            <div class="form-group">
					                                                            	<label>Usuario</label>
					                                                                <span class="input-icon icon-right">
					                                                                    <input type="text" placeholder="Usuario" id="confirmPasswordInput" name="usuario" class="form-control" value="<?php print $clll["usuario"]?>">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-6">
					                                                            <div class="form-group">
					                                                            	<label>Contrase&ntilde;a</label>
					                                                                <span class="input-icon icon-right">
					                                                                    <input type="text" placeholder="Contrase&ntilde;a" id="confirmPasswordInput" name="pass" class="form-control" value="<?php print $clll["pass"]?>">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                            
			                                                            </div>
			                                                          
			                                                            
			                                                            <div class="row">
				                                                            <div class="col-sm-6">
				                                                            	<label>Zona</label>
					                                                            <div class="form-group">
					                                                                	<select name="perfil" id="e1"  style="width: 100%">
					                                                                	<option value="0">Pefil</option>
					                                                                    <?php
					                                                                    	foreach ($perfil as $k=>$v){
					                                                                    		if ($clll["nivel_user"] == $v["id"]) {
					                                                                    			print '
					                                                                    				<option value="'.$v["id"].'" selected > '.$v["nombre"].' </option>
					                                                                    			';
					                                                                    		}else{
						                                                                    		print '
					                                                                    				<option value="'.$v["id"].'"  > '.$v["nombre"].' </option>
					                                                                    			';
					                                                                    		}
					                                                                    	}
					                                                                    ?>
					                                                                    </select>
					                                                            </div>
				                                                            </div>
				                                                            <div class="col-sm-6">
				                                                            	<div class="form-group">
					                                                            </div>
				                                                            </div>
			                                                            </div>
			                                                            
			                                                            
			                                                            <div class="row">
			                                                            	
			                                                            	<div class="col-sm-12">
			                                                            		<label>Observaciones</label>
			                                                            		<div class="form-group">
			                                                            			<textarea name="observaciones" placeholder="Observaciones" class="form-control" rows="7"><?php print $clll["observaciones"]?></textarea>
			                                                            		</div>
			                                                            	</div>
			                                                            </div>
			                                                            
			                                                            
			                                                          
			                                                            <div class="form-group">
			                                                                <div class="checkbox">
			                                                                    <label>
			                                                                    	<?php 
			                                                                    		if($clll["status"]=="on"){
			                                                                    			$st= "checked";
			                                                                    		}else{
			                                                                    			$st="";
			                                                                    		}
			                                                                    	?>
			                                                                        <input type="checkbox" class="colored-blue" name="status" value="on" <?php print $st; ?>>
			                                                                        <span class="text">Activo / Inactivo</span>
			                                                                    </label>
			                                                                </div> 
			                                                            </div>
			                                                            
			                                                        
			                                                    </div>
		                                                    </div><!-- fin del primer tab id home -->
		                                                    <div id="profile" class="tab-pane">
		                                                    	
		                                                    	<?php 
		                                                    	
		                                                    		$img= explode("-", mostrar_img($link, $clll["id_user_system"], "usuarios", "perfil"));
		                                                    		print '<img src="/images/usuarios_img/'.$img[0].'" width="256" height="256" />';
		                                                    	?>
		                                                    		
		                                                    	<style>
																	  #progress_bar {
																	    margin: 10px 0;
																	    padding: 3px;
																	    border: 1px solid #000;
																	    font-size: 14px;
																	    clear: both;
																	    opacity: 0;
																	    -moz-transition: opacity 1s linear;
																	    -o-transition: opacity 1s linear;
																	    -webkit-transition: opacity 1s linear;
																	  }
																	  #progress_bar.loading {
																	    opacity: 1.0;
																	  }
																	  #progress_bar .percent {
																	    background-color: #99ccff;
																	    height: auto;
																	    width: 0;
																	  }
																	  #file_in{
																	  	background: #fff none repeat scroll 0 0;
																	    border: 2px dashed #2dc3e8;
																	    border-radius: 0;
																	    height: 150px;
																	    width: 300px;
																	    position: relative;
																	    overflow: hidden;
																	    cursor: pointer;
																	  }
																	  #file_in img{
																	  	position: absolute;
																	  	width: 100%;
																	  	top: 0;
																	  	left: 0;
																	  	z-index: 2;
																	  }
																	  #file_in p{
																	  	color: #d3d3d3;
																	    font-size: 20px;
																	    left: 50%;
																	    margin-left: -46%;
																	    padding: 0 4%;
																	    position: absolute;
																	    text-align: center;
																	    top: 40%;
																	    width: 92%;
																	    z-index: 1;
																	  }
																	  #file_in p i{
																	  	font-size: 12px;
																	  	display: block;  
																	  }
																	  #file_in input{
																		 position: absolute;
																		 z-index: 1;
																	    height: 150px;
																	    width: 300px;
																	    cursor: pointer;
																	    z-index: 3;
																	  }
																	  .thumb{
																	  	width: 150px;
																	  	box-shadow: 0 0 3px rgba(0,0,0,.4);
																	  }
																	</style>
																	<div id="file_in">
																		<p>Arrastrar  o click para cambiar el logo <i>Medida recomendada 256px * 256px</i></p>
																		<input type="file" id="files" name="logo" style="opacity: 0; border: 1px solid #000;" />
																	</div>
																	<div id="progress_bar"><div class="percent">0%</div></div>
																	<output id="list"></output>
																	
																	<script>
																	  var reader;
																	  var progress = document.querySelector('.percent');
																	
																	  function abortRead() {
																	    reader.abort();
																	  }
																	
																	  function errorHandler(evt) {
																	    switch(evt.target.error.code) {
																	      case evt.target.error.NOT_FOUND_ERR:
																	        alert('File Not Found!');
																	        break;
																	      case evt.target.error.NOT_READABLE_ERR:
																	        alert('File is not readable');
																	        break;
																	      case evt.target.error.ABORT_ERR:
																	        break; // noop
																	      default:
																	        alert('An error occurred reading this file.');
																	    };
																	  }
																	
																	  function updateProgress(evt) {
																	    // evt is an ProgressEvent.
																	    if (evt.lengthComputable) {
																	      var percentLoaded = Math.round((evt.loaded / evt.total) * 100);
																	      // Increase the progress bar length.
																	      if (percentLoaded < 100) {
																	        progress.style.width = percentLoaded + '%';
																	        progress.textContent = percentLoaded + '%';
																	      }
																	    }
																	  }
																	
																	  function handleFileSelect(evt) {
																	    // Reset progress indicator on new file selection.
																	    progress.style.width = '0%';
																	    progress.textContent = '0%';
																	
																	    reader = new FileReader();
																	    reader.onerror = errorHandler;
																	    reader.onprogress = updateProgress;
																	    reader.onabort = function(e) {
																	      alert('File read cancelled');
																	    };
																	    reader.onloadstart = function(e) {
																	      document.getElementById('progress_bar').className = 'loading';
																	    };
																	    reader.onload = function(e) {
																	      // Ensure that the progress bar displays 100% at the end.
																	      progress.style.width = '100%';
																	      progress.textContent = '100%';
																	      setTimeout("document.getElementById('progress_bar').className='';", 2000);
																	    }
																	
																	    // Read in the image file as a binary string.
																	    reader.readAsBinaryString(evt.target.files[0]);
																	    var files = evt.target.files; // FileList object

																	    // Loop through the FileList and render image files as thumbnails.
																	    for (var i = 0, f; f = files[i]; i++) {
																	
																	      // Only process image files.
																	      if (!f.type.match('image.*')) {
																	        continue;
																	      }
																	
																	      var reader = new FileReader();
																	
																	      // Closure to capture the file information.
																	      reader.onload = (function(theFile) {
																	        return function(e) {
																	        	document.getElementById("list").innerHTML="";
																	          // Render thumbnail.
																	          var span = document.createElement('span');
																	          span.innerHTML = ['<img class="thumb" src="', e.target.result,
																	                            '" title="', escape(theFile.name), '"/>'].join('');
																	          document.getElementById('file_in').insertBefore(span, null);
																	        };
																	      })(f);
																	
																	      // Read in the image file as a data URL.
																	      reader.readAsDataURL(f);
																	    }
																																		  }
																	
																	  document.getElementById('files').addEventListener('change', handleFileSelect, false);
																	</script>
		                                                    
		                                                    </div><!-- fin del primer tab id home -->
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
	<!--Success Modal Templates-->
    <div id="modal-success"  style="display: none;" aria-hidden="true">
        <div >
            <div >

                <div class="modal-body">Edici&oacute;n completa!, Espere un momento</div>
                
            </div> <!-- / .modal-content -->
        </div> <!-- / .modal-dialog -->
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
    
	<script type="text/javascript">
	
	
        //--Jquery Select2--
        $(function() {
        	
        $("#e1, #ell, #de").select2();
	       
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

						    if(data==1){
						    	$("#carga").fadeOut();
						    	bootbox.dialog({
					                message: $("#modal-success").html(), 
					                title: "<i class='glyphicon glyphicon-check' style='color: ##53a93f; font-size: 20px;'></i> ",
					                className: "modal modal-message modal-success fade",
					            });
						    	window.location.reload(true);
						    	
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
				
				
	       
        });
    </script>
    
</body>
<!--  /Body -->
</html>
