<?php
    session_start();
?>
<div class="modal-container" id="newAddress" style="display: none;"> <!--style="display: none;padding: 50px 28% 150px 28%;"-->
    <div class="modal-content" style="height: 900px;"> <!--style="height: 800px;"-->     
        <button class="modal-close-x" onclick="CloseNewAddress()" type="button">×</button>
        <form class="alt-form" id="add_new_address" method="get" action="../account/save_new_address.php">
            <div>
                <h4 style="font-weight: 900;font-size: 1.4rem;">Nueva direccion de envío</h4>
                <?php
                if($d_bill==1)
                {
                    ?>
                    <div style="display: inline-block;width: 100%;">
                        <input type="checkbox" name="" id="same_as_shipping"  onclick="get_bill_address(<?php echo $_SESSION['id']; ?>)">
                        <label class="labelfiel" style="width: 280px" for="shipping_name">Utilizar la misma dirección predeterminada de facturación </label>
                    </div>
                    <?php
                }
                ?>                
                <div class="field-group clear" id="shipping_details">
                    <div class="mt-15" id="shipping_address_fields">
                        <div class="field select ">
                            <label class="labelfiel" for="shipping_country_id">País<small class="field-help-message"></small></label>
                                <div style="width: 100%;" aria-live="assertive" class="inputWrapper " role="alert">
                                    <input class="inputcheckout"id="country"style="display:none;"/>
                                    <select autocomplete="country" id="shipping_country_id" label="Country" name="country_id" type="select" class="">
                                        <option value="MX">México</option>    
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
                            <div class="field text ">
                                <label class="labelfiel" for="shipping_name">Nombre completo
                                <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400;color:red;">*</small>
                                <div aria-live="assertive" class="inputWrapper inputcheckout" role="alert">
                                    <input style="border: 1px solid #c8c8c8;" autocomplete="name" autocorrect="off" id="shipping_name" label="Full name" name="name" type="text" class="inputcheckout" value="" aria-invalid="true">
                                </div>
                            </div>
                            <div class="field text ">
                                <label class="labelfiel" for="shipping_company">Compañia
                                <small class="field-help-message">Opcional</small></label>
                                <div aria-live="assertive" class="inputWrapper inputcheckout" role="alert">
                                    <input style="border: 1px solid #c8c8c8;" autocomplete="company" autocorrect="off" id="shipping_company" label="Company" name="company" type="text" class="inputcheckout" value="">
                                </div>
                            </div>
                            <div class="field group-input-wrappers text">
                                <label class="labelfiel" for="shipping_company">Dirección
                                <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400;color:red;">*</small>                            
                                <div aria-live="assertive" class="inputWrapper inputcheckout" role="alert">
                                    <input style="border: 1px solid #c8c8c8;" aria-label="Street address 1" onFocus="" autocomplete="off" autocorrect="off" id="street_number" name="address1" placeholder="" type="text" class="inputcheckout pac-target-input" value="" aria-invalid="true">
                                </div>
                                <div aria-live="assertive" class="inputWrapper inputcheckout" role="alert">
                                    <input style="border: 1px solid #c8c8c8;" aria-label="Street address 2" autocomplete="off" autocorrect="off" id="route" name="address2" type="text" class="inputcheckout" value="">
                                </div>
                            </div>
                            <div class="containerinput50">
                                <div class="field text input50" >
                                    <label  class="labelfiel "for="city">Ciudad
                                    <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400;color:red;">*</small>
                                    <div aria-live="assertive" class="inputWrapper inputcheckout" style="width:100%;display: inline-block;" role="alert">
                                        <input style="border: 1px solid #c8c8c8;" id="locality" label="City"type="text" class="inputcheckout field" name="locality">
                                    </div>
                                </div>
                                <div class="field tel half input50">
                                    <label  class="labelfiel " for="shipping_zipcode">Codigo postal
                                    <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400;color:red;">*</small>
                                    <div aria-live="assertive" class="inputWrapper inputcheckout" style="width:100%;display: inline-block;" role="alert">
                                        <input style="border: 1px solid #c8c8c8;" id="postal_code" label="ZIP code" type="tel" class="inputcheckout field" name="zipcode">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="field select half right">
                                    <label  class="labelfiel " for="">Estado
                                    <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400;color:red;">*</small>
                                    <div aria-live="assertive" style="width:100%;"class="inputWrapper " role="alert">
                                        <select style="border: 1px solid #c8c8c8;" autocomplete="address-level1" id="state_id" label="State" type="select" class="inputcheckout field" name="state" onchange="rellena()">
                                            <option value="San Luis Potosí">San Luis Potosí</option>
                                            <option value="Aguascalientes">Aguascalientes</option>
                                            <option value="Baja California">Baja California</option>
                                            <option value="Baja California Sur">Baja California Sur</option>
                                            <option value="Campeche">Campeche</option>
                                            <option value="Chiapas">Chiapas</option>
                                            <option value="Chihuahua">Chihuahua</option>
                                            <option value="CDMX">Ciudad de México</option>
                                            <option value="Coahuila">Coahuila</option>
                                            <option value="Colima">Colima</option>
                                            <option value="Durango">Durango</option>
                                            <option value="Estado de México">Estado de México</option>
                                            <option value="Guanajuato">Guanajuato</option>
                                            <option value="Guerrero">Guerrero</option>
                                            <option value="Hidalgo">Hidalgo</option>
                                            <option value="Jalisco">Jalisco</option>
                                            <option value="Michoacán">Michoacán</option>
                                            <option value="Morelos">Morelos</option>
                                            <option value="Nayarit">Nayarit</option>
                                            <option value="Nuevo León">Nuevo León</option>
                                            <option value="Oaxaca">Oaxaca</option>
                                            <option value="Puebla">Puebla</option>
                                            <option value="Querétaro">Querétaro</option>
                                            <option value="Quintana Roo">Quintana Roo</option>
                                            <option value="Sinaloa">Sinaloa</option>
                                            <option value="Sonora">Sonora</option>
                                            <option value="Tabasco">Tabasco</option>
                                            <option value="Tamaulipas">Tamaulipas</option>
                                            <option value="Tlaxcala">Tlaxcala</option>
                                            <option value="Veracruz">Veracruz</option>
                                            <option value="Yucatán">Yucatán</option>
                                            <option value="Zacatecas">Zacatecas</option>
                                        </select>
                                    </div>
                                </div>
                            </div> <!--
                            <div class="continue">
                                <button class="button large secondary block" id="continue" name="filename" value="Die cut stickers">Continue</button>
                                <p>Next: upload artwork →</p>
                            </div> 
                            <div class="field form-buttons">
                                <button class="button large secondary block" type="submit">Save shipping address</button>
                                <button class="button medium primary" type="button">Cancel</button>
                            </div>-->
                            <div class="buttons-2 buttons" style="text-align: center;">
                                <button class="button secondary largeA" style="width: 300px;" onclick="submit_add_new_address()" type="button">Guardar</button>
                                <!--<button class="button secondary largeA" style="width: 322px;" type="submit">Save shipping address</button>-->
                                <button class="button primary largeA " onclick="CloseNewAddress()" type="button">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
    </div>
</div>