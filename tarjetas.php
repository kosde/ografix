<?php
 session_start();
 if(!isset($_SESSION['tipo']))
 {
    $_SESSION['tipo']=0;
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
  <style>
    label{
      font-weight: lighter;
    }
    .gradiente{
      background-image: radial-gradient(circle,yellow,transparent,transparent);
    }
    p{
      color: black;
      text-align: justify;
    }
    @media(min-width:350px)
    {
      .precio
      {
        position: relative !important;
        padding-right: 15px !important;
        padding-left: 15px !important;
      }
    }
    @media(min-width:768px)
    {
      .precio
      {
        position: relative !important;
        padding-right: 15px !important;
        padding-left: 15px !important;
      }
    }
    @media(min-width:992px)
    {
      .precio
      {
        position: fixed !important;
        padding-right: 15px !important;
        padding-left: 15px !important;
      }
    }
  </style>
</head>

<body data-spy="scroll" data-target="#navbar-example" class="estaciones">
  <?php
    include "header.php";
    if(isset($_SESSION['id']) || isset($_GET['invitado']))
    {
        $id_user = $_SESSION['id'];
  ?>
  
    <div class="container" style="width: min-content;">
      <div class="container" style="padding-bottom: 50px;">
        <?php
        if($_SESSION['email']=="ografix.info@gmail.com")
        {
          ?>
          <form method="post">
              <h6 class="uppercase">Tipo de cliente: </h6>
              <div>
                  <select id="cliente" name="cliente" class="cliente">
                      <option value=""></option>
                      <option value="0">Final</option>
                      <option value="1">Maquila</option>
                  </select>
                  <button type="submit" name="cambiar" value="cambiar" >Cambiar</button>
              </div>
          </form>
          <?php
          if(isset($_POST['cambiar'])){
            $Cliente = $_POST['cliente'];
            $_SESSION['tipo'] = $Cliente; 
            echo'
            <script>
                window.location = "tarjetas";
            </script>
            ';      
          }
          if($_SESSION['tipo']==0)
          {
            echo "<h4 class='uppercase' style='text-align: center;'>Precios como Cliente Final</h4>";
          }
          else
          {
            echo "<h4 class='uppercase' style='text-align: center;'>Precios como Maquila</h4>";
          }
        }
        ?>
          <div class="row" style="padding-top: 100px;">
              <div class="col-md-5 col-sm-7 col-xs-12">
                  <div class="title_cut"> <!--$1200 10000-->
                     
                      <h4 style="margin: 0px;margin-bottom: 5px;">Tarjetas de Presentación</h4>
                      <p style="padding-right: 40px;">9cm x 5cm horizontal o vertical. Opalina sulfatada 12pts 1c / 2c. Otro tamaño posible 4.5cm x 5cm (aplica costo extra y a esta medida se entregan dos mil tarjetas).  
                        Si requieres algún tamaño especial puedes enviarnos correo solicitando tu cotización a info@ografix.com.</p>
                      <br>
                      <p style="padding-right: 40px;">Puedes subir tus propios diseños o en caso de no tenerlo... ¡Lo podemos realizar!</p>
                      <br>
                      <h4 style="margin-bottom: 5px;">Hora de corte</h4>
                      <p style="padding-right: 40px;">La hora de corte para tarjetas de presentación es a las 12:00 pm si tu orden entra después será procesada al dia siguiente.</p>
                      <br>
                      <h4 style="margin: 0px;margin-bottom: 5px;">Acabado brillante</h4>
                      <p style="padding-right: 40px;">Impresión en selección a color y barniz  UV brillante solo frente o frente y vuelta.</p>
                      <br>
                      <h4 style="margin: 0px;margin-bottom: 5px;;">Acabado mate</h4>
                      <p style="padding-right: 40px;">Impresión en selección a color y laminado mate frente y vueta.</p>
                      <br>
                      <h4 style="margin: 0px;margin-bottom: 5px;">Terminados</h4>
                      <ul style="padding-left: 19px;">
                        <li style="list-style: outside;font-size: 12px !important;">Esquinas redondeadas</li>
                        <li style="list-style: outside;font-size: 12px !important;">Corte: las tarjetas de presentación se pueden cortar a 4.5cm x 5cm.</li>
                        <li style="list-style: outside;font-size: 12px !important;">Ponchado para etiqueta</li>
                      </ul>
                      <br>
                      <br>
                      <br>
                      <br>
                  </div>
              </div>
              <div class="col-md-4 col-sm-5 col-xs-12" style="padding-bottom: 10px;">
                  <form action="upload.php" class="product-options" method="get" id="form_id" style="width: 100%;float: right;">
                      <div style="margin: 0px; padding: 0px; display: inline;">
                          <input type="hidden" name="producto" value="Tarjetas">
                          <input type="hidden" id="clientetipo" name="tipo" value="<?php echo $_SESSION['tipo'];?>">
                          <input type="text" style="display:none;" value="0" name="precioproducto" id="precioproducto">
                          <input type="text" style="display:none;" value="0" name="precioesquinas" id="precioesquinas">
                          <input type="text" style="display:none;" value="0" name="preciofinal" id="preciofinal">
                      </div>
                      <div class="product-option-group">
                        <legend style="font-size: 13px;">SELECCIONA LAS ESPECIFICACIONES DEL PRODUCTO</legend>
                      </div>
                      <div class="product-option-group" id="variants">
                          <legend>Tamaño</legend>
                          <ul class="options" id="variant-options">
                              <li>
                                  <input id="variant_78" name="medida" readonly="" class="input-radio" type="radio" value="9x5" onclick="medida_custom(1)">
                                  <label for="variant_78"> 9 x 5 cm</label>
                              </li>
                              <li>
                                  <input id="variant_79" name="medida" readonly="" class="input-radio" type="radio" value="5x9"onclick="medida_custom(2)"> 
                                  <label for="variant_79"> 5 x 9 cm</label>
                              </li>
                              <li>
                                  <input id="variant_77" name="medida" readonly=""  class="input-radio" type="radio" value="0" onclick="medida_custom(3)"> 
                                  <label id="variant_77_L">Personalizado</label>
                              </li>
                              <li id='custom' style="visibility:hidden;display:none;">
                                <span class='custom_dimensions' style="">
                                  <div style="width: 40%;position: relative;display: inline-block;">
                                    <div id='error_width' style="cursor: default;visibility:hidden;display:none;" class='tooltiperror error'>
                                      <span class='arrow'></span>
                                      <span class='text' id="error_width_text"></span>
                                    </div>
                                    <input style="width: 60px;" id='width_custom' name='width' placeholder='Ancho' type='number' value="9" oninput='tam_custom(1)'>cm
                                  </div>
                                  <span> × &nbsp;</span>
                                  <div style="width: 40%;position: relative;display: inline-block;">
                                    <div id='error_height' style="cursor: default;visibility:hidden;display:none;" class='tooltiperror error'>
                                      <span class='arrow'></span>
                                      <span class='text' id="error_height_text"></span>
                                    </div>
                                    <input style="width: 60px;" id='height_custom' name='height' placeholder='Alto' type='number' value="5" oninput='tam_custom(2)'>cm
                                  </div>
                                </span>
                              </li>
                          </ul>
                      </div>
                      <script>
                         /* 
                                document.addEventListener("DOMContentLoaded", function(event) { 
                              
                                  document.getElementById('saving_1').innerText="Save " + scant100.toFixed()+"%";
                                  document.getElementById('saving_2').innerText="Save " + scant200.toFixed()+"%";
                                  document.getElementById('saving_3').innerText="Save " + scant300.toFixed()+"%";
                                  document.getElementById('saving_4').innerText="Save " + scant500.toFixed()+"%";
                                  document.getElementById('saving_5').innerText="Save " + scant1000.toFixed()+"%";
                                  document.getElementById('saving_6').innerText="Save " + scant2000.toFixed()+"%";
                                  document.getElementById('saving_7').innerText="Save " + scant3000.toFixed()+"%";
                                  document.getElementById('saving_8').innerText="Save " + scant5000.toFixed()+"%";
                                  document.getElementById('saving_9').innerText="Save " + scant10000.toFixed()+"%";
                                  document.getElementById('variant_78').dispatchEvent(new MouseEvent("click",{bubbles: true, cancellable: true}));
                                  document.getElementById('quantity_50').dispatchEvent(new MouseEvent("click",{bubbles: true, cancellable: true}));
                              });
                          */
                      </script>
                      <div class="product-option-group" id="quantities">
                          <legend>Cantidad</legend>
                          <ul class="options" id="variant-cantidad">
                              <li class="checked quantity-item">
                                  <span>
                                      <input style="margin-left: 0px;" id="quantity_50" name="quantity" readonly="" class="input-radio" type="radio" value="1000" onclick="Vista(1000,1)">
                                      <label class="quantity" > 1000</label>
                                      <!--<label class=" price" style="padding-left: 30px;" id="price_50_id" name="price" value="54">$54</label>-->
                                  </span>
                              </li>
                              <li class=" quantity-item">
                                  <span>
                                      <input style="margin-left: 0px;" id="quantity_100" name="quantity" readonly="" class="input-radio" type="radio" value="5000" onclick="Vista(5000,1)">
                                      <label class=" quantity"> 5000</label>
                                      <!--<label class="price" style="padding-left: 30px;"  id="price_100_id" name="price" value="76">$76</label>-->
                                  </span>
                              </li>
                              <li class=" quantity-item">
                                  <span>
                                      <input style="margin-left: 0px;" id="quantity_200" name="quantity" readonly="" class="input-radio" type="radio" value="10000" onclick="Vista(10000,1)">
                                      <label class=" quantity"> 10000</label>
                                  </span>
                              </li>
                          </ul>
                      </div>
                      <div class="product-option-group" id="acabado" style="visibility:hidden;display:none;">
                          <legend>Acabado</legend>
                          <ul class="options" id="variant-acabado">
                              <li class="checked quantity-item" id="banizuv">
                                  <span>
                                      <input style="margin-left: 0px;" id="barniz" name="acabado" value="barniz" readonly="" class="input-radio" type="radio" onclick="UV_o_mate(1)">
                                      <label class="quantity" id="labelbarniz">Barniz UV brillante</label>
                                  </span>
                              </li>
                              <li class=" quantity-item" id="laminadomate">
                                  <span>
                                      <input style="margin-left: 0px;" id="mate" name="acabado" value="mate" readonly="" class="input-radio" type="radio" onclick="UV_o_mate(2)">
                                      <label class=" quantity" id="labelmate">Laminado mate</label>
                                  </span>
                              </li>
                          </ul>
                      </div>
                      <div class="product-option-group" id="vistas" style="visibility:hidden;display:none;">
                          <legend>Vistas</legend>
                          <ul class="options" id="variant-vistas">
                              <li class="checked quantity-item" id="frente">
                                  <span>
                                      <input style="margin-left: 0px;" id="solofrente" name="vista" value="frente" readonly="" class="input-radio" type="radio" onclick="Acabado(1)">
                                      <label class="quantity" >Solo frente</label>
                                  </span>
                              </li>
                              <li class=" quantity-item" id="frente_vuelta">
                                  <span>
                                      <input style="margin-left: 0px;" id="frentevuelta" name="vista" value="frentevuelta" readonly="" class="input-radio" type="radio" onclick="Acabado(2)">
                                      <label class=" quantity" >Frente / Vuelta</label>
                                  </span>
                              </li>
                          </ul>
                      </div>
                      <div class="product-option-group" id="corte" style="visibility:hidden;display:none;">
                        <legend style="text-align:center;border-bottom: 0px;padding-top: 30px;">Terminados <br>
                        <label>Opcionales</label></legend>
                        <div style="padding-bottom: 30px;">
                          <legend style="margin-bottom: 0px;">Corte</legend>
                          <p id="corte_txt"  style="visibility:hidden;display:none;">Las tarjetas de presentación se pueden cortar a 4.5cm x 5cm </p>
                        </div>
                        <ul class="options" id="esquinasredondeadas" style="padding-bottom: 20px;">
                              <li class=" quantity-item">
                                  <span>
                                      <input style="margin-left: 0px;" id="respcort" name="corte" readonly="" class="input-radio" type="radio" value="no" checked="" onclick="cortes(0)">
                                      <label class=" quantity" for="quantity_100">No</label>
                                  </span>
                              </li>
                              <li class="checked quantity-item">
                                  <span>
                                      <input style="margin-left: 0px;" id="respcort" name="corte" readonly="" class="input-radio" type="radio" value="si" onclick="cortes(1)">
                                      <label class="quantity" >Si</label>
                                  </span>
                              </li>
                          </ul>
                      </div>
                      <div class="product-option-group" id="esquinas" style="visibility:hidden;display:none; padding-bottom: 50pxmargin: auto;">
                        <div style="padding-bottom: 30px;">
                          <legend style="margin-bottom: 0px;">Esquinas redondeadas</legend>
                        </div>
                        <ul class="options" id="esquinasredondeadas" style="padding-bottom: 20px;">
                            <li class=" quantity-item">
                                <span>
                                    <input style="margin-left: 0px;" id="noredon" name="redond" readonly="" class="input-radio" type="radio" value="no" checked="" onclick="siredond(0)">
                                    <label class=" quantity" for="quantity_100">No</label>
                                </span>
                            </li>
                            <li class="checked quantity-item">
                                <span>
                                    <input style="margin-left: 0px;" id="siredon" name="redond" readonly="" class="input-radio" type="radio" value="si" onclick="siredond(1)">
                                    <label class="quantity" >Si</label>
                                    <label id="instruct_esqui" style="margin-bottom: 20px;visibility:hidden;display:none; ">Haz click en cada esquina que deseas redondear</label>
                                </span>
                            </li>
                           
                        </ul>
                        <div id="tarjeta" style="width: 100%;border: 2px solid black;height: 130px; visibility:hidden;display:none;margin: auto;">
                            <div style="width: 48%; display: inline-block;">
                              <div style="height: 65px;/*border: 1px dashed gray*/;transform: translateX(-45%);bottom: 25px;position: relative;cursor: pointer;" onclick="border(1)" value="0" id="border1"></div>
                              <div style="height: 65px;/*border: 1px dashed gray*/;transform: translateX(-45%);top: 45px;position: relative;cursor: pointer;"onclick="border(4)" value="0" id="border4"></div>
                            </div>
                            <div style="width: 48%;float: right;">
                              <div style="height: 65px;/*border: 1px dashed gray*/;transform: translateX(45%);bottom: 25px;position: relative;cursor: pointer;"onclick="border(2)" value="0" id="border2"></div>
                              <div style="height: 65px;/*border: 1px dashed gray*/;transform: translateX(45%);top: 45px;position: relative;cursor: pointer;"onclick="border(3)" value="0" id="border3"></div>
                            </div>
                            <input type="hidden" id="lado1" value="0" name="lado1">
                            <input type="hidden" id="lado2" value="0" name="lado2">
                            <input type="hidden" id="lado3" value="0" name="lado3">
                            <input type="hidden" id="lado4" value="0" name="lado4">
                        </div>
                      </div>
                      <div class="product-option-group" id="perforado" style=" padding-bottom: 50px;visibility:hidden;display:none;">
                        <div style="padding-bottom: 30px;">
                          <legend style="margin-bottom: 0px;">Ponchado</legend>
                          <p id=""  style="">Da un click en la flecha de la esquina que quieres seleccionar, para deseleccionar da otro click en la flecha que deseas quitar</p>
                        </div>
                        <ul class="options" id="esquinasredondeadas">
                            <li class=" quantity-item">
                                <span>
                                    <input style="margin-left: 0px;" id="noponch" name="perfo" readonly="" class="input-radio" type="radio" value="no" checked="" onclick="siperfo(0)">
                                    <label class=" quantity" for="quantity_100">No</label>
                                </span>
                            </li>
                            <li class="checked quantity-item">
                                <span>
                                    <input style="margin-left: 0px;" id="siredon" name="perfo" readonly="" class="input-radio" type="radio" value="si" onclick="siperfo(1)">
                                    <label class="quantity" >Si</label>
                                </span>
                            </li>
                          
                        </ul>
                        <div  id="tarjeta_perfo" style="visibility:hidden;display:none;margin: auto;">
                          <div style="height: 64px;/*border: 1px dashed gray;*/top: 44px;transform: translateX(330%);position: relative;cursor: pointer;width: 30px;text-align: center;" onclick="perforado(2)" value="0" id="perf2">
                            <i class="fas fa-arrow-down"></i>
                            <i class="far fa-circle" style="font-size: 30px;padding: 10px 0px 0px 0px;visibility:hidden;" id="perf_cir_2"></i>
                          </div>
                          <div style="width: 100%;border: 2px solid black;height: 130px;margin: auto;" id="ponchado">
                              <div style="width: 60px; display: inline-block;" id="perfo_izquierda">
                                <div style="height: 30px;/*border: 1px dashed gray;*/top: 10px;transform: translateX(-25%);position: relative;cursor: pointer;" onclick="perforado(1)" value="0" id="perf1">
                                  <i class="fas fa-arrow-right"></i>
                                  <i class="far fa-circle" style="font-size: 30px;float: right;visibility:hidden;" id="perf_cir_1"></i>
                                </div>
                                <div style="height: 30px;/*border: 1px dashed gray;*/top: 20px;transform: translateX(-25%);position: relative;cursor: pointer;"onclick="perforado(8)" value="0" id="perf8">
                                  <i class="fas fa-arrow-right"></i>
                                  <i class="far fa-circle"  style="font-size: 30px;float: right;visibility:hidden;" id="perf_cir_8"></i>
                                </div>
                                <div style="height: 30px;/*border: 1px dashed gray;*/top: 30px;transform: translateX(-25%);position: relative;cursor: pointer;"onclick="perforado(7)" value="0" id="perf7">
                                  <i class="fas fa-arrow-right"></i>
                                  <i class="far fa-circle"  style="font-size: 30px;float: right;visibility:hidden;" id="perf_cir_7"></i>
                                </div>
                              </div>
                              <div style="width: 60px;float: right;text-align: right;" id="perfo_derecha">
                                <div style="height: 30px;/*border: 1px dashed gray;*/transform: translateX(25%);top: 10px;position: relative;cursor: pointer;"onclick="perforado(3)" value="0" id="perf3">
                                  <i class="far fa-circle"  style="font-size: 30px;float: left;visibility:hidden;" id="perf_cir_3"></i>
                                  <i class="fas fa-arrow-left"></i>
                                </div>
                                <div style="height: 30px;/*border: 1px dashed gray;*/transform: translateX(25%);top: 20px;position: relative;cursor: pointer;"onclick="perforado(4)" value="0" id="perf4">
                                  <i class="far fa-circle"  style="font-size: 30px;float: left;visibility:hidden;" id="perf_cir_4"></i>
                                  <i class="fas fa-arrow-left"></i>
                                </div>
                                <div style="height: 30px;/*border: 1px dashed gray;*/transform: translateX(25%);top: 30px;position: relative;cursor: pointer;"onclick="perforado(5)" value="0" id="perf5">
                                  <i class="far fa-circle"  style="font-size: 30px;float: left;visibility:hidden;" id="perf_cir_5"></i>
                                  <i class="fas fa-arrow-left"></i>
                                </div>
                              </div>
                          </div>
                          <div style="height: 75px;/*border: 1px dashed gray;*/top: -44px;transform: translateX(330%);position: relative;cursor: pointer;width: 30px;text-align: center;" onclick="perforado(6)" value="0" id="perf6">
                            <i class="far fa-circle" style="font-size: 30px;visibility:hidden;" id="perf_cir_6"></i>
                            <i class="fas fa-arrow-up" style="padding: 14px 0px 0px 0px;"></i>
                          </div>
                          <input type="hidden" id="perfo1" value="0" name="perfo1">
                          <input type="hidden" id="perfo2" value="0" name="perfo2">
                          <input type="hidden" id="perfo3" value="0" name="perfo3">
                          <input type="hidden" id="perfo4" value="0" name="perfo4">
                          <input type="hidden" id="perfo5" value="0" name="perfo5">
                          <input type="hidden" id="perfo6" value="0" name="perfo6">
                          <input type="hidden" id="perfo7" value="0" name="perfo7">
                          <input type="hidden" id="perfo8" value="0" name="perfo8">
                        </div>
                        
                      </div>
                      <div class="continue" style="text-align: center;padding-bottom: 20px;visibility:hidden;display:none;" id="continuar">
                          <button class="button large secondary block" id="continue">Continuar</button>
                      </div>
                  </form>
              </div>
              <div class="precio col-md-2 col-sm-5 col-xs-12" style="padding-left: 0px;float: right;visibility:hidden;display:none;position: fixed;" id="precio">
                  <form action="upload.php?price=57" class="product-options" method="get" id="form_id" style="border: 5px solid #00ab4e !important;">
                      <div class="product-option-group" id="quantities" style="padding: 15px 5px 0 !important;">
                          <legend>Precio</legend>
                          <ul class="options" id="variant-cantidad">
                              <li class="checked quantity-item">
                                  <label class="quantity" >Precio</label>
                                  <span id="tam_custom"></span>
                                  <span style="float: right;">
                                    $ <label class="quantity" id="precioqty"></label>
                                  </span>
                              </li>
                              <li class="checked quantity-item" style="visibility:hidden;display:none;" id="precio_corte">
                                <label class="quantity" style="width: 70px;">Corte</label>
                                <span style="width: 80px;display: inline-flex;">
                                  
                                  <span>
                                    $<label class="quantity" id="precio_unit_cort">0</label>
                                  </span>
                                  <span>
                                    x <label class="quantity" id="cant_cort">0</label>
                                  </span>M
                                </span>
                                <span style="float: right;">
                                  $ <label class="quantity" id="precio_cort">0</label>
                                </span>
                                <br>
                                <label class="quantity" style="width: 100%;font-size: smaller;">(corte por millar)</label>
                              </li>
                              <li class="checked quantity-item" style="visibility:hidden;display:none;" id="esquianas">
                                <label class="quantity" style="width: 70px;">Esquinas</label>
                                <span style="width: 80px;display: inline-flex;">
                                  <span>
                                    $<label class="quantity" id="precio_unit_esq">0</label>
                                  </span>
                                  <span>
                                   x <label class="quantity" id="cantesqred">0</label>
                                  </span>
                                </span>
                                  <span style="float: right;">
                                   $ <label class="quantity" id="precioesq">0</label>
                                  </span>
                                
                              </li>
                              <li class="checked quantity-item" style="visibility:hidden;display:none;" id="precio_perforado">
                                <label class="quantity" style="width: 70px;">Ponchado</label>
                                <span style="width: 80px;display: inline-flex;">
                                  <span>
                                    $<label class="quantity" id="precio_unit_ponch">0</label>
                                  </span>
                                  <span>
                                   x <label class="quantity" id="cant_perfo" value="0">0</label>
                                  </span>
                                </span>   
                                  <span style="float: right;">
                                   $ <label class="quantity" id="precio_perfo">0</label>
                                </span>
                                                     
                            </li>
                              <li class="checked quantity-item" style="visibility:hidden;display:none;">
                                <label class="quantity" style="width: 70px;">Subtotal</label>
                                  <input type="text" style="display:none;" value="0" name="subtotal" id="">
                                  <span style="float: right;">
                                    $ <label class="quantity" id="subtotal">0</label>
                                  </span>
                              </li>
                              <li class="checked quantity-item" style="visibility:hidden;display:none;">
                                <label class="quantity" >IVA</label>
                                  <input type="text" style="display:none;" value="54" name="iva" id="">
                                  <span style="float: right;">
                                    $ <label class="quantity" id="iva"></label>
                                  </span>
                              </li>
                              <div class="or-seperator"></div>
                              <li class="checked quantity-item">
                                <label class="quantity" style="width: 70px;"><strong>Total</strong></label>
                                  
                                  <span style="float: right;">
                                    $ <label class="quantity" id="total"></label>
                                  </span>
                              </li>
                          </ul>
                      </div>
                  </form>
              </div>
          </div>
      </div>
    </div>
  <?php
  }
  else{
    echo'
    <script>
        window.location = "../login?pagina='.$_GET["pagina"].'";
    </script>
    ';
  }
  include "footer.php";
  ?>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <script type="text/javascript" src="php/precio_tarjetas.js"></script>
 <script>
  var tipousr = document.getElementById('clientetipo').value;
  var tam = 1;
  function UV_o_mate(num)
  {
    var precioacabado = 0;
    var qty      = 0;
    if(num== 2)
    {
      var precio   = document.getElementById('precioqty').innerText;
      document.getElementById('frente').style.visibility = "hidden";
      document.getElementById('frente').style.display = "none";
      if(document.getElementById("quantity_50").checked)
      {
        qty = 1000;
      }
      if(document.getElementById("quantity_100").checked)
      {
        qty = 5000;
      }
      if(document.getElementById("quantity_200").checked)
      {
        qty = 10000;
      }
      //console.log(qty);
      if(qty == 1000)
      {
        if(tipousr == 0)
        {
          precioacabado = precio_tarjetas_1000_m_44*tam;
        }
        else
        {
          precioacabado = precio_tarjetas_1000_m_44*tam;
        }
      }
      if(qty == 5000)
      {
        if(tipousr == 0)
        {
          precioacabado = precio_tarjetas_5000_m_44*tam;
        }
        else
        {
          precioacabado = precio_tarjetas_5000_m_44*tam;
        }
      }
      if(qty == 10000)
      {
        if(tipousr == 0)
        {
          precioacabado = precio_tarjetas_10000_m_44*tam;
        }
        else
        {
          precioacabado = precio_tarjetas_10000_m_44*tam;
        }
      }
      
      var subtotal = parseInt(precioacabado,10);
      //document.getElementById('total').innerText=subtotal;solofrente
      document.getElementById('precioqty').innerText = subtotal;
      document.getElementById('total').innerText=subtotal;
      document.getElementById("frentevuelta").checked = true;
      document.getElementById("solofrente").disabled = true;
      //document.getElementById('frentevuelta').click();
    }
    else
    {
      if(document.getElementById("quantity_50").checked)
      {
        qty = 1000;
      }
      if(document.getElementById("quantity_100").checked)
      {
        qty = 5000;
      }
      if(document.getElementById("quantity_200").checked)
      {
        qty = 10000;
      }
      //console.log(qty);
      if(qty == 1000)
      {
        if(tipousr == 0)
        {
          precioacabado = precio_tarjetas_1000_40*tam;
        }
        else
        {
          precioacabado = precio_tarjetas_1000_40*tam;
        }
      }
      if(qty == 5000)
      {
        if(tipousr == 0)
        {
          precioacabado = precio_tarjetas_5000_40*tam;
        }
        else
        {
          precioacabado = precio_tarjetas_5000_40*tam;
        }
      }
      if(qty == 10000)
      {
        if(tipousr == 0)
        {
          precioacabado = precio_tarjetas_10000_40*tam;
        }
        else
        {
          precioacabado = precio_tarjetas_10000_40*tam;
        }
      }
      var subtotal = parseInt(precioacabado,10);
      //document.getElementById('total').innerText=subtotal;solofrente
      document.getElementById('frente').style.visibility = "visible";
      document.getElementById('frente').style.display = "block";
      document.getElementById('precioqty').innerText = subtotal;
      document.getElementById('total').innerText=subtotal;
      document.getElementById("solofrente").checked = true;
      document.getElementById("solofrente").disabled = false;
      //Vista(0,1);
      //document.getElementById('solofrente').click();
    }
    Suma(1);
  }
  function tam_custom(num)
  {
    var width = document.getElementById('width_custom').value;
    var height = document.getElementById('height_custom').value;
    var qty = 0;
    document.getElementById('variant_77').value = width+"x"+height;
    if(num == 1)
    {
      document.getElementById('error_width').style.visibility = "hidden";
      document.getElementById('error_width').style.display = "none";
      document.getElementById('error_width_text').innerText = "";
      if(width>=9)
      {
        if(height<=5)
        {
          tam = 1;
          if(width>9)
          {
            tam = 2;
          }
        }
        if(height>5)
        {
          tam = 2;
          if(width>9)
          {
            tam = 4;
          }
        }
        if(width>18)
        {
          document.getElementById('error_width').style.visibility = "visible";
          document.getElementById('error_width').style.display = "inherit";
          document.getElementById('error_width_text').innerText = "No puede ser mayor a 18";
        }
      }
    }
    if(num == 2)
    {
      document.getElementById('error_height').style.visibility = "hidden";
      document.getElementById('error_height').style.display = "none";
      document.getElementById('error_height_text').innerText = "";
      if(height>=5)
      {
        if(width<=9)
        {
          tam = 1;
          if(height>5)
          {
            tam = 2;
          }
        }
        if(width>9)
        {
          tam = 2;
          if(height>5)
          {
            tam = 4;
          }
        }
        if(height>10)
        {
          document.getElementById('error_height').style.visibility = "visible";
          document.getElementById('error_height').style.display = "inherit";
          document.getElementById('error_height_text').innerText = "No puede ser mayor a 10";
        }
      }
    }
    var remember = document.getElementById('quantity_50');
    if (remember.checked)
      qty = 1000;
    var remember = document.getElementById('quantity_100');
    if (remember.checked)
      qty = 5000;
    var remember = document.getElementById('quantity_200');
    if (remember.checked)
      qty = 10000;
    Vista(qty,2)
  }
  function medida_custom(num)
  {
    var qty = 0;
    var remember = document.getElementById('quantity_50');
    if (remember.checked)
      qty = 1000;
    var remember = document.getElementById('quantity_100');
    if (remember.checked)
      qty = 5000;
    var remember = document.getElementById('quantity_200');
    if (remember.checked)
      qty = 10000;
    if(num == 1 || num == 2)
    {
      if(num == 1)
      {
        document.getElementById("tarjeta").style.width = "100%"; 
        document.getElementById("ponchado").style.width = "100%"; 
        document.getElementById("perfo_derecha").style.cssFloat  = "right"; 
        document.getElementById('ponchado').style.display = "block";
      }
      else{
        document.getElementById("tarjeta").style.width = "40%"; 
        document.getElementById("ponchado").style.width = "40%"; 
        document.getElementById("perfo_derecha").style.cssFloat  = "unset"; 
        document.getElementById('ponchado').style.display = "flex";
      }
      document.getElementById('quantity_50').click();
      document.getElementById('custom').style.visibility = "hidden";
      document.getElementById('custom').style.display = "none";
      if(qty != 0)
        Vista(qty,2);
    }
    else{
      document.getElementById('quantity_50').click();
      document.getElementById('custom').style.visibility = "visible";
      document.getElementById('custom').style.display = "block";
    }
  }
  function Vista(cantidad, opcion)
  {
    if(opcion==1)
    {
      document.getElementById('precio').style.visibility = "hidden";
      document.getElementById('precio').style.display = "none";
      document.getElementById('precio').style.visibility = "visible";
      document.getElementById('precio').style.display = "inline";
      document.getElementById('vistas').style.visibility = "visible";
      document.getElementById('vistas').style.display = "block";
      document.getElementById('esquinas').style.visibility = "visible";
      document.getElementById('esquinas').style.display = "block";
      document.getElementById('perforado').style.visibility = "visible";
      document.getElementById('perforado').style.display = "block";
      document.getElementById('corte').style.visibility = "visible";
      document.getElementById('corte').style.display = "block";
    }
    if(cantidad == 1000)
    {
      
      document.getElementById('respcort').click();
      document.getElementById('noredon').click();
      document.getElementById('noponch').click();
      document.getElementById('frente').style.visibility = "visible";
      document.getElementById('frente').style.display = "block";
      document.getElementById('solofrente').click();
      document.getElementById('frente_vuelta').style.visibility = "visible";
      document.getElementById('frente_vuelta').style.display = "block";
      document.getElementById('banizuv').style.visibility = "visible";
      document.getElementById('banizuv').style.display = "block";
      document.getElementById('barniz').click();
      document.getElementById('laminadomate').style.visibility = "visible";
      document.getElementById('laminadomate').style.display = "block";
      document.getElementById("cant_perfo").setAttribute('value','1');
      document.getElementById('precioqty').innerText = precio_tarjetas_1000_40 * tam;
    }
    
    if(cantidad == 5000)
    {
      document.getElementById('respcort').click();
      document.getElementById('noredon').click();
      document.getElementById('noponch').click();
      document.getElementById('frente').style.visibility = "visible";
      document.getElementById('frente').style.display = "block";
      document.getElementById("cant_perfo").setAttribute('value','1');
      document.getElementById('solofrente').click();
      document.getElementById('barniz').click();
      document.getElementById('precioqty').innerText = precio_tarjetas_5000_40 * tam;
    }
    if(cantidad == 10000)
    {
      document.getElementById('respcort').click();
      document.getElementById('noredon').click();
      document.getElementById('noponch').click();
      document.getElementById('frente').style.visibility = "visible";
      document.getElementById('frente').style.display = "block";
      document.getElementById("cant_perfo").setAttribute('value','1');
      document.getElementById('solofrente').click();
      document.getElementById('barniz').click();
      document.getElementById('precioqty').innerText = precio_tarjetas_10000_40 * tam;
    }
    Suma(1);
    document.getElementById('continuar').style.visibility = "visible";
    document.getElementById('continuar').style.display = "block";
    
  }
  function Suma(id)
  {
    var precio   = document.getElementById('precioqty').innerText;
    document.getElementById('precioproducto').value = precio;
    var cantesquinasred = document.getElementById('cantesqred').innerText;
    var cantesquinasperfo = document.getElementById('cant_perfo').innerText;
    var pormillar = document.getElementById("cant_perfo").getAttribute('value');
    var precioesquinas = 0;
    var precioperfo = 0;

    /**********               precio esquinas           ************/
    if(cantesquinasred == 4)
    {
        precioesquinas = precio_tarjetas_4_redond;
        document.getElementById('precio_unit_esq').innerText = parseInt(precioesquinas,10)/4;
    }
    if(cantesquinasred > 0 && cantesquinasred < 4)
    {
      if(tipousr == 0)
      {
        document.getElementById('precio_unit_esq').innerText = precio_tarjetas_redond;
        precioesquinas = parseInt(cantesquinasred,10) * precio_tarjetas_redond;
      }
      else
      {
        document.getElementById('precio_unit_esq').innerText = precio_tarjetas_redond;
        precioesquinas = parseInt(cantesquinasred,10) * precio_tarjetas_redond;
      }     
    }
    document.getElementById('precioesq').innerText = precioesquinas;
    document.getElementById('precioesquinas').value = precioesquinas;
    if(cantesquinasperfo>0)
    {
      precioperfo = precio_tarjetas__ponch;
      document.getElementById('precio_unit_ponch').innerText = parseInt(precioperfo,10);
      if(tipousr == 0)
        precioperfo = parseInt(cantesquinasperfo,10) * precio_tarjetas__ponch * parseInt(pormillar,10);
      else
        precioperfo = parseInt(cantesquinasperfo,10) * precio_tarjetas__ponch * parseInt(pormillar,10);
      
        
      document.getElementById('precio_perfo').innerText = precioperfo;
    }
    //document.getElementById('precioesquinas').value = precioesquinas; cant_perfo



    var preciocorte = document.getElementById('precio_cort').innerText;
    var subtotal = parseInt(precio,10) + parseInt(precioesquinas,10) + parseInt(precioperfo,10) + parseInt(preciocorte,10);
    if(id == 1)
    {
      document.getElementById('subtotal').innerText=subtotal;
    }
    document.getElementById('preciofinal').value = subtotal;
    //var iva = (subtotal/100)*16;cantesqred precioesq               var border1 = document.getElementById("perf1").getAttribute('value');
    //document.getElementById('iva').innerText = iva;precioproducto
    document.getElementById('total').innerText=subtotal;
  }
  function Acabado(vista)
  {
    if(vista == 2)
    {
        var precio   = document.getElementById('subtotal').innerText;
        if(tipousr==0)
        {
          if(precio == 2500)
          {
            document.getElementById('precioqty').innerText = (parseInt(precio,10)*2)-5;
          }
          else
          {
            document.getElementById('precioqty').innerText = parseInt(precio,10)*2;
          }
        }  
        else
        {
          document.getElementById('precioqty').innerText = parseInt(precio,10)*2;
        }        
        
    }
    else
    {
      document.getElementById('frente').style.visibility = "visible";
      document.getElementById('frente').style.display = "block";
      var precio   = document.getElementById('subtotal').innerText;
      document.getElementById('precioqty').innerText = precio;
    }
    //alert("si");
    Suma(2);
    document.getElementById('acabado').style.visibility = "visible";
    document.getElementById('acabado').style.display = "block";
  }
  function reset_esquinas()
  {
    document.getElementById('cantesqred').innerText = 0;
    document.getElementById('precioesq').innerText = 0;
    document.getElementById("border1").setAttribute('value','0');
    document.getElementById("border2").setAttribute('value','0');
    document.getElementById("border3").setAttribute('value','0');
    document.getElementById("border4").setAttribute('value','0');
    document.getElementById('lado1').value = "0";
    document.getElementById('lado2').value = "0";
    document.getElementById('lado3').value = "0";
    document.getElementById('lado4').value = "0";
    document.getElementById("border1").classList.remove("gradiente");
    document.getElementById("border2").classList.remove("gradiente");
    document.getElementById("border3").classList.remove("gradiente");
    document.getElementById("border4").classList.remove("gradiente");
    document.getElementById("tarjeta").style.borderTopLeftRadius = "0px";
    document.getElementById("tarjeta").style.borderTopRightRadius  = "0px"; 
    document.getElementById("tarjeta").style.borderBottomRightRadius  = "0px";
    document.getElementById("tarjeta").style.borderBottomLeftRadius  = "0px"; 
  }
  function reset_perfo()
  {
    document.getElementById('cant_perfo').innerText = 0;
    document.getElementById('precio_perfo').innerText = 0;
    document.getElementById("perf1").setAttribute('value','0');
    document.getElementById("perf2").setAttribute('value','0');
    document.getElementById("perf3").setAttribute('value','0');
    document.getElementById("perf4").setAttribute('value','0');
    document.getElementById("perf5").setAttribute('value','0');
    document.getElementById("perf6").setAttribute('value','0');
    document.getElementById("perf7").setAttribute('value','0');
    document.getElementById("perf8").setAttribute('value','0');
    document.getElementById('perf_cir_1').style.visibility = "hidden";
    document.getElementById('perf_cir_2').style.visibility = "hidden";
    document.getElementById('perf_cir_3').style.visibility = "hidden";
    document.getElementById('perf_cir_4').style.visibility = "hidden";
    document.getElementById('perf_cir_5').style.visibility = "hidden";
    document.getElementById('perf_cir_6').style.visibility = "hidden";
    document.getElementById('perf_cir_7').style.visibility = "hidden";
    document.getElementById('perf_cir_8').style.visibility = "hidden";
    document.getElementById('perfo1').value = "0";
    document.getElementById('perfo2').value = "0";
    document.getElementById('perfo3').value = "0";
    document.getElementById('perfo4').value = "0";
    document.getElementById('perfo5').value = "0";
    document.getElementById('perfo6').value = "0";
    document.getElementById('perfo7').value = "0";
    document.getElementById('perfo8').value = "0";
    document.getElementById('perf1').style.visibility = "visible";
    document.getElementById('perf2').style.visibility = "visible";
    document.getElementById('perf3').style.visibility = "visible";
    document.getElementById('perf4').style.visibility = "visible";
    document.getElementById('perf5').style.visibility = "visible";
    document.getElementById('perf6').style.visibility = "visible";
    document.getElementById('perf7').style.visibility = "visible";
    document.getElementById('perf8').style.visibility = "visible";
  }
  function siredond(num)
  {
    if(num==0)
    {
      reset_esquinas();
      Suma(2);
      document.getElementById("esquinasredondeadas").style.paddingBottom = "0px";
      document.getElementById('tarjeta').style.visibility = "hidden";
      document.getElementById('tarjeta').style.display = "none";
      document.getElementById('esquianas').style.visibility = "hidden";
      document.getElementById('esquianas').style.display = "none";
      document.getElementById('instruct_esqui').style.visibility = "hidden";
      document.getElementById('instruct_esqui').style.display = "none"; //precioesq
      
    }
    else{
      document.getElementById("esquinasredondeadas").style.paddingBottom = "20px"; 
      document.getElementById('tarjeta').style.visibility = "visible";
      document.getElementById('tarjeta').style.display = "block";
      document.getElementById('esquianas').style.visibility = "visible";
      document.getElementById('esquianas').style.display = "block"; //instruct_esqui
      document.getElementById('instruct_esqui').style.visibility = "visible";
      document.getElementById('instruct_esqui').style.display = "block"; //
    }
  }
  function siperfo(num)
  {
    if(num==0)
    {
      reset_perfo();
      Suma(2);
      document.getElementById('tarjeta_perfo').style.visibility = "hidden";
      document.getElementById('tarjeta_perfo').style.display = "none";
      document.getElementById('precio_perforado').style.visibility = "hidden";
      document.getElementById('precio_perforado').style.display = "none";
    }
    else{
      document.getElementById('tarjeta_perfo').style.visibility = "visible";
      document.getElementById('tarjeta_perfo').style.display = "block";
      document.getElementById('precio_perforado').style.visibility = "visible";
      document.getElementById('precio_perforado').style.display = "block";
    }
  }
  function cortes(num)//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  {
    if(num==0)
    {
      document.getElementById('precio_corte').style.visibility = "hidden";
      document.getElementById('precio_corte').style.display = "none";
      document.getElementById('corte_txt').style.visibility = "hidden";
      document.getElementById('corte_txt').style.display = "none";
      document.getElementById('precio_cort').innerText = 0; //corte_txt //cant_cort
    }
    else{
      document.getElementById('corte_txt').style.visibility = "visible";
      document.getElementById('corte_txt').style.display = "block";
      document.getElementById('precio_corte').style.visibility = "visible";
      document.getElementById('precio_corte').style.display = "block";
      var qty = 0;
      if(document.getElementById("quantity_50").checked)
      {
        qty = 1;
      }
      if(document.getElementById("quantity_100").checked)
      {
        qty = 5;
      }
      if(document.getElementById("quantity_200").checked)
      {
        qty = 10;
      }
      document.getElementById('precio_unit_cort').innerText = precio_tarjetas_corte; //corte_txt //cant_cort //precio_cort
      document.getElementById('cant_cort').innerText = qty; //corte_txt //cant_cort //precio_cort
      document.getElementById('precio_cort').innerText = precio_tarjetas_corte * qty;
    }
    Suma(2);
  }
  function border(num)
  {
    if(num == 1)
    {
      var border1 = document.getElementById("border1").getAttribute('value'); //cantesqred
      if(border1 == 0)
      {
        document.getElementById("border1").setAttribute('value','1');
        document.getElementById("tarjeta").style.borderTopLeftRadius = "15px"; 
        var precio   = document.getElementById('cantesqred').innerText;
        document.getElementById('cantesqred').innerText = parseInt(precio,10)+1;
        document.getElementById("border1").classList.add("gradiente"); ///"radial-gradient(circle,yellow,transparent,transparent);";lado1
        document.getElementById('lado1').value = 1;
      }
      else
      {
        document.getElementById("border1").setAttribute('value','0');
        document.getElementById("tarjeta").style.borderTopLeftRadius = "0px"; 
        var precio   = document.getElementById('cantesqred').innerText;
        document.getElementById('cantesqred').innerText = parseInt(precio,10)-1;
        document.getElementById("border1").classList.remove("gradiente");
        document.getElementById('lado1').value = 0;
      }
    }
    if(num == 2)
    {
      var border1 = document.getElementById("border2").getAttribute('value');
      if(border1 == 0)
      {
        document.getElementById("border2").setAttribute('value','1');
        document.getElementById("tarjeta").style.borderTopRightRadius  = "15px "; 
        //document.getElementById("tarjeta").style.borderTopColor = "red"; 
        var precio   = document.getElementById('cantesqred').innerText;
        document.getElementById('cantesqred').innerText = parseInt(precio,10)+1;
        document.getElementById("border2").classList.add("gradiente");
        document.getElementById('lado2').value = 1;
      }
      else
      {
        document.getElementById("border2").setAttribute('value','0');
        document.getElementById("tarjeta").style.borderTopRightRadius  = "0px"; 
        var precio   = document.getElementById('cantesqred').innerText;
        document.getElementById('cantesqred').innerText = parseInt(precio,10)-1;
        document.getElementById("border2").classList.remove("gradiente");
        document.getElementById('lado2').value = 0;
      }
    }
    if(num == 3)
    {
      var border1 = document.getElementById("border3").getAttribute('value');
      if(border1 == 0)
      {
        document.getElementById("border3").setAttribute('value','1');
        document.getElementById("tarjeta").style.borderBottomRightRadius  = "15px"; 
        var precio   = document.getElementById('cantesqred').innerText;
        document.getElementById('cantesqred').innerText = parseInt(precio,10)+1;
        document.getElementById("border3").classList.add("gradiente");
        document.getElementById('lado3').value = 1;
      }
      else
      {
        document.getElementById("border3").setAttribute('value','0');
        document.getElementById("tarjeta").style.borderBottomRightRadius  = "0px"; 
        var precio   = document.getElementById('cantesqred').innerText;
        document.getElementById('cantesqred').innerText = parseInt(precio,10)-1;
        document.getElementById("border3").classList.remove("gradiente");
        document.getElementById('lado3').value = 0;
      }
    }
    if(num == 4)
    {
      var border1 = document.getElementById("border4").getAttribute('value');
      if(border1 == 0)
      {
        document.getElementById("border4").setAttribute('value','1');
        document.getElementById("tarjeta").style.borderBottomLeftRadius  = "15px"; 
        var precio   = document.getElementById('cantesqred').innerText;
        document.getElementById('cantesqred').innerText = parseInt(precio,10)+1;
        document.getElementById("border4").classList.add("gradiente");
        document.getElementById('lado4').value = 1;
      }
      else
      {
        document.getElementById("border4").setAttribute('value','0');
        document.getElementById("tarjeta").style.borderBottomLeftRadius  = "0px"; 
        var precio   = document.getElementById('cantesqred').innerText;
        document.getElementById('cantesqred').innerText = parseInt(precio,10)-1;
        document.getElementById("border4").classList.remove("gradiente");
        document.getElementById('lado4').value = 0;
      }
    }
    Suma(2);
  }
  function perforado(num)
  {
      if(num == 1)
      {
        var border1 = document.getElementById("perf1").getAttribute('value'); //cantesqred
        if(border1 == 0)
        {
          document.getElementById("perf1").setAttribute('value','1');
          document.getElementById('perfo1').value = "1";
          document.getElementById('perf2').style.visibility = "hidden";
          document.getElementById('perf3').style.visibility = "hidden";
          document.getElementById('perf4').style.visibility = "hidden";
          document.getElementById('perf6').style.visibility = "hidden";
          document.getElementById('perf7').style.visibility = "hidden";
          document.getElementById('perf8').style.visibility = "hidden";//perf_cir_1    
          document.getElementById('perf_cir_1').style.visibility = "visible";//perf_cir_1  //precio_perforado
          document.getElementById('cant_perfo').innerText = parseInt(document.getElementById('cant_perfo').innerText,10)+1;
        }
        else
        {
          document.getElementById("perf1").setAttribute('value','0');
          document.getElementById('perfo1').value = "0";
          if(document.getElementById("perf5").getAttribute('value') == 0)
          {
            document.getElementById('perf2').style.visibility = "visible";
            document.getElementById('perf3').style.visibility = "visible";
            document.getElementById('perf4').style.visibility = "visible";
            document.getElementById('perf6').style.visibility = "visible";
            document.getElementById('perf7').style.visibility = "visible";
            document.getElementById('perf8').style.visibility = "visible";
          }
          document.getElementById('perf_cir_1').style.visibility = "hidden";
          document.getElementById('cant_perfo').innerText = parseInt(document.getElementById('cant_perfo').innerText,10)-1;
        }
      }
      if(num == 2)
      {
        var border1 = document.getElementById("perf2").getAttribute('value'); //cantesqred
        if(border1 == 0)
        {
          document.getElementById("perf2").setAttribute('value','1');
          document.getElementById('perfo2').value = "1";
          document.getElementById('perf1').style.visibility = "hidden";
          document.getElementById('perf3').style.visibility = "hidden";
          document.getElementById('perf4').style.visibility = "hidden";
          document.getElementById('perf5').style.visibility = "hidden";
          document.getElementById('perf7').style.visibility = "hidden";
          document.getElementById('perf8').style.visibility = "hidden";//perf_cir_1    
          document.getElementById('perf_cir_2').style.visibility = "visible";//perf_cir_1
          document.getElementById('cant_perfo').innerText = parseInt(document.getElementById('cant_perfo').innerText,10)+1;
        }
        else
        {
          document.getElementById("perf2").setAttribute('value','0');
          document.getElementById('perfo2').value = "0";
          if(document.getElementById("perf6").getAttribute('value') == 0)
          {
            document.getElementById('perf1').style.visibility = "visible";
            document.getElementById('perf3').style.visibility = "visible";
            document.getElementById('perf4').style.visibility = "visible";
            document.getElementById('perf5').style.visibility = "visible";
            document.getElementById('perf7').style.visibility = "visible";
            document.getElementById('perf8').style.visibility = "visible";//perf_cir_1
          }
          document.getElementById('perf_cir_2').style.visibility = "hidden";
          document.getElementById('cant_perfo').innerText = parseInt(document.getElementById('cant_perfo').innerText,10)-1;
        }
      }
      if(num == 3)
      {
        var border1 = document.getElementById("perf3").getAttribute('value'); //cantesqred
        if(border1 == 0)
        {
          document.getElementById("perf3").setAttribute('value','1');
          document.getElementById('perfo3').value = "1";
          document.getElementById('perf1').style.visibility = "hidden";
          document.getElementById('perf2').style.visibility = "hidden";
          document.getElementById('perf4').style.visibility = "hidden";
          document.getElementById('perf6').style.visibility = "hidden";
          document.getElementById('perf5').style.visibility = "hidden";
          document.getElementById('perf8').style.visibility = "hidden";//perf_cir_1    
          document.getElementById('perf_cir_3').style.visibility = "visible";//perf_cir_1
          document.getElementById('cant_perfo').innerText = parseInt(document.getElementById('cant_perfo').innerText,10)+1;
        }
        else
        {
          document.getElementById("perf3").setAttribute('value','0');
          document.getElementById('perfo3').value = "0";
          if(document.getElementById("perf7").getAttribute('value') == 0)
          {
            document.getElementById('perf1').style.visibility = "visible";
            document.getElementById('perf2').style.visibility = "visible";
            document.getElementById('perf4').style.visibility = "visible";
            document.getElementById('perf6').style.visibility = "visible";
            document.getElementById('perf5').style.visibility = "visible";
            document.getElementById('perf8').style.visibility = "visible";//perf_cir_1
          }
          document.getElementById('perf_cir_3').style.visibility = "hidden";
          document.getElementById('cant_perfo').innerText = parseInt(document.getElementById('cant_perfo').innerText,10)-1;
        }
      }
      if(num == 4)
      {
        var border1 = document.getElementById("perf4").getAttribute('value'); //cantesqred
        if(border1 == 0)
        {
          document.getElementById("perf4").setAttribute('value','1');
          document.getElementById('perfo4').value = "1";
          document.getElementById('perf1').style.visibility = "hidden";
          document.getElementById('perf3').style.visibility = "hidden";
          document.getElementById('perf2').style.visibility = "hidden";
          document.getElementById('perf6').style.visibility = "hidden";
          document.getElementById('perf7').style.visibility = "hidden";
          document.getElementById('perf5').style.visibility = "hidden";//perf_cir_1    
          document.getElementById('perf_cir_4').style.visibility = "visible";//perf_cir_1
          document.getElementById('cant_perfo').innerText = parseInt(document.getElementById('cant_perfo').innerText,10)+1;
        }
        else
        {
          document.getElementById("perf4").setAttribute('value','0');
          document.getElementById('perfo4').value = "0";
          if(document.getElementById("perf8").getAttribute('value') == 0)
          {
            document.getElementById('perf1').style.visibility = "visible";
            document.getElementById('perf3').style.visibility = "visible";
            document.getElementById('perf2').style.visibility = "visible";
            document.getElementById('perf6').style.visibility = "visible";
            document.getElementById('perf7').style.visibility = "visible";
            document.getElementById('perf5').style.visibility = "visible";//perf_cir_1
          }
          document.getElementById('perf_cir_4').style.visibility = "hidden";
          document.getElementById('cant_perfo').innerText = parseInt(document.getElementById('cant_perfo').innerText,10)-1;
        }
      }
      if(num == 5)
      {
        var border1 = document.getElementById("perf5").getAttribute('value'); //cantesqred
        if(border1 == 0)
        {
          document.getElementById("perf5").setAttribute('value','1');
          document.getElementById('perfo5').value = "1";
          document.getElementById('perf2').style.visibility = "hidden";
          document.getElementById('perf3').style.visibility = "hidden";
          document.getElementById('perf4').style.visibility = "hidden";
          document.getElementById('perf6').style.visibility = "hidden";
          document.getElementById('perf7').style.visibility = "hidden";
          document.getElementById('perf8').style.visibility = "hidden";//perf_cir_1    
          document.getElementById('perf_cir_5').style.visibility = "visible";//perf_cir_1
          document.getElementById('cant_perfo').innerText = parseInt(document.getElementById('cant_perfo').innerText,10)+1;
        }
        else
        {
          document.getElementById("perf5").setAttribute('value','0');
          document.getElementById('perfo5').value = "0";
          if(document.getElementById("perf1").getAttribute('value') == 0)
          {
            document.getElementById('perf2').style.visibility = "visible";
            document.getElementById('perf3').style.visibility = "visible";
            document.getElementById('perf4').style.visibility = "visible";
            document.getElementById('perf6').style.visibility = "visible";
            document.getElementById('perf7').style.visibility = "visible";
            document.getElementById('perf8').style.visibility = "visible";//perf_cir_1
          }
          document.getElementById('perf_cir_5').style.visibility = "hidden";
          document.getElementById('cant_perfo').innerText = parseInt(document.getElementById('cant_perfo').innerText,10)-1;
        }
      }
      if(num == 6)
      {
        var border1 = document.getElementById("perf6").getAttribute('value'); //cantesqred
        if(border1 == 0)
        {
          document.getElementById("perf6").setAttribute('value','1');
          document.getElementById('perfo6').value = "1";
          document.getElementById('perf1').style.visibility = "hidden";
          document.getElementById('perf3').style.visibility = "hidden";
          document.getElementById('perf4').style.visibility = "hidden";
          document.getElementById('perf5').style.visibility = "hidden";
          document.getElementById('perf7').style.visibility = "hidden";
          document.getElementById('perf8').style.visibility = "hidden";//perf_cir_1    
          document.getElementById('perf_cir_6').style.visibility = "visible";//perf_cir_1
          document.getElementById('cant_perfo').innerText = parseInt(document.getElementById('cant_perfo').innerText,10)+1;
        }
        else
        {
          document.getElementById("perf6").setAttribute('value','0');
          document.getElementById('perfo6').value = "0";
          if(document.getElementById("perf2").getAttribute('value') == 0)
          {
            document.getElementById('perf1').style.visibility = "visible";
            document.getElementById('perf3').style.visibility = "visible";
            document.getElementById('perf4').style.visibility = "visible";
            document.getElementById('perf5').style.visibility = "visible";
            document.getElementById('perf7').style.visibility = "visible";
            document.getElementById('perf8').style.visibility = "visible";//perf_cir_1
          }
          document.getElementById('perf_cir_6').style.visibility = "hidden";
          document.getElementById('cant_perfo').innerText = parseInt(document.getElementById('cant_perfo').innerText,10)-1;
        }
      }
      if(num == 7)
      {
        var border1 = document.getElementById("perf7").getAttribute('value'); //cantesqred
        if(border1 == 0)
        {
          document.getElementById("perf7").setAttribute('value','1');
          document.getElementById('perfo7').value = "1";
          document.getElementById('perf1').style.visibility = "hidden";
          document.getElementById('perf2').style.visibility = "hidden";
          document.getElementById('perf4').style.visibility = "hidden";
          document.getElementById('perf5').style.visibility = "hidden";
          document.getElementById('perf6').style.visibility = "hidden";
          document.getElementById('perf8').style.visibility = "hidden";//perf_cir_1    
          document.getElementById('perf_cir_7').style.visibility = "visible";//perf_cir_1
          document.getElementById('cant_perfo').innerText = parseInt(document.getElementById('cant_perfo').innerText,10)+1;
        }
        else
        {
          document.getElementById("perf7").setAttribute('value','0');
          document.getElementById('perfo7').value = "0";
          if(document.getElementById("perf3").getAttribute('value') == 0)
          {
            document.getElementById('perf1').style.visibility = "visible";
            document.getElementById('perf2').style.visibility = "visible";
            document.getElementById('perf4').style.visibility = "visible";
            document.getElementById('perf5').style.visibility = "visible";
            document.getElementById('perf6').style.visibility = "visible";
            document.getElementById('perf8').style.visibility = "visible";//perf_cir_1
          }
          document.getElementById('perf_cir_7').style.visibility = "hidden";
          document.getElementById('cant_perfo').innerText = parseInt(document.getElementById('cant_perfo').innerText,10)-1;
        }
      }
      if(num == 8)
      {
        var border1 = document.getElementById("perf8").getAttribute('value'); //cantesqred
        if(border1 == 0)
        {
          document.getElementById("perf8").setAttribute('value','1');
          document.getElementById('perfo8').value = "1";
          document.getElementById('perf1').style.visibility = "hidden";
          document.getElementById('perf3').style.visibility = "hidden";
          document.getElementById('perf2').style.visibility = "hidden";
          document.getElementById('perf6').style.visibility = "hidden";
          document.getElementById('perf7').style.visibility = "hidden";
          document.getElementById('perf5').style.visibility = "hidden";//perf_cir_1    
          document.getElementById('perf_cir_8').style.visibility = "visible";//perf_cir_1
          document.getElementById('cant_perfo').innerText = parseInt(document.getElementById('cant_perfo').innerText,10)+1;
        }
        else
        {
          document.getElementById("perf8").setAttribute('value','0');
          document.getElementById('perfo8').value = "0";
          if(document.getElementById("perf4").getAttribute('value') == 0)
          {
            document.getElementById('perf1').style.visibility = "visible";
            document.getElementById('perf3').style.visibility = "visible";
            document.getElementById('perf2').style.visibility = "visible";
            document.getElementById('perf6').style.visibility = "visible";
            document.getElementById('perf7').style.visibility = "visible";
            document.getElementById('perf5').style.visibility = "visible";//perf_cir_1
          }
          document.getElementById('perf_cir_8').style.visibility = "hidden";
          document.getElementById('cant_perfo').innerText = parseInt(document.getElementById('cant_perfo').innerText,10)-1;
        }
      }
      Suma(2);
  }
 </script>
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
  <script src="contactform/contactform.js"></script>
  <script src="js/main.js"></script>
</body>

</html>