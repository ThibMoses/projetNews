
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
									<button class="btn btn-primary">Rechercher</button>
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
					<a class="dropdown-toggle no-arrow" href="profile.php" data-toggle="right-sidebar">
						<i class="dw dw-settings2" style="color: white;"></i>
					</a>
				</div>
			</div>
			<div class="user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
						<i class="icon-copy dw dw-notification" style="color: white;"></i>
						<span class="badge notification-active"></span>
					</a>
				</div>
			</div>
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="vendors/images/photo1.jpg" alt="">
						</span>
						<span class="user-name" style="color: white;"><?php echo $_SESSION['nom'].' '.$_SESSION['prenom']; ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="profile.php"><i class="dw dw-user1"></i> Profil</a>
						<a class="dropdown-item" href="login.php"><i class="dw dw-logout"></i> Se Déconnecter</a>
					</div>
				</div>
			</div>
			<!--div class="github-link">
				<a href="https://github.com/dropways/deskapp" target="_blank"><img src="vendors/images/github.svg" alt=""></a>
			</div-->
		</div>
	</div>

	<div class="left-side-bar">
		<div class="brand-logo text-center pd-20">
			<div ></div>
			<h3 class="text-center">iPub</h3>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li class="dropdown  bg-blue">
						<a href="homeStudent.php" class="white dropdown-item text-center">
						<span class="micon"></span><span class="mtext" style="color: white;">Acceuil</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-house-1"></span><span class="mtext w h(">Actualités</span>
						</a>
						<ul class="submenu">
							<form method="POST" action="Publications.php">
								<button type="submit" name="direction" value="Direction"><li> Direction </li></button>
								<button type="submit" name="direction" value="BUE-BCS"><li>BUE-BCS</li></button>
								<button type="submit" name="direction" value="Club"><li>Club</li></button>
								<button type="submit" name="direction" value="Classe"><li>Classe</li></button>
							</form>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-edit2"></span><span class="mtext w h(">Publications</span>
						</a>
						<ul class="submenu">
							<li><a href="formpub.php">Publier Information</a></li>
							<li><a href="tablepublication.php">Mes publications</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-settings2"></span><span class="mtext w h(">Parametre</span>
						</a>
						<ul class="submenu">
							<li><a href="profile.php">Profile</a></li>
							<li><a href="login.php">Deconnexion</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<style type="text/css">
		ul form button{
			color: white !important;
			background-color: transparent;
			border: none;
			padding: 1rem;
			width: 100%;
			text-align: left;
			padding-left: 4rem;
			font-family: Calibri;
		}
		body{
			font-size: 18px !important;
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
		.dropdown button:hover{
			background-color:rgba(0,0,0,.1);
		}
		.submenu li:hover{
			background-color: transparent !important;
		}

	</style>
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
	<!-- js -->
