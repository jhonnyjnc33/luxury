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
            $(".showNewC, #showNewC").click(function(){
	       		$("#cotizacion").slideToggle();
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
						case "coti":
								
								var from_var= "coti";
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
						case "coti":
								
								var from_var= "coti";
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
						case "coti":
									var from_var= "coti";
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
				
				$(document).on("change", ".familias", function(){
					
					var id= $(this).attr("id");
					var pro= $(this).val();
					$("#pre_" + id).fadeIn();
					$("#proo_" + id).empty().load("/acciones/pro.php", {id:pro}); 
					$("#pre_" + id).fadeOut();
					
				});
				
				$(document).on("keyup", ".precio_change", function(){
					var id= $(this).attr("id");
					var valor= $(this).val();
					var precio= $(this).attr("data-precio");
					var porcentaje = 100 -((valor * 100 / precio)) ;
					if(porcentaje % 1 == 0){
						$("#change_price_" + id).empty().append(porcentaje + "%");
						$("#porcentaje_desc_" + id).empty().append(porcentaje );
					}else{
						$("#change_price_" + id).empty().append(porcentaje.toFixed(2) + "%" );
						$("#porcentaje_desc_" + id).empty().append(porcentaje.toFixed(2) );
					}
					
				});
				$(document).on("click", ".check", function(){
					var i= $(this).parent().parent();
					var input= i.find(".precio_change");
					var a= 0;
					if(input.is("[disabled]")){
						input.removeAttr("disabled");	
						i.find("span.input-group").addClass("has-info");
						i.find(".envace_in").removeAttr("disabled", "");
						i.find(".capacidad_in").removeAttr("disabled", "");
						i.find(".precio_in").removeAttr("disabled", "");
						i.find(".porciento_in").removeAttr("disabled", "");
						
						$('.check:checked').each(
						    function() {
						        a++;
						    }
						);
						if(a >=1){
							$("#guardar_cotizacion").show();
						}
					}else{
						input.attr("disabled", "disabled");		
						i.find("span.input-group").removeClass("has-info");
						i.find(".envace_in").attr("disabled", "disabled");
						i.find(".capacidad_in").attr("disabled", "disabled");
						i.find(".precio_in").attr("disabled", "disabled");
						i.find(".porciento_in").attr("disabled", "disabled");
						$('.check:checked').each(
						    function() {
						        a++;
						    }
						);
						if(a >=1){
							$("#guardar_cotizacion").show();
						}else{
							$("#guardar_cotizacion").hide();
						}
					}
				
				
					 
					
				});
				
				$("#agregar_cot").click( function(){
					var num= $(".cot_content").length + 1;
					
					$("#cotizacion #insert_cotizacion").append("<div  id='coti_" + num + "' class='cot_content'><a href='#' class='btn btn-danger shiny quita_familia' id='" + num +"' ><i class='fa fa-times'></i></a><center><img id='pre_"+ num + "' class='prel' src='/images/Preloader_7.gif' style='display: none;'></center><div id='proo_" + num+ "' class='pro'></div></div>");
					$(".familia_unico").clone().insertBefore("#proo_" + num + "").removeClass("familia_unico").attr("id", num);
					return false;
				});
				
				$(document).on("click", ".quita_familia ", function(){
					var id= $(this).attr("id");
					var a= 0;
					$("#coti_" + id).remove();		
					$('.check:checked').each(
						    function() {
						        a++;
						    }
						);
						if(a >=1){
							$("#guardar_cotizacion").show();
						}else{
							$("#guardar_cotizacion").hide();
						}	
					return false;
				});
       
				$("#guardar_cotizacion").click(function(){
						$("#cargaCot").fadeIn();
						$("#respuestaCot").empty();
						var formData = new FormData(document.getElementById("cotizacion_form"));
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
						    var id_cliente= $("#id_cliente").val();
						    if(data==1){
						    	$("#cargaCot").fadeOut();
						    	$("#respuestaCot").html("<h3> Registro guardado. Actualizando tabla </h3>").fadeIn();
						    	$("div.pro").empty();
						    	$("#coti_1").siblings('.cot_content').remove();
						    	//$(".familias").val($('option:first', ".familias").val());
						    	$("#tablaCot").empty().load("/acciones/recarga.php", {tabla:"cotizaciones", order:"where cliente_id= " + id_cliente + " "});
						    	$("#respuestaCot").empty().hide().append("<h3>Registro guardado</h3>").fadeIn();
						    	$("#cotizacion_form").each (function() { this.reset(); });
						    }else{
						    	$("#respuestaCot").html("<h3>Error.Int&eacute;ntalo de nuevo</h3>").fadeIn();
						    	$("#cargaCot").fadeOut();
						    } 
						});
					return false;
				});
				
				$(document).on("click", ".editar", function(){
					var from_data= $(this).attr("from-data");
					var id= $(this).attr("id");
					var title= $(this).attr("data-title");
					$(".modal-title").empty().append("Editando Folio: "+ title);
					var tabla= "";
					switch(from_data){
						case "coti":
									tabla="cotizaciones";
									break;
					}
					$("#edicion").load("/acciones/edicion.php", {id:id, tabla:tabla});
				});