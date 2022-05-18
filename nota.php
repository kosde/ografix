<?php
session_start();
$id_order  = $_GET["order"];
require_once __DIR__ . '/vendor/autoload.php';
include 'php/conexion.php';

$result = mysqli_query($conexion,"SELECT * FROM orders WHERE id='$id_order'");
if(mysqli_num_rows($result)>0)
{
    $extraido           = mysqli_fetch_array($result);
    $id                 = $extraido['id'];
    $id_user            = $extraido['id_user'];
    $width_inches       = $extraido['width_inches'];
    $height_inches      = $extraido['height_inches'];
    $price              = $extraido['price'];
    $tipe               = $extraido['tipe'];
    $quantity           = $extraido['quantity'];
    $id_images          = $extraido['id_images'];
    $id_images_vuelta   = $extraido['id_images_vuelta'];
    $txt_details        = $extraido['txt_details'];
    $date               = $extraido['dates'];
    $delivery_date      = $extraido['delivery_date'];
    $statusp            = $extraido['statusp'];
    $id_address         = $extraido['id_address'];
    $guie               = $extraido['guie'];
    $shipping           = $extraido['shipping'];
    $envio  	        = $extraido['envio'];
    $vista 		        = $extraido['vista'];
    $acabado            = $extraido['acabado'];
    $esquinas           = $extraido['esquinas'];
    $ponchado           = $extraido['ponchado'];
    $corte              = $extraido['corte'];
    $id_control         = $extraido['id_control'];
    $pagado             = $extraido['pagado'];
    $n_referencia       = $extraido['n_referencia'];
    $id_cupon           = $extraido['id_cupon'];
    
    $fecha_L            = date_create($date);
    $diassemana         = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
    $meses              = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    $fechaCompleta      = $fecha_L->format('d').' de '.$meses[$fecha_L->format('n')-1]. ' del '.$fecha_L->format('Y');
    if($envio == "con")
    {
        $shipping_price = 100;
    }
    else
    {
        $shipping_price = 0;
    }

} 
$cantidad_descuento = 0;
if($id_cupon != 0)
{
    $validar  = mysqli_query($conexion,"SELECT * FROM cupones WHERE id='$id_cupon'");
    if(mysqli_num_rows($validar)>0)
    {
        $extraido0      = mysqli_fetch_array($validar);
        $cantidad_descuento       = $extraido0['cantidad'];
    }
}

$mpdf = new \Mpdf\Mpdf();
$stylesheet = file_get_contents('nota.css');
$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
$GRFX = preg_replace('/[^0-9]/', '', $id_control);
$LIKE = "%".$GRFX."%";

$result_mas = mysqli_query($conexion,"SELECT * FROM orders WHERE id_control LIKE '$LIKE' ORDER BY id_control ASC");
//$productos = $LIKE;

