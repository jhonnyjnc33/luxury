<?php 
error_reporting(0);
ini_set('display_errors', 0);
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
date_default_timezone_set('America/Los_Angeles');


include("cls/fpdf182/fpdf.php");

$id="1";

if(isset($_GET['id'])&&!empty($_GET['id'])){
    $id=$_GET['id'];
}


include($_SERVER['DOCUMENT_ROOT']."/cls/funciones.php");
include($_SERVER['DOCUMENT_ROOT']."/cls/conexion.php");
$condo= datos_individuales_i($link, "inmuebles", "id_producto", $_GET["id"]);

 $i= mostrar_img($link, $_GET["id"], "producto", "listado");
    if(!empty($i)){
        foreach ($i as $ii){
            $imgBanner= 'http://admin.luxurycancunandriviera.com/images/producto_img/'.$ii["imagen"].'';
        }
    }else{
        $imgBanner='/assets/img/img-item-thumb-01.jpg" class="imgdestination"';
    }
$img_c= mostrar_img($link, $_GET["id"], "producto", "galeria_producto");
$x=1;
$imagen_ca=array();

if(!empty($img_c)){
        
        
            foreach ($img_c as $im){ 

            	if($x >= 4){break; }

                $imagen_ca[]= 'https://admin.luxurycancunandriviera.com/images/producto_img/'.$im["imagen"];
                

                 $x++;

                

               
            }
        
        

    }else{           
            $imagen_ca[]= 'http://admin.luxurycancunandriviera.com/images/noImagen.jpg';
            $imagen_ca[]= 'http://admin.luxurycancunandriviera.com/images/noImagen.jpg';
            $imagen_ca[]= 'http://admin.luxurycancunandriviera.com/images/noImagen.jpg';
            $sk='<img src="/assets/img/noImagen.png" class="imgdestination" />';
    }
    $a_r= all($link, "r_amenidad_inmueble", "where inmueble_id=".$_GET["id"]." ");

    $amenidadLista=array();

    foreach ($a_r as $value) {
          $amenidadName=devuelve_campo_c("nombre_esp", "amenidades", "id_amenidad", $value["amenidad_id"], $link);
          $amenidadLista[]=$amenidadName;
    }
//exit();
$to= all($link, "tipoOperacion", "order by nombre asc");
$tipoInmueble= all($link, "tipoInmueble", "order by nombre asc");
$pais= all($link, "paises", "order by nombre asc");
$estado= all($link, "estados", "where pais=".$condo["pais"]." order by nombre asc");
$ciudad= all($link, "ciudad", "where estado_id=".$condo["estado"]." order by nombre asc");
$cp= all($link, "cp", "where ciudad_id=".$condo["ciudad"]." group by cp ");
$reg= all($link, "cp", "where  cp=".$condo["cp"]." group by cp ");
$amenidades= all($link, "amenidades", "where tipoAmenidad=1 order by nombre_esp asc");
$ame= all($link, "amenidades", "where tipoAmenidad=2 order by nombre_esp asc");
$s= all($link, "amenidades", "where tipoAmenidad=3 order by nombre_esp asc");
$e= all($link, "amenidades", "where tipoAmenidad=4 order by nombre_esp asc");
$moneda= all($link, "moneda", "order by nombre");
$amu= all($link, "amueblado", "order by nombre");
$edadIn= all($link, "edadInmueble", "order by edad");
$a_r= all($link, "r_amenidad_inmueble", "where inmueble_id=".$_GET["id"]." ");
foreach ($a_r as $value) {
    $a_rr[]=$value["amenidad_id"];
}
$typeConstruction= all($link, "typeContruction", "order by value asc");

$moneda="usd";

if($condo["precioMonedaId"]==2)
    $moneda="mxn"; 

if(strlen($condo['nombre_esp'])>28)
    $nombreprop = substr($condo['nombre_esp'],0,28)."...";
else
    $nombreprop = $condo['nombre_esp'];



$pdf = new FPDF();
$pdf->SetMargins(0,0,0);
$pdf->AddPage();
$pdf->SetAutoPageBreak();
$pdf->SetFillColor(0,0,0);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFont('Courier','B',12);

$pdf->Cell(0,4,'',1,1,'C',true);
$pdf->Cell(0,20,'',1,2,'C',true);
$pdf->Image('http://admin.luxurycancunandriviera.com/images/logo-pdf.png',4,4,35,20,'PNG');

$pdf->Cell(175,5,'Desde',1,0,'R',true);
$pdf->Cell(35,5,'',1,1,'R',true);

