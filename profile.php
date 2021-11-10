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
	<link rel="stylesheet" type="text/css" href="src/plugins/cropperjs/dist/cropper.css">
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
	<?php
		if($_SESSION['role']=='Etudiant'){
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
						<div class="col-md-12 col-sm-12">
							<div class="title">
								<h4>Profile</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="homeStudent.php">Acceuil</a></li>
									<li class="breadcrumb-item active" aria-current="page">Profile</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-30">
							<?php 
								include 'vendors/php/fonctions/updateprofil.php';
							?>
						<div class="pd-20 card-box height-100-p row container block">
							<div class="profile-photo width col-4">
								<a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
								<img src="vendors/images/photo1.jpg" alt="" class="avatar-photo">
								<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-body pd-5">
												<div class="img-container">
													<img id="image" src="vendors/images/photo2.jpg" alt="Picture">
												</div>
											</div>
											<div class="modal-footer">
												<input type="submit" value="Update" class="btn btn-primary">
												<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
											</div>
										</div>
									</div>
								</div><br>
								<h5 class="text-center h5 mb-0"><?php echo $_SESSION['prenom'].' '.$_SESSION['nom']; ?></h5>
								<p class="text-center text-muted font-14"><?php echo $_SESSION['role']; ?></p>
							</div>
							
							<div class=" col-8 row">
								<div class="profile-info col-xl-5 col-lg-5 col-md-5 col-sm-12 mb-10" style="min-height: 400px;">
									<h5 class="mb-20 h5 text-blue">Information du compte</h5>
									<table class="profile">
										<tr>
											<td>Matricule: </td>
											<td class="val"> <?= $matricule ?? '_______' ?></td>
										</tr>
										<tr>
											<td>Nom:</td>
											<td class="val"> <?= $name ?></td>
										</tr>
										<tr>
											<td>Prenom:</td>
											<td class="val"><?= $surname ?></td>
										</tr>
										<tr>
											<td>Mail:</td>
											<td class="val"><?= $mail ?></td>
										</tr>
										<?php if(isset($filiere) && isset($annee)): ?>
										<tr>
											<td>Filiere:</td>
											<td class="val"><?= $filiere ?></td>
										</tr>
										<tr>
											<td>Annee:</td>
											<td class="val"><?= $annee ?></td>
										</tr>
										<?php endif; ?>
									</table>
									
								</div>
								<div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 mb-10">	
									<!-- Setting Tab start -->
									<form class="form-group" style="padding: 3%;" action="profile.php" method="POST">
										<h5 class="text-blue btn btn-primary text-white" id="d1">Editer votre Profil</h5>
										<section style="padding: 5%;" id="sec1">
											<div class="form-wrap max-width-600 mx-auto">
												<div class="form-group row">
													<label class="col-sm-4 col-form-label">Matricule</label>
													<div class="col-sm-8">
														<input type="number" class="form-control" name="matricule" value = "<?= $matricule ?>" disabled>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label">Nom</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="name" value = "<?= $name ?>">
													</div> 
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label">Prenom</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="surname" value = "<?php echo $surname; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label">Email</label>
													<div class="col-sm-8">
														<input type="email" class="form-control" name="mail" value = "<?= $mail ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label">Ecole</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="ecole" value = "<?= $ecole ?>" disabled>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label">Filiere</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="ecole" value = "<?= $annee ?>" disabled>
													</div>
												</div>
												<div class="row">
													<div class="col-5"></div>
													<div class="col-2"></div>
													<div class="col-5">
														<div class="input-group mb-0">
															<input class="btn btn-outline-success btn-lg btn-block" type="submit" name="modifier" value="Modifier">
														</div>
													</div>
												</div>
											</div>
										</section>
									</form> 
									<a href="forgot-password.php"><h5 class="btn btn-primary" style="margin-left:3%;">Changer de mot de passe</h5></a>

									<!-- Setting Tab End -->
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
			border:none;
		}
		.block{
			margin-left: 0px;
			padding-bottom: 0px;
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
		#sec1{
			display: none;
		}
		.profile-info span{
			font-size: 18px !important;
			color: rgb(22, 0, 122) !important;
		}
		.profile-info li{
			color: rgb(104, 104, 104);
		}
		.profile .val{
			padding-left: 10%;
		}
		.profile td{
			padding-bottom: 30px;
		}
		.profile{
			width: 100%;
			margin-top: 40px;
			margin-left: 2%;
		}
	</style>
	<script src="src\scripts\jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$('#d1').click(function(){
				$('#sec1').slideToggle('1000');
			});
		});
	</script>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/cropperjs/dist/cropper.js"></script>
	<script>
		window.addEventListener('DOMContentLoaded', function () {
			var image = document.getElementById('image');
			var cropBoxData;
			var canvasData;
			var cropper;

			$('#modal').on('shown.bs.modal', function () {
				cropper = new Cropper(image, {
					autoCropArea: 0.5,
					dragMode: 'move',
					aspectRatio: 3 / 3,
					restore: false,
					guides: false,
					center: false,
					highlight: false,
					cropBoxMovable: false,
					cropBoxResizable: false,
					toggleDragModeOnDblclick: false,
					ready: function () {
						cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
					}
				});
			}).on('hidden.bs.modal', function () {
				cropBoxData = cropper.getCropBoxData();
				canvasData = cropper.getCanvasData();
				cropper.destroy();
			});
		});
	</script>
</body>
</html>