<?php
session_start();
require 'vendors/php/fonctions/azerty.php';
require 'headerAdmin.php';
?>

<div class="mobile-menu-overlay"></div>

<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header" style="padding: 1%;">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h5>Choisir les responsables</h5>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Acceuil</a></li>
								<li class="breadcrumb-item active text-blue" aria-current="page">Les comptes</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>

			<div class="card-box mb-30">
				<div class="pd-20 container d1">
					<h4 class="btn-primary btn" id="btn"><i class="fa fa-table"></i>&nbsp; Table des Etudiants Responsables</h4>
					<a href="ASelectRespo.php" style="float: right;"><h4 class="btn-primary btn" id="btn"><i class="fa fa-plus"></i> &nbsp;Nouveau Responsable</h4></a>
				</div>

				<div class="pb-20" id="section">
					<table class="data-table table hover nowrap">
						<thead>
							<tr>
								<th>Matricule</th>
								<th>Noms et Prénoms</th>
								<th>Classe</th>
								<th>Roles</th>
								<th>Options</th>
							</tr>
						</thead>
						<tbody>
							<?php

								tabshow($result1, $respo_id);
							?>
						</tbody>
					</table>
				</div>
				<hr>
				<div class="pd-20 mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue mb-30"><?= $actionname ?></h4>
							<div class="mb-30">
								<?php
								if (isset($result)) {
									if ($result) {
										echo '<span class="alert alert-success"> ' . $succes . '</span>';
									} else {
										echo '<span class="alert alert-danger">' . $failed . ' </span>';
										echo '<span class="text-danger">' . $connexion->error . '</span>';
									}
								}
								?>
							</div>
						</div>
					</div>
					<form action="ASelectRespo.php" method="POST">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Matricule</label>
							<div class="col-sm-12 col-md-10">
								<select name="matricule" class="form-control" required>
									<?php
									AllMatricule($matricule);
									?>
								</select>
							</div>
						</div><br>
						<h5>Choisir son profil responsable</h5><br>
						<fieldset class="col-sm-12 col-md-2 col-form-label">
							<div class="form-group row">
								<div class="custom-control custom-radio col-sm-12 col-md-10">
									<input class="custom-control-input" name="role" id="role1" type="radio" value="RespoBUEBCS" <?php isyourRole($profilRespo, "RespoBUEBCS") ?> required>
									<label class="custom-control-label" for="role1">BUE-BCS </label> <br><br>
								</div>
								<div class="custom-control custom-radio col-sm-12 col-md-10">
									<input class="custom-control-input" name="role" id="role2" type="radio" value="RespoClub" <?php isyourRole($profilRespo, "RespoClub") ?> required>
									<label class="custom-control-label" for="role2">Club </label> <br><br>
								</div>
								<div class="custom-control custom-radio col-sm-12 col-md-10">
									<input class="custom-control-input" name="role" id="role3" type="radio" value="RespoClasse" <?php isyourRole($profilRespo, "RespoClasse") ?> required>
									<label class="custom-control-label" for="role3">Senateur </label> <br><br>
								</div>
							</div>
						</fieldset>
						<div class="row">
							<div class="offset-lg-8 col-lg-2 mb-10">
								<div class="input-group mb-0">
									<input class="btn btn-secondary btn-lg btn-block" type="reset" value="Annuler">
								</div>
							</div>
							<div class="col-lg-2">
								<div class="input-group mb-0">
									<button name="<?= $inputname ?>" class="<?= $a1 ?> btn btn-primary btn-lg btn-block" type="submit" value="<?= $inputvalue ?>"> <?= $input ?> </button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- css -->
<style>
	#section {
		display: none;
	}

	h4 {
		font-weight: normal;
	}

	.drop {
		color: white !important;
	}

	.d1 {
		margin-bottom: -16px;
	}

	.drop:hover {
		background-color: rgb(22, 0, 122);
	}

	.drop:link {
		background-color: blue;
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
</style>
<!-- js -->
<script src="src\scripts\jquery.min.js"></script>
<script src="src\scripts\controlform.js"></script>
<script src="vendors/scripts/core.js"></script>
<script src="vendors/scripts/script.min.js"></script>
<script src="vendors/scripts/process.js"></script>
<script src="vendors/scripts/layout-settings.js"></script>
</body>

</html>