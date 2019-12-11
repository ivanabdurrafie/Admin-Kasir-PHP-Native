<!doctype html>
<?php
include "../../db/connection.php";
        session_start();
        if ($_SESSION['status'] == 'login') {
            if ( $_SESSION['Level'] == 'Kasir') {
            }else {
                $message = "You are not A Kasir.";
                echo "<script type='text/javascript'>alert('$message');
                window.location.replace('../../login.html');
                </script>";  
            }
            
        }else {
            $message = "You are not logged in.";
            echo "<script type='text/javascript'>alert('$message');
            window.location.replace('../../login.html');
            </script>";  
		}
		$sqlBarang = "SELECT * from user";
        $res = $conn->query($sqlBarang);

    ?>
	<html class="fixed">
		<head>

			<!-- Basic -->
			<meta charset="UTF-8">

			<title>Dashboard </title>
			<meta name="keywords" content="HTML5 Admin Template" />
			<meta name="description" content="JSOFT Admin - Responsive HTML5 Template">
			<meta name="author" content="JSOFT.net">

			<!-- Mobile Metas -->
			<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

			<!-- Web Fonts  -->
			<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

			<!-- Vendor CSS -->
			<link rel="stylesheet" href="../../assets/vendor/bootstrap/css/bootstrap.css" />
			<link rel="stylesheet" href="../../assets/vendor/font-awesome/css/font-awesome.css" />
			<link rel="stylesheet" href="../../assets/vendor/magnific-popup/magnific-popup.css" />
			<link rel="stylesheet" href="../../assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

			<!-- Specific Page Vendor CSS -->
			<link rel="stylesheet" href="../../assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
			<link rel="stylesheet" href="../../assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
			<link rel="stylesheet" href="../../assets/vendor/morris/morris.css" />

			<!-- Theme CSS -->
			<link rel="stylesheet" href="../../assets/stylesheets/theme.css" />

			<!-- Skin CSS -->
			<link rel="stylesheet" href="../../assets/stylesheets/skins/default.css" />

			<!-- Theme Custom CSS -->
			<link rel="stylesheet" href="../../assets/stylesheets/theme-custom.css">

			<!-- Head Libs -->
			<script src="../../assets/vendor/modernizr/modernizr.js"></script>

		</head>
		<body>
			<section class="body">

				<!-- start: header -->
				<header class="header">
					<div class="logo-container">
						<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>
				
					<!-- start: search & user box -->
					<div class="header-right">
				
						<span class="separator"></span>
				
						<div id="userbox" class="userbox">
							<a href="#" data-toggle="dropdown">
								<figure class="profile-picture">
									<img src="../../assets/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="../../assets/images/!logged-user.jpg" />
								</figure>
								<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@JSOFT.com">
									<span class="name"><?php echo $_SESSION['username'] ?> </span>
									<span class="role"><?php echo $_SESSION['Level'] ?> </span>
								</div>
				
								<i class="fa custom-caret"></i>
							</a>
				
							<div class="dropdown-menu">
								<ul class="list-unstyled">
									<li class="divider"></li>
									<li>
										<a role="menuitem" tabindex="-1" href="../../logout.php"><i class="fa fa-power-off"></i> Logout</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- end: search & user box -->
				</header>
				<!-- end: header -->

				<div class="inner-wrapper">
					<!-- start: sidebar -->
					<aside id="sidebar-left" class="sidebar-left">
					
						<div class="sidebar-header">
							<div class="sidebar-title">
								Navigation
							</div>
							<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
								<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
							</div>
						</div>
					
						<div class="nano">
							<div class="nano-content">
								<nav id="menu" class="nav-main" role="navigation">
									<ul class="nav nav-main">
										<li class="nav">
											<a href="../index.php">
												<i class="fa fa-home" aria-hidden="true"></i>
												<span>Dashboard</span>
											</a>
										</li>
										<li class="nav">
											<a href="../order/ordertabel.php">
												<i class="fa fa-usd" aria-hidden="true"></i>
												<span>Order</span>
											</a>
										</li>
									</ul>
								</nav>
							</div>
					
						</div>
					
					</aside>
					<!-- end: sidebar -->

					<section role="main" class="content-body">
						<header class="page-header">
							<h2>Insert Order</h2>
						
							<div class="right-wrapper pull-right">
								<ol class="breadcrumbs">
									<li>
										<a href="ordertabel.php">
											<i class="fa fa-usd"></i>
										</a>
									</li>
									<li><span>Order</span></li>
								</ol>
						
								<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
							</div>
						</header>


						<!-- start: page -->
					<div class="row">
						<div class="col-lg-12">
							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
												<a href="#" class="fa fa-caret-down"></a>
												<a href="#" class="fa fa-times"></a>
									</div>
							
									<h2 class="panel-title">Form Insert Order</h2>
								</header>
								<div class="panel-body">
									<form action="orderinsertaction.php" class="form-horizontal" method="post" enctype="multipart/form-data">
										<div class="form-group">
												<label class="col-md-3 control-label">Barang</label>
												<div class="col-md-7">
													<?php
													$sql = "Select * from barang";
													$result = $conn->query($sql);
													?>
													<select data-plugin-selectTwo class="form-control populate" name="barang">
														<?php
															while($rowBarang = $result->fetch_assoc()){
														?>
															<option value="<?php echo $rowBarang['idBarang']; ?>"><?php echo $rowBarang['Nama']." Rp. ".Number_format($rowBarang['Harga']); ?></option>
														<?php
															}
														?>
													</select>
												</div>
											</div>
										<div class="form-group">
											<label class="col-md-3 control-label" for="inputDefault">Qty</label>
											<div class="col-md-7">
												<input type="number" class="form-control" id="inputDefault" name="qty" placeholder="10">
											</div>	
										</div>
										<div class="form-group">
										<label class="col-md-3 control-label"></label>
											<div class="col-md-7">
												<button class="btn btn-block" name="submit" value="Submit">Submit</button>
											</div>
										</div>
									</form>
								</div>
							</section>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="panel">
							<header class="panel-heading">
									<div class="panel-actions">
												<a href="#" class="fa fa-caret-down"></a>
												<a href="#" class="fa fa-times"></a>
									</div>
							
									<h2 class="panel-title">Cart</h2>
								</header>
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table table table-bordered table-striped col-lg-12" id="datatable-ajax" data-url="../../assets/ajax/ajax-datatables-sample.json" >
											<thead>
												<tr>
													<th>Barang</th>
													<th>Harga</th>
													<th>Qty</th>
													<th>subtotal</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$sqlCart = "Select c.idcart,b.Nama,b.Harga,c.qty,c.subtotal from barang b,cart c where b.idBarang = c.idBarang";
												$resultCart = $conn->query($sqlCart);
												while($row = $resultCart->fetch_assoc()) {
													echo "<tr>
															<td>". $row["Nama"]."</td>
															<td>". $row["Harga"]."</td>
															<td>". $row["qty"]."</td>
															<td> ". $row["subtotal"]."</td>
															<td><a href='orderdelete.php?idcart=".$row["idcart"]."' class='btn btn-danger btn-block'>Delete</td>
													</tr>";
												}
													$conn->close();
												?>
												<tr>
													<td colspan=5>
														<a href='confirm.php' class='btn btn-primary btn-block'>Confirm
													</td>
												</tr>
											</tbody>
										</table>															
									</div>
								</div>
							</div>
						</div>
					</div>
						<!-- end: page -->
					</section>
				</div>

				<aside id="sidebar-right" class="sidebar-right">
					<div class="nano">
						<div class="nano-content">
							<a href="#" class="mobile-close visible-xs">
								Collapse <i class="fa fa-chevron-right"></i>
							</a>
				
							<div class="sidebar-right-wrapper">
				
								<div class="sidebar-widget widget-calendar">
									<h6>Upcoming Tasks</h6>
									<div data-plugin-datepicker data-plugin-skin="dark" ></div>
								</div>
				
				
							</div>
						</div>
					</div>
				</aside>
			</section>

			<!-- Vendor -->
			<script src="../../assets/vendor/jquery/jquery.js"></script>
			<script src="../../assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
			<script src="../../assets/vendor/bootstrap/js/bootstrap.js"></script>
			<script src="../../assets/vendor/nanoscroller/nanoscroller.js"></script>
			<script src="../../assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
			<script src="../../assets/vendor/magnific-popup/magnific-popup.js"></script>
			<script src="../../assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
			
			<!-- Specific Page Vendor -->
			<script src="../../assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
			<script src="../../assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
			<script src="../../assets/vendor/jquery-appear/jquery.appear.js"></script>
			<script src="../../assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
			<script src="../../assets/vendor/jquery-easypiechart/jquery.easypiechart.js"></script>
			<script src="../../assets/vendor/flot/jquery.flot.js"></script>
			<script src="../../assets/vendor/flot-tooltip/jquery.flot.tooltip.js"></script>
			<script src="../../assets/vendor/flot/jquery.flot.pie.js"></script>
			<script src="../../assets/vendor/flot/jquery.flot.categories.js"></script>
			<script src="../../assets/vendor/flot/jquery.flot.resize.js"></script>
			<script src="../../assets/vendor/jquery-sparkline/jquery.sparkline.js"></script>
			<script src="../../assets/vendor/raphael/raphael.js"></script>
			<script src="../../assets/vendor/morris/morris.js"></script>
			<script src="../../assets/vendor/gauge/gauge.js"></script>
			<script src="../../assets/vendor/snap-svg/snap.svg.js"></script>
			<script src="../../assets/vendor/liquid-meter/liquid.meter.js"></script>
			<script src="../../assets/vendor/jqvmap/jquery.vmap.js"></script>
			<script src="../../assets/vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
			<script src="../../assets/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
			<script src="../../assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
			<script src="../../assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
			<script src="../../assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
			<script src="../../assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
			<script src="../../assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
			<script src="../../assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>
			
			<!-- Theme Base, Components and Settings -->
			<script src="../../assets/javascripts/theme.js"></script>
			
			<!-- Theme Custom -->
			<script src="../../assets/javascripts/theme.custom.js"></script>
			
			<!-- Theme Initialization Files -->
			<script src="../../assets/javascripts/theme.init.js"></script>


			<!-- Examples -->
			<script src="../../assets/javascripts/dashboard/examples.dashboard.js"></script>
		</body>
	</html>