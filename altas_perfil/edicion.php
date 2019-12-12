<?php
include("../includes/login.php");
$menu= all($link, "menu", "where status='on' order by nombre");
$q= 'SELECT * FROM type_user where id_type_user='.$_GET["id"];
$qq= mysql_query($q, $link);
$qqq= mysql_fetch_array($qq);
if($qqq["editar"]=="on"){
	$edit= 'checked';
}else{
	$edit= '';
}
if($qqq["eliminar"]=="on"){
	$eli= 'checked';
}else{
	$eli= '';
}
if($qqq["agregar"]=="on"){
	$add= 'checked';
}else{
	$add= '';
}
if($qqq["status"]== "on"){
	$status= 'checked';
}else{
	$status='';
}
$menuUnopermiso= 'SELECT * FROM r_menu_user where user_type_id='.$_GET["id"].' AND nivel=1';

$menuUnopermiso_q= mysql_query($menuUnopermiso, $link);
$mm= mysql_fetch_array($menuUnopermiso_q);

do{
	$mmenu[]=$mm["menu_id"];
}while($mm= mysql_fetch_array($menuUnopermiso_q));

$menuUnopermiso2= 'SELECT * FROM r_menu_user where user_type_id='.$_GET["id"].' AND nivel=2';
$menuUnopermiso_q2= mysql_query($menuUnopermiso2, $link);
$mm2= mysql_fetch_array($menuUnopermiso_q2);

do{
	$mmenu2[]=$mm2["menu_id"];
}while($mm2= mysql_fetch_array($menuUnopermiso_q2));

$menuUnopermiso3= 'SELECT * FROM r_menu_user where user_type_id='.$_GET["id"].' AND nivel=3';
$menuUnopermiso_q3= mysql_query($menuUnopermiso3, $link);
$mm3= mysql_fetch_array($menuUnopermiso_q3);

