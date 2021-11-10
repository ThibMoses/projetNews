<?php
session_start();
include('vendirs/php/fonctions/traittement5.php');
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
	<div class="login-header box-shadow" style="background-color:  #00A7E3;">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="login.html">
					<h3>iPub</h3>
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li><a href="login.php" style="color: rgb(233, 233, 233);font-weight: lighter;">Login</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="offset-md-1 col-md-5">
					<img src="vendors/images/forgot-password.png" alt="">
				</div>
				<div class="col-md-6">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center" style="color: #00A7E3;">Authentification</h2>
						</div>
						<?php
							if($send == false){
								echo '
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<strong class="h4">Error</strong><br>
									le code n\'a pas pu été envoyé! Recommencer !!
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									</div>';	
							}
							if($found == false){
								echo '
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<strong class="h4">Error</strong><br>
									Matricule Introuvable
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									</div>';	
							}
							if($error == true && $error != "none"){
								echo '
									<div class="alert alert-warning alert-dismissible fade show" role="alert">
									<strong class="h4">Warning</strong><br>
									Probleme de conexion au serveur. Veuillez reesaiyez !!
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									</div>';	
							}
							?>
						<h6 class="mb-20">Entrer votre matricule</h6>
						<form method="post" action="forgot-password.php">
							<div class="form-group">
								<input type="number" id="mat" name="mat"  class="form-control form-control-lg" min="11111111" placeholder="Matricule" required><br><br>
								<span class="mat text-danger"></span>
							</div>
							<div class="row align-items-center">
								<div class="col-5">
									<div class="input-group mb-0" >
										<a class="btn btn-lg btn-block btn-secondary" href="forgot-password - Copie.html">Retour</a>
									</div>
								</div>
								<div class="col-2">
								</div>
								<div class="col-5">
									<div class="input-group mb-0">
										<input class="btn btn-primary btn-lg btn-block" name="envoyer" type="submit" value="Envoyez">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<style type="text/css">
		
	</style>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>

	<!--script src="vendors/scripts/controlform.js"></script-->
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
</body>

</html>