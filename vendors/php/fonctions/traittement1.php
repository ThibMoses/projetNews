<?php 
	session_start();
	if(!isset($_POST['mat']))
	{
		echo "
			<script type=\"text/javascript\">
				alert(\"Veillez entrez votre matricule\");
			</script>
		";
		include('authentification.php');
	}else
	{
		include('connect_bddeneam.php');
		$connexion=connect('eneam_simulation');
		$result=$connexion->query('SELECT * FROM etudiant');
		if($result){
			foreach ($result as $value) {
				if($_POST['mat']==$value['matricule']){
					$code=random_int(0, 99999999);
					$_SESSION['code']=$code;
					$_SESSION['matricule']=$_POST['mat'];
					$_SESSION['mail']=$value['mail'];
					$_SESSION['filiere']=$value['filiere'];
					$_SESSION['annee']=$value['annee'];
					$_SESSION['ecole']=$value['ecole'];
					$dest=$value['mail'];

					$objet="Code de vérification";

					$text="Bienvenu(e) sur iPub \n";
					$text.="voici votre code de vérification \n";
					$text.="{$_SESSION['code']} \n";

				    if(mail($dest,$objet,$text,'FROM:iPub'))
					{
						echo "dtfghjk". mail($dest,$objet,$text,'FROM:Notre projet');
						echo "<script type=\"text/javascript\">
							alert(\'Vous allez reçevoir un mail dans quelques instant. Veillez consulter votre boîte messagerie!!\');
							</script>";
						$_SESSION['code']=$code;
						include('code-verification.php');
						echo "mail send";
					}else
					{
						echo "<script type=\"text/javascript\">
							alert(\"Mail not send\");
							</script>";	
						include('authentification.php');
					}
				}
			}	
		}else
		{
			echo "REQUEST NOT SEND";
		}
		
	}
?>