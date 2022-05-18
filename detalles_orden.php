<?php
session_start();
if(isset($_SESSION['id']))
{
    $id_user = $_SESSION['id'];
    $id_order= $_GET["order"];
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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <script>
        function DownloadPDF(id)
        {
			var win = window.open('https://ografix.com/nota.php?order='+id, '_blank');
			win.focus();
        }
    </script>
</head>
<body data-spy="scroll" data-target="#navbar-example" class="estaciones">
    <?php include "header.php";  ?>
    <div id="subnav" class="container" style="width: min-content;margin: auto;">   
        <div class="container" style="--subnav-scroll-left-width:0px; --subnav-scroll-right-width:0px;">
            <div class="subnav-menu">
                <ul class="subnav-menu-tabs">
                    <a class="a-subnav-menu" href="perfil"><li class=" li-subnav ">Perfil</li></a>
                    <a class="a-subnav-menu" href="ordenes" style="color: #202020;" >        <li class="li-subnav active">Ordenes</li></a>
                    <a class="a-subnav-menu" href="reordenes">       <li class="li-subnav">Reordenes</li></a>      
                    <a class="a-subnav-menu" href="trabajos">      <li class="li-subnav">Trabajos</li></a>     
                    <a class="a-subnav-menu" href="notificaciones"> <li class="li-subnav">Notificaciones</li></a>
                </ul>
            </div>
        </div>
    </div>
    <div class="container"  style="/*height: 100vh;padding-bottom: 80px;*/width: min-content;margin: auto;">
        <div id="main" class="container" style="/*height: 100vh;*/padding-bottom: 100px;">
            <?php
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
                $stylesheet = file_get_contents('nota.css');
                $GRFX = preg_replace('/[^0-9]/', '', $id_control);
                $LIKE = "%".$GRFX."%";
                $result_mas = mysqli_query($conexion,"SELECT * FROM orders WHERE id_control LIKE '$LIKE' ORDER BY id_control ASC");
                $suma = 0;
                if(mysqli_num_rows($result_mas)>0)
                {
                    while($extraido2= mysqli_fetch_array($result_mas))
                    {
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
                $subtotal = $suma;
                $descuento = ($subtotal/100)*$cantidad_descuento;
                $total = $subtotal - $descuento +  $shipping_price;
            ?>
            <a style="float: right;color: gray;cursor:pointer; cursor: hand;" onclick="DownloadPDF(<?php echo $id_order;?>)">
                <i class="align-middle me-2" data-feather="printer"></i>
            </a>
            <div>
                <div style="padding-top:50px;"></div>
                <table style="width:100%;font-family:\'gotham-medium\'">
                    <tr style="font-family:\'gotham-medium\'">
                        <th style="width:170px;">Orden GRFX <?php echo $GRFX; ?> </th>
                        <th style="width:52%;"></th>
                        <th style="width:30%;font-family:\'gotham-light\';text-align: right;"><?php echo $fechaCompleta; ?></th>
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
                        <?php echo $productos; ?> 
                    </table> 
                </div>
                <div style="padding-top:10px;"></div>
                <div style="text-align: right;">
                    <table style="width:100%">
                        <tr>
                            <th style="text-align: right;">Envio</th>
                            <td style="text-align: right;">$ <?php echo $shipping_price; ?> </td>
                        </tr>
                        <tr>
                            <th style="text-align: right;">Descuento</th>
                            <td style="text-align: right;">$ <?php echo $descuento; ?> </td>
                        </tr>
                        <tr>
                            <th style="text-align: right;">Subtotal</th>
                            <td style="text-align: right;">$ <?php echo $total-($total/100*16); ?> </td>
                        </tr>
                        <tr>
                            <th style="text-align: right;">IVA</th>
                            <td style="text-align: right;">$ <?php echo $total/100*16; ?> </td>
                        </tr>
                        <tr>
                            <th style="text-align: right;">Total</th>
                            <td style="text-align: right;">$ <?php echo $total; ?> </td>
                        </tr>
                    </table> 
                </div>
                <table width="100%">
                    <tr>
                        <td>ografix</td>
                    </tr>
                    <tr>
                        <td width="50%">Nicolás Zapata 120 <br> Col. Centro, 78000 <br> San Luis Potosí S.L.P.</td>
                        <td width="50%" style="text-align: right;">ografix.com</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>  
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="../js/bootsnav/bootsnav.js"></script>
    <script src="../js/script.js"></script>
    <script src="admin/js/app.js"></script>
</body>
</html>
<?php
}
else{
    echo'
    <script>
        window.location = "../identificate.php";
    </script>
    ';
}
?>