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
    .panel-default{
      background-color: #f58522;
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
      background-color: #ffa556;
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
  include "header.php";
  ?>
  
    <div id="contact" class="contact-area">
      <div class="contact-inner">
        <div class="contact-overly"></div>
        <div class="container ">
          <div class="row" style="margin-top: 150px;">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="section-headline text-center">
                <h2>Cotización</h2>
              </div>
            </div>
          </div>
          <div class="row" style="margin-bottom: 100px;">

            <!-- End Google Map -->
            <script>
              function submit_contact()
                  {   
                      var full_name = document.getElementById('name').value;
                      var email = document.getElementById('email').value;
                      var subject = document.getElementById('subject').value;
                      var message = document.getElementById('message').value;
                      var link = document.getElementById('link').value;
                      var form_data = new FormData();                  
                      form_data.append('name', full_name);//
                      form_data.append('email', email);//
                      form_data.append('subject', subject);//
                      form_data.append('message', message);
                      form_data.append('link', link);
                      $.ajax({
                          type: 'POST',
                          url: 'php/send_cotizacion.php',
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
            <div class="col-md-3 col-sm-1 col-xs-1">
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
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
                  <div class="form-group" style="text-align: left;visibility:hidden;display:none;">
                    <input type="text" value="<?php echo $_SESSION['link'];?>" name="link" id="link" data-msg="Ingresa el asunto del mensaje" />
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
            <div class="col-md-3 col-sm-1 col-xs-1">
            </div>
            <!-- End Left contact -->
          </div>
        </div>
      </div>
    </div>
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