<?php
    session_start();
    $_SESSION['tipo'] = $_GET["tipo"];
    $_SESSION['medida'] = $_GET["medida"];
    $_SESSION['quantity'] = $_GET["quantity"];
    $_SESSION['vista'] = $_GET["vista"];
    $_SESSION['acabado'] = $_GET["acabado"];
    $_SESSION['filename'] = $_GET["filename"];
    $_SESSION['producto'] = $_GET["producto"];
    $_SESSION['precioproducto'] = $_GET["precioproducto"];
    $_SESSION['preciofinal'] = $_GET["preciofinal"];
    $_SESSION['precioesquinas'] = $_GET["precioesquinas"];
    $_SESSION['corte'] = $_GET["corte"];
    $producto = $_GET["producto"];
    $vista = $_GET["vista"];
    if($_SESSION['producto'] == "Tarjetas")
    {
        $_SESSION['redond'] = $_GET["redond"];
        $_SESSION['lado1'] = $_GET["lado1"];
        $_SESSION['lado2'] = $_GET["lado2"];
        $_SESSION['lado3'] = $_GET["lado3"];
        $_SESSION['lado4'] = $_GET["lado4"];

        $_SESSION['perfo'] = $_GET["perfo"];
        $_SESSION['perfo1'] = $_GET["perfo1"];
        $_SESSION['perfo2'] = $_GET["perfo2"];
        $_SESSION['perfo3'] = $_GET["perfo3"];
        $_SESSION['perfo4'] = $_GET["perfo4"];
        $_SESSION['perfo5'] = $_GET["perfo5"];
        $_SESSION['perfo6'] = $_GET["perfo6"];
        $_SESSION['perfo7'] = $_GET["perfo7"];
        $_SESSION['perfo8'] = $_GET["perfo8"];
        
    }
    $medida = explode('x',$_SESSION['medida']);
    $width = $medida[0];
    $height = $medida[1];
    $_SESSION['subir'] = 1;    
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Ografix</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="img/ICONO.png" rel="icon">
    <link href="img/ICONO.png" rel="apple-touch-icon">
    <?php
    include "css.php";
    ?>
    <link href="upload_file/dist/css/jquery.dm-uploader.min.css" rel="stylesheet">
    <link href="upload_file/upload_file/styles.css" rel="stylesheet">
    <style>
        .rotate180 {
            transform: scaleX(-1);
        }
    </style>
