<?php
session_start();
if (isset($_SESSION['matricule'])) {
	session_destroy();
}

require('vendors/php/fonctions/traittement4.php');

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


<body class="login-page">
	<div class="login-header box-shadow" style="background-color: #00A7E3;">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="login.php">
					<h3 class="text-white">iPub</h3>
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li><a href="register.php" style="color: rgb(233, 233, 233);font-weight: lighter;">S'inscrire</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="offset-md-1 col-md-5 col-lg-6">
					<img src="vendors/images/login-page-img.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center" style="color:#00A7E3;"> Se connecter sur iPub</h2>
						</div>
						<div>
							<?php
							if(isset($_POST['connexion'])){
								if($found == false ){
									echo '
										<div class="alert alert-danger alert-dismissible fade show" role="alert">
										<strong class="h4">Error</strong><br>
										Vos Identifiants sont incorrectes
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
							}
							?>
						</div>
						<form method="post" action="login.php">
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" placeholder="Username" name="login" <?php if(isset($_POST['connexion']) && !$found ){ echo 'value="'.$_POST["login"].'"';  } ?> required>
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" class="form-control form-control-lg" placeholder="**********" name="password" <?php if(isset($_POST['connexion']) && !$found ){ echo 'value="'.$_POST["password"].'"';  } ?> required>
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="row pb-30">
								<div class="col-6"></div>
								<div class="col-6">
									<div class="forgot-password"><a href="forgot-password.php">Mot de passe oublié?</a></div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<!--
											use code for form submit
											<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
										-->
										<input class="btn btn-outline-primary btn-lg btn-block" name="connexion" type="submit" value="Se Connecter">
									</div>
									<div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OU</div>
									<div class="input-group mb-0">
										<a class="btn btn-outline-primary btn-lg btn-block " href="authentification.php">Créer un compte</a>
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
	<script src="src/plugins/sweetalert2/sweetalert2.all.js"></script>
	<link rel="stylesheet" type="text/css" href="src/plugins/sweetalert2/sweetalert2.css">
	<script src="src/plugins/sweetalert2/sweet-alert.init.js"></script>

</body>

</html>
<?php

?>