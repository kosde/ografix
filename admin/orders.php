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
	<script src="https://kit.fontawesome.com/a38c16a07e.js"></script>
	<script>
		let inputs_check = [];
		
		function add_check(id)
		{
			inputs_check.push(id); 
		}
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
        function Printing_alert(id)
        {
            var email = document.getElementById('email'+id).value;
            var name = document.getElementById('name'+id).value;//printB_
            var form_data = new FormData();                  
            form_data.append('email', email);//
            form_data.append('name', name);//
            form_data.append('id_user', id);//
            $.ajax({
                type: 'POST',
                url: '../../print_email.php',
                contentType: false,
                processData: false,
                data: form_data,
                success:function(response) {
                       alert("success");
                       document.getElementById('printB_'+id).disabled=true;
                       document.getElementById('printB_'+id).style.backgroundColor="azure";
                       document.getElementById('printB_'+id).style.color="darkgray";
                       //var name = document.getElementById('printB_'+id).value;//printB_
                },
                onFailure: function(response){
                    alert("fail");
                }
            });
        }
		/*function star(id,star,reload)
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
					$("#"+reload).load(location.href + " #"+reload+">*", "");
                },
                onFailure: function(response){
                    alert("fail");
                }
            });
        }*/
		function star()
        {
			inputs_check.forEach(function(elemento) {
				var id = document.getElementById("id_order_"+elemento).value;
				if(document.getElementById("star_"+elemento).value == 0)
					var star = 1;
				else	
					var star = 0;
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
						window.location.href = window.location.href;
						//$("#"+reload).load(location.href + " #"+reload+">*", "");
					},
					onFailure: function(response){
						//alert("fail");
					}
				});
			})
        }
		function archivar()
        {
			inputs_check.forEach(function(elemento) {
				var id = document.getElementById("id_order_"+elemento).value;
				if(document.getElementById("arch_"+elemento).value == 0)
					var star = 1;
				else	
					var star = 0;
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
						window.location.href = window.location.href;
						//$("#"+reload).load(location.href + " #"+reload+">*", "");
					},
					onFailure: function(response){
						//alert("fail");
					}
				});
			})
        }
		function preprensa()
        {
			inputs_check.forEach(function(elemento) {
				var id_order = document.getElementById("id_order_"+elemento).value;
				//var id		 = "";
				var email = document.getElementById("email_"+elemento).value;
				var name = document.getElementById("nombre_"+elemento).value;

				var form_data = new FormData();
				form_data.append('id_order', id_order);
				//form_data.append('id', id);
				form_data.append('email', email);
				form_data.append('name', name);
				$.ajax({
					type: 'POST',
					url: 'priv/3_preprensa.php',
					contentType: false,
					processData: false,
					data: form_data,
					success:function(response) {
						window.location.href = window.location.href;
						//$("#"+reload).load(location.href + " #"+reload+">*", "");
					},
					onFailure: function(response){
						//alert("fail");
					}
				});
			})
        }
		function Impresion()
        {
			inputs_check.forEach(function(elemento) {
				var id_order = document.getElementById("id_order_"+elemento).value;
				//var id		 = "";
				var email = document.getElementById("email_"+elemento).value;
				var name = document.getElementById("nombre_"+elemento).value;

				var form_data = new FormData();
				form_data.append('id_order', id_order);
				//form_data.append('id', id);
				form_data.append('email', email);
				form_data.append('name', name);
				$.ajax({
					type: 'POST',
					url: 'priv/4_impresion.php',
					contentType: false,
					processData: false,
					data: form_data,
					success:function(response) {
						window.location.href = window.location.href;
						//$("#"+reload).load(location.href + " #"+reload+">*", "");
					},
					onFailure: function(response){
						//alert("fail");
					}
				});
			})
        }
		function Acabados()
        {
			inputs_check.forEach(function(elemento) {
				var id_order = document.getElementById("id_order_"+elemento).value;
				//var id		 = "";
				var email = document.getElementById("email_"+elemento).value;
				var name = document.getElementById("nombre_"+elemento).value;

				var form_data = new FormData();
				form_data.append('id_order', id_order);
				//form_data.append('id', id);
				form_data.append('email', email);
				form_data.append('name', name);
				$.ajax({
					type: 'POST',
					url: 'priv/5_acabado.php',
					contentType: false,
					processData: false,
					data: form_data,
					success:function(response) {
						window.location.href = window.location.href;
						//$("#"+reload).load(location.href + " #"+reload+">*", "");
					},
					onFailure: function(response){
						//alert("fail");
					}
				});
			})
        }
		function Listo()
        {
			inputs_check.forEach(function(elemento) {
				var id_order = document.getElementById("id_order_"+elemento).value;
				//var id		 = "";
				var email = document.getElementById("email_"+elemento).value;
				var name = document.getElementById("nombre_"+elemento).value;

				var form_data = new FormData();
				form_data.append('id_order', id_order);
				//form_data.append('id', id);
				form_data.append('email', email);
				form_data.append('name', name);
				$.ajax({
					type: 'POST',
					url: 'priv/6_listo.php',
					contentType: false,
					processData: false,
					data: form_data,
					success:function(response) {
						window.location.href = window.location.href;
						//$("#"+reload).load(location.href + " #"+reload+">*", "");
					},
					onFailure: function(response){
						//alert("fail");
					}
				});
			})
        }
		function Enviado()
        {
			inputs_check.forEach(function(elemento) {
				var id_order = document.getElementById("id_order_"+elemento).value;
				//var id		 = "";
				var email = document.getElementById("email_"+elemento).value;
				var name = document.getElementById("nombre_"+elemento).value;

				var form_data = new FormData();
				form_data.append('id_order', id_order);
				//form_data.append('id', id);
				form_data.append('email', email);
				form_data.append('name', name);
				$.ajax({
					type: 'POST',
					url: 'priv/7_enviado.php',
					contentType: false,
					processData: false,
					data: form_data,
					success:function(response) {
						window.location.href = window.location.href;
						//$("#"+reload).load(location.href + " #"+reload+">*", "");
					},
					onFailure: function(response){
						//alert("fail");
					}
				});
			})
        }
		function Entregado()
        {
			inputs_check.forEach(function(elemento) {
				var id_order = document.getElementById("id_order_"+elemento).value;
				//var id		 = "";
				var email = document.getElementById("email_"+elemento).value;
				var name = document.getElementById("nombre_"+elemento).value;

				var form_data = new FormData();
				form_data.append('id_order', id_order);
				//form_data.append('id', id);
				form_data.append('email', email);
				form_data.append('name', name);
				$.ajax({
					type: 'POST',
					url: 'priv/entregado.php',
					contentType: false,
					processData: false,
					data: form_data,
					success:function(response) {
						window.location.href = window.location.href;
						//$("#"+reload).load(location.href + " #"+reload+">*", "");
					},
					onFailure: function(response){
						//alert("fail");
					}
				});
			})
        }
		/*function archivar(id,star,reload)
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
					$("#"+reload).load(location.href + " #"+reload+">*", "");
                },
                onFailure: function(response){
                    alert("fail");
                }
            });
        }*/
        function Traking_number(id)
        {
            var email = document.getElementById('email'+id).value;
            var name = document.getElementById('name'+id).value;
            var traking_n = document.getElementById('traking_n'+id).value;
            var form_data2 = new FormData();                  
            form_data2.append('email', email);//
            form_data2.append('name', name);//
            form_data2.append('id_user', id);//
            form_data2.append('traking_n', traking_n);//
            $.ajax({
                type: 'POST',
                url: '../../admin/shipping_email.php',
                contentType: false,
                processData: false,
                data: form_data2,
                success:function(response) {
                       var traking_n = document.getElementById('traking_n'+id).value="";
                       document.getElementById('traking_b'+id).disabled=true;
                       document.getElementById('traking_b'+id).style.backgroundColor="azure";
                       document.getElementById('traking_b'+id).style.color="darkgray";
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
            

            $.ajax({
                type: 'POST',
                url: '../../php/sendproof.php',
                contentType: false,
                processData: false,
                data: form_data,
                success:function(response) {
                    document.getElementById("button"+id).innerHTML="Done!";
                },
                onFailure: function(response){
                    alert("fail");
                }
            });
        }
        function Download(name)
        {
            //var source = name.getAttribute('src');
            //alert(name);
            window.open(name, "Download");
            //      src="https://res.cloudinary.com/dgnrey9it/image/upload/co_white,e_outline:20:0/bomba.png"
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
    </script>
	<style>
		.badge{
			width: 120px !important;
		}
	</style>
</head>
<?php
if(isset($_SESSION['email_admi']))
{
?>
<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<script>
					document.addEventListener("DOMContentLoaded", function(event) { 
						//Send_emails();
						});
				</script>
				<a class="sidebar-brand" href="dashboard.php">
					<span class="align-middle">ografix</span>
				</a>
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
						<input type="text" class="form-control" placeholder="Search…" aria-label="Search" id="searchglobal">
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

			<main class="content" id="reload_star">
				<div class="container-fluid p-0">

					<div class="row mb-2 mb-xl-3">
						<div class="col-auto d-none d-sm-block">
							<h3>Ordenes</h3>
						</div>
					</div>
					<div class="row justify-content-center mt-3 mb-2">
						<div class="col-auto">
							<nav class="nav btn-group">
								<?php
									include "../php/conexion.php";
									$query    = "SELECT * FROM orders";
									$validar  = mysqli_query($conexion,$query);
									$todos 	  = mysqli_num_rows($validar);

									$query    = "SELECT * FROM orders WHERE statusp = '9'";
									$validar  = mysqli_query($conexion,$query);
									$entregados= mysqli_num_rows($validar);

									$query    = "SELECT * FROM orders WHERE statusp = '13'";
									$validar  = mysqli_query($conexion,$query);
									$pendiente= mysqli_num_rows($validar);

									$query    = "SELECT * FROM orders WHERE statusp = '2'";
									$validar  = mysqli_query($conexion,$query);
									$aprobado = mysqli_num_rows($validar);

									$query    = "SELECT * FROM orders WHERE star = '1'";
									$validar  = mysqli_query($conexion,$query);
									$marcados = mysqli_num_rows($validar);

									$query    = "SELECT * FROM orders WHERE archivar = '1'";
									$validar  = mysqli_query($conexion,$query);
									$archivar = mysqli_num_rows($validar);
								?>
								<a href="#all" class="btn btn-outline-primary active" data-bs-toggle="tab">Todos (<?php echo $todos;?>)</a>
								<a href="#entregado" class="btn btn-outline-primary" data-bs-toggle="tab">Entregados (<?php echo $entregados;?>)</a>
								<a href="#pendientes" class="btn btn-outline-primary" data-bs-toggle="tab">Pendiente de pago (<?php echo $pendiente;?>)</a>
								<a href="#aprobados" class="btn btn-outline-primary" data-bs-toggle="tab">Pago aprobado (<?php echo $aprobado;?>)</a>
								<a href="#marcados" class="btn btn-outline-primary" data-bs-toggle="tab">Marcados (<?php echo $marcados;?>)</a>
								<a href="#archivados" class="btn btn-outline-primary" data-bs-toggle="tab">Archivados (<?php echo $archivar;?>)</a>
							</nav>
						</div>
						<div  class="col-md-3" style="text-align: center;">
							<i class="align-middle me-2 far fa-fw fa-share-square" style="font-weight: lighter; cursor:pointer; cursor: hand;"  title="Archivar" onclick="archivar()"></i>
							<i class="align-middle me-2 far fa-fw fa-star" style="color: darkorange;font-weight: lighter; cursor:pointer; cursor: hand;"  title="Marcar" onclick="star()"></i>
							<i class="align-middle me-2 fas fa-fw fa-clipboard-list" style="cursor:pointer; cursor: hand;"  title="Preprensa" onclick="preprensa()"></i>
							<i class="align-middle me-2 fas fa-fw fa-print" style="cursor:pointer; cursor: hand;"  title="Impresion" onclick="Impresion()"></i>
							<i class="align-middle me-2 fas fa-fw fa-palette" style="cursor:pointer; cursor: hand;" title="Acabados" onclick="Acabados()"></i>
							<i class="align-middle me-2 fas fa-fw fa-check" style="cursor:pointer; cursor: hand;" title="Listo para recoger" onclick="Listo()"></i>
							<i class="align-middle me-2 fas fa-fw fa-shipping-fast" style="cursor:pointer; cursor: hand;" title="Enviado" onclick="Enviado()"></i>
							<i class="align-middle me-2 fas fa-fw fa-check-double" style="cursor:pointer; cursor: hand;" title="Entregado" onclick="Entregado()"></i>
						</div>
					</div>
					<div class="tab-content">
						<div class="tab-pane fade show active" id="all">
							<div class="row">
								<div class="col-xl-12 col-xxl-12 d-flex">
									<div class="w-100">
										<div class="row">
										<div class="container-fluid p-0">
											<div class="row">
												
												<div class="modal fade show" id="sizedModalMd" tabindex="-1" style="padding-right: 19px;visibility: hidden;display: none;" aria-modal="true" role="dialog">
													<div class="modal-dialog modal-md" role="document">	
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title">Medium modal</h5>
																<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
															</div>
															<div class="modal-body m-3">
																<p class="mb-0">Use Bootstrap’s JavaScript modal plugin to add dialogs to your site for lightboxes, user
																	notifications, or completely custom content.</p>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
																<button type="button" class="btn btn-primary">Save changes</button>
															</div>
														</div>
													</div>
												</div>
												<div class="col-xl-12">
													<div class="card">
														<div class="card-body" id="usr">
															<?php
															include "../php/conexion.php";
															$query    = "SELECT * FROM orders ORDER BY id DESC ";
															$validar  = mysqli_query($conexion,$query);
															if(mysqli_num_rows($validar)>0)
															{
																?>
																<table class="table table-striped" style="width:100%" id="responsivo_all">
																<thead>
																	<tr>
																		<th class="col-md-2">Orden</th>
																		<th class="col-md-2">Cliente</th>
																		<th class="col-md-2">Producto</th>
																		<th class="col-md-2">Costo</th>
																		<th class="col-md-2">Fecha del pedido</th>
																		<th class="col-md-2" style="text-align: center;">Estatus</th>
																	</tr>
																</thead>
																<tbody>
																<?php
																$count1 		   = 0;
																while ($extraido= mysqli_fetch_array($validar))
																{
																	$count1++;
																	$id            = $extraido['id'];
																	$id_user       = $extraido['id_user'];
																	$width_inches  = $extraido['width_inches'];
																	$height_inches = $extraido['height_inches'];
																	$price         = $extraido['price'];
																	$tipe          = $extraido['tipe'];
																	$quantity      = $extraido['quantity'];
																	$id_images     = $extraido['id_images'];
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
																	$id_cupon      = $extraido['id_cupon'];
																	$star      	   = $extraido['star'];
																	$query_user    = "SELECT * FROM users WHERE id='$id_user'";
																	$result_user   = mysqli_query($conexion,$query_user);
																	$extraido2     = mysqli_fetch_array($result_user);
																	$name          = $extraido2['usrname'];
																	$email         = $extraido2['email'];
																	$code          = $extraido2['code'];
																	$phone         = $extraido2['phone'];
																	$query_cupon   = "SELECT * FROM cupones WHERE id='$id_cupon'";
																	$result_cupon  = mysqli_query($conexion,$query_cupon);
																	$extraido3     = mysqli_fetch_array($result_cupon);
																	$nombre        = $extraido3['nombre'];
																	$fecha_inicio  = $extraido3['fecha_inicio'];
																	$fecha_final   = $extraido3['fecha_final'];
																	$cantidad      = $extraido3['cantidad'];
																	$aplicado      = $extraido3['aplicado'];
																	?>
																	
																		<tr id="all_<?php echo $id; ?>">
																				<td  style="cursor: pointer;">
																				<div class="col-md-12" style="display: flex;">
																					<div  class="col-md-2">
																						<input type="checkbox" name="" id="count_input_all_<?php echo $count1;?>" onclick="add_check(<?php echo $count1;?>)">
																						<input type="hidden" name="" id="id_order_<?php echo $count1; ?>" value="<?php echo $id?>">
																						<input type="hidden" name="" id="email_<?php echo $count1; ?>" value="<?php echo $email?>">
																						<input type="hidden" name="" id="nombre_<?php echo $count1; ?>" value="<?php echo $name?>">
																					</div>
																					<div class="col-md-4" style="cursor: auto;"></div>
																					<div class="col-md-4">
																						<a href="order_details.php?order=<?php echo $id;?>"><?php echo $id_control;?></a>
																					</div><!--
																					<div class="col-md-4" style="cursor: auto;"></div>
																					
																					<div  class="col-md-2">
																						<i class="align-middle me-2 far fa-fw fa-share-square" style="height: 20px;" title="Archivar"onclick="archivar(<?php echo $id?>,1,'all_<?php echo $id; ?>')"></i>
																					</div>-->
																					<div class="col-md-2" style="cursor: auto;">
																						<input type="hidden" name="" id="arch_<?php echo $count1; ?>" value="0">
																						<?php
																						if($star == 0)
																						{
																							?>
																								<input type="hidden" name="" id="star_<?php echo $count1; ?>" value="0"> <!--onclick="star(<?php //echo $id?>,1,'all_<?php // echo $id; ?>')"-->
																								<i class="align-middle me-2 far fa-fw fa-star"  style="height: 20px;color: darkorange;font-weight: lighter;"  title="Marcar"></i>
																							<?php
																						}
																						else
																						{
																							?>
																								<input type="hidden" name="" id="star_<?php echo $count1; ?>" value="1"> <!-- onclick="star(<?php // echo $id?>,0,'all_<?php // echo $id; ?>')" -->
																								<i class="align-middle me-2 far fa-fw fa-star" style="height: 20px;color: darkorange;font-weight: bold;" title="Marcar"></i>
																							<?php
																						}
																						?>
																					</div>
																					
																				</div>
																			</td>
																			<?php
																			if($tipe!="Sample")
																			{
																				if($statusp == 11)
																				{
																					$tipe_ori = $tipe;
																					$tipe = "Tarjetas sin diseño";
																				} 
																				if($vista == "frente")
																				{
																					$vista = "4/0";
																				}
																				if($vista == "frentevuelta")
																				{
																					$vista = "4/4";
																				}
																				if($acabado == "barniz")
																				{
																					$acabado = "BUV";
																				}
																				if($acabado == "mate")
																				{
																					$acabado = "Mate";
																				}
																			?>
																				<td><?php echo $name; //."<br>".$email."<br>".$phone;?></td>
																				<td><?php
																				if($tipe == "Tarjetas") 
																					echo $width_inches."cm x ".$height_inches."cm <br>".$tipe. " <br>Qty: ".$quantity."<br>".$vista." ".$acabado;
																				if($tipe == "Volantes") 
																				{
																					if($height_inches == 0)
                                                                                    {
                                                                                        $tam = "Tamaño Carta";
                                                                                    }else
                                                                                    {
                                                                                        $tam = "Tamaño " . $width_inches ."/". $height_inches." Carta";
                                                                                    }
																					echo $tipe."<br>".$tam. " <br>Qty: ".$quantity."<br>".$vista." ".$acabado;
																				}
																				?></td>
																			<?php
																				$tipe = $tipe_ori;
																			}else
																			{
																			?>
																				<td><?php echo $tipe;?></td>
																			<?php
																			}
																			?>
																				<td>$ <?php echo $price-(($price/100)*$cantidad);?></td>
																				<td><?php echo $date ;?></td>
																			
																				<?php
																			if($statusp == 0)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-warning">Pendiente de prueba</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 1)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-primary">Pendiente de aprobación</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 2)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-primary">Pagado</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 3)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-warning">Prepensa</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 4)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-warning">Impresión</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 5)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-warning">Acabados</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 6)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-secondary">Listo para recoger</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 7)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-info">Enviado</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 8)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-danger">Cancelado</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 9)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-success">Entregado</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 11)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-success">Completo</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 12)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-warning">Envio de archivos por correo</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 13)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-warning">Pendiente de pago</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 14)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-warning">Revisar pago</span>
																			</td>
																			<?php
																			}
																			?>
																		</tr>
																	
															<?php
																}
																?>
																	</tbody>
																</table>
																<input type="hidden" name="" id="id_cont_all" value="<?php echo $count1;?>">
																<?php
															}
															?>
														</div>
													
													</div>
												</div>
											</div>
											
											</div>
										
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="entregado">
							<div class="row">
								<div class="col-xl-12 col-xxl-12 d-flex">
									<div class="w-100">
										<div class="row">
										<div class="container-fluid p-0">
											<div class="row">
												
												<div class="modal fade show" id="sizedModalMd" tabindex="-1" style="padding-right: 19px;visibility: hidden;display: none;" aria-modal="true" role="dialog">
													<div class="modal-dialog modal-md" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title">Medium modal</h5>
																<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
															</div>
															<div class="modal-body m-3">
																<p class="mb-0">Use Bootstrap’s JavaScript modal plugin to add dialogs to your site for lightboxes, user
																	notifications, or completely custom content.</p>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
																<button type="button" class="btn btn-primary">Save changes</button>
															</div>
														</div>
													</div>
												</div>
												<div class="col-xl-12">
													<div class="card">
														<div class="card-body" id="usr">
															<?php
															include "../php/conexion.php";
															$query    = "SELECT * FROM orders WHERE statusp = '9' AND archivar !='1' ORDER BY id DESC";
															$validar  = mysqli_query($conexion,$query);
															if(mysqli_num_rows($validar)>0)
															{
																?>
																<table class="table table-striped" style="width:100%" id="responsivo_entregado">
																<thead>
																	<tr>
																		<th class="col-md-2">Orden</th>
																		<th class="col-md-2">Cliente</th>
																		<th class="col-md-2">Producto</th>
																		<th class="col-md-2">Costo</th>
																		<th class="col-md-2">Fecha del pedido</th>
																		<th class="col-md-2" style="text-align: center;">Estatus</th>
																	</tr>
																</thead>
																<tbody>
																<?php
																while ($extraido= mysqli_fetch_array($validar))
																{
																	$count1++;
																	$id            = $extraido['id'];
																	$id_user       = $extraido['id_user'];
																	$width_inches  = $extraido['width_inches'];
																	$height_inches = $extraido['height_inches'];
																	$price         = $extraido['price'];
																	$tipe          = $extraido['tipe'];
																	$quantity      = $extraido['quantity'];
																	$id_images     = $extraido['id_images'];
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
																	$id_cupon      = $extraido['id_cupon'];
																	$star      	   = $extraido['star'];
																	$query_user    = "SELECT * FROM users WHERE id='$id_user'";
																	$result_user   = mysqli_query($conexion,$query_user);
																	$extraido2     = mysqli_fetch_array($result_user);
																	$name          = $extraido2['usrname'];
																	$email         = $extraido2['email'];
																	$code          = $extraido2['code'];
																	$phone         = $extraido2['phone'];
																	$query_cupon   = "SELECT * FROM cupones WHERE id='$id_cupon'";
																	$result_cupon  = mysqli_query($conexion,$query_cupon);
																	$extraido3     = mysqli_fetch_array($result_cupon);
																	$nombre        = $extraido3['nombre'];
																	$fecha_inicio  = $extraido3['fecha_inicio'];
																	$fecha_final   = $extraido3['fecha_final'];
																	$cantidad      = $extraido3['cantidad'];
																	$aplicado      = $extraido3['aplicado'];
																	?>
																		<tr id="entregado_<?php echo $id; ?>">
																				<td  style="cursor: pointer;">
																				<div class="col-md-12" style="display: flex;">
																					<div  class="col-md-2">
																						<input type="checkbox" name="" id="count_input_all_<?php echo $count1;?>" onclick="add_check(<?php echo $count1;?>)">
																						<input type="hidden" name="" id="id_order_<?php echo $count1; ?>" value="<?php echo $id?>">
																						<input type="hidden" name="" id="email_<?php echo $count1; ?>" value="<?php echo $email?>">
																						<input type="hidden" name="" id="nombre_<?php echo $count1; ?>" value="<?php echo $name?>">
																					</div>
																					<div class="col-md-4" style="cursor: auto;"></div>
																					<div class="col-md-4">
																						<a href="order_details.php?order=<?php echo $id;?>"><?php echo $id_control;?></a>
																					</div><!--
																					<div class="col-md-4" style="cursor: auto;"></div>
																					
																					<div  class="col-md-2">
																						<i class="align-middle me-2 far fa-fw fa-share-square" style="height: 20px;" title="Archivar"onclick="archivar(<?php echo $id?>,1,'all_<?php echo $id; ?>')"></i>
																					</div>-->
																					<div class="col-md-2" style="cursor: auto;">
																						<input type="hidden" name="" id="arch_<?php echo $count1; ?>" value="0">
																						<?php
																						if($star == 0)
																						{
																							?>
																								<input type="hidden" name="" id="star_<?php echo $count1; ?>" value="0"> <!--onclick="star(<?php //echo $id?>,1,'all_<?php // echo $id; ?>')"-->
																								<i class="align-middle me-2 far fa-fw fa-star"  style="height: 20px;color: darkorange;font-weight: lighter;"  title="Marcar"></i>
																							<?php
																						}
																						else
																						{
																							?>
																								<input type="hidden" name="" id="star_<?php echo $count1; ?>" value="1"> <!-- onclick="star(<?php // echo $id?>,0,'all_<?php // echo $id; ?>')" -->
																								<i class="align-middle me-2 far fa-fw fa-star" style="height: 20px;color: darkorange;font-weight: bold;" title="Marcar"></i>
																							<?php
																						}
																						?>
																					</div>
																					
																				</div>
																			</td>
																				
																			<?php
																			if($tipe!="Sample")
																			{
																				if($statusp == 11)
																				{
																					$tipe_ori = $tipe;
																					$tipe = "Tarjetas sin diseño";
																				} 
																				if($vista == "frente")
																				{
																					$vista = "4/0";
																				}
																				if($vista == "frentevuelta")
																				{
																					$vista = "4/4";
																				}
																				if($acabado == "barniz")
																				{
																					$acabado = "BUV";
																				}
																				if($acabado == "mate")
																				{
																					$acabado = "Mate";
																				}
																			?>
																				<td><?php echo $name; //."<br>".$email."<br>".$phone;?></td>
																				<td><?php
																				if($tipe == "Tarjetas") 
																					echo $width_inches."cm x ".$height_inches."cm <br>".$tipe. " <br>Qty: ".$quantity."<br>".$vista." ".$acabado;
																				if($tipe == "Volantes") 
																				{
																					if($height_inches == 0)
                                                                                    {
                                                                                        $tam = "Tamaño Carta";
                                                                                    }else
                                                                                    {
                                                                                        $tam = "Tamaño " . $width_inches ."/". $height_inches." Carta";
                                                                                    }
																					echo $tipe."<br>".$tam. " <br>Qty: ".$quantity."<br>".$vista." ".$acabado;
																				}
																				?></td>
																			<?php
																				$tipe = $tipe_ori;
																			}else
																			{
																			?>
																				<td><?php echo $tipe;?></td>
																			<?php
																			}
																			?>
																				<td>$ <?php echo $price-(($price/100)*$cantidad);?></td>
																				<td><?php echo $date ;?></td>
																			
																				<?php
																			if($statusp == 0)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-warning">Pendiente de prueba</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 1)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-primary">Pendiente de aprobación</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 2)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-primary">Aprobado</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 3)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-warning">Prepensa</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 4)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-warning">Impresión</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 5)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-warning">Acabados</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 6)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-secondary">Listo para recoger</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 7)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-info">Enviado</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 8)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-danger">Cancelado</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 9)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-success">Entregado</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 11)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-success">Completo</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 12)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-warning">Envio de archivos por correo</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 13)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-warning">Pendiente de pago</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 14)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-warning">Revisar pago</span>
																			</td>
																			<?php
																			}
																			?>
																		</tr>
																	
															<?php
																}
																?>
																	
																	<!--
																		<tr>
																			<td>Ashton Cox</td>
																			<td>Levitz Furniture</td>
																			<td>ashton@cox.com</td>
																			<td><span class="badge bg-success">Active</span></td>
																		</tr>
																		<tr>
																			<td>Sonya Frost</td>
																			<td>Child World</td>
																			<td>sonya@frost.com</td>
																			<td><span class="badge btn-warning">Deleted</span></td>
																		</tr>
																		<tr>
																			<td>Jena Gaines</td>
																			<td>Helping Hand</td>
																			<td>jena@gaines.com</td>
																			<td><span class="badge bg-warning">Inactive</span></td>
																		</tr>
																	-->
																	</tbody>
																</table>
																<?php
															}
															?>
														</div>
													</div>
												</div>
											</div>
											
											</div>
										
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="pendientes">
							<div class="row">
								<div class="col-xl-12 col-xxl-12 d-flex">
									<div class="w-100">
										<div class="row">
										<div class="container-fluid p-0">
											<div class="row">
												
												<div class="modal fade show" id="sizedModalMd" tabindex="-1" style="padding-right: 19px;visibility: hidden;display: none;" aria-modal="true" role="dialog">
													<div class="modal-dialog modal-md" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title">Medium modal</h5>
																<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
															</div>
															<div class="modal-body m-3">
																<p class="mb-0">Use Bootstrap’s JavaScript modal plugin to add dialogs to your site for lightboxes, user
																	notifications, or completely custom content.</p>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
																<button type="button" class="btn btn-primary">Save changes</button>
															</div>
														</div>
													</div>
												</div>
												<div class="col-xl-12">
													<div class="card">
														<div class="card-body" id="usr">
															<?php
															include "../php/conexion.php";
															$query    = "SELECT * FROM orders WHERE statusp = '13' AND archivar !='1' ORDER BY id DESC";
															$validar  = mysqli_query($conexion,$query);
															if(mysqli_num_rows($validar)>0)
															{
																?>
																<table class="table table-striped" style="width:100%" id="responsivo_pendientes">
																<thead>
																	<tr>
																		<th class="col-md-2">Orden</th>
																		<th class="col-md-2">Cliente</th>
																		<th class="col-md-2">Producto</th>
																		<th class="col-md-2">Costo</th>
																		<th class="col-md-2">Fecha del pedido</th>
																		<th class="col-md-2" style="text-align: center;">Estatus</th>
																	</tr>
																</thead>
																<tbody>
																<?php
																//id id_user	width_inches	height_inches	price	tipe	quantity	id_images	txt_details	dates	delivery_date	statusp	id_address	
																//id_billing	guie	shipping	envio	vista	acabado	esquinas	ponchado	corte	id_control	pagado	n_referencia
																while ($extraido= mysqli_fetch_array($validar))
																{
																	$count1++;
																	$id            = $extraido['id'];
																	$id_user       = $extraido['id_user'];
																	$width_inches  = $extraido['width_inches'];
																	$height_inches = $extraido['height_inches'];
																	$price         = $extraido['price'];
																	$tipe          = $extraido['tipe'];
																	$quantity      = $extraido['quantity'];
																	$id_images     = $extraido['id_images'];
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
																	$id_cupon      = $extraido['id_cupon'];
																	$star      	   = $extraido['star'];
																	$query_user    = "SELECT * FROM users WHERE id='$id_user'";
																	$result_user   = mysqli_query($conexion,$query_user);
																	$extraido2     = mysqli_fetch_array($result_user);
																	$name          = $extraido2['usrname'];
																	$email         = $extraido2['email'];
																	$code          = $extraido2['code'];
																	$phone         = $extraido2['phone'];
																	$query_cupon   = "SELECT * FROM cupones WHERE id='$id_cupon'";
																	$result_cupon  = mysqli_query($conexion,$query_cupon);
																	$extraido3     = mysqli_fetch_array($result_cupon);
																	$nombre        = $extraido3['nombre'];
																	$fecha_inicio  = $extraido3['fecha_inicio'];
																	$fecha_final   = $extraido3['fecha_final'];
																	$cantidad      = $extraido3['cantidad'];
																	$aplicado      = $extraido3['aplicado'];
																	?>
																	
																	<tr id="pendientes_<?php echo $id; ?>">
																				<td  style="cursor: pointer;">
																				<div class="col-md-12" style="display: flex;">
																					<div  class="col-md-2">
																						<input type="checkbox" name="" id="count_input_all_<?php echo $count1;?>" onclick="add_check(<?php echo $count1;?>)">
																						<input type="hidden" name="" id="id_order_<?php echo $count1; ?>" value="<?php echo $id?>">
																					    <input type="hidden" name="" id="email_<?php echo $count1; ?>" value="<?php echo $email?>">
																						<input type="hidden" name="" id="nombre_<?php echo $count1; ?>" value="<?php echo $name?>">
																					</div>
																					<div class="col-md-4" style="cursor: auto;"></div>
																					<div class="col-md-4">
																						<a href="order_details.php?order=<?php echo $id;?>"><?php echo $id_control;?></a>
																					</div><!--
																					<div class="col-md-4" style="cursor: auto;"></div>
																					
																					<div  class="col-md-2">
																						<i class="align-middle me-2 far fa-fw fa-share-square" style="height: 20px;" title="Archivar"onclick="archivar(<?php echo $id?>,1,'all_<?php echo $id; ?>')"></i>
																					</div>-->
																					<div class="col-md-2" style="cursor: auto;">
																						<input type="hidden" name="" id="arch_<?php echo $count1; ?>" value="0">
																						<?php
																						if($star == 0)
																						{
																							?>
																								<input type="hidden" name="" id="star_<?php echo $count1; ?>" value="0"> <!--onclick="star(<?php //echo $id?>,1,'all_<?php // echo $id; ?>')"-->
																								<i class="align-middle me-2 far fa-fw fa-star"  style="height: 20px;color: darkorange;font-weight: lighter;"  title="Marcar"></i>
																							<?php
																						}
																						else
																						{
																							?>
																								<input type="hidden" name="" id="star_<?php echo $count1; ?>" value="1"> <!-- onclick="star(<?php // echo $id?>,0,'all_<?php // echo $id; ?>')" -->
																								<i class="align-middle me-2 far fa-fw fa-star" style="height: 20px;color: darkorange;font-weight: bold;" title="Marcar"></i>
																							<?php
																						}
																						?>
																					</div>
																					
																				</div>
																			</td>
																			<?php
																			if($tipe!="Sample")
																			{
																				if($statusp == 11)
																				{
																					$tipe_ori = $tipe;
																					$tipe = "Tarjetas sin diseño";
																				} 
																				if($vista == "frente")
																				{
																					$vista = "4/0";
																				}
																				if($vista == "frentevuelta")
																				{
																					$vista = "4/4";
																				}
																				if($acabado == "barniz")
																				{
																					$acabado = "BUV";
																				}
																				if($acabado == "mate")
																				{
																					$acabado = "Mate";
																				}
																			?>
																				<td><?php echo $name; //."<br>".$email."<br>".$phone;?></td>
																				<td><?php
																				if($tipe == "Tarjetas") 
																					echo $width_inches."cm x ".$height_inches."cm <br>".$tipe. " <br>Qty: ".$quantity."<br>".$vista." ".$acabado;
																				if($tipe == "Volantes") 
																				{
																					if($height_inches == 0)
                                                                                    {
                                                                                        $tam = "Tamaño Carta";
                                                                                    }else
                                                                                    {
                                                                                        $tam = "Tamaño " . $width_inches ."/". $height_inches." Carta";
                                                                                    }
																					echo $tipe."<br>".$tam. " <br>Qty: ".$quantity."<br>".$vista." ".$acabado;
																				}
																				?></td>
																			<?php
																				$tipe = $tipe_ori;
																			}else
																			{
																			?>
																				<td><?php echo $tipe;?></td>
																			<?php
																			}
																			?>
																				<td>$ <?php echo $price-(($price/100)*$cantidad);?></td>
																				<td><?php echo $date ;?></td>
																			
																				<?php
																			if($statusp == 0)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-warning">Pendiente de prueba</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 1)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-primary">Pendiente de aprobación</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 2)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-primary">Aprobado</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 3)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-warning">Prepensa</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 4)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-warning">Impresión</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 5)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-warning">Acabados</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 6)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-secondary">Listo para recoger</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 7)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-info">Enviado</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 8)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-danger">Cancelado</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 9)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-success">Entregado</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 11)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-success">Completo</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 12)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-warning">Envio de archivos por correo</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 13)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-warning">Pendiente de pago</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 14)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-warning">Revisar pago</span>
																			</td>
																			<?php
																			}
																			?>
																		</tr>
																	
															<?php
																}
																?>
																	
																	<!--
																		<tr>
																			<td>Ashton Cox</td>
																			<td>Levitz Furniture</td>
																			<td>ashton@cox.com</td>
																			<td><span class="badge bg-success">Active</span></td>
																		</tr>
																		<tr>
																			<td>Sonya Frost</td>
																			<td>Child World</td>
																			<td>sonya@frost.com</td>
																			<td><span class="badge btn-warning">Deleted</span></td>
																		</tr>
																		<tr>
																			<td>Jena Gaines</td>
																			<td>Helping Hand</td>
																			<td>jena@gaines.com</td>
																			<td><span class="badge bg-warning">Inactive</span></td>
																		</tr>
																	-->
																	</tbody>
																</table>
																<?php
															}
															?>
														</div>
													</div>
												</div>
											</div>
											
											</div>
										
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="aprobados">
							<div class="row">
								<div class="col-xl-12 col-xxl-12 d-flex">
									<div class="w-100">
										<div class="row">
										<div class="container-fluid p-0">
											<div class="row">
												
												<div class="modal fade show" id="sizedModalMd" tabindex="-1" style="padding-right: 19px;visibility: hidden;display: none;" aria-modal="true" role="dialog">
													<div class="modal-dialog modal-md" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title">Medium modal</h5>
																<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
															</div>
															<div class="modal-body m-3">
																<p class="mb-0">Use Bootstrap’s JavaScript modal plugin to add dialogs to your site for lightboxes, user
																	notifications, or completely custom content.</p>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
																<button type="button" class="btn btn-primary">Save changes</button>
															</div>
														</div>
													</div>
												</div>
												<div class="col-xl-12">
													<div class="card">
														<div class="card-body" id="usr">
															<?php
															include "../php/conexion.php";
															$query    = "SELECT * FROM orders WHERE statusp = '2' AND archivar !='1' ORDER BY id DESC";
															$validar  = mysqli_query($conexion,$query);
															if(mysqli_num_rows($validar)>0)
															{
																?>
																<table class="table table-striped" style="width:100%" id="responsivo_aprobados">
																<thead>
																	<tr>
																		<th class="col-md-2">Orden</th>
																		<th class="col-md-2">Cliente</th>
																		<th class="col-md-2">Producto</th>
																		<th class="col-md-2">Costo</th>
																		<th class="col-md-2">Fecha del pedido</th>
																		<th class="col-md-2" style="text-align: center;">Estatus</th>
																	</tr>
																</thead>
																<tbody>
																<?php
																//id id_user	width_inches	height_inches	price	tipe	quantity	id_images	txt_details	dates	delivery_date	statusp	id_address	
																//id_billing	guie	shipping	envio	vista	acabado	esquinas	ponchado	corte	id_control	pagado	n_referencia
																while ($extraido= mysqli_fetch_array($validar))
																{
																	$count1++;
																	$id            = $extraido['id'];
																	$id_user       = $extraido['id_user'];
																	$width_inches  = $extraido['width_inches'];
																	$height_inches = $extraido['height_inches'];
																	$price         = $extraido['price'];
																	$tipe          = $extraido['tipe'];
																	$quantity      = $extraido['quantity'];
																	$id_images     = $extraido['id_images'];
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
																	$id_cupon      = $extraido['id_cupon'];
																	$star      	   = $extraido['star'];
																	$query_user    = "SELECT * FROM users WHERE id='$id_user'";
																	$result_user   = mysqli_query($conexion,$query_user);
																	$extraido2     = mysqli_fetch_array($result_user);
																	$name          = $extraido2['usrname'];
																	$email         = $extraido2['email'];
																	$code          = $extraido2['code'];
																	$phone         = $extraido2['phone'];
																	$query_cupon   = "SELECT * FROM cupones WHERE id='$id_cupon'";
																	$result_cupon  = mysqli_query($conexion,$query_cupon);
																	$extraido3     = mysqli_fetch_array($result_cupon);
																	$nombre        = $extraido3['nombre'];
																	$fecha_inicio  = $extraido3['fecha_inicio'];
																	$fecha_final   = $extraido3['fecha_final'];
																	$cantidad      = $extraido3['cantidad'];
																	$aplicado      = $extraido3['aplicado'];
																	?>
																	
																	<tr id="pagado_<?php echo $id; ?>">
																				<td  style="cursor: pointer;">
																				<div class="col-md-12" style="display: flex;">
																					<div  class="col-md-2">
																						<input type="checkbox" name="" id="count_input_all_<?php echo $count1;?>" onclick="add_check(<?php echo $count1;?>)">
																						<input type="hidden" name="" id="id_order_<?php echo $count1; ?>" value="<?php echo $id?>">
																						<input type="hidden" name="" id="email_<?php echo $count1; ?>" value="<?php echo $email?>">
																						<input type="hidden" name="" id="nombre_<?php echo $count1; ?>" value="<?php echo $name?>">
																					</div>
																					<div class="col-md-4" style="cursor: auto;"></div>
																					<div class="col-md-4">
																						<a href="order_details.php?order=<?php echo $id;?>"><?php echo $id_control;?></a>
																					</div><!--
																					<div class="col-md-4" style="cursor: auto;"></div>
																					
																					<div  class="col-md-2">
																						<i class="align-middle me-2 far fa-fw fa-share-square" style="height: 20px;" title="Archivar"onclick="archivar(<?php echo $id?>,1,'all_<?php echo $id; ?>')"></i>
																					</div>-->
																					<div class="col-md-2" style="cursor: auto;">
																						<input type="hidden" name="" id="arch_<?php echo $count1; ?>" value="0">
																						<?php
																						if($star == 0)
																						{
																							?>
																								<input type="hidden" name="" id="star_<?php echo $count1; ?>" value="0"> <!--onclick="star(<?php //echo $id?>,1,'all_<?php // echo $id; ?>')"-->
																								<i class="align-middle me-2 far fa-fw fa-star"  style="height: 20px;color: darkorange;font-weight: lighter;"  title="Marcar"></i>
																							<?php
																						}
																						else
																						{
																							?>
																								<input type="hidden" name="" id="star_<?php echo $count1; ?>" value="1"> <!-- onclick="star(<?php // echo $id?>,0,'all_<?php // echo $id; ?>')" -->
																								<i class="align-middle me-2 far fa-fw fa-star" style="height: 20px;color: darkorange;font-weight: bold;" title="Marcar"></i>
																							<?php
																						}
																						?>
																					</div>
																					
																				</div>
																			</td>
																			<?php
																			if($tipe!="Sample")
																			{
																				if($statusp == 11)
																				{
																					$tipe_ori = $tipe;
																					$tipe = "Tarjetas sin diseño";
																				} 
																				if($vista == "frente")
																				{
																					$vista = "4/0";
																				}
																				if($vista == "frentevuelta")
																				{
																					$vista = "4/4";
																				}
																				if($acabado == "barniz")
																				{
																					$acabado = "BUV";
																				}
																				if($acabado == "mate")
																				{
																					$acabado = "Mate";
																				}
																			?>
																				<td><?php echo $name; //."<br>".$email."<br>".$phone;?></td>
																				<td><?php
																				if($tipe == "Tarjetas") 
																					echo $width_inches."cm x ".$height_inches."cm <br>".$tipe. " <br>Qty: ".$quantity."<br>".$vista." ".$acabado;
																				if($tipe == "Volantes") 
																				{
																					if($height_inches == 0)
																					{
																						$tam = "Tamaño Carta";
																					}else
																					{
																						$tam = "Tamaño " . $width_inches ."/". $height_inches." Carta";
																					}
																					echo $tipe."<br>".$tam. " <br>Qty: ".$quantity."<br>".$vista." ".$acabado;
																				}
																				?></td>
																			<?php
																				$tipe = $tipe_ori;
																			}
																			else
																			{
																			?>
																				<td><?php echo $tipe;?></td>
																			<?php
																			}
																			?>
																				<td>$ <?php echo $price-(($price/100)*$cantidad);?></td>
																				<td><?php echo $date ;?></td>
																			
																				<?php
																			if($statusp == 0)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-warning">Pendiente de prueba</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 1)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-primary">Pendiente de aprobación</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 2)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-primary">Aprobado</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 3)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-warning">Prepensa</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 4)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-warning">Impresión</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 5)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-warning">Acabados</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 6)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-secondary">Listo para recoger</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 7)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-info">Enviado</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 8)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-danger">Cancelado</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 9)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-success">Entregado</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 11)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-success">Completo</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 12)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-warning">Envio de archivos por correo</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 13)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-warning">Pendiente de pago</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 14)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-warning">Revisar pago</span>
																			</td>
																			<?php
																			}
																			?>
																		</tr>
																	
															<?php
																}
																?>
																	
																	<!--
																		<tr>
																			<td>Ashton Cox</td>
																			<td>Levitz Furniture</td>
																			<td>ashton@cox.com</td>
																			<td><span class="badge bg-success">Active</span></td>
																		</tr>
																		<tr>
																			<td>Sonya Frost</td>
																			<td>Child World</td>
																			<td>sonya@frost.com</td>
																			<td><span class="badge bg-danger">Deleted</span></td>
																		</tr>
																		<tr>
																			<td>Jena Gaines</td>
																			<td>Helping Hand</td>
																			<td>jena@gaines.com</td>
																			<td><span class="badge bg-warning">Inactive</span></td>
																		</tr>
																	-->
																	</tbody>
																</table>
																<?php
															}
															?>
														</div>
													</div>
												</div>
											</div>
											
											</div>
										
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="marcados">
							<div class="row">
								<div class="col-xl-12 col-xxl-12 d-flex">
									<div class="w-100">
										<div class="row">
										<div class="container-fluid p-0">
											<div class="row">
												
												<div class="modal fade show" id="sizedModalMd" tabindex="-1" style="padding-right: 19px;visibility: hidden;display: none;" aria-modal="true" role="dialog">
													<div class="modal-dialog modal-md" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title">Medium modal</h5>
																<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
															</div>
															<div class="modal-body m-3">
																<p class="mb-0">Use Bootstrap’s JavaScript modal plugin to add dialogs to your site for lightboxes, user
																	notifications, or completely custom content.</p>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
																<button type="button" class="btn btn-primary">Save changes</button>
															</div>
														</div>
													</div>
												</div>
												<div class="col-xl-12">
													<div class="card">
														<div class="card-body" id="usr">
															<?php
															include "../php/conexion.php";
															$query    = "SELECT * FROM orders WHERE star = '1' AND archivar !='1' ORDER BY id DESC";
															$validar  = mysqli_query($conexion,$query);
															if(mysqli_num_rows($validar)>0)
															{
																?>
																<table class="table table-striped" style="width:100%" id="responsivo_marcados">
																<thead>
																	<tr>
																		<th class="col-md-2">Orden</th>
																		<th class="col-md-2">Cliente</th>
																		<th class="col-md-2">Producto</th>
																		<th class="col-md-2">Costo</th>
																		<th class="col-md-2">Fecha del pedido</th>
																		<th class="col-md-2" style="text-align: center;">Estatus</th>
																	</tr>
																</thead>
																<tbody>
																<?php
																//id id_user	width_inches	height_inches	price	tipe	quantity	id_images	txt_details	dates	delivery_date	statusp	id_address	
																//id_billing	guie	shipping	envio	vista	acabado	esquinas	ponchado	corte	id_control	pagado	n_referencia
																while ($extraido= mysqli_fetch_array($validar))
																{
																	$count1++;
																	$id            = $extraido['id'];
																	$id_user       = $extraido['id_user'];
																	$width_inches  = $extraido['width_inches'];
																	$height_inches = $extraido['height_inches'];
																	$price         = $extraido['price'];
																	$tipe          = $extraido['tipe'];
																	$quantity      = $extraido['quantity'];
																	$id_images     = $extraido['id_images'];
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
																	$id_cupon      = $extraido['id_cupon'];
																	$star      	   = $extraido['star'];
																	$query_user    = "SELECT * FROM users WHERE id='$id_user'";
																	$result_user   = mysqli_query($conexion,$query_user);
																	$extraido2     = mysqli_fetch_array($result_user);
																	$name          = $extraido2['usrname'];
																	$email         = $extraido2['email'];
																	$code          = $extraido2['code'];
																	$phone         = $extraido2['phone'];
																	$query_cupon   = "SELECT * FROM cupones WHERE id='$id_cupon'";
																	$result_cupon  = mysqli_query($conexion,$query_cupon);
																	$extraido3     = mysqli_fetch_array($result_cupon);
																	$nombre        = $extraido3['nombre'];
																	$fecha_inicio  = $extraido3['fecha_inicio'];
																	$fecha_final   = $extraido3['fecha_final'];
																	$cantidad      = $extraido3['cantidad'];
																	$aplicado      = $extraido3['aplicado'];
																	?>
																	
																	<tr id="marcados_<?php echo $id; ?>">
																				<td  style="cursor: pointer;">
																				<div class="col-md-12" style="display: flex;">
																					<div  class="col-md-2">
																						<input type="checkbox" name="" id="count_input_all_<?php echo $count1;?>" onclick="add_check(<?php echo $count1;?>)">
																						<input type="hidden" name="" id="id_order_<?php echo $count1; ?>" value="<?php echo $id?>">
																						<input type="hidden" name="" id="email_<?php echo $count1; ?>" value="<?php echo $email?>">
																						<input type="hidden" name="" id="nombre_<?php echo $count1; ?>" value="<?php echo $name?>">
																					</div>
																					<div class="col-md-4" style="cursor: auto;"></div>
																					<div class="col-md-4">
																						<a href="order_details.php?order=<?php echo $id;?>"><?php echo $id_control;?></a>
																					</div><!--
																					<div class="col-md-4" style="cursor: auto;"></div>
																					
																					<div  class="col-md-2">
																						<i class="align-middle me-2 far fa-fw fa-share-square" style="height: 20px;" title="Archivar"onclick="archivar(<?php echo $id?>,1,'all_<?php echo $id; ?>')"></i>
																					</div>-->
																					<div class="col-md-2" style="cursor: auto;">
																						<input type="hidden" name="" id="arch_<?php echo $count1; ?>" value="0">
																						<?php
																						if($star == 0)
																						{
																							?>
																								<input type="hidden" name="" id="star_<?php echo $count1; ?>" value="0"> <!--onclick="star(<?php //echo $id?>,1,'all_<?php // echo $id; ?>')"-->
																								<i class="align-middle me-2 far fa-fw fa-star"  style="height: 20px;color: darkorange;font-weight: lighter;"  title="Marcar"></i>
																							<?php
																						}
																						else
																						{
																							?>
																								<input type="hidden" name="" id="star_<?php echo $count1; ?>" value="1"> <!-- onclick="star(<?php // echo $id?>,0,'all_<?php // echo $id; ?>')" -->
																								<i class="align-middle me-2 far fa-fw fa-star" style="height: 20px;color: darkorange;font-weight: bold;" title="Marcar"></i>
																							<?php
																						}
																						?>
																					</div>
																					
																				</div>
																			</td>
																			<?php
																			if($tipe!="Sample")
																			{
																				if($statusp == 11)
																				{
																					$tipe_ori = $tipe;
																					$tipe = "Tarjetas sin diseño";
																				} 
																				if($vista == "frente")
																				{
																					$vista = "4/0";
																				}
																				if($vista == "frentevuelta")
																				{
																					$vista = "4/4";
																				}
																				if($acabado == "barniz")
																				{
																					$acabado = "BUV";
																				}
																				if($acabado == "mate")
																				{
																					$acabado = "Mate";
																				}
																			?>
																				<td><?php echo $name; //."<br>".$email."<br>".$phone;?></td>
																				<td><?php
																				if($tipe == "Tarjetas") 
																					echo $width_inches."cm x ".$height_inches."cm <br>".$tipe. " <br>Qty: ".$quantity."<br>".$vista." ".$acabado;
																				if($tipe == "Volantes") 
																				{
																					if($height_inches == 0)
																					{
																						$tam = "Tamaño Carta";
																					}else
																					{
																						$tam = "Tamaño " . $width_inches ."/". $height_inches." Carta";
																					}
																					echo $tipe."<br>".$tam. " <br>Qty: ".$quantity."<br>".$vista." ".$acabado;
																				}
																				?></td>
																			<?php
																				$tipe = $tipe_ori;
																			}
																			else
																			{
																			?>
																				<td><?php echo $tipe;?></td>
																			<?php
																			}
																			?>
																				<td>$ <?php echo $price-(($price/100)*$cantidad);?></td>
																				<td><?php echo $date ;?></td>
																			
																				<?php
																			if($statusp == 0)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-warning">Pendiente de prueba</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 1)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-primary">Pendiente de aprobación</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 2)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-primary">Aprobado</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 3)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-warning">Prepensa</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 4)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-warning">Impresión</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 5)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-warning">Acabados</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 6)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-secondary">Listo para recoger</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 7)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-info">Enviado</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 8)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-danger">Cancelado</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 9)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-success">Entregado</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 11)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-success">Completo</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 12)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-warning">Envio de archivos por correo</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 13)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-warning">Pendiente de pago</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 14)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-warning">Revisar pago</span>
																			</td>
																			<?php
																			}
																			?>
																		</tr>
																	
															<?php
																}
																?>
																	
																	<!--
																		<tr>
																			<td>Ashton Cox</td>
																			<td>Levitz Furniture</td>
																			<td>ashton@cox.com</td>
																			<td><span class="badge bg-success">Active</span></td>
																		</tr>
																		<tr>
																			<td>Sonya Frost</td>
																			<td>Child World</td>
																			<td>sonya@frost.com</td>
																			<td><span class="badge bg-danger">Deleted</span></td>
																		</tr>
																		<tr>
																			<td>Jena Gaines</td>
																			<td>Helping Hand</td>
																			<td>jena@gaines.com</td>
																			<td><span class="badge bg-warning">Inactive</span></td>
																		</tr>
																	-->
																	</tbody>
																</table>
																<?php
															}
															?>
														</div>
													</div>
												</div>
											</div>
											
											</div>
										
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="archivados">
							<div class="row">
								<div class="col-xl-12 col-xxl-12 d-flex">
									<div class="w-100">
										<div class="row">
										<div class="container-fluid p-0">
											<div class="row">
												
												<div class="modal fade show" id="sizedModalMd" tabindex="-1" style="padding-right: 19px;visibility: hidden;display: none;" aria-modal="true" role="dialog">
													<div class="modal-dialog modal-md" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title">Medium modal</h5>
																<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
															</div>
															<div class="modal-body m-3">
																<p class="mb-0">Use Bootstrap’s JavaScript modal plugin to add dialogs to your site for lightboxes, user
																	notifications, or completely custom content.</p>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
																<button type="button" class="btn btn-primary">Save changes</button>
															</div>
														</div>
													</div>
												</div>
												<div class="col-xl-12">
													<div class="card">
														<div class="card-body" id="usr">
															<?php
															include "../php/conexion.php";
															$query    = "SELECT * FROM orders WHERE archivar = '1' ORDER BY id DESC";
															$validar  = mysqli_query($conexion,$query);
															if(mysqli_num_rows($validar)>0)
															{
																?>
																<table class="table table-striped" style="width:100%" id="responsivo_archivados">
																<thead>
																	<tr>
																		<th class="col-md-2">Orden</th>
																		<th class="col-md-2">Cliente</th>
																		<th class="col-md-2">Producto</th>
																		<th class="col-md-2">Costo</th>
																		<th class="col-md-2">Fecha del pedido</th>
																		<th class="col-md-2" style="text-align: center;">Estatus</th>
																	</tr>
																</thead>
																<tbody>
																<?php
																//id id_user	width_inches	height_inches	price	tipe	quantity	id_images	txt_details	dates	delivery_date	statusp	id_address	
																//id_billing	guie	shipping	envio	vista	acabado	esquinas	ponchado	corte	id_control	pagado	n_referencia
																while ($extraido= mysqli_fetch_array($validar))
																{
																	$count1++;
																	$id            = $extraido['id'];
																	$id_user       = $extraido['id_user'];
																	$width_inches  = $extraido['width_inches'];
																	$height_inches = $extraido['height_inches'];
																	$price         = $extraido['price'];
																	$tipe          = $extraido['tipe'];
																	$quantity      = $extraido['quantity'];
																	$id_images     = $extraido['id_images'];
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
																	$id_cupon      = $extraido['id_cupon'];
																	$star      	   = $extraido['star'];
																	$query_user    = "SELECT * FROM users WHERE id='$id_user'";
																	$result_user   = mysqli_query($conexion,$query_user);
																	$extraido2     = mysqli_fetch_array($result_user);
																	$name          = $extraido2['usrname'];
																	$email         = $extraido2['email'];
																	$code          = $extraido2['code'];
																	$phone         = $extraido2['phone'];
																	$query_cupon   = "SELECT * FROM cupones WHERE id='$id_cupon'";
																	$result_cupon  = mysqli_query($conexion,$query_cupon);
																	$extraido3     = mysqli_fetch_array($result_cupon);
																	$nombre        = $extraido3['nombre'];
																	$fecha_inicio  = $extraido3['fecha_inicio'];
																	$fecha_final   = $extraido3['fecha_final'];
																	$cantidad      = $extraido3['cantidad'];
																	$aplicado      = $extraido3['aplicado'];
																	?>
																	
																	<tr id="archivados_<?php echo $id; ?>">
																				<td  style="cursor: pointer;">
																				<div class="col-md-12" style="display: flex;">
																					<div  class="col-md-2">
																						<input type="checkbox" name="" id="count_input_all_<?php echo $count1;?>" onclick="add_check(<?php echo $count1;?>)">
																						<input type="hidden" name="" id="id_order_<?php echo $count1; ?>" value="<?php echo $id?>">
																						<input type="hidden" name="" id="email_<?php echo $count1; ?>" value="<?php echo $email?>">
																						<input type="hidden" name="" id="nombre_<?php echo $count1; ?>" value="<?php echo $name?>">
																					</div>
																					<div class="col-md-4" style="cursor: auto;"></div>
																					<div class="col-md-4">
																						<a href="order_details.php?order=<?php echo $id;?>"><?php echo $id_control;?></a>
																					</div><!--
																					<div class="col-md-4" style="cursor: auto;"></div>
																					
																					<div  class="col-md-2">
																						<i class="align-middle me-2 far fa-fw fa-share-square" style="height: 20px;" title="Archivar"onclick="archivar(<?php echo $id?>,1,'all_<?php echo $id; ?>')"></i>
																					</div>-->
																					<div class="col-md-2" style="cursor: auto;">
																						<input type="hidden" name="" id="arch_<?php echo $count1; ?>" value="1">
																						<?php
																						if($star == 0)
																						{
																							?>
																								<input type="hidden" name="" id="star_<?php echo $count1; ?>" value="0"> <!--onclick="star(<?php //echo $id?>,1,'all_<?php // echo $id; ?>')"-->
																								<i class="align-middle me-2 far fa-fw fa-star"  style="height: 20px;color: darkorange;font-weight: lighter;"  title="Marcar"></i>
																							<?php
																						}
																						else
																						{
																							?>
																								<input type="hidden" name="" id="star_<?php echo $count1; ?>" value="1"> <!-- onclick="star(<?php // echo $id?>,0,'all_<?php // echo $id; ?>')" -->
																								<i class="align-middle me-2 far fa-fw fa-star" style="height: 20px;color: darkorange;font-weight: bold;" title="Marcar"></i>
																							<?php
																						}
																						?>
																					</div>
																				</div>
																			</td>
																			<?php
																			if($tipe!="Sample")
																			{
																				if($statusp == 11)
																				{
																					$tipe_ori = $tipe;
																					$tipe = "Tarjetas sin diseño";
																				} 
																				if($vista == "frente")
																				{
																					$vista = "4/0";
																				}
																				if($vista == "frentevuelta")
																				{
																					$vista = "4/4";
																				}
																				if($acabado == "barniz")
																				{
																					$acabado = "BUV";
																				}
																				if($acabado == "mate")
																				{
																					$acabado = "Mate";
																				}
																			?>
																				<td><?php echo $name; //."<br>".$email."<br>".$phone;?></td>
																				<td><?php
																				if($tipe == "Tarjetas") 
																					echo $width_inches."cm x ".$height_inches."cm <br>".$tipe. " <br>Qty: ".$quantity."<br>".$vista." ".$acabado;
																				if($tipe == "Volantes") 
																				{
																					if($height_inches == 0)
																					{
																						$tam = "Tamaño Carta";
																					}else
																					{
																						$tam = "Tamaño " . $width_inches ."/". $height_inches." Carta";
																					}
																					echo $tipe."<br>".$tam. " <br>Qty: ".$quantity."<br>".$vista." ".$acabado;
																				}
																				?></td>
																			<?php
																				$tipe = $tipe_ori;
																			}
																			else
																			{
																			?>
																				<td><?php echo $tipe;?></td>
																			<?php
																			}
																			?>
																				<td>$ <?php echo $price-(($price/100)*$cantidad);?></td>
																				<td><?php echo $date ;?></td>
																			
																				<?php
																			if($statusp == 0)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-warning">Pendiente de prueba</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 1)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-primary">Pendiente de aprobación</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 2)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-primary">Aprobado</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 3)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-warning">Prepensa</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 4)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-warning">Impresión</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 5)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-warning">Acabados</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 6)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-secondary">Listo para recoger</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 7)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-info">Enviado</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 8)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-danger">Cancelado</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 9)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-success">Entregado</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 11)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge bg-success">Completo</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 12)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-warning">Envio de archivos por correo</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 13)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-warning">Pendiente de pago</span>
																			</td>
																			<?php
																			}
																			?>
																			<?php
																			if($statusp == 14)
																			{
																			?>
																			<td style="text-align: center;">
																				<span class="badge btn-warning">Revisar pago</span>
																			</td>
																			<?php
																			}
																			?>
																		</tr>
																	
															<?php
																}
																?>
																	
																	<!--
																		<tr>
																			<td>Ashton Cox</td>
																			<td>Levitz Furniture</td>
																			<td>ashton@cox.com</td>
																			<td><span class="badge bg-success">Active</span></td>
																		</tr>
																		<tr>
																			<td>Sonya Frost</td>
																			<td>Child World</td>
																			<td>sonya@frost.com</td>
																			<td><span class="badge bg-danger">Deleted</span></td>
																		</tr>
																		<tr>
																			<td>Jena Gaines</td>
																			<td>Helping Hand</td>
																			<td>jena@gaines.com</td>
																			<td><span class="badge bg-warning">Inactive</span></td>
																		</tr>
																	-->
																	</tbody>
																</table>
																<?php
															}
															?>
														</div>
													</div>
												</div>
											</div>
											
											</div>
										
										</div>
									</div>
								</div>
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
	<script src="js/datatables.js"></script>

	<script>
		function filterGlobal () 
		{
			$('#responsivo_all').DataTable().search($('#searchglobal').val(),false,true).draw();			
		}
		 
		$(document).ready(function() {
			$('#searchglobal').on( 'keyup', function () {
				filterGlobal();
			});
		} );

		document.addEventListener("DOMContentLoaded", function() 
		{
			$("#responsivo_all").DataTable({
				responsive: true,
				stateSave: true,
				order: [ 0, 'desc' ],
				language: {
					url: '//cdn.datatables.net/plug-ins/1.11.4/i18n/es-mx.json'
				}
			});
		});

		document.addEventListener("DOMContentLoaded", function() {
			// Datatables Responsive
			$("#responsivo_entregado").DataTable({
				responsive: true,
				stateSave: true,
				language: {
					url: '//cdn.datatables.net/plug-ins/1.11.4/i18n/es-mx.json'
				}
			});
		});
		document.addEventListener("DOMContentLoaded", function() {
			// Datatables Responsive
			$("#responsivo_pendientes").DataTable({
				responsive: true,
				stateSave: true,
				language: {
					url: '//cdn.datatables.net/plug-ins/1.11.4/i18n/es-mx.json'
				}
			});
		});
		document.addEventListener("DOMContentLoaded", function() {
			// Datatables Responsive
			$("#responsivo_aprobados").DataTable({
				responsive: true,
				stateSave: true,
				language: {
					url: '//cdn.datatables.net/plug-ins/1.11.4/i18n/es-mx.json'
				}
			});
		});
		document.addEventListener("DOMContentLoaded", function() {
			// Datatables Responsive
			$("#responsivo_marcados").DataTable({
				responsive: true,
				stateSave: true,
				language: {
					url: '//cdn.datatables.net/plug-ins/1.11.4/i18n/es-mx.json'
				}
			});
		});
		document.addEventListener("DOMContentLoaded", function() {
			// Datatables Responsive
			$("#responsivo_archivados").DataTable({
				responsive: true,
				stateSave: true,
				language: {
					url: '//cdn.datatables.net/plug-ins/1.11.4/i18n/es-mx.json'
				}
			});
		});
	</script>
</body>
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
</html>