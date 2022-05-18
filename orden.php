<?php
    session_start();
    $delivery_date  = $_GET["deliverytime"];
    $address        = $_GET["address"];
    $name           = $_GET["name"];
    $email          = $_GET["email"];
    $envio          = $_GET["envio"];   
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
        function add_account()
        {
            var modal = document.getElementById("new_account");
            modal.style.display = "flex";
        }
        function Close_add_account()
        {
            var modal = document.getElementById("new_account");
            modal.style.display = "none";
            Phone_number();
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
         var input = document.querySelector("#telephone");
        window.intlTelInput(input,({   }));
        $("#telephone").intlTelInput({   });
    </script>
</head>
<body data-spy="scroll" data-target="#navbar-example" class="estaciones">
<?php include "header.php"; 
    if(isset($_GET["deliverytime"]))
    {
        $_SESSION["delivery_date"]  = $delivery_date;
        $_SESSION["address"]        = $address;
        $_SESSION["nameA"]           = $name;
        $_SESSION["emailA"]          = $email;       
    }?>
    <main class="paper">
    
        <section class="container" style="width: min-content;">
            <div  class="py-5 container" style="padding-top: 150px;">
            <?php
                 if($envio == "con")
                 {
                 ?>
                    <div class="content-left" style="text-align: center;margin: 0% !important;">
                        <h1>Gracias</h1>
                        <?php
                        if(isset($_GET["enviotarde"]))
                        {
                            ?>
                                <span style="font-family: 'Regular' !important;text-align: center;width: 100%;font-weight: bold !important;color: red !important;" class=" fill_content">La fecha de entrega para el dia <?php echo $delivery_date;?> pueder verse modificada debido al metodo de pago que elegiste, realiza tu pago y espera la verificacion del mismo </span>  
                            <?php
                        }
                        else
                        {
                            ?>
                                <span style="font-family: 'Regular' !important;text-align: center;width: 100%;font-weight: bold !important;color: red !important;" class=" fill_content">Tu orden estara lista el <?php echo $delivery_date;?></span>  
                            <?php
                        }
                        ?>
                    </div>
                    <div class="content-right py-5" style="border: 2px solid #e5e5e5;position: relative;float: none !important;">
                        <div style="padding: 20px;">
                            <?php
                                include 'php/conexion.php';
                                $validar  = mysqli_query($conexion,"SELECT * FROM address_t  WHERE id='$address'");
                                if(mysqli_num_rows($validar)>0)
                                {
                                    $extraido= mysqli_fetch_array($validar);
                                    $id              = $extraido['id'];
                                    $id_user         = $extraido ['id_user'];
                                    $country         = $extraido['country'];
                                    $full_name       = $extraido ['full_name'];
                                    $company         = $extraido['company'];
                                    $street_address1 = $extraido ['street_address1'];
                                    $street_address2 = $extraido['street_address2'];
                                    $city            = $extraido ['city'];
                                    $zip_code        = $extraido['zip_code'];
                                    $statedir        = $extraido['statedir'];
                                    mysqli_close($conexion);
                                }
                            ?>
                            <h3 class="fill_content">Enviar a: </h3>
                            <span class="price push-left fill_content"><?php echo $company;?>&nbsp;</span>
                            <span class="price push-left fill_content"><?php echo $full_name;?></span>
                            <span class="price push-left fill_content"><?php echo $street_address1." ".$street_address2;?></span>
                            <span class="price push-left fill_content"><?php echo $city." ".$statedir." ".$zip_code;?></span>
                            <span class="price push-left fill_content"><?php echo $country;?></span>
                        </div>
                    </div>
                 <?php
                 }
                 if($envio == "sin")
                 {
                 ?>
                    <div class="content-left" style="text-align: center;width: 100%;">
                        <h1>Gracias</h1>
                        <?php
                        if(isset($_GET["enviotarde"]))
                        {
                            if($_GET["enviotarde"]=="true")
                            {
                                ?>
                                    <span style="font-family: 'Regular' !important;text-align: center;width: 100%;font-weight: bold !important;color: red !important;" class=" fill_content">La fecha de entrega para el día <?php echo $delivery_date;?> puede verse modificada debido al método de pago que elegiste, realiza tu pago y espera la verificación del mismo</span>  
                                <?php
                            }
                            if($_GET["enviotarde"]=="false")
                            {
                                ?>
                                    <span style="font-family: 'Regular' !important;text-align: center;width: 100%;font-weight: bold !important;color: red !important;" class=" fill_content">La fecha de entrega para el día <?php echo $delivery_date;?> puede verse modificada debido al método de pago que elegiste, una vez verificado el pago tu orden será procesada</span>  
                                <?php
                            }
                        }
                        else
                        {
                            ?>
                                <span style="font-family: 'Regular' !important;text-align: center;width: 100%;font-weight: bold !important;color: red !important;" class=" fill_content">Tu orden estara lista el <?php echo $delivery_date;?></span>  
                            <?php
                        }
                        ?>
                    </div>
                 <?php
                 }
                 ?>
            </div>
        </section>
        <section class="products container" style="background-color: #ffffff;width: min-content;">
            <div class="container" style="display: flex;">
                <div class="wrapper" style="width: 100%; ">
                    <div class="grid3 grid_product">
                        <div class="wrapperproducts_sin text-dark" style="padding: 10px 0 10px 0;width: 100%;display: inline-block;">
                            <div class="image_car" style="height: 89px;display: contents;">
                                <img src="/img/Gracias.png" srcset="" height="80" style="margin: auto;display: flex;">
                            </div>
                            <h3 style="text-align: center;display: block;">Reordena tus tarjetas rapidamente</h3>
                            <p style="text-align: center;font-size: 1rem;color: black !important;display: block;">Disfruta de un tiempo de respuesta más rápido al realizar un pedido</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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