<?php 

	$pwd = "none";
	$error = "none";
	include 'connect_bddeneam.php';
	$connexion =connect('news_bdd');
	
	if(isset($_POST['pass']) && isset($_POST['confirmPass'])&& $_POST['pass']===$_POST['confirmPass'])
	{
		echo 'fgf';
		if($miseajour=$connexion->query("UPDATE users SET pwd='".$_POST['pass']."' WHERE users.id = '".$_SESSION['id']."'"))
		{
			$error = false;
			$pwd = true;
		}else
		{echo $connexion->error;
			$error = true;
			include('reset-password.php');
		}
	}else if(isset($_POST['pass']) && isset($_POST['confirmPass'])){
		$pwd = false;
	}

	if($pwd == true && $pwd != "none"){
		session_destroy();
		header('location:login.php');	
	}
?>