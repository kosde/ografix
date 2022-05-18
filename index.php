<?php
 session_start();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Ografix</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="description" content="Servicios Integrales en Publicidad. Diseño Gráfico, Diseño Web, Anuncios Luminosos, Letras 3D en Acrilico y Aluminio, Toldos Fijos y Enrollables, Impresión Offset, Gran Formato, Sublimado, Serigrafia, Bordados, Etc.">
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
      background: #4fa955 none repeat scroll 0 0;
      font-family: "Light";
      font-weight: 500;
      /*clip-path: polygon(45% 30%,100% 30%, 100% 70%, 45% 70%, 45% 80%, 15% 50%, 45% 20%) !important;*/
      clip-path: polygon(45% 25%,100% 25%, 100% 75%, 45% 75%, 45% 90%,5% 50%, 45% 10%) !important;
      font-size: 9px !important;
      padding: 5px 2px 5px 10px !important;
    }
    .faq-details h4.check-title a {
    padding: 5px 20px !important;
    }
    .productos:hover
    {
      color: #3399cc !important;
      text-decoration: underline !important;
    }
  </style>
  <script>
    function Close_prox()
    {
        var modal = document.getElementById("prox_producto");
        modal.style.display = "none";
    }
    function open_prox()
    {
        var modal = document.getElementById("prox_producto");
        modal.style.display = "flex";
    }
  </script>
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
  
      <div class="modal-container" id="prox_producto" style="display: none;;position: fixed;"> 
        <div class="modal-content" style="display: inline-table;height: 150px;margin: auto !important;">
          <span>
              <div id="address-list" class="fade-appear fade-appear-active">
                  <p style="color: black;font-size: 14px !important;text-align: justify;">Este producto estara libre para su venta en línea muy pronto mientras tanto puedes comprarlo marcando al teléfono: 444 847 1216</p>
                  <span id="shipping-address-book-app" style="width: 100%;display: inline-block;text-align: center;">&nbsp;
                    <button class="button link edit" type="button" onclick="Close_prox()">Aceptar</button>
                  </span>
              </div>
          </span>
          <button class="modal-close-x" onclick="Close_prox()" type="button">×</button>
        </div>
      </div>
  
    
    <div >
      <div id="home" class="slider-area">
        <div class="bend niceties preview-2">
          <div id="ensign-nivoslider" class="s  lides">
            <img src="img/slider/nuevo/7.jpg" alt="" id="2" title="#slider-direction-3" />
            <img src="img/slider/nuevo/3.jpg" alt="" id="3" title="#slider-direction-3" />
            <img src="img/slider/nuevo/4.jpg" alt="" id="4" title="#slider-direction-3" />
            <img src="img/slider/nuevo/1.jpg" alt="" id="1" title="#slider-direction-3" />
            <img src="img/slider/nuevo/5.jpg" alt="" id="5" title="#slider-direction-3" />
            <img src="img/slider/nuevo/6.jpg" alt="" id="6" title="#slider-direction-3" />
            <img src="img/slider/nuevo/2.jpg" alt="" id="7" title="#slider-direction-3" />
          </div>

          <div id="slider-direction-1" class="slider-direction slider-one">
            <div class="container" >
              <div class="row" style="margin-top: 50px;">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="slider-content">
                    <!--
                    <div class="layer-1-1 hidden-xs wow slideInDown" data-wow-duration="2s" data-wow-delay=".2s">
                    </div>
                    <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                    </div>-->
                    <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--
          <div id="slider-direction-2" class="slider-direction slider-two">
            <div class="container">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="slider-content text-center">
                    <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                    </div>
                    <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                    </div>
                    <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div id="slider-direction-3" class="slider-direction slider-two">
            <div class="container">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="slider-content">
                    <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                    </div>
                    <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                    </div>
                    <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>-->
        </div>
      </div>
    </div>
    <div id="homeArea" class="portfolio-area fix" style="">
      <div class="">
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
    
    
    <div id="portfolio" class="container" style="width: min-content;">
      <div class="container" style="padding-top: 50px;">  
        <div class="row">
          <div class="col-md-3 col-sm-5 col-xs-12" style="padding: 0px 0px 0px 0px;background-color: #e9f0f4;border-radius: 7px;" id="offset">
            <div class="faq-details">
            <h3 style="text-align: left;font-family: 'Regular';font-size: 17px !important;margin: 0px;padding: 5px 20px !important;">OFFSET</h3>
              <div class="panel-group" id="accordion">
                <!-- Panel Default background-image: linear-gradient( to bottom,rgba(255,255,255,0.09) 50%,rgba(0,0,0,0.1) 100% ); -->
              
                <div class="panel panel-default left-nav"  style="background-repeat: no-repeat !important;background-size: cover !important;background: url('img/menu_button.gif');margin-top: 0px;border: 0px;border-radius: 7px 7px 0px 0px;">
                  <div class="panel-heading ">
                    <h4 class="check-title">
                        <a class="productos" href="tarjetas?pagina=0" style="letter-spacing: 0px;margin-left: 0px; text-align: left;font-weight: 500 !important;">
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
                      <!--<span class="saleon">Prox</span>-->
                        <a class="productos" href="volantes?pagina=1" style="letter-spacing: 0px;margin-left: 0px; text-align: left;font-weight: 500 !important;">
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
                        <a class="productos" data-toggle="collapse" data-parent="#accordion" onclick="open_prox()" style="letter-spacing: 0px;margin-left: 0px;text-align: left;font-weight: 500 !important;cursor:pointer; cursor: hand">
                          Folletos (<div class="productos" style="font-size: 9px;width: max-content;display: inline-block;">Trípticos / Dipticos</div>)                        
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
                        <a class="productos" data-toggle="collapse" data-parent="#accordion" onclick="open_prox()" style="letter-spacing: 0px;margin-left: 0px;text-align: left;font-weight: 500 !important;cursor:pointer; cursor: hand">
                                                  <!--<i class="fas fa-shopping-cart" style="padding-right: 30px;"></i>-->Notas de Remisión
                                                  
                        </a>
                      </h4>
                  </div>
                </div>
                <!-- End Panel Default -->
                 
              </div>
            </div>
          </div>
          <div class="col-md-9 col-sm-7 col-xs-12 slider_container" id="slider_container">
            <div id="slider">
            </div>
          <!--
            <div class="awesome-project-content">
              single-awesome-project start 
              <div class="col-md-3 col-sm-4 col-xs-12 design development">
                <div class="single-awesome-project">
                  <div class="awesome-img">
                    <a href="#"><img src="img/slider/D.web.jpg" alt="" /></a>
                    <div class="add-actions text-center">
                      <div class="project-dec">
                        <a class="venobox" data-gall="myGallery" href="img/slider/D.web.jpg">
                          <h4 style="padding-top: 30%;">Diseño y Desarrollo Web</h4>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              single-awesome-project end 
              single-awesome-project start 
              <div class="col-md-3 col-sm-4 col-xs-12 photo">
                <div class="single-awesome-project">
                  <div class="awesome-img">
                    <a href="#"><img src="img/slider/Letras 3d.jpg" alt="" /></a>
                    <div class="add-actions text-center">
                      <div class="project-dec">
                        <a class="venobox" data-gall="myGallery" href="img/slider/Letras 3d.jpg">
                          <h4 style="padding-top: 30%;">Letras de Aluminio</h4>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              single-awesome-project end
              single-awesome-project start
              <div class="col-md-3 col-sm-4 col-xs-12 design">
                <div class="single-awesome-project">
                  <div class="awesome-img">
                    <a href="#"><img src="img/slider/Anuncios Luminosos.jpg" alt="" /></a>
                    <div class="add-actions text-center">
                      <div class="project-dec">
                        <a class="venobox" data-gall="myGallery" href="img/slider/Anuncio Luminosos.jpg">
                          <h4 style="padding-top: 30%;">Anuncios Luminosos</h4>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-4 col-xs-12 development">
                <div class="single-awesome-project">
                  <div class="awesome-img">
                    <a href="#"><img src="img/slider/Neon .jpg" alt="" /></a>
                    <div class="add-actions text-center text-center">
                      <div class="project-dec">
                        <a class="venobox" data-gall="myGallery" href="img/slider/Neon .jpg">
                          <h4 style="padding-top: 30%;">Neon Flexible</h4>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-4 col-xs-12 design photo">
                <div class="single-awesome-project">
                  <div class="awesome-img">
                    <a href="#"><img src="img/slider/Toldos.jpg" alt="" /></a>
                    <div class="add-actions text-center">
                      <div class="project-dec">
                        <a class="venobox" data-gall="myGallery" href="img/slider/Toldos.jpg">
                          <h4 style="padding-top: 30%;">Toldos fijos y enrrolables</h4>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-4 col-xs-12 photo development">
                <div class="single-awesome-project">
                  <div class="awesome-img">
                    <a href="#"><img src="img/slider/Impresion.jpg" alt="" /></a>
                    <div class="add-actions text-center">
                      <div class="project-dec">
                        <a class="venobox" data-gall="myGallery" href="img/slider/Impresion.jpg">
                          <h4>Impresión Lona / Vinil</h4>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-4 col-xs-12 photo development">
                <div class="single-awesome-project">
                  <div class="awesome-img">
                    <a href="#"><img src="img/slider/Tarjetas.jpg" alt="" /></a>
                    <div class="add-actions text-center">
                      <div class="project-dec">
                        <a class="venobox" data-gall="myGallery" href="img/slider/Tarjetas.jpg">
                          <h4>Tarjetas / Volantes</h4>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-4 col-xs-12 photo development">
                <div class="single-awesome-project">
                  <div class="awesome-img">
                    <a href="#"><img src="img/slider/Articulos.jpg" alt="" /></a>
                    <div class="add-actions text-center">
                      <div class="project-dec">
                        <a class="venobox" data-gall="myGallery" href="img/slider/Articulos.jpg">
                          <h4>Articulos Promocionales</h4>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col-md-3 col-sm-4 col-xs-12 design photo">
                          <div class="single-awesome-project">
                            <div class="awesome-img">
                              <a href="#"><img src="img/slider/corte vinil1.jpg" alt="" /></a>
                              <div class="add-actions text-center">
                                <div class="project-dec">
                                  <a class="venobox" data-gall="myGallery" href="img/slider/corte vinil1.jpg">
                                    <h4 style="padding-top: 30%;">Toldos fijos y enrrolables</h4>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-12 photo development">
                          <div class="single-awesome-project">
                            <div class="awesome-img">
                              <a href="#"><img src="img/slider/Menu.jpg" alt="" /></a>
                              <div class="add-actions text-center">
                                <div class="project-dec">
                                  <a class="venobox" data-gall="myGallery" href="img/slider/Menu.jpg">
                                    <h4>Impresión Lona / Vinil</h4>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-12 photo development">
                          <div class="single-awesome-project">
                            <div class="awesome-img">
                              <a href="#"><img src="img/slider/Rotulos.jpg" alt="" /></a>
                              <div class="add-actions text-center">
                                <div class="project-dec">
                                  <a class="venobox" data-gall="myGallery" href="img/slider/Rotulos.jpg">
                                    <h4>Tarjetas / Volantes</h4>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-12 photo development">
                          <div class="single-awesome-project">
                            <div class="awesome-img">
                              <a href="#"><img src="img/slider/Señaletica.jpg" alt="" /></a>
                              <div class="add-actions text-center">
                                <div class="project-dec">
                                  <a class="venobox" data-gall="myGallery" href="img/slider/Señaletica.jpg">
                                    <h4>Articulos Promocionales</h4>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
            </div>
          -->
          </div>
        </div>
      </div>
    </div>
    <div id="contact" class="container" style="width: min-content;">
      <div class="contact-inner">
        <div class="contact-overly"></div>
        <div class="container ">
          <div class="row" style="margin-top: 70px;">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="section-headline text-center">
                <h2>Contactanos</h2>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- Start contact icon column -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="contact-icon text-center">
                <div class="single-icon">
                  <a href="tel:444 847 1216"><i class="fa fa-mobile"></i></a>
                  <p style="color: #000;">
                    444 847 1216<br>
                    <span>Lunes a Viernes de 9am a 6pm</span>
                  </p>
                </div>
              </div>
            </div>
            <!-- Start contact icon column -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="contact-icon text-center">
                <div class="single-icon">
                  <a href="mailto:ografix@gmail.com"><i class="fa fa-envelope-o"></i></a>
                  <p style="color: #000;">
                    ografix@gmail.com<br>
                  </p>
                </div>
              </div>
            </div>
            <!-- Start contact icon column -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="contact-icon text-center">
                <div class="single-icon">
                  <a href="https://goo.gl/maps/1TJUk1yFCENVTPxC7" target="_blank"><i class="fa fa-map-marker"></i></a>
                  <p style="color: #000;">
                    Av. Nicolas Zapata 120<br>
                    <span>Col. Centro, CP 78000 S.L.P.</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row" style="margin-bottom: 100px;">

            <!-- Start Google Map -->
            <div class="col-md-6 col-sm-6 col-xs-12">
              <!-- Start Map -->
              <iframe style="border: 2px solid darkgray;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3695.2489444946436!2d-100.98412968511107!3d22.15459398539948!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842a9f5572f8942d%3A0xd1d458a7dfd7ae8f!2sografix!5e0!3m2!1ses-419!2smx!4v1616786806100!5m2!1ses-419!2smx" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
              <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22864.11283411948!2d-73.96468908098944!3d40.630720240038435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbg!4v1540447494452" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>-->
              <!-- End Map -->
            </div>
            <!-- End Google Map -->
            <script>
              function submit_contact()
                  {   
                      var full_name = document.getElementById('name').value;
                      var email = document.getElementById('email').value;
                      var subject = document.getElementById('subject').value;
                      var message = document.getElementById('message').value;
                      var form_data = new FormData();                  
                      form_data.append('name', full_name);//
                      form_data.append('email', email);//
                      form_data.append('subject', subject);//
                      form_data.append('message', message);
                      $.ajax({
                          type: 'POST',
                          url: 'send_msg.php',
                          contentType: false,
                          processData: false,
                          data: form_data,
                          success:function(response) {
                            document.getElementById('name').value="";
                            document.getElementById('email').value="";
                            document.getElementById('subject').value="";
                            document.getElementById('message').value="";
                            document.getElementById('send_button').value="Enviado";
                          },
                          onFailure: function(response){
                              alert("fail");
                          }
                      });
                
                  }
            </script>  
            <!-- Start  contact -->
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form contact-form">
                <div id="sendmessage">Your message has been sent. Thank you!</div>
                <div id="errormessage"></div>
                <form action="" method="post" role="form" class="contactForm" style="text-align: center;">
                  <div class="form-group" style="text-align: left;">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Nombre" data-rule="minlen:4" data-msg="Ingresa un nombre" />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group" style="text-align: left;">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Ingresa un correo valido" />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group" style="text-align: left;">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto" data-rule="minlen:4" data-msg="Ingresa el asunto del mensaje" />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group" style="text-align: left;">
                    <textarea class="form-control" name="message" rows="5" data-rule="required" id="message" data-msg="Ingresa el mensaje" placeholder="Mensaje"></textarea>
                    <div class="validation"></div>
                  </div>
                  <button type="submit" id="send_button" onclick="submit_contact()" value="Enviar">Enviar</button>
                    <!--<button onclick="submit_contact()" id="send_button">Enviar</button>--></div>
                </form>
              </div>
            </div>
            <!-- End Left contact -->
          </div>
        </div>
      </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
          var s = document.getElementById("home");
          var h = document.getElementById("slider");
          //var x = document.getElementById("slider2");
          h.insertAdjacentElement("afterbegin", s); 

          setTimeout(function () {
            let altura = document.getElementById("slider_container").clientHeight;
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