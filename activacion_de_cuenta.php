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
  
  <script src="https://kit.fontawesome.com/a38c16a07e.js" crossorigin="anonymous"></script>

</head>
<body data-spy="scroll" data-target="#navbar-example" class="estaciones">
<?php
  include "header.php";
  ?>
    <div class="container" style="width: min-content;">
        <div class=" fullheight container">
            <div class="login-form">
                <form action="php/send_email.php" method="post"  style="padding-top: 150px;">	
                    <div class='title_cut_small'>
                        <?php
                        if(isset($_GET['exito']))
                        {
                            if($_SESSION['session_tipo']==1)
                            {
                                ?>
                                    <p style='text-align: center;color:black;' class='font-light'>                                    
                                    A continuación nosotros verificaremos la información que nos proporcionaste para darte de alta y que empieces a disfrutar de 
                                    los precios bajos para nuestros clientes de maquila.  El proceso de verificación de datos puede tardar hasta 24 horas en días hábiles.
                                    <br>
                                    <br>
                                    Nota: Si decides comprar antes de ser verificado, puedes ingresar directamente a la sección del producto que deseas, pero sin ingresar la 
                                    información de la cuenta que acabas de crear, solo que pagaras el precio de cliente final hasta que te llegue tu aprobación de cliente de maquila.
                                    
                                <?php
                                session_destroy();
                            }
                            else
                            {
                                ?>
                                    <p style='text-align: center;color:black;' class='font-light'>Tu correo <?php echo $email;?> ha sido verificado con éxito</p>
                                <?php
                            }
                            
                        }
                        else if(isset($_GET['token']))
                        {
                            ?>
                                <h3 style='text-align: center;width: 100%;'>Verifica tu correo</h3>
                                <p style='text-align: center;color:black;' class='font-light'>Te enviamos un nuevo link para que actives tu cuenta.</p>
                                
                            <?php
                        }else if(isset($_GET['expired']))
                        {
                            ?>
                                <p style='text-align: center;color:black;' class='font-light'>Parece que usaste un link que ha expirado, ya fue usado o entraste a una direccion invalida</p>
                            <?php
                        }
                        else
                        {
                            ?>
                            <h3 style='text-align: center;width: 100%;'>Verifica tu correo</h3>
                            <p style='text-align: center;color:black;' class='font-light'>Enviamos a <?php echo $email;?> un link para activar tu cuenta.</p>
                            <?php
                        }
                        ?>
                        <p style="text-align: center;"><a href="index">Regresar</a></p>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
  include "footer.php";
  ?>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <script>
    function hola(){
      alert("hola");
    }
  </script>
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

