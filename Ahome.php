<?php
//session_start();
	require 'vendors/php/fonctions/Ahome.php';
	require 'headerAdmin.php';
?>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Tableau de bord</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Acceuil</a></li>
									<li class="breadcrumb-item active" aria-current="page">Tableau de bord</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="card-box mb-10">
					<div class="pd-20 container">
						<h4 class="h4 text-blue" id="btn">Responsable de la direction de l'ENEAM</h4>
					</div>
					<div class="pb-20" id="section">
						<table class="data-table table hover nowrap">
							<thead>
								<tr>
									<th>Matricule</th>
									<th>Noms et Prénoms</th>
									<th>Rôles</th>
								</tr>
							</thead>
							<tbody>
								<?php
								tabshow2($result2);
								?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- multiple select row Datatable start of filieres and clubs-->
				<div class="card-box mb-10">
					<div class="pd-20">
						<h4 class="text-blue h4">Table des Filieres et Clubs de l'ENEAM</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table hover multiple-select-row nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">N°</th>
									<th>Cygles</th>
									<th>Filieres</th>
								</tr>
							</thead>
							<tbody>
								<?php
								tabshow($result1);
								?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- multiple select row Datatable End -->
				<!-- multiple select row Datatable start of compte -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Table des comptes (Responsables) de l'ENEAM</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table hover multiple-select-row nowrap">
							<thead>
								<tr>
									<th>Matricule</th>
									<th>Noms et Prénoms</th>
									<th>Classe</th>									
									<th>Roles</th>
								</tr>
							</thead>
							<tbody>
								<?php
									tabshow3($result3);
								?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- multiple select row Datatable End -->
			</div>
		</div>
	</div>

	<style>
		.drop {
			color: white !important;
		}

		.drop:hover {
			background-color: rgb(22, 0, 122);
		}

		.drop:link {
			background-color: #00A7E3;
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