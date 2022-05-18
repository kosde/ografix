<style>
  @media (max-width:790px)
  {
    .navbar-default .navbar-nav > li > a 
    {
      padding: 0px !important;
    }
    .font{
      font-size: 22px !important;
    } 
    .espacio{
      padding-left: 0px !important;
    }
    .alineacion{
      float:  left !important;
    }
    .cero{
      padding: 3% 1%;
    }
    .cero2{
      padding:0px !important;
    }
    button[type="submit"] {
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
  }
  @media (min-width:992px)
  {
    .container
    {
      width: 938px !important;
    }
  }
  @media (max-width:850px)
  {
    .festividades_tam
    {
      height: 100px !important;
    }
    .header_title
    {
      top: 100px  !important;
    }
    .sub_menu_magenta
    {
      top: 100px !important;
    }
    .portfolio-area
    {
      padding-top: 90px;
    }
    
  }
  @media (max-width:450px)
  {
    .festividades_tam
    {
      height: 140px !important;
      width: 100% !important;
    }
    .header_title
    {
      top: 140px  !important;
      width: 95% !important;
    }
    .sub_menu_magenta
    {
      top: 140px !important;
      width: 95% !important;
    }
    .portfolio-area
    {
      padding-top: 90px !important;
    }
    .navbar-nav{
      margin: auto !important;
    }
    .input-white
    {
      width: 70px !important;
    }
    .espacio{
      float: left !important;
      padding: 0px !important;
    }
    .botones_login
    {
      padding: 0px !important;
      float: right !important;
    }
    .alineacion
    {
      text-align: right !important;
      width: 100% !important;
    }
    .container
    {
      width: 95% !important;
    }
    .slider_container
    {
      padding: 0 !important;
    }
    .templates_table
    {
      display: contents !important;
    }
    .precio{
      padding-left: 0px;
      float: right;
      padding-top: 10px;
    }
    .cantidad_carrito
    {
      top: 10px !important;
    }
  }
.festividades_tam{
  height: 70px;
}
.header_title
{
  top: 70px;
}
.sub_menu_magenta
{
  top: 70px;
}
.portfolio-area
{
  padding-top: 60px;
}
.container
{
  width: 750px;
}
 .submenu:hover
 {
    background-color: #b000b0;
    transition: .2s;
  }
  .submenu
  {
    cursor:pointer; cursor: hand
  }
  .cantidad_carrito {
    width: 20px;
    height: 20px;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
    background: #5cb85c;
    text-align: center;
    position: absolute;
    margin-right: 10px;
    z-index: 999;
    left: 10px;
    top: 35px;
  }
  .error_red{
    display: flex;
    width: 214px;
    border: 2px solid red;
    position: absolute;
    text-align: center;
    margin: 4px;
    border-radius: 5px;
    background-color: rgb(254, 225, 225);
    color: rgb(201, 37, 36);
  }
</style>
<header>

  <?php 
  if( $_SESSION["e_login"] == 3)
  {
    unset($_SESSION['e_login']);
    if($index == 1)
    {
    ?>
     <div style="position: absolute;width: 100% !important;background-color: #0076a3b0;border-bottom: 3px solid #004b80;top: 42px !important;" class="festividades_tam container">
        <div class="poll-wrap" style="background-color: transparent;height: 100%;">
          <div class="poll-content" style="height: 100%;">
          <p id="fecha" class="closed-msg" style="padding: 25px;text-align: center;font-size: 14px !important;"> 
            debido a las fechas festivas los servicios pueden verse atrasados por 1 - 2 dias pedimos disculpas por las molestias y agradecemos tu paciencia. 
          </p>
          </div>
        </div>
      </div>
      <script>
          const festivos = [[1, 6],[5, 24],[21],[],[5,10],[],[],[],[16],[],[1,2,15],[25]];
          //const festivos = [[1, 7, 8],[27, 28],[1],[6, 9],[1],[15],[9],[17, 18, 19],[10],[12, 23],[],[25]];
          const diaPedido = new Date(Date.now());
          var months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
          var days = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
          //diaPedido.getMonth()++1;
          var mes = months[diaPedido.getMonth()];
          var dias = festivos[diaPedido.getMonth()];
          if(dias == "")
          {
            dia = diaPedido.getMonth()+1;
            mes = months[dia];
            dias = festivos[dia];
          }
          if(dias == "")
          {
            dia = diaPedido.getMonth()+2;
            mes = months[dia];
            dias = festivos[dia];
          }
          if(dias == "")
          {
            dia = diaPedido.getMonth()+3;
            mes = months[dia];
            dias = festivos[dia];
          }
          var text = document.getElementById("fecha").textContent;
          document.getElementById("fecha").textContent = dias + " " + mes + ": "+text;  
  
  
      </script>
    <?php
    }
  ?>
    <div id="welcome" style="top: 0px !important;width: min-content;display: inline;position: relative;"> 
      <div style="padding: 0px;">
        <div class="row">
          <aside data-testid="Notifications" class="info" style="height: 42px;background: rgb(91, 164, 230) none repeat scroll 0% 0%;color: white;">
            <div>
              <div class="content" style="padding: 10px 0;text-align: center;">Bienvenido has ingresado exitosamente</div>
            </div>
          </aside>
        </div>
      </div>
    </div>
    <?php
  }
  else{
    if($index == 1)
    {
    ?>
     <div style="position: absolute;top: 0px !important;width: 100% !important;background-color: #0076a3b0;border-bottom: 3px solid #004b80;" class="container festividades_tam">
        <div class="poll-wrap" style="background-color: transparent;height: 100%;">
          <div class="poll-content" style="height: 100%;">
          <p id="fecha" class="closed-msg" style="padding: 25px;text-align: center;font-size: 14px !important;"> 
            debido a las fechas festivas los servicios pueden verse atrasados por 1 - 2 dias pedimos disculpas por las molestias y agradecemos tu paciencia. 
          </p>
  
          </div><!--end poll-content-->
        </div><!--end poll-wrap-->
        <!--<div class="poll-bot"></div>-->
      </div>
      <script>
          const festivos = [[1, 6],[5, 24],[21],[],[5,10],[],[],[],[16],[],[1,2,15],[25]];
          //const festivos = [[1, 7, 8],[27, 28],[1],[6, 9],[1],[15],[9],[17, 18, 19],[10],[12, 23],[],[25]];
          const diaPedido = new Date(Date.now());
          var months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
          var days = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
          //diaPedido.getMonth()++1;
          var mes = months[diaPedido.getMonth()];
          var dias = festivos[diaPedido.getMonth()];
          if(dias == "")
          {
            dia = diaPedido.getMonth()+1;
            mes = months[dia];
            dias = festivos[dia];
          }
          if(dias == "")
          {
            dia = diaPedido.getMonth()+2;
            mes = months[dia];
            dias = festivos[dia];
          }
          if(dias == "")
          {
            dia = diaPedido.getMonth()+3;
            mes = months[dia];
            dias = festivos[dia];
          }
          var text = document.getElementById("fecha").textContent;
          document.getElementById("fecha").textContent = dias + " " + mes + ": "+text;  
  
  
      </script>
    <?php
    }
  }
  if($index == 1)
  {
  ?>
    <div id="sticker" class="container header-area header_title" style="background-color: lightgray;position: relative !important;width: min-content;">
  <?php
  }
  else
  {
  ?>
    <div id="sticker" class="container header_title" style="background-color: lightgray;width: min-content;">  
  <?php
  }
  ?>
  <div class="container" style="background-color: lightgray;padding: 0px;">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <nav class="navbar navbar-default">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
            </a>
            <a class="navbar-brand page-scroll sticky-logo" href="index" style="padding: 10px 0 !important;">
              <img src="img/ografix logoweb.png" class="ografix" style="/*height: 100%;*/">
            </a>
          </div>
          <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1 cero" id="navbar-example" style="border-color: lightgray;">
                <?php
                if(!isset($_SESSION["email"]))
                {
                  ?>
                  <ul class="nav navbar-nav navbar-right col-md-10 col-sm-9 col-xs-12" style="background-color: lightgray;padding: 0;">
                      <li style="padding: 3% 0%; padding-left: 70px;display: inline-block;" class="espacio"> 
                        <input style="border: 1px solid #c8c8c8;width: 100px;" id="email_log" name="email" type="email" class="input-white" placeholder="Correo">
                        &nbsp;&nbsp;&nbsp;
                        <input style="border: 1px solid #c8c8c8;width: 100px;" id="pass_log" name="pass" type="password" class="input-white" placeholder="Contraseña">  
                        <span id="message_user_error_pass" class="error_red" style="display: none;">Contraseña erronea</span>
                        <span id="message_user_error_email" class="error_red" style="display: none;">Correo erroneo</span>
                        <span id="message_user_error_admi" class="error_red" style="display: none;">Contacta al administrador</span>
                      </li>

                      <div class="row botones_login" style="display: inline-block;padding: 3% 1% 0% 1%;margin: 0 !important;text-align: center;">
                        <div class="row" style="display: inline-block;">
                          <li style="/*padding: 3% 1%;*/display: inline-block;">
                            <input type="button" id="input_entrar"  class="page-scroll" value="Entrar" onclick="entrar()" style="height: 26px !important;">
                            <!--<a style="color: #000;font-size: 19px;margin-top: 3px;cursor: pointer;padding: 0px !important;" class="page-scroll" onclick="entrar()">Entrar</a>-->
                          </li>
                          <li style="/*padding: 3% 1%;*/display: inline-block;padding-left: 0px;">
                            <input type="button"  class="page-scroll" value="Registro" onclick="registro()" style="height: 26px !important;">
                            <!--<a style="color: #000;font-size: 19px;margin-top: 3px;cursor: pointer;padding: 0px !important;" class="page-scroll" href="registro">Registro</a>-->
                          </li>
                        </div>
                        <div class="row" style="display: contents;  ">
                          <span class="center"><a href="reset" id="">¿Olvidaste tu contraseña?</a></span>
                        </div>
                      </div>
                        
                        

                    <li style="padding: 19px 10px;line-height: normal !important;float: right;display: inline-block;" class="alineacion">
                      <a  style="padding: 0px !important;">
                        <p style="color: #fff;font-size: 19px;margin: 0px;line-height: normal !important;font-family: 'Medium';">Tel:  <strong class="font" style="font-size: 26px;">444 847 1216</strong></p>
                      </a> 
                    </li>
                  <?php
                }
                else
                {
                  ?>
                  <ul class="nav navbar-nav navbar-right col-md-10 col-sm-9 col-xs-12" style="background-color: lightgray;padding: 0;"> 
                    <li style="line-height: normal !important;display: inline-block;float: right;padding: 19px 10px;" class="cero2">
                      <a style="padding: 0px !important;">
                        <p style="color: #fff;font-size: 19px;margin: 0px;line-height: normal !important;font-family: 'Medium';">Tel:  <strong class="font" style="font-size: 26px;">444 847 1216</strong></p>
                      </a> 
                    </li>
                    
                    <li style="display: inline-block;float: right;" class="cero">
                      <a style="color: #000;font-size: 19px;margin-top: 3px;" class="page-scroll" href="carrito">
                      <?php
                        include 'php/conexion.php';
                        $id_user = $_SESSION['id']; 
                        $cart  = mysqli_query($conexion,"SELECT * FROM cart WHERE id_user ='$id_user'");
                        if(mysqli_num_rows($cart)>0 && isset($_SESSION['id']))
                        {
                      ?>
                        <div class="cantidad_carrito">
                          <span style="color: white;" id="cantidad_carrito"><?php echo mysqli_num_rows($cart); ?></span>
                        </div>
                      <?php
                        }
                      ?>
                        <i class="fas fa-shopping-cart"></i>
                      </a>
                    </li>
                    <li class="dropdown active" style="display: inline-block;float: right;" class="cero">
                      <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" href="/account.php">
                          <?php
                              if($_SESSION['avatar']==null)
                              {
                          ?>
                                  <img alt="" data-testid="AccountMenuAvatar" srcset=""  class="avatar small" src="/img/avatar.png" style="margin-right: 5px;">
                          <?php
                              }
                              else{
                                ?>
                                  <img alt="" data-testid="AccountMenuAvatar" srcset=""  class="avatar small" src="data:image/png;base64,<?php echo base64_encode($_SESSION['avatar']);?>" style="margin-right: 5px;">
                                <?php
                              }
                          ?>
                        <!--<img alt="" data-testid="AccountMenuAvatar"  src="/img/avatar.png" srcset="" class="avatar small" style="margin-right: 5px;">-->
                        <span class="caret"></span>
                      </a>
                      <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #000;font-size: 19px;margin-top: 3px;cursor: pointer;font-size: 14px;">Mi cuenta<span class="caret"></span></a>-->
                      <ul class="dropdown-menu" role="menu" style="    background: lightgray;">
                        <li><a style="color: #000;font-size: 19px;margin-top: 3px; cursor:pointer; cursor: hand; margin-right: 50px;font-size: 14px;padding: 10px 0px !important;width: 100%;" href="perfil" >Perfil</a></li>
                        <li><a style="color: #000;font-size: 19px;margin-top: 3px; cursor:pointer; cursor: hand; margin-right: 50px;font-size: 14px;padding: 10px 0px !important;width: 100%;" href="ordenes" >Ordenes</a></li>
                        <li><a style="color: #000;font-size: 19px;margin-top: 3px; cursor:pointer; cursor: hand; margin-right: 50px;font-size: 14px;padding: 10px 0px !important;width: 100%;" href="logout" >Salir</a></li>
                      </ul> 
                    </li>
                    
                   
                  <?php
                }
                ?>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>
</div>
 <?php
  if($index == 1)
  {
  ?>
    <div class="container sub_menu_magenta" style="position: absolute;height: 40px;width: 100%;background-color: lightgray;position: relative !important;width: min-content;margin: auto !important;background-color: darkmagenta;">
      <div class="poll-wrap container" style="background-color: darkmagenta;/*padding: 5px 0px;*/height: 100%;">
        <div class="row" style="height: 100%;">
          <div class="col-md-3 col-sm-5 col-xs-12" style="padding: 0px 0px 0px 10px;">
          </div>
          <div class="col-md-9 col-sm-7 col-xs-12" style="height: 100%;">
            <ul style=" display: inline-block;height: 100%;">
              <a href="plantillas.php">
                <li style="color: white;height: 100%;background-image: linear-gradient( to bottom,rgba(0, 0, 0, 0.21) 50%,rgba(0, 0, 0, 0.4) 100% );padding: 9px 10px;width: 116px;  border-radius: 5px;text-align: center;" class="cero submenu">
                  PLANTILLAS
                </li>
              </a>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <?php
  }
  else
  {
  ?>
  <!--
  <div class="container" style="position: absolute;height: 40px;width: 100%;background-color: lightgray;top: 100px;position: relative !important;width: min-content !important;margin: auto !important;background-color: darkmagenta;">
      <div class="poll-wrap container" style="background-color: darkmagenta;">
      	<div class="poll-content" style="height: 100%;">
          <li style="display: inline-block;float: right;height: 30px;color: white;font-weight: bold;" class="cero submenu">
            Plantillas
          </li>
	      </div>
      </div>
    </div>-->
  <?php
  }
  ?>
</header>
<script>

function login()
{
  var email = document.getElementById("email_log").value;
  var pass = document.getElementById("pass_log").value;

  var form_data = new FormData();
  form_data.append('correo',email);
  form_data.append('pass',pass);
  $.ajax({
      type: 'POST',
      url: 'php/login_usr.php',
      data: form_data,
      contentType: false,
      processData: false,
      success:function(response) {
        //alert(response);
        //var datax = JSON.parse(response)
        var datax = JSON.parse(response);
        //alert("si");
        //alert(datax.e_login);
        if(datax.e_login == 1)
          document.getElementById('message_user_error_email').style.display = "block";
        if(datax.e_login == 2)
          document.getElementById('message_user_error_pass').style.display = "block";
        if(datax.e_login == 4)
          document.getElementById('message_user_error_admi').style.display = "block";
        //location.reload();message_user_error_admi
        //window.location.href = window.location.href;
        //window.location.reload(true);
        if(datax.e_login == 3)
        {
          window.location.href = window.location.href.split( '#' )[0];
          return false;
        }
      },
      onFailure: function(response){
      }
  });
}

function registro()
{
    location.href ="registro";
}

function entrar()
{
  var email = document.getElementById("email_log").value;
  var pass = document.getElementById("pass_log").value;
  if(email=='' && pass=='')
  {
    location.href ="identificate";
  }
  else{
    login();
  }
}
document.querySelector("#pass_log").addEventListener("keyup", event => {
    if(event.key !== "Enter") return; // Use `.key` instead.
    document.querySelector("#input_entrar").click(); // Things you want to do.
    event.preventDefault(); // No need to `return false;`.
});
</script>
