<?php
	session_start();
	//include('connect_bddeneam.php');
	//
	//$_SESSION['id']=2;
	//
	$error = false;
	$result = "";
	require 'vendors/php/fonctions/Users.php';
	require 'vendors/php/fonctions/fonction.php';
	require 'vendors/php/fonctions/Publication.php';
	$user = new User;
	if(isset($_POST["valider"])){
		$Publication = new Publication($_SESSION['id']);
		$error = $Publication->isvalide($_POST);
		$Publication->setvalue($_POST);
		if(!$error){
			$result = $Publication->addPub();
		}else{
			// anything
		}
	}
	
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
	<link rel="stylesheet" href="style1.css">


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
	<?php
	//$_SESSION['role']='Responsable';
		include('headerRespo.php');
	?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header" style="padding: 1%;">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title mb-10">
								<h5>Formulaire de Publication</h5>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Acceuil</a></li>
									<li class="breadcrumb-item active text-blue" aria-current="page">Publications > Formulaire</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<!-- Default Basic Forms Start -->
				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h3" style="font-weight: normal;">Nouvelle Publication</h4>
							<?php
								if($result == "Success"){
									echo '<div class="alert alert-success" style="right: 5%; position: absolute;"> Publication reussie</div>';
								}else if($result == "Error"){
									echo '<div class="alert alert-danger" style="right: 5%; position: absolute;"> Enregistrement de la Publication échoué</div>';
								}
							?>
							<div></div>
							<br> <br>
						</div>
					</div>
					<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Catégorie</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="categorie" max-length="50" placeholder="Catégorie" type="text" title="Provenance de l'information" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Titre</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="title" max-length="100" type="text" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Contenu</label>
							<div class="col-sm-12 col-md-10">
								<textarea class="form-control" name="content" value="" required> 
								</textarea>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Ajouter un media</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="media" value="" type="file">
							</div>
						</div>
						<label class="weight-600">Choisir les destinatires</label>
							<?php 
								if($user->getuserRole() == "RespoClasse"){
									senderRespoClasse($user);
								}else if($user->getuserRole() == "RespoClub"){
									senderRespoClub($user);
								}else{
									senderRespo();
								}
							?>
						<div class="row">
							<div class="offset-8 col-2">
								<div class="input-group mb-0">
									<input class="btn btn-danger btn-lg" type="submit" value="Annuler">
								</div>
							</div>
							<div class="col-2">
								<div class="input-group mb-0">
									<input name="valider" class="btn btn-primary btn-lg" type="submit" value="Envoyer">
								</div>
							</div>
						</div>
					</form>
				</div>
				<!-- Input Validation End -->

			</div>
		</div>
	</div>
	<!-- js -->
	<script src="src/scripts/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$('#customRadio1').click(function(){
				$('.select2 option[value="none"]').prop('selected',true);
				$('.select1 option[value="none"]').prop('selected',true);
			});
			$('select').change(function(){
				$('#customRadio1').prop('checked', false);
			});
		});
	</script>
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>

</body>
</html>