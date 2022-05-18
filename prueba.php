<?php
session_start();
date_default_timezone_set('UTC');
date_default_timezone_set("America/Mexico_City");
setlocale(LC_TIME, 'spanish');
$id_order  = $_GET["order"];
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;
?>
 <!doctype html>
   <html lang="en">
   <head>
     <meta charset="utf-8">
     <title>Ografix</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport">
     <meta content="" name="keywords">
     <meta content="" name="description">
     <!-- 5-=DXbZ]Ggah -->
     <link href="img/ICONO.png" rel="icon">
     <link href="img/ICONO.png" rel="apple-touch-icon">
     <?php
     include "css.php";
     ?>
    <script>
        function Phone_number()
        {
            var modal = document.getElementById("Phone_number");
            modal.style.display = "flex";
        }
        function ClosePhone_number()
        {
            var modal = document.getElementById("Phone_number");
            modal.style.display = "none";
        }
        var input = document.querySelector("#telephone");
        window.intlTelInput(input,({   }));

        $("#telephone").intlTelInput({   });
    </script>
    <style>
        .avatar-img
        {
            width: 30px !important;
            height: 30px !important;
        }
        p{
            color: black;
            margin: 0;
        }
        .colorsecondary{
            background: rgba(240, 101, 0, 0.75) none repeat scroll 0 0;
        }
    </style>
</head>
<body data-spy="scroll" data-target="#navbar-example" class="estaciones">
<?php
        include 'php/conexion.php';
        require_once "vendor/autoload.php";
		require_once "config_cloud.php";
        $query_order  = "SELECT * FROM orders WHERE id='$id_order'";
        $order_result = mysqli_query($conexion,$query_order);
        if(mysqli_num_rows($order_result)>0)
        {
            $extraido= mysqli_fetch_array($order_result);
            $id_user        = $extraido['id_user'];
            $width_inches   = $extraido['width_inches'];
            $height_inches  = $extraido['height_inches'];
            $price          = $extraido['price'];
            $tipe           = $extraido['tipe'];
            $quantity       = $extraido['quantity'];
            $id_images      = $extraido['id_images'];
            $txt_details    = $extraido['txt_details'];
            $dates          = $extraido['dates'];
            $statusp        = $extraido['statusp'];
            $id_address     = $extraido['id_address'];
        }

        

        $query_noti  = "SELECT * FROM notifications WHERE id_user='$id_user'";
        $noti_result = mysqli_query($conexion,$query_noti);
        if(mysqli_num_rows($noti_result)>0)
        {
            $extraido2       = mysqli_fetch_array($noti_result);
            $proofing_sms   = $extraido2['proofing_sms'];
            if($proofing_sms == 1)
            {
                $query_usr  = "SELECT * FROM users WHERE id='$id_user'";
                $usr_result = mysqli_query($conexion,$query_usr);
                if(mysqli_num_rows($usr_result)>0)
                {
                    $extraido3       = mysqli_fetch_array($usr_result);
                    $phone          = $extraido3['phone'];
                    $code           = $extraido3['code'];
                    $emailusr           = $extraido3['email'];
                    $_SESSION['id'] = $id_user;
                    $_SESSION['proof'] = $id_order;
                }
            }
        }
        
        if($_SESSION['measurement']==0 || !isset($_SESSION['measurement']))
        {
            $width_inches  =  $extraido['width_inches']." cm";
            $height_inches =  $extraido ['height_inches']." cm";
        }
        $query_coments  = "SELECT * FROM coments WHERE id_orders='$id_order' AND put='1'";
        $coments_result = mysqli_query($conexion,$query_coments);
        $cont_coments=0;
        if(mysqli_num_rows($coments_result)>0)
        {
            $cont_coments=mysqli_num_rows($coments_result);
        }
?>
<?php 
      include "header.php";
