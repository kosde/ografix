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
  <link rel="stylesheet" href="build/css/intlTelInput.css">
  <link href="upload/dist/css/jquery.dm-uploader.min.css" rel="stylesheet">
  <link href="upload/upload_file/styles.css" rel="stylesheet">
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <script>
      function check(num)
      {//comercial maquila
        //var comercial = document.getElementById('comercial');doc_extras
        if (num==1)
        {
            document.getElementById("maquila").checked = 0;
            document.getElementById("comercial").checked = 1;
            document.getElementById("maquila").value = 0;
            document.getElementById("comercial").value = 1;
            document.getElementById('doc_extras').style.visibility = "hidden";
            document.getElementById('doc_extras').style.display = "none";
        }
        else{
            document.getElementById("maquila").checked = 1;
            document.getElementById("comercial").checked = 0;
            document.getElementById("maquila").value = 1;
            document.getElementById("comercial").value = 0;
            document.getElementById('doc_extras').style.visibility = "visible";
            document.getElementById('doc_extras').style.display = "block";
        }
      }
      var input = document.querySelector("#telephone");
      window.intlTelInput(input,({   }));

      $("#telephone").intlTelInput({   });
  </script>
  <script>
    function tipo_negocio()
    {
      var select = document.getElementById('t_negocio');
      var value = select.options[select.selectedIndex].value;
      if(value == "Otro")
      {
        document.getElementById('otro_negocio').style.visibility = "visible";
        document.getElementById('otro_negocio').style.display = "inline-block"; 
      }
      else{
        document.getElementById('otro_negocio').style.visibility = "hidden";
        document.getElementById('otro_negocio').style.display = "none"; 
      }
    }
  </script>
  <style type="text/css">
      .abcRioButton
      {
        width: 100% !important;
      }
      .invalid 
      {
        background: #fbf2f2;
        border: #e8e0e0 1px solid;
      }
      .cutomB
      {
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
      .cutomB:hover
      {
        color: #fff;
        border: 1px solid #333;
        background: #333;
      }
      .preloader 
        {
            position: fixed;
            display: flex;
            justify-content: center;
            width: 70px;
            height: 70px;
            border: 10px solid #eee;
            border-top: 10px solid #ffb20f;
            border-radius: 50%;
            animation-name: girar;
            animation-duration: 2s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }
        @keyframes girar 
        {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }  
  </style>
</head>

<body data-spy="scroll" data-target="#navbar-example" class="estaciones">
  <?php
  include "header.php";
  ?>
  <!-- header end -->
  <input type="checkbox" name="" id="" style="display: none;visibility: hidden;">
  <div class="paper container" style="width: min-content !important;padding: 0;">
      <div class="container">
      <div class="container area-padding" style="padding-top:100px;">
        <div class="row flex">
          
          <!-- Start  contact -->
          <div class="col-md-6 col-sm-6 col-xs-12 mauto form-login">
            <div class="form contact-form">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              
              <div id="errormessage"></div>
              <h3 class="center">Hola</h3>
              <span class="center footer-logo">¿Ya tienes una cuenta? <a href="identificate" id="">inicia sesión</a></span>
              <div class="or-seperator"><i>o</i></div>
              <form action="php/registro_usr.php" method="post">
                <div class="mt-15" id="shipping_address_fields">
                  <div class="field select footer-logo">
                      <div class="field text ">
                          <span class="  colorb" style="display: inline-block;">
                              <label for="message" class="fontnormal  " style="font-weight: bold;">Nombre</label>
                          </span>
                          <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400; color:red; ">*</small>
                          <div aria-live="assertive" class="inputWrapper inputcheckout" role="alert">
                            <?php
                            if(isset($_POST['name']))
                            {
                              ?>
                              <input style="border: 1px solid #c8c8c8;" autocomplete="name" required autocorrect="off" id="shipping_name" label="Full name" name="name" type="text" class="input-white" value="<?php echo $_POST['name'];?>" aria-invalid="true" autofocus>
                              <?php
                            }
                            else
                            {
                              ?>
                               <input style="border: 1px solid #c8c8c8;" autocomplete="name" required autocorrect="off" id="shipping_name" label="Full name" name="name" type="text" class="input-white" value="" aria-invalid="true" autofocus>
                              <?php
                            }
                            ?>
                          </div>
                      </div>
                      <div class="field text ">
                          <span class="  colorb" style="display: inline-block;">
                              <label for="message" class="fontnormal  " style="font-weight: bold;">Correo</label>
                          </span>
                          <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400; color:red; ">*</small>
                          <div aria-live="assertive" class="inputWrapper inputcheckout" role="alert">
                            <?php
                            if(isset($_POST['email']))
                            {
                              ?>
                              <input style="border: 1px solid #c8c8c8;" autocomplete="name" required autocorrect="off" id="input_email" label="Full name" name="email" type="email" class="input-white" value="<?php echo $_POST['email'];?>" aria-invalid="true">
                              <?php
                            }
                            else
                            {
                              ?>
                               <input style="border: 1px solid #c8c8c8;" autocomplete="name" required autocorrect="off" id="input_email" label="Full name" name="email" type="email" class="input-white" value="" aria-invalid="true">
                              <?php
                            }
                            ?>
                              
                          </div>
                      </div>
                      <div class="field text ">
                          <span class="  colorb" style="display: inline-block;">
                              <label for="message" class="fontnormal  " style="font-weight: bold;">Contraseña</label>
                          </span>
                          <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400; color:red; ">*</small>
                          <div id="inputs_pass" style="visibility:hidden;display:none;">
                              Las contraseñas no coinciden
                          </div>
                          <div aria-live="assertive" class="inputWrapper inputcheckout" role="alert">
                              <input style="border: 1px solid #c8c8c8;border-radius: 0;color: #444;height: 40px;margin-bottom: 16px;padding-left: 20px;width: 100%;" autocomplete="name" required autocorrect="off" id="input_pass1" name="pass1" type="password" class="input-white" value="" aria-invalid="true" onkeyup="verficapass()">
                          </div>
                          <span class="  colorb" style="display: inline-block;">
                              <label for="message" class="fontnormal  " style="font-weight: bold;">Confirma tu contraseña</label>
                          </span>
                          <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400; color:red; ">*</small>
                          <div aria-live="assertive" class="inputWrapper inputcheckout" role="alert">
                              <input style="border: 1px solid #c8c8c8;border-radius: 0;color: #444;height: 40px;margin-bottom: 16px;padding-left: 20px;width: 100%;" autocomplete="name" required autocorrect="off" id="input_pass2" name="pass2" type="password" class="input-white" value="" aria-invalid="true" onkeyup="verficapass()">
                          </div>
                      </div>
                      <div class="field group-input-wrappers text">
                          <span class="  colorb" style="display: inline-block;">
                              <label for="message" class="fontnormal  " style="font-weight: bold;">Domicilio</label>
                          </span>
                          <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400; color:red; ">*</small>
                          <div aria-live="assertive" class="inputWrapper inputcheckout" role="alert">
                              <input style="border: 1px solid #c8c8c8;" required aria-label="Street address 1" onFocus="" autocomplete="off" autocorrect="off" id="street_number" name="address1" placeholder="" type="text" class="input-white pac-target-input" value="" aria-invalid="true">
                          </div>
                          <div aria-live="assertive" class="inputWrapper inputcheckout" role="alert">
                              <input style="border: 1px solid #c8c8c8;" aria-label="Street address 2" autocomplete="off" autocorrect="off" id="route" name="address2" type="text" class="input-white" value="">
                          </div>
                      </div>
                      <div style="display: inline-block;">
                          <div class="field text " style="display: inline-block;width: 50%;position: relative;">
                              <span class="  colorb" style="display: inline-block;">
                                  <label for="message" class="fontnormal  " style="font-weight: bold;">Ciudad</label>
                              </span>
                              <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400; color:red; ">*</small>
                      
                              <div aria-live="assertive" class="inputWrapper inputcheckout" style="width:90%;display: inline-block;" role="alert">
                                  <input style="border: 1px solid #c8c8c8;" required id="locality" label="City"type="text" class="input-white field" name="locality">
                              </div>
                          </div>
                          <div class="field tel half" style="width: 50%;float: right;">
                              <span class="  colorb" style="display: inline-block;">
                                  <label for="message" class="fontnormal  " style="font-weight: bold;">Codigo postal</label>
                              </span>
                              <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400; color:red; ">*</small>
                      
                              <div aria-live="assertive" class="inputWrapper inputcheckout" style="width:100%;display: inline-block;" role="alert">
                                  <input  style="border: 1px solid #c8c8c8;" id="postal_code" label="ZIP code" type="number" class="input-white input-number" name="zipcode">
                              </div>
                          </div>
                      </div>
                      <div>
                          <div class="field select half right">
                              <span class="  colorb" style="display: inline-block;">
                                  <label for="message" class="fontnormal  " style="font-weight: bold;">Estado</label>
                              </span>
                              <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400; color:red; ">*</small>
                      
                              <div aria-live="assertive" style="width:100%;"class="inputWrapper " role="alert">
                                  <input style="border: 1px solid #c8c8c8;" class="input-white" name="state" type="text" id="administrative_area_level_1"/>
                              </div>
                          </div>
                      </div>
                      <div>
                          <div class="field select half right">
                              <span class="  colorb" style="display: inline-block;">
                                  <label for="message" class="fontnormal  " style="font-weight: bold;">Pais</label>
                              </span>
                              <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400; color:red; ">*</small>
                      
                              <div aria-live="assertive" style="width:100%;"class="inputWrapper " role="alert">
                                <select style="border: 1px solid #c8c8c8;border-radius: 0;color: #444;height: 40px;margin-bottom: 16px;padding-left: 20px;width: 100%;" class="input-white" autocomplete="country" id="country" label="Country" name="country" type="select" class="" >
                                  <option value="MX">Mexico</option>
                                  <option value="US">United States</option>
                                  <option value="AF">Afghanistan</option>
                                  <option value="AX">Aland Islands</option>
                                  <option value="AL">Albania</option>
                                  <option value="DZ">Algeria</option>
                                  <option value="AS">American Samoa</option>
                                  <option value="AD">Andorra</option>
                                  <option value="AO">Angola</option>
                                  <option value="AI">Anguilla</option>
                                  <option value="AG">Antigua and Barbuda</option>
                                  <option value="AR">Argentina</option>
                                  <option value="AM">Armenia</option>
                                  <option value="AW">Aruba</option>
                                  <option value="AU">Australia</option>
                                  <option value="AT">Austria</option>
                                  <option value="AZ">Azerbaijan</option>
                                  <option value="BS">Bahamas</option>
                                  <option value="BH">Bahrain</option>
                                  <option value="BD">Bangladesh</option>
                                  <option value="BB">Barbados</option>
                                  <option value="BY">Belarus</option>
                                  <option value="BE">Belgium</option>
                                  <option value="BZ">Belize</option>
                                  <option value="BJ">Benin</option>
                                  <option value="BM">Bermuda</option>
                                  <option value="BT">Bhutan</option>
                                  <option value="BO">Bolivia</option>
                                  <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                  <option value="BA">Bosnia and Herzegovina</option>
                                  <option value="BW">Botswana</option>
                                  <option value="BR">Brazil</option>
                                  <option value="BN">Brunei Darussalam</option>
                                  <option value="BG">Bulgaria</option>
                                  <option value="BF">Burkina Faso</option>
                                  <option value="BI">Burundi</option>
                                  <option value="KH">Cambodia</option>
                                  <option value="CM">Cameroon</option>
                                  <option value="CA">Canada</option>
                                  <option value="CV">Cape Verde</option>
                                  <option value="KY">Cayman Islands</option>
                                  <option value="CF">Central African Republic</option>
                                  <option value="TD">Chad</option>
                                  <option value="CL">Chile</option>
                                  <option value="CN">China</option>
                                  <option value="CO">Colombia</option>
                                  <option value="KM">Comoros</option>
                                  <option value="CG">Congo</option>
                                  <option value="CD">Congo, the Democratic Republic of the</option>
                                  <option value="CK">Cook Islands</option>
                                  <option value="CR">Costa Rica</option>
                                  <option value="HR">Croatia</option>
                                  <option value="CW">Curacao</option>
                                  <option value="CY">Cyprus</option>
                                  <option value="CZ">Czech Republic</option>
                                  <option value="DK">Denmark</option>
                                  <option value="DJ">Djibouti</option>
                                  <option value="DM">Dominica</option>
                                  <option value="DO">Dominican Republic</option>
                                  <option value="EC">Ecuador</option>
                                  <option value="EG">Egypt</option>
                                  <option value="SV">El Salvador</option>
                                  <option value="ER">Eritrea</option>
                                  <option value="EE">Estonia</option>
                                  <option value="ET">Ethiopia</option>
                                  <option value="FO">Faroe Islands</option>
                                  <option value="FJ">Fiji</option>
                                  <option value="FI">Finland</option>
                                  <option value="FR">France</option>
                                  <option value="GF">French Guiana</option>
                                  <option value="PF">French Polynesia</option>
                                  <option value="GA">Gabon</option>
                                  <option value="GM">Gambia</option>
                                  <option value="GE">Georgia</option>
                                  <option value="DE">Germany</option>
                                  <option value="GH">Ghana</option>
                                  <option value="GI">Gibraltar</option>
                                  <option value="GR">Greece</option>
                                  <option value="GL">Greenland</option>
                                  <option value="GD">Grenada</option>
                                  <option value="GP">Guadeloupe</option>
                                  <option value="GU">Guam</option>
                                  <option value="GT">Guatemala</option>
                                  <option value="GG">Guernsey</option>
                                  <option value="GN">Guinea</option>
                                  <option value="GW">Guinea-Bissau</option>
                                  <option value="GY">Guyana</option>
                                  <option value="HT">Haiti</option>
                                  <option value="VA">Holy See (Vatican City State)</option>
                                  <option value="HN">Honduras</option>
                                  <option value="HK">Hong Kong</option>
                                  <option value="HU">Hungary</option>
                                  <option value="IS">Iceland</option>
                                  <option value="IN">India</option>
                                  <option value="ID">Indonesia</option>
                                  <option value="IQ">Iraq</option>
                                  <option value="IE">Ireland</option>
                                  <option value="IL">Israel</option>
                                  <option value="IT">Italy</option>
                                  <option value="CI">Ivory Coast</option>
                                  <option value="JM">Jamaica</option>
                                  <option value="JP">Japan</option>
                                  <option value="JE">Jersey</option>
                                  <option value="JO">Jordan</option>
                                  <option value="KZ">Kazakhstan</option>
                                  <option value="KE">Kenya</option>
                                  <option value="KI">Kiribati</option>
                                  <option value="KW">Kuwait</option>
                                  <option value="KG">Kyrgyzstan</option>
                                  <option value="LA">Lao People's Democratic Republic</option>
                                  <option value="LV">Latvia</option>
                                  <option value="LB">Lebanon</option>
                                  <option value="LS">Lesotho</option>
                                  <option value="LR">Liberia</option>
                                  <option value="LY">Libyan Arab Jamahiriya</option>
                                  <option value="LI">Liechtenstein</option>
                                  <option value="LT">Lithuania</option>
                                  <option value="LU">Luxembourg</option>
                                  <option value="MO">Macao</option>
                                  <option value="MK">Macedonia</option>
                                  <option value="MG">Madagascar</option>
                                  <option value="MW">Malawi</option>
                                  <option value="MY">Malaysia</option>
                                  <option value="MV">Maldives</option>
                                  <option value="ML">Mali</option>
                                  <option value="MT">Malta</option>
                                  <option value="MH">Marshall Islands</option>
                                  <option value="MQ">Martinique</option>
                                  <option value="MR">Mauritania</option>
                                  <option value="MU">Mauritius</option>
                                  <option value="YT">Mayotte</option>
                                  <option value="FM">Micronesia, Federated States of</option>
                                  <option value="MD">Moldova, Republic of</option>
                                  <option value="MC">Monaco</option>
                                  <option value="MN">Mongolia</option>
                                  <option value="ME">Montenegro</option>
                                  <option value="MS">Montserrat</option>
                                  <option value="MA">Morocco</option>
                                  <option value="MZ">Mozambique</option>
                                  <option value="MM">Myanmar</option>
                                  <option value="NA">Namibia</option>
                                  <option value="NP">Nepal</option>
                                  <option value="NL">Netherlands</option>
                                  <option value="AN">Netherlands Antilles</option>
                                  <option value="NC">New Caledonia</option>
                                  <option value="NZ">New Zealand</option>
                                  <option value="NI">Nicaragua</option>
                                  <option value="NE">Niger</option>
                                  <option value="NG">Nigeria</option>
                                  <option value="NF">Norfolk Island</option>
                                  <option value="MP">Northern Mariana Islands</option>
                                  <option value="NO">Norway</option>
                                  <option value="OM">Oman</option>
                                  <option value="PK">Pakistan</option>
                                  <option value="PW">Palau</option>
                                  <option value="PA">Panama</option>
                                  <option value="PG">Papua New Guinea</option>
                                  <option value="PY">Paraguay</option>
                                  <option value="PE">Peru</option>
                                  <option value="PH">Philippines</option>
                                  <option value="PL">Poland</option>
                                  <option value="PT">Portugal</option>
                                  <option value="PR">Puerto Rico</option>
                                  <option value="QA">Qatar</option>
                                  <option value="RE">Reunion</option>
                                  <option value="RO">Romania</option>
                                  <option value="RU">Russian Federation</option>
                                  <option value="RW">Rwanda</option>
                                  <option value="BL">Saint Barthélemy</option>
                                  <option value="KN">Saint Kitts and Nevis</option>
                                  <option value="LC">Saint Lucia</option>
                                  <option value="MF">Saint Martin (French part)</option>
                                  <option value="VC">Saint Vincent and the Grenadines</option>
                                  <option value="WS">Samoa</option>
                                  <option value="SM">San Marino</option>
                                  <option value="SA">Saudi Arabia</option>
                                  <option value="SN">Senegal</option>
                                  <option value="RS">Serbia</option>
                                  <option value="SC">Seychelles</option>
                                  <option value="SL">Sierra Leone</option>
                                  <option value="SG">Singapore</option>
                                  <option value="SX">Sint Maarten</option>
                                  <option value="SK">Slovakia</option>
                                  <option value="SI">Slovenia</option>
                                  <option value="SB">Solomon Islands</option>
                                  <option value="ZA">South Africa</option>
                                  <option value="KR">South Korea</option>
                                  <option value="ES">Spain</option>
                                  <option value="LK">Sri Lanka</option>
                                  <option value="PS">State of Palestine</option>
                                  <option value="SR">Suriname</option>
                                  <option value="SJ">Svalbard and Jan Mayen</option>
                                  <option value="SZ">Swaziland</option>
                                  <option value="SE">Sweden</option>
                                  <option value="CH">Switzerland</option>
                                  <option value="TW">Taiwan</option>
                                  <option value="TJ">Tajikistan</option>
                                  <option value="TZ">Tanzania, United Republic of</option>
                                  <option value="TH">Thailand</option>
                                  <option value="TL">Timor-Leste</option>
                                  <option value="TG">Togo</option>
                                  <option value="TO">Tonga</option>
                                  <option value="TT">Trinidad and Tobago</option>
                                  <option value="TN">Tunisia</option>
                                  <option value="TR">Turkey</option>
                                  <option value="TC">Turks and Caicos Islands</option>
                                  <option value="TV">Tuvalu</option>
                                  <option value="UG">Uganda</option>
                                  <option value="UA">Ukraine</option>
                                  <option value="AE">United Arab Emirates</option>
                                  <option value="GB">United Kingdom</option>
                                  <option value="UY">Uruguay</option>
                                  <option value="UZ">Uzbekistan</option>
                                  <option value="VU">Vanuatu</option>
                                  <option value="VE">Venezuela</option>
                                  <option value="VN">Viet Nam</option>
                                  <option value="VG">Virgin Islands, British</option>
                                  <option value="VI">Virgin Islands, U.S.</option>
                                  <option value="WF">Wallis and Futuna</option>
                                  <option value="YE">Yemen</option>
                                  <option value="ZM">Zambia</option>
                                  <option value="ZW">Zimbabwe</option>
                                </select> 
                              </div>
                          </div>
                      </div>
                      <div style="display: inline-block;width: 100%;">
                        <div class="field text " style="display: inline-block;width: 100%;position: relative;">
                          <span class="  colorb" style="display: inline-block;">
                              <label for="message" class="fontnormal  " style="font-weight: bold;">Telefono</label>
                          </span>
                          <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400; color:red; ">*</small>
                      
                          <div aria-live="assertive" class="inputWrapper inputcheckout"  style="width:100%;display: inline-block;" role="alert">
                              <!--<input style="border: 1px solid #c8c8c8;" autocomplete="company"  id="phone" label="Company" name="phone" type="number" class="input-white input-number">-->
                              
                              <?php
                              if(isset($_POST['phone']))
                              {
                                ?>
                                <input id="phone" name="phone" type="tel" value="<?php echo $_POST['phone'];?>" style="width: 100%;border: 1px solid #c8c8c8;height: 50px;">
                                <?php
                              }
                              else
                              {
                                ?>
                                <input id="phone" name="phone" type="tel" style="width: 100%;border: 1px solid #c8c8c8;height: 50px;">
                                <?php
                              }
                              ?>
                              <input id="code" name="code" type="number" style="visibility: hidden;display: none;">                        
                        </div>
                      </div>
                      <div style="display: inline-block;width: 100%;">
                        <div class="field tel half" style="width: 50%;float: left;">
                          <span class="  colorb" style="display: inline-block;">
                              <label for="message" class="fontnormal  " style="font-weight: bold;">RFC</label>
                          </span>
                          <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400; color:red; "></small>
                          <div aria-live="assertive" class="inputWrapper inputcheckout" role="alert">
                              <input style="border: 1px solid #c8c8c8;" autocomplete="company" required autocorrect="off" id="RFC" label="Company" name="RFC" type="text" class="input-white"  onkeyup="javascript:this.value=this.value.toUpperCase();">
                          </div>
                        </div>
                      </div>
                      <div style="display: inline-block;width: 100%;margin-bottom: 16px;">
                        <span class="field  colorb" style="display: inline-block;width: 100%;">
                          <label for="message" class="fontnormal  " style="font-weight: bold;">Tipo de cuenta</label>
                          <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400; color:red; ">*</small>
                        </span>
                        <div class="text " style="display: inline-block;width: 100%;position: relative;">
                            <div aria-live="assertive" class="inputWrapper inputcheckout" style="width:90%;display: inline-block;" role="alert">
                              <input id="comercial" name="comercial" type="radio" class="input-radio" value="0" onclick="check(1)">
                              <label class="fontnormal">Comercial</label>
                            </div>
                        </div>
                        <div class="tel half" style="width: 100%;float: right;">
                            <div aria-live="assertive" class="inputWrapper inputcheckout" style="width:100%;display: inline-block;" role="alert">
                              <input id="maquila" name="maquila" type="radio" class="input-radio" value="0" onclick="check(2)">
                              <label class="fontnormal"> Maquila</label>
                            </div>
                        </div>
                      </div>
                      <!--
                        <div style="display: inline-block;width: 100%;margin-bottom: 16px;">
                          <div class="field text " style="display: inline-block;width: 100%;position: relative;">
                            <span class="  colorb" style="display: inline-block;">
                                <label for="message" class="fontnormal  " style="font-weight: bold;">Tipo de cuenta</label>
                            </span>
                            <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400; color:red; "></small>
                        
                            <div aria-live="assertive" class="inputWrapper inputcheckout" role="alert" style="width:100%;display: inline-block;">
                              <span>
                                <input type="radio" id="male" name="gender" value="male">
                                  <input id="comercial" name="comercial" readonly="" type="radio" class="input-white input-radio">
                                  <label class="fontnormal">Comercial</label>
                              </span>
                              <span>
                                  <input id="maquila" name="maquila" readonly="" type="radio" class="input-white input-radio">
                                  <label class="fontnormal"> Maquila</label>
                              </span>
                            </div>
                          </div>
                        </div>
                      -->
                    <div id="doc_extras" style="visibility:hidden;display:none;">
                      <div style="display: inline-block;width: 100%;">
                        <div class="field text ">
                          <span class="  colorb" style="display: inline-block;">
                            <label for="message" class="fontnormal  " style="font-weight: bold;">Tipo de negocio</label>
                          </span>
                          <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400;color:red;">*</small>
                          <select id="t_negocio" onchange="tipo_negocio()" name="tipe_negocio" style="border: 1px solid #c8c8c8;border-radius: 0;color: #444;height: 40px;margin-bottom: 16px;padding-left: 20px;width: 100%;" >
                            <option value="0" selected="selected">-- Selecciona uno --</option>    
                            <option value="Impresor">Impresor</option>  
                            <option value="Diseño grafico">Diseño grafico</option> 
                            <option value="Marketing/ agencia de publicidad ">Marketing/ agencia de publicidad </option>
                            <option value="Imprenta de gran formato">Imprenta de gran formato</option>
                            <option value="Fabricante de anuncios / Toldos">Fabricante de anuncios / Toldos</option>
                            <option value="Centro de copiado">Centro de copiado</option> 
                            <option value="Fotografía">Fotografía </option>                           
                            <option value="Productos promocionales">Productos promocionales</option>
                            <option value="Vendedor independiente">Vendedor independiente</option>
                            <option value="Otro">Otro</option>
                          </select> 
                          <input style="border: 1px solid #c8c8c8;visibility: hidden;display: none;" id="otro_negocio" name="otro_negocio" type="text" class="input-white"> 
                        </div>
                        <div class="field text " style="display: inline-block;width: 100%;position: relative;">
                          <span class="  colorb" style="display: inline-block;">
                              <label for="message" class="fontnormal  " style="font-weight: bold;">Razon social / Compañia</label>
                          </span>
                          <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400; color:red; ">*</small>
                      
                          <div aria-live="assertive" class="inputWrapper inputcheckout" role="alert" style="width:100%;display: inline-block;">
                              <input style="border: 1px solid #c8c8c8;" autocomplete="company"  id="shipping_company" label="Company" name="company" type="text" class="input-white">
                          </div>
                        </div>
                        
                         
                      </div>

                      <div id="drag-and-drop-zone" class="dm-uploader p-5">
                        <div class="input" id="formdrop">
                          <div class=" ">
                            
                            <span class="  colorb" style="display: inline-block;">
                              <label for="message" class="fontnormal  " style="font-weight: bold;"><small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400; color:red; ">*</small>&nbsp;&nbsp;Ingresa un documento que acredite que perteneces <br>a la industria de las artes gráficas</label>
                            </span>
                            
                              <div class="  tooltipWrapper">
                                  <div class="  field" style="display: inline-block;width: 100%;">
                                      <label class="input-group-btn" style="padding-right: 20px;padding-bottom: 0px;display: inline-block;width: 182px;">
                                          <input type="hidden" name="size" value="1000000" class="fontlight">
                                          <span class="btn btn-primary btn-file" style="height: 40px;">
                                              Tarjeta de Presentacion<input accept="image/jpeg,application/pdf" class="inputfile" type="file" multiple="multiple"
                                              name="attachment" id="Imagen" onchange="document.getElementById('file-name').value = this.files[0].name">
                                          </span>
                                      </label>
                                      <input class="form-control-file-choose" placeholder="" name="file-name" id="file-name" style="height: 40px;
                                      border: 1px solid #c8c8c8;
                                      float: right;width: 236px;">
                                      <!--<input type="file" name="attachment[]" class="demoInputBox" multiple="multiple">-->
                                  </div>
                                  
                                  <p style="color: black;text-align: justify;">Para poder acceder a los precios de maquila, necesitas comprobar que perteneces a la industria de las artes gráficas y/o derivados.  
                                                                                Puedes mandarnos FOTO de cualquiera de los siguientes documentos: tarjeta de presentación con tus datos, 
                                                                                fachada de tu negocio (domicilio debe coincidir con los datos ingresados arriba), o volante acerca de tu negocio.</p>
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="progress" id="pbar" style="visibility:hidden;height: 80px;">
                        <div class="preloader " style="position: relative;margin: auto;width: 56px;height: 56px;"></div>
                        <div style="height: 20px;"></div>
                        <div id="progress-bar"class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                      </div>
                     
                    </div>
                  </div>
                </div>
                  <!--<div class="text-center"><input type="submit" id="send_button" onclick="submit_contact()" value="Continuar">-->
                  <!--<button onclick="submit_contact()" id="send_button">Enviar</button>-->
                <input type="button" class="cutomB" style="width: 60%;display: block;margin: auto;" onclick="sendfile()" value="Continuar"> <!--</button>-->
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
  <script src="build/js/intlTelInput.js"></script>
  <script src="build/js/intlTelInput-jquery.min.js"></script>
  <script>
      var input = document.querySelector("#phone");
      var iti = window.intlTelInput(input, 
      {
          preferredCountries: ['mx'],
          utilsScript: "build/js/utils.js",
      });
      input.addEventListener('change', function() {
      //iti.setCountry(this.value);
      var countryData = iti.getSelectedCountryData();
      document.getElementById("code").value=countryData['dialCode'];
      });
  </script>
  <script>
      let fileobj = null;
      let uploadProgress = [];
      initializeProgress(1);
      function verficapass()
      {
        //console.log("verifica");
        
        if(document.getElementById("input_pass2").value && document.getElementById("input_pass1").value)
        {
          //console.log("tiene valor");
          clave1 = document.getElementById("input_pass1").value;
          clave2 = document.getElementById("input_pass2").value;
          if (clave1 == clave2)
          {
            document.getElementById("inputs_pass").classList.remove("error_account");
            document.getElementById('inputs_pass').style.visibility = "hidden";
            document.getElementById('inputs_pass').style.display = "none";
          }
          else
          {
            document.getElementById("inputs_pass").classList.add("error_account");
            document.getElementById('inputs_pass').style.visibility = "visible";
            document.getElementById('inputs_pass').style.display = "contents";
          }
        }
      }
      function initializeProgress(numFiles) 
      {
          $('#progress-bar').width(0 + "%").attr('aria-valuenow', 0);
          uploadProgress = []

          for(let i = numFiles; i > 0; i--) {
          uploadProgress.push(0)
          }
      }
      function required_inputs() 
      {
            var valid = true;	
            $("#shipping_name").removeClass("invalid");
            $("#input_email").removeClass("invalid");
            $("#input_pass1").removeClass("invalid");
            $("#street_number").removeClass("invalid");
            //$("#route").removeClass("invalid");
            $("#locality").removeClass("invalid");
            $("#postal_code").removeClass("invalid");  
            $("#administrative_area_level_1").removeClass("invalid");
            $("#RFC").removeClass("invalid");    
            $("#shipping_company").removeClass("invalid");
            $("#code").removeClass("invalid");
            $("#phone").removeClass("invalid");
            $("#country").removeClass("invalid");  

            if(!$("#shipping_name").val()) {
                $("#shipping_name").addClass("invalid"); 
                valid = false;
                console.log("shipping_name");
            }
            if(!$("#input_email").val()) {
                $("#input_email").addClass("invalid"); 
                valid = false;
                console.log("input_email");
            }
            if(!$("#input_pass1").val()) {
                $("#input_pass1").addClass("invalid"); 
                valid = false;
                console.log("input_pass1");
            }
            if(!$("#street_number").val()) {
                $("#street_number").addClass("invalid");
                valid = false;
                console.log("#street_number");
            }
            if(!$("#locality").val()) {
                $("#locality").addClass("invalid"); 
                valid = false;
                console.log("#locality");
            }
            if(!$("#postal_code").val()) {
                $("#postal_code").addClass("invalid"); 
                valid = false;
                console.log("#postal_code");
            }
            if(!$("#administrative_area_level_1").val()) 
            {
                $("#administrative_area_level_1").addClass("invalid"); 
                valid = false;
                console.log("#administrative_area_level_1");
            }
            if(!$("#code").val()) {
                $("#code").addClass("invalid");
                valid = false;
                console.log("#code");
            }
            if(!$("#phone").val()) {
                $("#phone").addClass("invalid");
                valid = false;
                console.log("#phone");
            }
            if(!$("#country").val()) {
                $("#country").addClass("invalid"); 
                valid = false;
                console.log("#country");
            }
            if(!$("#postal_code").val()) {
                $("#postal_code").addClass("invalid"); 
                valid = false;
                console.log("#postal_code");
            }
            if ($('#doc_extras').is(':visible'))
            {
                if(!$("#shipping_company").val()) {
                  $("#shipping_company").addClass("invalid"); 
                  valid = false;
                  console.log("#shipping_company");
                }
                if(!$("#file-name").val()) {
                    $("#file-name").addClass("invalid"); 
                    console.log("#file-name");
                    valid = false;
                }
            }
            if(valid==false)
                $("html, body").animate({ scrollTop: 0 }, 600);
            return valid;

      }
      function sendfile()
      {
          var valid;
          valid = required_inputs();
          //console.log(valid);
          if(valid)
          {
            ajax_file_upload(fileobj);
          }
      }
      function ajax_file_upload(file_obj) 
      {
          document.getElementById('pbar').style.visibility = "visible";
          var name      = document.getElementById('shipping_name').value;
          var email     = document.getElementById('input_email').value;
          var pass1     = document.getElementById('input_pass1').value;
          var address1  = document.getElementById('street_number').value;
          var address2  = document.getElementById('route').value;
          var locality  = document.getElementById('locality').value;
          var zipcode   = document.getElementById('postal_code').value;
          var state     = document.getElementById('administrative_area_level_1').value;
          var RFCv      = document.getElementById('RFC').value;
          var company   = document.getElementById('shipping_company').value;
          var code      = document.getElementById('code').value;
          var phone     = document.getElementById('phone').value;
          var country   = document.getElementById('country').value;
          var comercial = document.getElementById('comercial').value;
          var maquila   = document.getElementById('maquila').value;
         // var t_negocio = document.getElementById('t_negocio').value;
          var e = document.getElementById("t_negocio");
          var t_negocio = e.options[e.selectedIndex].value;
          var otro_negocio= document.getElementById('otro_negocio').value;

          //var texto     = document.getElementById('image_text').value;
          var form_data = new FormData();                  
          form_data.append('name', name);//
          form_data.append('email', email);//
          form_data.append('pass1', pass1);//
          form_data.append('address1', address1);//
          form_data.append('address2', address2);//
          form_data.append('locality', locality);//
          form_data.append('zipcode', zipcode);//
          form_data.append('state', state);//
          form_data.append('RFC', RFCv);//
          form_data.append('company', company);//
          form_data.append('code', code);//
          form_data.append('phone', phone);//
          form_data.append('country', country);//
          form_data.append('comercial', comercial);//
          form_data.append('maquila', maquila);//
          form_data.append('file', file_obj);//
          form_data.append('tipe_negocio', t_negocio);//
          form_data.append('otro_negocio', otro_negocio);//
          
          //form_data.append('image_text', texto);//
          $.ajax({
              xhr: function() {
                  var xhr = new window.XMLHttpRequest();
                  xhr.upload.addEventListener("progress", function(evt){
                      if (evt.lengthComputable) {
                          var percentComplete = evt.loaded / evt.total;
                          updateProgress(1,percentComplete*100*2);
                      }
              }, false);                        
              return xhr;
              },
              type: 'POST',
              url: 'php/registro_usr.php',
              contentType: false,
              processData: false,
              data: form_data,
              dataType: 'json',
              success:function(response) {
                //console.log("complete");
                //stateChange(-1);
                //var datax = JSON.parse(response);
                
                //console.log("success");

                console.log(response);
          
                setTimeout(function(){
                 
                  if(response.error==0)
                  {
                    //console.log(datax.email);
                    window.location = "../activacion_de_cuenta?email="+email;
                    //window.location = '../activacion_de_cuenta';
                  }
                  if(response.error==1)
                  {
                    document.getElementById('input_email').value = "";
                    required_inputs();
                    document.getElementById('input_email').placeholder='El correo '+email+' ya esta registrado';
                  }
                  if(response.error==2)
                  {
                    alert("Ocurrio un error verfica tu informacion e intenta de nuevo");
                    //window.location = '../index?email='+datax.email.toString();
                  }
                }, 1500);
                
              },
              onFailure: function(response){
                console.log("fail");
              }
          });
      }
      function stateChange(newState) 
      {
            setTimeout(function(){
                if(newState == -1)
                {
                    window.location = "../index";
                }
            }, 500);
      }
      function updateProgress(fileNumber, percent) 
      {
          uploadProgress[fileNumber] = percent;
          let total = uploadProgress.reduce((tot, curr) => tot + curr, 0) / uploadProgress.length;
          let fileobj = null;
          $('#progress-bar').width(total + "%").attr('aria-valuenow', total);
      }
    </script>
  
  <!-- JavaScript Libraries -->
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
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>          


  <script src="js/main.js"></script>

  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>

  <script src="upload/dist/js/jquery.dm-uploader.min.js"></script>
  <script src="upload/upload_file/demo-ui.js"></script>
  <script src="upload/upload_file/demo-config.js"></script>

</body>

</html>
