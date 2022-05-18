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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script>
        function agrega_ref(id)
        {
            document.getElementById('cont_referencia_'+id).style.visibility = "visible";
            document.getElementById('cont_referencia_'+id).style.display = "block";
            document.getElementById('pendiente_'+id).style.visibility = "hidden";
            document.getElementById('pendiente_'+id).style.display = "none"; 
        }
        function cancela_ref(id)
        {
            document.getElementById('pendiente_'+id).style.visibility = "visible";
            document.getElementById('pendiente_'+id).style.display = "block";
            document.getElementById('cont_referencia_'+id).style.visibility = "hidden";
            document.getElementById('cont_referencia_'+id).style.display = "none"; 
        }
        function guardar_ref(id)
        {
            var n_referencia = document.getElementById("n_referencia_"+id).value;
            var form_data = new FormData();    
            form_data.append('order', id);
            form_data.append('n_referencia', n_referencia);
            $.ajax({
                type: 'POST',
                url: 'php/guardar_referencia.php',
                contentType: false,
                processData: false,
                data: form_data,
                success:function(response) {
                    location.reload(true);
                },
                onFailure: function(response){
                    alert("fail");
                }
            });
            
        }
    </script>
    <style>
         .secondary{
            background: rgba(240, 101, 0, 0.55) none repeat scroll 0 0;
            font-size: 12px;
            padding: 5px 10px;
        }
    </style>
