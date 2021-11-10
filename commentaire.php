<?php
session_start();
require('vendors/php/fonctions/comentaires.php');
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

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>

<body>
	
<?php
	if($_SESSION['role'] == "Etudiant"){
		include('headerEtud.php');
	}else{
		include('headerRespo.php');
	}
?>

	<div class="mobile-menu-overlay"></div>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4><?= ($tete) ?></h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Actualité - <?= $tete ?></li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="bloc">
					<div class="row" style="width: 100%; margin-left:0px;">
						<div class="col-lg-4 col-md-4 col-sm-12 container notif">
							<div class="notification pd-5  customscroll bg-white">
								<?php
								if ($tmp4) {
									blocshow($tmp4);
								}
								?>
							</div>
						</div>
						<div class="b col-lg-8 col-md-8 col-sm-12">
							<div class="d1 bg-white" style="padding-right: 10px;">
								<div class="mb-10"></div>
								<div class="row chat-profile-header tete">
									<?php
									if ($tmp1) {
										contenuteteshow($tmp1, $nbreq);
									}
									?>
								</div>
								<div class="row bg-white mb-0">
									<?php
									if ($tmp1) {
										contenucorpshow($tmp1);
									}
									?>
								</div>
								<div class="row mb-10 bg-white pd-10">
									<div class="col-1 like">
										<form action="commentaire.php" method="POST">
											<button type="submit" class="like" name="liker" value="like"><i class="fa fa-thumbs-up" style="font-size: 35px; margin-top: 5px; color: Black"></i> </button>
										</form>
									</div>
									<form class="col-11 row" action="commentaire.php" method="POST">
										<div class="col-9">
											<textarea name="content" placeholder="Ecrire un commentaire" style="width: 100%; border: 0px;"></textarea>
										</div>
										<div class="col-3">
											<button class="btn-primary btn bouton" name="comment" style="margin-top: 5px;" value="<?= $idpub ?>" type="submit">Envoyer</button>
										</div>
									</form>
									<h5 class="text-blue com">Les commentaires</h5>

								</div>
							</div>
							<div class="d2 bg-white" style="margin-top: 10px;">
								<div class="row mb-20" style="margin-left: 0px;">
									<button type="button" class="btn-primary btn" id="comment" value=""> <i class="fa fa-arrow-left"></i> </button>
								</div>
								<div id="commentaire" class="commentaire container customscroll pd-50 mb-50" style="height: 700px;">
									<div>
										<div style="margin-right: 30px; margin-left: 30px; margin-top: 10px" class="mb-30">
											<?php
												commentaire($idpub, $connexion);
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

	<style>
		button{
			background-color: transparent;
			border: none;
		}
		.notification {
			height: 740px;
			overflow-y: auto;
			padding-left: 10px;
			margin-top: 10px;
		}

		.d1 {
			border-radius: 10px 10px 0px 0px !important;
		}

		.d2 {
			display: none;
		}

		.like {
			background-color: transparent;
			border: none;
		}

		#commentaire {
			padding-left: 5%;
			padding-right: 5%;
		}

		.pmsg {
			margin-right: 20px;
		}

		.db {
			padding: 10px 40px 0px 40px;
		}

		.dh {
			padding: 10px 10px 5px 10px;
			background-color: rgb(230, 230, 230);
		}

		.message {
			height: 450px;
			overflow-y: auto;
			text-align: justify;
			margin-right: -6px;
		}

		.bloc {
			-webkit-border-radius: 10px;
			-moz-border-radius: 10px;
			border-radius: 10px;
			-webkit-box-shadow: 0px 0px 28px rgba(0, 0, 0, .08);
			-moz-box-shadow: 0px 0px 28px rgba(0, 0, 0, .08);
			box-shadow: 0px 0px 28px rgba(0, 0, 0, .08);
		}

		.tete {
			background-color: white;
		}

		@media (max-width: 766px) {
			.notif {
				display: none;
			}
		}

		.pub {
			margin-right: 6%;
			box-shadow: 0px 0px 2px blue !important;
			margin-left: 10px;
			margin-top: 5px;
		}

		.last {
			margin-right: 0%;
		}

		.h5 {
			margin-top: 10%;
			color: blue;
		}

		.h6 {
			font-size: 12px;
			opacity: 0.7;
		}

		.titrepub {
			max-height: 100px;
			overflow-y: auto;
			text-align: center;
			color: rgb(121, 121, 121);
			margin-bottom: 30px;
		}

		div .avis {
			margin-bottom: 5%;
			margin-top: -5%;
		}

		.avis span {
			margin-top: 2.5%;
			color: blue;
		}

		span i {
			color: blue;
		}

		.drop {
			color: white !important;
		}

		.drop:hover {
			background-color: rgb(22, 0, 122);
		}

		.drop:link {
			background-color: rgb(255, 255, 255);
			color: black !important;
		}

		.submenu li:hover {
			background-color: rgb(193, 129, 252);
		}

		.menu-block {
			background-color: #00A7E3;
		}

		.left-side-bar {
			background-color: rgb(175, 175, 175);
		}

		.header {
			background-color: #00A7E3;
		}

		body {
			font-family: Montserrat-ExtraBold;
		}

		.submenu {
			background-color: rgb(0, 0, 202);
		}

		.w {
			font-weight: 500;
			font-size: 18px;
			height: 100px;
		}
		h5{
			cursor:pointer !important;
		}
	</style>
	<script src="src\scripts\jquery.min.js"></script>
	<script>
		var a = $('.b').attr('class');
		var i = false;
		$(document).ready(function() {
			$('.com').click(function() {
				if (i == false) {
					$('.d1').slideToggle('1000');
					$('.d2').slideToggle('1000');
					$('.d2').css('display', 'block');
					i = true;
				}
			});
			$('#comment').click(function() {
				$('.d1').slideToggle('1000');
				$('.d2').slideToggle('1000');
				i = false;
			});
		});
	</script>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
</body>

</html>