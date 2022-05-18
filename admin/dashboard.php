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
	<script src="js/settings.js"></script> -->
	<script src="https://kit.fontawesome.com/a38c16a07e.js"></script>
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="dashboard.php">
          <span class="align-middle">ografix</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-item active">
						<a class="sidebar-link" href="dashboard.php">
							<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
						</a>
					</li>
					<li class="sidebar-item">
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
									<!--<span class="indicator">4</span>-->
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

			<main class="content">
				<div class="container-fluid p-0">

					<div class="row mb-2 mb-xl-3">
						<div class="col-auto d-none d-sm-block">
							<h3>Dashboard</h3>
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
									<div class="col-12 col-md-4 col-lg-5 col-xl-4 col-xxl-3">
										<div class="card">
											<a href="orders.php">
												<div class="card-body text-center">
													<h5 class="card-title mb-4">Ordenes</h5>
													<div class="row g-0 mt-1">
														<div style="width: 50%;margin: auto;">
															<img src="../src/img/photos/cajas.png" class="card-img-top" alt="Unsplash">
														</div>
														<?php
														include "../php/conexion.php";
														$query    = "SELECT * FROM orders";
														$result = mysqli_query($conexion,$query);
														?>
														<div class="mb-0">
															<span class="text-muted"><?php echo mysqli_num_rows($result);?></span>
														</div>
													</div>
												</div>
											</a>
										</div>
									</div>
									<div class="col-12 col-md-4 col-lg-5 col-xl-4 col-xxl-3">
										<div class="card">
											<a href="customers.php">
												<div class="card-body text-center">
													<h5 class="card-title mb-4">Clientes</h5>
													<div class="row g-0 mt-1">
														<div style="width: 50%;margin: auto;">
															<img src="../src/img/photos/users.png" class="card-img-top" alt="Unsplash">
														</div>
														<?php
														$query    = "SELECT * FROM users";
														$result = mysqli_query($conexion,$query);
														?>
														<div class="mb-0">
															<span class="text-muted"><?php echo mysqli_num_rows($result);?></span>
														</div>
													</div>
												</div>
											</a>
										</div>
									</div>
									<?php
									if($_SESSION['tipe_admi']  == 10)
									{
									?>
									<div class="col-12 col-md-4 col-lg-5 col-xl-4 col-xxl-3">
										<div class="card">
											<a href="sales.php">
												<div class="card-body text-center">
													<h5 class="card-title mb-4">Ventas</h5>
													<div class="row g-0 mt-1">
														<div style="width: 50%;margin: auto;">
															<img src="../src/img/photos/sales.png" class="card-img-top" alt="Unsplash">
														</div>
														<div class="mb-0">
															<?php
																$month 		= date('m');
																//$query    = "SELECT MONTH(dates) as SalesMonth, SUM(price) AS TotalSales FROM orders WHERE MONTH(dates) ='$month'";
																$query    	= "SELECT * FROM orders WHERE MONTH(dates) ='$month'";
																$result 	= mysqli_query($conexion,$query);
																//$extraido3  = mysqli_fetch_array($result);
																$suma_mes   = 0;
																while($extraido3 = mysqli_fetch_array($result))
																{
																	$price      = $extraido3['price'];
																	$id_cupon   = $extraido3['id_cupon'];
																	$statusp   	= $extraido3['statusp'];
																	if($statusp != 13 && $statusp != 14)
																	{
																		if($id_cupon == 0)
																		{
																			$suma_mes  += $price;
																		}
																		else
																		{
																			$querycupon = "SELECT * FROM cupones WHERE id ='$id_cupon'";
																			$result2 	= mysqli_query($conexion,$querycupon);
																			$extraidocup= mysqli_fetch_array($result2);
																			$id      	= $extraidocup['id'];
																			$nombre     = $extraidocup['nombre'];
																			$fecha_inicio = $extraidocup['fecha_inicio'];
																			$fecha_final  = $extraidocup['fecha_final'];
																			$cantidad   = $extraidocup['cantidad'];
																			$aplicado   = $extraidocup['aplicado'];
																			$porcentaje = 100 - $cantidad;
																			$suma_mes  += ($price/100) * $porcentaje;
																		}
																	}
																}
															?>
															<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> $<?php echo $suma_mes;?></span>
															<span class="text-muted">Este mes</span>
														</div>
													</div>
												</div>
											</a>
										</div>
									</div>
									<?php
									}
									?>
									<div class="col-12 col-md-4 col-lg-5 col-xl-4 col-xxl-3">
										<!--<div class="card">
											<div class="card-body text-center">
												<h5 class="card-title mb-4">Sales</h5>
												<div class="col-6 col-md-4 col-lg-4 col-xl-3" style="margin: auto;height: 134px;">
													<img src="../src/img/photos/sales.png" class="img-fluid pe-2" alt="Unsplash">
												</div>
												<h1 class="mt-1 mb-3">$2130.00</h1>
											</div>
										</div>-->
										<div class="card">
											<a href="settings.php">
												<div class="card-body text-center">
													<h5 class="card-title mb-4" style="visibility: hidden;">Configuración</h5>
													<div class="row g-0 mt-1">
														<div style="width: 50%;margin: auto;">
															<img src="../src/img/photos/settings.png" class="card-img-top" alt="Unsplash">
														</div>
														<div class="mb-0" style="visibility: hidden;">
															<span class="text-muted"><?php echo mysqli_num_rows($result);?></span>
														</div>
													</div>
												</div>
											</a>
										</div>
									</div>
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

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
			gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Sales ($)",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.primary,
						data: [
							2115,
							1562,
							1584,
							1892,
							1587,
							1923,
							2566,
							2448,
							2805,
							3438,
							2917,
							3327
						]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 1000
							},
							display: true,
							borderDash: [3, 3],
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Pie chart
			new Chart(document.getElementById("chartjs-dashboard-pie"), {
				type: "pie",
				data: {
					labels: ["Chrome", "Firefox", "IE"],
					datasets: [{
						data: [4306, 3801, 1689],
						backgroundColor: [
							window.theme.primary,
							window.theme.warning,
							window.theme.danger
						],
						borderWidth: 5
					}]
				},
				options: {
					responsive: !window.MSInputMethodContext,
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					cutoutPercentage: 75
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: "bar",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "This year",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
						barPercentage: .75,
						categoryPercentage: .5
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var markers = [{
					coords: [31.230391, 121.473701],
					name: "Shanghai"
				},
				{
					coords: [28.704060, 77.102493],
					name: "Delhi"
				},
				{
					coords: [6.524379, 3.379206],
					name: "Lagos"
				},
				{
					coords: [35.689487, 139.691711],
					name: "Tokyo"
				},
				{
					coords: [23.129110, 113.264381],
					name: "Guangzhou"
				},
				{
					coords: [40.7127837, -74.0059413],
					name: "New York"
				},
				{
					coords: [34.052235, -118.243683],
					name: "Los Angeles"
				},
				{
					coords: [41.878113, -87.629799],
					name: "Chicago"
				},
				{
					coords: [51.507351, -0.127758],
					name: "London"
				},
				{
					coords: [40.416775, -3.703790],
					name: "Madrid "
				}
			];
			var map = new jsVectorMap({
				map: "world",
				selector: "#world_map",
				zoomButtons: true,
				markers: markers,
				markerStyle: {
					initial: {
						r: 9,
						strokeWidth: 7,
						stokeOpacity: .4,
						fill: window.theme.primary
					},
					hover: {
						fill: window.theme.primary,
						stroke: window.theme.primary
					}
				}
			});
			window.addEventListener("resize", () => {
				map.updateSize();
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			document.getElementById("datetimepicker-dashboard").flatpickr({
				inline: true,
				prevArrow: "<span title=\"Previous month\">&laquo;</span>",
				nextArrow: "<span title=\"Next month\">&raquo;</span>",
			});
		});
	</script>

</body>

</html>