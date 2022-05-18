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
</head>
<body data-spy="scroll" data-target="#navbar-example" class="estaciones">
<?php  include "header.php";?>
<div id="subnav" class="container" style="width: min-content;margin: auto;">   
        <div class="container" style="--subnav-scroll-left-width:0px; --subnav-scroll-right-width:0px;">
            <div class="subnav-menu">
                <ul class="subnav-menu-tabs">
                    <a class="a-subnav-menu" href="perfil"><li class=" li-subnav ">Perfil</li></a>
                    <a class="a-subnav-menu" href="ordenes"  >  <li class="li-subnav ">Ordenes</li></a>
                    <a class="a-subnav-menu" href="reordenes">       <li class="li-subnav ">Reordenes</li></a>      
                    <a class="a-subnav-menu" href="trabajos" style="color: #202020;">      <li class="li-subnav active">Trabajos</li></a>     
                    <a class="a-subnav-menu" href="notificaciones"> <li class="li-subnav">Notificaciones</li></a>
                </ul>
            </div>
        </div>
    </div>
    <main class="container" style="width: min-content;margin: auto;">
            
        <?php
            include "php/conexion.php";
            $validar  = mysqli_query($conexion,"SELECT * FROM artworks  WHERE id_user ='$id_user'");
            if(mysqli_num_rows($validar)==0)
            {
        ?>
            <section class="container"   style="height: 100vh;">
                <div style="">
                    <h1 style="font-size: 2.5rem;margin-bottom: 0;">Diseños</h1>
                    <label for="message" class="labelfiel font-light" style="width: 90%;">Aun no hay diseños</label>
                </div>
            </section>
        <?php
            }
            if(mysqli_num_rows($validar)>0)
            {
        ?>
            <section class="container"   style="height: 100vh;">
                <div class="grid3" style="padding-top: 100px;">
                    <?php
                    //id 	id_user 	name_image 	width_inches 	height_inches 	dates 	tipe 	link 
                    while($extraido= mysqli_fetch_array($validar))
                    {
                        $id            = $extraido['id'];
                        $id_user       = $extraido ['id_user'];
                        $name_image    = $extraido['name_image'];
                        $width_inches  = $extraido['width_inches'];
                        $height_inches = $extraido ['height_inches'];
                        $date          = $extraido['dates'];
                        $tipe          = $extraido ['tipe'];
                        $link          = $extraido['link'];
                        ?>
                        <div class="wrapperproducts_sin" style="width: fit-content;margin: 10px;display: inline-block;">
                            <div class="image" style="padding-bottom: 15px;width: max-content;">
                                <img style=" filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.7));padding-right: 10px;" src="<?php echo $link; ?>" width="200">
                                <div style="width: max-content;float: right;">
                                    <label class="regular font-light" style="margin: 0;"><?php echo $tipe;?></label> <br>
                                    <label class="regular font-light" style="margin: 0;"><?php echo $name_image;?></label> <br>
                                    <label class="regular font-light" style="margin: 0;"><?php echo $width_inches."cm x ".$height_inches."cm ";?></label>
                                </div>
                            </div>                            
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </section>
        <?php
            }
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
