<?php
	/******** Conexion a la base de datos *******/
function conectar($bd, $host, $user, $pass){

			// Conectamos al servidor

			$link = mysql_connect($host, $user, $pass);

			if (!$link) {

				$Error["lError"] = "Ha fallado la conexión.";

				$Error["nError"] = 0;

				return $Error;
 
			}

		    //mysql_query("SET NAMES 'utf8'");

			//seleccionamos la base de datos

			if (!@mysql_select_db($bd, $link)) {

				$Error["lError"] = "Imposible abrir ".$bd ;

				$Error["nError"];

				return $Error;

			}

		

			/* Si hemos tenido exito conectando devuelve 

			el identificador de la conexión, sino devuelve 0 */

			$Error["nError"]=1;

			$Error["lError"]=$link;

			return $Error;

		}
		

function login($link){

			$loginCorrecto = false;

			unset($_SESSION['us']['id']);

		    if(isset($_SESSION['us']["user"]) && isset($_SESSION['us']["pass"])){

		    	$sql = "SELECT 

		    				* 

		    				FROM 

		    					usuarios_system

		    				WHERE

		    				    usuario = '".$_SESSION['us']["user"]."'";

		    	$u= mysql_query($sql, $link);

	

		    	if($uu= mysql_num_rows($u) > 0){

		    		

		    		$uu= mysql_fetch_array($u);

	

		    		if($uu["pass"] == $_SESSION["us"]["pass"]){

			    		$_SESSION["us"]["type"]= $uu["nivel_user"];

			    		$_SESSION["us"]["nombre"]= $uu["nombre"];

			    		$_SESSION["us"]["id"]= $uu["id_user_system"];

			    		$loginCorrecto= true;

		    		}else{

		    			$loginCorrecto= false;

		    			$_SESSION["us"]["error"]= 'Error en la contrase&ntilde;a';

		    		}

		    	}else{

		    		$loginCorrecto= false;

					$_SESSION["us"]["error"]= 'EL usuario no existe o esta bloqueado';

		    	}
		    }

			return $loginCorrecto;

		}

function menu($link, $user){

		$sql= 'SELECT * FROM r_menu_user rm, menu m 

				   WHERE

				   rm.user_type_id = '.$user.'

				   AND

				   rm.menu_id= m.id_menu
				   AND
				   rm.nivel= 1
				   and
				   m.status="on"
				   order by m.nombre
					  ';

			$q= mysql_query($sql, $link);

			$qq= mysql_fetch_array($q);

			do	{

				if($qq["url"] == ""){

					$sub= '<i class="menu-expand"></i>';

					$url= '';

					$s='<ul class="submenu">';

					$subm= ' 
						
											SELECT * FROM menuNivelUno mu, r_menu_user rm 
											WHERE 
											mu.menu_id= '.$qq["id_menu"].'     
							                and
							                rm.user_type_id= '.$user.'    
							                and
							                mu.id_menuNivelUno= rm.menu_id
							                and
							                rm.nivel=2
							                and mu.status= "on"
							                order by mu.nombre
								
								'; 

						$subb= mysql_query($subm, $link);

						$ss= mysql_fetch_array($subb);
						

						do{
							if($ss["carpeta"]==""){
								$carpeta='#';
							}else{
								
								$carpeta= '/'.$ss["carpeta"].'';
							}
							
							if($ss["carpeta"] == ""){
								$sub2= '<i class="menu-expand"></i>';
								$menuDos= '
										SELECT * FROM menuNivelDos mu, r_menu_user rm
										where 
										mu.submenu_id='.$ss["id_menuNivelUno"].'
										and
										rm.user_type_id='.$user.'
										and
										mu.id_menuNivelDos=rm.menu_id
										and
										rm.nivel= 3
										order by mu.nombre
										';
								$menuDos_q= mysql_query($menuDos, $link);
								$mm= mysql_fetch_array($menuDos_q);
								
								if($mm ){
								$ssub='<ul class="submenu ">';
								do {
									$ssub.='
										<li><a href="'.$mm["carpeta"].'">'.$mm["nombre"].'</a></li>
									';
								}while($mm= mysql_fetch_array($menuDos_q));
								$ssub.='</ul>';
								}
							}else{
								$ssub='';
								$sub2='';
							}
							$s.= '

									<li ><a href="'.$carpeta.'" class="menu-dropdown"  > <span class="menu-text" >'.$ss["icono"].' '.$ss["nombre"].'</span> '.$sub2.'</a>
									'.$ssub.'
									</li>
							';

						}while($ss= mysql_fetch_array($subb));
						
					
					$s.='</ul>';

				}else{

					$sub='';

					$url= $qq["url"];

					$s='';

				}

				$menu.='

					<li> 

						<a href="'.$url.'" '.$void.' class="menu-dropdown" > '.$qq["icono"].' <span class="menu-text"> '.$qq["nombre"].'</span> '.$sub.'</a> 

						'.$s.'
						

					</li>

				';

			}while($qq= mysql_fetch_array($q));

			print $menu; 

		} 

function datetomysql($fecha) {
	$fecha_ = explode("/", $fecha);
	return $fecha_[2]."-".$fecha_[0]."-".$fecha_[1];
}

