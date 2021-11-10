<?php
	//session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>iPub</title>
</head>
<body>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Publications</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Acceuil</a></li>
									<li class="breadcrumb-item active text-green" aria-current="page">Actualités - <?php echo $_POST['direction'] ?></li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="row" style="padding-left: 2%;">
						<?php
							include('connect_bddeneam.php');
							$id=connect('news_bdd');
							$classe = "";
							$an = "";
							$fil = "";
							if(isset($_SESSION['filiere']) && isset($_SESSION['annee'])){
								$an=$_SESSION['annee'];
								$fil=$_SESSION['filiere'];
								$classe = $_SESSION['filiere']." ".$_SESSION['annee'];
							}
							$request ="SELECT P.id,title,datepub,categorie,nbVues,nbLikes FROM publications P, responsable R WHERE P.author_id = R.id AND R.name_Respo = 'RespoClub' AND (P.cible='".$an."' OR P.cible='".$fil."' OR P.cible='".$fil." ".$an."')";
							if(!$result=$id->query($request))
							{
								echo $id->error;
								echo"<script type=\"text/javascript\">
										alert('Un problème est survenu');
									</script> 
								";
							}
							else
							{
								foreach ($result as $value) 
								{
									echo '<div class="pub bg-white pd-20 card-box mb-30">';
									//Affichage du média
									//echo "<img src="$value['media']" class="media">";
									//affichage de la date de publication
									$start=strtotime($value['datepub']);
									$fin=abs(time()-$start);
									$duree=array();
									$duree['seconde']=$fin%60;//Détermination du nombre de seconde
									$fin=floor(($fin-$duree['seconde'])/60);//conversion de la durée en miniute
									$duree['minute']=$fin%60;//Détermination de la minute
									$fin=floor(($fin-$duree['minute'])/60);//Conversion en heure
									$duree['heure']=$fin%24;
									$fin=floor(($fin-$duree['heure'])/24);//Conversion en jour
									$duree['jour']=$fin;
									if($duree['minute']==0)
									{
										echo "<h6 class=\"h6\">il y a ".$duree['seconde']." seconde</h6>";
									}else if($duree['heure']==0)
									{
										echo "<h6 class=\"h6\">il y a ".$duree['minute']." minute</h6>";
									}else if($duree['jour']==0)
									{
										echo "<h6 class=\"h6\">il y a ".$duree['heure']." heure</h6>";
									}else if($duree['jour']<20)
									{
										echo "<h6 class=\"h6\">il y a ".$duree['jour']." jour</h6>";
									}else
									{
										echo "<h6 class=\"h6\">".$value['datepub']."</h6>";
									}
									//affichage de la catégorie de publication
									echo "<h5 class=\"h5 text-green text-center\">".$value['categorie']."</h5>";
									//titre
									echo "<div class=\"titrepub text-center\">".$value['title']."</div>";
									?>
									<div class="row avis">
										<span class="col-3 text-center"><i class="fa fa-thumbs-up"></i> <?= $value["nbLikes"] ?> </span>
										<span class="col-3 text-center"><i class="fa fa-eye"></i> <?= $value["nbVues"] ?></span>
										<span class="col-3 text-center"><i class="fa fa-comment"></i><?php echo $id->query("SELECT id FROM commentaires WHERE publications_id = '".$value["id"]."'")->num_rows; ?></span>
										<form action="commentaire.php" method="POST">
											<button type="submit" name="lire" class="btn btn-primary text-center" value="<?= $value["id"] ?>">Lire</button>
										</form>
										</div>
										</div>
									<?php	
								}
							}
						?>
						<!--h6 class="h6">il y a 15 minutes</h6>
						<h5 class="h5 text-green text-center">SERVICE COMPTABILITE</h5>
						<p class="text-center"> Paiement des fraisshcjscjhsjchschjshcsjhchckshc ScolaritéPaiement des fraisshcjscjhsjchschjshcsjhchckshc ScolaritéPaiement des fraisshcjscjhsjchschjshcsjhchckshc Scolarité </p>
						<div class="row avis">
							<span class="col-3 text-center"><i class="fa fa-thumbs-up"></i> 12</span>
							<span class="col-3 text-center"><i class="fa fa-eye"></i> 12</span>
							<span class="col-3 text-center"><i class="fa fa-comment"></i> 12</span>
							<a href="#" class="col-3 btn btn-primary text-white">Lire</a>
						</div-->
					</div>
				</div>
				<!--style>
				</style-->
				<style>
					button{
						background-color: transparent;
						border:none;
					}
					.pub{
						width: 32%;
						margin-right: 1%;
						padding-bottom: 0%;
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
					.titrepub{
						max-height: 100px;
						padding: 6px;
						overflow-y: auto; 
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
					.drop{
						color: white !important;
					}
					.drop:hover{
						background-color: rgb(22, 0, 122);
					}
					.drop:link{
						background-color: blue;
		color: white !important;
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
					.w{
						font-weight: 500;
						font-size: 18px;
						height: 100px;
					}
					
					
				</style>
			</div>
		</div>
	</div>
</body>
</html>
