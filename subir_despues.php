<?php
    session_start();
    include 'php/conexion.php';
    $tipo = $_SESSION['tipo'];
    $medida = explode('x',$_SESSION['medida']);// $_SESSION['medida'];
    $quantity = $_SESSION['quantity'];
    $vista = $_SESSION['vista'];
    $acabado = $_SESSION['acabado'];
    $redond = $_SESSION['redond'];
    $filename = $_SESSION['filename'];
    $producto = $_SESSION['producto'];
    $precioproducto = $_SESSION['precioproducto'];
    $preciofinal = $_SESSION['preciofinal'];
    $precioesquinas = $_SESSION['precioesquinas'];
    $corte = $_SESSION['corte'];
    $width = $medida[0];
    $height = $medida[1];
    if($_SESSION['producto'] == "Tarjetas" || $_SESSION['producto'] == "Volantes")
    {
        $lados = $_SESSION['lado1'].$_SESSION['lado2'].$_SESSION['lado3'].$_SESSION['lado4'];
        $ponchado =  $_SESSION['perfo1'].$_SESSION['perfo2'].$_SESSION['perfo3'].$_SESSION['perfo4'].$_SESSION['perfo5'].$_SESSION['perfo6'].$_SESSION['perfo7'].$_SESSION['perfo8'];
        $_SESSION['lados'] = $lados;
        $_SESSION['ponchado'] = $ponchado;
    }
    $id =  $_SESSION['id'];
    $date = date('Y-m-d H:i'); 
    $query_cart = "INSERT INTO cart (id_user,width_inches,height_inches,price,tipe,quantity,dates,vista,acabado,esquinas,ponchado,corte,statusp) 
                VALUES('$id','$width','$height','$preciofinal','$producto','$quantity','$date','$vista','$acabado','$lados','$ponchado','$corte',11)";
    if($_SESSION['subir'] == 1)
    {
        $cart= mysqli_query($conexion,$query_cart);
        $_SESSION['subir'] = 0;
    }
    $_SESSION['producto'] = "Diseño de tarjetas";
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
    <link href="upload_file/dist/css/jquery.dm-uploader.min.css" rel="stylesheet">
    <link href="upload_file/upload_file/styles.css" rel="stylesheet"> <!--checar aqui--->
</head>
  <body data-spy="scroll" data-target="#navbar-example" class="estaciones">
  <?php
    include "header.php";
  ?>
    <div class="paper container" style="width: min-content;">
      <div class="wrapper_cut bg-image-container" style="padding-top: 0px;">
        <main role="main" class="container">
            <div class="row" style="height: 70vh;padding-top: 50px; padding-bottom: 50px;">
                <div class="col-md-12 col-sm-12">
                    <h1 style="text-align: center;font-size: 3.0rem;padding-bottom: 50px;" id="title_h1">Describe tu diseño</h1>
                    <div id="drag-and-drop-zone_2" class="dm-uploader p-5">
                        <form id="formdrop_2" action="php/uploadFile.php" method="post" enctype="multipart/form-data" class="dropform" style="width: 100% !important;text-align: center !important;">
                            <div class="form-group">
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
                                        <input class="form-control fileforminput" placeholder="Selecciona tu boceto" name="file-name" id="file-name_2" style="padding-bottom: 10px;width: 100%;text-align: center;">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="drag-and-drop-zone" class="dm-uploader p-5">
                        <form id="formdrop" action="php/uploadFile.php" method="post" enctype="multipart/form-data" class="dropform" style="width: 100% !important;text-align: center !important;">
                            <div class="form-group">      
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
                                        <input class="form-control fileforminput" placeholder="Selecciona tu logo" name="file-name" id="file-name" style="padding-bottom: 10px;width: 100%;text-align: center;">
                                    </div>
                                    <div id="comments" style="width: 100%;padding-top: 100px;">
                                        <h6 style="text-align: center;display: inline-block;">Instrucciones (optional):</h6>
                                        <textarea placeholder="Deja alguna instrucciona dicionales" name="image_text" id="image_text" style="font-family: 'Medium';border: 1px solid #ccc;width: 100%;"></textarea>
                                    </div> 
                                    <div class="submit-wrapper center-block" id="button_upload2" style="padding-top:30px">
                                        <input style="width: 100%;" type="button" class="button large wide secondary" onclick="sendfile()" value="Continuar">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="progress" id="pbar" style="visibility:hidden;width: 50%;margin: auto;">
                            <div id="progress-bar"class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
      </div>
    </div>
    <?php include "footer.php"; ?>
    <script>
      let fileobj = null;
      let fileobj2 = null;
      let uploadProgress = [];
      initializeProgress(1);
      function initializeProgress(numFiles) 
      {
          $('#progress-bar').width(0 + "%").attr('aria-valuenow', 0);
          uploadProgress = []

          for(let i = numFiles; i > 0; i--) {
          uploadProgress.push(0)
          }
      }
      function sendfile()
      {
        ajax_file_upload_2(fileobj,fileobj2);
      }
      function ajax_file_upload_2(file_obj,fileobj2)
      {
        document.getElementById('drag-and-drop-zone_2').style.visibility = "hidden";//comments
        document.getElementById('drag-and-drop-zone_2').style.display = "none";
        document.getElementById('formdrop').style.visibility = "hidden";//
        document.getElementById('formdrop').style.display = "none";
        document.getElementById('pbar').style.visibility = "visible";
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
      function stateChange(newState) 
      {
            setTimeout(function(){
                if(newState == -1)
                {
                    window.location = "../carrito";
                }
            }, 500);
      }
      function updateProgress(fileNumber, percent) 
      {
          uploadProgress[fileNumber] = percent
          let total = uploadProgress.reduce((tot, curr) => tot + curr, 0) / uploadProgress.length
          let fileobj = null
          $('#progress-bar').width(total + "%").attr('aria-valuenow', total);
      }
    </script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>          
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <script src="upload_file/dist/js/jquery.dm-uploader.min.js"></script>
  <script src="upload_file/upload_file/demo-ui.js"></script>
  <script src="upload_file/upload_file/demo-config.js"></script>
  <script src="upload_second_file/dist/js/jquery.dm-uploader.min.js"></script>
  <script src="upload_second_file/upload_file/demo-ui.js"></script>
  <script src="upload_second_file/upload_file/demo-config.js"></script>
</body>
</html>