function guardar($dato,  $link, $status){ 
		switch ($dato["seccion"]){

			
			case "articulos_blog":
				$fecha_real= date("Y-m-d");
				$sql= 'INSERT INTO articulos (titulo_esp, titulo_eng, categoria_id, texto_esp, texto_eng, fecha, autor, tag_description_esp, tag_title_esp,  url_esp, status, fecha_alta, tag_title_eng, tag_description_eng, url_eng)

							   VALUES("'.$dato["titulo_esp"].'", "'.$dato["titulo_eng"].'","'.$dato["categoria"].'", "'.addslashes($dato["texto_esp"]).'", "'.addslashes($dato["texto_eng"]).'", "'.$dato["fecha"].'", "'.$dato["autor"].'", "'.$dato["tag_description_esp"].'", "'.$dato["tag_title_esp"].'", "'.$dato["url_esp"].'", "'.$dato["status"].'", "'.$fecha_real.'", "'.$dato["tag_title_eng"].'", "'.$dato["tag_description_eng"].'", "'.$dato["url_eng"].'")

						';	
					$q= mysql_query($sql, $link);
					if($q){
						$id=id("articulos", "id_articulo",$link);
						$etiqueta_frente= upload_img($_FILES["principal"]["name"], $_FILES["principal"]["type"], $_FILES["principal"]["size"], $_FILES["principal"]["tmp_name"], "articulo", "articulo_img","principal",$id, 0, $link, 1);
						$a=0;
						foreach($_FILES["galeria"]["name"] as $img=>$i){
							$a++;
							$im= upload_img($_FILES["galeria"]["name"][$img], $_FILES["galeria"]["type"][$img], $_FILES["galeria"]["size"][$img], $_FILES["galeria"]["tmp_name"][$img], "articulo", "articulo_img","galeria", $id, 0, $link, $a);
						}
					}
				break;

			case "inmueble":
			//print_r($dato);
		 	  $sql= 'INSERT INTO inmuebles (	 
									nombre_esp, 
									nombre_eng, 
									operacionId, 
									subtipoInmuebleId,
									precio,
									precioMonedaId,
									precioRenta,
									precioMonedaIdRenta,
									descripcion_esp,
									descripcion_eng,
									descripcion_esp_corta,
									descripcion_eng_corta,
									amuebladoId,
									recamara,
									banios,
									mediobanios,
									metrosConstruccion,
									estacionamiento,
									edadInmuebleId,
									tag_description_esp, 
									tag_title_esp, 
									url_esp, 
									tag_title_eng, 
									tag_description_eng, 
									url_eng, 
									pais,
									estado,
									ciudad,
									cp,
									colonia,
									calle,
									direccion,
									longitud,
									latitud,
									metrosTerreno,
									destacado,
									slider,
									idTypeConstruction,
									urlVideo,
									tipoInmuebleId,
									status 
									)
									
							VALUES  (
									"'.addslashes($dato["nombre_esp"]).'", 
									"'.addslashes($dato["nombre_eng"]).'", 
									"'.$dato["operacion"].'", 
									"'.$dato["tipoInmueble"].'",
									"'.$dato["precio"].'", 
									"'.$dato["precioMoneda"].'",
									"'.$dato["precioRenta"].'", 
									"'.$dato["precioMonedaRenta"].'",   
									"'.addslashes($dato["descripcion_esp"]).'", 
									"'.addslashes($dato["descripcion_eng"]).'", 
									"'.addslashes($dato["descripcion_esp_corta"]).'", 
									"'.addslashes($dato["descripcion_eng_corta"]).'", 
									"'.$dato["amueblado"].'", 
									"'.$dato["recamara"].'", 
									"'.$dato["banios"].'", 
									"'.$dato["Mediobanios"].'", 
									"'.$dato["metrosConstruccion"].'", 
									"'.$dato["estacionamientos"].'", 
									"'.$dato["edadInmueble"].'", 
									 "'.addslashes($dato["tag_description_esp"]).'",
									 "'.addslashes($dato["tag_title_esp"]).'", 
									 "'.addslashes($dato["url_esp"]).'", 
									 "'.addslashes($dato["tag_title_eng"]).'", 
									 "'.addslashes($dato["tag_description_eng"]).'", 
									 "'.$dato["url_eng"].'", 
									 "'.$dato["pais"].'", 
									 "'.$dato["estado"].'", 
									 "'.$dato["ciudad"].'",
									 "'.$dato["cp"].'", 
									 "'.$dato["colonia"].'",
									 "'.$dato["calle"].'",
									 "'.$dato["direccion"].'",
									 "'.$dato["longitud"].'",
									 "'.$dato["latitud"].'",
									 "'.$dato["metrosTerreno"].'",
									 "'.$dato["destacado"].'",
									 "'.$dato["slider"].'",
									 "'.$dato["typeConstruccion"].'",
									 "'.$dato["urlVideo"].'",
									 "'.$dato["tipoInmueble"].'",
									 "'.$dato["status"].'"
									 )

						';	

					$q= mysql_query($sql, $link);
					
					if($q){
						$id=id("inmuebles", "id_producto",$link);
						$etiqueta_frente= upload_img($_FILES["logo"]["name"], $_FILES["logo"]["type"], $_FILES["logo"]["size"], $_FILES["logo"]["tmp_name"], "producto", "producto_img","listado",$id, 0, $link, 1);
						$slide= upload_img($_FILES["slider"]["name"], $_FILES["slider"]["type"], $_FILES["slider"]["size"], $_FILES["slider"]["tmp_name"], "producto", "producto_img","slider",$id, 1, $link, 1);

						$logProv= upload_img($_FILES["logoProveedor"]["name"], $_FILES["logoProveedor"]["type"], $_FILES["logoProveedor"]["size"], $_FILES["logoProveedor"]["tmp_name"], "producto", "producto_img","logoProveedor",$id, 1, $link, 1);
						
						$a=0;
						foreach($_FILES["galeria_golf"]["name"] as $img=>$i){
							$a++;
							$im= upload_img($_FILES["galeria_golf"]["name"][$img], $_FILES["galeria_golf"]["type"][$img], $_FILES["galeria_golf"]["size"][$img], $_FILES["galeria_golf"]["tmp_name"][$img], "producto", "producto_img","galeria_producto", $id, 0, $link, $a);
							
						}
						$broshure= upload_img($_FILES["broshure"]["name"], $_FILES["broshure"]["type"], $_FILES["broshure"]["size"], $_FILES["broshure"]["tmp_name"], "producto", "producto_img","broshure",$id, 1, $link, 1);
						$b=0;
						foreach($_FILES["plano"]["name"] as $img=>$i){
							$a++;
							$im= upload_img($_FILES["plano"]["name"][$img], $_FILES["plano"]["type"][$img], $_FILES["plano"]["size"][$img], $_FILES["plano"]["tmp_name"][$img], "producto", "producto_img","plano", $id, 0, $link, $b);
							
						}
						if(!empty($dato["amenidad"])){
							$ccc='';
							foreach($dato["amenidad"] as $am){
								$ame.= $ccc.'('.$am.', '.$id.')'; 
								$ccc=",";
							}
							$amm= 'Insert into r_amenidad_inmueble(amenidad_id, inmueble_id) VALUES '.$ame.'';
							$ammq= mysql_query($amm, $link);
						}
					
						
					}
				break;
				
			
			case "categorias_blog":

				$sql= 'INSERT INTO categoria_blog (nombre_esp, nombre_eng, tag_title_esp, tag_description_esp, url_esp, tag_title_eng, tag_description_eng, url_eng, status)

							   VALUES("'.$dato["nombre_esp"].'", "'.$dato["nombre_eng"].'", "'.$dato["tag_title_esp"].'", "'.$dato["tag_description_esp"].'", "'.$dato["url_esp"].'", "'.$dato["tag_title_eng"].'", "'.$dato["tag_description_eng"].'", "'.$dato["url_eng"].'","'.$dato["status"].'")

						';	

					$q= mysql_query($sql, $link);
  
				break;
			case "actividades":
				$sql= 'INSERT INTO actividades(nombre_esp, nombre_eng, status)
							   VALUES("'.$dato["nombre_esp"].'", "'.$dato["nombre_eng"].'", "'.$dato["status"].'")
						';	
					$q= mysql_query($sql, $link);
					if($q){
						$id=id("actividades", "id_actividad",$link);
						$etiqueta_frente= upload_img($_FILES["logo"]["name"], $_FILES["logo"]["type"], $_FILES["logo"]["size"], $_FILES["logo"]["tmp_name"], "actividad", "actividad_img","icono",$id, 0, $link, 1);
					}	
			break;
			case "amenidades":
				$sql= 'INSERT INTO amenidades(nombre_esp, nombre_eng, status)
							   VALUES("'.$dato["nombre_esp"].'", "'.$dato["nombre_eng"].'", "'.$dato["status"].'")
						';	
					$q= mysql_query($sql, $link);
					if($q){
						$id=id("amenidades", "id_amenidad",$link);
						$etiqueta_frente= upload_img($_FILES["logo"]["name"], $_FILES["logo"]["type"], $_FILES["logo"]["size"], $_FILES["logo"]["tmp_name"], "amenidad", "amenidad_img","icono",$id, 0, $link, 1);
					}	
			break;

			case "categorias":

				$sql= 'INSERT INTO categorias(nombre_esp, nombre_eng,status, tag_title_esp, tag_description_esp, url_esp, tag_description_eng, tag_title_eng, url_eng)
				 VALUES("'.$dato["nombre_esp"].'", "'.$dato["nombre_eng"].'", "'.$dato["status"].'", "'.$dato["tag_title_esp"].'", "'.$dato["tag_description_esp"].'", "'.$dato["url_esp"].'", "'.$dato["tag_description_eng"].'", "'.$dato["tag_title_eng"].'", "'.$dato["url_eng"].'")';	
					$q= mysql_query($sql, $link);
					if($q){
						$id=id("categorias", "id_categoria",$link);
						$etiqueta_frente= upload_img($_FILES["logo"]["name"], $_FILES["logo"]["type"], $_FILES["logo"]["size"], $_FILES["logo"]["tmp_name"], "categoria", "categoria_img","icono",$id, 0, $link, 1);
						$e= upload_img($_FILES["icono"]["name"], $_FILES["icono"]["type"], $_FILES["icono"]["size"], $_FILES["icono"]["tmp_name"], "categoria", "categoria_img","iconito",$id, 0, $link, 1);
					} 
				break;
			case "slider":
				 $sql= 'INSERT INTO slider(titulo_esp, titulo_eng,status, titulo2_esp, titulo2_eng)
				 VALUES("'.$dato["nombre_esp"].'", "'.$dato["nombre_eng"].'", "'.$dato["status"].'", "'.$dato["nombre2_esp"].'", "'.$dato["nombre2_eng"].'")';	
					$q= mysql_query($sql, $link);
					if($q){
						$id=id("slider", "id_slider",$link);
						$etiqueta_frente= upload_img($_FILES["banner"]["name"], $_FILES["banner"]["type"], $_FILES["banner"]["size"], $_FILES["banner"]["tmp_name"], "slider", "slider_img","banner",$id, 0, $link, 1);
					} 
				break;
			case "subcategorias":

				$sql= 'INSERT INTO subcategoria(nombre_esp, nombre_eng,status, tag_title_esp, tag_description_esp, url_esp, tag_description_eng, tag_title_eng, url_eng, categoria_id)
				 VALUES("'.$dato["nombre_esp"].'", "'.$dato["nombre_eng"].'", "'.$dato["status"].'", "'.$dato["tag_title_esp"].'", "'.$dato["tag_description_esp"].'", "'.$dato["url_esp"].'", "'.$dato["tag_description_eng"].'", "'.$dato["tag_title_eng"].'", "'.$dato["url_eng"].'", "'.$dato["categoria"].'")';	
					$q= mysql_query($sql, $link);
					if($q){
						$id=id("categorias", "id_categoria",$link);
						$etiqueta_frente= upload_img($_FILES["logo"]["name"], $_FILES["logo"]["type"], $_FILES["logo"]["size"], $_FILES["logo"]["tmp_name"], "categoria", "categoria_img","icono",$id, 0, $link, 1);
						$e= upload_img($_FILES["icono"]["name"], $_FILES["icono"]["type"], $_FILES["icono"]["size"], $_FILES["icono"]["tmp_name"], "categoria", "categoria_img","iconito",$id, 0, $link, 1);
					} 
				break;
			
			case "perfil":

					$sql= 'INSERT INTO type_user(nombre, agregar, eliminar, editar, status)
							   VALUES("'.$dato["nombre"].'", "'.$dato["agregar"].'", "'.$dato["eliminar"].'", "'.$dato["editar"].'", "'.$dato["status"].'")
						';	
					$q= mysql_query($sql, $link);
					
					if($q){
						$id= id("type_user", "id_type_user", $link) ;
						$a=0;
						if(count($dato["menu"])>0){
							foreach ($dato["menu"] as $m=>$mm){
								if($a <1){
									$coma='';
								}else{
									$coma=",";
								}
								$v.= $coma.'("'.$id.'","'.$mm.'", "1")';
								$a++;
							}
						}
						$a=0;
						$coma="";
						if(count($dato["menuniveluno"]) > 0 ){
							foreach ($dato["menuniveluno"] as $d=>$dd){
								if($a <1){
									$coma='';
								}else{
									$coma=",";
								}
								$ddd.= $coma.'("'.$id.'","'.$dd.'", "2")';
								$a++;
							}
							
						}
						$a=0;
						$coma="";
						if(count($dato["menuniveldos"]) > 0 ){
							foreach ($dato["menuniveldos"] as $t=>$tt){
								if($a <1){
									$coma='';
								}else{
									$coma=",";
								}
								$ttt.= $coma.'("'.$id.'","'.$tt.'", "3")';
								$a++;
							}
						}
						$menu= 'INSERT INTO r_menu_user(user_type_id, menu_id, nivel) VALUES '.$v;
						 $menu2= 'INSERT INTO r_menu_user(user_type_id, menu_id, nivel) VALUES '.$ddd;
						 $menu3= 'INSERT INTO r_menu_user(user_type_id, menu_id, nivel) VALUES '.$ttt;
						 
						 $mr= mysql_query($menu, $link);
						 $m2= mysql_query($menu2, $link);
						 $m3= mysql_query($menu3, $link);
					}
				break;
			
			case "usuarios":

					$sql= 'INSERT INTO usuarios_system(nombre, correo, telefono, direccion, usuario, pass, nivel_user, observaciones, status)

							   VALUES("'.$dato["nombre"].'", "'.$dato["correo"].'", "'.$dato["telefono"].'" , "'.$dato["direccion"].'", "'.$dato["usuario"].'", "'.$dato["pass"].'",  "'.$dato["perfil"].'", "'.$dato["observaciones"].'", "'.$dato["status"].'")

						';	
	
					$q= mysql_query($sql, $link);
					
					if($q){
						$id= id("usuarios_system", "id_user_system", $link);
						$logo= upload_img($_FILES["logo"]["name"], $_FILES["logo"]["type"], $_FILES["logo"]["size"], $_FILES["logo"]["tmp_name"], "usuarios", "usuarios_img","perfil", $id, $link);
					}

				break;
			
			case "cotizacion":
					
					$id= id("cotizaciones", "id_cotizacion", $link);
					$fm= 0;
					foreach ($dato["familia"] as $f=>$f_v) {
						if($fm>=1)
							$cccccc=",";
						else 
							$cccccc="";
						$familia.= $cccccc.$f_v;
						$fm++;
					}
					 if($id != 1){
					 	 $id= $id + 1;
					 }
					 $folio= $dato["id_cliente"]."-".ceros($id)."-".$dato["fecha"];
					 $nombre_pdf= $folio.".pdf";
					  $sql= 'INSERT INTO cotizaciones(observaciones, cliente_id, fecha, folio, familias, pdf, user_id)
							   VALUES("'.$dato["observaciones"].'", "'.$dato["id_cliente"].'", "'.$dato["fecha"].'", "'.$folio.'", "'.$familia.'", "'.$nombre_pdf.'", "'.$dato["user"].'" ) 

						';	
					//$q= true;
					$q= mysql_query($sql, $link);
					
					if($q){
							
							$cliente= devuelve_campo_c("nombre", "clientes", "id_cliente", $dato["id_cliente"], $link);
							include("conexionDelli.php");
							$co= 0;
							//print_r($dato["envace"]);
							include("../includes/pdf/html2pdf.class.php");
							$content = '
							<style type="text/css">
								table{
									width: 100%;
									
								}
								table.pro{
									border-top: 2px solid #014479;
									border-bottom: 2px solid #014479;
								}
								.inline{
									display: inline;
								}
								.titulo{
									font-size: 5mm;
								}
								.titulo span{
									font-weight: bold;
								}
								.titulo_pro{
									 background: #558ed5; color: #ffffff;
									 padding: 10px;
									 text-align: center;
									 font-weight: bold; 
								}
								.img_f{
									width: 100%;
								}
								
								
								
							</style>
							';
							foreach ($dato["familia"] as $f=>$f_v) {
								$familia_name= devuelve_campo_c("nombre", "familia", "id_familia", $f_v, $link2);
								$content.='<page backbottom="0mm" backleft="0mm" backright="0mm">
									<page_header>
									
									<table  >
										<tr> 
											<td style="width: 50%; text-align: left">
												<p class="titulo"> <span>'.$cliente.' </span> | '.$familia_name.' </p>
											</td>
											<td style="width: 50%; text-align: right">
												<img src="../images/logo-delli.png" width="150" />
											</td>
										</tr>
										
									</table> 
									</page_header>
									<page_footer>

												<img src="../images/footer.jpg" class="img_f" />

											</page_footer> 
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>
									<table class="pro">
									<tr>
										<td class="titulo_pro" style="width: 40%">Producto</td>
										<td class="titulo_pro" style="width: 15%">Envase</td>
										<td class="titulo_pro" style="width: 15%">Capacidad</td>
										<td class="titulo_pro" style="width: 15%">Precio</td>
										<td class="titulo_pro" style="width: 15%">Rendimiento</td>
									</tr>
									
								';
								foreach ($dato["producto"] as $p=>$pp) {
									$nombre_pro= devuelve_campo_c("nombre", "productos", "id_producto", $pp, $link2);
									$dd= devuelve_campo_c("familia", "productos", "id_producto", $pp, $link2);
									$env= devuelve_campo_c("envace", "productos", "id_producto", $pp, $link2);
									$ren= devuelve_campo_c("rendimiento", "productos", "id_producto", $pp, $link2);
									$rendimiento= devuelve_campo_c("nombre", "rendimientos", "id_rendimiento", $ren, $link2);
									$env_n= devuelve_campo_c("nombre", "envaces", "id_envace", $env, $link2);
									if($dd==$f_v){
										if($co >= 1){
												$coma=",";
											}else{
												$coma='';
											}
										
										$valores_pro.= $coma.'("'.$pp.'", "'.$id.'", "'.$f_v.'", "'.$env_n.'", "'.$dato["capacidad"][$p].'", "'.$dato["precio_ratail"][$p].'", "'.$dato["porcentaje"][$p].'", "'.$dato["precio"][$p].'")';
										$co++;
										
										$content.='
											<tr>
												<td>'.$nombre_pro.'</td>
												<td>'.$env_n.'</td>
												<td>'.$dato["capacidad"][$p].'</td>
												<td>'.$dato["precio"][$p].' MXN</td>
												<td>'.$rendimiento.'</td> 
											</tr>
										';
									}
								}
								
								$content.='
											</table>
											
											
											</page>
										';
							}
							
							
							
							$html2pdf = new HTML2PDF('L','L','fr');
						    $html2pdf->WriteHTML($content);
						    $html2pdf->Output('../pdf/'.$nombre_pdf, 'F'); 
							$fam= 'INSERT INTO productos_cotizados(producto_id, cotizacion_id, marca_id, envace_id, capacidad, precio_rack, diferencia, precio_venta) VALUES '.$valores_pro;
							$fam_q= mysql_query($fam, $link); 
						
					}

				break;

			

			case "proveedor":

					$sql= 'INSERT INTO proveedores(clave, nombre_comercial, nombre_contacto_principal, tel_oficina, correo_contacto_principal, facturacion, rfc, direccion, iva, status, tipo_cambio)

							   VALUES("'.$dato["clave"].'", "'.$dato["nombre"].'", "'.$dato["contacto"].'", "'.$dato["telefono"].'", "'.$dato["correo"].'", "'.$dato["facturacion"].'", "'.$dato["rfc"].'", "'.$dato["domicilio"].'", "'.$dato["iva"].'",  "'.$dato["status"].'",  "'.$dato["tipo_cambio"].'")

						';	

					$q= mysql_query($sql, $link);

				break;

			case "c_consumo":

					$sql= 'INSERT INTO centrosConsumo(nombre, cliente_id_centro, observaciones, no_clientes, tipo_centro_consumo, status)

							   VALUES("'.$dato["nombre"].'", "'.$dato["cliente"].'", "'.$dato["observaciones"].'", "'.$dato["no_clientes"].'", "'.$dato["tipo_c_consumo"].'", "'.$dato["status"].'")

						';	

					$q= mysql_query($sql, $link);

				break;

			
			
		}



		

		

		if($q){

			return 1;

		}else { 

			return 0;

		}

	}
