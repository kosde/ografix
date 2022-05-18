<?php
 session_start();
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
  <script src="https://kit.fontawesome.com/a38c16a07e.js" crossorigin="anonymous"></script>
  <style>
      tbody{
        width: 90%;
        display: table; 
      }
      .cart{
        min-height: 500px !important;
        height: auto !important;
      }
  </style>
</head>
<body data-spy="scroll" data-target="#navbar-example" class="estaciones">
    <?php include "header.php"; ?>
    <div class="paper container" style="padding-top: 100px;width: min-content;">
        <div class="wrapper_cut bg-image-container">
            <div id="cartContainer" class="container cart">
                    <?php
                    require_once "vendor/autoload.php";
                    require_once "config_cloud.php";
                    include 'php/conexion.php';
                    $id_user = $_SESSION['id']; 
                    $price = 0;
                    $cart  = mysqli_query($conexion,"SELECT * FROM cart WHERE id_user ='$id_user'");
                    if(mysqli_num_rows($cart)>0 && isset($_SESSION['id']))
                    {
                    ?>
                    <div id="cart-app" class="wrapper">
                        <div>
                            <ul class="promotion-notifications"></ul>
                            <h1>Carrito</h1>
                            <form action="pago.php" class="cleaar" style="display: table;width: 100%;position: relative;">
                                <table class=" font-light col-md-8 col-sm-7 col-xs-12" style="margin-bottom: 50px;">
                                    <tr style="border-bottom: 2px solid rgb(182, 182, 182, 0.733);">
                                        <th style="width: 70%;">Descripción</th>
                                        <th>Cantidad</th>
                                        <th>Total</th>
                                    </tr>
                                        <?php
                                            //id	id_user	width_inches	height_inches	price	tipe	quantity	id_images	txt_details	dates	precioesquinas	esquinas
                                            while ($extraido= mysqli_fetch_array($cart))
                                            {
                                                $id                 = $extraido['id'];
                                                $id_user            = $extraido ['id_user'];
                                                $width_inches       = $extraido['width_inches'];
                                                $height_inches      = $extraido ['height_inches'];
                                                $price              = $extraido['price'];
                                                $total             += $price; 
                                                $_SESSION['total']  = $total;
                                                $tipe               = $extraido ['tipe'];
                                                $quantity           = $extraido['quantity'];
                                                $id_images          = $extraido ['id_images'];
                                                $id_images_vuelta   = $extraido ['id_images_vuelta'];
                                                $txt_details        = $extraido['txt_details'];
                                                $statusp_cart       = $extraido['statusp'];
                                                if( $statusp_cart==2)
                                                {
                                                    $imagen     = mysqli_query($conexion,"SELECT * FROM artworks WHERE id ='$id_images'");
                                                    $extraido10 = mysqli_fetch_array($imagen);
                                                    $link       = $extraido10['link'];
                                                }
                                                $images  = mysqli_query($conexion,"SELECT * FROM images WHERE id ='$id_images'");
                                                if(mysqli_num_rows($images)>0 || $statusp_cart == 2 || $statusp_cart == 10  || $statusp_cart == 11 || $statusp_cart == 12)
                                                {
                                                    if($statusp_cart == 10 || $statusp_cart == 11 || $statusp_cart == 12)
                                                    {
                                                        $extraido2= mysqli_fetch_array($images);
                                                        $id_i = $extraido2['id'];
                                                        ?>
                                                        <tr style='border-bottom: 2px solid rgb(182, 182, 182, 0.733);height: 150px;'>
                                                            <td>                                       
                                                                <table style="width: 95%;">
                                                                    <tr>
                                                                        <td style="width: 140px;padding: 10px 10px !important;display: table-cell;">
                                                                            <?php 
                                                                                if($tipe == "Diseño de tarjetas") 
                                                                                {
                                                                                    ?>
                                                                                        <img alt="" style=" filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.7));width:120px;"  src="">
                                                                                    <?php
                                                                                }
                                                                                if($tipe == "Tarjetas") 
                                                                                {
                                                                                    ?>
                                                                                        <img alt="" style=" filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.7));width:120px;"  src="">
                                                                                    <?php
                                                                                }
                                                                            ?>
                                                                        </td>
                                                                        <td style="text-align:left;width: 100%;">
                                                                            <?php   
                                                                                if($tipe == "Diseño de tarjetas") 
                                                                                {
                                                                                    echo "<a href='/tarjetas'>$tipe</a> <br>  $width_inches x $height_inches <br> $name_image";
                                                                                }
                                                                                if($tipe == "Tarjetas") 
                                                                                {
                                                                                    echo "<a href='/tarjetas'>$tipe</a> <br>  $width_inches x $height_inches <br> $name_image";
                                                                                }
                                                                                if($tipe == "Volantes") 
                                                                                {
                                                                                    echo "<a href='/volantes'>$tipe</a> <br>  $width_inches / $height_inches Carta <br> $name_image";
                                                                                }
                                                                            ?>
                                                                        </td>
                                                                          
                                                                    </tr>
                                                                </table> 
                                                            </td>                                                                
                                                            <td style='text-align: left;'><?php echo $quantity; ?></td>
                                                            <td style='text-align: left;'>$<?php echo$price; ?></td>
                                                            <td style="padding-left: 10px;">
                                                                <a href='php/delete-cart.php?id-image=<?php echo $id_i; ?>&id-cart=<?php echo $id; ?>'>
                                                                    <i class='fas fa-times-circle'></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <?php                                                                
                                                    }
                                                    while ($extraido2= mysqli_fetch_array($images))
                                                    {
                                                        if($statusp_cart != 10)
                                                        {
                                                            $id_i = $extraido2['id'];
                                                            $name_image = $extraido2['nombre'];
                                                            echo "<tr style='border-bottom: 2px solid rgb(182, 182, 182, 0.733);height: 150px;'>";
                                                            ?>
                                                            <td>                                       
                                                                <table style="width: 95%;">
                                                                    <tr>
                                                                        <?php
                                                                            $extension = pathinfo($name_image , PATHINFO_EXTENSION);
                                                                            $nombre_base = basename($name_image , '.'.$extension);  
                                                                            $folder = 'usr_'.$id_user;
                                                                            $imagen = cl_image_tag($folder."/".$nombre_base,array("width"=>120));
                                                                            /*if($statusp_cart==2)
                                                                            {
                                                                                if($extension == "png" || $extension == "jpeg" || $extension == "jpg")
                                                                                {
                                                                                    ?>
                                                                                        <td style="width: 50%; padding: 10px 10px !important;">
                                                                                            <img style=" filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.7));width: 120px;" class="proof-image" src="<?php echo $link; ?>">
                                                                                        </td>
                                                                                    <?php
                                                                                }
                                                                                else
                                                                                {
                                                                                    ?>
                                                                                        <td style="width: 50%; padding: 10px 10px !important;">
                                                                                            <img style=" filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.7));width: 120px;" class="proof-image" src="<?php echo $link."png"; ?>">
                                                                                        </td>
                                                                                    <?php
                                                                                }
                                                                                
                                                                            }*/
                                                                            if($statusp_cart==10)
                                                                            {
                                                                                ?>
                                                                                <td style="width: 50%; padding: 10px 10px !important;">
                                                                                    <img style=" filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.7));width: 120px;" class="proof-image" src="img/slider/Tarjetas_Presentacion.png">
                                                                                </td>
                                                                                <?php
                                                                            } 
                                                                            else
                                                                            {
                                                                                if($id_images_vuelta!=null && $id_images_vuelta!=0)
                                                                                {
                                                                                    $image_vuelta  = mysqli_query($conexion,"SELECT * FROM images WHERE id ='$id_images_vuelta'");
                                                                                    $extraido2_vuelta= mysqli_fetch_array($image_vuelta);
                                                                                    $id_i_vuelta = $extraido2_vuelta['id'];
                                                                                    $name_image_vuelta = $extraido2_vuelta['nombre'];
                                                                                }
                                                                                if($id_images_vuelta!=null && $id_images_vuelta!=0)
                                                                                {
                                                                                    ?>
                                                                                    <td style="width: 140px; padding: 10px 10px !important;/*display: inline-block;*/">
                                                                                        <label style="width: 100%;">Frente</label>
                                                                                    <?php
                                                                                    echo $imagen; 
                                                                                    $extension_vuelta = pathinfo($name_image_vuelta , PATHINFO_EXTENSION);
                                                                                    $nombre_base_vuelta = basename($name_image_vuelta , '.'.$extension_vuelta);  
                                                                                    $folder_vuelta = 'usr_'.$id_user;
                                                                                    $imagen_vuelta = cl_image_tag($folder_vuelta."/".$nombre_base_vuelta,array("width"=>120));
                                                                                    ?>
                                                                                        <label style="width: 100%;">Vuelta</label>
                                                                                    <?php
                                                                                    echo $imagen_vuelta; 
                                                                                    ?>
                                                                                    </td>
                                                                                    <?php
                                                                                }
                                                                                else
                                                                                {
                                                                                    ?>
                                                                                    <td style="width: 140px; padding: 10px 10px !important;display: table-cell;">
                                                                                    <?php
                                                                                        if($extension == "png" || $extension == "jpeg" || $extension == "jpg")
                                                                                        {
                                                                                            $nombre_base_vuelta = basename($nombre_base , '.'.$extension_vuelta); 
                                                                                            $imagen_vuelta = cl_image_tag($folder."/".$nombre_base_vuelta,array("width"=>120));
                                                                                            echo $imagen_vuelta; 
                                                                                        }
                                                                                        else
                                                                                        {
                                                                                            $nombre_base_vuelta = $nombre_base . '.png'; 
                                                                                            $imagen_vuelta = cl_image_tag($folder."/".$nombre_base_vuelta,array("width"=>120));
                                                                                            echo $imagen_vuelta;
                                                                                        }
                                                                                                //echo $imagen;
                                                                                    ?>
                                                                                    </td>
                                                                                    <?php
                                                                                }
                                                                            }
                                                                        ?>
                                                                        <td style="text-align:left;">
                                                                            <?php   
                                                                                if($tipe == "Tarjetas") 
                                                                                {
                                                                                    echo "<a href='/tarjetas'>$tipe</a> <br>  $width_inches x $height_inches cm <br> $name_image";
                                                                                }
                                                                                if($tipe == "Diseño de tarjetas") 
                                                                                {
                                                                                    echo "<a href='/tarjetas'>$tipe</a> <br>  $width_inches x $height_inches cm <br> $name_image";
                                                                                }
                                                                                if($tipe == "Volantes") 
                                                                                {
                                                                                    if($height_inches == 0)
                                                                                    {
                                                                                        echo "<a href='/volantes'>$tipe</a> <br> Tamaño Carta <br> $name_image";
                                                                                    }else
                                                                                    {
                                                                                        echo "<a href='/volantes'>$tipe</a> <br> Tamaño $width_inches / $height_inches Carta <br> $name_image";
                                                                                    }
                                                                                }
                                                                            ?>
                                                                        </td>
                                                                    </tr>
                                                                </table> 
                                                            </td>
                                                            <?php
                                                            if($tipe == "Sample") 
                                                            {
                                                                
                                                                echo"
                                                                    <td style='text-align: left;'></td>
                                                                    <td style='text-align: left;'>$$price</td>
                                                                    <td style='padding-left: 10px;'>
                                                                        <a href='php/delete-cart.php?id-image=".$id_i."&id-cart=".$id."&status=".$statusp_cart."'><i class='fas fa-times-circle'></i></a> 
                                                                    </td>
                                                                </tr>
                                                                ";
                                                            }
                                                            else
                                                            {
                                                                echo"
                                                                    <td style='text-align: left;'>$quantity</td>
                                                                    <td style='text-align: left;'>$$price</td>
                                                                    <td style='padding-left: 10px;'>
                                                                        <a href='php/delete-cart.php?id-image=".$id_i."&id-cart=".$id."&status=".$statusp_cart."'><i class='fas fa-times-circle'></i></a> 
                                                                    </td>
                                                                </tr>
                                                                ";
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                            mysqli_close($conexion);
                                            
                                        ?>
                                </table>
                                <div class=" sticky-wrapper col-md-4 col-sm-5 col-xs-12">
                                    <div class="sticky">
                                        <div class="items_summary">
                                            <h2 class="total" style="font-size: 1.4rem;">Subtotal: <span id="subtotal_price" style="font-family: sans-serif !important;">$<?php echo $total;?></span></h2>
                                            <p><button class="button large secondary block" id="checkout-button" type="submit">Pagar  &nbsp;<i class="fa fa-lock"></i></button></p>
                                            <p class="total" id="continue-shopping">o <a class="link" href="/index">Continuar comprando</a></p>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--<div class="tarjeta">
                        <h4>Añade proctos al carrito</h4>
                        <p class="font-light" style="font-size: 14px;">We provide a discount fro ordering multiple items at the same time. The more you order, the more you save.</p>
                        <br>
                        <p class="font-light" style="font-size: 14px;">Use our <a href="custom-stickers.php">quick order</a> feature to easly order more items</p>
                                           
                    </div> -->
                    <?php
                    }else
                    {
                    ?>
                    <div id="cart-empty">
                        <div class="header wrapper center-text">
                            <h1>Tu carrito esta vacio</h1>
                            <label for="message" class="labelfiel font-light " style="width: 90%;font-weight: normal;">Puedes agregar prodcutos  <a href="../index">aqui </a></label>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
            </div>
        </div>
    </div> <!-- /container -->
    <?php include "footer.php"; ?>

  <a href="#" class="back-to-top"><i class="fa fa-c hevron-up"></i></a>

  <!-- JavaScript Libraries 
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>-->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/venobox/venobox.min.js"></script>
  <script src="lib/knob/jquery.knob.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/parallax/parallax.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
  <script src="lib/appear/jquery.appear.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <script src="js/main.js"></script>
</body>

</html>