</head>

  <body data-spy="scroll" data-target="#navbar-example" class="estaciones">
  <?php
    include "header.php";
  ?>
    <div class="paper container" style="width: min-content;">
      <div class="wrapper_cut bg-image-container container" style="padding-top: 0px;height: 1500px;">
        <main role="main" class="container">
            <div class="row" style="height: 70vh;padding-top: 50px; padding-bottom: 50px;">
                <div class="col-md-12 col-sm-12">
                <h1 style="text-align: center;font-size: 3.0rem;padding-bottom: 50px;" id="title_h1">Sube tu archivo</h1>
                
                    <?php
                        if($vista =="frentevuelta")
                        {
                            ?>
                            <div id="drag-and-drop-zone_2" class="dm-uploader p-5">
                                <form id="formdrop_2" action="php/uploadFile.php" method="post" enctype="multipart/form-data" class="dropform" style="width: 100% !important;text-align: center !important;">
                                    <div class="form-group">
                                        <h6 style="text-align: center;font-size: 2.5rem;padding-bottom: 50px;font-family: 'Regular';">Frente</h6>
                                        <div class="input-group" style="margin: auto;width: 60%;height: 100px;" id="inputfiles_2">
                                            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12" style="padding-bottom: 20px;padding-right: 0px !important;padding-left: 0px !important;">
                                                <label class="input-group-btn" >
                                                    <input id="fileimage_2" type="hidden" name="size" value="1000000">
                                                    <span class="btn btn-primary btn-file" style="width: 100%;">
                                                        Examinar <input accept="image/jpeg,image/png,application/pdf,image/vnd.adobe.photoshop,
                                                        application/x-photoshop,application/photoshop,application/psd,image/psd" class="inputfile" type="file" 
                                                        name="Imagen" id="Imagen_2" onchange="document.getElementById('file-name_2').value = this.files[0].name">
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12" style="padding-left: 0px !important;padding-right: 0px !important;">
                                                <input class="form-control fileforminput" placeholder="Ningun archivo seleccionado" name="file-name" id="file-name_2" style="padding-bottom: 10px;width: 100%;text-align: center;">
                                            </div>
                                            <div id="comments_2" style="width: 100%;padding-top: 30px;visibility: hidden;display:none;">
                                                <?php
                                                if($producto == "Tarjetas" && $width==9 && $height == 5)
                                                {
                                                ?>
                                                    <div style="width: 100%;height: 300px;padding: 50px 0;">
                                                        <div style="width: 9cm;height: 5cm;margin: auto;">
                                                            <img alt="" style=" filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.7));max-height: 5cm !important;max-width: 9cm !important;position: absolute;display: block;" id="proof_image_2"  src="">
                                                            <!--<img src="img/prueba_tarjeta/marco.png" alt="marco"  style="height:5cm !important;width: 9cm !important;position: absolute;display: block;">-->
                                                            <?php
                                                            if($_SESSION['corte'] == "no" &&  $_SESSION['redond'] == "no" &&  $_SESSION['perfo'] == "no")
                                                            {
                                                            ?>
                                                                <img src="img/prueba_tarjeta/marco.png" alt="marco"  style="height:5cm !important;width: 9cm !important;position: absolute;display: block;">
                                                            <?php
                                                            }
                                                            ?>   
                                                            <?php
                                                            if($_SESSION['corte'] == "si")
                                                            {
                                                            ?>
                                                                <img src="img/prueba_tarjeta/corte.png" alt="marco"  style="height:5cm !important;width: 9cm !important;position: absolute;display: block;">
                                                            <?php
                                                            }
                                                            ?>  
                                                            <?php
                                                            if($_SESSION['redond'] == "si")
                                                            {
                                                                if($_SESSION['lado1'] == 1)
                                                                {
                                                                    ?>
                                                                        <img src="img/prueba_tarjeta/redond_1.png" alt="marco"  style="height:5cm !important;width: 9cm !important;position: absolute;display: block;">
                                                                    <?php
                                                                }
                                                                if($_SESSION['lado2'] == 1)
                                                                {
                                                                    ?>
                                                                        <img src="img/prueba_tarjeta/redond_2.png" alt="marco"  style="height:5cm !important;width: 9cm !important;position: absolute;display: block;">
                                                                    <?php
                                                                }
                                                                if($_SESSION['lado3'] == 1)
                                                                {
                                                                    ?>
                                                                        <img src="img/prueba_tarjeta/redond_3.png" alt="marco"  style="height:5cm !important;width: 9cm !important;position: absolute;display: block;">
                                                                    <?php
                                                                }
                                                                if($_SESSION['lado4'] == 1)
                                                                {
                                                                    ?>
                                                                        <img src="img/prueba_tarjeta/redond_4.png" alt="marco"  style="height:5cm !important;width: 9cm !important;position: absolute;display: block;">
                                                                    <?php
                                                                }
                                                                if($_SESSION['lado1'] == 1 && $_SESSION['lado2'] == 1)
                                                                {
                                                                    ?>
                                                                        <img src="img/prueba_tarjeta/redond_1_2.png" alt="marco"  style="height:5cm !important;width: 9cm !important;position: absolute;display: block;">
                                                                    <?php
                                                                }
                                                                if($_SESSION['lado1'] == 1 && $_SESSION['lado2'] == 1 && $_SESSION['lado3'] == 1 && $_SESSION['lado4'] == 1)
                                                                {
                                                                    ?>
                                                                        <img src="img/prueba_tarjeta/redond_1_2_3_4.png" alt="marco"  style="height:5cm !important;width: 9cm !important;position: absolute;display: block;">
                                                                    <?php
                                                                }
                                                                if($_SESSION['lado1'] == 1 && $_SESSION['lado4'] == 1)
                                                                {
                                                                    ?>
                                                                        <img src="img/prueba_tarjeta/redond_1_4.png" alt="marco"  style="height:5cm !important;width: 9cm !important;position: absolute;display: block;">
                                                                    <?php
                                                                }
                                                                if($_SESSION['lado2'] == 1 && $_SESSION['lado3'] == 1)
                                                                {
                                                                    ?>
                                                                        <img src="img/prueba_tarjeta/redond_2_3.png" alt="marco"  style="height:5cm !important;width: 9cm !important;position: absolute;display: block;">
                                                                    <?php
                                                                }
                                                                if($_SESSION['lado3'] == 1 && $_SESSION['lado4'] == 1)
                                                                {
                                                                    ?>
                                                                        <img src="img/prueba_tarjeta/redond_3_4.png" alt="marco"  style="height:5cm !important;width: 9cm !important;position: absolute;display: block;">
                                                                    <?php
                                                                }
                                                            }
                                                            ?>    
                                                            <?php
                                                            if($_SESSION['perfo'] == "si")
                                                            {
                                                                if($_SESSION['perfo1'] == 1)
                                                                {
                                                                    ?>
                                                                        <img src="img/prueba_tarjeta/perfo_1.png" alt="marco"  style="height:5cm !important;width: 9cm !important;position: absolute;display: block;">
                                                                    <?php
                                                                }
                                                                if($_SESSION['perfo2'] == 1)
                                                                {
                                                                    ?>
                                                                        <img src="img/prueba_tarjeta/perfo_2.png" alt="marco"  style="height:5cm !important;width: 9cm !important;position: absolute;display: block;">
                                                                    <?php
                                                                }
                                                                if($_SESSION['perfo3'] == 1)
                                                                {
                                                                    ?>
                                                                        <img src="img/prueba_tarjeta/perfo_3.png" alt="marco"  style="height:5cm !important;width: 9cm !important;position: absolute;display: block;">
                                                                    <?php
                                                                }
                                                                if($_SESSION['perfo4'] == 1)
                                                                {
                                                                    ?>
                                                                        <img src="img/prueba_tarjeta/perfo_4.png" alt="marco"  style="height:5cm !important;width: 9cm !important;position: absolute;display: block;">
                                                                    <?php
                                                                }
                                                                if($_SESSION['perfo5'] == 1)
                                                                {
                                                                    ?>
                                                                        <img src="img/prueba_tarjeta/perfo_5.png" alt="marco"  style="height:5cm !important;width: 9cm !important;position: absolute;display: block;">
                                                                    <?php
                                                                }
                                                                if($_SESSION['perfo6'] == 1)
                                                                {
                                                                    ?>
                                                                        <img src="img/prueba_tarjeta/perfo_6.png" alt="marco"  style="height:5cm !important;width: 9cm !important;position: absolute;display: block;">
                                                                    <?php
                                                                }
                                                                if($_SESSION['perfo7'] == 1)
                                                                {
                                                                    ?>
                                                                        <img src="img/prueba_tarjeta/perfo_7.png" alt="marco"  style="height:5cm !important;width: 9cm !important;position: absolute;display: block;">
                                                                    <?php
                                                                }
                                                                if($_SESSION['perfo8'] == 1)
                                                                {
                                                                    ?>
                                                                        <img src="img/prueba_tarjeta/perfo_8.png" alt="marco"  style="height:5cm !important;width: 9cm !important;position: absolute;display: block;">
                                                                    <?php
                                                                }
                                                            }
                                                            ?> 
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                if($producto == "Tarjetas" && $width==5 && $height == 9)
                                                {
                                                ?>
                                                    <div style="width: 100%;height: 450px;padding: 50px 0;">
                                                        <div style="width: 5cm;height: 9cm;margin: auto;">
                                                            <img alt="" style=" filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.7));max-height: 9cm !important;max-width: 5cm !important;position: absolute;display: block;" id="proof_image_2"  src="">
                                                            <!--<img src="img/prueba_tarjeta/marco.png" alt="marco"  style="height:5cm !important;width: 5cm !important;position: absolute;display: block;">-->
                                                            <?php
                                                            if($_SESSION['corte'] == "no" &&  $_SESSION['redond'] == "no" &&  $_SESSION['perfo'] == "no")
                                                            {
                                                            ?>
                                                                <img src="img/prueba_tarjeta/marco_vertical.png" alt="marco"  style="height: 9cm; !important;width: 5cm !important;position: absolute;display: block;">
                                                            <?php
                                                            }
                                                            ?>   
                                                            <?php
                                                            if($_SESSION['corte'] == "si")
                                                            {
                                                            ?>
                                                                <img src="img/prueba_tarjeta/corte_vertical.png" alt="marco"  style="height: 9cm; !important;width: 5cm !important;position: absolute;display: block;">
                                                            <?php
                                                            }
                                                            ?>  
                                                            <?php
                                                            if($_SESSION['redond'] == "si")
                                                            {
                                                                if($_SESSION['lado1'] == 1)
                                                                {
                                                                    ?>
                                                                        <img src="img/prueba_tarjeta/redond_1.png" alt="marco"  style="height: 9cm; !important;width: 5cm !important;position: absolute;display: block;">
                                                                    <?php
                                                                }
                                                                if($_SESSION['lado2'] == 1)
                                                                {
                                                                    ?>
                                                                        <img src="img/prueba_tarjeta/redond_2.png" alt="marco"  style="height: 9cm; !important;width: 5cm !important;position: absolute;display: block;">
                                                                    <?php
                                                                }
                                                                if($_SESSION['lado3'] == 1)
                                                                {
                                                                    ?>
                                                                        <img src="img/prueba_tarjeta/redond_3.png" alt="marco"  style="height: 9cm; !important;width: 5cm !important;position: absolute;display: block;">
                                                                    <?php
                                                                }
                                                                if($_SESSION['lado4'] == 1)
                                                                {
                                                                    ?>
                                                                        <img src="img/prueba_tarjeta/redond_4.png" alt="marco"  style="height: 9cm; !important;width: 5cm !important;position: absolute;display: block;">
                                                                    <?php
                                                                }
                                                                if($_SESSION['lado1'] == 1 && $_SESSION['lado2'] == 1)
                                                                {
                                                                    ?>
                                                                        <img src="img/prueba_tarjeta/redond_1_2.png" alt="marco"  style="height: 9cm; !important;width: 5cm !important;position: absolute;display: block;">
                                                                    <?php
                                                                }
                                                                if($_SESSION['lado1'] == 1 && $_SESSION['lado2'] == 1 && $_SESSION['lado3'] == 1 && $_SESSION['lado4'] == 1)
                                                                {
                                                                    ?>
                                                                        <img src="img/prueba_tarjeta/redond_1_2_3_4.png" alt="marco"  style="height: 9cm; !important;width: 5cm !important;position: absolute;display: block;">
                                                                    <?php
                                                                }
                                                                if($_SESSION['lado1'] == 1 && $_SESSION['lado4'] == 1)
                                                                {
                                                                    ?>
                                                                        <img src="img/prueba_tarjeta/redond_1_4.png" alt="marco"  style="height: 9cm; !important;width: 5cm !important;position: absolute;display: block;">
                                                                    <?php
                                                                }
                                                                if($_SESSION['lado2'] == 1 && $_SESSION['lado3'] == 1)
                                                                {
                                                                    ?>
                                                                        <img src="img/prueba_tarjeta/redond_2_3.png" alt="marco"  style="height: 9cm; !important;width: 5cm !important;position: absolute;display: block;">
                                                                    <?php
                                                                }
                                                                if($_SESSION['lado3'] == 1 && $_SESSION['lado4'] == 1)
                                                                {
                                                                    ?>
                                                                        <img src="img/prueba_tarjeta/redond_3_4.png" alt="marco"  style="height: 9cm; !important;width: 5cm !important;position: absolute;display: block;">
                                                                    <?php
                                                                }
                                                            }
                                                            ?>    
                                                            <?php
                                                            if($_SESSION['perfo'] == "si")
                                                            {
                                                                echo "perfo";
                                                            ?>
                                                                <img src="img/prueba_tarjeta/corte_perfo_1_5.png" alt="marco"  style="height: 9cm; !important;width: 5cm !important;position: absolute;display: block;">
                                                            <?php
                                                            }
                                                            ?> 
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div> 
                                            <div class="progress" id="pbar_2" style="visibility:hidden;width: 50%;margin: auto;">
                                                <div id="progress-bar_2"class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <?php
                        }
                    ?>
                <div id="drag-and-drop-zone" class="dm-uploader p-5">
                    <form id="formdrop" action="php/uploadFile.php" method="post" enctype="multipart/form-data" class="dropform" style="width: 100% !important;text-align: center !important;">
                        <div class="form-group">
                            <?php
                            if($vista =="frentevuelta")
                            {
                            ?>
                                <h6 style="text-align: center;font-size: 2.5rem;padding-bottom: 50px;font-family: 'Regular';">Vuelta</h6>    
                            <?php
                            }
                            ?>      
                            <div class="input-group" style="margin: auto;width: 60%;height: 100px;" id="inputfiles">
                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12" style="padding-bottom: 20px;padding-right: 0px !important;padding-left: 0px !important;">
                                    <label class="input-group-btn" >
                                        <input id="fileimage" type="hidden" name="size" value="1000000">
                                        <span class="btn btn-primary btn-file" style="width: 100%;">
                                            Examinar <input accept="image/jpeg,image/png,application/pdf,image/vnd.adobe.photoshop,
                                            application/x-photoshop,application/photoshop,application/psd,image/psd" class="inputfile" type="file" 
                                            name="Imagen" id="Imagen" onchange="document.getElementById('file-name').value = this.files[0].name">
                                        </span>
                                    </label>
                                </div>
                                <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12" style="padding-left: 0px !important;padding-right: 0px !important;">
                                    <input class="form-control fileforminput" placeholder="Ningun archivo seleccionado" name="file-name" id="file-name" style="padding-bottom: 10px;width: 100%;text-align: center;">
                                </div>
                               
                                
                                
                                <div id="comments" style="width: 100%;padding-top: 30px;visibility: hidden;display:none;">
                                    <?php
                                    if($producto == "Tarjetas" && $width==9 && $height == 5)
                                    {
                                    ?>
                                        <div style="width: 100%;height: 300px;padding: 50px 0;">
                                            <div style="width: 9cm;height: 5cm;margin: auto;">
                                                <img alt="" style=" filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.7));max-height: 5cm !important;max-width: 9cm !important;position: absolute;display: block;" id="proof_image"  src="">
                                                <?php
                                                if($_SESSION['corte'] == "no" &&  $_SESSION['redond'] == "no" &&  $_SESSION['perfo'] == "no")
                                                {
                                                ?>
                                                    <img src="img/prueba_tarjeta/marco.png" alt="marco" class="rotate180"  style="height:5cm !important;width: 9cm !important;position: absolute;display: block;">
                                                <?php
                                                }
                                                ?>   
                                                <?php
                                                if($_SESSION['corte'] == "si")
                                                {
                                                ?>
                                                    <img src="img/prueba_tarjeta/corte.png" alt="marco" class="rotate180"  style="height:5cm !important;width: 9cm !important;position: absolute;display: block;">
                                                <?php
                                                }
                                                ?>  
                                                <?php
                                                if($_SESSION['redond'] == "si")
                                                {
                                                    if($_SESSION['lado1'] == 1)
                                                    {
                                                        ?>
                                                            <img src="img/prueba_tarjeta/redond_1.png" alt="marco" class="rotate180"  style="height:5cm !important;width: 9cm !important;position: absolute;display: block;">
                                                        <?php
                                                    }
                                                    if($_SESSION['lado2'] == 1)
                                                    {
                                                        ?>
                                                            <img src="img/prueba_tarjeta/redond_2.png" alt="marco" class="rotate180"  style="height:5cm !important;width: 9cm !important;position: absolute;display: block;">
                                                        <?php
                                                    }
                                                    if($_SESSION['lado3'] == 1)
                                                    {
                                                        ?>
                                                            <img src="img/prueba_tarjeta/redond_3.png" alt="marco" class="rotate180"  style="height:5cm !important;width: 9cm !important;position: absolute;display: block;">
                                                        <?php
                                                    }
                                                    if($_SESSION['lado4'] == 1)
                                                    {
                                                        ?>
                                                            <img src="img/prueba_tarjeta/redond_4.png" alt="marco" class="rotate180"  style="height:5cm !important;width: 9cm !important;position: absolute;display: block;">
                                                        <?php
                                                    }
                                                    if($_SESSION['lado1'] == 1 && $_SESSION['lado2'] == 1)
                                                    {
                                                        ?>
                                                            <img src="img/prueba_tarjeta/redond_1_2.png" alt="marco" class="rotate180"  style="height:5cm !important;width: 9cm !important;position: absolute;display: block;">
                                                        <?php
                                                    }
                                                    if($_SESSION['lado1'] == 1 && $_SESSION['lado2'] == 1 && $_SESSION['lado3'] == 1 && $_SESSION['lado4'] == 1)
                                                    {
                                                        ?>
                                                            <img src="img/prueba_tarjeta/redond_1_2_3_4.png" alt="marco"  class="rotate180" style="height:5cm !important;width: 9cm !important;position: absolute;display: block;">
                                                        <?php
                                                    }
                                                    if($_SESSION['lado1'] == 1 && $_SESSION['lado4'] == 1)
                                                    {
                                                        ?>
                                                            <img src="img/prueba_tarjeta/redond_1_4.png" alt="marco" class="rotate180"  style="height:5cm !important;width: 9cm !important;position: absolute;display: block;">
                                                        <?php
                                                    }
                                                    if($_SESSION['lado2'] == 1 && $_SESSION['lado3'] == 1)
                                                    {
                                                        ?>
                                                            <img src="img/prueba_tarjeta/redond_2_3.png" alt="marco" class="rotate180"  style="height:5cm !important;width: 9cm !important;position: absolute;display: block;">
                                                        <?php
                                                    }
                                                    if($_SESSION['lado3'] == 1 && $_SESSION['lado4'] == 1)
                                                    {
                                                        ?>
                                                            <img src="img/prueba_tarjeta/redond_3_4.png" alt="marco" class="rotate180"  style="height:5cm !important;width: 9cm !important;position: absolute;display: block;">
                                                        <?php
                                                    }
                                                }
                                                ?>    
                                                <?php
                                                if($_SESSION['perfo'] == "si")
                                                {
                                                ?>
                                                    <img src="img/prueba_tarjeta/corte_perfo_1_5.png" alt="marco" class="rotate180"  style="height:5cm !important;width: 9cm !important;position: absolute;display: block;">
                                                <?php
                                                }
                                                ?>                                           
                                            </div>
                                        </div>                                            
                                        <p style="color:black;padding-bottom: 50px;">
                                            Nota: Si textos u objetos importantes estan fuera del recuadro azul interior, sube un nuevo archivo o si quieres que se proceda
                                            con el archivo los elementos podrian verse afectados al momento del corte.
                                        </p>
                                    <?php
                                    }
                                    if($producto == "Tarjetas" && $width==5 && $height == 9)
                                    {
                                    ?>
                                        <div style="width: 100%;height: 450px;padding: 50px 0;">
                                            <div style="width: 5cm;height: 9cm;margin: auto;">

                                                <!--  src= URL.createObjectURL(event.target.files[0])
                                                    to create URL: and then use it to preview with embed
                                                    <embed  
                                                        src=src
                                                        width="250"
                                                        height="200">
                                                    -->
                                                <img alt="" style="filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.7));max-height: 9cm !important;max-width: 5cm !important;position: absolute;display: block;" id="proof_image" src="">
                                                <!--<img src="img/prueba_tarjeta/marco.png" alt="marco" style="height:5cm !important;width: 5cm !important;position: absolute;display: block;">-->
                                                <?php
                                                if($_SESSION['corte'] == "no" &&  $_SESSION['redond'] == "no" &&  $_SESSION['perfo'] == "no")
                                                {
                                                ?>
                                                    <img src="img/prueba_tarjeta/marco_vertical.png" alt="marco"  class="rotate180"  style="height: 9cm; !important;width: 5cm !important;position: absolute;display: block;">
                                                <?php
                                                }
                                                ?>   
                                                <?php
                                                if($_SESSION['corte'] == "si")
                                                {
                                                ?>
                                                    <img src="img/prueba_tarjeta/corte_vertical.png" alt="marco"  class="rotate180" style="height: 9cm; !important;width: 5cm !important;position: absolute;display: block;">
                                                <?php
                                                }
                                                ?>  
                                                <?php
                                                if($_SESSION['redond'] == "si")
                                                {
                                                    if($_SESSION['lado1'] == 1)
                                                    {
                                                        ?>
                                                            <img src="img/prueba_tarjeta/redond_1.png" alt="marco"  class="rotate180" style="height: 9cm; !important;width: 5cm !important;position: absolute;display: block;">
                                                        <?php
                                                    }
                                                    if($_SESSION['lado2'] == 1)
                                                    {
                                                        ?>
                                                            <img src="img/prueba_tarjeta/redond_2.png" alt="marco" class="rotate180"  style="height: 9cm; !important;width: 5cm !important;position: absolute;display: block;">
                                                        <?php
                                                    }
                                                    if($_SESSION['lado3'] == 1)
                                                    {
                                                        ?>
                                                            <img src="img/prueba_tarjeta/redond_3.png" alt="marco"  class="rotate180" style="height: 9cm; !important;width: 5cm !important;position: absolute;display: block;">
                                                        <?php
                                                    }
                                                    if($_SESSION['lado4'] == 1)
                                                    {
                                                        ?>
                                                            <img src="img/prueba_tarjeta/redond_4.png" alt="marco"  class="rotate180" style="height: 9cm; !important;width: 5cm !important;position: absolute;display: block;">
                                                        <?php
                                                    }
                                                    if($_SESSION['lado1'] == 1 && $_SESSION['lado2'] == 1)
                                                    {
                                                        ?>
                                                            <img src="img/prueba_tarjeta/redond_1_2.png" alt="marco"  class="rotate180"  style="height: 9cm; !important;width: 5cm !important;position: absolute;display: block;">
                                                        <?php
                                                    }
                                                    if($_SESSION['lado1'] == 1 && $_SESSION['lado2'] == 1 && $_SESSION['lado3'] == 1 && $_SESSION['lado4'] == 1)
                                                    {
                                                        ?>
                                                            <img src="img/prueba_tarjeta/redond_1_2_3_4.png" alt="marco"  class="rotate180" style="height: 9cm; !important;width: 5cm !important;position: absolute;display: block;">
                                                        <?php
                                                    }
                                                    if($_SESSION['lado1'] == 1 && $_SESSION['lado4'] == 1)
                                                    {
                                                        ?>
                                                            <img src="img/prueba_tarjeta/redond_1_4.png" alt="marco"  class="rotate180"  style="height: 9cm; !important;width: 5cm !important;position: absolute;display: block;">
                                                        <?php
                                                    }
                                                    if($_SESSION['lado2'] == 1 && $_SESSION['lado3'] == 1)
                                                    {
                                                        ?>
                                                            <img src="img/prueba_tarjeta/redond_2_3.png" alt="marco"  class="rotate180"  style="height: 9cm; !important;width: 5cm !important;position: absolute;display: block;">
                                                        <?php
                                                    }
                                                    if($_SESSION['lado3'] == 1 && $_SESSION['lado4'] == 1)
                                                    {
                                                        ?>
                                                            <img src="img/prueba_tarjeta/redond_3_4.png" alt="marco"  class="rotate180" style="height: 9cm; !important;width: 5cm !important;position: absolute;display: block;">
                                                        <?php
                                                    }
                                                }
                                                ?>    
                                                <?php
                                                if($_SESSION['perfo'] == "si")
                                                {
                                                ?>
                                                    <img src="img/prueba_tarjeta/corte_perfo_1_5.png" alt="marco"  class="rotate180" style="height: 9cm; !important;width: 5cm !important;position: absolute;display: block;">
                                                <?php
                                                }
                                                ?> 
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <h6>Instrucciones (optional):</h6>
                                    <textarea placeholder="Deja alguna instrucciona dicionales" name="image_text" id="image_text" style="font-family: 'Medium';border: 1px solid #ccc;width: 100%;"></textarea>
                                </div> 
                                <div class="submit-wrapper center-block" id="button_upload2" style="visibility: hidden;display:none;padding-top:30px">
                                    <input style="width: 100%;" type="button" class="button large wide secondary" onclick="sendfile()" value="Continuar">
                                </div>
                            
                                
                            </div>
                           
                            
                        </div>
                    </form>
                    <div class="progress" id="pbar" style="visibility:hidden;width: 50%;margin: auto;">
                        <div id="progress-bar"class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                    </div>
                    
                    <div id="skip-step" style="display:block;font-size: 1.5rem;text-align: center;width: 100%;padding-top: 50px;color: black;" class="font-light">
                        <a href="subir_despues" class="link purchase-button" style="display: inline-block;font-size: 14px !important;width: 100%;margin: 0 0 15px;">Solicitar diseño</a>
                        <p style="color: black;width: 30px;display: inline-block;font-size: 14px !important;width: 100%;">o</p>
                        <a href="enviar_por_correo" class="link purchase-button" style="display: inline-block;font-size: 14px !important;width: 100%;">Mandar mas tarde el archivo por correo</a>
                    </div>
                </div>
                
                <div class="col-md-6 col-sm-12" style="visibility: hidden;display:none;">
                    <div class="card h-100">
                        <div class="card-header">
                        
                        </div>
                    </div>
                </div>
            </div><!-- /file list -->

            <div class="row" style="visibility: hidden;display:none;">
                <div class="col-12">
                <div class="card h-100">
                    <div class="card-header">
                        Debug Messages
                    </div>
                    <ul class="list-group list-group-flush" id="debug">
                        <li class="list-group-item text-muted empty">Loading plugin....</li>
                    </ul>
                </div>
                </div>
            </div> <!-- /debug -->

        </main>
      </div>
    </div> <!-- /container -->
    <?php include "footer.php"; ?>
    <script>
      let fileobj = null;
      let fileobj2 = null;
      let uploadProgress = [];
      let uploadProgress2 = [];
      initializeProgress(1);
      function initializeProgress(numFiles) 
      {
          $('#progress-bar').width(0 + "%").attr('aria-valuenow', 0);
          uploadProgress = []

          for(let i = numFiles; i > 0; i--) {
          uploadProgress.push(0)
          }
      }
      function initializeProgress2(numFiles) 
      {
          $('#progress-bar_2').width(0 + "%").attr('aria-valuenow', 0);
          uploadProgress = []

          for(let i = numFiles; i > 0; i--) {
          uploadProgress.push(0)
          }
      }
      function sendfile()
      {
        if( document.getElementById("drag-and-drop-zone_2"))
        {
            //initializeProgress2(1);
            ajax_file_upload_2(fileobj,fileobj2);
        }
        else
        {
            ajax_file_upload(fileobj);
        }
      }
      function ajax_file_upload_2(file_obj,fileobj2)
      {
        document.getElementById('drag-and-drop-zone_2').style.visibility = "hidden";//comments
        document.getElementById('drag-and-drop-zone_2').style.display = "none";
        document.getElementById('formdrop').style.visibility = "hidden";//
        document.getElementById('formdrop').style.display = "none";
        //document.getElementById('pbar').style.visibility = "visible";
        document.getElementById("title_h1").innerHTML = "Se estan subiendo tus archivos";
        var texto = document.getElementById('image_text').value;
        if(file_obj != undefined) 
        {
            var form_data = new FormData();                  
            form_data.append('file', file_obj);//
            form_data.append('file2', fileobj2);//
            form_data.append('image_text', texto);//
            $.ajax({
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt){
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            updateProgress(1,percentComplete*100*2);
                        }
                }, false);                        
                return xhr;
                },
                type: 'POST',
                url: 'php/upload_file_drop.php',
                contentType: false,
                processData: false,
                data: form_data,
                success:function(response) {
                    stateChange(-1);

                },
                onFailure: function(response){
                }
            });
        }
      }
      function ajax_file_upload(file_obj) 
      {
          document.getElementById('comments').style.visibility = "hidden";
          document.getElementById('comments').style.display = "none";
          document.getElementById('button_upload2').style.visibility = "hidden";
          document.getElementById('button_upload2').style.display = "none";
          document.getElementById('pbar').style.visibility = "visible";
          document.getElementById("title_h1").innerHTML = "Se esta subiendo tu archivo";
          var texto = document.getElementById('image_text').value;
          if(file_obj != undefined) 
          {
              var form_data = new FormData();                  
              form_data.append('file', file_obj);//
              form_data.append('image_text', texto);//
              $.ajax({
                  xhr: function() {
                      var xhr = new window.XMLHttpRequest();
                      xhr.upload.addEventListener("progress", function(evt){
                          if (evt.lengthComputable) {
                              var percentComplete = evt.loaded / evt.total;
                              updateProgress(1,percentComplete*100*2);
                          }
                  }, false);                        
                  return xhr;
                  },
                  type: 'POST',
                  url: 'php/upload_file_drop.php',
                  contentType: false,
                  processData: false,
                  data: form_data,
                  success:function(response) {
                      stateChange(-1);

                  },
                  onFailure: function(response){
                  }
              });
          }
      }
      function stateChange(newState) 
      {
            setTimeout(function(){
                if(newState == -1)
                {
                    window.location = "../carrito";
                }
            }, 500);
      }
      function stateChange2(newState) 
      {
            setTimeout(function(){
                if(newState == -1)
                {
                    window.location = "../cotizacion";
                }
            }, 500);
      }
      function updateProgress(fileNumber, percent) 
      {
          uploadProgress[fileNumber] = percent
          let total = uploadProgress.reduce((tot, curr) => tot + curr, 0) / uploadProgress.length
          let fileobj = null
          //console.debug('update', fileNumber, percent, total)
          //progressBar.value = total
          //$('#progress-bar').attr('aria-valuenow', total).css('width', total);
          //$('#progress-bar').attr("style","width:"+total); 
          $('#progress-bar').width(total + "%").attr('aria-valuenow', total);
      }
      function updateProgress2(fileNumber, percent) 
      {
          uploadProgress[fileNumber] = percent
          let total = uploadProgress.reduce((tot, curr) => tot + curr, 0) / uploadProgress.length
          let fileobj = null
          $('#progress-bar_2').width(total + "%").attr('aria-valuenow', total);
      }
    </script>
     <!-- JavaScript Libraries -->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>          



  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>

  <script src="upload_file/dist/js/jquery.dm-uploader.min.js"></script>
  <script src="upload_file/upload_file/demo-ui.js"></script>
  <script src="upload_file/upload_file/demo-config.js"></script>

  <script src="upload_second_file/dist/js/jquery.dm-uploader.min.js"></script>
  <script src="upload_second_file/upload_file/demo-ui.js"></script>
  <script src="upload_second_file/upload_file/demo-config.js"></script>

</body>

</html>