function ceros($numero, $ceros=3){
    return sprintf("%0".$ceros."s", $numero );
}
		
 
function editar_datos($dato,  $link){
		   
		switch ($dato["seccion"]){

			
			case "cupon":
				 $sql= 'UPDATE cupon SET
														clave= "'.$dato["clave"].'" ,
														porcentaje= "'.$dato["porcentaje"].'",
														concepto= "'.htmlentities($dato["concepto"]).'",
														status= "'.$dato["status"].'" 
												  WHERE id_cupon= '.$dato["id"].'
									';	
						
				break;
			case "hotel":
				 $sql= 'UPDATE hoteles SET
														nombre= "'.$dato["nombre"].'" ,
														destino= "'.$dato["destino"].'",
														direccion= "'.htmlentities($dato["direccion"]).'",
														telefono1= "'.htmlentities($dato["telefono1"]).'",
														telefono2= "'.htmlentities($dato["telefono2"]).'",
														correo= "'.htmlentities($dato["correo"]).'",
														
														status= "'.$dato["status"].'" 
												  WHERE id_hotel= '.$dato["id"].'
									';	
						
				break;
			case "aldea":
				$sql= 'UPDATE aldeas SET
														nombre_esp= "'.$dato["nombre_esp"].'" ,
														nombre_eng= "'.$dato["nombre_eng"].'",
														tag_title_eng= "'.$dato["tag_title_eng"].'",
														tag_title_esp= "'.$dato["tag_title_esp"].'",
														tag_description_esp= "'.$dato["tag_description_esp"].'",
														tag_description_eng= "'.$dato["tag_description_eng"].'",
														url_esp= "'.$dato["url_esp"].'",
														url_eng= "'.$dato["url_eng"].'",
														mapa= "'.htmlentities($dato["mapa"]).'",
														
														status= "'.$dato["status"].'" 
												  WHERE id= '.$dato["id"].'
									';	
				$etiqueta_frente= upload_img($_FILES["banner"]["name"], $_FILES["banner"]["type"], $_FILES["banner"]["size"], $_FILES["banner"]["tmp_name"], "destino", "destino_img","banner",$dato["id"], 1, $link, 1);
				$list= upload_img($_FILES["listado"]["name"], $_FILES["listado"]["type"], $_FILES["listado"]["size"], $_FILES["listado"]["tmp_name"], "destino", "destino_img","listado",$dato["id"], 1, $link, 1);
						
				break;
			case "slider":
				$sql= 'UPDATE slider SET
														titulo_esp= "'.$dato["nombre_esp"].'" ,
														titulo_eng= "'.$dato["nombre_eng"].'",
														titulo2_esp= "'.$dato["nombre2_esp"].'",
														titulo2_eng= "'.$dato["nombre2_eng"].'",
														status= "'.$dato["status"].'" 
												  WHERE id_slider= '.$dato["id"].'
									';	
				$etiqueta_frente= upload_img($_FILES["banner"]["name"], $_FILES["banner"]["type"], $_FILES["banner"]["size"], $_FILES["banner"]["tmp_name"], "slider", "slider_img","banner",$dato["id"], 1, $link, 1);
				break;
			case "categorias":
				$sql= 'UPDATE categorias SET
														nombre_esp= "'.addslashes($dato["nombre_esp"]).'" ,
														nombre_eng= "'.addslashes($dato["nombre_eng"]).'" ,
														tag_description_esp= "'.$dato["tag_description_esp"].'" ,
														tag_title_esp= "'.$dato["tag_title_esp"].'" ,
														url_esp= "'.$dato["url_esp"].'" ,
														tag_description_eng= "'.$dato["tag_description_eng"].'" ,
														tag_title_eng= "'.$dato["tag_title_eng"].'" ,
														url_eng= "'.$dato["url_eng"].'" ,
														status= "'.$dato["status"].'" 
												  WHERE id_categoria = '.$dato["id"].'
									';	
				$q= mysql_query($sql, $link); 
				if($q){
						$etiqueta_frente= upload_img($_FILES["logo"]["name"], $_FILES["logo"]["type"], $_FILES["logo"]["size"], $_FILES["logo"]["tmp_name"], "categoria", "categoria_img","icono",$dato["id"], 1, $link, 1);
						$e= upload_img($_FILES["icono"]["name"], $_FILES["icono"]["type"], $_FILES["icono"]["size"], $_FILES["icono"]["tmp_name"], "categoria", "categoria_img","iconito",$dato["id"], 1, $link, 1);
						$b= upload_img($_FILES["banner"]["name"], $_FILES["banner"]["type"], $_FILES["banner"]["size"], $_FILES["banner"]["tmp_name"], "categoria", "categoria_img","banner",$dato["id"], 1, $link, 1);
						
					}
				break;
			case "subcategorias":
				$sql= 'UPDATE subcategoria SET
														nombre_esp= "'.addslashes($dato["nombre_esp"]).'" ,
														nombre_eng= "'.addslashes($dato["nombre_eng"]).'" ,
														tag_description_esp= "'.$dato["tag_description_esp"].'" ,
														tag_title_esp= "'.$dato["tag_title_esp"].'" ,
														url_esp= "'.$dato["url_esp"].'" ,
														tag_description_eng= "'.$dato["tag_description_eng"].'" ,
														tag_title_eng= "'.$dato["tag_title_eng"].'" ,
														url_eng= "'.$dato["url_eng"].'" ,
														categoria_id= "'.$dato["categoria"].'" ,
														status= "'.$dato["status"].'" 
												  WHERE id_subcategoria = '.$dato["id"].'
									';	
				$q= mysql_query($sql, $link); 
				if($q){
						$etiqueta_frente= upload_img($_FILES["logo"]["name"], $_FILES["logo"]["type"], $_FILES["logo"]["size"], $_FILES["logo"]["tmp_name"], "categoria", "categoria_img","icono",$dato["id"], 1, $link, 1);
						$e= upload_img($_FILES["icono"]["name"], $_FILES["icono"]["type"], $_FILES["icono"]["size"], $_FILES["icono"]["tmp_name"], "categoria", "categoria_img","iconito",$dato["id"], 1, $link, 1);
						$b= upload_img($_FILES["banner"]["name"], $_FILES["banner"]["type"], $_FILES["banner"]["size"], $_FILES["banner"]["tmp_name"], "categoria", "categoria_img","banner",$dato["id"], 1, $link, 1);
						
					}
				break;
			case "inmueble":
				
				 $sql= 'UPDATE inmuebles SET
														nombre_esp= "'.addslashes($dato["nombre_esp"]).'" ,
														nombre_eng= "'.addslashes($dato["nombre_eng"]).'" ,
														operacionId= "'.addslashes($dato["operacion"]).'" ,
														tipoInmuebleId= "'.addslashes($dato["tipoInmueble"]).'" ,
														precio= "'.$dato["precio"].'" ,
														precioMonedaId="'.$dato['precioMoneda'].'",
														precioRenta="'.$dato['precioRenta'].'",
														precioMonedaIdRenta="'.$dato['precioMonedaRenta'].'",
														descripcion_esp= "'.addslashes($dato["descripcion_esp"]).'" ,
														descripcion_eng= "'.addslashes($dato["descripcion_eng"]).'" ,
														descripcion_esp_corta= "'.addslashes($dato["descripcion_esp_corta"]).'" ,
														descripcion_eng_corta= "'.addslashes($dato["descripcion_eng_corta"]).'" ,
														amuebladoId= "'.addslashes($dato["amueblado"]).'",
														recamara= "'.addslashes($dato["recamara"]).'",
														banios= "'.addslashes($dato["banios"]).'",
														mediobanios= "'.addslashes($dato["Mediobanios"]).'",
														metrosConstruccion= "'.addslashes($dato["metrosConstruccion"]).'",
														estacionamiento= "'.addslashes($dato["estacionamientos"]).'",
														edadInmuebleId= "'.addslashes($dato["edadInmueble"]).'",
														tag_description_esp= "'.addslashes($dato["tag_description_esp"]).'" ,
														tag_description_eng= "'.addslashes($dato["tag_description_eng"]).'" ,
														tag_title_esp= "'.addslashes($dato["tag_title_esp"]).'" ,
														tag_title_eng= "'.addslashes($dato["tag_title_eng"]).'" ,
														url_esp= "'.$dato["url_esp"].'" ,
														url_eng= "'.$dato["url_eng"].'" ,
														metrosTerreno= "'.$dato["metrosTerreno"].'",
														destacado= "'.$dato["destacado"].'",
														slider= "'.$dato["slider"].'",
														idTypeConstruction= "'.$dato["typeConstruccion"].'",
														urlVideo= "'.$dato["urlVideo"].'",
														fecha="'.$dato["fecha"].'",
														status= "'.$dato["status"].'" 
												  WHERE id_producto= '.$dato["id"].'
									';	
					
									
				$q= mysql_query($sql, $link);
				if($q){
						$id=$dato["id"];
						
						$etiqueta_frente= upload_img($_FILES["logo"]["name"], $_FILES["logo"]["type"], $_FILES["logo"]["size"], $_FILES["logo"]["tmp_name"], "producto", "producto_img","listado",$id, 1, $link, 1);

						$slide= upload_img($_FILES["slider"]["name"], $_FILES["slider"]["type"], $_FILES["slider"]["size"], $_FILES["slider"]["tmp_name"], "producto", "producto_img","slider",$id, 1, $link, 1);
						$logProv= upload_img($_FILES["logoProveedor"]["name"], $_FILES["logoProveedor"]["type"], $_FILES["logoProveedor"]["size"], $_FILES["logoProveedor"]["tmp_name"], "producto", "producto_img","logoProveedor",$id, 1, $link, 1);

						$query="select numero_imagen from imagen where seccion_seccion='producto_tour' and id_content=".$id." order by numero_imagen desc limit 0, 1";
						$query_q=mysql_query($query, $link);
						$query_num= mysql_fetch_array($query_q);
						$numero= $query_num['numero_imagen']; 
						$a=$numero;
						foreach($_FILES["galeria_golf"]["name"] as $img=>$i){
							$a++;
							$im= upload_img($_FILES["galeria_golf"]["name"][$img], $_FILES["galeria_golf"]["type"][$img], $_FILES["galeria_golf"]["size"][$img], $_FILES["galeria_golf"]["tmp_name"][$img], "producto", "producto_img","galeria_producto", $id, 0, $link, $a);
							
						}
						$broshure= upload_img($_FILES["broshure"]["name"], $_FILES["broshure"]["type"], $_FILES["broshure"]["size"], $_FILES["broshure"]["tmp_name"], "producto", "producto_img","broshure",$id, 1, $link, 1);
						$b=$numero;
						foreach($_FILES["plano"]["name"] as $img=>$i){
							$a++;
							$im= upload_img($_FILES["plano"]["name"][$img], $_FILES["plano"]["type"][$img], $_FILES["plano"]["size"][$img], $_FILES["plano"]["tmp_name"][$img], "producto", "producto_img","plano", $id, 0, $link, $b);
							
						}
						$d= 'DELETE from r_amenidad_inmueble where inmueble_id='.$id;
						$dd= mysql_query($d, $link);
						if(!empty($dato["amenidad"])){
							$ccc='';
							foreach($dato["amenidad"] as $am){
								$ame.= $ccc.'('.$am.', '.$id.')'; 
								$ccc=",";
							}
							$amm= 'Insert into r_amenidad_inmueble(amenidad_id, inmueble_id) VALUES '.$ame.'';
							$ammq= mysql_query($amm, $link);
						}
					}
				break;

			case "blog_categoria":
				$sql= 'UPDATE categoria_blog SET
														nombre_esp= "'.$dato["nombre"].'" ,
														tag_title_esp= "'.$dato["tag_title"].'" ,
														tag_description_esp= "'.$dato["tag_description"].'" ,
														url_esp= "'.$dato["url"].'" ,
														nombre_eng= "'.$dato["nombre_eng"].'" ,
														tag_title_eng= "'.$dato["tag_title_eng"].'" ,
														tag_description_eng= "'.$dato["tag_description_eng"].'" ,
														url_eng= "'.$dato["url_eng"].'" ,
														status= "'.$dato["status"].'" 
														

												  WHERE id_categoria_blog= '.$dato["id"].'

									';	
				
				break;

			case "proveedor":
				$sql= 'UPDATE proveedores SET
														rfc= "'.$dato["rfc"].'" ,
														nombre_comercial= "'.$dato["nombre"].'" ,
														tel_oficina= "'.$dato["telefono"].'" ,
														nombre_contacto_principal= "'.$dato["contacto"].'" ,
														correo_contacto_principal= "'.$dato["correo"].'" ,
														clave= "'.$dato["clave"].'" ,
														facturacion= "'.$dato["facturacion"].'" ,
														direccion= "'.$dato["direccion"].'" ,
														tipo_cambio= "'.$dato["tipo_cambio"].'" ,
														status= "'.$dato["status"].'" 
												  		WHERE id_proveedor= '.$dato["id"].'

									';	
				
				break;

			case "actividades":
				$sql= 'UPDATE actividades SET
														nombre_esp= "'.$dato["nombre_esp"].'" ,
														nombre_eng= "'.$dato["nombre_eng"].'" ,
														url_esp= "'.$dato["url_esp"].'" ,
														url_eng= "'.$dato["url_eng"].'" ,
														status= "'.$dato["status"].'" 
												  		WHERE id_actividad= '.$dato["id"].'

									';	
				$etiqueta_frente= upload_img($_FILES["logo"]["name"], $_FILES["logo"]["type"], $_FILES["logo"]["size"], $_FILES["logo"]["tmp_name"], "actividad", "actividad_img","icono",$dato["id"], 0, $link, 1);
				
				break;
			case "comentarios":
			 $sql= 'UPDATE comentario_articulo SET
														nombre= "'.$dato["nombre"].'" ,
														web= "'.$dato["web"].'" ,
														email= "'.$dato["email"].'" ,
														comentarios= "'.$dato["comentarios"].'" ,
														
														status= "'.$dato["status"].'" 
														

												  WHERE id_comentario_articulo= '.$dato["id"].'

									';	
				
				break;

			case "blog_articulo":

					 $sql= 'UPDATE articulos SET
														categoria_id= "'.$dato["categoria"].'" ,
														autor= "'.$dato["autor"].'" ,
														texto_esp= "'.addslashes($dato["texto_esp"]).'" ,
														titulo_esp= "'.$dato["titulo_esp"].'",
														url_esp= "'.$dato["url_esp"].'",
														fecha= "'.$dato["fecha"].'",
														texto_eng= "'.addslashes($dato["texto_eng"]).'",
														tag_title_esp= "'.$dato["tag_title_esp"].'" ,
														tag_description_esp= "'.addslashes($dato["tag_description_esp"]).'",
														titulo_eng= "'.$dato["titulo_eng"].'",
														tag_title_eng= "'.$dato["tag_title_eng"].'" ,
														tag_description_eng= "'.addslashes($dato["tag_description_eng"]).'",
														status= "'.$dato["status"].'" 
												  WHERE id_articulo= '.$dato["id"].'
									';
					 $id= $dato["id"];	
						$etiqueta_frente= upload_img($_FILES["principal"]["name"], $_FILES["principal"]["type"], $_FILES["principal"]["size"], $_FILES["principal"]["tmp_name"], "articulo", "articulo_img","principal",$id, 1, $link, 1);
						$n= id_img($link, "articulo", "galeria");
						
						foreach($_FILES["galeria"]["name"] as $img=>$i){
							$n++;
							$im= upload_img($_FILES["galeria"]["name"][$img], $_FILES["galeria"]["type"][$img], $_FILES["galeria"]["size"][$img], $_FILES["galeria"]["tmp_name"][$img], "articulo", "articulo_img","galeria", $id, 0, $link, $n);
							
						}
				break;  

			case "subcategorias_blog":
					$sql= 'UPDATE subcategorias_blog SET
														nombreSubBlog= "'.$dato["dato"][2].'" ,
														id_categoria= "'.$dato["dato"][3].'" ,
														url= "'.$dato["dato"][6].'" ,
														tag_title= "'.$dato["dato"][4].'",
														tag_description= "'.$dato["dato"][5].'",
														status= "'.$status.'" 
												  WHERE id_subcategoriaBlog= '.$dato["dato"][1].'
									';	

					

				break;

			case "estado_cuenta":
				$sql= 'UPDATE estado_cuenta SET
														titulo= "'.$dato["nombre_esp"].'" ,
														condominio_id= "'.$dato["condominio"].'" ,
														condomino_id= "'.$dato["condomino"].'",
														observaciones= "'.$dato["observaciones"].'",
														mes= "'.$dato["mes"].'",
														anio= "'.$dato["anio"].'",
														status= "'.$dato["status"].'" 
												  WHERE id_estado_cuenta= '.$dato["id"].'
									';	
					$estado= upload_archivo("estado_cuenta",$_FILES["estado"]["name"], $_FILES["estado"]["type"], $_FILES["estado"]["size"], $_FILES["estado"]["tmp_name"], "condominios", "condominios", "estado_cuenta", $dato["id"], $link);
					
				break;

			
			case "perfil":
					//print_r($dato);
					$id= $dato["id"] ;
					$sql= '
						Update type_user set nombre= "'.$dato["nombre"].'",
											 status= "'.$dato["status"].'",
											 agregar= "'.$dato["agregar"].'",
											 eliminar= "'.$dato["eliminar"].'",
											 editar= "'.$dato["editar"].'"
								Where id_type_user = '.$id.'
					';
					
					$del= 'Delete from r_menu_user where user_type_id='.$id;
					$dell= mysql_query($del, $link);
						$a=0;
						if(count($dato["menu"])>0){
							foreach ($dato["menu"] as $m=>$mm){
								if($a <1){
									$coma='';
								}else{
									$coma=",";
								}
								$v.= $coma.'("'.$id.'","'.$mm.'", "1")';
								$a++;
							}
						}
						$a=0;
						$coma="";
						if(count($dato["menuniveluno"]) > 0 ){
							foreach ($dato["menuniveluno"] as $d=>$dd){
								if($a <1){
									$coma='';
								}else{
									$coma=",";
								}
								$ddd.= $coma.'("'.$id.'","'.$dd.'", "2")';
								$a++;
							}
							
						}
						$a=0;
						$coma="";
						if(count($dato["menuniveldos"]) > 0 ){
							foreach ($dato["menuniveldos"] as $t=>$tt){
								if($a <1){
									$coma='';
								}else{
									$coma=",";
								}
								$ttt.= $coma.'("'.$id.'","'.$tt.'", "3")';
								$a++;
							}
						}
						$menu= 'INSERT INTO r_menu_user(user_type_id, menu_id, nivel) VALUES '.$v;
						 $menu2= 'INSERT INTO r_menu_user(user_type_id, menu_id, nivel) VALUES '.$ddd;
						 $menu3= 'INSERT INTO r_menu_user(user_type_id, menu_id, nivel) VALUES '.$ttt;
						 
						$mr= mysql_query($menu, $link);
						 $m2= mysql_query($menu2, $link);
						 $m3= mysql_query($menu3, $link);

				

				break;

			case "amenidades":
					 $sql= 'UPDATE amenidades SET
														nombre_esp= "'.$dato["nombre_esp"].'" ,
														nombre_eng= "'.$dato["nombre_eng"].'" ,
														status= "'.$dato["status"].'" 
												  WHERE id_amenidad= '.$dato["id"].'
									';	
				$etiqueta_frente= upload_img($_FILES["logo"]["name"], $_FILES["logo"]["type"], $_FILES["logo"]["size"], $_FILES["logo"]["tmp_name"], "amenidad", "amenidad_img","icono",$dato["id"], 1, $link, 1);
				break;
			case "etiquetas_productos":
					 $sql= 'UPDATE etiquetas_productos SET
														nombre= "'.$dato["dato"][2].'" ,
														status= "'.$status.'" 
												  WHERE id_etiqueta_producto= '.$dato["dato"][1].'
									';	
				break;
			case "usuarios":

					$sql= 'UPDATE usuarios_system SET

														nombre= "'.$dato["nombre"].'" ,
														correo= "'.$dato["correo"].'" ,
														telefono= "'.$dato["telefono"].'" ,
														direccion= "'.$dato["direccion"].'" ,
														usuario= "'.$dato["usuario"].'" ,
														pass= "'.$dato["pass"].'" ,
														nivel_user= "'.$dato["perfil"].'" ,
														observaciones= "'.$dato["observaciones"].'" ,

														status= "'.$dato["status"].'" 

												  WHERE id_user_system= '.$dato["id_cliente"].'

									';	
					$logo= upload_img($_FILES["logo"]["name"], $_FILES["logo"]["type"], $_FILES["logo"]["size"], $_FILES["logo"]["tmp_name"],"usuarios", "usuarios_img","perfil", $dato["id_cliente"], $link);
				break;

		}


		if($sql != 1){
			$q= mysql_query($sql, $link);
	
			if($q){
	
				return 1;
	
			}else {
	
				return 0;
	
			}
		}else{
			return $sql;
		}

	} 

