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
  <meta name="google-signin-scope" content="profile email">
  <meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <script>
      var googleUser = {};
      var startApp = function() {
          gapi.load('auth2', function(){
              auth2 = gapi.auth2.init({
              client_id: '524978229044-o5t0u32i8442mg7du6c3p976h33mu9mk.apps.googleusercontent.com',
              cookiepolicy: 'single_host_origin',
          });
          auth2.attachClickHandler('gSignInWrapper', {}, onSuccess, onFailure);

          attachSignin(document.getElementById('customBtn'));
          });
      };
      function attachSignin(element) {
          //alert("si");
          console.log(element.id);
              auth2.attachClickHandler(element, {},
              onSuccess, onFailure);
      }
      function setCookie(key, value) {
          var expires = new Date();
          expires.setTime(expires.getTime() + (6000));
          document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
      }
      var onSuccess = function(user) {
          //alert("si");
          setCookie('name', user.getBasicProfile().getName());
          setCookie('avatar', user.getBasicProfile().getImageUrl());
          setCookie('email', user.getBasicProfile().getEmail());
          setCookie('id', user.getBasicProfile().getId());
          location.reload();
          };
      var onFailure = function(error) {
          console.log(error);
      };
  </script>
  <?php
        if(isset($_COOKIE['id'])):
            $id                 =  $_COOKIE['id'];
            $name               =  $_COOKIE['name'];
            $avatar             =  $_COOKIE['avatar'];
            $email              =  $_COOKIE['email'];
            $user_name          =  $name ;
            $email_u            =  $email;
            $_SESSION['source'] =  "google";
            include 'php/conexion_be.php';
            //$conexion =  mysqli_connect("localhost","u4g4jzvgram6g","^(3@uzE24H3C","db8qd64hszcs9u");
            //$pass_u   = hash('sha512',$pass_u);
            $validar  = mysqli_query($conexion,"SELECT * FROM users WHERE email='$email_u'");
            if(mysqli_num_rows($validar)>0)
            {
                $extraido= mysqli_fetch_array($validar);
                $_SESSION['id']         = $extraido['id'];
                $_SESSION['active']     = $extraido ['active'];
                $_SESSION['name']       = $extraido['usrname'];
                $_SESSION['pass']       = $extraido ['pass'];
                $_SESSION['email']      = $extraido['email'];
                $_SESSION['hash_email'] = $extraido ['hash_email'];
                $_SESSION['code']       = $extraido['code'];
                $_SESSION['phone']      = $extraido ['phone'];
                $_SESSION['avatar']     = $extraido['avatar'];
                echo'
                    <script>
                        window.location = "../index.php?msg=Signed in successfully";
                    </script>
                    ';
                    mysqli_close($conexion);
            }else{
                $_SESSION["error"] = 3;
                echo'
                    <script>
                        window.location = "../login.php";
                    </script>
                    ';
                mysqli_close($conexion);
            }
            echo'
            <script>
                window.location = "../index.php";
            </script>
            ';
            endif;
    ?>
  <style type="text/css">
      .abcRioButton{
        width: 100% !important;
      }
      .cutomB{
      background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
      border: 1px solid #ccc;
      color: #444;
      font-size: 16px;
      font-weight: 700;
      margin-top: 8px;
      padding: 12px 30px;
      text-transform: uppercase;
      transition: all 0.3s ease 0s;
      border-radius: 30px;
    }
    .cutomB:hover{
      color: #fff;
      border: 1px solid #333;
      background: #333;
    }
    .inputstylepass{
      border-radius: 0;
      color: #444;
      height: 40px;
      margin-bottom: 16px;
      padding-left: 20px;
      width: 100%;
    }
  </style>

</head>

<body data-spy="scroll" data-target="#navbar-example" class="estaciones">

  <?php
  include "header.php";
  ?>
  <!-- header end -->
  <div id="contact" class=" fullheight container" style="width: min-content;margin: auto;height: 900px;">
    <div class="contact-inner container ">
      <div class="contact-overly"></div>
      <div class=" area-padding fullheight" style="padding-top:150px;">
        <div class="row flex">
          <!-- Start  contact -->
          <div class="col-md-6 col-sm-6 col-xs-12 mauto form-login">
            <div class="form contact-form">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <?php
                  if(isset($_SESSION['error']))
                  {
                      if($_SESSION['error']==1)
                      {
                          echo "<div class='error_account'>
                          El correo o la contraseña es incorrecto. <a href='reset'>Cambia tu contraseña</a>.
                          </div>";
                      }
                      if($_SESSION['error']==2)
                      {
                          echo "<div class='error_account'>
                          Contacta al administrador.
                          </div>";
                      }
                      if($_SESSION['error']==3)
                      {
                          echo "<div class='error_account'>
                          La cuenta no existe  <a href='signup.php' class='text-success' tabindex='5'>Sign up</a>.
                          </div>";
                      }
                      if($_SESSION['error']==4)
                      {
                          echo "<div class='successful_account'>
                          La contraseña ha sido cambiada exitosamente.
                          </div>";
                      }
                      if($_SESSION['error']==5)
                      {
                          echo "<div class='error_account'>
                          Ha ocurrido un error. Por favor contacte al administrador.
                          </div>";
                      }
                      unset($_SESSION['error']);
                  }
                  if(isset($_GET["msg_error"]))
                  {
                    echo "<div class='error_account'>
                            Tu sesion ha expirado. Por favor, identificate de nuevo para continuar con tu compra
                          </div>";
                  }
              ?>
              <h3 class="center">Hola</h3>
              <span class="center footer-logo">Inicia sesión o <a href="registro" id="">crea una cuenta</a></span>
              <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
              <script>startApp();</script>
              <div class="or-seperator"><i>o</i></div>
              <form action="php/login_usr.php" method="post" class="contactForm">
                <input style="display:none;visibility:hidden;" name="identificate" type="text" class="input-white" value="" aria-invalid="true" autofocus>
                <div class="mt-15" id="shipping_address_fields">
                  <div class="field select ">
                      <div class="field text ">
                        <span class="  colorb" style="display: inline-block;">
                            <label class="fontnormal">Correo</label>
                        </span>
                        <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400;color:red;">*</small>
                      <div aria-live="assertive" class="inputWrapper inputcheckout" role="alert">
                          <input style="border: 1px solid #c8c8c8;" autocomplete="name" autocorrect="off" id="correo" label="Full name" name="correo" type="text" class="input-white" value="" aria-invalid="true" autofocus>
                      </div>
                      </div>
                      <div class="field text ">
                        <span class="  colorb" style="display: inline-block;">
                            <label class="fontnormal">Contraseña</label>
                        </span>
                        <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400;color:red;">*</small>
                    
                        <div aria-live="assertive" class="inputWrapper inputcheckout" role="alert">
                            <input style="border: 1px solid #c8c8c8;" autocomplete="name" required autocorrect="off" id="pass" label="Full name" name="pass" type="password" class="input-white inputstylepass" value="" aria-invalid="true">
                        </div>
                      </div>
                      <span class="center footer-logo"><a href="reset" id="">¿Olvidaste tu contraseña?</a></span>
                  </div>
                </div>
                  <button type="submit" style="width: 100%;">Continuar</button>
              </form>
              
            </div>
          </div>
          <!-- End Left contact -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Contact Area -->

  <!-- Start Footer bottom Area -->
  <?php
  include "footer.php";
  ?>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/venobox/venobox.min.js"></script>
  <script src="lib/knob/jquery.knob.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/parallax/parallax.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/appear/jquery.appear.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>          


  <script src="js/main.js"></script>


  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</body>

</html>
