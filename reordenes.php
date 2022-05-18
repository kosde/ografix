<?php
session_start();
if(isset($_SESSION['id']))
{
    $id_user = $_SESSION['id'];
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
    <script src="https://kit.fontawesome.com/a38c16a07e.js"></script>
    
</head>
<body data-spy="scroll" data-target="#navbar-example" class="estaciones">
<?php  include "header.php"; ?>
    <div id="subnav" class="container" style="width: min-content;margin: auto;">   
        <div class="container" style="--subnav-scroll-left-width:0px; --subnav-scroll-right-width:0px;">
            <div class="subnav-menu">
                <ul class="subnav-menu-tabs">
                    <a class="a-subnav-menu" href="perfil"><li class=" li-subnav ">Perfil</li></a>
                    <a class="a-subnav-menu" href="ordenes"  >  <li class="li-subnav ">Ordenes</li></a>
                    <a class="a-subnav-menu" href="reordenes" style="color: #202020;">       <li class="li-subnav active">Reordenes</li></a>      
                    <a class="a-subnav-menu" href="trabajos">      <li class="li-subnav">Trabajos</li></a>     
                    <a class="a-subnav-menu" href="notificaciones"> <li class="li-subnav">Notificaciones</li></a>
                </ul>
            </div>
        </div>
    </div>
    <main class="container" style="width: min-content;margin: auto;">
        <input type="hidden" id="clientetipo" name="tipo" value="<?php echo $_SESSION['tipo'];?>">
        <?php
        include 'php/conexion.php';
        $query_artwork =  "SELECT * FROM artworks WHERE id_user='$id_user' ORDER BY id DESC";
        $verificar_coment = mysqli_query($conexion, $query_artwork);
        if(mysqli_num_rows($verificar_coment)==0)
        {
        ?>
            <section style="height: 100vh;">
                <div class="container wrapper"  style="height: 100vh;text-align: center;">
                    <h1 style="font-size: 2.5rem;margin-bottom:0;">Reordena fácil y rápido</h1>
                    <label for="message" class="labelfiel font-light" style="width: 90%;">Despues de realizar tu primera orden puedes reordenar fácilmente.</label>   
                </div>
            </section>  
        <?php
        }
        if(mysqli_num_rows($verificar_coment)>0)
        {

            ?>
            <section style="height: 240vh;" class="container">
                    <div class="wrapper">
                        <div class="font-light callout" style="font-size: 2rem;text-align: center;">
                            No se pueden realizar cambios en al momento de reordenar ya que el trabajo pasa directo a producción.
                        </div>
                    </div>
            <?php
            $cantidad = mysqli_num_rows($verificar_coment);
            if(!isset($_GET["pag"]))
            {
                $pag = 1;
            }else{
            $pag    = $_GET["pag"]; 
            }
            $sig    = $pag+1;
            $ant    = $pag-1;
            $cont   = 1;
            $cont2  = 0;
            while($extraido= mysqli_fetch_array($verificar_coment))
            {
                if($pag == 1)
                    $incio = 0;
                else
                    $incio = (1 + (($pag-1)*7))-1;
                if($cont>$incio && $cont2<7)
                {
                    $id             = $extraido['id'];
                    $id_user        = $extraido['id_user'];
                    $name_image     = $extraido['name_image'];
                    $width_inches   = $extraido['width_inches'];
                    $height_inches  = $extraido['height_inches'];
                    $dates          = $extraido['dates'];
                    $tipe           = $extraido['tipe'];
                    $link           = $extraido['link'];
                    $id_order       = $extraido['id_order'];
                    $width_inches  =  $extraido['width_inches']." cm";
                    $height_inches =  $extraido ['height_inches']." cm";
                    ?>      
                    
                    <div class="wrapper px-0">
                        <div class="" id="item_<?php echo $id; ?>" style="display: flex;">
                            <div class="">
                                <div class="thumbnail">
                                    <span class="image-zoom-target">
                                        <img style=" filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.7));" alt="<?php echo $tipe; ?>" src="<?php echo $link; ?>" width=150px>
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 reorder" style="padding-left: 20px;">
                                <div class="col-12 col-md-7">
                                    <div class="name">
                                        <form  method="post">
                                            <div class="editing" id="editname<?php echo $id; ?>" style="visibility:hidden;display:none;">
                                                <div aria-live="assertive" class="inputWrapper " role="alert">
                                                    <input class="productName" placeholder="Enter name" name="name" type="text" value="<?php echo $name_image; ?>">
                                                    <input type="hidden" name="id" type="number" value="<?php echo $id; ?>">
                                                </div>
                                                <div>
                                                    <button type="submit" class="button tiny blue edit saveEdit secondary" name="save" value="save">Save</button>
                                                    <button class="button tiny grey cancelEdit primary" onclick="CloseEdit(<?php echo $id; ?>)">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                        <?php
                                            if(isset($_POST['save']))
                                            {
                                                include 'php/conexion.php';
                                                $name = $_POST['name'];
                                                $id_order = $_POST['id'];
                                                //id 	id_user 	name_image 	width_inches 	height_inches 	dates 	tipe 	link
                                                mysqli_query($conexion,"UPDATE artworks SET name_image = '$name' WHERE id='$id_order'");
                                                mysqli_close($conexion);
                                                echo'
                                                    <script>
                                                        window.location = "../reorder.php";
                                                    </script>
                                                    ';                               
                                                exit;
                                                
                                            }
                                            $result_mas = mysqli_query($conexion,"SELECT * FROM orders WHERE id = '$id_order'");
                                            $suma = 0;
                                            if(mysqli_num_rows($result_mas)>0)
                                            {
                                                while($extraido2= mysqli_fetch_array($result_mas))
                                                {
                                                    $tarjetas_id                 = $extraido2['id'];
                                                    $tarjetas_id_user            = $extraido2['id_user'];
                                                    $tarjetas_width_inches       = $extraido2['width_inches'];
                                                    $tarjetas_height_inches      = $extraido2['height_inches'];
                                                    $tarjetas_price              = $extraido2['price'];
                                                    $tarjetas_tipe               = $extraido2['tipe'];
                                                    $tarjetas_quantity           = $extraido2['quantity'];
                                                    $tarjetas_id_images          = $extraido2['id_images'];
                                                    $tarjetas_id_images_vuelta   = $extraido2['id_images_vuelta'];
                                                    $tarjetas_txt_details        = $extraido2['txt_details'];
                                                    $tarjetas_date               = $extraido2['dates'];
                                                    $tarjetas_delivery_date      = $extraido2['delivery_date'];
                                                    $tarjetas_statusp            = $extraido2['statusp'];
                                                    $tarjetas_id_address         = $extraido2['id_address'];
                                                    $tarjetas_guie               = $extraido2['guie'];
                                                    $tarjetas_shipping           = $extraido2['shipping'];
                                                    $tarjetas_envio  	         = $extraido2['envio'];
                                                    $tarjetas_vista 		     = $extraido2['vista'];
                                                    $tarjetas_acabado            = $extraido2['acabado'];
                                                    $tarjetas_esquinas           = $extraido2['esquinas']; 
                                                    $esquinas_original           = $extraido2['esquinas'];
                                                    $tarjetas_ponchado           = $extraido2['ponchado'];
                                                    $ponchado_original           = $extraido2['ponchado'];
                                                    $tarjetas_corte              = $extraido2['corte'];
                                                    $tarjetas_id_control         = $extraido2['id_control'];
                                                    $tarjetas_pagado             = $extraido2['pagado'];
                                                    $tarjetas_n_referencia       = $extraido2['n_referencia'];
                                                    $tarjetas_id_cupon           = $extraido2['id_cupon'];
                                                    if($tarjetas_vista == "frentevuelta")
                                                    {
                                                        $tarjetas_FrenteOVuelta = "4/4";
                                                    }
                                                    else
                                                    {
                                                        $tarjetas_FrenteOVuelta = "4/0";
                                                    }
                                                    if($tarjetas_corte == "si")
                                                    {
                                                        $corteT = "<br>Corte";
                                                    }
                                                    else
                                                    {
                                                        $corteT = "";
                                                    }
                                                    
                                                    if($tarjetas_tipe == "Tarjetas")
                                                    {
                                                        $tarjetas_produc = "TDV";
                                                        if($tarjetas_acabado == "mate")
                                                        {
                                                            $tarjetas_terminado = "Acabado Mate";
                                                        }
                                                        else
                                                        {
                                                            $tarjetas_terminado = "Acabado Barniz UV brillante";
                                                        }
                                                        $tarjetas_esquinas = str_split($tarjetas_esquinas);
                                                        $cont_esq = 0;
                                                        if($tarjetas_esquinas[0] == 1)
                                                        {
                                                            $tarjetas_esq1 = 1;
                                                            $cont_esq++;
                                                        }
                                                        else
                                                        {
                                                            $tarjetas_esq1 = "";
                                                        }
                                                        if($tarjetas_esquinas[1] == 1)
                                                        {
                                                            $tarjetas_esq2 = 2;
                                                            $cont_esq++;
                                                            if($tarjetas_esq1 ==1)
                                                                $tarjetas_esq1 = $tarjetas_esq1."/";
                                                        }
                                                        else
                                                        {
                                                            $tarjetas_esq2 = "";
                                                        }
                                                        if($tarjetas_esquinas[2] == 1)
                                                        {
                                                            $tarjetas_esq3 = 3;
                                                            $cont_esq++;
                                                            if($tarjetas_esq1 ==1)
                                                                $tarjetas_esq1 = $tarjetas_esq1."/";
                                                            if($tarjetas_esq2 ==1)
                                                                $tarjetas_esq2 = $tarjetas_esq2."/";
                                                        }
                                                        else
                                                        {
                                                            $tarjetas_esq3 = "";
                                                        }
                                                        if($tarjetas_esquinas[3] == 1)
                                                        {
                                                            $tarjetas_esq4 = 4;
                                                            $cont_esq++;
                                                            if($tarjetas_esq1 ==1)
                                                                $tarjetas_esq1 = $tarjetas_esq1."/";
                                                            if($tarjetas_esq2 ==1)
                                                                $tarjetas_esq2 = $tarjetas_esq2."/";
                                                            if($tarjetas_esq3 ==1)
                                                                $tarjetas_esq3 = $tarjetas_esq3."/";
                                                            
                                                        }
                                                        else
                                                        {
                                                            $tarjetas_esq4 = "";
                                                        }
                                                        if($tarjetas_esq1!="" || $tarjetas_esq2!="" || $tarjetas_esq3!="" || $tarjetas_esq4!="")
                                                        {
                                                            $tarjetas_codigo_esqred = "<br> Esquinas Redondas ".$tarjetas_esq1.$tarjetas_esq2.$tarjetas_esq3.$tarjetas_esq4;
                                                        }else
                                                        {
                                                            $tarjetas_codigo_esqred = "";
                                                        }
                            
                            
                                                        $tarjetas_ponchado = str_split($tarjetas_ponchado);
                                                        $cant_ponch = 0;
                                                        if($tarjetas_ponchado[0] == 1)
                                                        {
                                                            $tarjetas_ponch1 = 1;
                                                            $cant_ponch++;
                                                        }
                                                        else
                                                        {
                                                            $tarjetas_ponch1 = "";
                                                        }
                                                        if($tarjetas_ponchado[1] == 1)
                                                        {
                                                            $tarjetas_ponch2 = 2;
                                                            $cant_ponch++;
                                                        }
                                                        else
                                                        {
                                                            $tarjetas_ponch2 = "";
                                                        }
                                                        if($tarjetas_ponchado[2] == 1)
                                                        {
                                                            $tarjetas_ponch3 = 3;
                                                            $cant_ponch++;
                                                        }
                                                        else
                                                        {
                                                            $tarjetas_ponch3 = "";
                                                        }
                                                        if($tarjetas_ponchado[3] == 1)
                                                        {
                                                            $tarjetas_ponch4 = 4;
                                                            $cant_ponch++;
                                                        }
                                                        else
                                                        {
                                                            $tarjetas_ponch4 = "";
                                                        }
                                                        if($tarjetas_ponchado[4] == 1)
                                                        {
                                                            $tarjetas_ponch5 = 5;
                                                            $cant_ponch++;
                                                        }
                                                        else
                                                        {
                                                            $tarjetas_ponch5 = "";
                                                        }
                                                        if($tarjetas_ponchado[5] == 1)
                                                        {
                                                            $tarjetas_ponch6 = 6;
                                                            $cant_ponch++;
                                                        }
                                                        else
                                                        {
                                                            $tarjetas_ponch6 = "";
                                                        }
                                                        if($tarjetas_ponchado[6] == 1)
                                                        {
                                                            $tarjetas_ponch7 = 7;
                                                            $cant_ponch++;
                                                        }
                                                        else
                                                        {
                                                            $tarjetas_ponch7 = "";
                                                        }
                                                        if($tarjetas_ponchado[7] == 1)
                                                        {
                                                            $tarjetas_ponch8 = 8;
                                                            $cant_ponch++;
                                                        }
                                                        else
                                                        {
                                                            $tarjetas_ponch8 = "";
                                                        }
                                                        if($tarjetas_ponch1!="" || $tarjetas_ponch2!="" || $tarjetas_ponch3!="" || $tarjetas_ponch4!=""||$tarjetas_ponch5!="" || $tarjetas_ponch6!="" || $tarjetas_ponch7!="" || $tarjetas_ponch8!="")
                                                        {
                                                            $tarjetas_codigo_ponchado = "<br> Ponchado ".$tarjetas_ponch1.$tarjetas_ponch2.$tarjetas_ponch3.$tarjetas_ponch4.$tarjetas_ponch5.$tarjetas_ponch6.$tarjetas_ponch7.$tarjetas_ponch8;
                                                        }else{
                                                            $tarjetas_codigo_ponchado = "";
                                                        }
                                                        $tarjetas_codigo = $tarjetas_terminado." ".$tarjetas_FrenteOVuelta.$tarjetas_codigo_esqred.$tarjetas_codigo_ponchado.$corteT;    
                                                        $tamaño = $tarjetas_width_inches. "cm x " .$tarjetas_height_inches . "cm";
                                                    }
                                                    if($tipe == "Volantes") 
                                                    {
                                                        if($height_inches == 0)
                                                        {
                                                            $tamaño = "Tamaño Carta";
                                                        }else
                                                        {
                                                            $tamaño = "Tamaño " . $tarjetas_width_inches ."/". $tarjetas_height_inches." Carta";
                                                        }
                                                        $tarjetas_codigo = $tarjetas_FrenteOVuelta.$corteT;
                                                        $tarjetas_acabado = 0;
                                                        $cant_ponch = 0;
                                                        $tarjetas_corte = 0;
                                                        $cont_esq = 0;
                                                    }
                                                }
                                            }
                                        ?>
                                        <span class="name_custom"><?php echo $name_image; ?></span>
                                        
                                    </div>
                                    <div class="font-light">Orden <a class="link font-light" href="https://www.ografix.com/detalles_orden?order=<?php echo "GRFX".$id_order; ?>">GRFX<?php echo $tarjetas_id_control; ?></a></div>
                                    <div class="product_name font-light"><?php echo $tarjetas_quantity." ".$tipe." ".$tamaño; ?></div>
                                    <?php echo $tarjetas_codigo; ?> 
                                </div>
                                <div class="col-8 col-md-2">
                                    <div aria-live="assertive" class="inputWrapper " role="alert">
                                        <div id='diverrorless<?php echo $id; ?>' class='tooltiperror' style="visibility:hidden;display:none;">
                                            <span class='arrow'></span>
                                            <span class='text'>Can't be less than 10</span>
                                        </div>
                                        <select id="Cantidades_tarjetas" class="form-control" name="Cantidades_tarjetas" >
                                            <option></option>
                                            <option onclick="Vista(1000,<?php echo '\''.$tarjetas_tipe.'\','.$tarjetas_width_inches.','.$tarjetas_height_inches.',\''.$tarjetas_acabado.'\',\''.$tarjetas_vista.'\','.$cont_esq.','.$cant_ponch.',\''.$tarjetas_corte.'\','.$_SESSION['tipo'].','.$tarjetas_id; ?>)">1000</option>
                                            <option onclick="Vista(5000,<?php echo '\''.$tarjetas_tipe.'\','.$tarjetas_width_inches.','.$tarjetas_height_inches.',\''.$tarjetas_acabado.'\',\''.$tarjetas_vista.'\','.$cont_esq.','.$cant_ponch.',\''.$tarjetas_corte.'\','.$_SESSION['tipo'].','.$tarjetas_id; ?>)">5000</option>
                                            <option onclick="Vista(10000,<?php echo '\''.$tarjetas_tipe.'\','.$tarjetas_width_inches.','.$tarjetas_height_inches.',\''.$tarjetas_acabado.'\',\''.$tarjetas_vista.'\','.$cont_esq.','.$cant_ponch.',\''.$tarjetas_corte.'\','.$_SESSION['tipo'].','.$tarjetas_id; ?>)">10000</option>                                                  
                                        </select>
                                        <?php
                                        /*
                                            if($tipe == "Tarjetas") 
                                            {
                                                $query_orders =  "SELECT * FROM orders WHERE id_user='$id_user'";
                                                $verificar_orders = mysqli_query($conexion, $query_orders);
                                                if(mysqli_num_rows($verificar_orders)>0)
                                                {
                                                    $tipo_usr           = $_SESSION['tipo'];
                                                    $extraido           = mysqli_fetch_array($verificar_orders);
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
                                                }    */                                            
                                                ?> 
                                                <!--
                                                <select id="Cantidades_tarjetas" class="form-control" name="Cantidades_tarjetas" >
                                                    <option></option>
                                                    <option onclick="Vista(1000,<?php // echo '\''.$tipe.'\','.$width_inches.','.$height_inches.',\''.$acabado.'\',\''.$vista.'\','.$cont_esq.','.$cant_ponch.',\''.$corte.'\','.$_SESSION['tipo'].','.$id; ?>)">1000</option>
                                                    <option onclick="Vista(5000,<?php // echo '\''.$tipe.'\','.$width_inches.','.$height_inches.',\''.$acabado.'\',\''.$vista.'\','.$cont_esq.','.$cant_ponch.',\''.$corte.'\','.$_SESSION['tipo'].','.$id; ?>)">5000</option>
                                                    <option onclick="Vista(10000,<?php // echo '\''.$tipe.'\','.$width_inches.','.$height_inches.',\''.$acabado.'\',\''.$vista.'\','.$cont_esq.','.$cant_ponch.',\''.$corte.'\','.$_SESSION['tipo'].','.$id; ?>)">10000</option>                                                  
                                                </select>
                                                <span id="tam_custom"></span>
                                                <label class="quantity" id="precioqty"></label>
                                                <label class="quantity" id="precio_cort">0</label>
                                                <label class="quantity" id="cantesqred">0</label>
                                                <label class="quantity" id="precioesq">0</label>
                                                <label class="quantity" id="cant_perfo" value="0">0</label>
                                                <label class="quantity" id="precio_perfo">0</label>
                                                <input type="text" style="display:none;" value="0" name="subtotal" id="">
                                                <label class="quantity" id="subtotal">0</label>
                                                <input type="text" style="display:none;" value="54" name="iva" id="">
                                                <label class="quantity" id="iva"></label>
                                                <label class="quantity" id="total"></label>
                                               
                                                    <input class="quantity" name="quantity" pattern="[0-9]*" 
                                                    id="quantity<?php //echo $id; ?>" placeholder="Enter quantity" type="number" 
                                                    onkeyup="custom_die_cut_stickers(<?php //echo $id; ?>,<?php //echo $extraido['width_inches']; ?>,<?php // echo $extraido['height_inches']; ?>)">-->
                                                <?php
                                            //}
                                        ?>
                                    </div>
                                </div>
                                <label class="quantity" id="precioqty"></label>
                                <div id="custom_price<?php echo $tarjetas_id; ?>" class="col-4 col-md-2 font-light">$0</div>
                                <form  method="post" class="col-4 col-md-3">
                                    <input style="height: 26px;visibility:hidden;display:none;" name="width_inches" value="<?php echo $tarjetas_width_inches;?>">
                                    <input style="height: 26px;visibility:hidden;display:none;" name="height_inches" value="<?php echo $tarjetas_height_inches;?>">
                                    <input style="height: 26px;visibility:hidden;display:none;" name="price" value="<?php echo $tarjetas_price;?>">
                                    <input style="height: 26px;visibility:hidden;display:none;" name="tipe" value="<?php echo $tarjetas_tipe;?>">
                                    <input style="height: 26px;visibility:hidden;display:none;" name="qty" value="<?php echo $tarjetas_quantity;?>">                                   
                                    <input style="height: 26px;visibility:hidden;display:none;" name="id_images_1" value="<?php echo $tarjetas_id_images;?>">
                                    <input style="height: 26px;visibility:hidden;display:none;" name="id_images_2" value="<?php echo $tarjetas_id_images_vuelta;?>">
                                    <input style="height: 26px;visibility:hidden;display:none;" name="txt_details" value="<?php echo $tarjetas_txt_details;?>">

                                    <input style="height: 26px;visibility:hidden;display:none;" name="vista" value="<?php echo $tarjetas_vista;?>">
                                    <input style="height: 26px;visibility:hidden;display:none;" name="acabado" value="<?php echo $tarjetas_acabado;?>">
                                    <input style="height: 26px;visibility:hidden;display:none;" name="esquinas" value="<?php echo $esquinas_original;?>">                                   
                                    <input style="height: 26px;visibility:hidden;display:none;" name="ponchado" value="<?php echo $ponchado_original;?>">
                                    <input style="height: 26px;visibility:hidden;display:none;" name="corte" value="<?php echo $tarjetas_corte;?>">

                                    <input class="button primary" name="cart" type="submit" style="border-radius: 5px;" id="add_to_cart<?php echo $id;?>" value="Agregar al carrito">
                                    <?php
                                    //id	id_user	width_inches	height_inches	price	tipe	quantity	id_images	id_images_vuelta	txt_details	dates	vista	acabado	esquinas	ponchado	corte	statusp
                                       /* $tarjetas_width_inches       = $extraido2['width_inches'];
                                        $tarjetas_height_inches      = $extraido2['height_inches'];
                                        $tarjetas_price              = $extraido2['price'];

                                        $tarjetas_tipe               = $extraido2['tipe'];
                                        $tarjetas_quantity           = $extraido2['quantity'];
                                        $tarjetas_id_images          = $extraido2['id_images'];

                                        $tarjetas_id_images_vuelta   = $extraido2['id_images_vuelta'];
                                        $tarjetas_txt_details        = $extraido2['txt_details'];
                                        //$tarjetas_date               = $extraido2['dates'];
                                        $tarjetas_vista 		     = $extraido2['vista'];
                                        $tarjetas_acabado            = $extraido2['acabado'];
                                        $tarjetas_esquinas           = $extraido2['esquinas'];
                                        $tarjetas_ponchado           = $extraido2['ponchado'];
                                        $tarjetas_corte              = $extraido2['corte'];*/
                                    ?>
                                </form>
                                <?php
                                            if(isset($_POST['cart']))
                                            {
                                                include 'php/conexion.php';
                                                $id             = $_SESSION['id'];
                                                $width          = $_POST['width_inches'];
                                                $height         = $_POST['height_inches'];
                                                $price          = $_POST['price'];
                                                $tipe           = $_POST['tipe'];
                                                $quantity       = $_POST['qty'];
                                                $id_images_1    = $_POST['id_images_1'];
                                                $id_images_2    = $_POST['id_images_2'];
                                                $txt_details    = $_POST['txt_details'];
                                                $vista          = $_POST['vista'];
                                                $acabado        = $_POST['acabado'];
                                                $esquinas       = $_POST['esquinas'];
                                                $ponchado       = $_POST['ponchado'];
                                                $corte          = $_POST['corte'];
                                                $date           = date('Y-m-d H:i');
                                                $query_cart = "INSERT INTO cart (id_user,width_inches,height_inches,price,tipe,quantity,id_images,id_images_vuelta,txt_details,dates,vista,acabado,esquinas,ponchado,corte,statusp) 
                                                            VALUES('$id','$width','$height','$price','$tipe','$quantity','$id_images_1','$id_images_2','$txt_details','$date','$vista','$acabado','$esquinas','$ponchado','$corte','2')";

                                                $cart= mysqli_query($conexion,$query_cart);
                                                mysqli_close($conexion);
                                                echo'
                                                    <script>
                                                        window.location = "../carrito.php";
                                                    </script>
                                                    ';                               
                                                exit;
                                                
                                            }
                                        ?>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                    $cont2++;
                }
                $cont++;
            }
            ?>
            <div class="" style="padding-top: 50px;width: 100%;">
                        
                <?php
                if($pag>1)
                {
                    ?>
                        <div class="col-md-4" style="text-align: right;"><a href="reordenes?pag=<?php echo $ant; ?>"><<<</a></div>
                    <?php
                }else
                {
                    ?>
                        <div style="visibility: hidden;" class="col-md-4"><a href="reordenes?pag=<?php echo $ant; ?>"><<<</a></div>
                    <?php
                }
                ?>
                    <div style="text-align: center;" class="col-md-4"><?php echo $pag; ?></div>
                <?php
                if($pag+7<$cantidad)
                {
                    ?>
                        <div style="" class="col-md-4 next"><a href="reordenes?pag=<?php echo $sig; ?>"> >>></a></div>
                    <?php
                }
                else{
                    ?>
                        <div style="visibility: hidden;" class="col-md-4 next"><a href="">>>></a></div>
                    <?php
                }
                ?>
            </div>
            </section>
            <?php
        }
        ?>
    </main>
<?php include "footer.php"; ?>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="php/precio_tarjetas.js"></script>
    <script src="php/precio_volantes.js"></script>
    <script>
        function Vista(cantidad,tipo,width,height,acabado,vista,esquinas,ponchado,corte,usrtipo,id)
        {
            var precio = 0;
            if(tipo == "Tarjetas")
            {
                if(width>=9)
                {
                    if(height<=5)
                    {
                        tam = 1;
                        if(width>9)
                        {
                            tam = 2;
                        }
                    }
                    if(height>5)
                    {
                        tam = 2;
                        if(width>9)
                        {
                            tam = 4;
                        }
                    }
                }
                if(height>=5)
                {
                    if(width<=9)
                    {
                        tam = 1;
                        if(height>5)
                        {
                            tam = 2;
                        }
                    }
                    if(width>9)
                    {
                        tam = 2;
                        if(height>5)
                        {
                            tam = 4;
                        }
                    }
                }
                if(cantidad == 1000)
                {
                    if(vista == "frente")
                    {
                        precio = precio_tarjetas_1000_40 *tam;
                    }
                    else
                    {
                        if(acabado == "barniz")
                        {
                            precio = precio_tarjetas_1000_b_44 *tam;
                        }
                        else
                        {
                            precio = precio_tarjetas_1000_m_44 *tam;
                        }
                    }
                }
                if(cantidad == 5000)
                {
                    if(vista == "frente")
                    {
                        precio = precio_tarjetas_5000_40 *tam;
                    }
                    else
                    {
                        if(acabado == "barniz")
                        {
                            precio = precio_tarjetas_5000_b_44 *tam;
                        }
                        else
                        {
                            precio = precio_tarjetas_5000_m_44 *tam;
                        }
                    }
                }
                if(cantidad == 10000)
                {
                    if(vista == "frente")
                    {
                        precio = precio_tarjetas_10000_40 *tam;
                    }
                    else
                    {
                        if(acabado == "barniz")
                        {
                            precio = precio_tarjetas_10000_b_44 *tam;
                        }
                        else
                        {
                            precio = precio_tarjetas_10000_m_44 *tam;
                        }
                    }
                }
                if(esquinas == 4)
                {
                    precioesquinas = precio_tarjetas_4_redond;
                }
                if(esquinas > 0 && esquinas < 4) 
                {
                    precioesquinas = precio_tarjetas_redond * esquinas;   
                }
                if(esquinas == 0)
                {
                    precioesquinas = 0;
                }
                if(ponchado == 0)
                {
                    precio_ponch = 0;
                }
                if(ponchado > 0)
                {
                    precio_ponch = precio_tarjetas__ponch * ponchado;
                }
                //console.log(corte);
                if(corte == "si")
                {
                    precio_corte = precio_tarjetas_corte;
                }
                else
                {
                    precio_corte = 0;
                }
                precio = precio + precioesquinas + precio_ponch + precio_corte;
                document.getElementById('custom_price'+id).innerText ="$" + precio;
                //document.getElementById('input_custom_price'+id).value = precio;
            }
            if(tipo == "Volantes")
            {
                if(cantidad == 2000 || cantidad == 1000)
                {
                    if(height == 0)
                    {
                        if(vista == "frente")
                        {
                            precio = precio_volantes_1000_1_40;
                        }
                        else
                        {
                            precio = precio_volantes_1000_1_44;
                        }
                    }
                    if(height == 2)
                    {
                        if(vista == "frente")
                        {
                            precio = precio_volantes_1000_12_40;
                        }
                        else
                        {
                            precio = precio_volantes_1000_12_44;
                        }
                    }
                    if(height == 4)
                    {
                        if(vista == "frente")
                        {
                            precio = precio_volantes_2000_14_40;
                        }
                        else
                        {
                            precio = precio_volantes_2000_14_44;
                        }
                    }
                }
                if(cantidad == 5000)
                {
                    if(height == 0)
                    {
                        if(vista == "frente")
                        {
                            precio = precio_volantes_5000_1_40;
                        }
                        else
                        {
                            precio = precio_volantes_5000_1_44;
                        }
                    }
                    if(height == 2)
                    {
                        if(vista == "frente")
                        {
                            precio = precio_volantes_5000_12_40;
                        }
                        else
                        {
                            precio = precio_volantes_5000_12_44;
                        }
                    }
                    if(height == 4)
                    {
                        if(vista == "frente")
                        {
                            precio = precio_volantes_6000_14_40;
                        }
                        else
                        {
                            precio = precio_volantes_6000_14_44;
                        }
                    }
                }
                if(cantidad == 10000)
                {
                    if(height == 0)
                    {
                        if(vista == "frente")
                        {
                            precio = precio_volantes_10000_1_40;
                        }
                        else
                        {
                            precio = precio_volantes_10000_1_44;
                        }
                    }
                    if(height == 2)
                    {
                        if(vista == "frente")
                        {
                            precio = precio_volantes_10000_12_40;
                        }
                        else
                        {
                            precio = precio_volantes_10000_12_44;
                        }
                    }
                    if(height == 4)
                    {
                        if(vista == "frente")
                        {
                            precio = precio_volantes_10000_14_40;
                        }
                        else
                        {
                            precio = precio_volantes_10000_14_44;
                        }
                    }
                }
                if(corte == "si")
                {
                    precio_corte = precio_volantes_corte;
                }
                else
                {
                    precio_corte = 0;
                }
                precio = precio + precio_corte;
                document.getElementById('custom_price'+id).innerText ="$" + precio;
                //document.getElementById('input_custom_price'+id).value = precio;
            }
        }
    </script>
</body>
</html>
<?php
}
else{
    echo'
    <script>
        window.location = "../identificate";
    </script>
    ';
}
?>