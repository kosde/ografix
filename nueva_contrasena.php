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
    <style>
        /*
        input {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        }
        input[type=submit] {
        background-color: #04AA6D;
        color: white;
        }*/
        #message {
        display:none;
        /*background: #f1f1f1;*/
        color: #000;
        position: relative;
        padding-bottom: 20px;
       /* margin-top: 10px;*/
        border-radius: 12px;    
        }
        #message p {
        padding: 0px 35px;
        text-align: left;
        /*font-size: 18px;*/
        }
        .valid {
        color: green;
        }
        .valid:before {
        position: relative;
        left: -25px;
        content: "✔";
        }
        .invalid {
        color: red;
        }
        .invalid:before {
        position: relative;
        left: -25px;
        content: "✘";
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
    </style>
</head>
<body data-spy="scroll" data-target="#navbar-example" class="estaciones">
    <?php
    include "header.php";
    ?>
    <div class="portfolio-areafix fullheight">
        <div class="container area-padding fullheight" style="padding-top: 200px;">
            <div class="row flex">
                <div class="col-md-6 col-sm-6 col-xs-12 mauto form-login">
                    <div class="main">
                        <div class="login-form">
                            <?php
                                include 'php/conexion.php';
                                $email = $_GET["email"];
                                $token = $_GET["token"];
                                $datezone=date_default_timezone_get();
                                $date_Now = date('Y-m-d H:i');
                                $dateNow = date_create($date_Now);
                                $validar = mysqli_query($conexion,"SELECT * FROM users WHERE hash_email='$email' AND token='$token'"); 
                                if(mysqli_num_rows($validar)>0)
                                {   
                                    $extraido= mysqli_fetch_array($validar);
                                    $dates      = $extraido['date_token'];
                                    $date       = date_create($dates);
                                    $email      = $extraido['email'];
                                    $hash_email = $extraido['hash_email'];
                                    $interval = (array) date_diff($dateNow,$date);
                                    if($interval['y'] == 0 && $interval['m'] == 0 && $interval['d'] == 0 && $interval['h'] <= 8)
                                    {
                                        $activar = mysqli_query($conexion,"UPDATE users SET active = '1',date_token=NULL,token='' WHERE hash_email = '$hash_email'");
                                        ?>
                                            <form action="php/new_password_update.php?email=<?php echo $_GET["email"];?>" method="post">	
                                                <div class="title_cut" >
                                                    <h1 style="font-size: 1.8rem !important;">Escribe la nueva contraseña</h1>
                                                </div>
                                                <div class="form-group">
                                                    <label class="float-left form-check-label">Contraseña</label>
                                                    <div class="input-group" style="width: 100%;">
                                                        <input type="password" class="form-control" name="password" placeholder="Contraseña" required="required" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                                                            id="psw" title="Debe de contener al menos una letra mayuscula, una letra minuscula y tener una longitud mayor o igual a 8 caracteres."
                                                            style="width: 100%;border: 1px solid #c8c8c8;width: 100%;">
                                                    </div>
                                                </div>      
                                                <div class="float-left form-check-label" id="message">
                                                    <h6 style="font-family: 'proxima-nova';">La contraseña debe de contener:</h6>
                                                    <p id="letter" class="invalid regular font-light" style="margin: 0;">Letras minúsculas</p>
                                                    <p id="capital" class="invalid regular font-light" style="margin: 0;">Letras mayúsculas</p>
                                                    <p id="number" class="invalid regular font-light" style="margin: 0;">Números.</p>
                                                    <p id="length" class="invalid regular font-light" style="margin: 0;">Longitud mayor o igual a 8 caracteres.</p>
                                                </div>     
                                                <div class="form-group">
                                                    <button style="width: 100%;" type="submit" class="cutomB">Aceptar</button>
                                                </div>
                                            </form>
                                        <?php
                                    }
                                    else
                                    {
                                        echo'
                                            <script>
                                                window.location = "../activacion_de_cuenta?expired='.$token.'";
                                            </script>
                                            ';
                                    }
                                }
                                else
                                {
                                    echo'
                                        <script>
                                            window.location = "../activacion_de_cuenta?expired='.$token.'";
                                        </script>
                                        ';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "footer.php";
    ?>
    <script>
        var myInput = document.getElementById("psw");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");
        myInput.onfocus = function() {
        document.getElementById("message").style.display = "block";
        }/*
        myInput.onblur = function() {
        document.getElementById("message").style.display = "none";
        }*/
        myInput.onkeyup = function() {
        var lowerCaseLetters = /[a-z]/g;
        if(myInput.value.match(lowerCaseLetters)) {
            letter.classList.remove("invalid");
            letter.classList.add("valid");
        } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
        }
        var upperCaseLetters = /[A-Z]/g;
        if(myInput.value.match(upperCaseLetters)) {
            capital.classList.remove("invalid");
            capital.classList.add("valid");
        } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
        }
        var numbers = /[0-9]/g;
        if(myInput.value.match(numbers)) {
            number.classList.remove("invalid");
            number.classList.add("valid");
        } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
        }
        if(myInput.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }
        }
    </script>
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>