$suma = 0;
if(mysqli_num_rows($result_mas)>0)
{
    //$productos = " result+1 " . $productos;
    while($extraido2= mysqli_fetch_array($result_mas))
    {
        //$productos = " while " . $productos;
        $id                 = $extraido2['id'];
        $id_user            = $extraido2['id_user'];
        $width_inches       = $extraido2['width_inches'];
        $height_inches      = $extraido2['height_inches'];
        $price              = $extraido2['price'];
        $tipe               = $extraido2['tipe'];
        $quantity           = $extraido2['quantity'];
        $id_images          = $extraido2['id_images'];
        $id_images_vuelta   = $extraido2['id_images_vuelta'];
        $txt_details        = $extraido2['txt_details'];
        $date               = $extraido2['dates'];
        $delivery_date      = $extraido2['delivery_date'];
        $statusp            = $extraido2['statusp'];
        $id_address         = $extraido2['id_address'];
        $guie               = $extraido2['guie'];
        $shipping           = $extraido2['shipping'];
        $envio  	        = $extraido2['envio'];
        $vista 		        = $extraido2['vista'];
        $acabado            = $extraido2['acabado'];
        $esquinas           = $extraido2['esquinas'];
        $ponchado           = $extraido2['ponchado'];
        $corte              = $extraido2['corte'];
        $id_control         = $extraido2['id_control'];
        $pagado             = $extraido2['pagado'];
        $n_referencia       = $extraido2['n_referencia'];
        $id_cupon           = $extraido2['id_cupon'];
        $suma               += $price;
        if($vista == "frentevuelta")
        {
            $FrenteOVuelta = "4/4";
        }
        else
        {
            $FrenteOVuelta = "4/0";
        }
        if($tipe == "Tarjetas")
        {
            $produc = "TDV";
            if($acabado == "mate")
            {
                $terminado = "Acabado Mate";
            }
            else
            {
                $terminado = "Acabado Barniz UV brillante";
            }
            
            $esquinas = str_split($esquinas);
            if($esquinas[0] == 1)
            {
                $esq1 = 1;
            }
            else
            {
                $esq1 = "";
            }
            if($esquinas[1] == 1)
            {
                $esq2 = 2;
                if($esq1 ==1)
                    $esq1 = $esq1."/";
            }
            else
            {
                $esq2 = "";
            }
            if($esquinas[2] == 1)
            {
                $esq3 = 3;
                if($esq1 ==1)
                    $esq1 = $esq1."/";
                if($esq2 ==1)
                    $esq2 = $esq2."/";
            }
            else
            {
                $esq3 = "";
            }
            if($esquinas[3] == 1)
            {
                $esq4 = 4;
                if($esq1 ==1)
                    $esq1 = $esq1."/";
                if($esq2 ==1)
                    $esq2 = $esq2."/";
                if($esq3 ==1)
                    $esq3 = $esq3."/";
                
            }
            else
            {
                $esq4 = "";
            }
            if($esq1!="" || $esq2!="" || $esq3!="" || $esq4!="")
            {
                $codigo_esqred = "Esquinas Redondas ".$esq1.$esq2.$esq3.$esq4;
            }else
            {
                $codigo_esqred = "";
            }


            $ponchado = str_split($ponchado);
            if($ponchado[0] == 1)
            {
                $ponch1 = 1;
            }
            else
            {
                $ponch1 = "";
            }
            if($ponchado[1] == 1)
            {
                $ponch2 = 2;
            }
            else
            {
                $ponch2 = "";
            }
            if($ponchado[2] == 1)
            {
                $ponch3 = 3;
            }
            else
            {
                $ponch3 = "";
            }
            if($ponchado[3] == 1)
            {
                $ponch4 = 4;
            }
            else
            {
                $ponch4 = "";
            }
            if($ponchado[4] == 1)
            {
                $ponch5 = 5;
            }
            else
            {
                $ponch5 = "";
            }
            if($ponchado[5] == 1)
            {
                $ponch6 = 6;
            }
            else
            {
                $ponch6 = "";
            }
            if($ponchado[6] == 1)
            {
                $ponch7 = 7;
            }
            else
            {
                $ponch7 = "";
            }
            if($ponchado[7] == 1)
            {
                $ponch8 = 8;
            }
            else
            {
                $ponch8 = "";
            }
            if($ponch1!="" || $ponch2!="" || $ponch3!="" || $ponch4!=""||$ponch5!="" || $ponch6!="" || $ponch7!="" || $ponch8!="")
            {
                $codigo_ponchado = "Ponchado ".$ponch1.$ponch2.$ponch3.$ponch4.$ponch5.$ponch6.$ponch7.$ponch8;
            }else{
                $codigo_ponchado = "";
            }
            $codigo = $quantity." Tarjetas de presentación <br>".$terminado." ".$FrenteOVuelta."<br>".$codigo_esqred."<br>".$codigo_ponchado;    
        }
        if($tipe == "Volantes") 
        {
            if($height_inches == 0)
            {
                $tam = "Tamaño Carta";
            }else
            {
                $tam = "Tamaño" . $width_inches ."/". $height_inches." Carta";
            }
            $codigo = $tam. " <br>Qty: ".$quantity."<br>".$FrenteOVuelta." ".$acabado;
        }
        $productos = $productos .
        '<tr>
            <td style="text-align: left;padding-left:30px;">'.$id_control.'</td>
            <td style="text-align: left;">'.$tipe.'</td>
            <td style="text-align: left;">'.$codigo.'</td>
            <td style="text-align: right;padding-right:30px;">$'.$price.'</td>
        </tr>
        <tr>
            <td style="text-align: left;padding-left:30px;"></td>
            <td style="text-align: left;"></td>
            <td style="text-align: left;"></td>
            <td style="text-align: right;padding-right:30px;"></td>
        </tr>
        ';
    }
}

/*
<td style="text-align: left;padding-left:30px;">'.$tipe.'</td>
                    <td style="text-align: left;">'.$width_inches."cm x ".$height_inches.'cm <br> Cantidad:'.$quantity.' <br></td>
*/

$subtotal = $suma;
$descuento = ($subtotal/100)*$cantidad_descuento;
$total = $subtotal - $descuento +  $shipping_price;
$iva = $total/100*16;
$sub = $total-($total/100*16);
$mpdf->WriteHTML(
    '
        <table style="width:100%;font-family:\'gotham-medium\'">
            <tr style="font-family:\'gotham-medium\'">
                <th><img src="/img/ografix logoweb.png" width="170" height="50"></th>
                <th style="width:52%;"></th>
                <th style="width:30%;font-family:\'gotham-light\';">'.$fechaCompleta.' <br><br>Orden GRFX'.$GRFX.'</th>
            </tr>
        </table> 
        
        <div style="padding-top:30px;"></div>
        <div style="border-radius: 5px;border: 1px solid #cdd7d6;padding-top:30px;padding-bottom:30px;">
            <table style="width:100%">
                <tr>
                    <th style="text-align: left;padding-left:30px;">ID</th>
                    <th style="text-align: left;">Producto</th>
                    <th style="text-align: left;">Descripción</th>
                    <th style="text-align: right;padding-right:30px;">Precio</th>
                </tr>
                '.$productos.'
            </table> 
        </div>
        <div style="padding-top:10px;"></div>
        <div style="text-align: right;">
        <table style="width:100%">
                <tr>
                    <th style="text-align: right;">Envio</th>
                    <td style="text-align: right;">$ '.$shipping_price.'</td>
                </tr>
                <tr>
                    <th style="text-align: right;">Descuento</th>
                    <td style="text-align: right;">$ '.$descuento.'</td>
                </tr>
                <tr>
                    <th style="text-align: right;">Subtotal</th>
                    <td style="text-align: right;">$ '.$sub.'</td>
                </tr>
                <tr>
                    <th style="text-align: right;">IVA</th>
                    <td style="text-align: right;">$ '.$iva.'</td>
                </tr>
                <tr>
                    <th style="text-align: right;">Total</th>
                    <td style="text-align: right;">$ '.$total.'</td>
                </tr>
            </table> 
        </div>
    ');
$mpdf->SetHTMLFooter('
<table width="100%">
    <tr>
        <td>ografix</td>
    </tr>
    <tr>
        <td width="50%">Nicolás Zapata 120 <br> Col. Centro, 78000 <br> San Luis Potosí S.L.P.</td>
        <td width="50%" style="text-align: right;">ografix.com</td>
    </tr>
</table>');
$mpdf->Output();

?>  