</head>
<body data-spy="scroll" data-target="#navbar-example" class="estaciones">
<?php  include "header.php";?>
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
        <?php
        include 'php/conexion.php';
        include 'php/fecha.php';
        $query = "SELECT * FROM orders WHERE id_user='$id_user' ORDER BY id DESC";
        $result = mysqli_query($conexion,$query);
        if(mysqli_num_rows($result)==0)
        {
        ?>
            <div class="container"  style="height: 100vh;width: min-content;">
                <div class="container">
                    <h1 style="font-size: 2.5rem;margin-bottom:0;">Historial</h1>
                    <label class="font-light">Aun no hay ordenes, <a href="index" style="color:#2b71b8;">realiza tu primera orden.</a></label>
                </div>
            </div>
        <?php
        }
        if(mysqli_num_rows($result)>0)
        {
            $cantidad = mysqli_num_rows($result);
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
        ?>
            <div class="container"  style="height: 100vh;padding-bottom: 80px;width: min-content;margin: auto;">
                <div id="main" class="wrapper container" style="height: 100vh;">
                <h1 style="font-size: 2.5rem;margin-bottom:0;">Historial</h1>
                    <table class="responsive" style="width: 95%;">
                        <thead>
                        <tr>
                            <th class="font-medium">ID</th>
                            <th class="font-medium">Fecha</th>
                            <th class="font-medium">Estatus</th>
                            <th class="currency font-medium" style="width: 20%;text-align: right;">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                                while ($extraido= mysqli_fetch_array($result))
                                {
                                    if($pag == 1)
                                        $incio = 0;
                                    else
                                        $incio = (1 + (($pag-1)*7))-1;
                                    if($cont>$incio && $cont2<7)
                                    {
                                        $id             = $extraido['id'];
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
                                        $id_control     = $extraido['id_control'];
                                        $pagado         = $extraido['pagado'];//
                                        //date_default_timezone_set('America/Mexico_City');
                                        //$date = date_create($dates);
                                        $date = fechaEspanol($dates);//date_format($date,"F j, Y");
                                        //setlocale(LC_TIME, "spanish");
                                        //$date = strftime("%d de %j %Y",strtotime($date));
                                        ?>
                                        <tr class="bigger-row even" style="display: table-row;height: 70px;">
                                            <td data-label="Order number" class="fontlight"><a href="detalles_orden?order=<?php echo $id; ?>"> GRFX<?php echo $id_control;?></a></td>
                                            <td data-label="Order date" class="fontlight"><?php echo $date;?></td>
                                            <?php
                                                if($statusp==0)
                                                {
                                                ?>
                                                    <td data-label="Status" class="fontlight"><!--<a href="prueba?order=<?php echo $id;?>">!-->Pendiente de prueba<!--</a> --></td>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if($statusp==1)
                                                {
                                                ?>
                                                    <td data-label="Status" class="fontlight"><!--<a href="prueba?order=<?php echo $id;?>">!-->Pendiente de aprobación<!--</a> --></td>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if($statusp==2 && $pagado != 'no')
                                                {
                                                ?>
                                                    <td data-label="Status" class="fontlight"><!--<a href="seguimiento?order=<?php echo $id;?>">!-->Aprobado<!--</a> --></td>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if($statusp==3)
                                                {
                                                ?>
                                                    <td data-label="Status" class="fontlight"><!--<a href="seguimiento?order=<?php echo $id;?>">!-->Preprensa<!--</a> --></td>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if($statusp==4)
                                                {
                                                ?>
                                                    <td data-label="Status" class="fontlight"><!--<a href="seguimiento?order=<?php echo $id;?>">!-->Impresión<!--</a> --></td>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if($statusp==5)
                                                {
                                                ?>
                                                    <td data-label="Status" class="fontlight"><!--<a href="seguimiento?order=<?php echo $id;?>">!-->Enviado<!--</a> --></td>
                                                <?php
                                                }
                                                if($statusp==6)
                                                {
                                                ?>
                                                    <td data-label="Status" class="fontlight"><!--<a href="seguimiento?order=<?php echo $id;?>">!-->Listo para recoger<!--</a> --></td>
                                                <?php
                                                }
                                                if($statusp==7)
                                                {
                                                ?>
                                                    <td data-label="Status" class="fontlight"><!--<a href="seguimiento?order=<?php echo $id;?>">!-->Enviado<!--</a> --></td>
                                                <?php
                                                }
                                                if($statusp==8)
                                                {
                                                ?>
                                                    <td data-label="Status" class="fontlight"><!--<a href="seguimiento?order=<?php echo $id;?>">!-->Cancelado<!--</a> --></td>
                                                <?php
                                                }
                                                if($statusp==9)
                                                {
                                                ?>
                                                    <td data-label="Status" class="fontlight"><!--<a href="seguimiento?order=<?php echo $id;?>">!-->Entregado<!--</a> --></td>
                                                <?php
                                                }
                                                if($statusp==13)
                                                {
                                                ?>
                                                    <td data-label="Status" class="fontlight">      
                                                        <div id="pendiente_<?php echo $id;?>"><!--<a href="seguimiento?order=<?php echo $id;?>">!-->Pago pendiente<!--</a> -->
                                                            <br><a style="cursor:pointer; cursor: hand;" onclick="agrega_ref(<?php echo $id;?>)">Agrega tu No. de referencia</a>
                                                        </div>
                                                        <div id="cont_referencia_<?php echo $id;?>" style="visibility:hidden;display:none;">
                                                            <div style="width: 100%;display: inline-block;">
                                                                <input type="text" id="n_referencia_<?php echo $id;?>" style="margin-bottom: 2px;border: 1px solid #c8c8c8;">
                                                                <br>
                                                                    <button class="secondary" onclick="guardar_ref(<?php echo $id;?>)">Guardar</button>
                                                                    <button class="secondary" onclick="cancela_ref(<?php echo $id;?>)">Cancelar</button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                <?php
                                                }
                                                if($statusp==14 || $statusp==2 && $pagado == 'no')
                                                {
                                                ?>
                                                    <td data-label="Status" class="fontlight"><!--<a href="seguimiento?order=<?php echo $id;?>">!-->Pago en revisión<!--</a> --></td>
                                                <?php
                                                }
                                            ?>
                                            <td data-label="Total" class="fontlight currency" style="text-align: right;">$ <?php echo $price;?></td>
                                        </tr>
                                            <?php
                                        $cont2++;
                                    }
                                    $cont++;
                                }
                            ?>
                        
                        </tbody>
                    </table>
                    <div class="container" style="padding-top: 50px;">
                        
                            <?php
                            if($pag>1)
                            {
                                ?>
                                    <div class="col-md-4" style="text-align: right;"><a href="ordenes?pag=<?php echo $ant; ?>"><<<</a></div>
                                <?php
                            }else
                            {
                                ?>
                                    <div style="visibility: hidden;" class="col-md-4"><a href="ordenes?pag=<?php echo $ant; ?>"><<<</a></div>
                                <?php
                            }
                            ?>
                             <div style="text-align: center;" class="col-md-4"><?php echo $pag; ?></div>
                            <?php
                            if($pag+7<$cantidad)
                            {
                                ?>
                                    <div style="" class="col-md-4 next"><a href="ordenes?pag=<?php echo $sig; ?>"> >>></a></div>
                                <?php
                            }
                            else{
                                ?>
                                    <div style="visibility: hidden;" class="col-md-4 next"><a href="">>>></a></div>
                                <?php
                            }
                            ?>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    <?php
  include "footer.php";
  ?>
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="js/bootsnav/bootsnav.js"></script>
    <script src="js/script.js"></script>
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