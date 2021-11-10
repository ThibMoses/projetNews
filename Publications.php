<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>iPub</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body>

	<!--div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search" style="color: white;"></div>
			<div class="header-search">
				<form>
					<div class="form-group mb-0">
						<i class="dw dw-search2 search-icon"></i>
						<input type="text" class="form-control search-input" placeholder="Search Here">
						<div class="dropdown">
							<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
								<i class="ion-arrow-down-c"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="text-right">
									<button class="btn btn-primary">Rechercher</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="header-right">
			<div class="dashboard-setting user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
						<i class="dw dw-settings2" style="color: white;"></i>
					</a>
				</div>
			</div>
			<div class="user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
						<i class="icon-copy dw dw-notification" style="color: white;"></i>
						<span class="badge notification-active"></span>
					</a>
				</div>
			</div>
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="vendors/images/photo1.jpg" alt="">
						</span>
						<span class="user-name" style="color: white;">Ross C. Lopez</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Profile</a>
						<a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a>
						<a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Help</a>
						<a class="dropdown-item" href="login.html"><i class="dw dw-logout"></i> Log Out</a>
					</div>
				</div>
			</div>
		</div>
	</div-->
	<?php
	if($_SESSION['role']=='Etudiant')
	{

		include('headerEtud.php');
		
	}else{
		include('headerRespo.php');
	}
	if($_POST['direction']=='Direction')
		{
			include('PublicationDirection.php');
		}else if($_POST['direction']=='BUE-BCS')
		{
			include('PublicationBUEBCS.php');
		}else if($_POST['direction']=='Classe')
		{
			include('PublicationFiliere.php');
		}else if($_POST['direction']=='Club')
		{
			include('PublicationClub.php');
		}else{
		}
	?>

	<!--div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.html">
				<img src="vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
				<img src="vendors/images/deskapp-logo-white.svg" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li class="dropdown">
						<a href="javascript:;" class="drop dropdown-item text-center">
							<span class="micon"></span><span class="mtext">Home</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-house-1"></span><span class="mtext w h(">Actualités</span>
						</a>
						<ul class="submenu">
							<form method="get" action="trait.php">
								<li><a href="PublicationDirection.html"><button name="direction" type="submit"> Direction</button></a></li>
								<li><a href="PublicationBUEBCS.html">BUE-BCS</a></li>
								<li><a href="PublicationClub.html">Club</a></li>
								<li><a href="PublicationFiliere.html">Filiere</a></li>
							</form>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-edit2"></span><span class="mtext w h(">Publications</span>
						</a>
						<ul class="submenu">
							<li><a href="formpub.php">Publier Information</a></li>
							<li><a href="tablepublication.php">Mes publications</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-settings2"></span><span class="mtext w h(">Parametre</span>
						</a>
						<ul class="submenu">
							<li><a href="profile.html">Profile</a></li>
							<li><a href="login.html">Deconnexion</a></li>
							<li><a href="login.html">Plus...</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div-->
	<!--div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Publications</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Acceuil</a></li>
									<li class="breadcrumb-item active text-green" aria-current="page">Actualités - <?php $_POST['direction'] ?></li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="row" style="padding-left: 2%;">
					<div class="pub bg-white pd-20 card-box mb-30">
						<h6 class="h6">14/05/2021</h6>
						<h5 class="h5 text-green text-center">SERVICE COMPTABILITE</h5>
						<p class="text-center"> Paiement des fraisshcjscjhsjchschjshcsjhchckshc ScolaritéPaiement des fraisshcjscjhsjchschjshcsjhchckshc ScolaritéPaiement des fraisshcjscjhsjchschjshcsjhchckshc Scolarité </p>
						<div class="row avis">
							<span class="col-3 text-center"><i class="fa fa-thumbs-up"></i> 12</span>
							<span class="col-3 text-center"><i class="fa fa-eye"></i> 12</span>
							<span class="col-3 text-center"><i class="fa fa-comment"></i> 12</span>
							<a href="#" class="col-3 btn btn-primary text-white">Lire</a>
						</div>
					</div>
					<div class="pub bg-white pd-20 card-box mb-30">
						<h6 class="h6">il y a 15 minutes</h6>
						<h5 class="h5 text-green text-center">SERVICE COMPTABILITE</h5>
						<p class="text-center"> Paiement des fraisshcjscjhsjchschjshcsjhchckshc ScolaritéPaiement des fraisshcjscjhsjchschjshcsjhchckshc ScolaritéPaiement des fraisshcjscjhsjchschjshcsjhchckshc Scolarité </p>
						<div class="row avis">
							<span class="col-3 text-center"><i class="fa fa-thumbs-up"></i> 12</span>
							<span class="col-3 text-center"><i class="fa fa-eye"></i> 12</span>
							<span class="col-3 text-center"><i class="fa fa-comment"></i> 12</span>
							<a href="#" class="col-3 btn btn-primary text-white">Lire</a>
						</div>
					</div>
					<div class="pub bg-white pd-20 card-box mb-30">
						<h6 class="h6">14/05/2021</h6>
						<h5 class="h5 text-green text-center">SERVICE COMPTABILITE</h5>
						<p class="text-center"> Paiement des fraisshcjscjhsjchschjshcsjhchckshc ScolaritéPaiement des fraisshcjscjhsjchschjshcsjhchckshc ScolaritéPaiement des fraisshcjscjhsjchschjshcsjhchckshc Scolarité </p>
						<div class="row avis">
							<span class="col-3 text-center"><i class="fa fa-thumbs-up"></i> 12</span>
							<span class="col-3 text-center"><i class="fa fa-eye"></i> 12</span>
							<span class="col-3 text-center"><i class="fa fa-comment"></i> 12</span>
							<a href="#" class="col-3 btn btn-primary text-white">Lire</a>
						</div>
					</div>
					<div class="pub bg-white pd-20 card-box mb-30">
						<h6 class="h6">il y a 15 minutes</h6>
						<h5 class="h5 text-green text-center">SERVICE COMPTABILITE</h5>
						<p class="text-center"> Paiement des fraisshcjscjhsjchschjshcsjhchckshc ScolaritéPaiement des fraisshcjscjhsjchschjshcsjhchckshc ScolaritéPaiement des fraisshcjscjhsjchschjshcsjhchckshc Scolarité </p>
						<div class="row avis">
							<span class="col-3 text-center"><i class="fa fa-thumbs-up"></i> 12</span>
							<span class="col-3 text-center"><i class="fa fa-eye"></i> 12</span>
							<span class="col-3 text-center"><i class="fa fa-comment"></i> 12</span>
							<a href="#" class="col-3 btn btn-primary text-white">Lire</a>
						</div>
					</div>
					<div class="pub bg-white pd-20 card-box mb-30">
						<h6 class="h6">14/05/2021</h6>
						<h5 class="h5 text-green text-center">SERVICE COMPTABILITE</h5>
						<p class="text-center"> Paiement des fraisshcjscjhsjchschjshcsjhchckshc ScolaritéPaiement des fraisshcjscjhsjchschjshcsjhchckshc ScolaritéPaiement des fraisshcjscjhsjchschjshcsjhchckshc Scolarité </p>
						<div class="row avis">
							<span class="col-3 text-center"><i class="fa fa-thumbs-up"></i> 12</span>
							<span class="col-3 text-center"><i class="fa fa-eye"></i> 12</span>
							<span class="col-3 text-center"><i class="fa fa-comment"></i> 12</span>
							<a href="#" class="col-3 btn btn-primary text-white">Lire</a>
						</div>
					</div>
					<div class="pub bg-white pd-20 card-box mb-30">
						<h6 class="h6">il y a 15 minutes</h6>
						<h5 class="h5 text-green text-center">SERVICE COMPTABILITE</h5>
						<p class="text-center"> Paiement des fraisshcjscjhsjchschjshcsjhchckshc ScolaritéPaiement des fraisshcjscjhsjchschjshcsjhchckshc ScolaritéPaiement des fraisshcjscjhsjchschjshcsjhchckshc Scolarité </p>
						<div class="row avis">
							<span class="col-3 text-center"><i class="fa fa-thumbs-up"></i> 12</span>
							<span class="col-3 text-center"><i class="fa fa-eye"></i> 12</span>
							<span class="col-3 text-center"><i class="fa fa-comment"></i> 12</span>
							<a href="#" class="col-3 btn btn-primary text-white">Lire</a>
						</div>
					</div>
				</div-->
				
			</div>
		</div>
	</div>
	<!--style>
				</style-->
				<style>
					button{
						background-color: transparent;
						border:none;
					}
					.pub{
						width: 32%;
						margin-right: 1%;
						padding-bottom: 0%;
					}
					.last{
						margin-right: 0%;
					}
					.h5{
						margin-top: 10%;
						color: blue;
					}
					.h6{
						font-size: 12px;
						opacity: 0.7;
					}
					p{
						height: 100px;
						overflow-y: scroll;
					}
					div .avis{
						margin-bottom: 4%;
						margin-top: 6%;
					}
					.avis span{
						color: blue;
						margin-top: 2.5%;
					}
					span i{
						color: blue;
					}
					@media (max-width: 902px){
						.pub{
							width: 48%;
							margin-right: 2%;
						}
					}
					@media (max-width: 502px){
						.pub{
							width: 80%;
							margin-left: 10%;
							margin-right: 10%;
						}	
					}
					.drop{
						color: white !important;
					}
					.drop:hover{
						background-color: rgb(22, 0, 122);
					}
					.drop:link{
						background-color: rgb(255, 255, 255);
						color: black !important;
					}
					.submenu li:hover{
						background-color: rgb(193, 129, 252);
					}
					.menu-block{
						background-color: #00A7E3;
					}
					.left-side-bar{
						background-color: rgb(175, 175, 175);
					}
					.header{
						background-color: #00A7E3;
					}
					body{
						font-family: Montserrat-ExtraBold;
					}
					.submenu{
						background-color: rgb(0, 0, 202);
					}
					.w{
						font-weight: 500;
						font-size: 18px;
						height: 100px;
					}
					
					
				</style>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="vendors/scripts/apexcharts-setting.js"></script>
</body>
</html>