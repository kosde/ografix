<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="../img/ICONO.png"> 
	

	<title>ografix</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<!--<link rel="canonical" href="https://demo.adminkit.io/" />
	<script src="js/settings.js"></script>-->
	<script src="https://kit.fontawesome.com/a38c16a07e.js"></script>
	<script>
        function removefile(id)
        {
            document.getElementById("imgInp"+id).value = null;
            document.getElementById("img"+id).src="";
            var oculta ="removefile_id"+id;
            $('#'+oculta).hide();
        }
        function inputf(input,id) 
        {
            if (input.files && input.files[0]) 
            {
                var reader = new FileReader();
                reader.onload = function(e) {
                var imagen="img"+id;
                $('#'+imagen).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
            $('#removefile_id'+id).css("display", "");
        }
        function preprensa_alert(id)
        {
			var form_data = new FormData();  
            var email = document.getElementById('email'+id).value;
            var name = document.getElementById('name'+id).value;
			var id_order = document.getElementById('id_order').value;
			var id_user = document.getElementById('id_user').value;

            form_data.append('email', email);
            form_data.append('name', name);
            form_data.append('id', id_user);
			form_data.append('id_order', id_order);
			console.log(id_order);
			console.log(id_user);
			console.log(name);
			console.log(email);
            $.ajax({
                type: 'POST',
                url: 'priv/3_preprensa.php',
                contentType: false,
                processData: false,
                data: form_data,
                success:function(response) 
				{
					$("#buttons_status").load(location.href + " #buttons_status>*", "");
					document.getElementById('printB_'+id).disabled=true;
                },
                onFailure: function(response){
                    alert("fail");
                }
            });
        }
		function star(id,star)
        {
            var form_data = new FormData();
            form_data.append('id_order', id);
			form_data.append('star', star);
            $.ajax({
                type: 'POST',
                url: 'priv/star.php',
                contentType: false,
                processData: false,
                data: form_data,
                success:function(response) {
					$("#orden_main").load(location.href + " #orden_main>*", "");
                },
                onFailure: function(response){
                    alert("fail");
                }
            });
        }
		function archivar(id,star,reload)
        {
			console.log(reload);
            var form_data = new FormData();
            form_data.append('id_order', id);
			form_data.append('star', star);
            $.ajax({
                type: 'POST',
                url: 'priv/archivar.php',
                contentType: false,
                processData: false,
                data: form_data,
                success:function(response) {
					$("#orden_main").load(location.href + " #orden_main>*", "");
                },
                onFailure: function(response){
                    alert("fail");
                }
            });
        }
		function impresion_alert(id)
        {
			var form_data = new FormData();  
            var email = document.getElementById('email'+id).value;
            var name = document.getElementById('name'+id).value;
			var id_order = document.getElementById('id_order').value;
			var id_user = document.getElementById('id_user').value;

            form_data.append('email', email);
            form_data.append('name', name);
            form_data.append('id', id_user);
			form_data.append('id_order', id_order);
			console.log(id_order);
			console.log(id_user);
			console.log(name);
			console.log(email);
            $.ajax({
                type: 'POST',
                url: 'priv/4_impresion.php',
                contentType: false,
                processData: false,
                data: form_data,
                success:function(response) 
				{
					//location.reload();
					$("#buttons_status").load(location.href + " #buttons_status>*", "");
					document.getElementById('printB_'+id).disabled=true;
					/*document.getElementById('printB_'+id).style.backgroundColor="azure";
					document.getElementById('printB_'+id).style.color="darkgray";*/
					//var name = document.getElementById('printB_'+id).value;//printB_
                },
                onFailure: function(response){
                    alert("fail");
                }
            });
        }
		function acabados_alert(id)
        {
			var form_data = new FormData();  
            var email = document.getElementById('email'+id).value;
            var name = document.getElementById('name'+id).value;
			var id_order = document.getElementById('id_order').value;
			var id_user = document.getElementById('id_user').value;

            form_data.append('email', email);
            form_data.append('name', name);
            form_data.append('id', id_user);
			form_data.append('id_order', id_order);
			console.log(id_order);
			console.log(id_user);
			console.log(name);
			console.log(email);
            $.ajax({
                type: 'POST',
                url: 'priv/5_acabado.php',
                contentType: false,
                processData: false,
                data: form_data,
                success:function(response) 
				{
					//location.reload();
					$("#buttons_status").load(location.href + " #buttons_status>*", "");
					document.getElementById('printB_'+id).disabled=true;
					/*document.getElementById('printB_'+id).style.backgroundColor="azure";
					document.getElementById('printB_'+id).style.color="darkgray";*/
					//var name = document.getElementById('printB_'+id).value;//printB_
                },
                onFailure: function(response){
                    alert("fail");
                }
            });
        }
		function listo_alert(id)
        {
			var form_data = new FormData();  
            var email = document.getElementById('email'+id).value;
            var name = document.getElementById('name'+id).value;
			var id_order = document.getElementById('id_order').value;
			var id_user = document.getElementById('id_user').value;

            form_data.append('email', email);
            form_data.append('name', name);
            form_data.append('id', id_user);
			form_data.append('id_order', id_order);
			console.log(id_order);
			console.log(id_user);
			console.log(name);
			console.log(email);
            $.ajax({
                type: 'POST',
                url: 'priv/6_listo.php',
                contentType: false,
                processData: false,
                data: form_data,
                success:function(response) 
				{
					//location.reload();
					$("#buttons_status").load(location.href + " #buttons_status>*", "");
					document.getElementById('printB_'+id).disabled=true;
					/*document.getElementById('printB_'+id).style.backgroundColor="azure";
					document.getElementById('printB_'+id).style.color="darkgray";*/
					//var name = document.getElementById('printB_'+id).value;//printB_
                },
                onFailure: function(response){
                    alert("fail");
                }
            });
        }
		function enviado_alert(id)
        {
			var form_data = new FormData();  
            var email = document.getElementById('email'+id).value;
            var name = document.getElementById('name'+id).value;
			var id_order = document.getElementById('id_order').value;
			var id_user = document.getElementById('id_user').value;

            form_data.append('email', email);
            form_data.append('name', name);
            form_data.append('id', id_user);
			form_data.append('id_order', id_order);
			console.log(id_order);
			console.log(id_user);
			console.log(name);
			console.log(email);
            $.ajax({
                type: 'POST',
                url: 'priv/7_enviado.php',
                contentType: false,
                processData: false,
                data: form_data,
                success:function(response) 
				{
					//location.reload();
					$("#buttons_status").load(location.href + " #buttons_status>*", "");
					document.getElementById('printB_'+id).disabled=true;
					/*document.getElementById('printB_'+id).style.backgroundColor="azure";
					document.getElementById('printB_'+id).style.color="darkgray";*/
					//var name = document.getElementById('printB_'+id).value;//printB_
                },
                onFailure: function(response){
                    alert("fail");
                }
            });
        }
		function DownloadPDF(id)
        {
			var win = window.open('https://ografix.com/admin/priv/tarjetasPDF.php?order='+id, '_blank');
			win.focus();
			/*var form_data = new FormData();  
            form_data.append('id', id);
            $.ajax({
                type: 'POST',
                url: 'priv/tarjetasPDF.php',
                contentType: false,
                processData: false,
                data: form_data,
                success:function(response) {
					console.log("success");
                },
                onFailure: function(response){
                    alert("fail");
                }
            });*/
        }
        function Traking_number(id)
        {
			//alert(id);
			var email = document.getElementById('email'+id).value;
            var name = document.getElementById('name'+id).value;
            var traking_n = document.getElementById('traking_n'+id).value;
			var id_user = document.getElementById('id_user').value;
			var id_order = document.getElementById('id_order').value;
			
            var form_data2 = new FormData();                  
			
            form_data2.append('email', email);//
            form_data2.append('name', name);//
            form_data2.append('id_user', id_user);//
            form_data2.append('traking_n', traking_n);//
			form_data2.append('id_order', id_order);//
            $.ajax({
                type: 'POST',
                url: 'priv/shipping_email.php',
                contentType: false,
                processData: false,
                data: form_data2,
                success:function(response) {
						$("#buttons_status").load(location.href + " #buttons_status>*", "");
                       var traking_n = document.getElementById('traking_n'+id).value="";
                       document.getElementById('traking_b'+id).disabled=true;
                },
                onFailure: function(response){
                }
            });

        }
		function Entregado(id)
        {
			//alert(id);
			/*var email = document.getElementById('email'+id).value;
            var name = document.getElementById('name'+id).value;
            var traking_n = document.getElementById('traking_n'+id).value;
			var id_user = document.getElementById('id_user').value;*/
			var id_order = document.getElementById('id_order').value;
            var form_data2 = new FormData();                  
			
            /*form_data2.append('email', email);//
            form_data2.append('name', name);//
            form_data2.append('id_user', id_user);//
            form_data2.append('traking_n', traking_n);//*/
			form_data2.append('id_order', id_order);//
            $.ajax({
                type: 'POST',
                url: 'priv/entregado.php',
                contentType: false,
                processData: false,
                data: form_data2,
                success:function(response) {
						$("#buttons_status").load(location.href + " #buttons_status>*", "");
						var traking_n = document.getElementById('entregado_b_'+id).value="";
						document.getElementById('entregado_b_'+id).disabled=true;
						document.getElementById('entregado_b_'+id).style.backgroundColor="azure";
						document.getElementById('entregado_b_'+id).style.color="darkgray";
                    	window.location = "orders.php";
                },
                onFailure: function(response){
                }
            });

        }
		function Pagado(id)
        {
			//alert(id);
			/*var email = document.getElementById('email'+id).value;
            var name = document.getElementById('name'+id).value;
            var traking_n = document.getElementById('traking_n'+id).value;
			var id_user = document.getElementById('id_user').value;*/
			var id_order = document.getElementById('id_order').value;
            var form_data2 = new FormData();                  
			
            /*form_data2.append('email', email);//
            form_data2.append('name', name);//
            form_data2.append('id_user', id_user);//
            form_data2.append('traking_n', traking_n);//*/
			form_data2.append('id_order', id_order);//
            $.ajax({
                type: 'POST',
                url: 'priv/pagado.php',
                contentType: false,
                processData: false,
                data: form_data2,
                success:function(response) {
						$("#buttons_status").load(location.href + " #buttons_status>*", "");
						var traking_n = document.getElementById('entregado_b_'+id).value="";
						document.getElementById('entregado_b_'+id).disabled=true;
						document.getElementById('entregado_b_'+id).style.backgroundColor="azure";
						document.getElementById('entregado_b_'+id).style.color="darkgray";
                    	//window.location = "orders.php";
						location.reload();
                },
                onFailure: function(response){
                }
            });

        }
        function ajax_file_upload(file_obj) 
        {

            var form_data = new FormData();                  
            form_data.append('file', file_obj);//
            form_data.append('image_text', texto);//
            $.ajax({
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt){
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            updateProgress(1,percentComplete*100*2);
                            console.log(percentComplete);
                        }
                }, false);                        
                return xhr;
                },
                type: 'POST',
                url: '../../php/upload_file_drop.php',
                contentType: false,
                processData: false,
                data: form_data,
                success:function(response) {
                       alert("success");
                },
                onFailure: function(response){
                    alert("fail");
                }
            });
        }
        function SendProof(id)
        {
            /*
				$link       = $_POST['link'];
				$coment     = $_POST['coment'];
				$id_order   = $_POST['id_order'];
				$email      = $_POST['email'];
				$name       =$_POST['name'];
				$code       =$_POST['phone'];
				$phone      =$_POST['code'];//id_user
            	$id_user      =$_POST['id_user'];link2
				basename
            */
            var link = document.getElementById("txt"+id).value;
            var coment = document.getElementById("coment"+id).value;
            var id_order = id;
            var email = document.getElementById("email"+id).value;
            var name = document.getElementById("nameU"+id).value;
            var code = document.getElementById("code"+id).value;
            var phone = document.getElementById("phone"+id).value;
            var id_user = document.getElementById("id_user"+id).value;
            var link2 = document.getElementById("link2"+id).value;
			var basename = document.getElementById("basename"+id).value;

            var form_data = new FormData();
            form_data.append('link',link);
            form_data.append('coment',coment);
            form_data.append('id_order',id_order);
            form_data.append('email',email);
            form_data.append('name',name);
            form_data.append('code',code);
            form_data.append('phone',phone);
            form_data.append('id_user',id_user);
            form_data.append('link2',link2);
            form_data.append('basename',basename);

            $.ajax({
                type: 'POST',
                url: '../../php/sendproof.php',
                contentType: false,
                processData: false,
                data: form_data,
                success:function(response) {
                    document.getElementById("button"+id).innerHTML="Listo!";
                },
                onFailure: function(response){
                    alert("fail");
                }
            });
        }
		function Send_emails()
		{
			$.ajax({
                type: 'POST',
                url: 'priv/send_emails.php',
                contentType: false,
                processData: false,
                success:function(response) {
                       //alert("success");
                },
                onFailure: function(response){
                    //alert("fail");
                }
            });
		}
        function Download(id)
        {
			var src = document.getElementById("link2"+id).value;
            //var source = name.getAttribute('src'); link2
            //console.log(src);
			var source = src + ".png";
			//console.log(source);
			forceDownload(source,id)
           	//window.open(source, "Download");
            //      src="https://res.cloudinary.com/dgnrey9it/image/upload/co_white,e_outline:20:0/bomba.png"
        }
		function forceDownload(url, fileName){
			var xhr = new XMLHttpRequest();
			xhr.open("GET", url, true);
			xhr.responseType = "blob";
			xhr.onload = function(){
				var urlCreator = window.URL || window.webkitURL;
				var imageUrl = urlCreator.createObjectURL(this.response);
				var tag = document.createElement('a');
				tag.href = imageUrl;
				tag.download = fileName;
				document.body.appendChild(tag);
				tag.click();
				document.body.removeChild(tag);
			}
			xhr.send();
		}
    </script>
	<style>
		.zoom:hover {
			transform: scale(2);
		}
	</style>
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="dashboard.php">
          <span class="align-middle">ografix</span>
        </a>
		<script>
			document.addEventListener("DOMContentLoaded", function(event) { 
				//Send_emails();
				});
		</script>
				<ul class="sidebar-nav">
					<li class="sidebar-item">
						<a class="sidebar-link" href="dashboard.php">
							<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
						</a>
					</li>
					<li class="sidebar-item active">
						<a class="sidebar-link" href="orders.php">
							<i class="align-middle" data-feather="check-circle"></i> <span class="align-middle">Ordenes</span>
						</a>
					</li>
					
					<li class="sidebar-item">
						<a class="sidebar-link" href="customers.php">
							<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Clientes</span>
						</a>
					</li>
					<?php
					if($_SESSION['tipe_admi']  == 10)
					{
					?>
					<li class="sidebar-item">
						<a class="sidebar-link" href="sales.php">
							<i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Ventas</span>
						</a>
					</li>
					<?php
					}
					?>
					<li class="sidebar-item">
						<a class="sidebar-link" href="settings.php">
							<i class="align-middle" data-feather="settings"></i> <span class="align-middle">Configuración</span>
						</a>
					</li>
				</ul>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle d-flex">
          <i class="hamburger align-self-center"></i>
        </a>

				<form class="d-none d-sm-inline-block">
					<div class="input-group input-group-navbar">
						<input type="text" class="form-control" placeholder="Search…" aria-label="Search">
						<button class="btn" type="button">
              <i class="align-middle" data-feather="search"></i>
            </button>
					</div>
				</form>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator"></span>
								</div>
							</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
								<i class="align-middle" data-feather="settings"></i>
							</a>
							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
								<!--<img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded me-1" alt="<?php echo $_SESSION['e_admi'];?>" /> -->
								<?php
									if(isset($_SESSION['email_admi']))
									{
										if($_SESSION['source_admi'] == "google")
										{
									?>
												<img src="<?php echo ($_SESSION['avatar_admi']);?>"  class="avatar img-fluid rounded me-1" alt="<?php echo $_SESSION['e_admi'];?>" >
									<?php
										}
										if(isset($_SESSION['avatar_admi']) && $_SESSION['avatar_admi'] != null && !isset($_SESSION['source_admi']))
										{
									?>
												<img src="data:image/png;base64,<?php echo base64_encode($_SESSION['avatar_admi']);?>"  class="avatar img-fluid rounded me-1" alt="<?php echo $_SESSION['e_admi'];?>">
									<?php
										}
										if(!isset($_SESSION['avatar_admi']) || $_SESSION['avatar_admi'] == null )
										{
									?>
												<img src="/assets/avatar.png"  class="avatar img-fluid rounded me-1" alt="<?php echo $_SESSION['e_admi'];?>">
									<?php
										}
										?>
									<?php
									}
								?>
							</a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="settings.php"><i class="align-middle me-1" data-feather="user"></i> Settings</a>
								<a class="dropdown-item" href="#" style="display: none;visibility: hidden;"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="priv/logout.php">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content" id="orden_main">
				<div class="container-fluid p-0">

					<div class="row mb-2 mb-xl-3">
						<div class="col-auto d-none d-sm-block">
							<h3>Orden</h3>
						</div>
					</div>
					
					<div class="row">
						<div class="col-xl-12 col-xxl-12 d-flex">
							<div class="w-100">
								<div class="row">
								<?php
									if(isset($_SESSION['email_admi']))
									{
									?>
										<main style="position: relative;width: 100% !important;background-color:white;" >
											<div class="content">
												<div class="">
													<?php
													include "../php/conexion.php";
													require_once "../vendor/autoload.php";
													require_once "../config_cloud.php";
													$get_id = $_GET["order"];
													$query    = "SELECT * FROM orders WHERE id ='$get_id'";
													$result = mysqli_query($conexion,$query);
													if(mysqli_num_rows($result)>0)
													{
															while ($extraido= mysqli_fetch_array($result))
															{
																$id            = $extraido['id'];
																$id_user       = $extraido['id_user'];
																$width_inches  = $extraido['width_inches'];
																$height_inches = $extraido['height_inches'];
																$price         = $extraido['price'];
																$tipe          = $extraido['tipe'];
																$quantity      = $extraido['quantity'];
																$id_images     = $extraido['id_images'];
																$id_images_vuelta= $extraido['id_images_vuelta'];
																$txt_details   = $extraido['txt_details'];
																$date          = $extraido['dates'];
																$delivery_date = $extraido['delivery_date'];
																$statusp       = $extraido['statusp'];
																$id_address    = $extraido['id_address'];
																$guie          = $extraido['guie'];
																$shipping      = $extraido['shipping'];
																$envio  	   = $extraido['envio'];
																$vista 		   = $extraido['vista'];
																$acabado       = $extraido['acabado'];
																$esquinas      = $extraido['esquinas'];
																$ponchado      = $extraido['ponchado'];
																$corte         = $extraido['corte'];
																$id_control    = $extraido['id_control'];
																$pagado        = $extraido['pagado'];
																$n_referencia  = $extraido['n_referencia'];
																$star      	   = $extraido['star'];
																$archivar      = $extraido['archivar'];
																$query_user    = "SELECT * FROM users WHERE id='$id_user'";
																$result_user   = mysqli_query($conexion,$query_user);
																$extraido2     = mysqli_fetch_array($result_user);
																$name          = $extraido2['usrname'];
																$email         = $extraido2['email'];
																$code          = $extraido2['code'];
																$phone         = $extraido2['phone'];
																//id	id_user	country	full_name	company	street_address1	street_address2	city	zip_code	statedir
																$query_address = "SELECT * FROM address_t WHERE id='$id_address'";
																$result_address= mysqli_query($conexion,$query_address);
																$extraido3     = mysqli_fetch_array($result_address);
																$country       = $extraido3['country'];
																$full_name     = $extraido3['full_name'];
																$company       = $extraido3['company'];
																$street_address1= $extraido3['street_address1'];
																$street_address2= $extraido3['street_address2'];
																$city          = $extraido3['city'];
																$statedir      = $extraido3['statedir'];
																$zip_code      = $extraido3['zip_code'];
																$query_images  = "SELECT * FROM images WHERE id ='$id_images'";
																$result_images = mysqli_query($conexion,$query_images);
																$extraido4     = mysqli_fetch_array($result_images);
															?>
															
															<a style="float: right;" onclick="DownloadPDF(<?php echo $get_id;?>)">
																<i class="align-middle me-2" data-feather="printer"></i>
															</a>
															<div class="orderslist .col-md-12 " style="padding-bottom:100px;">
																<div class="col-md-12 d-inline-block">
																	<div class="col-md-4 d-inline-block">
																		<h2 class="col-md-3" style="display: inline-block;">Orden</h2>
																		<input type="text" value="<?php echo $get_id?>" id="id_order" style="display: none;">
																		<input type="text" value="<?php echo $id_user?>" id="id_user" style="display: none;">
																		<?php
																			if($archivar==0)
																			{
																				?>
																					<i class="align-middle me-2 far fa-fw fa-share-square" style="height: 20px;cursor:pointer; cursor: hand;" title="Restaurar" onclick="archivar(<?php echo $id?>,1,'marcados_<?php echo $id; ?>')"></i>
																				<?php
																			}
																			else
																			{
																				?>
																					<i class="align-middle me-2 fas fa-fw fa-share-square" style="height: 20px;font-weight: bold;cursor:pointer; cursor: hand;" title="Restaurar" onclick="archivar(<?php echo $id?>,0,'marcados_<?php echo $id; ?>')"></i>
																				<?php
																			}
																			if($star == 0)
																			{
																				?>
																					<i class="align-middle me-2 far fa-fw fa-star" style="height: 20px;color: darkorange;font-weight: lighter;cursor:pointer; cursor: hand;" onclick="star(<?php echo $id?>,1,'marcados_<?php echo $id; ?>')"></i>
																				<?php
																			}
																			else
																			{
																				?>
																					<i class="align-middle me-2 far fa-fw fa-star" style="height: 20px;color: darkorange;font-weight: bold;cursor:pointer; cursor: hand;" onclick="star(<?php echo $id?>,0,'marcados_<?php echo $id; ?>')"></i>
																				<?php
																			}
																		?>
																	</div>
																	<label class="col-md-6 ">
																		<h2 style="text-align: right;"><?php echo $id_control;?></h2>
																	</label>
																</div>																
																<h4 class="customerinfo">Informacion del cliente</h4>
																<div style="width: 250px;float: right;" id="buttons_status">
																	<?php
																		if( $_SESSION['d_admi'] == 1 ||$_SESSION['e_admi'] == 1 || $_SESSION['tipe_admi']  == 10)
																		{

																			if($statusp == 2) //aprobado
																			{															
																				?>
																					<button onclick="preprensa_alert(<?php echo $id;?>)" class="btn btn-warning" style="width: 100%;margin-bottom: 10px;" ><i class="fas fa-exclamation"></i> Alerta de preprensa</button>
																					<button onclick="impresion_alert(<?php echo $id;?>)" class="btn btn-warning" style="width: 100%;margin-bottom: 10px;" ><i class="fas fa-exclamation"></i> Alerta de impresión</button>
																					<button onclick="acabados_alert(<?php echo $id;?>)" class="btn btn-warning" style="width: 100%;margin-bottom: 10px;" ><i class="fas fa-exclamation"></i> Alerta de acabados</button>
																					<button onclick="listo_alert(<?php echo $id;?>)" class="btn btn-warning" style="width: 100%;margin-bottom: 10px;" ><i class="fas fa-exclamation"></i> Listo para recogerse</button>
																				<?php
																			}
																			if($statusp == 3) //preprensa
																			{															
																				?>
																					<button disabled onclick="preprensa_alert(<?php echo $id;?>)" class="btn btn-success" style="width: 100%;margin-bottom: 10px;" ><i class="fas fa-check"></i> Alerta de preprensa</button>
																					<button onclick="impresion_alert(<?php echo $id;?>)" class="btn btn-warning" style="width: 100%;margin-bottom: 10px;" ><i class="fas fa-exclamation"></i> Alerta de impresión</button>
																					<button onclick="acabados_alert(<?php echo $id;?>)" class="btn btn-warning" style="width: 100%;margin-bottom: 10px;" ><i class="fas fa-exclamation"></i> Alerta de acabados</button>
																					<button onclick="listo_alert(<?php echo $id;?>)" class="btn btn-warning" style="width: 100%;margin-bottom: 10px;" ><i class="fas fa-exclamation"></i> Listo para recogerse</button>
																				<?php
																			}
																			if($statusp == 4) //impresion
																			{															
																				?>
																					<button disabled onclick="preprensa_alert(<?php echo $id;?>)" class="btn btn-success" style="width: 100%;margin-bottom: 10px;" ><i class="fas fa-check"></i> Alerta de preprensa</button>
																					<button disabled onclick="impresion_alert(<?php echo $id;?>)" class="btn btn-success" style="width: 100%;margin-bottom: 10px;" ><i class="fas fa-check"></i> Alerta de impresión</button>
																					<button onclick="acabados_alert(<?php echo $id;?>)" class="btn btn-warning" style="width: 100%;margin-bottom: 10px;" ><i class="fas fa-exclamation"></i> Alerta de acabados</button>
																					<button onclick="listo_alert(<?php echo $id;?>)" class="btn btn-warning" style="width: 100%;margin-bottom: 10px;" ><i class="fas fa-exclamation"></i> Listo para recogerse</button>
																				<?php
																			}
																			if($statusp == 5) //acabados
																			{
																				?>
																					<button disabled onclick="preprensa_alert(<?php echo $id;?>)" class="btn btn-success" style="width: 100%;margin-bottom: 10px;" ><i class="fas fa-check"></i> Alerta de preprensa</button>
																					<button disabled onclick="impresion_alert(<?php echo $id;?>)" class="btn btn-success" style="width: 100%;margin-bottom: 10px;" ><i class="fas fa-check"></i> Alerta de impresión</button>
																					<button disabled onclick="acabados_alert(<?php echo $id;?>)" class="btn btn-success" style="width: 100%;margin-bottom: 10px;" ><i class="fas fa-check"></i> Alerta de acabados</button>
																					<button onclick="listo_alert(<?php echo $id;?>)" class="btn btn-warning" style="width: 100%;margin-bottom: 10px;" ><i class="fas fa-exclamation"></i> Listo para recogerse</button>
																				<?php
																			}
																			if($statusp == 6) //listo para recoger
																			{
																				?>
																					<button onclick="enviado_alert(<?php echo $id;?>)" class="btn btn-warning" style="width: 100%;margin-bottom: 10px;" ><i class="fas fa-exclamation"></i> Enviado</button>
																					<label style="width: 100%;margin-bottom: 10px;text-align: center;">ó</label>
																					<button onclick="Entregado(<?php echo $id;?>)" class="btn btn-warning" style="width: 100%;margin-bottom: 10px;" ><i class="fas fa-exclamation"></i> Entregado</button>
																				<?php
																			}
																			if($statusp == 7) //enviado
																			{
																				?>
																					<button disabled onclick="enviado_alert(<?php echo $id;?>)" class="btn btn-success" style="width: 100%;margin-bottom: 10px;" ><i class="fas fa-check"></i> Enviado</button>
																					<button onclick="Entregado(<?php echo $id;?>)" class="btn btn-warning" style="width: 100%;margin-bottom: 10px;" ><i class="fas fa-exclamation"></i> Entregado</button>
																				<?php
																			}
																			if($statusp == 9) //entregado
																			{
																				?>
																					<button disabled class="btn btn-success" style="width: 100%;margin-bottom: 10px;" ><i class="fas fa-check"></i> Entregado</button>
																				<?php
																			}
																			if($statusp == 13 || $statusp == 14)
																			{
																				?>
																					<input class="button yellow large pr-4" style="width: 100%;margin-bottom: 10px;" id="entregado_b_<?php echo $id;?>" onclick="Pagado(<?php echo $id;?>)" type="button" value="Pagado">
																				<?php
																			}
																		}
																	?>
																</div>
																<div>
																	<div class="dataorder" style="display: grid;">
																		<label class="campos">Nombre:</label><small class="field-help-message dateuser">&nbsp;&nbsp; <?php echo $name;?></small>
																		<input type="text" id="name<?php echo $id;?>" style="display: none;" name ="name"value="<?php echo $name;?>">
																		<input type="text" name="id_order" value="<?php echo $id;?>" style="display: none;" >
																		<input type="text" name="email" id="email<?php echo $id;?>" value="<?php echo $email;?>" style="display: none;">
																		<input type="text" name="id_user" id="id_user<?php echo $id;?>" value="<?php echo $id_user;?>" style="display: none;">
																		<label class="campos">Correo:</label><small class="field-help-message dateuser">&nbsp;&nbsp; <?php echo $email;?></small>
																		<label class="campos">Telefono:</label><small class="field-help-message dateuser">&nbsp;&nbsp; <?php echo $phone;?></small>
																	</div>
																	<h4 style="text-align: center;">Detalles de la orden</h4>
																	<div class="dataorder" style="padding: 10px 0 10px 0;margin: 30px 0 30px 0;">
																		<label class="campos">Fecha de la orden:</label><small class="field-help-message dateuser" style="width: 80%;">&nbsp;&nbsp; <?php echo $date;?></small><br>
																		<label class="campos">Fecha de entrega:</label><small class="field-help-message dateuser" style="width: 80%;">&nbsp;&nbsp; <?php echo $delivery_date;?></small><br>
																		
																		<?php
																		/*if($n_referencia != "")
																		{
																			echo "<label class='campos'>N° de referencia:</label>
																				  <small class='field-help-message dateuser' style='width: 80%;'>&nbsp;&nbsp;". $n_referencia ."</small><br>";
																		}*/
																		?>
																		<label class="campos">
																			<small class="field-help-message dateuser" style="width: 80%;">
																			<?php
																				if($vista == "frentevuelta")
																				{
																					$FrenteOVuelta = "4/4";
																				}
																				else
																				{
																					$FrenteOVuelta = "4/0";
																				}
																				if($corte == "si")
																				{
																					$corteT = "<br>Corte";
																				}
																				else
																				{
																					$corteT = "";
																				}
																				if($tipe == "Tarjetas")
																				{
																					$produc = "TDV";
																					if($acabado == "mate")
																					{
																						$terminado = "MAT";
																					}
																					else
																					{
																						$terminado = "BUV";
																					}
																					
																		
																					$esquinas = str_split($esquinas);
																					if($esquinas[0] == 1)
																					{
																						$esq1 = 1;
																					}
																					else
																					{
																						$esq1 = "";
																					}
																					if($esquinas[1] == 1)
																					{
																						$esq2 = 2;
																					}
																					else
																					{
																						$esq2 = "";
																					}
																					if($esquinas[2] == 1)
																					{
																						$esq3 = 3;
																					}
																					else
																					{
																						$esq3 = "";
																					}
																					if($esquinas[3] == 1)
																					{
																						$esq4 = 4;
																					}
																					else
																					{
																						$esq4 = "";
																					}
																					if($esq1!="" || $esq2!="" || $esq3!="" || $esq4!="")
																					{
																						$codigo_esqred = "ER".$esq1.$esq2.$esq3.$esq4;
																					}else{
																						$codigo_esqred = "";
																					}
																		
																		
																					$ponchado = str_split($ponchado);
																					if($ponchado[0] == 1)
																					{
																						$ponch1 = 1;
																					}
																					else
																					{
																						$ponch1 = "";
																					}
																					if($ponchado[1] == 1)
																					{
																						$ponch2 = 2;
																					}
																					else
																					{
																						$ponch2 = "";
																					}
																					if($ponchado[2] == 1)
																					{
																						$ponch3 = 3;
																					}
																					else
																					{
																						$ponch3 = "";
																					}
																					if($ponchado[3] == 1)
																					{
																						$ponch4 = 4;
																					}
																					else
																					{
																						$ponch4 = "";
																					}
																					if($ponchado[4] == 1)
																					{
																						$ponch5 = 5;
																					}
																					else
																					{
																						$ponch5 = "";
																					}
																					if($ponchado[5] == 1)
																					{
																						$ponch6 = 6;
																					}
																					else
																					{
																						$ponch6 = "";
																					}
																					if($ponchado[6] == 1)
																					{
																						$ponch7 = 7;
																					}
																					else
																					{
																						$ponch7 = "";
																					}
																					if($ponchado[7] == 1)
																					{
																						$ponch8 = 8;
																					}
																					else
																					{
																						$ponch8 = "";
																					}
																					if($ponch1!="" || $ponch2!="" || $ponch3!="" || $ponch4!=""||$ponch5!="" || $ponch6!="" || $ponch7!="" || $ponch8!="")
																					{
																						$codigo_ponchado = "PONCH".$ponch1.$ponch2.$ponch3.$ponch4.$ponch5.$ponch6.$ponch7.$ponch8;
																					}else{
																						$codigo_ponchado = "";
																					}
																					$codigo             = "TDV".$quantity.$terminado.$FrenteOVuelta.$codigo_esqred.$codigo_ponchado;
																					//$tarjetas_codigo = $tarjetas_terminado." ".$tarjetas_FrenteOVuelta.$tarjetas_codigo_esqred.$tarjetas_codigo_ponchado.$corteT;    
																				}
																				if($tipe == "Volantes") 
																				{
																					if($height_inches == 0)
																					{
																						$tamaño = "Tamaño Carta";
																					}else
																					{
																						$tamaño = "Tamaño " . $tarjetas_width_inches ."/". $tarjetas_height_inches." Carta";
																					}
																					$codigo = $FrenteOVuelta.$corteT;
																				}
																				echo  $codigo;
																			?>
																			</small>
																		</label>
																		<h4 style="text-align: center;">Informacion de pago</h4>
																		<label class="campos">Referencia:</label><small class="field-help-message dateuser" style="width: 80%;">&nbsp;&nbsp; <?php echo $n_referencia;?></small><br>
																		<label class="campos">Precio:</label><small class="field-help-message dateuser" style="width: 80%;">&nbsp;&nbsp; $ <?php echo $price;?></small><br>
																		<?php
																			if($statusp ==4)
																			{
																				?>
																				<img class="img_approved" alt="Approved" src="/assets/cancelled.png" style="height: 262px;padding-left: 20%;z-index: 99999;position: absolute;
																				-webkit-transform: translateY(-75%);-ms-transform: translateY(-75%); -moz-transform: translateY(-75%);  -o-transform: translateY(-75%);">
																				<?php
																			}
																		?>
																	</div>
																	<?php
																	if($vista=="frentevuelta")
																	{
																		$query_images  = "SELECT * FROM images WHERE id ='$id_images'";
																		$result_images = mysqli_query($conexion,$query_images);
																		$img_1     	   = mysqli_fetch_array($result_images);

																		$query_images_vuelta  = "SELECT * FROM images WHERE id ='$id_images_vuelta'";
																		$result_images_vuelta = mysqli_query($conexion,$query_images_vuelta);
																		$img_2     	   		  = mysqli_fetch_array($result_images_vuelta);

																		$usr_cloud = "usr_".$id_user."/";
																		$name_image_1 = $img_1['nombre'];
																		$extension_1 = pathinfo($name_image_1 , PATHINFO_EXTENSION);
																		$nombre_base_1 = basename($name_image_1 , '.'.$extension_1);  
																		
																		$imagen_1 = cl_image_tag($usr_cloud.$nombre_base_1,array("format" => "png","width"=>500));

																		$name_image_2 = $img_2['nombre'];
																		$extension_2 = pathinfo($name_image_2 , PATHINFO_EXTENSION);
																		$nombre_base_2 = basename($name_image_2 , '.'.$extension_2);  
																		$imagen_2 = cl_image_tag($usr_cloud.$nombre_base_2,array("format" => "png","width"=>500));
																		?>
																		<div class="row col-md-12">
																			<div class="col-md-6">
																				<h1 style="text-align: center;">Frente</h1>
																				<?php
																					echo $imagen_1;
																					//cl_image_tag("multi_page_pdf.pdf", :flag=>"attachment");
																					$html = cl_image_tag($usr_cloud.$nombre_base_1,  array("flags"=>"attachment"));
																					$xpath = new DOMXPath(@DOMDocument::loadHTML($html));
																					$src = $xpath->evaluate("string(//img/@src)");
																					echo  "	<a style='display: block;text-align: center;' href=".$src.">
																								Descargar
																							</a>";
																				?>
																			</div>
																			<div class="col-md-6">
																				<h1 style="text-align: center;">Vuelta</h1>
																				<?php
																					echo $imagen_2;
																					$html = cl_image_tag($usr_cloud.$nombre_base_2,  array("flags"=>"attachment"));
																					$xpath = new DOMXPath(@DOMDocument::loadHTML($html));
																					$src = $xpath->evaluate("string(//img/@src)");
																					echo  "	<a style='display: block;text-align: center;' href=".$src.">
																								Descargar
																							</a>";
																				?>
																			</div>
																		</div>
																		<?php
																	}else if( $vista=="frente")
																	{
																		$query_images  = "SELECT * FROM images WHERE id ='$id_images'";
																		$result_images = mysqli_query($conexion,$query_images);
																		$img_1     	   = mysqli_fetch_array($result_images);
																		$usr_cloud = "usr_".$id_user."/";
																		$name_image_1 = $img_1['nombre'];
																		$extension_1 = pathinfo($name_image_1 , PATHINFO_EXTENSION);
																		$nombre_base_1 = basename($name_image_1 , '.'.$extension_1);  
																		
																		$imagen_1 = cl_image_tag($usr_cloud.$nombre_base_1,array("format" => "png","width"=>500));
																		?>
																		<div class="row col-md-12">
																			<div class="col-md-6">
																				<h1 style="text-align: center;">Frente</h1>
																				<?php
																					echo $imagen_1;
																					//cl_image_tag("multi_page_pdf.pdf", :flag=>"attachment");
																					$html = cl_image_tag($usr_cloud.$nombre_base_1,  array("flags"=>"attachment"));
																					$xpath = new DOMXPath(@DOMDocument::loadHTML($html));
																					$src = $xpath->evaluate("string(//img/@src)");
																					echo  "	<a style='display: block;text-align: center;' href=".$src.">
																								Descargar
																							</a>";
																				?>
																			</div>
																			<div class="col-md-6">
																			</div>
																		</div>
																		<?php
																	}
																	?>
																	
																</div>
																</div>
														<?php
														}
													}
													?>
												</div>
											</div>
										</main>
									<?php
									}
									else{
										echo'
											<script>
												window.location = "index.php";
											</script>
											';
									}
									?>
								</div>
								<table>
									<tr>
										<?php
										if($pag>1)
										{
											?>
												<td class="prev" title="Previous"><a href="contact_all.php?pag=<?php echo $ant; ?>"><<<</a></td>
											<?php
										}else
										{
											?>
												<td class="prev" style="visibility: hidden;" title="Previous"><a href="contact_all.php?pag=<?php echo $ant; ?>"><<<</a></td>
											<?php
										}
										?>
										<td class="" title="number" style="text-align: center;"><?php echo $pag; ?></td>
										<?php
										if($pag+2<$cantidad)
										{
											?>
												<td class="next" title="Next" style="float: right;"><a href="contact_all.php?pag=<?php echo $sig; ?>"> >>></a></td>
											<?php
										}
										else{
											?>
												<td class="next" style="visibility: hidden;" title="Next" style="float: right;"><a href="">>>></a></td>
											<?php
										}
										?>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a href="index.html" class="text-muted"><strong>ografix</strong></a> &copy;
							</p>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="js/app.js"></script>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

</body>

</html>