function all($link, $tabla, $order) {
	$string= 'SELECT * FROM '.$tabla." ".$order;
	$query= mysql_query($string, $link);
	$a=0;
	while($row = mysql_fetch_array($query, MYSQL_ASSOC)){
		$a++;
		$listado[$a]= $row;
	} 
	return $listado;
}
function total($link, $tabla, $string, $campo){
	$q='SELECT * FROM '.$tabla.''.$string;
	$qq= mysql_query($q, $link);
	$qqq= mysql_fetch_array($qq);
	do{
		$lista[$qqq[$campo]]= $qqq[$campo]; 
	}while($qqq= mysql_fetch_array($qq));
	 
	return $lista;
}



function datos_individuales_i($link, $tabla, $campo, $id){
	$q= 'SELECT * FROM '.$tabla.' WHERE '.$campo.'='.$id;
	$qq= mysql_query($q, $link);
	$qqq= mysql_fetch_array($qq);
	return $qqq;
}

function eliminar($tabla, $campo, $link, $id){

		$q= 'DELETE FROM '.$tabla.' WHERE '.$campo.' = '.$id;

		$qq= mysql_query($q, $link);
		if($tabla == "cotizaciones"){
			$pro= 'delete from productos_cotizados where cotizacion_id='.$id;
			$pros= mysql_query($pro, $link);
		}
		if($tabla== "type_user"){
			$per= 'delete from r_menu_user where user_type_id='.$id;
			$per_q= mysql_query($per); 
		}
		if($qq)

			return true;

		else 

			return false;

	}

