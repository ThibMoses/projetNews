<?php 

	$error = "none";
	$send = "none";
	$found = "none";
	if(isset($_POST['envoyer']))
	{
		include('connect_bddeneam.php');
		$connexion=connect('news_bdd');
		if($connexion){
			$result=$connexion->query("SELECT * FROM users WHERE matricule='".$_POST["mat"]."'");
			if($result){
				if($result->num_rows < 1){
					$found = false;
				}
				foreach ($result as $value) {
					if($_POST['mat']==$value['matricule']){
						$code=random_int(0, 99999999);
						$_SESSION['id']=$value['id'];
						$_SESSION['code']=$code;
						$_SESSION['matricule']=$_POST['mat'];
						$_SESSION['mail']=$value['mail'];
						$dest=$value['mail'];
						$found = true;
						$objet="Code de vérification";
	
						$text="Bienvenu(e) sur iPub \n";
						$text.="{$value['surname']} \n";
						$text.="voici le code pour réinitialiser votre mot de passe \n";
						$text.="{$_SESSION['code']} \n";
						$text.="Si vous n'êtes pas l'auteur de cette action, Veillez ne pas divulguer ce code. \n";
						$text.="Nous vous suggérons de changer votre mot de passe pour plus de sécurité.\n";
	
						
					    if(mail($dest,$objet,$text,'FROM:iPub'))
						{
							echo "dtfghjk". mail($dest,$objet,$text,'FROM:iPub');
							echo "<script type=\"text/javascript\">
								alert(\'Vous allez reçevoir un mail dans quelques instant. Veillez consulter votre boîte messagerie!!\');
								</script>";
							$_SESSION['code']=$code;
							$send = true;
						}else
						{	
							$send = false;
						}
						break;
					}else{
					}
				}	
			}else
			{
				echo "REQUEST NOT SEND";
				$error = true;
			}
			
		}else{
			$error = true;
		}
	}else{
			

	}
	
	if($send == true && $send != "none"){
		header('location;code-verification.php');
	}

?>












<?php
	/*session_start();
	include('connect_bddeneam.php');
	$connexion=connect('news_bdd');
	$result=$connexion->query("SELECT mail FROM users");
	if(isset($_POST['mail']) && $result)
	{
		foreach ($result as $value) {
			if($value['mail']==$_POST['mail']){
				#envoi de mail contenant le lien de vérification
				$dest=$value['mail'];

				$objet="Code de vérification";

				$text="Bienvenu(e) sur iPub \n";
				$text.="voici le lien pour réinitialiser votre mot de passe \n";
				$text.="C:\\xampp\htdocs\Projet_Stage\deskapp-master\\reset-password.php \n";
				$text.="Si vous n'êtes pas l'auteur de cette action, Veillez ne pas cliquez sur le lien. \n";
				$text.="Vous pouvez accédez à la page de réinitialisation de mot de passe en cliqant sur:\n";
				$text.="C:\\xampp\htdocs\Projet_Stage\Projet\\reset-password.php\n";
				$text.=" afin de sécuriser votre compte. \n";
				if(mail($dest,$objet,$text,'FROM:iPub'))
				{
					echo "
						<script type=\"text/javascript\">
							alert('Veillez consulter votre boîte mail pour continuer🎈🎈.');
						</script>
					"; 	
				}else{
					echo "
						<script type=\"text/javascript\">
							alert('ERREUR🎈🎈.');
						</script>
					"; 
				}	
			}
		}
	}else
	{
		echo "
				<script type=\"text/javascript\">
					alert('Une erreur est survenue!! Veillez remplire les champs');
				</script>
			";
		include('forgot-password.php');
	}*/
?>