if($condo['precio']>0){
    $pdf->SetTextColor(140, 181, 222);
    $pdf->SetFont('Courier','B',16);
    $pdf->Cell(170,10,'',1,0,'R',true);
    $pdf->Cell(25,10,"$".number_format($condo['precio']),1,0,'L',true);
    $pdf->SetFont('Courier','B',12);
    $pdf->Cell(15,10,$moneda,1,1,'L',true);
}
else
{
    $pdf->SetTextColor(140, 181, 222);
    $pdf->SetFont('Courier','B',12);
    $pdf->Cell(170,10,'',1,0,'R',true);
    $pdf->Cell(40,10,'No disponible',1,1,'L',true);

}

$pdf->SetTextColor(255, 255, 255);

$pdf->SetFillColor(140, 181, 222);
$pdf->SetDrawColor(140, 181, 222);
$pdf->Cell(4,104,'',1,0,'L',true);
$pdf->Cell(0,104,$nombreprop ,1,1,'L',true);
$pdf->SetDrawColor(255, 255, 255);
$pdf->Line(5,95,20,95);
$pdf->Image($imgBanner,100,39,117,104,'JPG');

$pdf->SetFillColor(0,0,0);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetDrawColor(0,0,0);
$pdf->SetFont('Courier','B',12);

$pdf->Cell(0,60,'',1,1,'L',true);
$pdf->Image($imagen_ca[0],0,143,72,60,'JPG');
$pdf->Image($imagen_ca[1],72,143,72,60,'JPG');
$pdf->Image($imagen_ca[2],144,143,72,60,'JPG');


$pdf->Cell(0,5,'',1,1,'C',true);

$pdf->Cell(0,10,$condo['nombre_esp'],1,1,'L',true);
$pdf->SetDrawColor(140, 181, 222);
$pdf->Cell(0,0,'',1,1,'L',true);

$pdf->SetFillColor(0,0,0);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetDrawColor(0,0,0);
$pdf->SetFont('Courier','B',12);

$pdf->SetFont('Courier','B',8);
$pdf->Cell(0,3,utf8_decode($condo["descripcion_esp_corta"]),1,1,'L',true);

$pdf->Cell(0,5,'',1,1,'L',true);

if(count($amenidadLista)>0){
$indiceam=1;
foreach ($amenidadLista as $ameni) {

    if($indiceam%4==0)
        $pdf->Cell(70,3,utf8_decode($ameni),1,1,'C',true);
    else
        $pdf->Cell(70,3,utf8_decode($ameni),1,0,'C',true);

    $indiceam++;
}
}
else{

$pdf->Cell(0,3,'',1,1,'L',true);
$pdf->Cell(0,3,'',1,1,'L',true);
$pdf->Cell(0,3,'',1,1,'L',true);
$pdf->Cell(0,3,'',1,1,'L',true);
$pdf->Cell(0,3,'',1,1,'L',true);
$pdf->Cell(0,3,'',1,1,'L',true);
$pdf->Cell(0,3,'',1,1,'L',true);
$pdf->Cell(0,3,'',1,1,'L',true);
$pdf->Cell(0,3,'',1,1,'L',true);
$pdf->Cell(0,3,'',1,1,'L',true);
$pdf->Cell(0,3,'',1,1,'L',true);
$pdf->Cell(0,3,'',1,1,'L',true);
$pdf->Cell(0,3,'',1,1,'L',true);
$pdf->Cell(0,3,'',1,1,'L',true);

}

$pdf->Cell(0,3,'',1,1,'L',true);

$pdf->SetFillColor(0,0,0);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetDrawColor(0,0,0);
$pdf->SetFont('Courier','B',12);

$pdf->Cell(0,10,'',1,1,'C',true);

$pdf->Cell(0,5,'Contacto',1,1,'L',true);
$pdf->SetDrawColor(140, 181, 222);
$pdf->Cell(0,0,'',1,1,'L',true);

$pdf->SetFillColor(0,0,0);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetDrawColor(0,0,0);
$pdf->SetFont('Courier','B',8);

$pdf->Cell(0,5,'info@luxurycancunandriviera.com',1,1,'C',true);
$pdf->Cell(60,5,'www.luxurycancunandriviera.com',1,0,'L',true);
$pdf->Cell(80,5,'facebook.com/luxurycancunandriviera',1,0,'C',true);
$pdf->Cell(70,5,'instagram.com/luxurycancunandriviera',1,1,'R',true);

$pdf->Cell(0,60,'',1,1,'C',true);

$filename="inmuebles-".$id.".pdf";

$pdf->Output("F",$filename,true);
?>
<script type="">
window.location.href="<?=$filename?>";
</script>