?>
    <main class="container" style="width: min-content ;margin: auto;height: 100vh;display: table;">
        <div class="container" style="padding: 100px 0 100px 0;">
            <div class="proof-header">
                <?php
                if($statusp==2)
                {
                ?>
                <div div="header_ready" class="header-approved" id="final_size">
                    <img class="img_approved" alt="Approved" src="img/approved.png">
                    <div class="size-info" id="size-info" style="text-align: center;">El tamaño final es <?php echo $width_inches; ?> x <?php echo $height_inches;?></div>
                </div>
                <?php
                }
                if($statusp==0 || $statusp==1 && mysqli_num_rows($coments_result)>1)
                {
                ?>
                <div div="header_ready" class="header-approved" id="final_size">
                    <div class="size-info" id="size-info" style="text-align: center;">El tamaño es <?php echo $width_inches; ?> x <?php echo $height_inches;?></div>
                </div>
                <?php
                }
                
                if($cont_coments != 0 && $cont_coments >3)
                {
                ?>
                <div id="no_ready" style="display: inline-block;width: 100%;">
                    <h1 style="width: 75%;margin: auto;text-align: center;">Tu prueba estara lista pronto</h1>
                    <?php
                    if($proofing_sms==1)
                    {
                    ?>
                        <span class="line-item-details font-light" style="width: 100%;display: inline-block;">Te notificaremos por correo cuando este lista . SMS notifications will also be sent to:</span>
                        <span class="font-light" style="display: inline-block;">+ <?php echo " ".$code." ".$phone." "; ?></span>
                    <a class="link" onclick="Phone_number()" style="cursor:pointer;color: #2b71b8;font-size: 15px;font-weight: 700;font-size: 1rem;text-decoration: none;background-color: transparent;">Edit</a>
                    <?php
                    }
                    if($proofing_sms==0)
                    {
                    ?>
                        <span class="line-item-details font-light" style="width: 100%;display: inline-block;">Te notificaremos por correo cuando este lista.</span>
                    <?php
                    }
                    ?>
                    
                </div>
                <?php
                }
                if(mysqli_num_rows($coments_result)==1)
                {
                ?>
                <div id="no_ready" style="display: inline-block;width: 100%;padding: 100px 0px;">
                    <h1 style="width: 75%;margin: auto;text-align: center;">Tu prueba estara lista pronto</h1>
                </div>
                <?php
                }
                if($statusp==4)
                {
                ?>
                <div div="header_ready" class="header-approved" id="final_size">
                    <img class="img_approved" alt="Approved" src="img/x.png">
                    <img class="img_approved" alt="Approved" src="img/cancelled.png" style="height: 400px;position: absolute;z-index: 99;padding: 0 15%;">
                </div>
                <?php
                }
                ?>
            </div>
            <?php
                if(mysqli_num_rows($coments_result)>0)
                {
                    $query_coments2  = "SELECT * FROM coments WHERE id_orders='$id_order' AND put='1' AND link!=''";
                    $result2 = mysqli_query($conexion,$query_coments2);
                    $cont_r=mysqli_num_rows($result2);
                    $conta=1;
                    while ($coments= mysqli_fetch_array($result2))
                    {
                        //id	id_orders	coment_usr	 	coment_client 	date_coment	file_coment	link
                        $id_orders    = $coments['id_orders'];
                        $coment_usr   = $coments['coment_usr'];
                        $coment_client= $coments['coment_client'];
                        $date_coment  = $coments['date_coment'];
                        $file_coment  = $coments['file_coment'];
                        $link         = $coments['link'];
                        if($cont_r==$conta)
                        {

                        ?>

                            <?php
                            if( $tipe == "Tarjetas")
                            {
                            ?>
                                <div style="width: 100%;height: 300px;padding: 50px 0;">
                                    <div style="width: 9cm;height: 5cm;margin: auto;">
                                        <img alt="" style=" filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.7));max-width: 50%;height: 5cm !important;width: 9cm !important;position: absolute;" id="proof-image"  src="<?php echo $link; ?>">
                                        <img src="img/prueba_tarjeta/marco.png" alt="marco"  style="height:5cm !important;width: 9cm !important;position: absolute;">
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                           
                        <?php
                            
                        }
                        $conta++;
                    }
                }
                if(mysqli_num_rows($coments_result)>1 && $statusp!=2 && $statusp!=4)
                {
                    ?>
                    <div class="feedback">
                        <div id="comentario" class="AorC">
                            <form  method="post" style="text-align: center;">
                                    <button type="submit" class="content button secondary colorsecondary large" name="approve" value="approve" >Aprobar</button>
                            </form>
                            
                            <?php
                                if(isset($_POST['approve'])){
                                    include 'php/conexion.php';
                                    
                                    mysqli_query($conexion,"UPDATE orders SET statusp = '2' WHERE id='$id_order'");
                                    $comentNO = 0;
                                    $coment_usr= "Aprobado";
                                    $date = date('Y-m-d H:i');
                                    $query_comentf = "INSERT INTO coments (id_orders,  coment_usr,  coment_client, 	date_coment,link, put)
                                                                 VALUES('$id_order', '$coment_usr','$comentNO',   '$date',    '$link','1')";
                                    $verificar_coment = mysqli_query($conexion, $query_comentf);
                                    //id 	id_user 	name_image 	width_inches 	height_inches 	dates 	tipe 	link 
                                    $query_artwork = "INSERT INTO artworks (id_user,    name_image,   width_inches,  height_inches,	 dates,   tipe,    link,   id_order )
                                                                   VALUES('$id_user', '$namefile',  '$width_inches','$height_inches','$date','$tipe','$link','$id_order')";
                                    $verificar_coment = mysqli_query($conexion, $query_artwork);
                                    
                                    /*Correo Acme*/
                                    //$linkverifica = "https://www.acmestickers.com/proof.php?order=".$id_order;
                                    $query         = "SELECT * FROM orders WHERE id ='$id_order'";
                                    $result_address= mysqli_query($conexion,$query);
                                    $extraido2     = mysqli_fetch_array($result_address);
                                    $id_address    = $extraido2['id_address'];
                                    $delivery_date = $extraido2['delivery_date'];

                                    $query_address = "SELECT * FROM address_t WHERE id='$id_address'";
                                    $result_address= mysqli_query($conexion,$query_address);
                                    $extraido3     = mysqli_fetch_array($result_address);
                                    $country       = $extraido3['country'];
                                    $name          = $extraido3['full_name'];
                                    $company       = $extraido3['company'];
                                    $address1      = $extraido3['street_address1'];
                                    $address2      = $extraido3['street_address2'];
                                    $locality      = $extraido3['city'];
                                    $state         = $extraido3['statedir'];
                                    $zip_code      = $extraido3['zip_code'];
                                    $query_images  = "SELECT * FROM images WHERE id ='$id_images'";
                                    $result_images = mysqli_query($conexion,$query_images);
                                    $extraido4     = mysqli_fetch_array($result_images);
                                    $name_image    = $extraido4['nombre'];
                                    $extension     = pathinfo($name_image , PATHINFO_EXTENSION);
                                    $nombre_base   = basename($name_image , '.'.$extension);  
                                    $tag           = cl_image_tag($name_image,  array('flags'=>'attachment:'.$nombre_base, 'fetch_format'=>$extension));
                                    //echo $tag;
                                    
                                    preg_match('/ src=(".*?"|\'.*?\'|.*?)[ >]/i', $tag, $m);
                                    $src = $m[1];
                                    $to = "orders@acmestickers.com";
                                    $subject = "The order AS$id_order is approved";
                                    $message = "Information:<br>
                                                <br>
                                                AS$id_order<br>
                                                Size:    $width_inches\" x $height_inches\" <br>
                                                Tipe:    $tipe<br>
                                                Price:   $price<br>
                                                Qty:     $quantity<br>
                                                Details: $txt_details<br>
                                                Date received: $date<br>
                                                Approx delivery date: $delivery_date<br>
                                                <br>
                                                <br>
                                                Ship to:
                                                ".$company." <br>
                                                ".$name." <br>
                                                ".$address1." ". $address2.  "<br>
                                                ".$locality.", " .$state." ". $zipcode."<br>
                                                ".$country. "<br>
                                                <br>
                                                <br>
                                                <a href='https://acmestickers.com/admin/order_details.php?order=".$id_order."'>Click here</a><br>
                                                ";
                                    //            <a href=".$src.">Download Original</a>";
                                    require('php/phpmailer/class.phpmailer.php');

                                    $mail = new PHPMailer();
                                    $mail->IsSMTP();
                                    $mail->SMTPDebug = 1;
                                    $mail->Debugoutput = 'html';
                                    $mail->SMTPAuth = TRUE;
                                    $mail->SMTPSecure = "ssl";
                                    $mail->Port     = 465;  
                                    $mail->Username = "info@acmestickers.com";
                                    $mail->Password = "H5s8v7SeftZkK9J";
                                    $mail->Host     = "acmestickers.com";
                                    $mail->Mailer   = "smtp";
                                    $mail->SetFrom("info@acmestickers.com","Acme Stickers");
                                    $mail->AddAddress($to);	
                                    $mail->addStringAttachment(file_get_contents($link), $id_order."_proof.png");
                                    $mail->Subject = $subject;
                                    $mail->Body    = $message;
                                    
                                    $mail->WordWrap   = 80;
                                    /*$mail->IsHTML(true);
                                    if(!$mail->Send())
                                    {
                                        $msg = "<p class='error'>Problem in Sending Mail.</p>";
                                    }
                                    else 
                                    {
                                        $msg = "<p class='success'>Mail Sent Successfully.</p>";
                                    }*/

                                    $from = "info@acmestickers.com";
                                    $to = $emailusr;
                                    
                                    $subject = "Order status";
                                    $message = "Hi ". $name .",<br>
                                                <br>
                                                Your order AS".$id_order." your order has been approved <br>
                                                <br>
                                                <br>
                                                Thanks,<br><br>
                                                Acme Sticker<br>
                                                <br>
                                                <!DOCTYPE html>
                                                <html lang='es'>
                                                <head>
                                                    <meta charset='utf-8'>
                                                    <title>Reset your password</title>
                                                </head>
                                                <body>
                                                <table style='max-width: 800px; padding: 10px; margin:0 auto; border-collapse: collapse;'>
                                                    <tr>
                                                        <td>
                                                            <div style='color: #34495e; margin: 4% 4% 2%; text-align: justify;font-family: sans-serif'>                                                                  
                                                                <table class='x_w220 x_textcenter' cellspacing='0' cellpadding='0' border='0' align='center'>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <img style='width: 100%;' data-imagetype='External' src='https://www.acmestickers.com/assets/traking/approved.png'> 
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                </body>
                                                </html>";

                                    $headers = "From: Acme Stickers <info@acmestickers.com>"  . "\r\n". "Reply-To: info@acmestickers.com" . "\r\n" . "X-Mailer: PHP/" . phpversion() . "\r\n" .
                                    $headers .= "MIME-Version: 1.0" . "\r\n";
                                    $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";

                                    $mail = new PHPMailer();
                                    $mail->IsSMTP();
                                    $mail->SMTPDebug = 1;
                                    $mail->Debugoutput = 'html';
                                    $mail->SMTPAuth = TRUE;
                                    $mail->SMTPSecure = "ssl";
                                    $mail->Port     = 465;  
                                    $mail->Username = "info@acmestickers.com";
                                    $mail->Password = "H5s8v7SeftZkK9J";
                                    $mail->Host     = "acmestickers.com";
                                    $mail->Mailer   = "smtp";
                                    $mail->SetFrom("orders@acmestickers.com","Acme Stickers");
                                    $mail->AddAddress($to);	
                                    $mail->Subject = $subject;
                                    $mail->Body    = $message;
                                    $mail->WordWrap   = 80;
                                   /* $mail->IsHTML(true);
                                    if(!$mail->Send()) {
                                        $msg = "<p class='error'>Problem in Sending Mail.</p>";
                                    } else {
                                        $msg = "<p class='success'>Mail Sent Successfully.</p>";
                                    }*/
                                    /*mail($to,$subject,$message, $headers);*/
                                    $userdata      = mysqli_query($conexion,"SELECT * FROM users WHERE id='$id_user'");
                                    if(mysqli_num_rows($userdata)>0)
                                    {
                                        //deals_browser 	deals_sms 	deals_email 	alerts_sms 	alerts_email 	proofing_sms 	proofing_email 
                                        $extraido23      = mysqli_fetch_array($userdata);
                                        $usrname         =  $extraido23['usrname'];
                                        $phone           =  $extraido23['phone'];
                                        $code            =  $extraido23['code'];
                                    }
                                    
                                    $notif      = mysqli_query($conexion,"SELECT * FROM notifications WHERE id_user='$id_user'");
                                    if(mysqli_num_rows($notif)>0)
                                    {
                                        //deals_browser 	deals_sms 	deals_email 	alerts_sms 	alerts_email 	proofing_sms 	proofing_email 
                                        $extraido2      = mysqli_fetch_array($notif);
                                        $id_n           =  $extraido2['id'];
                                        $id_usern       =  $extraido2['id_user'];
                                        $deals_browser  =  $extraido2['deals_browser'];
                                        $deals_sms      =  $extraido2['deals_sms'];
                                        $deals_email    =  $extraido2['deals_email'];
                                        $alerts_sms     =  $extraido2['alerts_sms'];
                                        $alerts_email   =  $extraido2['alerts_email'];
                                        $proofing_sms   =  $extraido2['proofing_sms'];
                                        $proofing_email =  $extraido2['proofing_email'];
                                    }
                                    $sms_txt = "Hi ". $usrname .", \n\nYour order AS".$id_order." your order has been approved.\n\n\nThanks,\nAcme Sticker";
                                    
                                    //"Hi ". $usrname ."\n\nWe received your order AS$id_order.\n\n\nThanks,\nAcme Sticker";
                                    if($proofing_sms==1)
                                    {
                                        $sDestination ="+".$code.$phone;
                                        $account_sid = 'ACddfb48d031bf54554a1e68221e105f4f';
                                        $auth_token = 'a24a7c2cc899eb2d8d7749ced756ed8d';
                                        $twilio_number = "+12052739743";

                                        $client = new Client($account_sid, $auth_token);
                                        $client->messages->create(
                                            $sDestination,
                                            array(
                                                'from' => $twilio_number,
                                                'body' => $sms_txt
                                            )
                                        );
                                    }

                                    mysqli_close($conexion);
                                    echo'
                                        <script>
                                            window.location = "ordenes?order='.$id_order.'";
                                        </script>
                                        ';                               
                                    exit;
                                    
                                }
                            ?>

                            <div style="text-align: center;padding: 10px;">
                                <p class="font-mediums" class="or_proof" style="margin-bottom: 0px;text-align: center;">O &nbsp;</p>
                                <button  data-toggle="collapse" data-target="#feedback_txt" style="text-align: center;margin-top: 10px;" class="button secondary tiny changes_proof" >Solicitar cambios</button> 
                                <!--<a type="button"data-toggle="collapse" data-target="#feedback_txt" class="link" href="" style="text-align: center;">Request Changes</a>-->
                            </div>
                        </div>
                        <form id="feedback_txt" action="php/send_coment.php" method="get" class="collapse" style="margin-top: 10px;">
                            <textarea class="txtfeedback fontlight" name="textfeedback" cols="40" rows="6" required style="width: 100%;"></textarea>
                            <input style="display:none;" type="text" name="order" value="<?php echo $id_order;?>">
                            <div class="AorC" style="margin-bottom: 40px;text-align: center;display: inline-block;">
                                <button type="submit" class="button secondary tiny" style="display: inline-block;" >Enviar comentario</button> 
                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12" style="display: inline-flex;padding-right: 0px !important;padding-left: 0px !important;">
                                    <label class="input-group-btn" >
                                        <input id="fileimage" type="hidden" name="size" value="1000000">
                                        <span class="button secondary tiny" style="width: 100%;">
                                            Examinar <input accept="image/jpeg,image/png,application/pdf,image/vnd.adobe.photoshop,
                                            application/x-photoshop,application/photoshop,application/psd,image/psd" class="inputfile" type="file" 
                                            name="Imagen" id="Imagen" onchange="document.getElementById('file-name').value = this.files[0].name">
                                        </span>
                                    </label>
                                </div>
                                <p class="font-mediums" style="margin-bottom: 0px;display: inline-block;">O &nbsp;</p>
                                <a type="button" data-toggle="collapse" data-target="#feedback_txt" class="link" href="" style="text-align: center;">Cancelar</a>
                            </div>
                        </form>
                    </div>
                <?php
                }
                ?>
            <div class="proof-summary">
                <?php
                    echo "<h6 style='display: inline-block;' class='font-mediums'>Orden</h6><a class='link' href='https://www.acmestickers.com/proof.php?order=$id_order'>&nbsp;GRFX$id_order</a>";
                ?>
                
                <div class="line-item-row" type="button" data-toggle="collapse" data-target="#details">
                        <strong style="padding-right:5px;">Detalles</strong>
                        <i class="icon fa fa-angle-down "></i>
                </div>
                <div id="details" class="">
                    <div class="details-group">
                        <form  method="post">
                            <span class="line-item-details font-light" style="width: 100%;display: inline-block;"><?php echo $tipe;?></span>
                            <span class="line-item-details font-light" style="width: 100%;display: inline-block;"><?php echo "Tamaño: ".$width_inches." x ".$height_inches." ";?></span>
                            <span class="line-item-details font-light" style="width: 100%;display: inline-block;"><?php echo "Cantidad: ".$quantity;?> </span>
                            <!--<a href="" type="button submit" class="link" style="float: right;" name="cancel" value="cancel">Cancel this item</a>-->
                            <?php
                            if($statusp == 1 || $statusp == 0)
                            {
                                ?>
                                <button type="submit" class="link" style="float: right;" name="cancel" value="cancel">Cancelar pedido</button>
                                <?php
                            }
                            ?>
                        </form>
                        <?php
                                if(isset($_POST['cancel'])){
                                    include 'php/conexion_be.php';
                                    $datezone=date_default_timezone_get();
                                    $date_Now = date('Y-m-d H:i');
                                    mysqli_query($conexion,"UPDATE orders SET statusp = '4',date_cancel='$date_Now' WHERE id='$id_order'");
                                    $query    = "SELECT * FROM orders WHERE id ='$id_order'";
                                    $result = mysqli_query($conexion,$query);
                                    $extraido= mysqli_fetch_array($result);
                                    $id            = $extraido['id'];
                                    $id_user       = $extraido ['id_user'];
                                    $width_inches  = $extraido['width_inches'];
                                    $height_inches = $extraido ['height_inches'];
                                    $price         = $extraido['price'];
                                    $tipe          = $extraido ['tipe'];
                                    $quantity      = $extraido['quantity'];
                                    $id_images     = $extraido ['id_images'];
                                    $txt_details   = $extraido['txt_details'];
                                    $date          = $extraido['dates'];
                                    $statusp       = $extraido['statusp'];
                                    $id_address    = $extraido['id_address'];
                                    $to = "orders@acmestickers.com";
                                    $subject = "The order AS$id_order was cancelled";
                                    $message = "New order information:<br>
                                                <br>
                                                AS$id_order<br>
                                                Size:    $width_inches\" x $height_inches \" <br>
                                                Tipe:    $tipe<br>
                                                Price:   $price<br>
                                                Qty:     $quantity<br>
                                                Details: $txt_details<br>
                                                Date received: $date<br>
                                                Approx delivery date: $delivery_date<br>
                                                <br>
                                                <br>";
                                    require('php/phpmailer/class.phpmailer.php');
                                    $mail = new PHPMailer();
                                    $mail->IsSMTP();
                                    $mail->SMTPDebug = 1;
                                    $mail->Debugoutput = 'html';
                                    $mail->SMTPAuth = TRUE;
                                    $mail->SMTPSecure = "ssl";
                                    $mail->Port     = 465;  
                                    $mail->Username = "info@acmestickers.com";
                                    $mail->Password = "H5s8v7SeftZkK9J";
                                    $mail->Host     = "acmestickers.com";
                                    $mail->Mailer   = "smtp";
                                    $mail->SetFrom("info@acmestickers.com","Acme Stickers");
                                    $mail->AddAddress($to);	
                                    $mail->Subject = $subject;
                                    $mail->Body    = $message;
                                    $mail->WordWrap   = 80;
                                    $mail->IsHTML(true);
                                    if(!$mail->Send()) {
                                        $msg = "<p class='error'>Problem in Sending Mail.</p>";
                                    } else {
                                        $msg = "<p class='success'>Mail Sent Successfully.</p>";
                                    }
                                    mysqli_close($conexion);
                                    echo'
                                        <script>
                                            window.location = "../proof.php?order='.$id_order.'";
                                        </script>
                                        ';                               
                                    exit;
                                    
                                }
                            ?>
                    </div>
                </div>
            </div>
            <div class="proof-timeline">
                <h3>Historial</h3>
                <?php
                 $query_coments_proof  = "SELECT * FROM coments WHERE id_orders='$id_order' AND put='1' AND link!=''";
                 $coments_result_proof = mysqli_query($conexion,$query_coments_proof);
                 $cant_result_proof=mysqli_num_rows($coments_result_proof);
                 //echo $cant_result_proof;
                 $query_coments  = "SELECT * FROM coments WHERE id_orders='$id_order' AND put='1' ORDER BY id DESC";
                 $coments_result = mysqli_query($conexion,$query_coments);
                 $cont_coments=mysqli_num_rows($coments_result);
                 $contprof=1;
                 $contusr=1;
                 $contclient=1;
                 $contGen = 1;
                if($cont_coments>0)
                {
                    while ($coments= mysqli_fetch_array($coments_result))
                    {
                        //id	id_orders	coment_usr	 	coment_client 	date_coment	file_coment	link  namefile	put
                        $id_orders    = $coments['id_orders'];
                        $coment_usr   = $coments['coment_usr'];
                        $coment_client= $coments['coment_client'];
                        $date_coment  = $coments['date_coment'];
                        $file_coment  = $coments['file_coment'];
                        $link         = $coments['link'];
                        $namefile     = $coments['namefile'];
                        $put          = $coments['put'];
                        $date_coment = date_create($date_coment);
                        $date_coment = date_format($date_coment,"F j h:i");
                        $date_coment = strftime("%d de %B del %G", strtotime($date_coment));
                        if($cont_coments<=2)
                        {
                            if($coment_client==0)
                            {
                            ?>
                                <div class="timeline-event">
                                    <?php
                                    if(isset($_SESSION['avatar']) && $_SESSION['avatar']!="")
                                    {
                                    ?>
                                        <img class="avatar-img" src="data:image/png;base64,<?php echo base64_encode($_SESSION['avatar']);?>" width="30" height="30">
                                    <?php
                                    }else
                                    {
                                    ?>
                                        <img class="avatar-img" src="/img/avatar.png" width="30" height="30">
                                    <?php
                                    }
                                    if($contusr == 1)
                                    {
                                        ?>
                                        <div class="timeline-content">
                                            <p>
                                                <strong><?php echo $_SESSION['name'];?></strong>
                                                <span class="timeline-timestamp fontlight"><?php echo $date_coment; ?></span>
                                            </p>
                                            <div>
                                                <p class="subject fontlight">Subió archivo:</p>
                                                <p class="subject fontlight"><strong><?php echo $namefile;?></strong></p>
                                                <p class="subject fontlight timeline-timestamp" style="margin: 0;padding-top: 10px;">Producto: <?php echo $tipe;?></p>
                                                <p class="subject fontlight timeline-timestamp" style="margin: 0;">Tamaño: <?php echo $width_inches;?> x <?php echo $height_inches;?></p>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            <?php   
                            }
                            if($coment_client==1)
                            {                            
                            ?>
                                <div class="timeline-event">
                                    <img alt="ografix" class="avatar-img" src="img/ICONO.png" width="30" height="30" style="position: absolute;">
                                    <div class="timeline-content" style="padding-left: 45px;">
                                        <p><strong>ografix</strong><span class="timeline-timestamp fontlight" style="display: block;"><?php echo $date_coment; ?></span></p>
                                        <div>
                                        <?php
                                            if($link=="")
                                            {
                                            ?>
                                                <p class="subject fontlight"><?php echo $coment_usr;?></p>
                                            <?php
                                            $contprof++;
                                            }
                                            if($link!="")
                                            {
                                            ?>
                                                <p class="subject fontlight"><?php echo $coment_usr;?> Prueba <?php echo $contprof?></p>
                                                <img class="" src="<?php echo $link;?>" style="width: 10%;filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.7));">
                                                <br>
                                                <p class="subject fontlight timeline-timestamp" style="margin: 0;padding-top: 10px;">Producto: <?php echo $tipe;?></p>
                                                <p class="subject fontlight timeline-timestamp" style="margin: 0;">Tamaño: <?php echo $width_inches;?> x <?php echo $height_inches;?></p>
                                            <?php
                                            $contprof++;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                        }
                        if($cont_coments>2)
                        {
                            if($coment_client==0)
                            {
                            ?>
                                <div class="timeline-event">
                                    <?php
                                    if(isset($_SESSION['avatar']) && $_SESSION['avatar'] != null)
                                    {
                                    ?>
                                        <img class="avatar-img" src="data:image/png;base64,<?php echo base64_encode($_SESSION['avatar']);?>" width="30" height="30">
                                    <?php
                                    }else
                                    {
                                    ?>
                                        <img class="avatar-img" src="/img/avatar.png" width="30" height="30">
                                    <?php
                                    }
                                    if($coment_usr == "Approved")
                                    {
                                        ?>
                                        <div class="timeline-content">
                                            <p>
                                                <strong ><?php echo $_SESSION['name'];?></strong>
                                                <span class="timeline-timestamp fontlight"><?php echo $date_coment; ?></span>
                                            </p>
                                            <div>
                                                <p class="subject fontlight" style="margin: 0;padding-top: 10px;" >Comentó prueba con:</p>
                                                <?php
                                                    if($coment_usr!="")
                                                    {
                                                        ?>
                                                        <p class="subject fontlight">"<?php echo $coment_usr;?>"</p>
                                                        <?php
                                                    }
                                                    ?>
                                            </div>
                                        </div>
                                        <?php
                                    }elseif($contGen == $cont_coments)
                                    {
                                        ?>
                                        <div class="timeline-content">
                                            <p>
                                                <strong><?php echo $_SESSION['name'];?></strong>
                                                <span class="timeline-timestamp fontlight"><?php echo $date_coment; ?></span>
                                            </p>
                                            <div>
                                                <p class="subject fontlight">Subió archivo:</p>
                                                <p class="subject fontlight"><strong><?php echo $namefile;?></strong></p>
                                                <p class="subject fontlight timeline-timestamp" style="margin: 0;padding-top: 10px;">Product: <?php echo $tipe;?></p>
                                                <p class="subject fontlight timeline-timestamp" style="margin: 0;">Size: <?php echo $width_inches;?> x <?php echo $height_inches;?></p>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    else
                                    {
                                    ?>
                                    <div class="timeline-content">
                                        <p>
                                            <strong ><?php echo $_SESSION['name'];?></strong>
                                            <span class="timeline-timestamp fontlight"><?php echo $date_coment; ?></span>
                                        </p>
                                        <div>
                                            <p class="subject fontlight" style="margin: 0;padding-top: 10px;" >Rechazó prueba <?php echo $cant_result_proof;?> con:</p>
                                            <?php
                                                if($coment_usr!="")
                                                {
                                                    ?>
                                                    <p class="subject fontlight">"<?php echo $coment_usr;?>"</p>
                                                    <?php
                                                }
                                                ?>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    $contusr++;
                                    ?>
                                </div>
                            <?php  
                            }
                            if($coment_client==1)
                            {                            
                            ?>
                                <div class="timeline-event">
                                    <img alt="ografix" class="avatar-img" src="img/ICONO.png" width="30" height="30" style="position: absolute;">
                                    <div class="timeline-content" style="padding-left: 45px;">
                                        <p><strong>ografix</strong><br><span class="timeline-timestamp fontlight" style="display: block;"><?php echo $date_coment; ?></span></p>
                                        <div>
                                        <?php
                                        if($contGen == $cont_coments-1)
                                        {
                                            ?>
                                            <div>
                                                <p class="subject fontlight">Creó prueba:<?php echo $cant_result_proof;?></p>
                                                <img class="" src="<?php echo $link;?>" style="width: 10%;filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.7));">
                                                <br>
                                                <p class="subject fontlight"><strong><?php echo $namefile;?></strong></p>
                                                <p class="subject fontlight timeline-timestamp" style="margin: 0;padding-top: 10px;">Producto: <?php echo $tipe;?></p>
                                                <p class="subject fontlight timeline-timestamp" style="margin: 0;">Tamaño: <?php echo $width_inches;?> x <?php echo $height_inches;?></p>
                                            </div>
                                            <?php
                                            $cant_result_proof--;
                                        } 
                                        else
                                        {
                                            if($link=="")
                                            {
                                            ?>
                                                <!--
                                                    https://res.cloudinary.com/dgnrey9it/image/upload/co_rgb:4fdc10,e_outline:20/v1615923061/numeros
                                                -->
                                                <?php
                                                if($coment_usr!="")
                                                {
                                                    ?>
                                                    <p class="subject fontlight">"<?php echo $coment_usr;?>"</p>
                                                    <?php
                                                }
                                                ?>
                                                
                                                <img class="" src="<?php echo $link;?>" style="width: 10%;filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.7));">
                                                <br>
                                                <p class="subject fontlight timeline-timestamp" style="margin: 0;">Producto: <?php echo $tipe;?></p>
                                                <p class="subject fontlight timeline-timestamp" style="margin: 0;">Tamaño: <?php echo $width_inches;?> x <?php echo $height_inches;?></p>
                                            <?php
                                            $contprof++;
                                            }
                                            if($link!="")
                                            {
                                            ?>
                                                <p class="subject fontlight">Creó prueba: <?php echo $cant_result_proof;?></p>
                                                <img class="" src="<?php echo $link;?>" style="width: 10%;filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.7));">
                                                <br>
                                                <p class="subject fontlight timeline-timestamp" style="margin: 0;padding-top: 10px;">Producto: <?php echo $tipe;?></p>
                                                <p class="subject fontlight timeline-timestamp" style="margin: 0;">Tamaño: <?php echo $width_inches;?> x <?php echo $height_inches;?></p>
                                                <?php
                                                if($coment_usr!="")
                                                {
                                                    ?>
                                                    <p class="subject fontlight">"<?php echo $coment_usr;?>"</p>
                                                    <?php
                                                }
                                                $cant_result_proof--;
                                                ?>
                                            <?php
                                            $contprof++;
                                            }
                                            $contclient++;
                                        }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            $contGen++;
                        }
                    }
                }
               ?>
            </div>
        </div>   
        <script src="build/js/intlTelInput.js"></script>
        <script>
            var input = document.querySelector("#phone");
            var iti = window.intlTelInput(input, 
            {
                preferredCountries: ['us','mx'],
                // separateDialCode: true,
                utilsScript: "build/js/utils.js",
            });
            //
            // listen to the address dropdown for changes
            input.addEventListener('change', function() {
            //iti.setCountry(this.value);
            var countryData = iti.getSelectedCountryData();
            document.getElementById("code").value=countryData['dialCode'];
            });
        </script>
    </main>
<?php include "footer.php"; ?>
<script src="js/jquery-3.5.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="js/bootsnav/bootsnav.js"></script>
<script src="js/script.js"></script>
</body>
</html>

