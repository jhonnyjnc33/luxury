<?php 
require_once 'cls/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

if ( ! isset($_GET['pdf']) ) {
    $content = '<html>';
    $content .= '<head>';
    $content .= '<style>';
    $content .= 'body { font-family: DejaVu Sans; }';
    $content .= '</style>';
    $content .= '</head><body>';
    $content .= '<h1>Ejemplo generaci&oacute;n PDF</h1>';
    $content .= '<a href="mvc.php?pdf=1">Generar documento PDF</a>';
    $content .= '</body></html>';
    echo $content;
    exit;
}

$content='
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Oswald:400,500,600,700|Roboto:300,400,500,700,900&display=swap" rel="stylesheet"> 
<style>
    body, html{
        font-family: "verdana", "sans-serif";
        margin: 0;
        width: 100%;
    }
    .header{
        background: #0f1110;
        padding: 30px ;
    }
    .content{
        width: 760px;
        margin: auto;
    }
    .monto{
        color: #99aec9;
        font-size: 40px;
        
    }
    .white{
        color: #fff;
    }
    .right{
        text-align: right;
    }
    p{
        margin: 0;
    }
    .namePicture{
        background: #99aec9;
    }
    .name{
        width: 30%;
        float: left;
       
    }
    .nameContent{
         padding: 30px;
        font-size: 30px;
        color: #fff;
        font-family: "Oswald", sans-serif;
    }
    .picture{
        width: 70%;
        float: left;
    }
    .clear{
        clear: both;
    }
    .separador{
        width: 50px;
        border-top: 3px solid #fff;
        margin: 30px 0;
    }
    .whiteBody{
        padding: 30px;
    }
    .fotos div{
        width: 29.333%;
        float: left;
        padding: 10px;
    }
    .blue{
        border-bottom: 10px solid #99aec9;
    }
    .gris{
        border-bottom: 10px solid #26252a;
    }
    .lista li{
        width: 33.33333%;
        float: left;
        font-size: 13px;
        margin-top: 10px;
    }
    #contacto{
        margin-top: 30px;
    }
</style>
</head>
<body>
    <table style="width: 100%; background: #000; padding: 20px;">
        <tr>
            <td width="30%">
                <img src="images/logo.png" width="150">
            </td>
            <td width="70%">
                <p class="white right " style="margin-right: 160px;">Desde</p>
                <p class="monto right" style="color: #99aec9;"><span>$</span>250,000 usd</p>
            </td>
        </tr>
    </table>
    
</body>
</html>
';

$dompdf = new Dompdf();
$dompdf->loadHtml($content);
$dompdf->setPaper('L', ''); // (Opcional) Configurar papel y orientación
$dompdf->render(); // Generar el PDF desde contenido HTML
$pdf = $dompdf->output(); // Obtener el PDF generado
$dompdf->stream("mi-documento.pdf"); // Enviar el PDF generado al navegador