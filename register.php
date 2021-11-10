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
	<link rel="stylesheet" type="text/css" href="src/plugins/jquery-steps/jquery.steps.css">
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

<body class="login-page">
	<div class="login-header box-shadow" style="background-color: #00A7E3;">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="login.php">
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
	<div class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="vendors/images/register-page-img.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="register-box bg-white box-shadow border-radius-10">
						<div class="wizard-content">
							<form class="form-group" style="padding: 3%;" method="post" action="vendors/php/fonctions/traittement3.php">
								<h5 align="center" style="color: #00A7E3;">Mon compte</h5>
								<section style="padding: 5%;" id="sec1">
									<div class="form-wrap max-width-600 mx-auto">
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Email Address*</label>
											<div class="col-sm-8">
												<input type="email" class="form-control" name="email" required="">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Username*</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" name="login">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Mot de passe*</label>
											<div class="col-sm-8">
												<input type="password" class="form-control" name="pwd">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Confirmez le mot de passe*</label>
											<div class="col-sm-8">
												<input type="password" class="form-control" name="copiePwd">
											</div>
										</div>
										<!--div class="row">
											<div class="col-5"></div>
											<div class="col-2"></div>
											<div class="col-5">
												<div class="input-group mb-0">
													<input class="btn btn-outline-success btn-lg btn-block" type="submit" value="Submit">
												</div>
											</div>
										</div>
									</div-->
								</section>
								<!-- Step 2 -->
								<h5 align="center" style="color: #00A7E3;">Informations Personnelles</h5>
								<section style="padding: 5%;" id="sec2">
									<div class="form-wrap max-width-600 mx-auto">
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Nom*</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" name="nom">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Prénom(s)</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" name="prenom">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Ecole</label>
											<div class="col-sm-8">
												<select name="school" id="school" class="form-control" disabled="disabled">
													<?php 
														include('connect_bddeneam.php');
														$idcom=connect('news_bdd');
														if($resultat=$idcom->query("SELECT * FROM schools"))
														{
															foreach($resultat as $value)
															{
																echo "<option value=".$value['id']." >";
																	echo $value['name_School'];
																echo "</option>";
															}
														}
													?>
													<!--option value="ENEAM" selected="">
														
													</option-->
													<!--option value="ENAM">ENAM</option-->
												</select>  
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Filiere</label>
											<div class="col-sm-8">
												<select name="filiere" id="" class="form-control" disabled>

													<?php
														
														
														if($resultat1=$idcom->query("SELECT * FROM filiere WHERE name_Filiere='".$_SESSION['filiere']."'"))
														{
															foreach($resultat1 as $valu)
															{
																echo "<option value=".$valu['id'].">";
																	echo $_SESSION['filiere'];
																echo "</option>";
															}
														}
													?>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Niveau</label>
											<div class="col-sm-8">
												<select name="classe" id="" class="form-control" disabled>
													<?php
													
													$fil=$_SESSION['filiere'];
													$sc=$_SESSION['ecole'];
														if($resultat1=$idcom->query("SELECT id FROM classe,filiere WHERE name_classe = '".$_SESSION['annee']."' AND classe.filieres_id = filiere.id AND filiere.name_Filiere ='".$_SESSION['filiere']."'"))
														{
															foreach($resultat1 as $value)
															{
																echo "<option value=".$valu['id'].">";
																echo $_SESSION['annee'];
																echo "</option>";
															}
														}
													?>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Année Académique</label>
											<div class="col-sm-8">
												<select name="annee" id="" class="form-control">
													<option value="2020-2021">2020-2021</option>
													<option value="2021-2022">2021-2022</option>
												</select>
											</div>
										</div>
										<div class="row">
											<div class="col-5">
												<div class="input-group mb-0">
													<a class="btn btn-secondary btn-lg btn-block" href="authentification.php">Retour</a>
												</div>
											</div>
											<div class="col-2"></div>
											<div class="col-5">
												<div class="input-group mb-0">
													<input class="btn btn-primary btn-lg btn-block" type="submit" value="Envoyer">
												</div>
											</div>
										</div>
									</div>
								</section>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		
	</script>
	<!-- success Popup html Start -->
	<button type="button" id="success-modal-btn" hidden data-toggle="modal" data-target="#success-modal" data-backdrop="static">Launch modal</button>
	<div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered max-width-400" role="document">
			<div class="modal-content">
				<div class="modal-body text-center font-18">
					<h3 class="mb-20">Form Submitted!</h3>
					<div class="mb-30 text-center"><img src="vendors/images/success.png"></div>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				</div>
				<div class="modal-footer justify-content-center">
					<a href="login.html" class="btn btn-primary">Done</a>
				</div>
			</div>
		</div>
	</div>
	<!-- success Popup html End -->
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/jquery-steps/jquery.steps.js"></script>
	<script src="vendors/scripts/steps-setting.js"></script>
</body>

</html>