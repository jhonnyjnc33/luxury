<?php 
error_reporting(0);
date_default_timezone_set('America/Los_Angeles');

require $_SERVER['DOCUMENT_ROOT'].'/cls/mpdf/mpdf.php';

$id="1";

if(isset($_GET['id'])&&!empty($_GET['id'])){
    $id=$_GET['id'];
}


include("includes/login.php");
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
if(!empty($img_c)){
        
        
            foreach ($img_c as $im){ 

            	if($x >= 4){break; }

                $imagen_ca.= '
                                <td style="width:33%">
                                    <img src="https://admin.luxurycancunandriviera.com/images/producto_img/'.$im["imagen"].'"  width="100%" >
                                </td>'
                ;

                 $x++;

                

               
            }
        
        

    }else{
            $imagen_ca='<img src="/assets/img/noImagen.png" class="imgdestination" />';
            $sk='<img src="/assets/img/noImagen.png" class="imgdestination" />';
    }
//print_r($condo);
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

 $content='
<html style="width: 100%; background: #000; padding:0;>
<head>
<meta charset="utf-8">
</head>
<body style="width: 100%; background: #000; padding:0;>
<table style="width: 100%; background: #000; padding:15px;" >
        <tr style="padding: 20px;">
            <td width="30%" style="padding: 15px;">
                <div style="padding: 15px;">
                <img src="http://admin.luxurycancunandriviera.com/images/logo.png" width="10%" style="margin-left: 20px; display: block; ">
                </div>
            </td>
            <td width="70%" align="right" style="margin-right:20px; padding-right: 20px;">
                <p style="padding-right: 160px; display: block; text-align: right;color: #fff; font-family: "Courier New", Courier, monospace; font-weight: bold;">Desde</p>
                <p  style="color: #99aec9;text-align:  right;font-size: 40px;font-family: "Courier New", Courier, monospace; font-weight: bold;"><span>$</span>'.number_format($condo['precio']).' '.$moneda.'</p>
            </td>
        </tr>
    </table>
 <table style="width:100%; margin: 0 auto">
        <tr><td>
            <table>
                <tr>
                    <td style="background: #99aec9;width:30%;padding: 30px">
                        <p style="font-size: 30px;color:#fff;font-family: Oswald, sans-serif;">'.$condo['nombre_esp'].'</p>
                        <hr style="width: 50px;border-top: 3px solid #fff;margin: 30px 0;" />
                    </td>
                    <td style="width:70%">
                        <img src="'.$imgBanner.'" width="100%" >
                    </td>
                </tr>
            </table>
        </td></tr>
    </table>
    <table style="width:100%;margin: 0 auto">
        <tr><td>
            <table>
                <tr>
                    '.$imagen_ca.'
                </tr>
            </table>
        </td></tr>
    </table>
    
    <table style="width:100%; margin: 0 auto">
        <tr><td>
        <div style="border-bottom: 1px solid #e6e6e6; padding: 0 5px 0 0; margin: 0 0 20px 0; ">
            <h2 style="color: #313131; width: 800px;">'.$condo['nombre_esp'].' asdas</h2>
        </div>
        <div style="width: 50px; height: 3px; background: #94adc1;"></div>
        <p style="text-align: justify; margin-top: 10px; font-size: 13px; color: #313131;">'.$condo["descripcion_esp_corta"].'</p> 
        <ul class="lista">
            <li>Cine</li>
            <li>Gymnasio</li>
            <li>Kids Room</li>
            <li>Spa</li>
            <li>Golf</li>
            <li>Alberca</li>
            <li>Marina</li>
            <li>Beach Club</li>

        </ul>
        </td></tr>
    </table>
    <table style="width:100%;margin: 0 auto">
        <tr><td>
         <h2 style="border-bottom: 2px solid #e6e6e6; padding: 0 5px 0 0; margin: 0; color: #313131;">CONTACTO</h2>
        <div style="width: 50px; height: 3px; background: #94adc1;"></div>
        <table style="font-size: 13px; margin-top: 20px;">
            <tr>
                <td width="33.3333%">
                    info@luxurycancunandriviera.com
                    www.luxurycancunandriviera.com
                </td>
                <td width="33.3333%">
                    facebook.com/luxurycancunandriviera
                   instagram.com/luxurycancunandriviera
                </td>
                <td width="33.3333%">
                    www.luxurycancunandriviera.com 
                </td>
            </tr>
        </table>
    </td></tr>
    </table>
</table>
</body>
</html>
';
echo $content;
exit();



        //$pie = "<p>Luxury Cancún And Riviera</p>";
        $mpdf=new mPDF("P");
        //$mpdf = new FPDF('P', 'mm', 'A4');
        /*$mpdf->SetMargins(0,0,0);
        $mpdf->SetLeftMargin(0);
        $mpdf->SetRightMargin(0);*/
        //$mpdf->SetDisplayMode('real');
        //$mpdf->SetTopMargin(0);        

        
        //$mpdf->SetHTMLHeader($cabecera);
        //$mpdf->SetHTMLFooter($pie);

$mpdf->WriteHTML($content,2);  




$filename = "inmuebles-".$id.".pdf";
$mpdf->Output($filename,"F");
/*<a href="/inmuebles-<?=$id?>.pdf" target="_blank">Ver pdf</a>*/
?>
<script type="">
window.location.href="<?=$filename?>";
</script>