function upload_img($nombre, $tipo, $size , $name_temporal, $seccion, $carpeta, $seccion_pertenece, $id, $mm, $link, $numero_img){
			 
			if($size > 0){
				$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png","application/msword", "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet", "application/vnd.ms-excel", "application/mspowerpoint","application/pdf", "application/vnd.openxmlformats-officedocument.wordprocessingml.document");
				$limite_kb = 21000;
				if (in_array($tipo, $permitidos) && $size <= $limite_kb * 1024){
					
					if($mm==0){
						 
					}else{
							$s= 'SELECT * FROM imagen where id_content='.$id.' and seccion_seccion="'.$seccion_pertenece.'" and seccion= "'.$seccion.'"';
							$ss= mysql_query($s);
							$ss= mysql_fetch_array($ss);
							//unlink($_SERVER['DOCUMENT_ROOT']."/admin/images/".$carpeta."/".$ss["imagen"]);
							$delete= 'DELETE FROM imagen where id_content='.$id." and seccion_seccion='".$seccion_pertenece."' and seccion='".$seccion."'";
							$d= mysql_query($delete, $link); 
							$numero_img=1;
					}
					$ext= explode(".", $nombre); 
				  	$nombre= $seccion_pertenece."_".$id."_".$numero_img.".".$ext[1];
					$ruta = $_SERVER['DOCUMENT_ROOT']."/images/".$carpeta."/".$nombre;
					$resultado = @move_uploaded_file($name_temporal,$ruta);
						if ($resultado){
							$img= "INSERT INTO imagen(imagen, id_content,  seccion, seccion_seccion, numero_imagen)
					 		VALUES('".$nombre."', '".$id."',  '".$seccion."', '".$seccion_pertenece."', '".$numero_img."' )
							 ";
							 $img_q = mysql_query($img, $link);
						} else {
							echo "ocurrio un error al mover el archivo.";
						}
				} else {
					echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
				}
			}
}

