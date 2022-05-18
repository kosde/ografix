<?php
    session_start();
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
     <script type="text/javascript" src="https://cdn.conekta.io/js/latest/conekta.js"></script>
     <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
     <?php
     include "css.php";
     ?>
    <style>
        label{
            color: black !important;
        }
        .modal-container{
            display: none;
            visibility: hidden;
        }
        span{
            font-size: inherit !important;
            color: #000 !important;
        }
        label{
            font-weight: normal;
        }
        .checkbox input[type="checkbox"]{
            border: 1px solid #000;
            width: 16px;
            height: 16px;
        }
        input[type=checkbox]:checked:after {
            content: "";
            display: block;
            width: 5px;
            height: 10px;
            border: solid black;
            border-width: 0 1px 1px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
            position: absolute;
            top: 2px;
            left: 6px;
        }
        .cutomB
        {
            background: #f58522;
            border: 1px solid #ccc;
            color: #fff;
            font-size: 16px;
            font-weight: 700;
            margin-top: 8px;
            padding: 12px 30px;
            text-transform: uppercase;
            transition: all 0.3s ease 0s;
            border-radius: 30px;
        }
        .cutomB:hover {
            color: #444;
            border: 1px solid #f58522;
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        }
        h2 {
            font-size: 17px !important;
            font-family: "Light" !important;
        }
        .invalid {
            background: #fbf2f2;
            border: #e8e0e0 1px solid;
        }
        @font-face {
            font-family: 'password';
            font-size: 20px !important;
            font-style: normal;
            src: url(https://jsbin-user-assets.s3.amazonaws.com/rafaelcastrocouto/password.ttf);
        }

        input.key {
            font-family: 'password';
        }
        .cutomBaplicado{
            background: rgb(0, 171, 78) none repeat scroll 0 0 !important;
            color: white !important;
        }
        .cutomBaplicado:hover {
            border: 1px solid #00ab4e !important;
        }
    </style>
    <script>
        function volveraintentar()
        {
            document.getElementById("name_conekta").value = ''; 
            document.getElementById("number_conekta").value = ''; 
            document.getElementById("card_month_conekta").value = ''; 
            document.getElementById("card_year_conekta").value = ''; 
            document.getElementById("card_cvc_conekta").value = ''; 
            document.getElementById("pago_conekta").style.backgroundColor = "#0070ba";
            document.getElementById("pago_conekta").disabled = false; 
            document.getElementById("pago_conekta").innerText = "Pagar"; 
            document.getElementById('volveraintentar').style.visibility = "hidden";
            document.getElementById('volveraintentar').style.display = "none"; 
        }
        function save_discount()
        {
            var code = document.getElementById("discount_code").value;
            var usr_id = document.getElementById("usr_id").value;
            var form_data = new FormData();    
            form_data.append('code', code);//
            form_data.append('usr_id', usr_id);//
            $.ajax({
                type: 'POST',
                url: 'php/discount_code.php',
                contentType: false,
                processData: false,
                data: form_data,
                dataType: 'json',
                success:function(response) {
                    //console.log(response);
                    var fechaIni        = new Date(response.fecha_inicio);
                    var fechaFin        = new Date(response.fecha_final);
                    var procentaje_Desc = 100 - response.cantidad;
                    var aplicado        = response.aplicado;
                    var diff            = fechaIni - fechaFin;
                    if(aplicado != 0)
                    {
                        var cantidad_precio = document.getElementById('totalpriceG').innerText;
                        var cantidad        = (cantidad_precio/100)*procentaje_Desc;
                        cantidad = cantidad.toFixed(2);
                        document.getElementById("totalprice").innerText="$"+ cantidad;
                        document.getElementById("button_apply").classList.add("cutomBaplicado");
                        document.getElementById("button_apply").value = "Cupon aplicado";
                        document.getElementById("button_apply").disabled = true;
                        document.getElementById('totalpriceG').innerText = cantidad;
                        document.getElementById('descuento_li').style.visibility = "visible";
                        document.getElementById('descuento_li').style.display = "block";
                        document.getElementById('descuentovalue').innerText = "% "+response.cantidad ;
                        document.getElementById("button_apply").insertAdjacentHTML("afterend", "<input type='hidden' name='cupon_activado' value='"+code+"'>");
                        document.getElementById("button_apply").insertAdjacentHTML("afterend", "<input type='hidden' name='cupon_id' value='"+response.id+"'>");
                    }
                    else
                    {
                        document.getElementById('error_descuento').style.visibility = "visible";
                        document.getElementById('error_descuento').style.display = "block";
                    }
                     /*
                        standard_price = 0.00
                        var total_price = document.getElementById("totalpriceG").innerText;
                        total_price = total_price.replace(/[$]/g,'');
                        document.getElementById('totalprice').innerText ="$ "+ pricetotalU;
                    */
                    //var fechaFinal = new Date(diff);
                    //console.log(diff);
                   // document.getElementById("button_apply").value = "Hecho!";
                },
                onFailure: function(response){
                    alert("fail");
                }
            });
        }
        function billing(num)
        {
            if (num==1)
            {
                document.getElementById("credit").checked = 0;
                document.getElementById("spei_input").checked = 0;
                document.getElementById("corresponsal_input").checked = 0;
                document.getElementById("lipay").style.background = "#ebf3fe";
                document.getElementById("licredit").style.background = "#fff";
                document.getElementById("spei").style.background = "#fff";
                document.getElementById("corresponsal").style.background = "#fff";
                document.getElementById('paypal-button-container').style.visibility = "visible";
                document.getElementById('paypal-button-container').style.display = "block"; 
                document.getElementById('credit-button-container').style.visibility = "hidden";
                document.getElementById('credit-button-container').style.display = "none"; 
                document.getElementById('datos').style.visibility = "hidden";
                document.getElementById('datos').style.display = "none"; 
                document.getElementById('corresponsal_secc').style.visibility = "hidden";
                document.getElementById('corresponsal_secc').style.display = "none"; 
            }
            if (num==2)
            {
                document.getElementById("pay").checked = 0;
                document.getElementById("credit").checked = 1;
                document.getElementById("spei_input").checked = 0;
                document.getElementById("corresponsal_input").checked = 0;
                document.getElementById("lipay").style.background = "#fff";
                document.getElementById("licredit").style.background = "#ebf3fe";
                document.getElementById("spei").style.background = "#fff";
                document.getElementById("corresponsal").style.background = "#fff";
                document.getElementById('paypal-button-container').style.visibility = "hidden";
                document.getElementById('paypal-button-container').style.display = "none"; 
                document.getElementById('credit-button-container').style.visibility = "visible";
                document.getElementById('credit-button-container').style.display = "block"; 
                document.getElementById('datos').style.visibility = "hidden";
                document.getElementById('datos').style.display = "none"; 
                document.getElementById('corresponsal_secc').style.visibility = "hidden";
                document.getElementById('corresponsal_secc').style.display = "none"; 
            }
            if (num==3)
            {
                document.getElementById("pay").checked = 0;
                document.getElementById("credit").checked = 0;
                document.getElementById("spei_input").checked = 1;
                document.getElementById("corresponsal_input").checked = 0;
                document.getElementById("lipay").style.background = "#fff";
                document.getElementById("licredit").style.background = "#fff";
                document.getElementById("spei").style.background = "#ebf3fe";
                document.getElementById("corresponsal").style.background = "#fff";
                document.getElementById('paypal-button-container').style.visibility = "hidden";
                document.getElementById('paypal-button-container').style.display = "none"; 
                document.getElementById('credit-button-container').style.visibility = "hidden";
                document.getElementById('credit-button-container').style.display = "none"; 
                document.getElementById('datos').style.visibility = "visible";
                document.getElementById('datos').style.display = "block"; 
                document.getElementById('corresponsal_secc').style.visibility = "hidden";
                document.getElementById('corresponsal_secc').style.display = "none"; 
            }
            if (num==4)
            {
                document.getElementById("pay").checked = 0;
                document.getElementById("credit").checked = 0;
                document.getElementById("spei_input").checked = 0;
                document.getElementById("corresponsal_input").checked = 1;
                document.getElementById("lipay").style.background = "#fff";
                document.getElementById("licredit").style.background = "#fff";
                document.getElementById("spei").style.background = "#fff";
                document.getElementById("corresponsal").style.background = "#ebf3fe";
                document.getElementById('paypal-button-container').style.visibility = "hidden";
                document.getElementById('paypal-button-container').style.display = "none"; 
                document.getElementById('credit-button-container').style.visibility = "hidden";
                document.getElementById('credit-button-container').style.display = "none"; 
                document.getElementById('datos').style.visibility = "hidden";
                document.getElementById('datos').style.display = "none"; 
                document.getElementById('corresponsal_secc').style.visibility = "visible";
                document.getElementById('corresponsal_secc').style.display = "block"; 
            }
        }
        const festivos = [[1, 6],[5, 24],[21],[],[5,10],[],[],[],[16],[],[1,2,15],[24,25,30]];
        const diaPedido = new Date(Date.now());
        var months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
        var days = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
        function calculaEntrega(diaPedido, diasPactados, festivos) 
        {
            if(diaPedido.getHours()>12)
            {
                horacorte = 1;
            }
            else
            {
                horacorte = 0;
            }
            let diaPropuesto = new Date(diaPedido.getFullYear(), diaPedido.getMonth(), diaPedido.getDate());
            let i = 1;
            while (diasPactados > 0 ) 
            {
                let festivo = false;
                diaPropuesto = new Date(diaPedido.getFullYear(), diaPedido.getMonth(), diaPedido.getDate() + i + horacorte);
                if (diaPropuesto.getDay() > 0 && diaPropuesto.getDay() < 6) 
                {
                    let m = diaPropuesto.getMonth();
                    let dia = diaPropuesto.getDate();
                    for (let d in festivos[m]) 
                    {
                        if (dia === festivos[m][d]) 
                        {
                            festivo = true;
                            break;
                        }
                    }
                    if (!festivo) 
                    {
                        diasPactados--;
                    }
                }
                i++;
            }
            return diaPropuesto;
        }
        function shipping(id_num,num_elemnt)
        {
            var children = document.getElementById("shipping_address_list").children;
            var element = num_elemnt;
            for (var i = 0; i < children.length; i++) 
            {
                if(i == num_elemnt)
                {
                    children[i].style.background = "#ebf3fe";
                }
                else{
                    children[i].style.background = "#fff";
                }
            }
            var pricetotalU = document.getElementById("totalpriceG").innerText;      
            if(id_num.checked == 1)
            {
                show_form_shipping();
            }
            else
            {
                document.getElementById('shipping_address_fields').style.visibility = "hidden";
                document.getElementById('shipping_address_fields').style.display = "none"; 
                document.getElementById('idparaconsulta').value = id_num;
                fillwithlist(id_num);
                
            }
        }
        function show_form_shipping()
        {
            document.getElementById('shipping_address_fields').style.visibility = "visible";
            document.getElementById('shipping_address_fields').style.display = "block"; 
            document.getElementById('litax').style.visibility = "hidden";
            document.getElementById('litax').style.display = "none";
        }
        function fillwithlist(id_num)
        {
            var pricetotalU = document.getElementById("totalpriceG").innerText;
            var tax = (parseFloat(pricetotalU)/100)*7;
            tax = tax.toFixed(2);
            var totalp = parseFloat(pricetotalU)+parseFloat(tax);

            var country = document.getElementById("ups_ul_country"+id_num).value;
            var Pcode = document.getElementById('ups_ul_postal'+id_num).value;
            if(document.getElementById('if_tax_state'))
                var state = document.getElementById('if_tax_state').value;
            if(country=="US")
            {
                SendupsUS(Pcode);
                document.getElementById('deliveryUS').style.visibility = "visible";
                document.getElementById('deliveryUS').style.display = "block"; 
                document.getElementById('administrative_area_level_1').style.visibility = "hidden";
                document.getElementById('administrative_area_level_1').style.display = "none"; 
                document.getElementById('deliveryW').style.visibility = "hidden";
                document.getElementById('deliveryW').style.display = "none";
                
                document.getElementById("normalUS").style.background = "#ebf3fe";
                if(state=="TX")
                {
                    document.getElementById('litax').style.visibility = "visible";
                    document.getElementById('litax').style.display = "block";
                    document.getElementById('taxesvalue').innerText ="$ "+tax;
                    totalp = totalp.toFixed(2);
                    document.getElementById('totalprice').innerText ="$ "+ totalp;
                }else
                    {
                        document.getElementById('totalprice').innerText ="$ "+ pricetotalU;
                    }
            }else
            {
                Sendups(Pcode);
                document.getElementById('administrative_area_level_1').style.visibility = "visible";
                document.getElementById('administrative_area_level_1').style.display = "block"; 
                document.getElementById('state_id').style.visibility = "hidden";
                document.getElementById('state_id').style.display = "none"; 
                document.getElementById('deliveryW').style.visibility = "visible";
                document.getElementById('deliveryW').style.display = "block";
                document.getElementById('deliveryUS').style.visibility = "hidden";
                document.getElementById('deliveryUS').style.display = "none";
                document.getElementById('litax').style.visibility = "hidden";
                document.getElementById('litax').style.display = "none";
                document.getElementById("normal").style.background = "#ebf3fe";
                document.getElementById('totalprice').innerText ="$ "+ pricetotalU;
            }
        }  
        function billingAddress()
        {
            var remember = document.getElementById('billing_address');
            if (remember.checked)
            {
                document.getElementById('billing_details').style.visibility = "hidden";
                document.getElementById('billing_details').style.display = "none"; 
                document.getElementById('billing_details').value = "1";
                var state = document.getElementById("administrative_area_level_1").value;
                var country = document.getElementById("country").value;
            } 
            else
            {
                document.getElementById('billing_details').style.visibility = "visible";
                document.getElementById('billing_details').style.display = "block"; 
                document.getElementById('billing_details').value = "0";
                document.getElementById('litax').style.visibility = "hidden";
                document.getElementById('litax').style.display = "none";
            }
        }
        function metodo_envio(num)
        {
            if (num==1)
            {
                document.getElementById("con_envio").style.background = "#ebf3fe";
                document.getElementById("sin_envio").style.background = "#fff";
                document.getElementById('div_op_envio').style.visibility = "visible";
                document.getElementById('div_op_envio').style.display = "block"; 
                document.getElementById('opcion_envio').value == "ETN"
            }
            if (num==2)
            {
                document.getElementById("con_envio").style.background = "#fff";
                document.getElementById("sin_envio").style.background = "#ebf3fe";
                document.getElementById('div_op_envio').style.visibility = "hidden";
                document.getElementById('div_op_envio').style.display = "none"; 
                document.getElementById('shipping_details').style.visibility = "hidden";
                document.getElementById('shipping_details').style.display = "none"; 
                var sel = document.getElementById('opcion_envio');
                var opts = sel.options;
                sel.selectedIndex = 0;
                var total_price = document.getElementById("totalpriceG").innerText; //price_shipping
                total_price = total_price.replace(/[$]/g,'');
                var price = 0;
                document.getElementById('lishipping').style.visibility = "hidden";
                document.getElementById('lishipping').style.display = "none";
                $("#totalprice").text("$ " + (parseFloat(total_price) + parseFloat(price)).toFixed(2));
            }
        }
        function seleccionar_opcion_envio()
        {
            document.getElementById('shipping_details').style.visibility = "visible";
            document.getElementById('shipping_details').style.display = "block"; 
            document.getElementById('lishipping').style.visibility = "visible";
            document.getElementById('lishipping').style.display = "block";
            var total_price = document.getElementById("totalpriceG").innerText; //price_shipping
                total_price = total_price.replace(/[$]/g,'');
            var price = 0;
            if(document.getElementById('opcion_envio').value == "Cerritenses")
                price = 100;
            if(document.getElementById('opcion_envio').value == "Estrella Blanca")
                price = 100;
            if(document.getElementById('opcion_envio').value == "ETN")
                price = 100;
            if(document.getElementById('opcion_envio').value == "Futura")
                price = 100;
            if(document.getElementById('opcion_envio').value == "Omnibus de México")
                price = 100;
            if(document.getElementById('opcion_envio').value == "Primera Plus")
                price = 100;
            $("#price_shipping").text("$ " + parseFloat(price).toFixed(2));
            $("#totalprice").text("$ " + (parseFloat(total_price) + parseFloat(price)).toFixed(2));
        }
        function validateContact() 
        {
            var valid = true;	
            $("#bill_country_id").removeClass("invalid");
            $("#billing_name").removeClass("invalid");
            $("#billing_company").removeClass("invalid");
            $("#billing_street_number").removeClass("invalid");
            $("#billing_locality").removeClass("invalid");
            $("#billing_postal_code").removeClass("invalid");
            $("#state_id_billing").removeClass("invalid");        
            if ($('#billing_details').is(':visible'))
            {
                if(!$("#bill_country_id").val()) {
                    $("#bill_country_id").addClass("invalid"); 
                    valid = false;
                }
                if(!$("#billing_name").val()) {
                    $("#billing_name").addClass("invalid"); 
                    valid = false;
                }
                if(!$("#billing_company").val()) {
                    $("#billing_company").addClass("invalid"); 
                    valid = false;
                }
                if(!$("#billing_street_number").val()) {
                    $("#billing_street_number").addClass("invalid");
                    valid = false;
                }
                if(!$("#billing_locality").val()) {
                    $("#billing_locality").addClass("invalid");
                    valid = false;
                }
                if(!$("#billing_postal_code").val()) {
                    $("#billing_postal_code").addClass("invalid"); 
                    valid = false;
                }
                if(!$("#state_id_billing").val()) {
                    $("#state_id_billing").addClass("invalid"); 
                    valid = false;
                }
            }
            if(valid==false)
                $("html, body").animate({ scrollTop: 0 }, 600);
            return valid;

        }
        function validateContact_bill() 
        {
            var valid = true;	
            $("#shipping_country_id").removeClass("invalid");
            $("#shipping_name").removeClass("invalid");
            $("#shipping_company").removeClass("invalid");
            $("#street_number").removeClass("invalid");
            $("#locality").removeClass("invalid");
            $("#postal_code").removeClass("invalid");
            $("#state_id").removeClass("invalid");        
            if ($('#shipping_address_fields').is(':visible'))
            {
                if(!$("#shipping_country_id").val()) {
                    $("#shipping_country_id").addClass("invalid"); 
                    valid = false;
                }
                if(!$("#shipping_name").val()) {
                    $("#shipping_name").addClass("invalid"); 
                    valid = false;
                }
                if(!$("#shipping_company").val()) {
                    $("#shipping_company").addClass("invalid"); 
                    valid = false;
                }
                if(!$("#street_number").val()) {
                    $("#street_number").addClass("invalid");
                    valid = false;
                }
                if(!$("#locality").val()) {
                    $("#locality").addClass("invalid");
                    valid = false;
                }
                if(!$("#postal_code").val()) {
                    $("#postal_code").addClass("invalid"); 
                    valid = false;
                }
                if(!$("#state_id").val()) {
                    $("#state_id").addClass("invalid"); 
                    valid = false;
                }
            }
            if(valid==false)
                $("html, body").animate({ scrollTop: 0 }, 600);
            return valid;

        }
        function facturacion(num)
        {            
            if (num == 2)
            {
                document.getElementById('facturar_no').checked= false;
                document.getElementById('facturar_si').checked= true;
                document.getElementById('dir_factura').style.visibility = "visible";
                document.getElementById('dir_factura').style.display = "block"; 
            } 
            else
            {
                document.getElementById('facturar_si').checked= false;
                document.getElementById('facturar_no').checked= true;
                document.getElementById('dir_factura').style.visibility = "hidden";
                document.getElementById('dir_factura').style.display = "none"; 
            }
        }
    </script>
</head>
<body data-spy="scroll" data-target="#navbar-example" class="estaciones">
    <?php 
        include "header.php";
    ?>
        <div class="paper container " style="padding-top: 0px;width: min-content;margin: auto;">
            <div class="wrapper_cut container">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <form class="alt-form" id="payment-form" method="post" action="processing.php" enctype="multipart/form-data">
                                <input type="hidden" id="usr_id" name="" value="<?php echo $id_user;?>">
                                <div>
                                    <?php
                                        if($_SESSION['email']=="ografix.info@gmail.com")
                                        {
                                    ?>
                                            <h4 style="padding-top: 15px;">Informacion del cliente</h4>
                                            <h2 style="font-weight: 900;font-size: 1.4rem;">Nombre del Cliente</h2>
                                            <div>
                                                <input class="field inputcheckout" style="left: 2%;margin-right: 15px;display: inline-block;position: relative;border: 1px solid #c8c8c8;" value=""  name="nombre_cliente" type="text">
                                            </div>
                                            <h2 style="font-weight: 900;font-size: 1.4rem;">Correo</h2>
                                            <div>
                                                <input class="field inputcheckout" style="left: 2%;margin-right: 15px;display: inline-block;position: relative;border: 1px solid #c8c8c8;" value=""  name="correo_cliente" type="text">
                                            </div>
                                            <h2 style="font-weight: 900;font-size: 1.4rem;">Telefono</h2>
                                            <div>
                                                <input class="field inputcheckout" style="left: 2%;margin-right: 15px;display: inline-block;position: relative;border: 1px solid #c8c8c8;" value=""  name="telefono_cliente" type="text">
                                            </div>
                                    <?php
                                        }
                                    ?>
                                    <h4 style="padding-top: 15px;">Informacion de envío</h4>
                                    <label style="width: 100%;padding-bottom: 10px;font-weight: normal;">
                                        Ordenes foráneas serán enviadas al día siguiente del día marcado como fecha de entrega aproximada
                                    </label>
                                    <h2 style="font-weight: 900;font-size: 1.4rem;">Metodo de envio</h2>
                                    <div id="meotodo_envio" style="">
                                        <ul class="input-group mb-20" style="padding: 0;width: 100%;">
                                            <li class="clear selected" style="padding: 10px 0 10px 0;width: 100%;" id="con_envio">
                                                <input class="input-radio" style="left: 2%;margin-right: 15px;display: inline-block;position: relative;" value="con"  name="envio" type="radio" onclick="metodo_envio(1)">
                                                <label>
                                                    <span class="title">
                                                        Seleccionar envío
                                                    </span>
                                                </label>
                                            </li>
                                            <li class="clear  selected" style="padding: 10px 0 10px 0;width: 100%;background:#ebf3fe;" id="sin_envio">
                                                <input class="input-radio" id="sinenvio" style="left: 2%;top: 0px;margin-right: 15px;display: inline-block;position: relative;" value="sin"  name="envio" type="radio" checked="" onclick="metodo_envio(2)">
                                                <label>
                                                    <span class="title"  >
                                                        Sin envío
                                                    </span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div id="div_op_envio" style="visibility:hidden;display:none;">
                                        <label style="width: 100%;padding-bottom: 10px;font-weight: normal;">
                                            Medio de transporte
                                        </label>
                                        <select id="opcion_envio" value="opcion_envio"  type="select" class="inputcheckout field" onchange="seleccionar_opcion_envio()">
                                            <option value=""></option>
                                            <option value="Cerritenses">Autobuses Cerritenses</option>
                                            <option value="Estrella Blanca">Estrella Blanca</option>
                                            <option value="ETN">ETN</option>
                                            <option value="Futura">Futura</option>
                                            <option value="Omnibus de México">Omnibus de México</option>
                                            <option value="Primera Plus">Primera Plus</option>         
                                        </select>
                                    </div>
                                    
                                    <div class="field-group clear" id="shipping_details" style="visibility:hidden;display:none;">
                                        <label style="width: 100%;padding-bottom: 10px;font-weight: normal;">
                                            Direccion de envío
                                        </label>
                                        <?php
                                            include 'php/conexion.php';
                                            

                                            $query    = "SELECT * FROM address_t WHERE id_user='$id_user'";
                                            $result = mysqli_query($conexion,$query);
                                            $default_id=-1;
                                            if(mysqli_num_rows($result)>0)
                                            {
                                                ?>
                                                <ul class="input-group mb-20" id="shipping_address_list" style="padding: 0;width: 100%;">
                                                    <?php
                                                    $cont=0;
                                                    while ($extraido= mysqli_fetch_array($result))
                                                    {
                                                        //id	id_user	country	full_name	company	street_address1	street_address2	city	zip_code	statedir
                                                        $id             = $extraido['id'];
                                                        //$id_user        = $extraido['id_user'];
                                                        $country        = $extraido['country'];
                                                        $full_name      = $extraido['full_name'];
                                                        $company        = $extraido['company'];
                                                        $street_address1= $extraido['street_address1'];
                                                        $street_address2= $extraido['street_address2'];
                                                        $city           = $extraido['city'];
                                                        $statedir       = $extraido['statedir'];
                                                        $zip_code       = $extraido['zip_code'];
                                                        $default_address= $extraido['default_address'];
                                                        ?>
                                                                <?php
                                                                if($default_address==1)
                                                                {
                                                                    $default_id=$id;
                                                                ?>
                                                                    <li class="clear selected" id="shipping_address_id<?php echo $id;?>" style="padding: 10px 0 10px 0;width: 100%;background:#ebf3fe">
                                                                        <input class="input-radio"  style="left: 2%;top: 25px;margin-right: 15px;display: inline-block;position: relative;" id="shipping_id" name="shipping_id" type="radio" value="<?php echo $id;?>" checked="" onclick="shipping(<?php echo $id;?>,<?php echo $cont;?>)">
                                                                <?php
                                                                }
                                                                else{
                                                                    ?>
                                                                    <li class="clear  selected" id="shipping_address_id<?php echo $id;?>" style="padding: 10px 0 10px 0;width: 100%;">
                                                                        <input class="input-radio"  style="left: 2%;top: 25px;margin-right: 15px;display: inline-block;position: relative;" id="shipping_id" name="shipping_id" type="radio" value="<?php echo $id;?>" onclick="shipping(<?php echo $id;?>,<?php echo $cont;?>)">
                                                                <?php
                                                                }
                                                                ?>
                                                                    
                                                                    <label style="width: 90%;">
                                                                        <span class="title" ><?php echo $full_name;?></span>
                                                                        <input type="radio" style="visibility:hidden;display:none;" value="<?php echo $id;?>" id="click_<?php echo $id;?>" onclick="shipping(<?php echo $id;?>,<?php echo $cont;?>)">
                                                                        <input type="text" style="visibility:hidden;display:none;" value="<?php echo $street_address1." ".$street_address2;?>" id="ups_ul_dir<?php echo $id;?>">
                                                                        <input type="text" style="visibility:hidden;display:none;" value="<?php echo $city;?>" id="ups_ul_city<?php echo $id;?>">
                                                                        <input type="text" style="visibility:hidden;display:none;" value="<?php echo $zip_code;?>" id="ups_ul_postal<?php echo $id;?>">
                                                                        <input type="text" style="visibility:hidden;display:none;" value="<?php echo $country;?>" id="ups_ul_country<?php echo $id;?>">
                                                                        <input type="text" style="visibility:hidden;display:none;" value="<?php echo $statedir;?>" id="ups_ul_state<?php echo $id;?>">
                                                                        <span class="push-left price"  id=""><?php echo $street_address1." ".$street_address2;?></span>
                                                                        <span class="push-left price"  id="" style="width: 100%;"><?php echo $city.", ".$statedir." ".$zip_code;?></span>
                                                                        <?php
                                                                        if($country=="US")
                                                                        {
                                                                        ?>
                                                                            <span class="push-left price"  id="">United States</span>
                                                                        <?php
                                                                        }
                                                                        if($country=="MX")
                                                                        {
                                                                        ?>
                                                                            <span class="push-left price"  id="">Mexico</span>
                                                                        <?php
                                                                        }
                                                                        if($country!="MX" && $country!="US")
                                                                        {
                                                                            ?>
                                                                            <span class="push-left price"  id=""><?php echo $country;?></span>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </label>
                                                                </li>
                                                                <?php
                                                                
                                                        $cont++;
                                                    }
                                                    ?>
                                                    <li class="clear  selected" id="shipping_address_id<?php echo $id;?>"style="padding: 10px 0 10px 0;width: 100%;">
                                                        <input class="input-radio" style="left: 2%;top: 0px;margin-right: 15px;display: inline-block;position: relative;" id="shipping_id" name="shipping_id" type="radio" value="-10" onclick="shipping(this,<?php echo $cont;?>)">
                                                        <label style="width: 90%;">
                                                            <!--<strong class="title" id="standard_priceUS_days"><?php // echo $full_name;?></strong>-->
                                                            <span class="title"  >Enviar a otra dirección</span>
                                                        </label>
                                                    </li>
                                                </ul>
                                                <?php
                                                    $query_bill    = "SELECT * FROM billing_address WHERE id_user='$id_user' AND default_address='1'";
                                                    $result_bill = mysqli_query($conexion,$query_bill);
                                                    if(mysqli_num_rows($result_bill)>0)
                                                    {
                                                        $extraido_bill  = mysqli_fetch_array($result_bill);
                                                        $country        = $extraido_bill['country'];
                                                        $statedir      = $extraido_bill['statedir'];
                                                        ?>
                                                            <input style="visibility:hidden;display:none;" id="if_tax">
                                                            <input style="visibility:hidden;display:none;" id="if_tax_country" value="<?php echo $country;?>">
                                                            <input style="visibility:hidden;display:none;" id="if_tax_state" value="<?php echo $statedir;?>">
                                                        <?php
                                                    }
                                                ?>
                                                <?php
                                            }
                                        ?>
                                        <div class="mt-15" id="shipping_address_fields" style="visibility:hidden;display:none;">
                                            <div class="field select ">
                                                <span  style="display: inline-block;">
                                                    <label for="message" class="fontnormal" style="font-weight: bold;">Pais</label>
                                                </span>
                                                <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400;color:red;">*</small>
                                                <div style="width: 100%;" aria-live="assertive" class="inputWrapper " role="alert">
                                                    <input class="inputcheckout"id="country"style="display:none;" />
                                                    <select autocomplete="country" id="shipping_country_id" label="Country" name="country_id" type="select" class="" onchange="Update_state_address()">
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
                                            <div class="field text ">
                                                <span  style="display: inline-block;">
                                                    <label for="message" class="fontnormal" style="font-weight: bold;">Nombre completo</label>
                                                </span>
                                                <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400;color:red;">*</small>
                                                <div aria-live="assertive" class="inputWrapper inputcheckout" role="alert">
                                                    <input style="border: 1px solid #c8c8c8;" autocomplete="name" autocorrect="off" id="shipping_name" label="Full name" name="name" type="text" class="inputcheckout" value="" aria-invalid="true">
                                                </div>
                                            </div>
                                            <?php
                                            if(!isset( $_SESSION['email']))
                                            {
                                            ?>
                                            <div class="field text ">
                                                <span  style="display: inline-block;">
                                                    <label for="message" class="fontnormal" style="font-weight: bold;">Correo</label>
                                                </span>
                                                <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400;color:red;">*</small>
                                            
                                                <div aria-live="assertive" class="inputWrapper inputcheckout" role="alert">
                                                    <input style="border: 1px solid #c8c8c8;" autocomplete="name" autocorrect="off" id="input_email" label="Full name" name="email" type="email" class="inputcheckout" value="" aria-invalid="true">
                                                </div>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                                
                                            <input id="taxes"style="display:none;" name="taxes"/>
                                            <input id="shipping_price" style="display:none;" name="shipping_price"/>
                                            <input id="delivery"style="display:none;" name="deliverytime"/>
                                            <div class="field text ">
                                                <span  style="display: inline-block;">
                                                    <label for="message" class="fontnormal" style="font-weight: bold;">Compañia</label>
                                                </span>
                                                <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400;color:red;">*</small>
                                            
                                                <div aria-live="assertive" class="inputWrapper inputcheckout" role="alert">
                                                    <input style="border: 1px solid #c8c8c8;" autocomplete="company"  autocorrect="off" id="shipping_company" label="Company" name="company" type="text" class="inputcheckout" value="" aria-invalid="true">
                                                </div>
                                            </div>
                                            <div class="field group-input-wrappers text">
                                                <span  style="display: inline-block;">
                                                    <label for="message" class="fontnormal" style="font-weight: bold;">Direccion</label>
                                                </span>
                                                <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400;color:red;">*</small>
                                            
                                                <div aria-live="assertive" class="inputWrapper inputcheckout" role="alert">
                                                    <input style="border: 1px solid #c8c8c8;"  aria-label="Street address 1" onFocus="" autocomplete="off" autocorrect="off" id="street_number" name="address1" placeholder="" type="text" class="inputcheckout pac-target-input" value="" aria-invalid="true">
                                                </div>
                                                <div aria-live="assertive" class="inputWrapper inputcheckout" role="alert">
                                                    <input style="border: 1px solid #c8c8c8;"  aria-label="Street address 2" autocomplete="off" autocorrect="off" id="route" name="address2" type="text" class="inputcheckout" value="">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding: 0px !important;display: flex;">
                                                <div class="field text col-lg-6 col-md-6 col-sm-12 col-xs-12" style="display: inline-block;position: relative;padding: 0px 5px 0px 0px;">
                                                    <span  style="display: inline-block;">
                                                        <label for="message" class="fontnormal" style="font-weight: bold;">Ciudad</label>
                                                    </span>
                                                    <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400;color:red;">*</small>
                                            
                                                    <div aria-live="assertive" class="inputWrapper inputcheckout" style="display: inline-block;" role="alert">
                                                        <input style="border: 1px solid #c8c8c8;"  id="locality" label="City"type="text" class="inputcheckout field" name="locality">
                                                    </div>
                                                </div>
                                                <div class="field tel col-lg-6 col-md-6 col-sm-12 col-xs-12" style="display: inline-block;padding: 0;">
                                                    <span  style="display: inline-block;">
                                                        <label for="message" class="fontnormal" style="font-weight: bold;">Codigo postal</label>
                                                    </span>
                                                    <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400;color:red;">*</small>
                                            
                                                    <div aria-live="assertive" class="inputWrapper inputcheckout" style="width:100%;display: inline-block;" role="alert">
                                                        <input  style="border: 1px solid #c8c8c8;" class="inputcheckout field" id="postal_code" label="ZIP code" type="tel" name="zipcode" onchange="rellena()">
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="field select half right">
                                                    <span  style="display: inline-block;">
                                                        <label for="message" class="fontnormal" style="font-weight: bold;">Estado</label>
                                                    </span>
                                                    <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400;color:red;">*</small>
                                            
                                                    <div aria-live="assertive" style="width:100%;"class="inputWrapper " role="alert">
                                                        <!--<input style="visibility:hidden;display:none;border: 1px solid #c8c8c8;" class="field" name="state" style="" id="administrative_area_level_1" onchange="rellena()"/>-->
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
                                            </div>
                                        </div>
                                        <div class="modal-container" id="address-picker-modal" tabindex="-1">
                                            <div aria-label="Modal" aria-modal="true" class="modal-content-wrapper" role="dialog">
                                                <div class="modal-content">
                                                    <h2>Saved shipping addresses</h2>
                                                    <ul class="address-items"></ul>
                                                    <button class="modal-close-x" type="button">×</button>
                                                </div>
                                                <div class="modal-bg-close" role="presentation"></div>
                                            </div>
                                            <div class="modal-bg-close" role="presentation"></div>
                                        </div>
                                    </div>
                                    <?php
                                        if(mysqli_num_rows($result)==0)
                                        {
                                            ?>
                                            <script language="javascript">
                                    
                                                document.getElementById("shipping_address_fields").style.visibility = "visible";
                                                document.getElementById("shipping_address_fields").style.display = "block";
                                            </script>
                                            <?
                                        }
                                    ?>
                                    <?php
                                    if(!isset( $_SESSION['email']))
                                    {
                                    ?>
                                        <div class="field-group clear" id="delivery_details">
                                            <h2 style="font-weight: 900;font-size: 1.4rem;">Informacion de contacto</h2>
                                            <div class="field text ">
                                                <span  style="display: inline-block;">
                                                    <label for="message" class="fontnormal" style="font-weight: bold;">Ingresa tu correo</label>
                                                </span>
                                                <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400;color:red;">*</small>
                                                <div aria-live="assertive" class="inputWrapper inputcheckout" role="alert">
                                                    <input style="border: 1px solid #c8c8c8;" autocomplete="name" autocorrect="off" id="input_email_alone" label="Full name" name="email" type="email" class="inputcheckout" value="" aria-invalid="true">
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <div class="field-group clear" id="delivery_details"><div>
                                        <h2 style="font-weight: 900;font-size: 1.4rem;">Fecha de entrega</h2>
                                        <div>
                                            <!--<p class="font-light" style="font-size: 14px;">Delivery dates assume approval within 24 hours</p>-->
                                            <label style="width: 100%;padding-bottom: 10px;font-weight: normal;">
                                                Tiempo de entrega aproximados si el archivo es correcto. <br>
                                                No se procesarán ordenes incompletas (Falta de archivos y/o pago).
                                            </label>
                                        </div>
                                        <div id="deliveryUS" style="">
                                            <ul class="input-group mb-20" id="payment-method-selector" style="padding: 0;width: 100%;">
                                                <li class="clear " id="fastUS" style="padding: 10px 10px 10px 9px;width: 100%;">
                                                    <label style="width: 90%;">
                                                        <label class="title" id="plus_priceUS_days" style="font-size: 14px;   margin-bottom: 0px;font-weight: bold !important;color: red !important;font-family: 'Medium' !important;font-weight: 100 !important;"></label>
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                        
                                </div>
                                <div class="clear" style="display: none;visibility: hidden;">
                                    <div class="field checkbox ">
                                        Facturar
                                        <div class="field checkbox" style="display: flex;">
                                            <label style="width: 50%;display: inline-block;">
                                                <div aria-live="assertive" class="inputWrapper " role="alert" style="width: 5%;">
                                                    <input label="Billing address same as shipping" name="facturar" id="facturar_no" type="checkbox" class="" value="0" checked="" onclick="facturacion(1)">
                                                </div>
                                                No
                                            </label>
                                            <label style="width: 50%;display: inline-block;">
                                                <div aria-live="assertive" class="inputWrapper " role="alert" style="width: 5%;">
                                                    <input label="Billing address same as shipping" name="facturar" id="facturar_si" type="checkbox" class="" value="1" onclick="facturacion(2)">
                                                </div>
                                                Si
                                            </label>
                                        </div>
                                        <label id="dir_factura" style="width: 100%;visibility:hidden;display:none;">
                                            <div aria-live="assertive" class="inputWrapper " role="alert" style="width: 5%;">
                                                <input label="Billing address same as shipping" name="billing_address" id="billing_address" type="checkbox" class="" value="" checked="" onclick="billingAddress()">
                                            </div>
                                            Usar la misma direccion para facturación
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <div class="field-group clear" id="billing_details" style="visibility:hidden;display:none;">
                                        <div class="mt-15" id="shipping_address_fields">
                                            <div class="field select ">
                                                <span  style="display: inline-block;">
                                                    <label for="message" class="fontnormal" style="font-weight: bold;">Pais</label>
                                                </span>
                                                <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400;color:red;">*</small>
                                            
                                                    <div style="width: 100%;" aria-live="assertive" class="inputWrapper " role="alert">
                                                        <input class="inputcheckout"id="country"style="display:none;"/>
                                                        <select autocomplete="country" id="bill_country_id" label="Country" name="country_id_billing" type="select" class="" onchange="update_state_bill()">
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
                                                <div class="field text ">
                                                    <span  style="display: inline-block;">
                                                        <label for="message" class="fontnormal" style="font-weight: bold;">Nombre completo</label>
                                                    </span>
                                                    <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400;color:red;">*</small>
                                                
                                                    <div aria-live="assertive" class="inputWrapper inputcheckout" role="alert">
                                                        <input style="border: 1px solid #c8c8c8;" autocomplete="name" autocorrect="off" id="billing_name" label="Full name" name="name_billing" type="text" class="inputcheckout" value="" aria-invalid="true">
                                                    </div>
                                                </div>
                                                <div class="field text ">
                                                    <span  style="display: inline-block;">
                                                        <label for="message" class="fontnormal" style="font-weight: bold;">Compañia</label>
                                                    </span>
                                                    <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400;color:red;">*</small>
                                                
                                                    <div aria-live="assertive" class="inputWrapper inputcheckout" role="alert">
                                                        <input style="border: 1px solid #c8c8c8;" autocomplete="company" autocorrect="off" id="billing_company" label="Company" name="company_billing" type="text" class="inputcheckout" value="">
                                                    </div>
                                                </div>
                                                <div class="field group-input-wrappers text">
                                                    <span  style="display: inline-block;">
                                                        <label for="message" class="fontnormal" style="font-weight: bold;">Direccion</label>
                                                    </span>
                                                    <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400;color:red;">*</small>
                                                
                                                
                                                    <div aria-live="assertive" class="inputWrapper inputcheckout" role="alert">
                                                        <input style="border: 1px solid #c8c8c8;" aria-label="Street address 1" onFocus="" autocomplete="off" autocorrect="off" id="billing_street_number" name="address1_billing" placeholder="" type="text" class="inputcheckout pac-target-input" value="" aria-invalid="true">
                                                    </div>
                                                    <div aria-live="assertive" class="inputWrapper inputcheckout" role="alert">
                                                        <input style="border: 1px solid #c8c8c8;" aria-label="Street address 2" autocomplete="off" autocorrect="off" id="billing_route" name="address2_billing" type="text" class="inputcheckout" value="">
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="field text " style="display: inline-block;width: 50%;position: relative;">
                                                        <span  style="display: inline-block;">
                                                            <label for="message" class="fontnormal" style="font-weight: bold;">Ciudad</label>
                                                        </span>
                                                        <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400;color:red;">*</small>
                                                    
                                                        <div aria-live="assertive" class="inputWrapper inputcheckout" style="width:90%;display: inline-block;" role="alert">
                                                            <input style="border: 1px solid #c8c8c8;" id="billing_locality" label="City"type="text" class="inputcheckout field" name="locality_billing">
                                                        </div>
                                                    </div>
                                                    <div class="field tel half" style="display: inline-block;width: 50%;position: absolute;">
                                                        <span  style="display: inline-block;">
                                                            <label for="message" class="fontnormal" style="font-weight: bold;">Codigo postal</label>
                                                        </span>
                                                        <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400;color:red;">*</small>
                                                    
                                                        <div aria-live="assertive" class="inputWrapper inputcheckout" style="width:100%;display: inline-block;" role="alert">
                                                            <input style="border: 1px solid #c8c8c8;"  id="billing_postal_code" label="ZIP code" type="tel" class="inputcheckout field" name="zipcode_billing">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="field select half right">
                                                        <span  style="display: inline-block;">
                                                            <label for="message" class="fontnormal" style="font-weight: bold;">Estado</label>
                                                        </span>
                                                        <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400;color:red;">*</small>
                                                    
                                                        <div aria-live="assertive" style="width:100%;"class="inputWrapper " role="alert">
                                                            <input  style="border: 1px solid #c8c8c8;visibility:hidden;display:none;" class="field inputcheckout" style="" name="state_billing" id="administrative_area_level_1_bill"/>
                                                            <select style="visibility:visible;display:block;" autocomplete="address-level1" id="state_id_billing" label="State" name="" type="select" class="inputcheckout field" onchange="state_billing_not_same()">
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="field-group clear" id="Discount" style="margin-top: 30px;">
                                    <h2 style="font-weight: 900;font-size: 1.4rem;">Codigo de descuento</h2>
                                    <div id="error_descuento" style="visibility:hidden;display:none;">
                                        <ul class="input-group mb-20" style="padding: 0;width: 100%;background: #ffd5ce;">
                                            <li class="clear" style="padding: 10px 10px 10px 9px;width: 100%;">
                                                <label style="width: 90%;">
                                                    <label class="title" id="error_pay_message" style="font-size: 14px;margin-bottom: 0px;font-weight: bold !important;color: red !important;font-family: 'Medium' !important;font-weight: 100 !important;">El código de descuento que intentas aplicar ya no es valido o ya caduco</label>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div aria-live="assertive" class="inputWrapper inputcheckout" style="width:100%;display: inline-block;" role="alert">
                                        <input  style="border: 1px solid #c8c8c8;display: inline-block;width: 49%;" id="discount_code" class="inputcheckout field" name="discount_code" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                        <input type="button" class="cutomB" style="width: 49%;display: inline-block;margin: auto;padding: 10px 4px !important;" id="button_apply" onclick="save_discount()" value="Agregar">
                                    </div>
                                </div>
                                <div class="field-group last clear" id="payment_billing_details" > 
                                    <h2 style="font-weight: 900;font-size: 1.4rem;">Pago</h2>
                                    <div id="error_pago" style="visibility:hidden;display:none;">
                                        <ul class="input-group mb-20" style="padding: 0;width: 100%;background: #ffd5ce;">
                                            <li class="clear" style="padding: 10px 10px 10px 9px;width: 100%;">
                                                <label style="width: 90%;">
                                                    <label class="title" id="error_pay_message" style="font-size: 14px;margin-bottom: 0px;font-weight: bold !important;color: red !important;font-family: 'Medium' !important;font-weight: 100 !important;"></label>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <ul class="input-group mb-20" id="payment-method-selector" style="padding: 0;width: 100%;display: block;">
                                        <li id="licredit" class="none"  style="width: 100%;height: 61px;">
                                            <input  class="input-radio" id="credit"style="left: 2%;top: 23%;width: auto;margin-right: 7px;display: inline-block;position: relative;" name="paymentMethod" type="radio" value="" onclick="billing(2)">
                                            <label style="top: 20%;display: inline-block;position: relative;width: 200px;padding-left: 10px;" class="title payment-new"><strong class="font-medium" style="font-size: 1.4rem;">Tarjeta de credito / debito</strong></label>
                                            <img src="img/Paycredit.png" alt="credit" style="width: 40%;display: inline-block;position: relative;float: right;padding: 19px 0 19px 0;">
                                        </li>
                                        <li id="spei" class="none"  style="width: 100%;height: 61px;display: inline-block;">
                                            <input  class="input-radio" id="spei_input"style="left: 2%;top: 23%;width: auto;margin-right: 7px;display: inline-block;position: relative;" name="paymentMethod" type="radio" value="" onclick="billing(3)">
                                            <label style="top: 20%;display: inline-block;position: relative;width: 280px;padding-left: 10px;" class="title payment-new"><strong class="font-medium" style="font-size: 1.4rem;">Transferencia electronica (SPEI)</strong></label>
                                        </li>
                                        <li id="corresponsal" class="none"  style="width: 100%;height: 71px;display: inline-block;">
                                            <input  class="input-radio" id="corresponsal_input"style="left: 2%;top: 23%;width: auto;margin-right: 7px;display: inline-block;position: relative;" name="paymentMethod" type="radio" value="" onclick="billing(4)">
                                            <label style="top: 20%;display: inline-block;position: relative;width: 270px;padding-left: 10px;" class="title payment-new"><strong class="font-medium" style="font-size: 1.4rem;">Pago por corresponsal o ventanilla</strong></label>
                                            <img src="img/corresponsal.png" alt="credit" style="width: 40%;display: inline-block;position: relative;float: right;padding: 19px 0 19px 0;">
                                        </li>
                                        <li id="lipay" class="none" style="width: 100%;height: 61px;">
                                            <input class="input-radio" id="pay"style="left: 2%;top: 23%;width: auto;margin-right: 7px;display: inline-block;position: relative;"   name="paymentMethod" value="paypal" type="radio" onclick="billing(1)">
                                            <label style="top: 20%;display: inline-block;position: relative;width: 200px;padding-left: 10px;" class="title payment-paypal"><strong class="font-medium" style="font-size: 1.4rem;">PayPal</strong></label>
                                            <img src="img/paypal.png" alt="credit" style="width: 12%;display: inline-block;position: relative;float: right;padding: 19px 1px 19px 0;">
                                        </li>
                                    </ul>
                                </div>
                                <div id="paypal-button-container" style="visibility:hidden;display:none;"></div>
                                <!--<div id="credit-button-container" style="visibility:hidden;display:none;"></div>-->
                                
                                <?php
                                //privada key_shUYg3ZZr5wxdpD1fs9kqA 
                                //publica key_CphnWhrFkgdtLGVeixFT2zQ
                                ?>
                                <div id="datos" style="visibility:hidden;display:none;text-align: center;">
                                    <h2 style="font-weight: 900;font-size: 1.4rem;">Datos Bancarios</h2>
                                    <div>
                                        <h2 style="font-weight: 900;font-size: 1.4rem;">Banorte</h2>
                                        <div>
                                            <strong class="font-medium" style="font-size: 1.4rem;">No. Tarjeta:</strong>
                                            <label style="width: 100%;padding-bottom: 10px;font-weight: normal;">
                                                4915 6630 5929 1113
                                            </label>
                                        </div>
                                        <div>
                                            <strong class="font-medium" style="font-size: 1.4rem;">No. Cuenta:</strong>
                                            <label style="width: 100%;padding-bottom: 10px;font-weight: normal;">
                                                0444136589
                                            </label>
                                        </div>
                                        <div>
                                            <strong class="font-medium" style="font-size: 1.4rem;">No. Tarjeta:</strong>
                                            <label style="width: 100%;padding-bottom: 10px;font-weight: normal;">
                                                Clabe:
                                                072 700 004441365890
                                            </label>
                                        </div>
                                    </div>
                                    <input type="text" style="border: 1px solid #c8c8c8;"  class="field inputcheckout" style="" name="no_referencia" id="id_no_referencia" placeholder="No. de referencia bancaria">
                                    <label style="width: 100%;padding-bottom: 10px;font-weight: normal;">Si vas a realizar la transferencia mas tarde da click en el boton continuar</label>
                                    <input class="stripe-button button large blue" 
                                           onclick="SPEI()" id="pay-button" 
                                           type="button"
                                           value="Continuar"
                                           style="width: 100%;border-radius: 4px;color: #fff;font-size: 22px;height: 45px;background: #0070ba;">
                                    
                                </div>
                                <div id="corresponsal_secc" style="visibility:hidden;display:none;text-align: center;">
                                    <h2 style="font-weight: 900;font-size: 1.4rem;">Datos Bancarios</h2>
                                    <div>
                                        <h2 style="font-weight: 900;font-size: 1.4rem;">Banorte</h2>
                                        <div>
                                            <strong class="font-medium" style="font-size: 1.4rem;">No. Tarjeta:</strong>
                                            <label style="width: 100%;padding-bottom: 10px;font-weight: normal;">
                                                4915 6630 5929 1113
                                            </label>
                                        </div>
                                        <div>
                                            <strong class="font-medium" style="font-size: 1.4rem;">No. Cuenta:</strong>
                                            <label style="width: 100%;padding-bottom: 10px;font-weight: normal;">
                                                0444136589
                                            </label>
                                        </div>
                                        <div>
                                            <strong class="font-medium" style="font-size: 1.4rem;">No. Tarjeta:</strong>
                                            <label style="width: 100%;padding-bottom: 10px;font-weight: normal;">
                                                Clabe:
                                                072 700 004441365890
                                            </label>
                                        </div>
                                    </div>
                                    <div id="drag-and-drop-zone" class="dm-uploader p-5" style="padding-top: 50px;">
                                        <div class="input" id="formdrop">
                                            <div class=" ">
                                                <span class="  colorb" style="display: inline-block;">
                                                    <label for="message" class="fontnormal  " style="font-weight: bold;">Comprobante de pago</label>
                                                </span>
                                                <small style="margin: 0 0 0 5px;font-style: italic; display: inline-block;font-weight: 400; color:red; ">*</small>
                                                <div class="tooltipWrapper">
                                                    <div class="field" style="display: inline-block;width: 100%;">
                                                        <label class="input-group-btn" style="padding-right: 20px;padding-bottom: 0px;display: inline-block;width: 35%;">
                                                            <input type="hidden" name="size" value="1000000" class="fontlight">
                                                            <input type="hidden" name="ticket" value="13" class="fontlight" id="ticket_input">
                                                            <span class="btn btn-primary btn-file" style="height: 40px;font-size: 14px !important;color: white !important;">
                                                                Seleccionar comprobante<input accept="image/jpeg,application/pdf" class="inputfile" type="file" multiple="multiple"
                                                                name="attachment" id="Imagen" onchange="document.getElementById('file-name').value = this.files[0].name">
                                                            </span>
                                                        </label>
                                                        <input class="form-control-file-choose" placeholder="" name="file-name" id="file-name" style="height: 40px;border: 1px solid #c8c8c8;float: right;width: 65%;padding-left: 60px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress" id="pbar" style="visibility:hidden;">
                                        <div id="progress-bar" class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                                    </div>
                                    <label style="width: 100%;padding-bottom: 10px;font-weight: normal;">Si vas a realizar la transferencia mas tarde da click en el boton continuar</label>
                                    <!--<button id="submit_corresponsal" class="stripe-button button large blue" onclick="sendticket()">Continuar</button>-->
                                    <input class="stripe-button button large blue" 
                                           onclick="sendticket()" id="submit_corresponsal" 
                                           type="button"
                                           value="Continuar"
                                           style="width: 100%;border-radius: 4px;color: #fff;font-size: 22px;height: 45px;background: #0070ba;">
                                </div>
                                <div class="form-buttons" style="display:none">
                                    <button class="stripe-button button large blue" id="pay-button" style="width: 100%;background-color:#5ea0dc;">Place your order</button>
                                </div>
                                <input class="inputcheckout field" id="ckta_phone" type="hidden" value="<?php echo "+".$_SESSION['code'].$_SESSION['phone'];?>">
                                <input class="inputcheckout field" id="ckta_email" type="hidden" value="<?php echo $_SESSION['email'];?>">
                                <input class="inputcheckout field" id="ckta_name"  type="hidden" value="<?php echo $_SESSION['usrname'];?>">
                            </form>
                                <div id="credit-button-container" style="visibility:hidden;display:none;">
                                    <form action="conekta/cobro.php" method="POST" id="card-form">
                                        <span id="card_err" class="card-errors " style="width: 100%;display: block;color: red !important;"></span>
                                        <div>
                                            <label>
                                                <label for="message" class="fontnormal" style="font-weight: bold;">Nombre</label>
                                            </label>
                                            <input style="border: 1px solid #c8c8c8;width: 100%;" class="inputcheckout field"  size="20" data-conekta="card[name]" id="name_conekta" type="text"  autocomplete="off">
                                        </div>
                                        <div>
                                            <label>
                                                <label for="message" class="fontnormal" style="font-weight: bold;">Número de tarjeta</label>
                                            </label>
                                            <input style="border: 1px solid #c8c8c8;width: 100%;" class="inputcheckout field"  size="20" data-conekta="card[number]" id="number_conekta" type="text"  autocomplete="off">
                                        </div>
                                        <div>
                                            <label for="message" class="fontnormal col-md-8" style="font-weight: bold;padding: 0;">Fecha de expiración (MM/AA)</label>
                                            <label for="message" class="fontnormal col-md-4" style="font-weight: bold;padding: 0;">CVC</label>
                                            <div class="col-md-8" style="padding: 0;">
                                                <div style="display: inline-block;width: 100%;">
                                                    <input style="border: 1px solid #c8c8c8;width: 40%;display: inline-block;" class="inputcheckout field" size="2" id="card_month_conekta" data-conekta="card[exp_month]" type="text"  autocomplete="off">
                                                    <span>/</span>
                                                    <input style="border: 1px solid #c8c8c8;width: 40%;display: inline-block;" class="inputcheckout field" size="2" id="card_year_conekta" data-conekta="card[exp_year]" type="text"  autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-4" style="padding: 0;">
                                                <input style="border: 1px solid #c8c8c8;-webkit-text-security: disc;" class="inputcheckout field key"  size="4" data-conekta="card[cvc]" type="text" id="card_cvc_conekta" autocomplete="off">
                                            </div>
                                        </div>
                                        <button class="stripe-button button large blue" type="submit" style="width: 100%;border-radius: 4px;color: #fff;font-size: 22px;height: 45px;background: #0070ba;" id="pago_conekta">Pagar</button>
                                        <div class="button large secondary block" style="width: 100% !important;cursor:pointer; cursor: hand;text-align: center;visibility: hidden;display: none;" onclick="volveraintentar()" id="volveraintentar" type="button">Volver a intentar</div>
                                    </form>
                                </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12" style="display: inline;position: fixed;">
                            <div style="position: sticky;">
                                <div class="summary-box" id="checkout-summary" style="position: relative;">
                                    <div id="checkout-summary-header" style="display: inline-block;">
                                        <input type="text" id="idparaconsulta" name="idparaconsulta" value="" style="visibility:hidden;display:none;">
                                        <h4 style="display: inline-block;padding-top: 20px;">Resumen del pedido</h4>
                                        <img style="position: relative;right: 0px;width: 80px;height: 40px;bottom: 14px;display: inline-block;top: auto;" alt="Secured by Comodo SSL." id="ssl-secured" name="seal" src="https://ssl.comodo.com/images/trusted-site-seal.png">
                                    </div>
                                    <ul id="checkout-summary-line-items" style="padding-left: 0px;">
                                        <?php
                                            $price = 0;
                                            $count = 0;
                                            $vista_dias = 0;
                                            $cart  = mysqli_query($conexion,"SELECT * FROM cart WHERE id_user ='$id_user'"); //email='$email_u'
                                            if(isset($_SESSION['id']))
                                            {
                                                if(mysqli_num_rows($cart)>0)
                                                {
                                                    while ($extraido= mysqli_fetch_array($cart))
                                                    {
                                                        $id                 = $extraido['id'];
                                                        $id_user            = $extraido ['id_user'];
                                                        $width_inches       = $extraido['width_inches'];
                                                        $height_inches      = $extraido ['height_inches'];
                                                        $price              = $extraido['price'];
                                                        $total             += $price; 
                                                        $_SESSION['total']  = $total;
                                                        $tipe               = $extraido ['tipe'];
                                                        $vista              = $extraido ['vista'];
                                                        $quantity           = $extraido['quantity'];
                                                        $id_images          = $extraido ['id_images'];
                                                        $txt_details        = $extraido['txt_details'];
                                                        echo "
                                                        <li class=' item none' >
                                                            <span class=' amount fontlight' >$$price.00</span>
                                                            <span class=' title font-medium' >$tipe</span>
                                                            <div class=' quantity fontlight' >Qty: $quantity</div>
                                                        </li>";
                                                        if($vista == "frentevuelta")
                                                        {
                                                            $vista_dias = 1;
                                                        }
                                                        $count++;
                                                    }
                                                    if($count>1)
                                                    {
                                                        $discount = ($total/100)*20;
                                                        $subtotal = $total;
                                                    }
                                                    if($count<=1)
                                                    {
                                                        $subtotal = $total;
                                                    }
                                                    if($vista_dias == 1)
                                                    {
                                                        echo "<input type='hidden' id='dias_5_7' value='1' name=''>";
                                                    }
                                                    else
                                                    {
                                                        echo "<input type='hidden' id='dias_5_7' value='0' name=''>";
                                                    }
                                                    echo "
                                                        <li class='shipping fontlight item' style='visibility:hidden;display:none;' id='lishipping'>
                                                            <span class=''>Envío</span>
                                                            <span class='amount' id='price_shipping'></span>
                                                        </li>
                                                        <li class='subtotal fontlight' style='visibility:hidden;display:none;' id='lisuptotal'>
                                                            <span class='label'>Subtotal</span>
                                                            <span class='amount' id='subtotalvalue'></span>
                                                        </li>
                                                        <li class='sales-tax fontlight' style='visibility:hidden;display:none;' id='descuento_li'>
                                                            <span class='label' style='padding: 0 !important;color: red !important;'>Descuento</span>
                                                            <span class='amount' id='descuentovalue' style='color: red !important;'></span>
                                                        </li>
                                                        <li class=' total none fontlight' style='padding-bottom: 30px;'>
                                                            <span class=' label font-medium' style='float: left;padding: 0;'>Total</span>
                                                            <span class='amount font-medium' id='totalprice'>$". sprintf('%.2f',$subtotal, 2)."</span>
                                                            <span class='amount' style='visibility:hidden;display:none;' id='totalpriceG'>$subtotal</span>
                                                        </li>";
                                                    mysqli_close($conexion);
                                                }
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </div> 
                            <p style="text-align: left;" id="continue-shopping">o <a class="link" href="/index">Continuar comprando</a></p>                           
                        </div>
                        <script src="https://www.paypal.com/sdk/js?client-id=AXDPrEqAPl8KAdT0aXCWqJxI2UrALEuL9hH3aYDnIGmB0ortGRodcOoOULAAwr6HI0AJOcixHZ0tpI1s&components=buttons&currency=MXN"></script>                                      
                        <script>
                            var FUNDING_SOURCES_PAYPAL = [
                                paypal.FUNDING.PAYPAL
                            ];
                            var price = document.getElementById("totalprice").innerText;
                            price= price.replace(/ /g,""); 
                            var montoFormat = price.replace(/[$]/g,"");
                            //console.log(montoFormat);
                            FUNDING_SOURCES_PAYPAL.forEach(function(fundingSource) {
                            var buttonpaypal = paypal.Buttons({
                                fundingSource: fundingSource,
                                style: {
                                    layout:  'vertical',
                                    color:   'blue',
                                    shape:   'rect',
                                    label:   'paypal'
                                },
                                createOrder: function(data, actions) {
                                    var theForm = document.forms['payment-form'];
                                    var valid,valid2;	
                                    valid = validateContact();
                                    valid2 = validateContact_bill();
                                    if(valid && valid2)
                                    {
                                        document.getElementById('ticket_input').value = 14;
                                        document.getElementById("delivery").value         = document.getElementById("plus_priceUS_days").innerText;
                                        document.getElementById("shipping_price").value   = document.getElementById("totalpriceG").innerText;
                                        //theForm.submit();
                                        return actions.order.create({
                                                purchase_units: [{
                                                amount: {
                                                    value: montoFormat
                                                }
                                                }]
                                            });
                                    }
                                },
                                onApprove: function(data, actions) {
                                    var theForm = document.forms['payment-form'];
                                    
                                    return actions.order.capture().then(function(details) {
                                        //alert('Transaction completed by ' + details.payer.name.given_name);
                                        theForm.submit();
                                    });
                                },
                                onCancel: function (data) {
                                    document.getElementById('error_pago').style.visibility = "visible";
                                    document.getElementById('error_pago').style.display = "block"; 
                                    document.getElementById("error_pay_message").innerText = "Tu pago fue cancelado";
                                    document.getElementById("error_pago").scrollIntoView();
                                    //window.location.href = "pago.php";
                                },
                                onError: function (err) {
                                    document.getElementById('error_pago').style.visibility = "visible";
                                    document.getElementById('error_pago').style.display = "block"; 
                                    document.getElementById("error_pay_message").innerText = "Se ha producido un error que impide procesar el pago";
                                    document.getElementById("error_pago").scrollIntoView();
                                    //window.location.href = "pago.php";
                                }
                            });
                            buttonpaypal.render('#paypal-button-container');        
                            });
                        </script>
                        <script type="text/javascript" >
                            Conekta.setPublicKey('key_e4VkFtUSC3do23uu5W61TWw');

                            var conektaSuccessResponseHandler = function(token) {
                                
                                document.getElementById("pago_conekta").innerText="Procesando";
                                var email     = document.getElementById("ckta_email").value;
                                var phone     = document.getElementById("ckta_phone").value;
                                var name      = document.getElementById("ckta_name").value;
                                
                                if(email=="")
                                {
                                    var email     = document.getElementById("input_email_alone").value;
                                    var phone     = "+521555555555";
                                    var name      = "anonimo";
                                }
                                if(document.getElementById("name_conekta").value!="")
                                {
                                    var name      = document.getElementById("name_conekta").value;
                                }
                                //console.log(email);
                                var precio    = document.getElementById("totalpriceG").innerText;
                               
                                var form_data = new FormData();      
                                form_data.append("conektaTokenId", token.id);
                                form_data.append("precio", precio);
                                form_data.append("ckta_name", name);
                                form_data.append("ckta_email", email);
                                form_data.append("ckta_phone", phone);
                                $.ajax({
                                    type: 'POST',
                                    url: 'conekta/cobro.php',
                                    contentType: false,
                                    processData: false,
                                    data: form_data,
                                    success:function(response) {
                                        document.getElementById("ticket_input").value=14;
                                        console.log(response);
                                        try
                                        {
                                            var datax = JSON.parse(response);
                                            if(datax.payment_status == "paid" || datax.payment_status == "approved")
                                            {
                                                document.getElementById("ticket_input").value=14;
                                                var theForm = document.forms['payment-form'];//ticket
                                                theForm.submit();
                                            }
                                            if(datax.payment_status == "declined" || datax.payment_status == "card_declined" || datax.payment_status == "partially_refunded"
                                            || datax.payment_status == "insufficient_funds" || datax.payment_status == "unprocessable_card_type"  || datax.payment_status == "fraudulent"
                                            || datax.payment_status == "canceled" || datax.payment_status == "suspected_fraud" || datax.payment_status == "stolen_card"
                                            || datax.payment_status == "reversed")
                                            {
                                                document.getElementById("pago_conekta").innerText="Pago rechazado";
                                                document.getElementById("pago_conekta").disabled = true; 
                                                document.getElementById("pago_conekta").style.backgroundColor = "#e60505";
                                                document.getElementById('volveraintentar').style.visibility = "visible";
                                                document.getElementById('volveraintentar').style.display = "block"; 
                                                document.getElementById("card_cvc_conekta").value = ''; 
                                                document.getElementById('id_no_referencia').value = datax.id;
                                            }
                                        }
                                        catch(error)
                                        {
                                                document.getElementById("pago_conekta").innerText="Pago rechazado";
                                                document.getElementById("pago_conekta").disabled = true; 
                                                document.getElementById("pago_conekta").style.backgroundColor = "#e60505";
                                                document.getElementById('volveraintentar').style.visibility = "visible";
                                                document.getElementById('volveraintentar').style.display = "block"; 
                                                document.getElementById("card_cvc_conekta").value = ''; 
                                         
                                        }
                                    },
                                    onFailure: function(response){
                                        //console.log("fail");
                                    }
                                });
                            };
                            var conektaErrorResponseHandler = function(response) {
                                var $form = $("#card-form");
                                document.getElementById("card_err").className += " error_account";
                                $form.find(".card-errors").text(response.message_to_purchaser);
                            };

                            //jQuery para que genere el token después de dar click en submit
                            $(function () {
                                /*var payment = document.forms['payment-form'];
                                document.getElementById("ticket_input").value=14;
                                payment.submit();*/
                                $("#card-form").submit(function(event) {
                                var $form = $(this);
                                document.getElementById("card_err").className = " card-errors";
                                // Previene hacer submit más de una vez
                                //$form.find("button").prop("disabled", true);
                                Conekta.Token.create($form, conektaSuccessResponseHandler, conektaErrorResponseHandler);
                                return false;
                                });
                            });
                        </script>
                        <!--
                        <script>
                            var FUNDING_SOURCES_CREDIT = [
                                paypal.FUNDING.CARD
                            ];
                            var price = document.getElementById("totalprice").innerText;
                            price= price.replace(/ /g,""); 
                            var montoFormat = price.replace(/[$]/g,"");
                            FUNDING_SOURCES_CREDIT.forEach(function(fundingSource) {
                            var buttonCREDIT = paypal.Buttons({
                                fundingSource: fundingSource,
                                
                                createOrder: function(data, actions) {
                                    
                                    var theForm = document.forms['payment-form'];
                                    var valid;	
                                    valid = validateContact();
                                    valid2 = validateContact_bill();
                                    if(valid && valid2)
                                    {
                                        
                                        //document.getElementById("taxes").value            = document.getElementById("taxesvalue").innerText;
                                        document.getElementById("delivery").value         = document.getElementById("plus_priceUS_days").innerText;
                                        document.getElementById("shipping_price").value   = document.getElementById("totalpriceG").innerText;
                                        theForm.submit();
                                        return actions.order.create({
                                                purchase_units: [{
                                                amount: {
                                                    value: montoFormat
                                                }
                                                }]
                                            });
                                    }
                                },
                                onApprove: function(data, actions) {
                                    var theForm = document.forms['payment-form'];
                                    
                                    return actions.order.capture().then(function(details) {
                                        //alert('Transaction completed by ' + details.payer.name.given_name);
                                        theForm.submit();
                                    });
                                },
                                onCancel: function (data) {
                                    document.getElementById('error_pago').style.visibility = "visible";
                                    document.getElementById('error_pago').style.display = "block"; 
                                    document.getElementById("error_pay_message").innerText = "Tu pago fue cancelado";
                                    document.getElementById("error_pago").scrollIntoView();
                                    //window.location.href = "pago.php";
                                },
                                onError: function (err) {
                                    document.getElementById('error_pago').style.visibility = "visible";
                                    document.getElementById('error_pago').style.display = "block"; 
                                    document.getElementById("error_pay_message").innerText = "Se ha producido un error que impide procesar el pago";
                                    document.getElementById("error_pago").scrollIntoView();
                                    //window.location.href = "pago.php";
                                }
                            });
                            buttonCREDIT.render('#credit-button-container');        
                            });
                        </script>-->
                        <script>
                            document.addEventListener("DOMContentLoaded", function(event) { 
                                document.getElementById('sinenvio').click();
                                var dias_frente_o_vuelta = document.getElementById('dias_5_7').value;
                                var diaEntrega;
                                if(dias_frente_o_vuelta == 1)
                                {
                                    diaEntrega = calculaEntrega(diaPedido, 7, festivos);
                                }
                                else
                                {
                                    diaEntrega = calculaEntrega(diaPedido, 5, festivos);
                                }
                                var currentTime = new Date();
                                var year = currentTime.getFullYear();
                                $("#plus_priceUS_days").text(days[diaEntrega.getDay()] +" "+diaEntrega.getDate()+" de "+months[diaEntrega.getMonth()] +" del "+ year); //delivery
                                document.getElementById('delivery').value=days[diaEntrega.getDay()] +" "+diaEntrega.getDate()+" de "+months[diaEntrega.getMonth()] +" del "+ year;
                            });
                        </script>
                        <script>
                            let fileobj = null;
                            let uploadProgress = [];
                            var payment = document.forms['payment-form'];
                            initializeProgress(1);
                            function required_inputs_ticket() 
                            {
                                    var valid = true;	
                                    $("#input_email_alone").removeClass("invalid");
                                    $("#file-name").removeClass("invalid");

                                    if($('#input_email_alone').is(':visible'))
                                    {
                                        if(!$("#input_email_alone").val()) {
                                            $("#input_email_alone").addClass("invalid"); 
                                            valid = false;
                                        }
                                    }
                                    /*if($('#file-name').is(':visible'))
                                    {
                                        if(!$("#file-name").val()) {
                                            $("#file-name").addClass("invalid"); 
                                            valid = false;
                                        }
                                    }*/
                                    
                                    return valid;

                            }
                            function required_inputs_spei() 
                            {
                                    var valid = true;	
                                    /*
                                        $("#id_no_referencia").removeClass("invalid");
                                        if($('#file-name').is(':visible'))
                                        {
                                            if(!$("#id_no_referencia").val()) 
                                            {
                                                $("#id_no_referencia").addClass("invalid"); 
                                                valid = false;
                                            }
                                        }
                                    */
                                    $("#input_email_alone").removeClass("invalid");
                                    //console.log("required_inputs_spei()");
                                    if($('#input_email_alone').is(':visible'))
                                    {
                                        //console.log("esvisible");
                                        if(!$("#input_email_alone").val()) 
                                        {
                                            //console.log("tienevalor");
                                            $("#input_email_alone").addClass("invalid"); 
                                            valid = false;
                                        }
                                    }
                                    if(valid==false)
                                        $("html, body").animate({ scrollTop: 0 }, 600);
                                    return valid;
                            }
                            function SPEI()
                            {
                                if(document.getElementById('input_email_alone'))
                                {
                                    document.getElementById('input_email_alone').style.visibility = "visible";
                                    document.getElementById('input_email_alone').style.display = "block";
                                }
                                 
                                var valid;
                                valid = required_inputs_spei();
                                //var payment2 = document.forms['payment-form'];
                                //document.getElementById('ticket_input').value = 14;
                                //console.log(valid);
                                if(valid)
                                {
                                    //var  document.getElementById('ticket_input').value = 14;
                                    if($("#id_no_referencia").val()) 
                                    {
                                        document.getElementById("datos").insertAdjacentHTML("afterend", "<input type='hidden' name='spei_despues' value='no'>"); 
                                    }
                                    else{
                                        document.getElementById("datos").insertAdjacentHTML("afterend", "<input type='hidden' name='spei_despues' value='despues'>");
                                    }
                                    payment.submit();
                                }
                            }
                            function sendticket()
                            {
                                var valid;
                                
                                valid = required_inputs_ticket();
                                console.log(valid);
                                var nombre_ticket = document.getElementById("file-name").value;
                                if(valid)
                                {
                                    if(nombre_ticket == "")
                                    {
                                        document.getElementById("datos").insertAdjacentHTML("afterend", "<input type='hidden' name='spei_despues' value='despues'>"); 
                                        document.getElementById("datos").insertAdjacentHTML("afterend", "<input type='hidden' name='corresponsal' value='despues'>"); 
                                        payment.submit();
                                    }
                                    if(nombre_ticket != "")
                                    {
                                        console.log("si hay ticket");
                                        ajax_file_upload_ticket(fileobj);
                                    }
                                }
                            }
                            function ajax_file_upload_ticket(file_obj) 
                            {
                                document.getElementById('pbar').style.visibility = "visible";
                                if(document.getElementById('input_email_alone'))
                                    form_data.append('email', document.getElementById('input_email_alone').value);//
                                var plus_priceUS_days   = document.getElementById('plus_priceUS_days').innerText;//plus_priceUS_days
                                document.getElementById('ticket_input').value = 13;
                                var form_data = new FormData();   
                                form_data.append('deliverytime',plus_priceUS_days)
                                form_data.append('ticket','on')
                                form_data.append('file', file_obj);
                                $.ajax({
                                    xhr: function() {
                                        var xhr = new window.XMLHttpRequest();
                                        xhr.upload.addEventListener("progress", function(evt){
                                            if (evt.lengthComputable) {
                                                var percentComplete = evt.loaded / evt.total;
                                                console.log(percentComplete*100*2);
                                                updateProgress(1,percentComplete*100*2);
                                                console.log(" update progress");
                                            }
                                    }, false);                        
                                    return xhr;
                                    },
                                    type: 'GET',
                                    url: 'processing.php',
                                    contentType: false,
                                    processData: false,
                                    data: form_data,
                                    success:function(response){
                                        console.log(" success");
                                        payment.submit();
                                        /*
                                            var datax = JSON.parse(response);
                                            setTimeout(function(){
                                                if(datax.error==0)
                                                {
                                                    window.location = "../activacion_de_cuenta?email="+email;
                                                }
                                                if(datax.error==1)
                                                {
                                                    document.getElementById('input_email').value = "";
                                                    required_inputs();
                                                    document.getElementById('input_email').placeholder='El correo '+email+' ya esta registrado';
                                                }
                                                if(datax.error==2)
                                                {
                                                    alert("Ah ocurrido un error verfica tu informacion e intenta de nuevo");
                                                }
                                            }, 1500);
                                        */
                                    },
                                    onFailure: function(response){
                                    }
                                });
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
                                        //console.log("shipping_name");
                                    }
                                    if(!$("#input_email").val()) {
                                        $("#input_email").addClass("invalid"); 
                                        valid = false;
                                        //console.log("input_email");
                                    }
                                    if(!$("#input_pass1").val()) {
                                        $("#input_pass1").addClass("invalid"); 
                                        valid = false;
                                        //console.log("input_pass1");
                                    }
                                    if(!$("#street_number").val()) {
                                        $("#street_number").addClass("invalid");
                                        valid = false;
                                        //console.log("#street_number");
                                    }
                                    if(!$("#locality").val()) {
                                        $("#locality").addClass("invalid"); 
                                        valid = false;
                                        //console.log("#locality");
                                    }
                                    if(!$("#postal_code").val()) {
                                        $("#postal_code").addClass("invalid"); 
                                        valid = false;
                                        //console.log("#postal_code");
                                    }
                                    if(!$("#administrative_area_level_1").val()) 
                                    {
                                        $("#administrative_area_level_1").addClass("invalid"); 
                                        valid = false;
                                        //console.log("#administrative_area_level_1");
                                    }
                                    if(!$("#code").val()) {
                                        $("#code").addClass("invalid");
                                        valid = false;
                                        //console.log("#code");
                                    }
                                    if(!$("#phone").val()) {
                                        $("#phone").addClass("invalid");
                                        valid = false;
                                        //console.log("#phone");
                                    }
                                    if(!$("#country").val()) {
                                        $("#country").addClass("invalid"); 
                                        valid = false;
                                        //console.log("#country");
                                    }
                                    if(!$("#postal_code").val()) {
                                        $("#postal_code").addClass("invalid"); 
                                        valid = false;
                                        //console.log("#postal_code");
                                    }
                                    if ($('#doc_extras').is(':visible'))
                                    {
                                        if(!$("#shipping_company").val()) {
                                        $("#shipping_company").addClass("invalid"); 
                                        valid = false;
                                        //console.log("#shipping_company");
                                        }
                                        if(!$("#file-name").val()) {
                                            $("#file-name").addClass("invalid"); 
                                            //console.log("#file-name");
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
                                    success:function(response) {
                                        //console.log("complete");
                                        //stateChange(-1);
                                        var datax = JSON.parse(response);
                                        
                                        //console.log("success");

                                        //console.log(datax);
                                
                                        setTimeout(function(){
                                        
                                        if(datax.error==0)
                                        {
                                            //console.log(datax.email);
                                            window.location = "../activacion_de_cuenta?email="+email;
                                            //window.location = '../activacion_de_cuenta';
                                        }
                                        if(datax.error==1)
                                        {
                                            document.getElementById('input_email').value = "";
                                            required_inputs();
                                            document.getElementById('input_email').placeholder='El correo '+email+' ya esta registrado';
                                        }
                                        if(datax.error==2)
                                        {
                                            alert("Ah ocurrido un error verfica tu informacion e intenta de nuevo");
                                            //window.location = '../index?email='+datax.email.toString();
                                        }
                                        }, 1500);
                                        
                                    },
                                    onFailure: function(response){
                                        //console.log("fail");
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
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/venobox/venobox.min.js"></script>
  <script src="lib/knob/jquery.knob.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/parallax/parallax.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
  <script src="lib/appear/jquery.appear.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  -->
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!--
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <script src="upload/dist/js/jquery.dm-uploader.min.js"></script>
  <script src="upload/upload_file/demo-ui.js"></script>
  <script src="upload/upload_file/demo-config.js"></script>-->
</body>

</html>