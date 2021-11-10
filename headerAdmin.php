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
	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search" style="color: white;"></div>
			<div class="header-search">
				<form>
					<div class="form-group mb-0">
						<i class="dw dw-search2 search-icon"></i>
						<input type="text" class="form-control search-input" placeholder="Search Here">
						<div class="dropdown">
							<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
								<i class="ion-arrow-down-c"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="text-right">
									<button class="btn btn-primary">Rechecher</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="header-right">
			<div class="dashboard-setting user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="Aprofile.php" data-toggle="right-sidebar">
						<i class="dw dw-settings2" style="color: white;"></i>
					</a>
				</div>
			</div>
			<!--div class="user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
						<i class="icon-copy dw dw-notification" style="color: white;"></i>
						<span class="badge notification-active"></span>
					</a>
				</div>
			</div-->
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="vendors/images/photo1.jpg" alt="">
						</span>
						<span class="user-name" style="color: white;"><?= $_SESSION['prenom'].' '.$_SESSION['nom'] ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="Aprofile.php"><i class="dw dw-user1"></i> Profil</a>
						<a class="dropdown-item" href="login.php"><i class="dw dw-logout"></i> Se déconnecter</a>
					</div>
				</div>
			</div>
		</div>
	</div>

      <div class="left-side-bar">
            <div class="brand-logo">
                  <a href="login.php" style="font-size: 30px; margin-left: 30%;" class="text-center">
                        Ipub
                  </a>
                  <div class="close-sidebar" data-toggle="left-sidebar-close">
                        <i class="ion-close-round"></i>
                  </div>
            </div>
            <div class="menu-block customscroll">
                  <div class="sidebar-menu">
                        <ul id="accordion-menu">
                              <li class="dropdown">
                                    <a href="essaie1.php" class="drop dropdown-item text-center">
                                          <span class="micon"></span><span class="mtext">Acceuil</span>
                                    </a>
                              </li>
                              <li class="dropdown">
                                    <a href="javascript:;" class="dropdown-toggle">
                                          <span class="micon dw dw-house-1"></span><span class="mtext w">Les comptes</span>
                                    </a>
                                    <ul class="submenu">
                                          <li><a href="AComptedirection.php">Compte de l'Administration</a></li>
                                          <li><a href="ASelectRespo.php">Les responsables de publicaion</a></li>
                                    </ul>
                              </li>
                              <li class="dropdown">
                                    <a href="javascript:;" class="dropdown-toggle">
                                          <span class="micon dw dw-settings2"></span><span class="mtext w">Filieres et Clubs</span>
                                    </a>
                                    <ul class="submenu">
						<li><a href="AfiliereClub.php">Ajouter des filieres</a></li>
						<li><a href="AClub.php">Ajouter des Clubs</a></li>
                                    </ul>
                              </li>
                              <li class="dropdown">
                                    <a href="javascript:;" class="dropdown-toggle">
                                          <span class="micon dw dw-settings2"></span><span class="mtext w">Paramètre</span>
                                    </a>
                                    <ul class="submenu">
                                          <li><a href="Aprofile.php">Profile</a></li>
                                          <li><a href="login.php">Deconnexion</a></li>
                                    </ul>
                              </li>
                        </ul>
                  </div>
            </div>
      </div>
	<style>
		body{
			font-size: 18px !important;
		}
		button{
			color: white !important;
			background-color: transparent;
			border: none;
		}
		.submenu{
			color: white;
			font-size: 16px;
			padding-left: 10px;
		}
		.dropdown a span{
			font-weight: bold;
			font-size: 20px;
		}
		.dropdown a:hover{
			background-color:rgba(0,0,0,.1);
		}
	</style>
	<script src="src\scripts\jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$('#btn').click(function(){
				$('#section').slideToggle('1000');
			});
		});
	</script>