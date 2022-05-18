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
    .panel-default {
    background-color: #9d9c9c;
    }
    .check-title a{
      color: white !important;
    }
    small{
      color: white !important;
    }
    .proximamente{
      position: relative;
      width: 140px;
      text-align: center;
      display: block;
      float: right;
    }
    .panel-default:hover{
      background-color: gray;
    }
    .check-title
    {
      font-size: 12px !important;
    }
    .check-title a
    {
      color:black !important;
    }
    .saleon{
      background: #4fa955 none repeat scroll 0 0 !important;
      font-family: "Light";
      font-weight: 500;
      clip-path: polygon(45% 25%,100% 25%, 100% 75%, 45% 75%, 45% 90%,5% 50%, 45% 10%) !important;
      font-size: 9px !important;
      padding: 5px 2px 5px 10px !important;
    }
    .faq-details h4.check-title a {
    padding: 5px 20px !important;
    }
    b{
      color: darkgray;
    }
    i{
      color: gray;
    }
    .productos:hover
    {
      color: #3399cc !important;
      text-decoration: underline !important;
    }
  </style>
</head>

<body data-spy="scroll" data-target="#navbar-example" class="estaciones">

  <!--
    <div id="preloader">
      background-image: url('img/estaciones/verano.png');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    </div>
  -->
  <?php
  $index = 1;
  include "header.php";
  $index = 0;
  ?>
  
    <div id="homeArea" class="portfolio-area fix" style="padding-top: 40px;">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div id="slider2">
              
            </div>
          </div>
        </div>
      </div>
    </div>
    
    
    <div id="portfolio" class="container" style="width: min-content ;">
      <div class="container" style="padding-top: 70px;height: 100vh !important;">  
        <div class="row">
          <div class="col-md-3 col-sm-5 col-xs-12" style="padding: 0px 0px 0px 0px;background-color: #e9f0f4;border-radius: 7px;" id="offset">
            <div class="faq-details">
            <h3 style="text-align: left;font-family: 'Regular';font-size: 17px !important;margin: 0px;padding: 5px 20px !important;">OFFSET</h3>
              <div class="panel-group" id="accordion">
                <!-- Panel Default background-image: linear-gradient( to bottom,rgba(255,255,255,0.09) 50%,rgba(0,0,0,0.1) 100% ); -->
                
                <div class="panel panel-default left-nav"  style="background-repeat: no-repeat !important;background-size: cover !important;background: url('img/menu_button.gif');margin-top: 0px;border: 0px;border-radius: 7px 7px 0px 0px;">
                  <div class="panel-heading ">
                    <h4 class="check-title">
                        <a class="productos" href="tarjetas" style="letter-spacing: 0px;margin-left: 0px; text-align: left;font-weight: 500 !important;">
                                                  <!--<i class="fas fa-shopping-cart" style="padding-right: 30px;"></i>-->Tarjetas de Presentación                       
                        </a>
                      </h4>
                  </div>
                </div>
                <!-- End Panel Default -->
                <!-- Panel Default -->
                <div class="panel panel-default left-nav pri_table_list active"  style="background-repeat: no-repeat !important;background-size: cover !important;background: url('img/menu_button.gif');margin-top: 0px;border: 0px;border-radius: 0px 0px 7px 7px;">
                  <div class="panel-heading ">
                    <h4 class="check-title">
                        <a class="productos" data-toggle="collapse"  data-parent="#accordion" href="#check1" style="letter-spacing: 0px;margin-left: 0px;text-align: left;font-weight: 500 !important;">
                                                <!--<i class="fas fa-shopping-cart" style="padding-right: 30px;"></i>-->Volantes
                                                
                        </a>
                      </h4>
                  </div>
                </div>
                <!-- End Panel Default -->
                 <!-- Panel Default 
                 <div class="panel panel-default left-nav pri_table_list active" style="background-repeat: no-repeat !important;background-size: cover !important;background: url('img/menu_button.gif');margin-top: 0px;border: 0px;border-radius: 0px 0px 0px 0px;">
                  <div class="panel-heading ">
                    <h4 class="check-title">
                      <span class="saleon">Prox</span>
                        <a class="productos" data-toggle="collapse" data-parent="#accordion" href="#check4"style="letter-spacing: 0px;margin-left: 0px;text-align: left;font-weight: 500 !important;">
                                                  Dipticos
                                                  
                        </a>
                      </h4>
                  </div>
                </div>
                End Panel Default -->
                <!-- Panel Default -->
                <div class="panel panel-default left-nav pri_table_list active" style="background-repeat: no-repeat !important;background-size: cover !important;background: url('img/menu_button.gif');margin-top: 0px;border: 0px;border-radius: 0px 0px 0px 0px;">
                  <div class="panel-heading ">
                    <h4 class="check-title">
                      <span class="saleon">Prox</span>
                        <a class="productos" data-toggle="collapse" data-parent="#accordion" href="#check3" style="letter-spacing: 0px;margin-left: 0px;text-align: left;font-weight: 500 !important;">
                          Folletos (<div class="productos" style="font-size: 9px;width: max-content;display: inline-block;">Trípticos / Dipticos</div>)                      
                        </a>
                      </h4>
                  </div>
                </div>
                <!--End Panel Default -->
               
                <!-- Panel Default -->
                <div class="panel panel-default left-nav pri_table_list active" style="background-repeat: no-repeat !important;background-size: cover !important;background: url('img/menu_button.gif');margin-top: 0px;border: 0px;border-radius: 0px 0px 0px 0px;">
                  <div class="panel-heading ">
                    <h4 class="check-title">
                    <span class="saleon">Prox</span>
                        <a class="productos" data-toggle="collapse" data-parent="#accordion" href="#check4" style="letter-spacing: 0px;margin-left: 0px;text-align: left;font-weight: 500 !important;">
                                                  <!--<i class="fas fa-shopping-cart" style="padding-right: 30px;"></i>-->Notas de Remisión
                                                  
                        </a>
                      </h4>
                  </div>
                </div>
                <!-- End Panel Default -->
                 
              </div>
            </div>
          </div>
          <div class="col-md-9 col-sm-7 col-xs-12" id="slider_container">
            <div style="display:block;height: 140px;">
              <div id="pleca_login"  class="col-md-9 col-sm-7 col-xs-12" style="display: block;padding: 16px 0px;background-color: #d9e1e7;border-radius: 10px;margin-bottom: 20px;z-index: 1;position: absolute;width: 96%;height: 50px;top: 10px;">
                <div class="col-md-4" style="padding: 0;">
                    <label for="" style="font-size:18px;etter-spacing: 2px;font-family: 'Light';font-weight: normal;position: relative;width: 100%;text-align: right;">Identificate</label>
                </div>
                <div class="col-md-1" style="text-align: center;padding: 0;">
                  <label for=""> ó</label>
                </div>
                <div class="col-md-7" style="padding: 0;text-align: left;">
                  <?php
                  if($_GET["pagina"]==1)
                  {
                    $pagina = "volantes";
                  }
                  else
                  {
                    $pagina = "tarjetas";
                  }
                  ?>
                  <a href="<?php echo $pagina; ?>?invitado=on" style="float: right;font-size: 16px;width: 100%;">Da click aqui para continuar como invitado</a>
                </div>
                
                  
               
              </div>
              <img src="img/login.png" alt="" style="width: 80px;padding-left: 10px;z-index: 9;position: absolute;">
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12" style="border: 1px solid #EFEFEF;background: #EAF4FD none repeat scroll 0 0;padding: 0;">
              <form action="php/login_usr.php" method="post" class="existing" style="padding-top: 20px;">
                  <input type="text" name="identificate" style="display:none;">
                  <span style="display: inline-block;text-align: center;" class="footer-logo"><span style="display: inline-block;text-align: center;color: #21566b;font-weight: bold;text-decoration: underline;">¿Si ya tienes una cuenta?</span> Identificate a continuación!</span>
                  <div class="col-md-5 col-sm-4 col-xs-4" style="height: 120px;">
                    <label for="form_login_login" style="margin-bottom: 10px;text-align: right;width: 100%;">Correo:</label>
                    <label for="form_login_password" style="text-align: right;width: 100%;">Contraseña:</label>
                  </div>
                  <div class="col-md-7 col-sm-8 col-xs-8 footer-logo" style="height: 120px;">
                    <input type="text" id="form_login_login" name="correo" style="margin-bottom: 10px;border: 1px solid #c8c8c8;height: 18px;width: -webkit-fill-available;">
                    <input type="password" id="form_login_password" name="pass" autocomplete="off" style="border: 1px solid #c8c8c8;height: 18px;width: -webkit-fill-available;">
                  </div>
                  <span class="center footer-logo">
                    <a href="reset" id="">¿Olvidaste tu contraseña?</a>
                    <input type="submit" class="cutomB" style="width: auto;margin: 0px 15px;" value="Entrar">
                  </span>
              </form>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12" style="border: 1px solid #EFEFEF;padding: 0;">
              <form action="registro.php" method="post" class="signup" style="padding-top: 20px;">
                  <span style="display: inline-block;text-align: center;" class="footer-logo"><span style="display: inline-block;text-align: center;color: #21566b;font-weight: bold;text-decoration: underline;">¿Si eres nuevo?</span> Llena los siguientes datos para empezar tu registro!</span>
                  <div class="col-md-5 col-sm-4 col-xs-4" style="height: 120px;">
                    <label for="form_login_login" style="text-align: right;width: 100%;margin-bottom: 10px;">Correo:</label> 
                    <label for="form_login_name_first" style="text-align: right;width: 100%;margin-bottom: 10px;">Nombre:</label>
                    <label for="form_login_name_last"  style="text-align: right;width: 100%;">Telefono:</label>
                  </div>
                  <div class="col-md-7 col-sm-8 col-xs-8 footer-logo" style="height: 120px;">
                    <input type="text" id="form_signup_login" name="email"  style="margin-bottom: 10px;border: 1px solid #c8c8c8;height: 18px;width: -webkit-fill-available;">
                    <input type="text" id="form_signup_name_first" name="name"  style="margin-bottom: 10px;border: 1px solid #c8c8c8;height: 18px;width: -webkit-fill-available;">
                    <input type="text" id="form_signup_name_last" name="phone" style="border: 1px solid #c8c8c8;height: 18px;width: -webkit-fill-available;">
                  </div>
                  <span class="center footer-logo">
                    <a href="reset" id="" style="visibility: hidden;">¿Olvidaste tu contraseña?</a>
                    <input type="submit" class="cutomB" style="width: auto;margin: 0px 15px;" value="Registro">
                  </span>
              </form>   
            </div> 
          <!--
            <div style="text-align: center;margin-top: 50px;display: inline-block;position: relative;width: 100%;">
              <p style="width: 100px;display: inline-block;border-top: 1px solid black;margin: 3px 10px;"></p> ó <p style="width: 100px;display: inline-block;border-top: 1px solid black;margin: 3px 10px;"></p>
              <a href="tarjetas?invitado=on" style="width: 100%;display: block;padding-top: 30px;">Continuar como invidato</a>
            </div>
          -->
          </div>
        </div>
      </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) { 

          setTimeout(function () {
            let altura = document.getElementById("slider_container").clientHeight;
            let largo = document.getElementById("slider_container").clientWidth-30;
            document.getElementById("offset").style.height = altura+"px"; 
            //document.getElementById("pleca_login").style.width = largo+"px"; 
          }, 1500);
          
        });
        
    </script>
  <?php
  include "footer.php";
  ?>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

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