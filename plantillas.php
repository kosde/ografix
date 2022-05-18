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
                      <span class="saleon">Prox</span>
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
                                                  <!--<i class="fas fa-shopping-cart" style="padding-right: 30px;"></i>-->Folletos (<div class="productos" style="font-size: 9px;width: max-content;display: inline-block;">Trípticos / Dipticos</div>)   
                                                  
                        </a>
                      </h4>
                  </div>
                </div>
                <!-- End Panel Default -->
               
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
            <div id="slider">
                <table class="templates_table" width="682" cellpadding="0" style="border-right: 1px solid #EFEFEF;border-bottom: 1px solid #EFEFEF;border-left: 1px solid #EFEFEF;">
                    <tbody><tr class="heading">
                        <th scope="col" style="background: #EFEFEF;">Tarjetas de presentación</th>
                        <th scope="col" style="background: #EFEFEF;">Horizontal</th>
                        <th scope="col" style="background: #EFEFEF;">Vertical</th>
                    </tr>
                    <tr style="width: 20px;display: inline-block;"></tr>
                    <tr>
                        <td>
                            <img src="img/slider/Tarjetas_Presentacion.png" alt="Announcement Cards" style="width: 200px;">
                        </td>
                        <td>
                            <p class="sizes">
                                <img src="plantillas/ai_icono.png" style="width: 15px !important;">
                                <b>AI:</b>
                                <br>
                                <i>9cm x 5cm </i> - <a href="plantillas/TDV 9cm x 5cm Horizontal.ai">Descargar</a>
                                <br>
                                <br>
                                <img src="plantillas/ait_icono.png" style="width: 15px !important;">
                                <b>AIT:</b>
                                <br>
                                <i>9cm x 5cm</i> - <a href="plantillas/TDV 9cm x 5cm Horizontal.ait">Descargar</a>
                                <br>
                                <br>
                                <img src="plantillas/eps_icono.png" style="width: 15px !important;">
                                <b>EPS:</b>
                                <br>
                                <i>9cm x 5cm</i> - <a href="plantillas/TDV 9cm x 5cm Horizontal.eps">Descargar</a>
                                <br>
                                <br>
                                <img src="plantillas/pdf_icono.png" style="width: 15px !important;">
                                <b>PDF:</b>
                                <br>
                                <i>9cm x 5cm</i> - <a href="plantillas/TDV 9cm x 5cm Horizontal.pdf">Descargar</a>
                                <br>
                                <br>
                                <img src="plantillas/psd_icono.png" style="width: 15px !important;">
                                <b>PSD:</b>
                                <br>
                                <i>9cm x 5cm</i> - <a href="plantillas/TDV 9cm x 5cm Horizontal.psd">Descargar</a>
                                <br>
                            </p>
                        </td>
                        <td>
                            <p class="sizes">
                               <img src="plantillas/ai_icono.png" style="width: 15px !important;">
                                <b>AI:</b>
                                <br>
                                <i>5cm x 9cm</i> - <a href="plantillas/TDV 5cm x 9cm Vertical.ai">Descargar</a>
                                <br>
                                <br>
                                <img src="plantillas/ait_icono.png" style="width: 15px !important;">
                                <b>AIT:</b>
                                <br>
                                <i>5cm x 9cm</i> - <a href="plantillas/TDV 5cm x 9cm Vertical.ait">Descargar</a>
                                <br>
                                <br>
                                <img src="plantillas/eps_icono.png" style="width: 15px !important;">
                                <b>EPS:</b>
                                <br>
                                <i>5cm x 9cm</i> - <a href="plantillas/TDV 5cm x 9cm Vertical.eps">Descargar</a>
                                <br>
                                <br>
                                <img src="plantillas/pdf_icono.png" style="width: 15px !important;">
                                <b>PDF:</b>
                                <br>
                                <i>5cm x 9cm</i> - <a href="plantillas/TDV 5cm x 9cm Vertical.pdf">Descargar</a>
                                <br>
                                <br>
                                <img src="plantillas/psd_icono.png" style="width: 15px !important;">
                                <b>PSD:</b>
                                <br>
                                <i>5cm x 9cm</i> - <a href="plantillas/TDV 5cm x 9cm Vertical.psd">Descargar</a>
                                <br>
                            </p>
                        </td>
                    </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) { 

          setTimeout(function () {
            let altura = document.getElementById("slider").clientHeight;
            //alert(altura);
            document.getElementById("offset").style.height = altura+"px"; 
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