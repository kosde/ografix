<?php
/*
    session_start();
    include 'php/conexion.php';
    $tipo = $_SESSION['tipo'];
    $medida = explode('x',$_SESSION['medida']);// $_SESSION['medida'];
    $quantity = $_SESSION['quantity'];
    $vista = $_SESSION['vista'];
    $acabado = $_SESSION['acabado'];
    $redond = $_SESSION['redond'];
    $filename = $_SESSION['filename'];
    $producto = $_SESSION['producto'];
    $precioproducto = $_SESSION['precioproducto'];
    $preciofinal = $_SESSION['preciofinal'];
    $precioesquinas = $_SESSION['precioesquinas'];
    $corte = $_SESSION['corte'];
    $width = $medida[0];
    $height = $medida[1];
    if($_SESSION['producto'] == "Tarjetas")
    {
        $lados = $_SESSION['lado1'].$_SESSION['lado2'].$_SESSION['lado3'].$_SESSION['lado4'];
        $ponchado =  $_SESSION['perfo1'].$_SESSION['perfo2'].$_SESSION['perfo3'].$_SESSION['perfo4'].$_SESSION['perfo5'].$_SESSION['perfo6'].$_SESSION['perfo7'].$_SESSION['perfo8'];
        $_SESSION['lados'] = $lados;
        $_SESSION['ponchado'] = $ponchado;
    }
    $id =  $_SESSION['id'];
    $date = date('Y-m-d H:i'); 
    $query_cart = "INSERT INTO cart (id_user,width_inches,height_inches,price,tipe,quantity,dates,vista,acabado,esquinas,ponchado,corte,statusp) 
                VALUES('$id','$width','$height','$preciofinal','$producto','$quantity','$date','$vista','$acabado','$lados','$ponchado','$corte',12)";
    if($_SESSION['subir'] == 1)
    {
        $cart= mysqli_query($conexion,$query_cart);
        $_SESSION['subir'] = 0;
    }
    $_SESSION['producto'] = "Diseño de tarjetas";
    
    */
    /* ----------------------------------------------------------------------------------------------------------------------------- */
    session_start();
    $datezone=date_default_timezone_get();
    include 'php/conexion.php';

    if(!isset($_SESSION['id']))
    {
        $date = date('Y-m-d H:i');
        $query = "INSERT INTO users (temporal,date_create)VALUES('1','$date')";            
        $ejecutar = mysqli_query($conexion,$query);
        $_SESSION['id'] = mysqli_insert_id ($conexion);
    }
        $tipo = $_SESSION['tipo'];
        $medida = explode('x',$_SESSION['medida']);// $_SESSION['medida'];
        $quantity = $_SESSION['quantity'];
        $vista = $_SESSION['vista'];
        $acabado = $_SESSION['acabado'];
        $redond = $_SESSION['redond'];
        $filename = $_SESSION['filename'];
        $producto = $_SESSION['producto'];
        $precioproducto = $_SESSION['precioproducto'];
        $preciofinal = $_SESSION['preciofinal'];
        $precioesquinas = $_SESSION['precioesquinas'];
        $corte = $_SESSION['corte'];
        $width = $medida[0];
        $height = $medida[1];
        $id =  $_SESSION['id'];
        $date = date('Y-m-d H:i');
        if($_SESSION['producto'] == "Tarjetas")
        {
            $lados = $_SESSION['lado1'].$_SESSION['lado2'].$_SESSION['lado3'].$_SESSION['lado4'];
            $ponchado =  $_SESSION['perfo1'].$_SESSION['perfo2'].$_SESSION['perfo3'].$_SESSION['perfo4'].$_SESSION['perfo5'].$_SESSION['perfo6'].$_SESSION['perfo7'].$_SESSION['perfo8'];
            $query_cart = "INSERT INTO cart (id_user,width_inches,height_inches,price,tipe,quantity,dates,vista,acabado,esquinas,ponchado,corte,statusp) 
                                VALUES('$id','$width','$height','$preciofinal','$producto','$quantity','$date','$vista','$acabado','$lados','$ponchado','$corte',12)";
        }
        if($_SESSION['subir'] == 1)
        {
            $cart= mysqli_query($conexion,$query_cart);
            $_SESSION['subir'] = 0;
        }
        $_SESSION['producto'] = "Diseño de tarjetas";
        
        
        $cart= mysqli_query($conexion,$query_cart);
        //mysqli_close($conexion);     
    
?>
<!DOCTYPE html>
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
    <link href="upload_file/dist/css/jquery.dm-uploader.min.css" rel="stylesheet">
    <link href="upload_file/upload_file/styles.css" rel="stylesheet"> <!--checar aqui--->
</head>
<body>

<?php
    include "header.php";
  ?>
    <main>
    <?php
        echo'
            <script>
                window.location = "../carrito.php";
            </script>
            ';
    ?>
    </main>
<?php include "footer.php"; ?>
<script src="js/jquery-3.5.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="js/bootsnav/bootsnav.js"></script>
<script src="js/script.js"></script>
</body>
</html>