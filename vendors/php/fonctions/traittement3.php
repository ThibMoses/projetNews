<?php
	session_start();
	$_SESSION['nom']=$nom=$_POST['nom'];
	$_SESSION['prenom']=$prenom=$_POST['prenom'];
	$_SESSION['mail']=$mail=$_POST['email'];
	$_SESSION['username']=$login=$_POST['login'];
	$password=$_POST['pwd'];
	$copie=$_POST['copiePwd'];
	$conne=true;
	$_SESSION['role']="Etudiant";
	$notification=true;

	$_SESSION['matricule'];
	$_SESSION['filiere'];
	$_SESSION['annee'];
	$_SESSION['ecole'];

	if(isset($nom) && isset($prenom) && isset($mail) && isset($login) && isset($password) && isset($copie) && $password==$copie)
	{
		include('connect_bddeneam.php');
		$connexion=connect('news_bdd');
		#Les requêtes d'insertion dans les bases de données
		#Insertion 
		$request="INSERT INTO users(matricule, name, surname, mail, username, pwd, connexion, notif, role) VALUES ('".$_SESSION['matricule']."','$nom', '$prenom','$mail','$login','$password','$conne','$notification','".$_SESSION['role']."')";
//?????????????????????????problème au niveau se id de l'utiisateur
		
		$result=$connexion->query($request);
		if($result){
			if($result=$connexion->query("SELECT id FROM users WHERE users.matricule='".$_SESSION['matricule']."'")){
				foreach ($result as $value) {
					$_SESSION['id']=$value['id'];
					$request="INSERT INTO informations(users_id, classe_id, An_scolaire) VALUES ('".$value['id']."','".$_POST['classe']."','".$_POST['annee']."')";
					if(!$result=$connexion->query($request)){
						echo $connexion->error;
					}
				}
			}
			//$connexion->close();
			header('location:homeStudent.php');	
		}else
		{echo $connexion->error;
			echo "
			<script type=\"text/javascript\">
				alert(\"Enrgistrement impossible\");
			</script>
		";
		require('register.php');
		}
	}else
	{
		echo "
			<script type=\"text/javascript\">
				alert(\"Veillez remplir tout les champs\");
			</script>
		";
		include('register.php');
	}
?>