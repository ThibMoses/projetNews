<?php
session_start();
include('vendors/php/fonctions/traittement6.php');
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
	<div class="login-header box-shadow" style="background-color: #00A7E3;">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="login.php">
					<h3>iPub</h3>
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li><a href="login.php" style="color: rgb(233, 233, 233);font-weight: lighter;">Se connecter</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6">
					<img src="vendors/images/forgot-password.png" alt="">
				</div>
				<div class="col-md-6">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center" style="color: #00A7E3;">Réinitialiser mot de passe</h2>
						</div>
						<?php
							if($pwd == false){
								echo '
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<strong class="h4">Error</strong><br>
									Les mots de passe sont pas identiques
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
						<h6 class="mb-20">Entrez votre nouveau mot de passe, comfirmer et envoyer</h6>
						<form method="post" action="reset-password.php">
							<div class="input-group custom">
								<input type="password" class="form-control form-control-lg" placeholder="New Password" name="pass"  <?php if(!$pwd){ echo 'value="'.$_POST["pass"].'"';  } ?> required>
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" class="form-control form-control-lg" placeholder="Confirm New Password" name="confirmPass"  <?php if(!$pwd){ echo 'value="'.$_POST["confirmPass"].'"';  } ?> required>
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="row align-items-center">
								<div class="col-5"></div>
								<div class="col-2"></div>
								<div class="col-5">
									<div class="input-group mb-0">
										<input class="btn btn-primary btn-lg btn-block" type="submit" value="Envoyer">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
</body>
</html>