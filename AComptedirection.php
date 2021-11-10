<?php
	session_start();
	require 'vendors/php/fonctions/AcompteDirection.php';
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
							<h5>Compte de l'administration</h5>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="./Ahome.php">Acceuil</a></li>
								<li class="breadcrumb-item active text-blue" aria-current="page">Les comptes</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>


			<div class="card-box mb-30">
				<div class="pd-20 container d1">
				<h4 class="btn-primary btn" id="btn"><i class="fa fa-table"></i>&nbsp; Table de Responsable de Direction</h4>
				<a href="AComptedirection.php" style="float: right;"><h4 class="btn-primary btn" id="btn"> <i class="fa fa-plus"></i> &nbsp; Nouveau Compte</h4></a>
				</div>
				<div class="pb-20 container" id="section">
					<table class="data-table table hover nowrap">
						<thead>
							<tr>
								<th>Matricule</th>
								<th>Noms et Prénoms</th>
								<th>Roles</th>
								<th>Options</th>
							</tr>
						</thead>
						<tbody>
							<?php
							tabshow($result1);
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
					<form action="AComptedirection.php" method="POST" class="form">
						<div class="row">
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Nom</label>
								<div class="col-sm-12 col-md-10">
									<input type="text" name="nom" id="name" class="form-control " <?php echo 'value = "' . $name . '" '; ?>" required>
									<span class="name text-danger"></span>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Prénom</label>
								<div class="col-sm-12 col-md-10">
									<input id="surname" class="form-control "  <?php echo ' value = "' . $surname . '" '; ?> name="prenom" type="text" required>
									<span class="surname text-danger"></span>

								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Mail</label>
								<div class="col-sm-12 col-md-10">
									<input id="mail" class="form-control "  <?php echo 'value = "' . $mail . '" '; ?> name="mail" type="email" required>
									<span class="mail text-danger"></span>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Identifiant</label>
								<div class="col-sm-12 col-md-10">
									<input id="login" class="form-control "  <?php echo ' value = "' . $username . '" '; ?> name="username" type="text" required>
									<span class="login text-danger"></span>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Mot de passe</label>
								<div class="col-sm-12 col-md-10">
									<input id="pwd" class="form-control " <?php echo ' value = "' . $pwd . '" '; ?> name="pwd" type="password" minlength="8" required>
									<span class="pwd text-danger"></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="offset-lg-8 col-lg-2 mb-10">
								<div class="input-group mb-0">
									<input class="btn btn-secondary btn-lg btn-block" type="reset" value="Annuler">
								</div>
							</div>
							<div class="col-lg-2">
								<div class="input-group mb-0">
									<button name="<?= $inputname ?>" id="SUBMIT" class="<?= $a1 ?> btn btn-primary btn-lg btn-block" type="submit" value="<?= $inputvalue ?>"> <?= $input ?> </button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
							
			<!-- Input Validation End -->
		</div>
	</div>
</div>
<style>
	.drop {
		color: white !important;
	}

	.form-group {
		width: 49%;
		margin-left: 1%;
		margin-bottom: 5%;
	}

	@media (max-width: 502px) {
		.form-group {
			width: 98% !important;
			margin-left: 1%;
			margin-bottom: 5%;
		}
	}

	.d1 {
		margin-bottom: -16px;
	}

	h4 {
		font-weight: normal;
	}

	.drop:hover {
		background-color: rgb(22, 0, 122);
	}

	#section {
		display: none;
	}

	.drop:link {
		background-color: blue;
		color: black !important;
	}

	.submenu li:hover {
		background-color: rgb(193, 129, 252);
	}

	.menu-block {
		background-color: #227ea0;
	}

	.left-side-bar {
		background-color: rgb(100, 94, 94);
	}

	.header {
		background-color: #00A7E3;
	}

	body {
		font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
	}

	.submenu {
		background-color: rgb(0, 0, 202);
	}

	.w {
		font-weight: 500;
		font-size: 18px;
		height: 100px;
	}

	option {
		background-color: white !important;
	}
</style>
<!-- js -->
<script src="src\scripts\jquery.min.js"></script>

<script src="src\scripts\controlform.js"></script>
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
<script src="vendors/scripts/datatable-setting.js"></script>
</body>

</html>