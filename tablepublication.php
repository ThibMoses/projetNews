<?php
session_start();
	$error = false;
	$result = "none";
	$pub = "gghg";
	require 'vendors/php/fonctions/Users.php';
	require 'vendors/php/fonctions/fonction.php';
	require 'vendors/php/fonctions/Publication.php';
	$user = new User;
	$Publication = new Publication($_SESSION['id']);
	//pour supprimer une publication
	if(isset($_POST["action"])){
		if($Publication->getpub($_POST["action"])){
			$pub = $Publication->getpub($_POST["action"]);
			include('vendors\php\fonctions\updatePublication.php');
		}
	}
	//pour afficher une publication
	
	if(isset($_POST["update"])){
		$req = "DELETE FROM PUBLICATIONS WHERE id='".$_POST["update"]."'";
		$connnexion = new mysqli("localhost", "root", "","news_bdd",3308);
		$res = $connnexion->query($req);
		if($res){
			echo 'hgh';
			$error = $Publication->isvalide($_POST);
			$Publication->setvalue($_POST);
			if(!$error){
				$result = $Publication->addPub();
			}else{
				// anything
			}
		}
	}

	$result1 = $Publication->getallpubs();

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
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">
	<link rel="stylesheet" type="text/css" href="style1.css">

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
								<h5>Mes Publications</h5>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="">Acceuil</a></li>
									<li class="breadcrumb-item active" aria-current="page">Publications > Mes Publications</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<!-- Checkbox select Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Ma Table de Publication</h4>
					</div>
					<div class="pb-20">
						<table class="table nowrap">
							<thead>
								<tr>
									<th>Date</th>
									<th>Titre</th>
									<th>Options</th>
								</tr>
							</thead>
							<tbody>
								<?php
									if($result){
										createtablepub($result1);
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- Checkbox select Datatable End -->
				<div class="card-box pd-30">
				<div class="clearfix">
					<div class="pull-left">
						<h4 class="h3 text-blue" style="font-weight: normal;">Modifier une Publication</h4>
						<?php
							if($result == "Success"){
								echo '<div class="alert alert-success" style="right: 5%; position: absolute;"> Action reussie</div>';
							}else if($result == "Error"){
								echo '<div class="alert alert-danger" style="right: 5%; position: absolute;"> Action échoué</div>';
							}
						?>
						<div></div>
						<br> <br>
					</div>
				</div>

				<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Catégorie</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="categorie" max-length="50" placeholder="Catégorie" type="text" title="Provenance de l'information" value="<?php if(isset($categorie)){ echo $categorie;} ?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Titre</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="title" max-length="100" type="text" value="<?php if(isset($title)){ echo $title;} ?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Contenu</label>
							<div class="col-sm-12 col-md-10">
								<textarea class="form-control" name="content" required> 
								<?php if(isset($content)){ echo $content;} ?>
								</textarea>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Ajouter un media</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="media" value="<?php if(isset($categorie)){ echo $categorie;} ?>" type="file">
								<div><?php if(isset($media)){ echo $media;} ?></div>
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
									<button name="update" class="btn btn-primary btn-lg" type="submit" value="<?php if(isset($id)){ echo $id;} ?>"> Mettre a jour </button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<style type="text/css">
		button{
			background-color: transparent;
			border:none;
		}
	</style>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<!-- buttons for Export datatable -->
	<script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="src/plugins/datatables/js/pdfmake.min.js"></script>
	<script src="src/plugins/datatables/js/vfs_fonts.js"></script>
	<!-- Datatable Setting js -->
	<script src="vendors/scripts/datatable-setting.js"></script></body>
</html>