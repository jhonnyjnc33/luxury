$(window).bind("load", function () {
          /* comienzan las altas*/
	       $("#alta").submit(function(){
			       $("#carga").fadeIn();
			       var id_cliente= $("#id_cliente").val();
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
								bootbox.alert("<center> <img src='/images/logo.png' width='200' /> </center><p style='font-size: 16px; text-align: center; margin: 20px 0 0 0; color: #53a93f; font-weight: bold; '>Registro editado </p>");
						    }else{
						    	bootbox.alert("<center> <img src='/images/logo.png' width='200' /> </center><p style='font-size: 16px; text-align: center; margin: 20px 0 0 0; color: #d73d32; font-weight: bold; '>Error.Intentelo de nuevo</p>");
						    	$("#carga").fadeOut();
						    }
						});
						return false;
	       });
	       $("#tipo_c, #tipo_equipamiento_in, #amenidad_in, #personal_in, #condomino_in").keyup(function(){
				    	$(this).css("border", "1px solid #d5d5d5");
				    });
			    
	       $("#construccion_f").submit(function(){
			       var id_cliente= $("#id_cliente_c").val();
			       var formData = new FormData(document.getElementById("construccion_f"));
			       var type= $("input[name=tipo_contruccion]").val();
			       if($("#tipo_c").val()=="" ) {  
				        bootbox.alert("<center> <img src='/images/logo.png' width='200' /> </center><p style='font-size: 16px; text-align: center; margin: 20px 0 0 0; color: #d73d32; font-weight: bold; '>El Campo tipo de construcción es obligatorio</p>");
				        $("#tipo_c").focus().css("border", "1px solid #d70000"); 
				        return false;  
				    } 
				     $("#carga_c").fadeIn();
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
						    $("#carga_c").fadeIn();
						    if(data==1){
						    	$("#carga_c").fadeOut();
						    	bootbox.alert("<center> <img src='/images/logo.png' width='200' /> </center><p style='font-size: 16px; text-align: center; margin: 20px 0 0 0; color: #53a93f; font-weight: bold; '>Registro Guardado</p>");
						    	$("#tabla_c").empty().load("/acciones/recarga.php", {tabla:"complementos_condo", order:"where condo_id= " + id_cliente + " and type='" + type + "'  order by nombre_esp asc", cliente:id_cliente, type:1});
						    	
						    	$("#m_const").fadeOut();
						    	$("#construccion_f").each (function() { this.reset(); });
						    }else{ 
						    							    	bootbox.alert("<center> <img src='/images/logo.png' width='200' /> </center><p style='font-size: 16px; text-align: center; margin: 20px 0 0 0; color: #d73d32; font-weight: bold; '>Error.Intentelo de nuevo</p>");
						    	$("#carga_c").fadeOut();
						    }
						});
						return false;
	       });	
	           
	       $("#personal_form").submit(function(){
			       var id_cliente= $("#id_cliente_pe").val();
			       var formData = new FormData(document.getElementById("personal_form"));
			       var type= $("input[name=tipo_personal]").val();
			       if($("#personal_in").val()=="" ) {  
				        bootbox.alert("<center> <img src='/images/logo.png' width='200' /> </center><p style='font-size: 16px; text-align: center; margin: 20px 0 0 0; color: #d73d32; font-weight: bold; '>El Campo Nombre es obligatorio</p>");
				        $("#personal_in").focus().css("border", "1px solid #d70000"); 
				        return false;  
				    } 
				     $("#carga_pe").fadeIn();
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
						    $("#carga_pe").fadeIn();
						    if(data==1){
						    	$("#carga_pe").fadeOut();
						    	bootbox.alert("<center> <img src='/images/logo.png' width='200' /> </center><p style='font-size: 16px; text-align: center; margin: 20px 0 0 0; color: #53a93f; font-weight: bold; '>Registro Guardado</p>");
						    	$("#tabla_pe").empty().load("/acciones/recarga.php", {tabla:"complementos_condo", order:"where condo_id= " + id_cliente + " and type='" + type + "'  order by nombre_esp asc", cliente:id_cliente, type:4});
						    	
						    	$("#m_personal").fadeOut();
						    	$("#condomino_form").each (function() { this.reset(); });
						    }else{ 
						    	bootbox.alert("<center> <img src='/images/logo.png' width='200' /> </center><p style='font-size: 16px; text-align: center; margin: 20px 0 0 0; color: #d73d32; font-weight: bold; '>Error.Intentelo de nuevo</p>");
						    	$("#carga_pe").fadeOut();
						    }
						});
						return false;
	       });
	           
	       $("#condomino_form").submit(function(){
			       var id_cliente= $("#id_cliente_condo").val();
			       var formData = new FormData(document.getElementById("condomino_form"));
			       var type= $("input[name=tipo_personal]").val();
			       if($("#condomino_in").val()=="" ) {  
				        bootbox.alert("<center> <img src='/images/logo.png' width='200' /> </center><p style='font-size: 16px; text-align: center; margin: 20px 0 0 0; color: #d73d32; font-weight: bold; '>El Campo Nombre del propietario es obligatorio</p>");
				        $("#condomino_in").focus().css("border", "1px solid #d70000"); 
				        return false;  
				    } 
				     $("#carga_condo").fadeIn();
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
						    $("#carga_condo").fadeIn();
						    if(data==1){
						    	$("#carga_condo").fadeOut();
						    	bootbox.alert("<center> <img src='/images/logo.png' width='200' /> </center><p style='font-size: 16px; text-align: center; margin: 20px 0 0 0; color: #53a93f; font-weight: bold; '>Registro Guardado</p>");
						    	$("#tabla_condo").empty().load("/acciones/recarga.php", {tabla:"condominos", order:"where condominio_id= " + id_cliente + "  order by nombre_condomino asc", cliente:id_cliente});
						    	
						    	$("#m_condomino").fadeOut();
						    	$("#personal_form").each (function() { this.reset(); });
						    }else{ 
						    	bootbox.alert("<center> <img src='/images/logo.png' width='200' /> </center><p style='font-size: 16px; text-align: center; margin: 20px 0 0 0; color: #d73d32; font-weight: bold; '>Error.Intentelo de nuevo</p>");
						    	$("#carga_pe").fadeOut();
						    }
						});
						return false;
	       });
	       $(document).on("change", "#inmueble", function(){
	       		
	       		var num= $(this).val();
	       		
	       		
	       		if(num==1){
	       			$("#arrendador2").show();
	       			$("#arrendador").show();
	       		}else{
	       			$("#arrendador2").hide();
	       			$("#arrendador").hide();
	       		}
	       });
	       $("#form_equip").submit(function(){
			       	var id_cliente= $("#id_cliente_e").val();
			       	var type= $("input[name=tipo_equipamiento]").val();
			       var formData = new FormData(document.getElementById("form_equip"));
			       if($("#tipo_equipamiento_in").val()=="" ) {  
				        bootbox.alert("<center> <img src='/images/logo.png' width='200' /> </center><p style='font-size: 16px; text-align: center; margin: 20px 0 0 0; color: #d73d32; font-weight: bold; '>El Campo tipo de equipamiento es obligatorio</p>");
				        $("#tipo_equipamiento_in").focus().css("border", "1px solid #d70000"); 
				        return false;  
				    } 
				     $("#carga_e").fadeIn();
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
						    $("#carga_e").fadeIn();
						    if(data==1){
						    	$("#carga_e").fadeOut();
						    	bootbox.alert("<center> <img src='/images/logo.png' width='200' /> </center><p style='font-size: 16px; text-align: center; margin: 20px 0 0 0; color: #53a93f; font-weight: bold; '>Registro Guardado</p>");
						    	$("#tabla_e").empty().load("/acciones/recarga.php", {tabla:"complementos_condo", order:"where condo_id= " + id_cliente + " and type='" + type + "'  order by nombre_esp asc", cliente:id_cliente, type:2});
						    	
						    	$("#m_equip").fadeOut();
						    	$("#form_equip").each (function() { this.reset(); });
						    }else{ 
						    	bootbox.alert("<center> <img src='/images/logo.png' width='200' /> </center><p style='font-size: 16px; text-align: center; margin: 20px 0 0 0; color: #d73d32; font-weight: bold; '>Error.Intentelo de nuevo</p>");
						    	$("#carga_e").fadeOut();
						    }
						});
						return false;
	       });
	       
	       
	       $("#form_amenidad").submit(function(){
			       	var id_cliente= $("#id_cliente_a").val();
			       	var type= $("input[name=tipo_amenidad]").val();
			       var formData = new FormData(document.getElementById("form_amenidad"));
			       if($("#amenidad_in").val()=="" ) {  
				        bootbox.alert("<center> <img src='/images/logo.png' width='200' /> </center><p style='font-size: 16px; text-align: center; margin: 20px 0 0 0; color: #d73d32; font-weight: bold; '>El Campo tipo de Amenidad es obligatorio</p>");
				        $("#amenidad_in").focus().css("border", "1px solid #d70000"); 
				        return false;  
				    } 
				     $("#carga_a").fadeIn();
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
						    $("#carga_a").fadeIn();
						    if(data==1){
						    	$("#carga_a").fadeOut();
						    	bootbox.alert("<center> <img src='/images/logo.png' width='200' /> </center><p style='font-size: 16px; text-align: center; margin: 20px 0 0 0; color: #53a93f; font-weight: bold; '>Registro Guardado</p>");
						    	$("#tabla_a").empty().load("/acciones/recarga.php", {tabla:"complementos_condo", order:"where condo_id= " + id_cliente + " and type='" + type +"'  order by nombre_esp asc", cliente:id_cliente, type:3});
						    	
						    	$("#m_amenidad").fadeOut();
						    	$("#form_amenidad").each (function() { this.reset(); });
						    }else{ 
						    	bootbox.alert("<center> <img src='/images/logo.png' width='200' /> </center><p style='font-size: 16px; text-align: center; margin: 20px 0 0 0; color: #d73d32; font-weight: bold; '>Error.Intentelo de nuevo</p>");
						    	$("#carga_a").fadeOut();
						    }
						});
						return false;
	       });
	       
	       $("#type").submit(function(){
			       $("#carga_t").fadeIn();
			       var id_cliente= $("#id_cliente_t").val();
			       var formData = new FormData(document.getElementById("type"));
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
						    $("#carga_c").fadeIn();
						    if(data==1){
						    	$("#carga_t").fadeOut();
						    	
						    	 bootbox.alert("<center> <img src='/images/logo.png' width='200' /> </center><p style='font-size: 16px; text-align: center; margin: 20px 0 0 0; color: #53a93f; font-weight: bold; '>Registro Guardado</p>");
						    	
						    	$("#construccion_t").each (function() { this.reset(); });
						    }else{ 
						    							    	bootbox.alert("<center> <img src='/images/logo.png' width='200' /> </center><p style='font-size: 16px; text-align: center; margin: 20px 0 0 0; color: #d73d32; font-weight: bold; '>Error.Intentelo de nuevo</p>");
						    	$("#carga_t").fadeOut();
						    }
						});
						return false;
	       });
	     
	       
	       
        });
        
        
        /* terminan las altas*/
        
        $(document).on("submit", "#edicion", function(){
        	 	   $("#carga_e").fadeIn();
			       var formData = new FormData(document.getElementById("edicion"));
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
						    $("#carga_c").fadeIn();
						    if(data==1){
						    	$("#carga_t").fadeOut();
						    	 bootbox.alert("<center> <img src='/images/logo.png' width='200' /> </center><p style='font-size: 16px; text-align: center; margin: 20px 0 0 0; color: #427fed; font-weight: bold; '>Registro Guardado</p>");
						    }else{  
						    	bootbox.alert("<center> <img src='/images/logo.png' width='200' /> </center><p style='font-size: 16px; text-align: center; margin: 20px 0 0 0; color: #d73d32; font-weight: bold; '>Error.Intentelo de nuevo</p>");
						    	$("#carga_t").fadeOut();
						    }
						});
						return false;
        })
        
        
        
      /* para eliminar*/
      $(document).on("click",".eliminar", function(){
      				
					var from= $(this).attr("from-data");
					var id= $(this).attr("id");
					
					switch(from){
						case "amenidad":
								
								var from_var= "amenidad";
								break;
						case "construccion":
								
								var from_var= "construccion";
								break;
						case "equipamiento":
								
								var from_var= "equipamiento";
								break;
						case "personal":
								
								var from_var= "personal";
								break;
						case "condo":
								
								var from_var= "condo";
								break;
					}
					$("#fila_" + from_var + "_" + id +" td").css("background", "#ffb7b7");
					$("#text_" + from_var + "_" + id).fadeIn();
					return false;
				});
				$(document).on ("click", ".eliminar_no",function(){
					var from= $(this).attr("from-data");
					switch(from){
						case "amenidad":
								var from_var= "amenidad";
								break;
						case "construccion":
								var from_var= "construccion";
								break;
						case "equipamiento":
								var from_var= "equipamiento";
								break;
						case "personal":
								var from_var= "personal";
								break;
						case "condo":
								var from_var= "condo";
								break;
					}
					var id= $(this).attr("id");
					$("#text_" + from_var+ "_" + id).hide();
					$("#fila_" + from_var + "_" + id +" td").css("background", "none"); 
					return false;
				});
				
				$(document).on("click" , ".elim", function(){
					var id= $(this).attr("id");
					var tabla= $(this).attr("data-table");
					var campo= $(this).attr("data-dato");
					var from= $(this).attr("from-data");
					switch(from){
						case "amenidad":
									var from_var= "amenidad";
									break;
						case "construccion":
									var from_var= "construccion";
									break;
						case "equipamiento":
									var from_var= "equipamiento";
									break;
						case "personal":
									var from_var= "personal";
									break;
						case "condo":
									var from_var= "condo";
									break;
						default:
							var from_var= from;
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
								bootbox.alert("<center> <img src='/images/logo.png' width='200' /> </center><p style='font-size: 16px; text-align: center; margin: 20px 0 0 0; color: #d73d32; font-weight: bold; '>Error.Intentelo de nuevo</p>");
							}
					});
					return false;
				});
				
				$(document).on("click" , ".editar", function(){
					var table= $(this).attr("table");
					var content_edit= $(this).attr("content-edit");
					var type= $(this).attr("type");
					var cliente= $(this).attr("data-cliente");
					$(".agregar_a").fadeOut();
					var id= $(this).attr("id");
					$("#"+table).fadeOut().delay(1000);
					$("#"+content_edit).load("/acciones/complementos_condos.php",{id:id, table:table, type:type, cliente:cliente}).fadeIn();
					return false;
					
				});
				$(document).on("click" , ".editar_condo", function(){
					var table= $(this).attr("table");
					var content_edit= $(this).attr("content-edit");
					var type= $(this).attr("type");
					var cliente= $(this).attr("data-cliente");
					$(".agregar_a").fadeOut();
					var id= $(this).attr("id");
					$("#"+table).fadeOut().delay(1000);
					$("#"+content_edit).load("/acciones/editar_condo.php",{id:id, table:table, type:type, cliente:cliente}).fadeIn();
					return false;
					
				});
				$(document).on("click" , "#c_complemento", function(){
					
					location.reload();
					
				});
			