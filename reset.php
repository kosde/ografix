<?php
session_start();
if(isset($_GET['email']))
{
    $email    = $_GET['email'];
}
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

</head>
<body data-spy="scroll" data-target="#navbar-example" class="estaciones">
<?php
  include "header.php";
  ?>
  <div id="contact" class="portfolio-areafix fullheight container" style="width: min-content;margin: auto;">
    <div class="contact-inner ">
      <div class="contact-overly "></div>
      <div class="container area-padding fullheight" style="padding-top: 150px;">
        <div class="row flex">
          <!-- Start  contact -->
          <div class="col-md-6 col-sm-6 col-xs-12 mauto form-login">
            <div class="main">
                <div class="">
                    <form action="php/send_email.php" method="post">	
                        <?php
                        if(isset($_GET['email']))
                        {
                            ?>
                            <?php
                            echo "<div style='display: none;visibility: hidden;'>";
                            $datezone=date_default_timezone_get();
                            $date = date('Y-m-d H:i');
                            $date_hash =  hash('sha512',$date);
                            $email_U=$_SESSION['email'];
                            $from = "notificaciones@ografix.com";
                            $to = $email_U;
                            $linkverifica = "https://www.ografix.com/nueva_contrasena?email=".hash('sha512',$email_U)."token=".$date_hash;
                            $subject = "Recuperación de contraseña";
                            $message = "Recibimos la solicitud para cambiar la contraseña de tu cuenta<br>
                                        <br>
                                        Haz clic en el siguiente botón para iniciar este proceso.<br>
                                        <br>
                                        <a href='". $linkverifica ."'>Cambiar ahora</a><br>
                                        <br>
                                        Si no solicitaste el cambio de contraseña ignora este correo<br>
                                        <br>
                                        <br>
                                        <br>
                                        Saludos,<br>
                                        <br>
                                        <br>
                                        ografix";
                            require('php/phpmailer/class.phpmailer.php');
                            include 'php/conexion.php';
                            $activar = mysqli_query($conexion,"UPDATE users SET date_token='$date',token='$date_hash' WHERE email = '$to'");

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
                            $mail->IsHTML(true);
                            echo "</div>";
                            echo "
                                <div class='title_cut_small'>
                                    <h3 style='text-align: center;width: 100%;'>Revisa tu correo</h3>
                                    <p style='text-align: center;' class='font-light'>Enviamos a ".$email ." un link para cambiar tu contraseña.</p>
                                </div>";
                            if(isset($_SESSION['email']))
                            {
                            echo"
                                <div class='text-center'>
                                    <a href='../cuenta' class='text-success'>Regresar</a>
                                </div>
                                ";
                            }
                            else{
                            echo"
                                <div class='text-center'>
                                    <a href='../identificate' class='text-success'>Regresar</a>
                                </div>
                                ";
                            }
                        }
                        if(!isset($_GET['email'])) // $_SESSION['recover'] = 1;
                        {
                            echo "
                                    <div class='title_cut_small'>
                                        <h3 class='center'>Cambia tu contraseña</h3>
                                    </div>
                                    <div class='form-group'>
                                        <label class='fontnormal form-check-label'>Correo:</label>
                                        <small style='margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400;color:red;'>*</small>
                                        <div class='input-group' style='width: 100%;'>
                                            <input style='width: 100%;border: 1px solid #c8c8c8;' type='email' class='form-control font-light' name='email' required='required'>
                                        </div>
                                    </div>           
                                    <div class='form-group'>
                                        <button style='width: 100%;' type='submit' class='button secondary large pr-4'>Continuar</button>
                                    </div>
                                    <div class='text-center'>
                                        <a href='identificate'>Regresar</a>
                                    </div>
                                ";
                        }
                        ?> 
                    </form>
                </div>
            </div>
          </div>
          <!-- End Left contact -->
        </div>
      </div>
    </div>
  </div>
    
    <?php
        include "footer.php";
    ?>
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>

