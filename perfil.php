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
 <script>
        function NewAvatar()
        {
            var modal = document.getElementById("edit-avatar-modal");
            modal.style.display = "flex";
        }   
        function inputf(input) 
        {
            if (input.files && input.files[0]) 
            {
                var reader = new FileReader();
                reader.onload = function(e) {
                $('#new_avatar').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }
        function CloseNewAvatar()
        {
            var modal = document.getElementById("edit-avatar-modal");
            modal.style.display = "none";
        }
        function NewEmail()
        {
            var modal = document.getElementById("newEmail");
            modal.style.display = "flex";
        }
        function CloseNewEmail()
        {
            var modal = document.getElementById("newEmail");
            modal.style.display = "none";
        }
        function NewAddress()
        {
            CloseAddress();
            var modal = document.getElementById("newAddress");
            modal.style.display = "flex";
        }
        function CloseNewAddress()
        {
            var modal = document.getElementById("newAddress");
            modal.style.display = "none";
            Address();
        }
        function Address() //Billing_Address
        {
            var modal = document.getElementById("address");
            modal.style.display = "flex";
        }
        function CloseAddress()
        {
            var modal = document.getElementById("address");
            modal.style.display = "none";
        }
        function EditAddress(id)
        {
            CloseAddress();
            var modal = document.getElementById("EditAddress");
            modal.style.display = "block";            
            $('input[name="country_id"]').val(document.getElementById("ups_ul_country"+id).value);
            $('input[name="name"]').val(document.getElementById("ups_ul_name"+id).value);
            $('input[name="company"]').val(document.getElementById("ups_ul_company"+id).value);
            $('input[name="address1"]').val(document.getElementById("ups_ul_add1"+id).value);
            $('input[name="address2"]').val(document.getElementById("ups_ul_add2"+id).value);
            $('input[name="locality"]').val(document.getElementById("ups_ul_city"+id).value);
            $('input[name="zipcode"]').val(document.getElementById("ups_ul_postal"+id).value);
            $('input[name="state"]').val(document.getElementById("ups_ul_state"+id).value);
            $('input[name="ID"]').val(id);
            var country = document.getElementById("ups_ul_country"+id).value;
            var sel = document.getElementById('shipping_country_id');
            var opts = sel.options;
            for (j = 0; j<sel.length; j++) 
            { 
                if (opts[j].value == country) 
                {
                    sel.selectedIndex = j;
                    break;
                }
            }
            $('#shipping_country_id :nth-child('+j+')').prop('selected', true).trigger('change');                        
        }
        function submit_edit_address(){
            var theForm = document.forms['edit_address'];
            valid = validate_edith_address();
            if(valid)
            {
                theForm.submit();
            }
        }
        function validate_edith_address() 
        {
            var valid = true;	
            $("#shipping_country_id_edit").removeClass("invalid");
            $("#shipping_name_edit").removeClass("invalid");
            $("#shipping_company_edit").removeClass("invalid");
            $("#street_number_edit").removeClass("invalid");
            $("#locality_edit").removeClass("invalid");
            $("#postal_code_edit").removeClass("invalid");
            $("#administrative_area_level_1_edit").removeClass("invalid");    
            $("#state_id_edit").removeClass("invalid");  
            if ($('#EditAddress').is(':visible'))
            {
                //alert("visible");
                if(!$("#shipping_country_id_edit").val()) {
                    $("#shipping_country_id_edit").addClass("invalid"); 
                    valid = false;
                }       
                if(!$("#shipping_name_edit").val()) {
                    $("#shipping_name_edit").addClass("invalid"); 
                    valid = false;
                }
                if(!$("#shipping_company_edit").val()) {
                    $("#shipping_company_edit").addClass("invalid"); 
                    valid = false;
                }
                if(!$("#street_number_edit").val()) {
                    $("#street_number_edit").addClass("invalid"); 
                    valid = false;
                }
                if(!$("#locality_edit").val()) {
                    $("#locality_edit").addClass("invalid");
                    valid = false;
                }
                if(!$("#postal_code_edit").val()) {
                    $("#postal_code_edit").addClass("invalid");
                    valid = false;
                }
                if ($('#administrative_area_level_1_edit').is(':visible'))
                {
                    if(!$("#administrative_area_level_1_edit").val()) {
                        $("#administrative_area_level_1_edit").addClass("invalid"); 
                        valid = false;
                    }
                }
                if ($('#state_id_edit').is(':visible'))
                {
                    if(!$("#state_id_edit").val()) {
                        $("#state_id_edit").addClass("invalid"); 
                        valid = false;
                    }
                }
            }
            if(valid==false)
                $("html, body").animate({ scrollTop: 0 }, 600);
            return valid;

        }
        function submit_add_new_address(){
            var theForm = document.forms['add_new_address'];
            valid = validate_add_new_address();
            if(valid)
            {
                theForm.submit();
            }
        }
        function validate_add_new_address() 
        {
            var valid = true;	
            $("#shipping_country_id").removeClass("invalid");
            $("#shipping_name").removeClass("invalid");
            $("#shipping_company").removeClass("invalid");
            $("#street_number").removeClass("invalid");
            $("#locality_edit").removeClass("invalid");
            $("#postal_code").removeClass("invalid");
            $("#administrative_area_level_1").removeClass("invalid");    
            $("#state_id").removeClass("invalid");  
            if ($('#newAddress').is(':visible'))
            {
                //alert("visible");
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
                if ($('#administrative_area_level_1').is(':visible'))
                {
                    if(!$("#administrative_area_level_1").val()) {
                        $("#administrative_area_level_1").addClass("invalid"); 
                        valid = false;
                    }
                }
                if ($('#state_id').is(':visible'))
                {
                    if(!$("#state_id").val()) {
                        $("#state_id").addClass("invalid"); 
                        valid = false;
                    }
                }
            }
            if(valid==false)
                $("html, body").animate({ scrollTop: 0 }, 600);
            return valid;

        }
        function submit_add_new_bill_address(){
            var theForm = document.forms['add_new_bill_address'];
            valid = validate_add_new_bill_address();
            if(valid)
            {
                theForm.submit();
            }
        }
        function validate_add_new_bill_address() 
        {
            var valid = true;	
            $("#shipping_country_id_b").removeClass("invalid");
            $("#shipping_name_b").removeClass("invalid");
            $("#shipping_company_b").removeClass("invalid");
            $("#street_number_b").removeClass("invalid");
            $("#locality_edit_b").removeClass("invalid");
            $("#postal_code_b").removeClass("invalid");
            $("#administrative_area_level_1_b").removeClass("invalid");    
            $("#state_id_b").removeClass("invalid");  
            if ($('#new_billing_Address').is(':visible'))
            {
                //alert("visible");
                if(!$("#shipping_country_id_b").val()) {
                    $("#shipping_country_id_b").addClass("invalid"); 
                    valid = false;
                }       
                if(!$("#shipping_name_b").val()) {
                    $("#shipping_name_b").addClass("invalid"); 
                    valid = false;
                }
                if(!$("#shipping_company_b").val()) {
                    $("#shipping_company_b").addClass("invalid"); 
                    valid = false;
                }
                if(!$("#street_number_b").val()) {
                    $("#street_number_b").addClass("invalid"); 
                    valid = false;
                }
                if(!$("#locality_b").val()) {
                    $("#locality_b").addClass("invalid");
                    valid = false;
                }
                if(!$("#postal_code_b").val()) {
                    $("#postal_code_b").addClass("invalid");
                    valid = false;
                }
                if ($('#administrative_area_level_1_b').is(':visible'))
                {
                    if(!$("#administrative_area_level_1_b").val()) {
                        $("#administrative_area_level_1_b").addClass("invalid"); 
                        valid = false;
                    }
                }
                if ($('#state_id_b').is(':visible'))
                {
                    if(!$("#state_id_b").val()) {
                        $("#state_id_b").addClass("invalid"); 
                        valid = false;
                    }
                }
            }
            if(valid==false)
                $("html, body").animate({ scrollTop: 0 }, 600);
            return valid;

        }
        function submit_edit_bill_address()
        {
            var theForm = document.forms['edit_bill_address'];
            valid = validate_edit_bill_address();
            if(valid)
            {
                theForm.submit();
            }
        }
        function validate_edit_bill_address() 
        {
            var valid = true;	
            $("#shipping_country_id_bill").removeClass("invalid");
            $("#shipping_name_bill").removeClass("invalid");
            $("#shipping_company_bill").removeClass("invalid");
            $("#street_number_bill").removeClass("invalid");
            $("#locality_edit_bill").removeClass("invalid");
            $("#postal_code_bill").removeClass("invalid");
            $("#administrative_area_level_1_bill").removeClass("invalid");    
            $("#state_id_bill").removeClass("invalid");  
            if ($('#Edit_billing_Address').is(':visible'))
            {
                if(!$("#shipping_country_id_bill").val()) {
                    $("#shipping_country_id_bill").addClass("invalid"); 
                    valid = false;
                }       
                if(!$("#shipping_name_bill").val()) {
                    $("#shipping_name_bill").addClass("invalid"); 
                    valid = false;
                }
                if(!$("#shipping_company_bill").val()) {
                    $("#shipping_company_bill").addClass("invalid"); 
                    valid = false;
                }
                if(!$("#street_number_bill").val()) {
                    $("#street_number_bill").addClass("invalid"); 
                    valid = false;
                }
                if(!$("#locality_bill").val()) {
                    $("#locality_bill").addClass("invalid");
                    valid = false;
                }
                if(!$("#postal_code_bill").val()) {
                    $("#postal_code_bill").addClass("invalid");
                    valid = false;
                }
                if ($('#administrative_area_level_1_bill').is(':visible'))
                {
                    if(!$("#administrative_area_level_1_bill").val()) {
                        $("#administrative_area_level_1_bill").addClass("invalid"); 
                        valid = false;
                    }
                }
                if ($('#state_id_bill').is(':visible'))
                {
                    if(!$("#state_id_bill").val()) {
                        $("#state_id_bill").addClass("invalid"); 
                        valid = false;
                    }
                }
            }
            if(valid==false)
                $("html, body").animate({ scrollTop: 0 }, 600);
            return valid;

        }
        function get_address(id)
        {
            if( $('#same_as_shipping_addr').prop('checked') ) 
            {
                var form_data = new FormData();
                form_data.append('id',id);
                //alert("si");
                $.ajax({
                    type: 'POST',
                    url: 'php/get_def_address.php',
                    contentType: false,
                    processData: false,
                    data: form_data,
                    success:function(response) {
                        //alert(response);
                        var datax = JSON.parse(response);
                        document.getElementById("shipping_name_b").value              = datax.full_name;
                        document.getElementById("shipping_company_b").value           = datax.company;
                        document.getElementById("street_number_b").value              = datax.street_address1;
                        document.getElementById("route_b").value                      = datax.street_address2;
                        document.getElementById("locality_b").value                   = datax.city;
                        document.getElementById("postal_code_b").value                = datax.zip_code;

                        if(datax.country=="US")
                        {
                            document.getElementById('state_id_b').style.visibility = "visible";
                            document.getElementById('state_id_b').style.display = "block"; 
                            document.getElementById('administrative_area_level_1_b').style.visibility = "hidden";
                            document.getElementById('administrative_area_level_1_b').style.display = "none"; 
                        }
                        else{
                            document.getElementById('state_id_b').style.visibility = "hidden";
                            document.getElementById('state_id_b').style.display = "none"; 
                            document.getElementById('administrative_area_level_1_b').style.visibility = "visible";
                            document.getElementById('administrative_area_level_1_b').style.display = "block"; 
                        }
                        var sel = document.getElementById('shipping_country_id_b');
                        var country = datax.country;
                        var opts = sel.options;
                        for (j = 0; j<sel.length; j++) 
                        { 
                            if (opts[j].value == country) 
                            {
                                sel.selectedIndex = j;
                                break;
                            }
                        }
                        var sel = document.getElementById('state_id_b');
                        var country = datax.statedir;
                        var opts = sel.options;
                        for (j = 0; j<sel.length; j++) 
                        { 
                            if (opts[j].value == country) 
                            {
                                sel.selectedIndex = j;
                                break;
                            }
                        }
                    },
                    onFailure: function(response){
                        alert("fail");
                    }
                });
            }
            else{
                document.getElementById("shipping_country_id_b").value        = "";
                document.getElementById("shipping_name_b").value              = "";
                document.getElementById("shipping_company_b").value           = "";
                document.getElementById("street_number_b").value              = "";
                document.getElementById("route_b").value                      = "";
                document.getElementById("locality_b").value                   = "";
                document.getElementById("postal_code_b").value                = "";
                document.getElementById('state_id_b').value                   = "";
            }
        }
        function get_bill_address(id)
        {
            if( $('#same_as_shipping').prop('checked') ) 
            {
                var form_data = new FormData();
                form_data.append('id',id);
                $.ajax({
                    type: 'POST',
                    url: 'php/get_def_bill.php',
                    contentType: false,
                    processData: false,
                    data: form_data,
                    success:function(response) {
                        var datax = JSON.parse(response);
                        document.getElementById("shipping_name").value              = datax.full_name;
                        document.getElementById("shipping_company").value           = datax.company;
                        document.getElementById("street_number").value              = datax.street_address1;
                        document.getElementById("route").value                      = datax.street_address2;
                        document.getElementById("locality").value                   = datax.city;
                        document.getElementById("postal_code").value                = datax.zip_code;

                        if(datax.country=="US")
                        {
                            document.getElementById('state_id').style.visibility = "visible";
                            document.getElementById('state_id').style.display = "block"; 
                            document.getElementById('administrative_area_level_1').style.visibility = "hidden";
                            document.getElementById('administrative_area_level_1').style.display = "none"; 
                        }
                        else{
                            document.getElementById('state_id').style.visibility = "hidden";
                            document.getElementById('state_id').style.display = "none"; 
                            document.getElementById('administrative_area_level_1').style.visibility = "visible";
                            document.getElementById('administrative_area_level_1').style.display = "block"; 
                        }
                        var sel = document.getElementById('shipping_country_id');
                        var country = datax.country;
                        var opts = sel.options;
                        for (j = 0; j<sel.length; j++) 
                        { 
                            if (opts[j].value == country) 
                            {
                                sel.selectedIndex = j;
                                break;
                            }
                        }
                        var sel = document.getElementById('state_id');
                        var country = datax.statedir;
                        var opts = sel.options;
                        for (j = 0; j<sel.length; j++) 
                        { 
                            if (opts[j].value == country) 
                            {
                                sel.selectedIndex = j;
                                break;
                            }
                        }
                    },
                    onFailure: function(response){
                        alert("fail");
                    }
                });
            }
            else{
                document.getElementById("shipping_country_id").value        = "";
                document.getElementById("shipping_name").value              = "";
                document.getElementById("shipping_company").value           = "";
                document.getElementById("street_number").value              = "";
                document.getElementById("route").value                      = "";
                document.getElementById("locality").value                   = "";
                document.getElementById("postal_code").value                = "";
                document.getElementById('state_id').value                   = "";
            }
        }
        function CloseEditAddress()
        {
            var modal = document.getElementById("EditAddress");
            modal.style.display = "none";
            Address();
        }
        function Billing_Address() //Billing_Address
        {
            var modal = document.getElementById("billing_address");
            modal.style.display = "flex";
        }
        function Close_Billing_Address()
        {
            var modal = document.getElementById("billing_address");
            modal.style.display = "none";
        }
        function New_billing_Address()
        {
            Close_Billing_Address();
            var modal = document.getElementById("new_billing_Address");
            modal.style.display = "flex";
        }
        function CloseNew_billing_Address()
        {
            var modal = document.getElementById("new_billing_Address");
            modal.style.display = "none";
            document.getElementById("shipping_country_id_b").value        = "";
            document.getElementById("shipping_name_b").value              = "";
            document.getElementById("shipping_company_b").value           = "";
            document.getElementById("street_number_b").value              = "";
            document.getElementById("route_b").value                      = "";
            document.getElementById("locality_b").value                   = "";
            document.getElementById("postal_code_b").value                = "";
            document.getElementById('state_id_b').value                   = "";
            Billing_Address();
        }
        function Edit_billing_Address(id)
        {
            Close_Billing_Address();
            var modal = document.getElementById("Edit_billing_Address");
            modal.style.display = "block";            
            $('input[name="country_id"]').val(document.getElementById("ups_ul_country_bill"+id).value);
            $('input[name="name"]').val(document.getElementById("ups_ul_name_bill"+id).value);
            $('input[name="company"]').val(document.getElementById("ups_ul_company_bill"+id).value);
            $('input[name="address1"]').val(document.getElementById("ups_ul_add1_bill"+id).value);
            $('input[name="address2"]').val(document.getElementById("ups_ul_add2_bill"+id).value);
            $('input[name="locality"]').val(document.getElementById("ups_ul_city_bill"+id).value);
            $('input[name="zipcode"]').val(document.getElementById("ups_ul_postal_bill"+id).value);
            $('input[name="state"]').val(document.getElementById("ups_ul_state_bill"+id).value);
            $('input[name="ID_bill"]').val(id);
            var country = document.getElementById("ups_ul_country"+id).value;
            var sel = document.getElementById('shipping_country_id');
            var opts = sel.options;
            for (j = 0; j<sel.length; j++) 
            { 
                if (opts[j].value == country) 
                {
                    sel.selectedIndex = j;
                    break;
                }
            }
            $('#shipping_country_id :nth-child('+j+')').prop('selected', true).trigger('change');                        
        }
        function CloseEdit_billing_Address()
        {
            var modal = document.getElementById("Edit_billing_Address");
            modal.style.display = "none";
            Billing_Address();
        }
        function readURL(input) 
        {
            if (input.files && input.files[0]) 
            {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                $('#new_avatar').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }
        function measurement_system() //Billing_Address
        {
            var modal = document.getElementById("measurement_system");
            modal.style.display = "flex";
        }
        function Close_measurement_system()
        {
            var modal = document.getElementById("measurement_system");
            modal.style.display = "none";
        }
    </script>
  <style>    
      .invalid {
          background: #fbf2f2;
          border: #e8e0e0 1px solid;
      }
      .responsive{
        margin-bottom: 50px;
      }
      tr{
        padding: 10px 0px;
        display: block;
      }
      td{
        display: inline-block;
      }
      .secondary{
        background: rgba(240, 101, 0, 0.55) none repeat scroll 0 0;
        font-size: 12px;
        padding: 5px 10px;
      }
      .button_small{
        margin: 0 !important;
        padding: 0px 5px !important;
        font-size: 10px !important;
        font-family: 'Light' !important;
        background: rgba(255, 255, 255, 0.55) none repeat scroll 0 0 !important;
      }
      .primary
      {
        background: rgba(255, 255, 255, 0.55) none repeat scroll 0 0 !important;
        border: 1px solid #ccc;
        color: #444;
        font-size: 12px;
        font-weight: 700;
        margin-top: 8px;
        padding: 5px 10px;
        text-transform: uppercase;
        transition: all 0.3s ease 0s;
        border-radius: 30px;
      }
  </style>
</head>

<body data-spy="scroll" data-target="#navbar-example" class="estaciones">
    <?php
    include "header.php";
    
    include "account/avatar.php";
    include "account/address.php";
    include "account/new_address.php"; 
    include "account/edit_address.php";

    include "account/billing_address.php";
    include "account/new_billing_address.php";
    
  ?>
  <!-- header end -->
  <div id="subnav" class="container" style="width: min-content;margin: auto;">   
        <div class="container" style="--subnav-scroll-left-width:0px; --subnav-scroll-right-width:0px;">
            <div class="subnav-menu">
                <ul class="subnav-menu-tabs">
                    <a class="a-subnav-menu" style="color: #202020;" href="perfil"><li class=" li-subnav active">Perfil</li></a>
                    <a class="a-subnav-menu" href="ordenes">        <li class="li-subnav">Ordenes</li></a>
                    <a class="a-subnav-menu" href="reordenes">       <li class="li-subnav">Reordenes</li></a>      
                    <a class="a-subnav-menu" href="trabajos">      <li class="li-subnav">Trabajos</li></a>     
                    <a class="a-subnav-menu" href="notificaciones"> <li class="li-subnav">Notificaciones</li></a>
                </ul>
            </div>
        </div>
    </div>
  <div class="paper container" style="width: min-content;">
        
      <div class="container">
      <div class="contact-overly"></div>
      <div class="">
        <div class="row flex">

          <!-- Start  contact -->
          <div class="col-md-12 col-sm-12 col-xs-12 mauto">
            <section style="padding-bottom: 80px;">
                  <div id="summary" class="summary"  style="display: flex;">
                      <div class="avatarvb">
                          <a href="#" onclick="NewAvatar()">
                          <?php
                              if($_SESSION['avatar']==null)
                              {
                          ?>
                                  <img alt="" class="avatar-img" src="/img/avatar.png" style="width: 100px !important;height: 100px !important;">
                          <?php
                              }
                              else{
                                ?>
                                  <img alt="" class="avatar-img"  src="data:image/png;base64,<?php echo base64_encode($_SESSION['avatar']);?>" style="width: 100px !important;height: 100px !important;">
                                <?php
                              }
                          ?>
                          
                          <!--<div class="overlayy">
                              <button  class="button tiny primary" id="edit_picture_button" title="Change your profile picture">Change</button>
                              </div>
                          -->
                          </a>
                      </div>
                      <div>
                          <h1 style="font-size: 2.5rem;margin-bottom: 0;" class="font-medium"><?php echo $_SESSION['usrname'];?></h1>
                          <p class="font-light" style="color: black;"><?php echo $_SESSION['email'];?></p>
                          <p>
                              <!--<a href="#" class="button tiny primary" data-reveal-id="edit-profile-modal">Edit profile</a>-->
                              <a href="../recuperacion">
                                  <button type="submit" class="secondary" >Cambiar contraseña</button>
                              </a>
                          </p>
                      </div>
                  </div>
                  <h2 class="light border-bottom">General</h2><table id="details" class="responsive">
                  <table id="details" class="responsive font-light" style="width:100%;">
                      <tbody>
                      <tr>
                          <td>Nombre</td>
                          <td style="float: right;"><?php echo $_SESSION['usrname'];?></td>
                      </tr>
                      <tr>
                          <td>Historial</td>
                          <td style="float: right;">
                          <?php
                              include 'php/conexion.php';
                              $query = "SELECT * FROM orders WHERE id_user='$id_user'";
                              $result = mysqli_query($conexion,$query);
                              if(mysqli_num_rows($result)==0)
                              {
                          ?>
                              Aun no hay ordenes para mostrar
                          <?php
                              }
                              if(mysqli_num_rows($result)>0)
                              {
                                  $completas=0;
                                  $canceladas=0;
                                  $in_production =0;
                                  while ($extraido= mysqli_fetch_array($result))
                                  {
                                      $id             = $extraido['id'];
                                      $width_inches   = $extraido['width_inches'];
                                      $height_inches  = $extraido['height_inches'];
                                      $price          = $extraido['price'];
                                      $tipe           = $extraido['tipe'];
                                      $quantity       = $extraido['quantity'];
                                      $id_images      = $extraido['id_images'];
                                      $txt_details    = $extraido['txt_details'];
                                      $dates          = $extraido['dates'];
                                      $statusp        = $extraido['statusp'];
                                      $id_address     = $extraido['id_address'];
                                      if($statusp==4)
                                      {
                                          $canceladas++;
                                      }
                                      if($statusp==5)//In production 
                                      {
                                          $completas++;
                                      }
                                      if($statusp==0 || $statusp==2)
                                      {
                                          $in_production++;
                                      }
                                  }
                                  ?>
                                   <a href="../orders.php">
                                  <?php
                                  if($canceladas != 0)
                                  {
                                  ?>
                                     <?php echo $canceladas?> Cancelados,
                                  <?php
                                  }
                                  if($completas != 0)
                                  {
                                  ?>
                                      <?php echo $completas?> Completos,
                                  <?php
                                  }
                                  if($in_production != 0)
                                  {
                                  ?>
                                      <?php echo $in_production?> En producción
                                  <?php
                                  }
                                  if($canceladas == 0 && $completas== 0 && $in_production== 0)
                                  {
                                  ?>
                                     No hay ordenes
                                  <?php
                                  }
                                  ?>
                                  </a>
                                  <?php
                              }
                          ?>
                          
                          </td>
                      </tr>
                      <tr>
                          <td id="default_shipping_address">
                              Direccion de envio
                              <span id="shipping-address-book-app">&nbsp;
                                  <button class="button link edit" type="button" onclick="Address()">Editar</button>
                              </span>
                          </td>
                          <td id="default_shipping_address_line" style="float: right;">
                              <?php
                               include 'php/conexion.php';
                               $query = "SELECT * FROM address_t WHERE id_user='$id_user'";
                               $result = mysqli_query($conexion,$query);
                               if(mysqli_num_rows($result)>0)
                               {
                                   while ($extraido= mysqli_fetch_array($result))
                                   {
                                       $id             = $extraido['id'];
                                       $country        = $extraido['country'];
                                       $full_name      = $extraido['full_name'];
                                       $company        = $extraido['company'];
                                       $street_address1= $extraido['street_address1'];
                                       $street_address2= $extraido['street_address2'];
                                       $city           = $extraido['city'];
                                       $statedir       = $extraido['statedir'];
                                       $zip_code       = $extraido['zip_code'];
                                       $default_address= $extraido['default_address'];
                                       if($default_address==1)
                                       {
                                          if($country=="US")
                                          {
                                          
                                              $country = "United States";
                                          }
                                          if($country=="MX")
                                          {
                                              $country = "Mexico";
                                          }
                                           echo $street_address1." ".$street_address2.", ".$city.", ". $statedir." ".$zip_code.", ".$country;
                                           mysqli_close($conexion);
                                           break;
                                       }
                                   }
                               }
                              ?>
                          </td>
                      </tr>
                      <tr>
                          <td>
                            Direccion de facturación
                          <span id="billing-address-book-app">&nbsp;
                              <span id="shipping-address-book-app">&nbsp;
                                  <button class="button link edit" type="button" onclick="Billing_Address()">Editar</button>
                              </span>
                          </td>
                          <td style="float: right;"></td>
                      </tr><!--
                      <tr id="payment-method-app">
                          <td>Default payment method&nbsp;<button class="button link edit" type="button">Edit</button><div class="modal-container" id="payment-method-modal" tabindex="-1"><div aria-label="Modal" aria-modal="true" class="modal-content-wrapper" role="dialog"><div class="modal-content"><div id="payment-methods-list"><h2><span>Edit payment methods</span><img class="seal" src="https://ssl.comodo.com/images/trusted-site-seal.png"></h2><ul></ul><p class="add-new"><button type="button" class="link">Add a new payment method</button></p></div><button class="modal-close-x" type="button">×</button></div><div class="modal-bg-close" role="presentation"></div></div><div class="modal-bg-close" role="presentation"></div></div></td><td></td></tr>
                          -->
                      <tr style="display:none;visibility:hidden;">
                          <td>
                          Measurement system
                          <button class="button link edit" type="button" onclick="measurement_system()">Editar</button>
                          </td>
                          <td style="float: right;">
                              <?php
                                  include 'php/conexion.php';
                                  $query = "SELECT * FROM users WHERE id='$id_user'";
                                  $result = mysqli_query($conexion,$query);
                                  if(mysqli_num_rows($result)>0)
                                  {
                                      while ($extraido= mysqli_fetch_array($result))
                                      {
                                          $id             = $extraido['id'];
                                          $country        = $extraido['country'];
                                          $full_name      = $extraido['full_name'];
                                          $company        = $extraido['company'];
                                          $street_address1= $extraido['street_address1'];
                                          $street_address2= $extraido['street_address2'];
                                          $city           = $extraido['city'];
                                          $statedir       = $extraido['statedir'];
                                          $zip_code       = $extraido['zip_code'];
                                          $default_address= $extraido['default_address'];
                                          $measurement 	= $extraido['measurement'];
                                      }
                                  }
                                  if($measurement==0)
                                  {
                                      ?>
                                          Imperial (i.e. inches)
                                      <?php
                                  }else
                                  {
                                      ?>
                                          Metric (i.e. millimeters) 
                                      <?php
                                  }
                                  ?>
                          
                          </td>
                      </tr><!--
                      <tr>
                          <td>
                          Freebies
                          <a href="javascript:" class="button tiny primary edit" data-reveal-id="edit-freebies-modal">Edit</a>
                          </td>
                          <td>On</td>
                      </tr>-->
                      </tbody>
                  </table>
            </section>
          </div>
          <!-- End Left contact -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Contact Area -->

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

