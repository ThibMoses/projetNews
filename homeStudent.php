<?php
session_start();
include('connect_bddeneam.php');
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
		include('vendors/php/fonctions/homstudent.php');
	?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px"> 
				<div class="faq-wrap">
					<div id="accordion">
						<div>
							<div class="pd-20 container bg-white" id="d1">
								<span class="text-blue h3 border-radius-10"> Actualité</span><i id="i" class="fa fa-plus"></i>
							</div>
							<div id="sec1" class="container bg-white">
								<div class="card-body row" style="padding-left: 2%;">
									<?php
										$connexion = connect('news_bdd');
										$result = recentPub($connexion,$an,$fil);
										show($result);
									?>
								</div>
							</div>
							<div id="welcome">
								<h1 class="text-center">Bienvenue sur <br> IPUB</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--style>
				</style-->
				<style>
					#i{
						float: right;
						margin-top:12px;
						color:blue;
					}
					#sec1{
						display: none;
						margin-top:10px;
						padding-top: 20px;
						padding-left: 30px;
					}
					#welcome{
						height: 400px;
					}
					h1{
						padding-top: 80px;
						vertical-align: middle;
						-webkit-text-stroke: 2px  gray;
						color: transparent;
						opacity: 0;
					}
					button{
						background-color: transparent;
						border:none;
					}
					.pub{
						width: 32%;
						box-shadow: 0px 0px 5px gray !important;
						margin-right: 1%;
						padding-bottom: 0%;
						border-radius: 10px;
					}
					.last{
						margin-right: 0%;
					}
					.h5{
						margin-top: 10%;
						color: blue;
					}
					.h6{
						font-size: 12px;
						opacity: 0.7;
					}
					p{
						max-height: 100px;
						min-height: 100px;
						overflow-y: auto;
						color: rgb(121, 121, 121);
					}
					div .avis{
						margin-bottom: 4%;
						margin-top: 6%;
					}
					.avis span{
						color: blue;
						margin-top: 2.5%;
					}
					span i{
						color: blue;
					}
					@media (max-width: 902px){
						.pub{
							width: 48%;
							margin-right: 2%;
						}
					}
					@media (max-width: 502px){
						.pub{
							width: 80%;
							margin-left: 10%;
							margin-right: 10%;
						}	
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
						font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
					}
					.submenu{
						background-color: rgb(0, 0, 202);
					}
					.w{
						font-weight: 500;
						font-size: 18px;
						height: 100px;
					}
				</style>
	<!-- js -->
	<script src="src\scripts\jquery.min.js"></script>
<script>
	var ok=1;
	$(document).ready(function(){
		$('h1').animate({fontSize : '100px'},{queue:false,duration:1500}).fadeTo(3000,0.3);
		$('#d1').click(function(){
			if(ok == 1){
				$('#i').attr('class','fa fa-pencil-square')
				ok = 0;
			}else{
				$('#i').attr('class','fa fa-plus')
				ok = 1;
			}
			$('#sec1').slideToggle('1000');
			$('#welcome').slideToggle('1000');
		});
	});
</script>
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="vendors/scripts/apexcharts-setting.js"></script>
</body>
</html> 




<?php
	/*$heure=date("j/n/Y/G/i/s");//nombre de jour, mois, année, heure, minute, seconde
	
	$tab=explode("/", $heure);
	
$timepasse= gmmktime($tab['3'],$tab['4'],$tab['5'],$tab['1'],$tab['0'],$tab['2']);//heure, minute, seconde, mois, jour, année
$timeaujour = time();
$duree = $timeaujour-$timepasse;
if($duree<=59){
	echo "il y a ".$duree." seconde";
}else if($duree<=3559){
	echo "il y a ".round($duree/60)." minute";
}else if($duree<=82800){
	echo "il y a ".round($duree/3600)." heure";
}else if($duree<864000){
	echo "il y a ".round($duree/3600/24)." jour";
}else{
	echo $tab['0'],"/",$tab['1'],"/",$tab['2'];
}*/
	/*include('connect_bddeneam.php');
	$idcom=connect('eneam_simulation');
	$result=$idcom->query("SELECT nom FROM etudiant");
	
		$cc= $result->num_rows;
		echo $idcom->query("SELECT nom FROM etudiant")->num_rows;
	
*/

?>
