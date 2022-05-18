<?php
    session_start();
    $datezone=date_default_timezone_get();
    //require __DIR__ . '/vendor/autoload.php';
    //use Twilio\Rest\Client;
?>
<!DOCTYPE html>
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
    <script src="https://kit.fontawesome.com/a38c16a07e.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
</head>
<body class="estaciones">
    <?php include "header.php"; ?>
    <?php
    if(isset($_SESSION['id']))
    {
    ?>
    <style>
        .content
        {
            height: 70vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .preloader 
        {
            position: fixed;
            display: flex;
            justify-content: center;
            width: 70px;
            height: 70px;
            border: 10px solid #eee;
            border-top: 10px solid #ffb20f;
            border-radius: 50%;
            animation-name: girar;
            animation-duration: 2s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }
        @keyframes girar 
        {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }  
    </style>
    <main class="container" style="position: relative;width: min-content !important;height: 100vh !important;" >
        <div class="content container">
            <div class="preloader "></div>
            <?php

            /*
                https://ografix.com/processing.php?
                envio=con&
                shipping_id=200&
                country_id=MX&
                name=&
                taxes=&
                shipping_price=&
                deliverytime=Martes+8+de+Marzo+del+2022&
                company=&
                address1=&
                address2=&
                locality=&
                zipcode=&
                state=San+Luis+Potos%C3%AD&
                facturar=0&
                billing_address=&
                country_id_billing=MX&
                name_billing=&
                company_billing=&
                address1_billing=&
                address2_billing=&
                locality_billing=&
                zipcode_billing=&
                state_billing=&
                discount_code=&
                paymentMethod=&
                no_referencia=1234567&
                spei_despues=no&
                size=1000000&
                ticket=13&
                attachment=&file-name=
            */
                include 'php/conexion.php';
                require_once "vendor/autoload.php";
                require_once "config_cloud.php";
                require('phpmailer/class.phpmailer.php');
                $envio     = $_POST["envio"];
                if($envio == "sin")
                {
                    $id_address = -1;
                    $id_billing = -1;
                    $guie       = -1;
                    $shipping   = -1;
                }
                else
                {
                    //transporte
                    $transporte     = $_POST["opcion_envio"];
                    $id_address     = $_POST["shipping_id"];
                    $id_billing = -1;
                    $guie       = -1;
                    $shipping   = -1;
                    //$id_billing     = $_POST["shipping_id"];
                }
                //$spei_despues = $_POST["spei_despues"];
                $shipping  = $_POST["shipping_price"];
                $total     = $_POST["total"];
                $shipping  = str_replace("$","",$shipping);
                $total     = str_replace("$","",$total);
                $id_user        = $_SESSION['id']; 
                $id_def_bill    = 0;
                $country_id     = $_POST["country_id"];
                $name           = $_POST["name"];
                if(empty($name))
                    $name = $_SESSION["usrname"];
                $company        = $_POST["company"];
                $locality       = $_POST["locality"];
                $state          = $_POST["state"];
                $stateUS        = $_POST["stateUS"];
                $address1       = $_POST["address1"];
                $address2       = $_POST["address2"];
                $zipcode        = $_POST["zipcode"];
                $email          = $_POST["email"];
                if(empty($email))
                    $email = $_SESSION["email"];
                $delivery_date  = $_POST["deliverytime"];
                $ticket  = $_POST["ticket"];
                $pagado = "si";
                
                if(isset($_POST["nombre_cliente"]))
                {
                    $nombre_cliente             = $_POST["nombre_cliente"];
                    $correo_cliente             = $_POST["|correo_cliente"];
                    $telefono_cliente           = $_POST["telefono_cliente"];
                    $email = $correo_cliente;
                    $query_mostrador = "INSERT INTO users (  usrname,   email,      phone)VALUES('$nombre_cliente','$correo_cliente','$telefono_cliente')";
                    $mostrador_result = mysqli_query($conexion,$query_mostrador);
                    $id_user = mysqli_insert_id ($conexion);
                }
                if(isset($_POST["spei_despues"]))
                {
                    $ticket ==  13;
                }
                if($ticket ==  13)
                {
                    $pagado = "no";
                }
                else{
                    $pagado = "si";                    
                }
                if(!isset($_POST["spei_despues"]) && $ticket ==  13) // cuando se envia un ticket ponerlo como pagado 
                {
                    $pagado = "si"; 
                }
                if(isset($_POST["spei_despues"]))
                {
                    if($_POST["spei_despues"] == "no")
                    {
                        $pagado =  "si";
                    }
                }
                if(isset($_POST["spei_despues"]))
                {
                    if($_POST["spei_despues"] == "despues")
                    {
                        $pagado =  "no";
                    }
                }
                if(isset($_POST["cupon_id"]))
                {  
                    $id_cupon =  $_POST["cupon_id"];
                }
                else
                {
                    $id_cupon =  0;
                }
                if(isset($_POST["cupon_activado"]))
                {
                    $codigo_cupon = $_POST["cupon_activado"];
                    $date_cupon = date('Y-m-d H:i');
                    $cupon  = mysqli_query($conexion,"UPDATE cupones SET aplicado = '$date_cupon' WHERE nombre = '$codigo_cupon'");
                }
                if($email==null)
                    $email = $_SESSION['email'];
                if(!isset($_SESSION['name']))
                {
                    $cart  = mysqli_query($conexion,"UPDATE users SET usrname = '$name', email = '$email' WHERE id = '$id_user'");
                }
                if(isset($_POST["billing_address"]))
                {
                    $country_id_billing     = $country_id;
                    $name_billing           = $name;
                    $company_billing        = $company;
                    $locality_billing       = $locality;
                    if($state!=null)
                        $state_billing          = $state;
                    else
                        $state_billing        = $stateUS;
                    $address1_billing       = $address1;
                    $address2_billing       = $address2;
                    $zipcode_billing        = $zipcode;
                    $email_billing          = $email;
                    $query_billing = "INSERT INTO billing_address (id_user,   country,      full_name,  company,   street_address1 ,street_address2, city,	   zip_code,  statedir)
                                            VALUES    ('$id_user','$country_id_billing','$name_billing',    '$company_billing','$address1_billing',     '$address2_billing',     '$locality_billing','$zipcode_billing', '$state_billing')";
                }else
                    {
                        $country_id_billing     = $_POST["country_id_billing"];
                        $name_billing           = $_POST["name_billing"];
                        $company_billing        = $_POST["company_billing"];
                        $locality_billing       = $_POST["locality_billing"];
                        $state_billing          = $_POST["state_billing"];
                        $address1_billing       = $_POST["address1_billing"];
                        $address2_billing       = $_POST["address2_billing"];
                        $zipcode_billing        = $_POST["zipcode_billing"];
                        $email_billing          = $_POST["email_billing"];
                        $query_billing = "INSERT INTO billing_address (id_user,   country,      full_name,  company,   street_address1 ,street_address2, city,	   zip_code,  statedir)
                                            VALUES    ('$id_user','$country_id_billing','$name_billing',    '$company_billing','$address1_billing',     '$address2_billing',     '$locality_billing','$zipcode_billing', '$state_billing')";
                    }
                
                if($state!=null)
                $query_address = "INSERT INTO address_t (  id_user,   country,      full_name,  company,   street_address1 ,street_address2, city,	   zip_code,  statedir)
                                            VALUES    ('$id_user','$country_id','$name',    '$company','$address1',     '$address2',     '$locality','$zipcode', '$state')";
                if($stateUS!=null)
                $query_address = "INSERT INTO address_t (  id_user,   country,      full_name,  company,   street_address1 ,street_address2, city,	   zip_code,  statedir)
                                            VALUES    ('$id_user','$country_id','$name',    '$company','$address1',     '$address2',     '$locality','$zipcode', '$stateUS')";
                if($_POST["shipping_id"]==-10 || !isset($_POST["shipping_id"]))
                {
                    $address_result = mysqli_query($conexion,$query_address);
                    $id_address = mysqli_insert_id ($conexion);
                }
                else
                {
                    $id_address = $_POST["shipping_id"];
                    $id_user = $_SESSION['id'];
                    
                    $query_B    = "SELECT * FROM billing_address WHERE id_user='$id_user'";
                    $result_B = mysqli_query($conexion,$query_B);
                    if(mysqli_num_rows($result_B)>0)
                    {
                        while ($extraido_B= mysqli_fetch_array($result_B))
                        {
                            $id_b             = $extraido_B['id'];
                            $id_user_b        = $extraido_B['id_user'];
                            $country_b        = $extraido_B['country'];
                            $full_name_b      = $extraido_B['full_name'];
                            $company_b        = $extraido_B['company'];
                            $address1_b       = $extraido_B['street_address1'];
                            $address2_b       = $extraido_B['street_address2'];
                            $city_b           = $extraido_B['city'];
                            $zipcode_b        = $extraido_B['zip_code'];
                            $state_b          = $extraido_B['statedir'];
                            $default_address_b= $extraido_B['default_address'];
                            if($default_address_b==1)
                            {
                                $id_billing = $id_b;
                                $id_def_bill = 1;
                            }
                        }
                        if($id_def_bill == 0)
                        {
                            $query    = "SELECT * FROM address_t WHERE id='$id_address'";
                            $result = mysqli_query($conexion,$query);
                            if(mysqli_num_rows($result)>0)
                            {
                                $extraido= mysqli_fetch_array($result);
                                $country_id     = $extraido['country'];
                                $name           = $extraido['full_name'];
                                $company        = $extraido['company'];
                                $address1       = $extraido['street_address1'];
                                $address2       = $extraido['street_address2'];
                                $locality       = $extraido['city'];
                                $state          = $extraido['statedir'];
                                $zipcode       = $extraido['zip_code'];
                            }
                            $query_B    = "SELECT * FROM billing_address WHERE id_user='$id_user'";
                            $result_B = mysqli_query($conexion,$query_B);
                            while ($extraido_B= mysqli_fetch_array($result_B))
                            {
                                $id_b             = $extraido_B['id'];
                                $id_user_b        = $extraido_B['id_user'];
                                $country_b        = $extraido_B['country'];
                                $full_name_b      = $extraido_B['full_name'];
                                $company_b        = $extraido_B['company'];
                                $address1_b       = $extraido_B['street_address1'];
                                $address2_b       = $extraido_B['street_address2'];
                                $city_b           = $extraido_B['city'];
                                $zipcode_b        = $extraido_B['zip_code'];
                                $state_b          = $extraido_B['statedir'];
                                $default_address_b= $extraido_B['default_address'];
                                //echo $country_b."==". $country_id ."\n".$full_name_b."==".$name ."\n".$company_b."==".$company ."\n".$address1_b."==".$address1 ."\n".$address2_b."==".$address2 ."\n".$city_b ."==".$locality ."\n".$zipcode_b."==".$zipcode ."\n".$state_b."==".$state;
                                if(strcasecmp($country_b,$country_id)===0&& strcasecmp($full_name_b,$name)===0 && strcasecmp($company_b,$company)===0 && strcasecmp($address1_b,$address1)===0 && 
                                strcasecmp($address2_b,$address2)===0 && strcasecmp($city_b ,$locality)===0 && strcasecmp($zipcode_b,$zipcode)===0 && strcasecmp($state_b,$state)===0)
                                {
                                    $id_billing = $id_b;
                                    $id_def_bill = 1;
                                }
                            }
                        }
                    }
                
                    if($id_def_bill == 0)
                    {
                        $query    = "SELECT * FROM address_t WHERE id='$id_address'";
                        $result = mysqli_query($conexion,$query);
                        if(mysqli_num_rows($result)>0)
                        {
                            while ($extraido= mysqli_fetch_array($result))
                            {
                                $country_id     = $extraido['country'];
                                $name           = $extraido['full_name'];
                                $company        = $extraido['company'];
                                $address1       = $extraido['street_address1'];
                                $address2       = $extraido['street_address2'];
                                $locality       = $extraido['city'];
                                $state          = $extraido['statedir'];
                                $zipcode       = $extraido['zip_code'];
                                $query_billing = "INSERT INTO billing_address (id_user,country,full_name,company,street_address1,street_address2, city,zip_code,statedir)
                                                VALUES    ('$id_user','$country_id','$name','$company','$address1','$address2','$locality','$zipcode','$state')";
                            }
                        }
                    }
                }
                if($id_def_bill == 0)
                {
                    $address_result = mysqli_query($conexion,$query_billing);
                    $id_billing = mysqli_insert_id ($conexion);
                }
                
                $order_id_count = mysqli_query($conexion,"SELECT * FROM orders_control"); 
                if(mysqli_num_rows($order_id_count)==0)
                {
                    $id_order_control = 1001;   
                    $id_control = "INSERT INTO orders_control (order_id) VALUES('$id_order_control')";
                    $id_control_verificar = mysqli_query($conexion, $id_control); 
                }
                else
                {
                    $id_control_existe = mysqli_query($conexion, "SELECT * FROM orders_control ORDER BY id DESC LIMIT 1"); 
                    $extraido_id_order_control = mysqli_fetch_array($id_control_existe);
                    $extraido_control = intval($extraido_id_order_control['order_id']);
                   
                    $id_order_control = $extraido_control+1;   
                    ////echo "id anterior->".$id_order_control."<-aqui";
                    $id_control = "INSERT INTO orders_control (order_id) VALUES('$id_order_control')";
                    $id_control_verificar = mysqli_query($conexion, $id_control); 
                }
                //echo $id_user;
                //echo " doneorderscontro ";
                $price      = 0;
                $cart       = mysqli_query($conexion,"SELECT * FROM cart WHERE id_user ='$id_user'"); 
                $exitosos   = 0;
                if(mysqli_num_rows($cart)>1)
                {
                    $Letra = "A";
                    $cont_cart = "_".$Letra;
                }
                else{
                    $Letra = "";
                    $cont_cart = "";
                }

                //echo "proc";
                $id_control_ID = $id_order_control . $cont_cart;
                //echo mysqli_num_rows($cart);
                //echo $ticket;

                if(mysqli_num_rows($cart)>0)
                {
                    //echo " mayor ";
                    while ($extraido= mysqli_fetch_array($cart))
                    {
                        //$total        += $price; 
                        //$_SESSION['total'] = $total;
                        //id	id_user	width_inches	height_inches	price	tipe	quantity	id_images	txt_details	dates	vista	acabado	esquinas	ponchado	corte	statusp
                        //echo " whileinfoorder ";
                        $id_cart            = $extraido['id'];
                        $id_user            = $extraido['id_user'];
                        $width_inches       = $extraido['width_inches'];
                        $height_inches      = $extraido['height_inches'];
                        $price              = $extraido['price'];
                        $tipe               = $extraido['tipe'];
                        $quantity           = $extraido['quantity'];
                        $id_images          = $extraido['id_images'];  //imagen
                        $id_images_vuelta   = $extraido['id_images_vuelta'];  //imagen vuelta
                        $txt_details        = $extraido['txt_details'];
                        $dates              = $extraido['dates'];
                        $vista              = $extraido['vista'];
                        $acabado            = $extraido['acabado'];
                        $esquinas           = $extraido['esquinas'];
                        $ponchado           = $extraido['ponchado'];
                        $corte              = $extraido['corte'];
                        $statusp            = $extraido['statusp'];
                        $date = date('Y-m-d H:i');
                       
                        //echo $statusp;
                        if($statusp == 2)
                        {   
                            $query_orders = "INSERT INTO orders (id_user,   width_inches,   height_inches,   price,  tipe,    
                                            quantity,   id_images, id_images_vuelta,  txt_details,  dates, delivery_date, id_address, id_billing,statusp,taxes,shipping_price,total,id_control,pagado,id_cupon)
                                              VALUES('$id_user','$width_inches','$height_inches','$price','$tipe','$quantity','$id_images','$id_images_vuelta','$txt_details','$date',
                                              '$delivery_date','$id_address','$id_billing','6','$taxes','$shipping','$total','$id_control_ID','$pagado','$id_cupon')";
                            $verificar = mysqli_query($conexion, $query_orders);
                            $id_order = mysqli_insert_id ($conexion);
                            $statusp = 6;
                            //echo " status2 ";
                            if(isset($_POST["spei_despues"]))
                            {
                                if($_POST["spei_despues"] == "no")
                                {
                                    $no_referencia = $_POST["no_referencia"];
                                    $cupon  = mysqli_query($conexion,"UPDATE orders SET n_referencia = '$no_referencia' WHERE id = '$id_order'");
                                }
                            }
                            if(isset($_POST["ticket"]))
                            {
                                if($_POST["ticket"] == 13)
                                {
                                    $cupon  = mysqli_query($conexion,"UPDATE orders SET statusp = '14' WHERE id = '$id_order'");
                                }
                            }
                        }
                        else
                        {      
                            //echo "else";
                            if($tipe == "Tarjetas" && $statusp == 0)
                                $statusp = 2;
                            if($tipe == "Diseño de tarjetas" && $statusp == 10)
                                $statusp = 0;  
                            if(isset($_POST["spei_despues"]))
                            {
                                //echo " speidespues ";
                                if($_POST["spei_despues"] == "despues")
                                {
                                    //echo " speidespues ";
                                    //echo " spei_despues_status_13 ";
                                    $statusp = 13;
                                }
                            }              
                            //echo $statusp;
                            $query_orders = "INSERT INTO orders (id_user,width_inches,height_inches,price,tipe,quantity,id_images,id_images_vuelta,txt_details,dates,delivery_date,
                            statusp,id_address,id_billing,guie,shipping,envio,transporte,vista,acabado,esquinas,ponchado,corte,id_control,pagado,id_cupon)
                            VALUES('$id_user','$width_inches','$height_inches','$price','$tipe','$quantity','$id_images','$id_images_vuelta','$txt_details','$date','$delivery_date',
                            '$statusp','$id_address','$id_billing',$guie,'$shipping','$envio','$transporte','$vista','$acabado','$esquinas','$ponchado','$corte','$id_control_ID','$pagado','$id_cupon')";
                            if(isset($_POST["spei_despues"]))
                            {
                                if($_POST["spei_despues"] == "despues")
                                {
                                    $statusp = 2;
                                    //echo " spei_despues_status_2 ";
                                }
                            }   

                            if($tipe == "Tarjetas" && $statusp == 2)
                                $statusp = 13;
                            $verificar = mysqli_query($conexion, $query_orders);
                            $id_order = mysqli_insert_id ($conexion);
                            if(isset($_POST["spei_despues"]))
                            {
                                if($_POST["spei_despues"] == "no")
                                {
                                    //echo " no_referencia_no ";
                                    $no_referencia = $_POST["no_referencia"];
                                    $cupon  = mysqli_query($conexion,"UPDATE orders SET n_referencia = '$no_referencia',statusp = '14',pagado = 'si' WHERE id = '$id_order'");
                                    $statusp_despues = 14;
                                }
                            }
                            if(isset($_POST["spei_despues"]))
                            {
                                if($_POST["spei_despues"] == "despues")
                                {
                                    //echo " no_referencia_despues ";
                                    
                                    
                                    $cupon  = mysqli_query($conexion,"UPDATE orders SET statusp = '13',pagado = 'no' WHERE id = '$id_order'");
                                }
                            }
                            /*
                            if(isset($_POST["ticket"]))
                            {
                                if($_POST["ticket"] == 13)
                                {
                                    echo " ticket ";
                                    $cupon  = mysqli_query($conexion,"UPDATE orders SET statusp = '14' WHERE id = '$id_order'");
                                }
                            }*/
                            $query_update_order = "UPDATE orders SET id_control = '' WHERE id = $id_order";
                    //1     https://ografix.com/processing.php?envio=sin&shipping_id=200&country_id=MX&name=&taxes=&shipping_price=&deliverytime=Mi%C3%A9rcoles+8+de+Diciembre+del+2021&company=&address1=&address2=&locality=&zipcode=&state=San+Luis+Potos%C3%AD&facturar=0&billing_address=&country_id_billing=MX&name_billing=&company_billing=&address1_billing=&address2_billing=&locality_billing=&zipcode_billing=&state_billing=&discount_code=&paymentMethod=&no_referencia=&spei_despues=despues&size=1000000&ticket=13&attachment=&file-name=
                    //2     https://ografix.com/processing.php?envio=sin&shipping_id=200&country_id=MX&name=&taxes=&shipping_price=&deliverytime=Mi%C3%A9rcoles+8+de+Diciembre+del+2021&company=&address1=&address2=&locality=&zipcode=&state=San+Luis+Potos%C3%AD&facturar=0&billing_address=&country_id_billing=MX&name_billing=&company_billing=&address1_billing=&address2_billing=&locality_billing=&zipcode_billing=&state_billing=&discount_code=&paymentMethod=&no_referencia=000000000001232&spei_despues=no&size=1000000&ticket=13&attachment=&file-name=
                    //3     https://ografix.com/processing.php?envio=sin&shipping_id=200&country_id=MX&name=&taxes=&shipping_price=&deliverytime=Mi%C3%A9rcoles+8+de+Diciembre+del+2021&company=&address1=&address2=&locality=&zipcode=&state=San+Luis+Potos%C3%AD&facturar=0&billing_address=&country_id_billing=MX&name_billing=&company_billing=&address1_billing=&address2_billing=&locality_billing=&zipcode_billing=&state_billing=&discount_code=&paymentMethod=&no_referencia=&spei_despues=despues&size=1000000&ticket=13&attachment=&file-name=
                    //4     https://ografix.com/processing.php?envio=sin&shipping_id=200&country_id=MX&name=&taxes=&shipping_price=&deliverytime=Mi%C3%A9rcoles+8+de+Diciembre+del+2021&company=&address1=&address2=&locality=&zipcode=&state=San+Luis+Potos%C3%AD&facturar=0&billing_address=&country_id_billing=MX&name_billing=&company_billing=&address1_billing=&address2_billing=&locality_billing=&zipcode_billing=&state_billing=&discount_code=&paymentMethod=&no_referencia=&size=1000000&ticket=13&attachment=images-images.jpg&file-name=images-images.jpg
                            $comentSi = 1;
                            $comentNO = 0;
                            $coment_usr= "Uploaded artwork:";
                            $coment_usr2= "Creó";
                            //echo $statusp;
                            if($verificar == true)
                            { 
                                //echo "true";
                                $from = "notificaciones@ografix.com";
                                $to = $email;
                                $cadena2="MX";
                                if(strcmp ($cadena2 , $country_id ) == 0)
                                {
                                    $country_id='México';
                                }
                                $linkverifica = "https://www.ografix.com/prueba.php?order=".$id_order;
                                $subject = "Pedido";
                                if($ticket == 13)
                                {
                                    if(isset($_POST["spei_despues"]))
                                    {
                                        //echo "existe_spei";
                                        if($pagado=="si")
                                        {
                                            //echo "pagado_si";
                                            $message = "Hola ". $name .",<br>
                                                <br>
                                                Recibimos tu orden <a href='". $linkverifica ."'>GRFX$id_control_ID</a><br>
                                                <br>
                                                Tu orden sera procesada cuando el pago sea aprobado.
                                                <br>
                                                Gracias<br>
                                                <br>
                                                <br>
                                                ografix<br>
                                                <br>
                                                Si tienes alguna duda contactanos a este correo <a href='notificaciones@ografix.com'>notificaciones@ografix.com</a>
                                                <br>
                                                <br>
                                            ";
                                        }
                                        if($pagado=="no")
                                        {
                                            if(isset($_POST["corresponsal"]))
                                            {
                                                $message = "Hola ". $name .",<br>
                                                    <br>
                                                    Recibimos tu orden <a href='". $linkverifica ."'>GRFX$id_control_ID</a>
                                                    <br>
                                                    Puedes enviar tu comprobante a este correo <a href='notificaciones@ografix.com'>notificaciones@ografix.com</a>
                                                    tu orden sera procesada cuando envies tu comprobante y el pago sea verificado. 
                                                    <br>
                                                    Gracias<br>
                                                    <br>
                                                    <br>
                                                    ografix<br>
                                                    <br>
                                                    Si tienes alguna duda contactanos a este correo <a href='notificaciones@ografix.com'>notificaciones@ografix.com</a>
                                                    <br>
                                                    <br>
                                                    ";
                                            }
                                            else
                                            {
                                                //echo "pagado_no";
                                                $message = "Hola ". $name .",<br>
                                                    <br>
                                                    Recibimos tu orden <a href='". $linkverifica ."'>GRFX$id_control_ID</a><br>
                                                    Tu orden sera procesada cuando envies tu comprobante y el pago sea verificado. 
                                                    <br>
                                                    Da click en el siguiente enlace para ingresar tu numero de referencia
                                                    <a href='https://ografix.com/ordenes'>aqui</a><br>
                                                    <br>
                                                    Gracias<br>
                                                    <br>
                                                    <br>
                                                    ografix<br>
                                                    <br>
                                                    Si tienes alguna duda contactanos a este correo <a href='notificaciones@ografix.com'>notificaciones@ografix.com</a>
                                                    <br>
                                                    <br>
                                                    ";
                                            }
                                        }
                                        
                                    }
                                    else{
                                        //echo "no_existe_spei";
                                        if($pagado=="no")
                                        {
                                            //echo "pagado_no";
                                            $message = "Hola ". $name .",<br>
                                                <br>
                                                Recibimos tu orden <a href='". $linkverifica ."'>GRFX$id_control_ID</a>
                                                <br>
                                                Puedes enviar tu comprobante a este correo <a href='notificaciones@ografix.com'>notificaciones@ografix.com</a>
                                                tu orden sera procesada cuando envies tu comprobante y el pago sea verificado. 
                                                <br>
                                                Gracias<br>
                                                <br>
                                                <br>
                                                ografix<br>
                                                <br>
                                                Si tienes alguna duda contactanos a este correo <a href='notificaciones@ografix.com'>notificaciones@ografix.com</a>
                                                <br>
                                                <br>
                                                ";
                                        }
                                        if($pagado=="si")
                                        {
                                            //echo "pagado_si";
                                            $message = "Hola ". $name .",<br>
                                                <br>
                                                Recibimos tu orden <a href='". $linkverifica ."'>GRFX$id_control_ID</a>
                                                junto con la información de tu pago una vez verificado el pago la orden sera procesada. <br>
                                                <br>
                                                Gracias<br>
                                                <br>
                                                <br>
                                                ografix<br>
                                                <br>
                                                Si tienes alguna duda contactanos a este correo <a href='notificaciones@ografix.com'>notificaciones@ografix.com</a>
                                                <br>
                                                <br>
                                                ";
                                        }
                                    }
                                }else
                                {
                                    if($statusp == 0)
                                    {
                                        $message = "Hola ". $name .",<br>
                                                <br>
                                                Recibimos tu orden <a href='". $linkverifica ."'>GRFX$id_control_ID</a><br>
                                                <br>
                                                <br>
                                                1. Te enviaremos una prueba por correo.<br>
                                                2. Puedes revisar tu prueba siguiendo el enlace o directamente en nuestra pagina web.<br>
                                                3. Si todo esta correcto puedes confirmar de aprobado o solicitar cambios.<br>
                                                4. Despues de confirmar de aprobado enviaremos tu archivo a impresion<br>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                Si tienes alguna duda puedes responder mediante este correo. <br>
                                                <br>
                                                Gracias<br>
                                                <br>
                                                <br>
                                                ografix<br>
                                                <br>
                                                Si tienes alguna duda contactanos a este correo <a href='notificaciones@ografix.com'>notificaciones@ografix.com</a>
                                                <br>
                                                <br>
                                                ";
                                    }
                                    if($statusp == 2)
                                    {
                                        $message = "Hola ". $name .",<br>
                                                    <br>
                                                    Recibimos tu orden <a href='". $linkverifica ."'>GRFX$id_control_ID</a> para diseño de tarjetas<br>
                                                    <br>
                                                    <br>
                                                    Tu pedido estara listo el dia: ".$delivery_date." despues de las 4 de la tarde. <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    Si tienes alguna duda puedes responder mediante este correo. <br>
                                                    <br>
                                                    Gracias<br>
                                                    <br>
                                                    <br>
                                                    ografix<br>
                                                    <br>
                                                    Si tienes alguna duda contactanos a este correo <a href='notificaciones@ografix.com'>notificaciones@ografix.com</a>
                                                    <br>
                                                    <br>
                                                    ";
                                    }
                                    if($statusp == 11)
                                    {
                                        $message = "Hola ". $name .",<br>
                                                    <br>
                                                    Recibimos tu orden <a href='". $linkverifica ."'>GRFX$id_control_ID</a><br>
                                                    <br>
                                                    <br>
                                                    Tu pedido sera procesado una vez que el diseño de tus tarjetas sea aprobado.<br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    Si tienes alguna duda puedes responder mediante este correo. <br>
                                                    <br>
                                                    Gracias<br>
                                                    <br>
                                                    <br>
                                                    ografix<br>
                                                    <br>
                                                    Si tienes alguna duda contactanos a este correo <a href='notificaciones@ografix.com'>notificaciones@ografix.com</a>
                                                    <br>
                                                    <br>
                                                    ";
                                    }
                                    if($statusp == 12)
                                    {
                                        $message = "Hola ". $name .",<br>
                                                    <br>
                                                    Recibimos tu orden <a href='". $linkverifica ."'>GRFX$id_control_ID</a><br>
                                                    <br>
                                                    Esperaremos tu archivo para poder procesar tu orden
                                                    <br>
                                                    <br>
                                                    <br>
                                                    Si tienes alguna duda puedes responder mediante este correo. <br>
                                                    <br>
                                                    Gracias<br>
                                                    <br>
                                                    <br>
                                                    ografix<br>
                                                    <br>
                                                    Si tienes alguna duda contactanos a este correo <a href='notificaciones@ografix.com'>notificaciones@ografix.com</a>
                                                    <br>
                                                    <br>
                                                    ";
                                    }
                                    if($statusp == 13)
                                    {
                                        $message = "Hola ". $name .",<br>
                                                    <br>
                                                    Recibimos tu orden <a href='". $linkverifica ."'>GRFX$id_control_ID</a><br>
                                                    <br>
                                                    <br>
                                                    Tu pedido estara listo el dia: ".$delivery_date." despues de las 4 de la tarde. <br>
                                                    <br>
                                                    Gracias<br>
                                                    <br>
                                                    <br>
                                                    ografix<br>
                                                    <br>
                                                    Si tienes alguna duda contactanos a este correo <a href='notificaciones@ografix.com'>notificaciones@ografix.com</a>
                                                    <br>
                                                    <br>
                                                    ";
                                    }
                                }
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
                                $mail->AddAddress($to);	
                                $mail->Subject = $subject;
                                $mail->Body    = $message;
                                $mail->WordWrap   = 80;
                                $mail->CharSet = 'UTF-8';
                                $mail->IsHTML(true);
                                if(!$mail->Send()) {
                                    $msg = "<p class='error'>Problem in Sending Mail.</p>";
                                } else {
                                    $msg = "<p class='success'>Mail Sent Successfully.</p>";
                                }
                                //echo "emailusr";
                                $images  = mysqli_query($conexion,"SELECT * FROM images WHERE id ='$id_images'");
                                if(mysqli_num_rows($images)>0)
                                {
                                    while ($extraido2= mysqli_fetch_array($images))
                                    {
                                    
                                        $id_i       = $extraido2['id'];
                                        $name_image = $extraido2['nombre'];
                                        $file       = $extraido2['images'];
                                        $query_coment = "INSERT INTO coments (id_orders,  coment_usr,  coment_client, 	date_coment,namefile, put)
                                                                    VALUES('$id_order', '$coment_usr','$comentNO',   '$date',    '$name_image','1')";
                                        $verificar_coment = mysqli_query($conexion, $query_coment);
                                        $colors = ["YELLOW","BLUE","RED","ORANGE","PURPLE","PINK","GREEN","BROWN","BLACK","WHITE","GRAY"];
                                        $extension = pathinfo($name_image , PATHINFO_EXTENSION);
                                        $usr_cloud = "usr_".$id_user."/";
                                        $nombre_base = basename($name_image , '.'.$extension);
                                        $txt = strtoupper($txt_details);
                                        $date = date('Y-m-d H:i');
                                        $color = null;
                                        foreach ($colors as $col)
                                        {
                                            if (strpos($txt, $col) !== false)
                                            {
                                                $color = $col;
                                                break;
                                            }
                                        }
                                        
                                        $prof = cl_image_tag($usr_cloud.$nombre_base, array("transformation"=>array(
                                        )));
                                        $html = $prof;
                                        $doc = new DOMDocument();
                                        $doc->loadHTML($html);
                                        $xpath = new DOMXPath($doc);
                                        $src = $xpath->evaluate("string(//img/@src)");
                                        
                                        $doc=new DOMDocument();
                                        $doc->loadHTML("<html><body>Test<br>".$prof."</body></html>");
                                        $xml=simplexml_import_dom($doc); // just to make xpath more simple
                                        $images=$xml->xpath('//img');
                                        foreach ($images as $img) {
                                            //echo $img['src'] . ' ' . $img['alt'] . ' ' . $img['title'];
                                            $srcsql = $img['src'].".".$extension;
                                            }
                                        
                                        $query_coment_acme = "INSERT INTO coments (id_orders,  coment_usr,      coment_client, 	date_coment,link)
                                                                                VALUES('$id_order', '$coment_usr2' ,'$comentSi',   '$date','$srcsql')";
                                        $verificar_coment_Acme = mysqli_query($conexion, $query_coment_acme);

                                        $query_artwork = "INSERT INTO artworks (id_user,    name_image,   width_inches,  height_inches,	 dates,   tipe,    link,   id_order )
                                                                VALUES('$id_user', '$name_image',  '$width_inches','$height_inches','$date','$tipe','$srcsql','$id_order')";
                                        $verificar_coment = mysqli_query($conexion, $query_artwork);
                                    
                                    }
                                }
                            }                            
                        }
                        $eliminados = mysqli_query($conexion, "DELETE FROM cart WHERE id ='$id_cart'");
                        ////echo $Letra;
                        $Letra++;
                        ////echo $Letra;
                        $cont_cart = "_".$Letra;
                        $id_control_ID = $id_order_control.$cont_cart;
                        //echo "eliminado";
                    }
                    
                    /*                          Alert SMS                          */
                    /*
                        $userdata = mysqli_query($conexion,"SELECT * FROM users WHERE id='$id_user'");
                        if(mysqli_num_rows($userdata)>0)
                        {
                            //deals_browser 	deals_sms 	deals_email 	alerts_sms 	alerts_email 	proofing_sms 	proofing_email 
                            $extraido23      = mysqli_fetch_array($userdata);
                            $usrname           =  $extraido23['usrname'];
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
                        if($statusp == 0)
                        {
                            $sms_txt = "Hi ". $usrname ."\n\nWe received your order AS$id_order.\nHere's what happens next:\n\n1. We send you a proof within 4 hours\n2. Review your proof on our website\n3. Approve your proof or request changes\n4. After proof approval, we print and ship your order\n\nYou can view your proof at the link below when it's ready:\n\n".$linkverifica."\n\n\nThanks,\nAcme Sticker";
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
                        }
                    */

                    /*                          Reorder                            */
                    /*
                    if($statusp == 6)
                    {
                        $to = "orders@acmestickers.com";
                        $subject = "A new order has arrived AS$id_order";
                        $message = "New order information:<br>
                                    <br>
                                    AS$id_order<br>
                                    Reorder<br>
                                    Size:    $width_inches\" x $height_inches \" <br>
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
                                    ".$country_id. "<br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <a href='https://acmestickers.com/admin/order_details.php?order=".$id_order."'>Click here</a><br>";
                        

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
                        $mail->IsHTML(true);
                        if(!$mail->Send()) {
                            $msg = "<p class='error'>Problem in Sending Mail.</p>";
                        } else {
                            $msg = "<p class='success'>Mail Sent Successfully.</p>";
                        }

                        $sms_txt = "Hi ". $usrname ."\n\nWe received your order AS$id_order.\n\n\nThanks,\nAcme Sticker";
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
                    }
                    */
                    //echo " ticket".$ticket." ";
                    //echo " pagado".$pagado." ";
                    //echo "antesemai";
                    //echo $id_control_ID;
                    if($ticket == 13 && isset($_POST["spei_despues"]))
                    {
                        //echo " emailspei ";
                        if($_POST["spei_despues"] == "despues")
                        {
                            //echo " emaildespues ";
                            $message = "Se creo una orden <a href='". $linkverifica ."'>GRFX$id_control_ID</a><br>
                                        queda pendiente la informacion de pago, se procesara hasta confirmar ticket</a> <br>
                                        <br>
                                        Gracias<br>
                                        <br>
                                        <br>
                                        <br>
                                        ";
                            $from = "notificaciones@ografix.com";
                            $to = "	ografix.info@gmail.com";
                            $linkverifica = "https://www.ografix.com/prueba.php?order=".$id_order;
                            $subject = "Pedido";
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
                            $mail->addStringAttachment(file_get_contents($src."jpg"), $id_control_ID.".jpg");
                            $mail->AddAddress($to);	
                            $mail->Subject = $subject;
                            $mail->Body    = $message;
                            $mail->WordWrap   = 80;
                            $mail->CharSet = 'UTF-8';
                            $mail->IsHTML(true);
                            if(!$mail->Send()) {
                                $msg = "<p class='error'>Problem in Sending Mail.</p>";
                            } else {
                                $msg = "<p class='success'>Mail Sent Successfully.</p>";
                            }
                        }
                        //echo $msg;
                        //echo "enviado";
                    }
                    if($ticket == 13 && !isset($_POST["spei_despues"]))
                    {
                        //echo " emailnohayspei ";
                        $nombre         = "ticket_".$id_control_ID;
                        $file           = $_FILES['attachment']['tmp_name'];
                        $image          = addslashes(file_get_contents($_FILES['attachment']['tmp_name'])); 
                        $ticket         = mysqli_query($conexion,"INSERT INTO images (nombre,images)  VALUES  ('$nombre','$image')"); 
                        $id_ticket      = mysqli_insert_id ($conexion);
                        $get_ticket     = mysqli_query($conexion,"SELECT * FROM images WHERE id ='$id_ticket'"); 
                        $extraido_ticket= mysqli_fetch_array($get_ticket);
                        $image_ticket   = $extraido_ticket['images'];
                        $nombre_ticket  = $extraido_ticket['nombre'];
                        $usr_cloud = "usr_".$id_user."/";
                        $nombre_base = $nombre ;
                        $extension = '.jpg';
                        \Cloudinary\Uploader::upload($file, ["folder" => strval($usr_cloud),"public_id" => $nombre_base]);
                        $prof = cl_image_tag($usr_cloud.$nombre_base, array("transformation"=>array()));
                        $html = $prof;
                        $doc = new DOMDocument();
                        $doc->loadHTML($html);
                        $xpath = new DOMXPath($doc);
                        $src = $xpath->evaluate("string(//img/@src)");
                        $message = "Llego la orden <a href='". $linkverifica ."'>GRFX$id_control_ID</a><br>
                                    junto con la información del pago para poder ser verificado.<a href='". $src ."'>Click aqui para ver el ticket</a> <br>
                                    <br>
                                    Gracias<br>
                                    <br>
                                    <br>
                                    <br>
                                    ";
                        $from = "notificaciones@ografix.com";
                        $to = "	ografix.info@gmail.com";
                        $linkverifica = "https://www.ografix.com/prueba.php?order=".$id_order;
                        $subject = "Pedido";
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
                        $mail->addStringAttachment(file_get_contents($src."jpg"), $id_control_ID.".jpg");
                        $mail->AddAddress($to);	
                        $mail->Subject = $subject;
                        $mail->Body    = $message;
                        $mail->WordWrap   = 80;
                        $mail->CharSet = 'UTF-8';
                        $mail->IsHTML(true);
                        if(!$mail->Send()) {
                            $msg = "<p class='error'>Problem in Sending Mail.</p>";
                        } else {
                            $msg = "<p class='success'>Mail Sent Successfully.</p>";
                        }
                        //echo $msg;
                        //echo "enviado";
                    }
                    if($pagado == "si" && !isset($_POST["spei_despues"]))
                    {
                        //echo " nohayspei_sipago ";
                        
                        /*$linkverifica = "https://www.ografix.com/prueba.php?order=".$id_order;
                        $message = "Llego la orden <a href='". $linkverifica ."'>GRFX$id_control_ID</a><br>
                                    <br>
                                    Gracias<br>
                                    <br>
                                    <br>
                                    <br>
                                    ";
                        $from = "notificaciones@ografix.com";
                        $to = "	ografix.info@gmail.com";
                        $subject = "Pedido";
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
                        $mail->AddAddress($to);	
                        $mail->Subject = $subject;
                        $mail->Body    = $message;
                        $mail->WordWrap   = 80;
                        $mail->CharSet = 'UTF-8';
                        $mail->IsHTML(true);
                        if(!$mail->Send()) {
                            $msg = "<p class='error'>Problem in Sending Mail.</p>";
                        } else {
                            $msg = "<p class='success'>Mail Sent Successfully.</p>";
                        }*/
                        //echo $msg;
                        //echo "enviado";
                        include "tarjetasPDF.php";
                    }
                    mysqli_close($conexion);
                    if($pagado == "no" && !isset($statusp_despues))
                    {
                        echo'
                        <script>
                            window.location = "../orden.php?deliverytime='.$delivery_date.'&address='.$id_address.'&email='.$email.'&name='.$name.'&order='.$id_order.'&envio='.$envio.'&enviotarde=true";
                        </script>
                        ';
                    }
                    if($pagado == "si" && isset($statusp_despues))
                    {
                        echo'
                        <script>
                            window.location = "../orden.php?deliverytime='.$delivery_date.'&address='.$id_address.'&email='.$email.'&name='.$name.'&order='.$id_order.'&envio='.$envio.'&enviotarde=false";
                        </script>
                        ';
                    }
                    if($pagado == "si" && !isset($statusp_despues))
                    { 
                        echo'
                        <script>
                            window.location = "../orden.php?deliverytime='.$delivery_date.'&address='.$id_address.'&email='.$email.'&name='.$name.'&order='.$id_order.'&envio='.$envio.'";
                        </script>
                        ';
                    }
                }           
            ?>
        </div>
    <?php include "footer.php"; ?>
    </main>
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="js/bootsnav/bootsnav.js"></script>
    <script src="js/script.js"></script>
    <?php
    }
    else{
        echo'
            <script>
                window.location = "../identificate?msg_error=Your guest session has expired";
            </script>
            ';
    }
    ?>
</body>
</html>