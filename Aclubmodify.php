<?php
	session_start();
	require 'vendors/php/fonctions/Aclubmodify.php';
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
								<h5>Clubs</h5>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Acceuil</a></li>
									<li class="breadcrumb-item active text-blue" aria-current="page">Clubs</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="bg-white card-box mb-30 ">
					<div class="pd-20 container d1">
						<h4 class="btn-primary btn" id="btn"><i class="fa fa-table"></i>&nbsp;Table des Clubs      </h4>
						<a href="AClub.php" style="float: right;"><h4 class="btn-primary btn" id="btn"><i class="fa fa-plus"></i> &nbsp;Nouveau Club</h4></a>
					</div>
					<div class="pb-20" id="section">
						<table class="data-table table hover nowrap">
							<thead>
								<tr>
									<th>N°</th>
									<th>Cygles</th>
									<th>Clubs</th>
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
					<!-- Default Basic Forms Start -->
					<div class="pd-20 mb-30 container">
						<div class="clearfix">
							<div class="pull-left container">
								<h4 class="text-blue">Modifier un Club</h4>
								<br>
								<?php
								if (isset($result)) {
									if ($result) {
										echo '<span class="right alert alert-success"> '. $succes.'</span>';
									} else {
										echo '<span class="right alert alert-danger">'. $failed.' </span>';
									}
								}
								?>

							</div>
						</div>
						<br>

						<form action="Aclubmodify.php" method="POST" id="form">
							<div class="form-group">
							<label class="col-sm-12 col-md-2 col-form-label">Filiere</label>
							<div class="col-sm-12 col-md-10">
								<select id="filiere" class="form-control" required="required" name="nomClub">
									<?php
										AllFiliere($id);
									?>
								</select>
								
								<span class="filiere text-danger"></span>
							</div>
						</div>
						<div class="form-group">
								<label class="col-sm-12 col-md-2 col-form-label">Nom</label>
								<div class="col-sm-12 col-md-10">
									<input id="filiere" type="text" name="nomclub" class="form-control " <?php echo ' value = "' . $nomclub . '" '; ?> required>
									<span class="filiere text-danger"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-12 col-md-2 col-form-label">Cygles</label>
								<div class="col-sm-12 col-md-10">
									<input id="cygle" class="form-control " <?php echo ' value = "' . $cygleclub . '" ';?> name="cygleclub" type="text" required>
									<span class="cygle text-danger"></span>
								</div>
							</div> <br>
							<!--h5>Club</h5> <br>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Nom</label>
								<div class="col-sm-12 col-md-10">
									<input type="text" name="nomclub" class="form-control <?php cygleclub_error($cyglefiliere); ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label">Cygles</label>
								<div class="col-sm-12 col-md-10">
									<input class="form-control" name="cygleclub" type="text" required>
								</div>
							</div-->
							<div style="display: flex;">
								<div class="offset-lg-6 col-lg-2 mb-10">
									<div class="input-group mb-0">
										<input class="btn btn-secondary  btn-block" type="reset" value="Annuler">
									</div>
								</div>
								<div class="col-lg-2">
									<div class="input-group mb-0">
										<button style="font-size: 15px;" id="SUBMIT" name="valider" class="modify btn btn-primary btn-lg btn-block" type="submit" <?php if(isset($id)){ echo 'value="'.$id.'"';}  ?> >Mettre a jour</button>
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
		.d1 {
			margin-bottom: -16px;
		}
		h4 {
			font-weight: normal;
		}
		label{
			font-size: 18px !important;
		}
		#form{
			padding-left: 10%;
		}
		.drop {
			color: white !important;
		}
		#section{
			display: none;
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