<?php
session_start();
if(isset($_SESSION['id']))
{
    $id_user = $_SESSION['id'];
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
    <script src="https://kit.fontawesome.com/a38c16a07e.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="build/css/intlTelInput.css">
    <script>
        function update(num) 
        {             
            var iduser = document.getElementById("id_user").value;
            var form_data = new FormData();
            form_data.append('number', num);
            form_data.append('id_user', iduser);
            var parametros = 'number='+ num+ '&id_user='+ iduser;
            $.ajax({
                type: 'POST',
                url: 'php/notifications_update.php',
                data: parametros,
                success:function(response) {
                },
                onFailure: function(response){
                }
            });
        }
        function Phone_number()
        {
            var modal = document.getElementById("Phone_number");
            modal.style.display = "flex";
        }
        function ClosePhone_number()
        {
            var modal = document.getElementById("Phone_number");
            modal.style.display = "none";
        }
        // Vanilla Javascript
        var input = document.querySelector("#telephone");
        window.intlTelInput(input,({   }));

        $("#telephone").intlTelInput({   });
    </script>
    <style>
        .font-light{
            font-family: "Light";
        }
        label{
            font-weight: normal;
        }
        th{
            text-align:center;
        }
    </style>
</head>
<body data-spy="scroll" data-target="#navbar-example" class="estaciones">
<?php  include "header.php"; 
      include "account/phone_number.php";
?>
   <div id="subnav" class="container" style="width: min-content;margin: auto;">   
        <div class="container" style="--subnav-scroll-left-width:0px; --subnav-scroll-right-width:0px;">
            <div class="subnav-menu">
                <ul class="subnav-menu-tabs">
                    <a class="a-subnav-menu" href="perfil"><li class=" li-subnav ">Perfil</li></a>
                    <a class="a-subnav-menu" href="ordenes"  >  <li class="li-subnav ">Ordenes</li></a>
                    <a class="a-subnav-menu" href="reordenes">       <li class="li-subnav ">Reordenes</li></a>      
                    <a class="a-subnav-menu" href="trabajos" >      <li class="li-subnav">Trabajos</li></a>     
                    <a class="a-subnav-menu" href="notificaciones" style="color: #202020;"> <li class="li-subnav active">Notificaciones</li></a>
                </ul>
            </div>
        </div>
    </div>
    <main  class="container" style="width: min-content;margin: auto;">
        <section style="height: 100vh;">
            <div class="container"  style="height: 100vh;">
            <input style="visibility:hidden;display:none;" type="number" id="id_user" value="<?php echo $id_user;?>">
                <h1 style="font-size: 2.5rem;">Notificaciones</h1>
                
                <?php
                    include 'php/conexion.php';
                    $query = "SELECT * FROM users WHERE id='$id_user'";
                    $result = mysqli_query($conexion,$query);
                    
                    if(mysqli_num_rows($result)>0)
                    {
                        while ($extraido= mysqli_fetch_array($result))
                        {
                            $code             = $extraido['code'];
                            $phone            = $extraido['phone'];
                            if($phone==0)
                            {
                                ?>
                                <div class="conttxtphone">
                                    <span>
                                        <div class="new-notifications-phone font-light">
                                            <label for="message" class="txtphone labelfiel font-light">Agrega tu numero de celular para recibir notificaciones con mensajes de texto.</label>                                        
                                            <button class="button secondary pr-4" type="button" onclick="Phone_number()" style="border-radius: 5px;text-align: right;">Aceptar</button>
                                        </div>
                                    </span>
                                </div>
                                <?php
                            }else
                            {
                            ?>
                            <div style="text-align: right;">
                                <label for="message" class="labelfiel font-light" style="display: inline;">Enviar notificaciones a <strong> +  <?php echo $code." ".$phone;?></strong></label>
                                <button class="button secondary tiny pr-4" type="button" onclick="Phone_number()" style="padding: 5px 10px;background: rgba(240, 101, 0, 0.55) none repeat scroll 0 0;font-size: 12px;">Editar</button> o
                                <a href="../account/delete_phone.php">Quitar</a>
                            </div>
                            <?php
                            }
                        }
                    
                    }
                    ?>
                
                <div id="notification-subscribes-app">
                    <div>
                        <table class="responsive font-light" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>

                                    </th>
                                    <th>Navegador</th>
                                    <th>SMS</th>
                                    <th>Correo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include 'php/conexion_be.php';
                                    $query = "SELECT * FROM notifications WHERE id_user='$id_user'";
                                    $result = mysqli_query($conexion,$query);
                                    
                                    if(mysqli_num_rows($result)>0)
                                    {
                                        $extraido= mysqli_fetch_array($result);
                                        //id 	id_user 	deals_browser 	deals_sms 	deals_email 	alerts_sms 	alerts_email 	proofing_sms 	proofing_email 
                                        $id_n           =  $extraido['id'];
                                        $id_usern       =  $extraido['id_user'];
                                        $deals_browser  =  $extraido['deals_browser'];
                                        $deals_sms      =  $extraido['deals_sms'];
                                        $deals_email    =  $extraido['deals_email'];
                                        $alerts_sms     =  $extraido['alerts_sms'];
                                        $alerts_email   =  $extraido['alerts_email'];
                                        $proofing_sms   =  $extraido['proofing_sms'];
                                        $proofing_email =  $extraido['proofing_email'];
                                    }
                                    ?>
                                <tr>
                                    <td>
                                        <h4>Ofertas</h4>
                                        <label for="message" class="labelfiel font-light" style="width: 90%;">Recibir correos con promociones y ofertas.</label>
                                    </td>
                                    <td style="text-align:center;"><input aria-label="Browser: Receive emails about new promotions." type="checkbox" style="" onclick="update(1)"
                                    <?php if($deals_browser==1)
                                    {
                                        ?>
                                        checked=""
                                        <?php
                                    }
                                    ?>
                                    >
                                </td>
                                <td style="text-align:center;">
                                    <input aria-label="SMS: Receive emails about new promotions." type="checkbox" onclick="update(2)"
                                    <?php if($deals_sms==1)
                                    {
                                        ?>
                                        checked=""
                                        <?php
                                    }
                                    ?>
                                    >
                                </td>
                                <td style="text-align:center;">
                                    <input aria-label="Email: Receive emails about new promotions." type="checkbox" onclick="update(3)"
                                    <?php
                                    if($deals_email==1)
                                    {
                                        ?>
                                        checked=""
                                        <?php
                                    }
                                    ?>
                                    >
                                </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>Alertas</h4>
                                        <label for="message" class="labelfiel font-light" style="width: 90%;">Recibir notificaciones cuando suceda algo en las redes sociales</label>
                                    </td>
                                    <td></td>
                                    <td style="text-align:center;"><input aria-label="SMS: Get notified when we do something fun on social media." type="checkbox" onclick="update(4)"
                                    <?php if($alerts_sms==1)
                                    {
                                        ?>
                                        checked=""
                                        <?php
                                    }
                                    ?>
                                    ></td>
                                    <td style="text-align:center;"><input aria-label="Email: Get notified when we do something fun on social media." type="checkbox" onclick="update(5)"
                                    <?php if($alerts_email==1)
                                    {
                                        ?>
                                        checked=""
                                        <?php
                                    }
                                    ?>
                                    ></td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>Proofing</h4>
                                        <label for="message" class="labelfiel font-light" style="width: 90%;">Recibir notificaciones cuando las pruebas de los trabajos esten listas</label>
                                    </td>
                                    <td></td>
                                    <td style="text-align:center;"><input aria-label="SMS: Receive a notification when your artworks have been proofed." type="checkbox" onclick="update(6)"
                                    <?php if($proofing_sms==1)
                                    {
                                        ?>
                                        checked=""
                                        <?php
                                    }
                                    ?>
                                    ></td>
                                    <td style="text-align:center;"><input disabled="" type="checkbox" checked=""></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <script src="build/js/intlTelInput.js"></script>
        <script>
            var input = document.querySelector("#phone");
            var iti = window.intlTelInput(input, 
            {
                // allowDropdown: false,
                // autoHideDialCode: false,
                // autoPlaceholder: "off",
                // dropdownContainer: document.body,
                // excludeCountries: ["us"],
                // formatOnDisplay: false,
                // geoIpLookup: function(callback) {
                //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                //     var countryCode = (resp && resp.country) ? resp.country : "";
                //     callback(countryCode);
                //   });
                // },
                // hiddenInput: "full_number",
                // initialCountry: "auto",
                // localizedCountries: { 'de': 'Deutschland' },
                // nationalMode: false,
                // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
                // placeholderNumberType: "MOBILE",
                preferredCountries: ['us','mx'],
                // separateDialCode: true,
                utilsScript: "build/js/utils.js",
            });
            //
            // listen to the address dropdown for changes
            input.addEventListener('change', function() {
            //iti.setCountry(this.value);
            var countryData = iti.getSelectedCountryData();
            document.getElementById("code").value=countryData['dialCode'];
            });
        </script>
    </main>
    <?php include "footer.php"; ?>
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="js/bootsnav/bootsnav.js"></script>
    <script src="js/script.js"></script>
	<script src="build/js/intlTelInput.min.js"></script>
	<script src="https://code.jquery.com/jquery-latest.min.js"></script>
	<script src="build/js/intlTelInput-jquery.min.js"></script>
</body>
</html>
<?php
}
else{
    echo'
    <script>
        window.location = "../identificate";
    </script>
    ';
}
?>
