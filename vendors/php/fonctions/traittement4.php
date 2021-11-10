<?php
	$error="none";
	$found = null;

	if(isset($_POST["connexion"]))
	{
		include('connect_bddeneam.php');
		$connexion=connect('news_bdd');
		if($connexion){
			$result=$connexion->query('SELECT * FROM users');
			if($result){
				foreach ($result as $value)
				{					
					$found = false;
					if($value['username']==$_POST['login'] && $value['pwd']==$_POST['password'])
					{
						$_SESSION['id']=$value['id'];
						$_SESSION['matricule']=$value['matricule'];
						$_SESSION['nom']=$value['name'];
						$_SESSION['prenom']=$value['surname'];
						$_SESSION['mail']=$value['mail'];
						$_SESSION['username']=$value['username'];
						$_SESSION['role']=$value['role'];
						$found = true;
						break;
					}
				}
			}else{
				$error = true;
			}
		}else{
			$error = true;
		}
	}
if($found == true && $found != null){
	
	if($_SESSION['role']=="Etudiant" || $_SESSION['role']=="Responsable")//On en distingue plusieurs en fonction des clubs et bureaux d'entité de l'école
	{
		include('selection.php');
		header('location:homeStudent.php');
	}else if ($_SESSION['role']=="administrateur1"){
		/*
			Interface vers l'administrateurs chargés d'ajouter de nouvelle ecoles a la plate forme
		*/
	}else if($_SESSION['role']=="administrateur2"){
		//redirection vers l'interface administrateur
		header('location:Ahome.php');
	}
}







		