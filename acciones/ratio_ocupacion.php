<?php
session_start();
include("../cls/funciones.php");
include("../cls/conexion.php");
$categoria= devuelve_campo_c("nombre_categoria_cliente", "categoria_cliente", "id_categoria_cliente", $_POST["categoria_cliente"], $link);
$inicio = new DateTime($_POST["fecha"]);
	$fin = new DateTime($_POST["fecha2"]);
	$a=0;
	$tabla.='
		<table class="table table-striped table-bordered table-hover" id="tabla">
                                      <thead> 
										<th>A&ntilde;o</th>
										<th>Mes</th>
										<th>Porcentaje</th>
									</thead>
	';
	 while ($inicio <= $fin) {
	 	$a++;
		$anio= $inicio->format('Y');
		$mes= $inicio->format('m');
		$mes= ltrim($mes, "0");
		$q='SELECT * FROM porcentajes where anio= '.$anio.' and mes= '.$mes.' and categoria_id_cliente='.$_POST["categoria_cliente"].' and zona_id='.$_POST["zona_cliente"];
		$qq= mysql_query($q, $link);
		$qqq= mysql_fetch_array($qq);
		$mes_dato= mes($mes);
		if($qqq["valor"]==""){
			$valor= 'No existen dados de este mes en la Base de datos con respecto a la categoria de este hotel que es <strong>'.$categoria."</strong>";
		}else{
			$valor= $qqq["valor"]."%";
		}
		$tabla.= '
				<tr>
					<td>
					'.$anio.'
					</td>
					<td>
						'.$mes_dato["texto"].'
					</td>
					<td>
						'.$valor.' 
					</td>
				</tr>
		';
		$total+= $qqq["valor"];
		$inicio->modify('+ 1 month');
	}
	$tabla.='
		
     </table> 
	';
	print $tabla;
	 $porcentaje= $total/$a ;
	

?>