function upload_archivo($nombre_escrito, $nombre, $tipo, $size , $name_temporal, $seccion, $carpeta, $seccion_pertenece, $id, $link){
			//ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
			//y que el tamano del archivo no exceda los 100kb
			
			$m=1;
			$nn= $nombre_escrito."_".$id;
			if($size > 0){
				$permitidos = array("image/jpg", "image/jpeg", "application/x-xls", "image/gif", "image/png", "application/msword", "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet", "application/vnd.ms-excel", "application/mspowerpoint", "application/pdf");
				$limite_kb = 11000;
				if (in_array($tipo, $permitidos) && $size <= $limite_kb * 3146){
				 
					$ext= explode(".", $nombre); 
					 $ultimo_elemento=count($ext)-1;
				  	$nombre= $nn.".".$ext[$ultimo_elemento];
					$ruta = $_SERVER['DOCUMENT_ROOT']."/descargas/".$carpeta."/".$nombre;
					$resultado = @move_uploaded_file($name_temporal,$ruta);
						if ($resultado){
							
							$img= "INSERT INTO imagen(imagen, id_content,  seccion, seccion_seccion, numero_imagen)
					 		VALUES('".$nombre."', '".$id."',  '".$seccion."', '".$seccion_pertenece."', '".$m."' )
							 ";
							 $img_q = mysql_query($img, $link);
						} else {
							echo "ocurrio un error al mover el archivo";
						}
				} else {
					echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
				}
			}
	}

function id($tabla, $campo, $link){

		$query="select MAX(".$campo." ) as numero from ".$tabla."";

		$query_q=mysql_query($query, $link);

		$query_num= mysql_fetch_array($query_q);

		$numero= $query_num['numero'];

		if($numero == ''){

			$num=1;

			return $num;

		}else {

			return $numero;

		}

	}

function id_img($link, $seccion, $seccion_pertenece){

		$query="select MAX(numero_imagen) as numero from imagen where seccion='".$seccion."' and seccion_seccion='".$seccion_pertenece."'";

		$query_q=mysql_query($query, $link);

		$query_num= mysql_fetch_array($query_q);

		$numero= $query_num['numero'];

		if($numero == ''){

			$num=1;

			return $num;

		}else {

			return $numero;

		}

		

	}
function mostrar_img($link, $id, $seccion, $seccion_seccion){

	$q= 'select * from imagen where id_content = '.$id.' and seccion= "'.$seccion.'" and seccion_seccion="'.$seccion_seccion.'"';
	$qq= mysql_query($q, $link);
	$qqq= mysql_fetch_array($qq);
	if($qqq){
		do{ 
			$im[$qqq["id_imagen"]]= array("imagen"=>$qqq["imagen"], "id"=>$qqq["id_imagen"]);
		}while ($qqq= mysql_fetch_array($qq));
	}else{
		$im=array();
	}
	return $im;

}

function cortar($string, $limit, $break, $pad) {

	// return with no change if string is shorter than $limit

	if(strlen($string) <= $limit)

	return $string;

	// is $break present between $limit and the end of the string?

	if(false !== ($breakpoint = strpos($string, $break, $limit))) {

	if($breakpoint < strlen($string) - 1) {

	$string = substr($string, 0, $breakpoint) . $pad;

	}

	}

	return $string;

} 


function devuelve_campo_c($campo_buscar, $tabla, $campo_comparar, $campo_comparado, $link){
	 $s= 'SELECT '.$campo_buscar.' FROM '.$tabla.' WHERE '.$campo_comparar.'= "'.$campo_comparado.'"'; 
	$ss= mysql_query($s, $link);
	$sss= mysql_fetch_array($ss);
	$campo= $sss[$campo_buscar]; ;
	return $campo; 
}

function mes($mes){
	switch ($mes){
		case 1:
				$mes= array("texto"=>"Enero", "abreviado"=>"Ene");
				break;
		case 2:
				$mes= array("texto"=>"Febrero", "abreviado"=>"Feb");
				break;
		case 3:
				$mes= array("texto"=>"Marzo", "abreviado"=>"Mar");
				break;
		case 4:
				$mes= array("texto"=>"Abril", "abreviado"=>"Abr");
				break;
		case 5:
				$mes= array("texto"=>"Mayo", "abreviado"=>"Mayo");
				break;
		case 6:
				$mes= array("texto"=>"Junio", "abreviado"=>"Jun");
				break;
		case 7:
				$mes= array("texto"=>"Julio", "abreviado"=>"Jul");
				break;
		case 8:
				$mes= array("texto"=>"Agosto", "abreviado"=>"Ago");
				break;
		case 9:
				$mes= array("texto"=>"Septiembre", "abreviado"=>"Sep");
				break;
		case 10:
				$mes= array("texto"=>"Octubre", "abreviado"=>"Oct");
				break;
		case 11:
				$mes= array("texto"=>"Noviembre", "abreviado"=>"Nov");
				break;
		case 12:
				$mes= array("texto"=>"Diciembre", "abreviado"=>"Dic");
				break;

	}
	
	return $mes;
}

function fecha_nacimiento($fecha){

	$fech=explode( "-" , $fecha); 
	switch ($fech[1]){
		case 01:
				$mes= array("texto"=>"Enero", "abreviado"=>"Ene");
				break;
		case 02:
				$mes= array("texto"=>"Febrero", "abreviado"=>"Feb");
				break;
		case 03:
				$mes= array("texto"=>"Marzo", "abreviado"=>"Mar");
				break;
		case 04:
				$mes= array("texto"=>"Abril", "abreviado"=>"Abr");
				break;
		case 05:
				$mes= array("texto"=>"Mayo", "abreviado"=>"Mayo");
				break;
		case 06:
				$mes= array("texto"=>"Junio", "abreviado"=>"Jun");
				break;
		case 07:
				$mes= array("texto"=>"Julio", "abreviado"=>"Jul");
				break;
		case 08:
				$mes= array("texto"=>"Agosto", "abreviado"=>"Ago");
				break;
		case 09:
				$mes= array("texto"=>"Septiembre", "abreviado"=>"Sep");
				break;
		case 10:
				$mes= array("texto"=>"Octubre", "abreviado"=>"Oct");
				break;
		case 11:
				$mes= array("texto"=>"Noviembre", "abreviado"=>"Nov");
				break;
		case 12:
				$mes= array("texto"=>"Diciembre", "abreviado"=>"Dic");
				break;

	}
	
	$fecha_n= array("dia"=>$fech[2], "mes"=>$mes, "anio"=>$fech[0]);
	
	return $fecha_n;
}
function fecha($fecha){
	$anio= substr($fecha, 0, 4);
	$mes= substr($fecha, 4, 2);
	$dia= substr($fecha, 6, 2);
	return $fec= $dia."-".$mes."-".$anio;
}

function tipo_evento ($evento){
	switch ($evento){
		case 1:
				$tipo= 'Visita programada';
			break;
		case 2:
				$tipo= 'Cumplea&ntilde;os';
			break;
		case 3:
				$tipo= 'Aniversario';
			break;
		case 4:
				$tipo= 'Otro';
			break;
	}
	return $tipo;
}