do{
	$mmenu3[]=$mm3["menu_id"];
}while($mm3= mysql_fetch_array($menuUnopermiso_q3));



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
    <title> Alta de Perfil</title>

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
                           <a href="/tipo_usuario">Perfiles</a>
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
				                                           
				                                        </ul>          
				                                    <form role="form" id="alta"> 
                                                	<div class="tab-content">
                                                			<div id="home" class="tab-pane in active">
			                                                    <div id="registration-form">
			                                                        
			                                                           <div class="row">
			                                                           		<div class="col-sm-12">
					                                                            <div class="form-group">
					                                                                <span class="input-icon icon-right">
					                                                                    <input type="hidden" name="seccion" placeholder="" id="userameInput" class="form-control" value="perfil">
					                                                                    <input type="hidden" name="id" placeholder="" id="userameInput" class="form-control" value="<?php print $qqq["id_type_user"]?>">
					                                                                    <input type="text" name="nombre" placeholder="Nombre" id="userameInput" class="form-control" value="<?php print $qqq["nombre"]?>">
					                                                                    
					                                                                </span>
					                                                            </div>
				                                                            </div>
				                                                           
			                                                            </div>
			                                                           <div class="row">
			                                                           		<div class="form-group col-sm-3">
			                                                           			<div class="checkbox ">
						                                                                    	<label>
						                                                                    	<input type="checkbox" name="agregar" class="colored-blue" value="on" <?php print $add?> >
						                                                                    	<span class="text">
						                                                                    		Agregar
						                                                                    	</span>
						                                                                    	</label>
						                                                                     </div>
			                                                           		</div>
			                                                           		<div class="form-group col-sm-3">
			                                                           			<div class="checkbox ">
						                                                                    	<label>
						                                                                    	<input type="checkbox" name="editar" class="colored-blue" value="on" <?php print $edit?> >
						                                                                    	<span class="text">
						                                                                    		Editar
						                                                                    	</span>
						                                                                    	</label>
						                                                                     </div>
			                                                           		</div>
			                                                           		<div class="form-group col-sm-3">
			                                                           			<div class="checkbox ">
						                                                                    	<label>
						                                                                    	<input type="checkbox" name="eliminar" class="colored-blue" value="on" <?php print $eli?> >
						                                                                    	<span class="text">
						                                                                    		Eliminar
						                                                                    	</span>
						                                                                    	</label>
						                                                                     </div>
			                                                           		</div>
			                                                           		<div class="col-sm-12">
					                                                            

					                                                                    <?php 

					                                                                    	foreach ($menu as $m=>$mm){
					                                                                    	if(in_array($mm["id_menu"], $mmenu)){
					                                                                    		$m_c= 'checked';	
					                                                                    	}else{
					                                                                    		$m_c= '';
					                                                                    	}
					                                                                    	
					                                                                    	
					                                                                    	$menu2= all($link, "menuNivelUno", "where status='on' and menu_id= ".$mm["id_menu"]." order by nombre");	
					                                                                    ?>
					                                                                    <div class="form-group col-sm-3 b">
						                                                                    <div class="checkbox ">
						                                                                    	<label>
						                                                                    	<input type="checkbox" name="menu[]" class="colored-blue" value="<?php print $mm["id_menu"]?>" <?php print $m_c?> >
						                                                                    	<span class="text">
						                                                                    		<?php  
								                                                                    	print $mm["nombre"];
								                                                                    	
								                                                                    ?>
						                                                                    	</span>
						                                                                    	</label>
						                                                                     </div>
						                                                                     <?php 
						                                                                     	if(count($menu2) > 0){
							                                                                     	foreach ($menu2 as $m2=>$mm2){
							                                                                     		if(in_array($mm2["id_menuNivelUno"], $mmenu2)){
							                                                                     			$m_c2= 'checked';
							                                                                     		}else{
							                                                                     			$m_c2= '';
							                                                                     		}
							                                                                     		$menu3= all($link, "menuNivelDos", "where status='on' and submenu_id= ".$mm2["id_menuNivelUno"]." order by nombre");
							                                                                     		print '
							                                                                     			<div style="margin-left: 15px;">
							                                                                     			<div class="checkbox " >
									                                                                    	<label>
									                                                                    	<input type="checkbox" name="menuniveluno[]" class="colored-blue" value="'.$mm2["id_menuNivelUno"].'" '.$m_c2.' >
									                                                                    	<span class="text">
									                                                                    		'.$mm2["nombre"].'
									                                                                    	</span>
									                                                                    	</label>
									                                                                     </div>
							                                                                     		';
							                                                                     		if(count($menu3) > 0){
							                                                                     			
							                                                                     			foreach ($menu3 as $m3=>$mm3){
							                                                                     					if(in_array($mm3["id_menuNivelDos"], $mmenu3)){
							                                                                     						$m_c3= 'checked';
											                                                                     		}else{
											                                                                     			$m_c3= '';
											                                                                     		}
									                                                                     			print '
									                                                                     			<div class="checkbox " style="margin-left: 15px;">
											                                                                    	<label>
											                                                                    	<input type="checkbox" name="menuniveldos[]" class="colored-blue" value="'.$mm3["id_menuNivelDos"].'" '.$m_c3.' >
											                                                                    	<span class="text">
											                                                                    		'.$mm3["nombre"].'
											                                                                    	</span>
											                                                                    	</label>
											                                                                     </div>
									                                                                     		';
								                                                                     		}
							                                                                     		}
							                                                                     		print '</div>';
							                                                                     	}
						                                                                     	}
						                                                                     ?>
					                                                                     </div>
					                                                                    <?php }?>

					                                                           
				                                                            </div>
				                                                           
			                                                            </div>
			                                                           
			                                                        
			                                                    </div>
			                                                    <div class="form-group">
			                                                                <div class="checkbox">
			                                                                    <label>
			                                                                        <input type="checkbox" class="colored-blue" name="status" value="on" <?php print $status?>>
			                                                                        <span class="text">Activo / Inactivo</span>
			                                                                    </label>
			                                                                </div>
			                                                            </div>
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
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript">
	
	 	var maxH = 0;

		$(".b").each(function(i) {
	
			var actH = $(this).height();
			if(actH > maxH) maxH = actH;
	
		});
	
		$(".b").height(maxH);
        //--Jquery Select2--
        $(function() {
        	
        $("#e2").select2({
            placeholder: "Seleccione los menus a mostrar para este usuario",
            allowClear: true
        });
	       
	       $("#alta").submit(function(){
			       	$("#carga").fadeIn();
			       var formData = new FormData(document.getElementById("alta"));
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
						    	alert("Registro editado");
						    	
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
				
				
				
	       
        });
    </script>
    
</body>
<!--  /Body -->
</html>
