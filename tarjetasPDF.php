<?php
require_once __DIR__ . '/vendor/autoload.php';
include "php/conexion.php";
require_once "config_cloud.php";
require('phpmailer/class.phpmailer.php');
use Spipu\Html2Pdf\Html2Pdf;
$mpdf       = new \Mpdf\Mpdf();
$stylesheet = file_get_contents('admin/css/app.css');
$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
$get_id     = $_GET["order"];
$query      = "SELECT * FROM orders WHERE id ='$get_id'";
$result     = mysqli_query($conexion,$query);
if(mysqli_num_rows($result)>0)
{
    while($extraido= mysqli_fetch_array($result))
    {
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

        $query_user         = "SELECT * FROM users WHERE id='$id_user'";
        $result_user        = mysqli_query($conexion,$query_user);
        $extraido2          = mysqli_fetch_array($result_user);
        $name               = $extraido2['usrname'];
        $email              = $extraido2['email'];
        $code               = $extraido2['code'];
        $phone              = $extraido2['phone'];

        if($tipe == "Tarjetas")
        {
            $produc = "TDV";
            if($acabado == "mate")
            {
                $terminado = "MAT";
            }
            else
            {
                $terminado = "BUV";
            }
            if($vista == "frentevuelta")
            {
                $FrenteOVuelta = "4/4";
            }
            else
            {
                $FrenteOVuelta = "4/0";
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
            }
            else
            {
                $esq2 = "";
            }
            if($esquinas[2] == 1)
            {
                $esq3 = 3;
            }
            else
            {
                $esq3 = "";
            }
            if($esquinas[3] == 1)
            {
                $esq4 = 4;
            }
            else
            {
                $esq4 = "";
            }
            if($esq1!="" || $esq2!="" || $esq3!="" || $esq4!="")
            {
                $codigo_esqred = "ER".$esq1.$esq2.$esq3.$esq4;
            }else{
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
                $codigo_ponchado = "PONCH".$ponch1.$ponch2.$ponch3.$ponch4.$ponch5.$ponch6.$ponch7.$ponch8;
            }else{
                $codigo_ponchado = "";
            }
            $codigo             = "TDV".$quantity.$terminado.$FrenteOVuelta.$codigo_esqred.$codigo_ponchado;
        }
        
        

        $usr_cloud = "usr_".$id_user."/";

        $query_images  = "SELECT * FROM images WHERE id ='$id_images'";
        $result_images = mysqli_query($conexion,$query_images);
        $img_1     	   = mysqli_fetch_array($result_images);

        $name_image_1 = $img_1['nombre'];
        $images_1	 = $img_1['images'];
        $extension_1 = pathinfo($name_image_1 , PATHINFO_EXTENSION);
        $nombre_base_1 = basename($name_image_1 , '.'.$extension_1);  

        $imagen_1 = cl_image_tag($usr_cloud.$nombre_base_1,  array("flags"=>"attachment"));
        $xpath = new DOMXPath(@DOMDocument::loadHTML($imagen_1));
        $src = $xpath->evaluate("string(//img/@src)");
        $imagen_1 = cl_image_tag($usr_cloud.$nombre_base_1,array("format" => "png","width"=>300));
        if($extension_1 == "png" || $extension_1 == "jpg" || $extension_1 == "jpeg")
        {
            $application_1 ='application/'.$extension_1;
        }
        if($extension_1 == "pdf" || $extension_1 == "eps" || $extension_1 == "ai")
        {
            $application_1 ='application/'.$extension_1;
        }
        if($id_images_vuelta != 0)
        {
            $query_images_vuelta  = "SELECT * FROM images WHERE id ='$id_images_vuelta'";
            $result_images_vuelta = mysqli_query($conexion,$query_images_vuelta);
            $img_2     	   		  = mysqli_fetch_array($result_images_vuelta);
            $name_image_2 = $img_2['nombre'];
            $images_2	 = $img_2['images'];
            $extension_2 = pathinfo($name_image_2 , PATHINFO_EXTENSION);
            $nombre_base_2 = basename($name_image_2 , '.'.$extension_2);
            if($extension_2 == "png" || $extension_2 == "jpg" || $extension_2 == "jpeg")
            {
                $application_2 ='application/'.$extension_2;
            }
            if($extension_2 == "pdf" || $extension_2 == "eps" || $extension_2 == "ai")
            {
                $application_2 ='application/'.$extension_2;
            }  

            $imagen_2 = cl_image_tag($usr_cloud.$nombre_base_2,array("format" => "png","width"=>300)); 
            $prueba = '<table style="width:100%;">
                            <tr style="width:100%;">
                                <th style="width:15%;">
                                </th>
                                <th style="width:40%;">
                                    <h2 style="text-align: center;">Frente</h2>	
                                </th>
                                <th style="width:20%;">
                                    <h2 style="text-align: center;">Vuelta</h2> 
                                </th>
                            </tr>
                        </table>
                        
                        <table style="width:100%;">
                            <tr style="width:100%;">
                                <th style="width:50%;">
                                '.$imagen_1.'	
                                </th>
                                <th style="width:50%;">
                                '.$imagen_2.'     
                                </th>
                            </tr>
                        </table> '; 
        }
        else{
            $prueba = '<table style="width:100%;">
                            <tr style="width:100%;">
                                <th style="width:15%;">
                                </th>
                                <th style="width:40%;">
                                    <h2 style="text-align: center;">Frente</h2>	
                                </th>
                                <th style="width:20%;">
                                    <h2 style="text-align: center;"></h2>    
                                </th>
                            </tr>
                        </table>
                        
                        <table style="width:100%;">
                            <tr style="width:100%;">
                                <th style="width:50%;">
                                '.$imagen_1.'	
                                </th>
                                <th style="width:50%;">   
                                </th>
                            </tr>
                        </table> ';
        }
    }
}
$mpdf->WriteHTML(utf8_encode('
    <table style="width:100%;">
        <tr style="width:100%;">
            <th style="width:90%;">
                <h4 class="col-md-2">Orden</h4>
            </th>
            <th style="width:10%;">
                <h4 style="text-align: right;">'.$id_control.'</h4>
            </th>
        </tr>
    </table>
    <br>
    <br>
    <div>
        <h4 class="customerinfo" style="text-align: center;">Informacion del cliente</h4>
        <table style="width:100%;">
            <tr style="width:100%;">
                <th style="width:90%;">
                    <label class="campos">Nombre:</label><small class="field-help-message dateuser">&nbsp;&nbsp;'.$name.'</small><br>
                    <label class="campos">Correo:</label><small class="field-help-message dateuser">&nbsp;&nbsp;'.$email.'</small><br>
                    <label class="campos">Telefono:</label><small class="field-help-message dateuser">&nbsp;&nbsp;'.$phone.'</small>
                </th>
            </tr>
        </table>
    </div>
    <br>
    <br>
    <div>
        <h4 style="text-align: center;">Detalles de la orden</h4>
        <table style="width:100%;">
            <tr style="width:100%;">
                <th style="width:90%;">
                    <label class="campos">Fecha de la orden:</label><small class="field-help-message dateuser">&nbsp;&nbsp; '.$date.'</small><br>
                    <label class="campos">Fecha de entrega:</label><small class="field-help-message dateuser">&nbsp;&nbsp; '.$delivery_date.'</small><br>
                    <label class="campos"><small class="field-help-message dateuser">'.$codigo.'</small></label>
                </th>
            </tr>
        </table>
        <br>
        <br>
        <br>
        <br>
        '.$prueba.'
    </div> 
    '));



$subject = "Pedido";
$message = "Se creo una orden GRFX".$id_control."<br>
            queda pendiente la informacion de pago, se procesara hasta confirmar ticket</a> <br>
            <br>
            Gracias<br>
            <br>
            <br>
            <br>
            ";
$content = $mpdf->Output('', 'S');
$correos = array("ografix.info@gmail.com","angelhernandez@ografix.com","ografix@gmail.com");
$count = count($correos);
for($i = 0; $i<$count; $i++)
{
    $to = $correos[$i];
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug = 1;
    $mail->Debugoutput = 'html';
    $mail->SMTPAuth = TRUE;
    $mail->SMTPSecure = "ssl";
    $mail->Port     = 465;
    $mail->Username = "notificaciones@ografix.com";
    $mail->Password = "tlk3QOsEuN2.";
    $mail->Host     = "mail.ografix.com";
    $mail->Mailer   = "smtp";
    $mail->SetFrom("notificaciones@ografix.com","ografix");
    $mail->AddStringAttachment($content, $id_control.'.pdf', 'base64', 'application/pdf');
    $mail->AddStringAttachment($images_1, $name_image_1, 'base64', $application_1);
    if($id_images_vuelta != 0)
    {
        $mail->AddStringAttachment($images_2, $name_image_2, 'base64', $application_2);
    }
    $mail->AddAddress($to);	
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->WordWrap   = 80;
    $mail->CharSet = 'UTF-8';
    $mail->IsHTML(true);
    if(!$mail->Send()) {
        $msg = "<p class='error'>Problem in Sending Mail.</p>";
    } else {
        $msg = "<p class='success'>Mail  SuccessfuSentlly.</p>";
    }
}
?>