function paginacion($_pagi_sql, $_pagi_cuantos, $_pagi_nav_num_enlaces,$_pagi_separador, $_pagi_enlace){
							
							/**
							 * Variables que se pueden definir antes de incluir el script via include():
							 * ------------------------------------------------------------------------
							 * $_pagi_sql 					OBLIGATORIA.		Cadena. Debe contener una sentencia sql valida (y sin la clausula "limit").
							 
							 * $_pagi_cuantos				OPCIONAL.		Entero. Cantidad de registros que contendra como maximo cada pagina.
															Por defecto esta en 20.
																		
							 * $_pagi_nav_num_enlaces		OPCIONAL		Entero. Cantidad de enlaces a los numeros de pagina que se mostraran como 
															maximo en la barra de navegacion.
															Por defecto se muestran todos.
																		
							 * $_pagi_mostrar_errores		OPCIONAL		Booleano. Define si se muestran o no los errores de MySQL que se puedan producir.
							 								Por defecto esta en "true";
																		
							 * $_pagi_propagar				OPCIONAL		Array de cadenas. Contiene los nombres de las variables que se quiere propagar
															por el url. Por defecto se propagaran todas las que ya vengan por el url (GET).
							 * $_pagi_conteo_alternativo	OPCIONAL		Booleano. Define si se utiliza mysql_num_rows() (true) o COUNT(*) (false).
															Por defecto esta en false.
							 * $_pagi_separador				OPCIONAL		Cadena. Cadena que separa los enlaces numericos en la barra de navegacion entre paginas.
							 								Por defecto se utiliza la cadena " | ".
							 * $_pagi_nav_estilo			OPCIONAL		Cadena. Contiene el nombre del estilo CSS para los enlaces de paginacion.
							 								Por defecto no se especifica estilo.
							 * $_pagi_nav_anterior			OPCIONAL		Cadena. Contiene lo que debe ir en el enlace a la pagina anterior. Puede ser un tag <img>.
							 								Por defecto se utiliza la cadena "&laquo; Anterior".
							 * $_pagi_nav_siguiente			OPCIONAL		Cadena. Contiene lo que debe ir en el enlace a la pagina siguiente. Puede ser un tag <img>.
							 								Por defecto se utiliza la cadena "Siguiente &raquo;"
							--------------------------------------------------------------------------
							*/
							
							
							/*
							 * Verificacion de los parametros obligatorios y opcionales.
							 *------------------------------------------------------------------------
							 */
							 if(empty($_pagi_sql)){
								// Si no se definió $_pagi_sql... grave error!
								// Este error se muestra si o si (ya que no es un error de mysql)
								die("<b>Error Paginator : </b>No se ha definido la variable \$_pagi_sql");
							 }
							 
							 if(empty($_pagi_cuantos)){
								// Si no se ha especificado la cantidad de registros por pagina
								// $_pagi_cuantos sera por defecto 20
								$_pagi_cuantos = 20;
							 }
							 
							 if(!isset($_pagi_mostrar_errores)){
								// Si no se ha elegido si se mostrara o no errores
								// $_pagi_errores sera por defecto true. (se muestran los errores)
								$_pagi_mostrar_errores = true;
							 }
							
							 if(!isset($_pagi_conteo_alternativo)){
								// Si no se ha elegido el tipo de conteo
								// Se realiza el conteo dese mySQL con COUNT(*)
								$_pagi_conteo_alternativo = false;
							 }
							 
							 if(!isset($_pagi_separador)){
								// Si no se ha elegido un separador
								// Se toma el separador por defecto.
								$_pagi_separador = " | ";
							 }
							 
							  if(isset($_pagi_nav_estilo)){
								// Si se ha definido un estilo para los enlaces, se genera el atributo "class" para el enlace
								$_pagi_nav_estilo_mod = "class=\"$_pagi_nav_estilo\"";
							 }else{
							 	// Si no, se utiliza una cadena vacia.
							 	$_pagi_nav_estilo_mod = "";
							 }
							 
							 if(!isset($_pagi_nav_anterior)){
								// Si no se ha elegido una cadena para el enlace "siguiente"
								// Se toma la cadena por defecto.
								$_pagi_nav_anterior = "<i class='fa fa-chevron-left'></i> ";
							 } 
							 
							 if(!isset($_pagi_nav_siguiente)){
								// Si no se ha elegido una cadena para el enlace "siguiente"
								// Se toma la cadena por defecto.
								$_pagi_nav_siguiente = "<i class='fa fa-chevron-right'></i>"; 
							 } 
							 
							//------------------------------------------------------------------------
							
							
							/*
							 * Establecimiento de la pagina actual.
							 *------------------------------------------------------------------------
							 */
							 if (empty($_GET['_pagi_pg'])){
								// Si no se ha hecho click a ninguna pagina especifica
								// O sea si es la primera vez que se ejecuta el script
							    	// $_pagi_actual es la pagina actual-->sera por defecto la primera.
								$_pagi_actual = 1;
							 }else{
								// Si se "pidió" una pagina especifica:
								// La pagina actual sera la que se pidió.
							    	$_pagi_actual = $_GET['_pagi_pg'];
							 }
							//------------------------------------------------------------------------
							
							
							/*
							 * Establecimiento del numero de paginas y del total de registros.
							 *------------------------------------------------------------------------
							 */
							 // Contamos el total de registros en la BD (para saber cuantas paginas seran)
							 // La forma de hacer ese conteo dependera de la variable $_pagi_conteo_alternativo
							 if($_pagi_conteo_alternativo == false){
							 	 $_pagi_sqlConta = eregi_replace("select (.*) from", "SELECT COUNT(*) FROM", $_pagi_sql);
							 	$_pagi_result2 = mysql_query($_pagi_sqlConta);
								// Si ocurrió error y mostrar errores esta activado
							 	if($_pagi_result2 == false && $_pagi_mostrar_errores == true){
									die (" Error en la consulta de conteo de registros: $_pagi_sqlConta. Mysql dijo: <b>".mysql_error()."</b>");
							 	}
							 	$_pagi_totalReg = mysql_result($_pagi_result2,0,0);//total de registros
							 }else{
								$_pagi_result3 = mysql_query($_pagi_sql);
								// Si ocurrió error y mostrar errores esta activado
							 	if($_pagi_result3 == false && $_pagi_mostrar_errores == true){
									die (" Error en la consulta de conteo alternativo de registros: $_pagi_sql. Mysql dijo: <b>".mysql_error()."</b>");
							 	}
								$_pagi_totalReg = mysql_num_rows($_pagi_result3);
							 }
							 // Calculamos el numero de paginas (saldra un decimal)
							 // con ceil() redondeamos y $_pagi_totalPags sera el numero total (entero) de paginas que tendremos
							 $_pagi_totalPags = ceil($_pagi_totalReg / $_pagi_cuantos);
							
							//------------------------------------------------------------------------
							
							
							/*
							 * Propagacion de variables por el URL.
							 *------------------------------------------------------------------------
							 */
							 // La idea es pasar tambien en los enlaces las variables hayan llegado por url.
							 //$_pagi_enlace = $_SERVER['PHP_SELF'];
							 
							 
							 $_pagi_query_string = "?";
							 
							 if(!isset($_pagi_propagar)){
							 	//Si no se definió que variables propagar, se propagara todo el $_GET (por compatibilidad con versiones anteriores)
								$_pagi_propagar = array_keys($_GET);
							 }elseif(!is_array($_pagi_propagar)){
								// si $_pagi_propagar no es un array... grave error!
								die("<b>Error Paginator : </b>La variable \$_pagi_propagar debe ser un array");
							 }
							 // Este foreach esta tomado de la Clase Paginado de webstudio
							 // (http://www.forosdelweb.com/showthread.php?t=65528)
							 foreach($_pagi_propagar as $var){
							 	if(isset($GLOBALS[$var])){
									// Si la variable es global al script
									$_pagi_query_string.= $var."=".$GLOBALS[$var]."&";
								}elseif(isset($_REQUEST[$var])){
									// Si no es global (o register globals esta en OFF)
									$_pagi_query_string.= $var."=".$_REQUEST[$var]."&";
								}
							 }
							
							 // Añadimos el query string a la url.
							 //$_pagi_enlace .= $_pagi_query_string;
							// echo "<p>_pagi_enlace = $_pagi_enlace</p>";
							//------------------------------------------------------------------------
							
							
							//MIGUEL esto lo hago para saber si estoy en una pagina con el htaccess. 
							//porque entonces la propagacion de las variables para los enlaces de paginacion seria distinta
							if (!$_pagi_htaccess){
							
							
							
								/*
								 * Generacion de los enlaces de paginacion.
								 *------------------------------------------------------------------------
								 */
								 // La variable $_pagi_navegacion contendra los enlaces a las paginas.
								 $_pagi_navegacion_temporal = array();
								 if ($_pagi_actual != 1){
									// Si no estamos en la pagina 1. Ponemos el enlace "anterior"
									$_pagi_url = $_pagi_actual - 1; //sera el numero de pagina al que enlazamos
									$_pagi_navegacion_temporal[] = "<li><a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."".$_pagi_url."'>$_pagi_nav_anterior</a></li>";
								 }
								 
								 // La variable $_pagi_nav_num_enlaces sirve para definir cuantos enlaces con 
								 // numeros de pagina se mostraran como maximo.
								 // Ojo: siempre se mostrara un numero impar de enlaces. Mas info en la documentacion.
								 
								 if(!isset($_pagi_nav_num_enlaces)){
									// Si no se definió la variable $_pagi_nav_num_enlaces
									// Se asume que se mostraran todos los numeros de pagina en los enlaces.
									$_pagi_nav_desde = 1;//Desde la primera
									$_pagi_nav_hasta = $_pagi_totalPags;//hasta la ultima
								 }else{
									// Si se definió la variable $_pagi_nav_num_enlaces
									// Calculamos el intervalo para restar y sumar a partir de la pagina actual
									$_pagi_nav_intervalo = ceil($_pagi_nav_num_enlaces/2) - 1;
									
									// Calculamos desde que numero de pagina se mostrara
									$_pagi_nav_desde = $_pagi_actual - $_pagi_nav_intervalo;
									// Calculamos hasta que numero de pagina se mostrara
									$_pagi_nav_hasta = $_pagi_actual + $_pagi_nav_intervalo;
									
									// Ajustamos los valores anteriores en caso sean resultados no validos
									
									// Si $_pagi_nav_desde es un numero negativo
									if($_pagi_nav_desde < 1){
										// Le sumamos la cantidad sobrante al final para mantener el numero de enlaces que se quiere mostrar. 
										$_pagi_nav_hasta -= ($_pagi_nav_desde - 1);
										// Establecemos $_pagi_nav_desde como 1.
										$_pagi_nav_desde = 1;
									}
									// Si $_pagi_nav_hasta es un numero mayor que el total de paginas
									if($_pagi_nav_hasta > $_pagi_totalPags){
										// Le restamos la cantidad excedida al comienzo para mantener el numero de enlaces que se quiere mostrar.
										$_pagi_nav_desde -= ($_pagi_nav_hasta - $_pagi_totalPags);
										// Establecemos $_pagi_nav_hasta como el total de paginas.
										$_pagi_nav_hasta = $_pagi_totalPags;
										// Hacemos el ultimo ajuste verificando que al cambiar $_pagi_nav_desde no haya quedado con un valor no valido.
										if($_pagi_nav_desde < 1){
											$_pagi_nav_desde = 1;
										}
									}
								 }
							
								 for ($_pagi_i = $_pagi_nav_desde; $_pagi_i<=$_pagi_nav_hasta; $_pagi_i++){//Desde pagina 1 hasta ultima pagina ($_pagi_totalPags)
									if ($_pagi_i == $_pagi_actual) {
										// Si el numero de pagina es la actual ($_pagi_actual). Se escribe el numero, pero sin enlace y en negrita.
										$_pagi_navegacion_temporal[] = "<li class='active'><a class='is-active'".$_pagi_nav_estilo_mod.">$_pagi_i</a></li>";
									}else{
										// Si es cualquier otro. Se escibe el enlace a dicho numero de pagina.
										$_pagi_navegacion_temporal[] = "<li><a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."".$_pagi_i."'>".$_pagi_i."</a></li>";
									}
								 }
								
								 if ($_pagi_actual < $_pagi_totalPags){
									// Si no estamos en la ultima pagina. Ponemos el enlace "Siguiente"
									$_pagi_url = $_pagi_actual + 1; //sera el numero de pagina al que enlazamos
									$_pagi_navegacion_temporal[] = "<li> <a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."".$_pagi_url."'>$_pagi_nav_siguiente</a></li>";
								 }
								 $_pagi_navegacion = implode($_pagi_separador, $_pagi_navegacion_temporal);
							
								 
								 
								 
								 
							}else{
								//ESTOY EN UN HTACCESS
								//MIGUEL voy a propagar las variables de paginacion de una manera distinta
								// La variable $_pagi_navegacion contendra los enlaces a las paginas.
								//echo "<p>_pagi_enlace = $_pagi_enlace</p>";
								 if (isset($_pagi_htaccess_termina_html)){
								 	$_pagi_enlace = substr($_SERVER['REQUEST_URI'],0,strpos($_SERVER['REQUEST_URI'],".html"));
									$_pagi_ext_terminacion = "html";
								 }else{
								 	if (strpos($_pagi_enlace,"index.php")===false){
										$_pagi_enlace = substr($_SERVER['REQUEST_URI'],0,strpos($_SERVER['REQUEST_URI'],".php"));
										$_pagi_ext_terminacion = "php";
										//echo "<p>_pagi_enlacex = $_pagi_enlace</p>";
									}else{
										$_pagi_enlace = "index";
										$_pagi_ext_terminacion = "php";
									}
								 }
								 //voy a ver si tenemos un pg_x porque esto no me interesa que este en la variable $_pagi_enlace
								 if (strpos($_pagi_enlace,"_pg"))
								 	$_pagi_enlace = substr($_pagi_enlace,0,strpos($_pagi_enlace,"_pg"));
								// echo "<p>_pagi_enlace = $_pagi_enlace</p>";
								
								 $_pagi_navegacion_temporal = array();
								 if ($_pagi_actual != 1){
									// Si no estamos en la pagina 1. Ponemos el enlace "anterior"
									$_pagi_url = $_pagi_actual - 1; //sera el numero de pagina al que enlazamos
									if ($_pagi_url!=1)
										$_pagi_navegacion_temporal[] = "<li><a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."_pg".$_pagi_url."." . $_pagi_ext_terminacion . "'>$_pagi_nav_anterior</a></li>";
									else
										$_pagi_navegacion_temporal[] = "<li><a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."." . $_pagi_ext_terminacion . "'>$_pagi_nav_anterior</a></li>";
								 }
								 
								 // La variable $_pagi_nav_num_enlaces sirve para definir cuantos enlaces con 
								 // numeros de pagina se mostraran como maximo.
								 // Ojo: siempre se mostrara un numero impar de enlaces. Mas info en la documentacion.
								 
								// ASUMO QUE no se definió la variable $_pagi_nav_num_enlaces
								// Se asume que se mostraran todos los numeros de pagina en los enlaces.
								$_pagi_nav_desde = 1;//Desde la primera
								$_pagi_nav_hasta = $_pagi_totalPags;//hasta la ultima
								 
								 for ($_pagi_i = $_pagi_nav_desde; $_pagi_i<=$_pagi_nav_hasta; $_pagi_i++){//Desde pagina 1 hasta ultima pagina ($_pagi_totalPags)
									if ($_pagi_i == $_pagi_actual) {
										// Si el numero de pagina es la actual ($_pagi_actual). Se escribe el numero, pero sin enlace y en negrita.
										$_pagi_navegacion_temporal[] = "<span ".$_pagi_nav_estilo_mod.">$_pagi_i</span>";
									}else{
										// Si es cualquier otro. Se escibe el enlace a dicho numero de pagina.
										if ($_pagi_i!=1)
											$_pagi_navegacion_temporal[] = "<li><a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."_pg".$_pagi_i."." . $_pagi_ext_terminacion . "'>".$_pagi_i."</a></li>";
										else
											$_pagi_navegacion_temporal[] = "<li><a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."." . $_pagi_ext_terminacion . "'>".$_pagi_i."</a></li>";
									}
								 }
								
								 if ($_pagi_actual < $_pagi_totalPags){
									// Si no estamos en la ultima pagina. Ponemos el enlace "Siguiente"
									$_pagi_url = $_pagi_actual + 1; //sera el numero de pagina al que enlazamos
									$_pagi_navegacion_temporal[] = "<li><a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."_pg".$_pagi_url."." . $_pagi_ext_terminacion . "'>$_pagi_nav_siguiente</a></li>";
								 }
								 $_pagi_navegacion = implode($_pagi_separador, $_pagi_navegacion_temporal);
							}
							//------------------------------------------------------------------------
							
							
							/*
							 * Obtencion de los registros que se mostraran en la pagina actual.
							 *------------------------------------------------------------------------
							 */
							 // Calculamos desde que registro se mostrara en esta pagina
							 // Recordemos que el conteo empieza desde CERO.
							 $_pagi_inicial = ($_pagi_actual-1) * $_pagi_cuantos;
							 
							 // Consulta SQL. Devuelve $cantidad registros empezando desde $_pagi_inicial
							 $_pagi_sqlLim = $_pagi_sql." LIMIT $_pagi_inicial,$_pagi_cuantos";
							 $_pagi_result = mysql_query($_pagi_sqlLim);
							 // Si ocurrió error y mostrar errores esta activado
							 if($_pagi_result == false && $_pagi_mostrar_errores == true){
							 	die ("Error en la consulta limitada: $_pagi_sqlLim. Mysql dijo: <b>".mysql_error()."</b>");
							 }
							
							//------------------------------------------------------------------------
							
							
							/*
							 * Generacion de la informacion sobre los registros mostrados.
							 *------------------------------------------------------------------------
							 */
							 // Numero del primer registro de la pagina actual
							 $_pagi_desde = $_pagi_inicial + 1;
							 
							 // Numero del ultimo registro de la pagina actual
							 $_pagi_hasta = $_pagi_inicial + $_pagi_cuantos;
							 if($_pagi_hasta > $_pagi_totalReg){
							 	// Si estamos en la ultima pagina
								// El ultimo registro de la pagina actual sera igual al numero de registros.
							 	$_pagi_hasta = $_pagi_totalReg;
							 }
							 
							 $_pagi_info = " <span class=fuente8><b>Se muestran desde el $_pagi_desde hasta el $_pagi_hasta de un total de $_pagi_totalReg paginas</b></span>";
							 $_pagi_info_scripts = " <span class=fuente8><b>Encontrados $_pagi_totalReg scripts. Se muestran desde el $_pagi_desde hasta el $_pagi_hasta.</b></span>";
							 $_pagi_info_articulos = " <span class=fuente8><b>Encontrados $_pagi_totalReg articulos. Se muestran desde el $_pagi_desde hasta el $_pagi_hasta.</b></span>";
							//------------------------------------------------------------------------
							
							
							/**
							 * Variables que quedan disponibles despues de incluir el script via include():
							 * ------------------------------------------------------------------------
							 
							 * $_pagi_result		Identificador del resultado de la consulta a la BD para los registros de la pagina actual. 
							 				Listo para ser "pasado" por una funcion como mysql_fetch_row(), mysql_fetch_array(), 
											mysql_fetch_assoc(), etc.
														
							 * $_pagi_navegacion		Cadena que contiene la barra de navegacion con los enlaces a las diferentes paginas.
							 				Ejemplo: "<<anterior 1 2 3 4 siguiente>>".
														
							 * $_pagi_info			Cadena que contiene informacion sobre los registros de la pagina actual.
							 				Ejemplo: "desde el 16 hasta el 30 de un total de 123";				
							
							*/ 
							
							return $d= array("datos"=>$_pagi_result, "paginacion"=> $_pagi_navegacion);
}
?>