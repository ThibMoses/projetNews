<?php
	session_start();
	$verify=$_POST['code'];
	$_SESSION['code'];
	if(isset($_SESSION['filiere'])){
		if(isset($_POST['code']) && ($_SESSION['code']==$_POST['code']))
	{
		include('register.php');
	}else
	{
		echo "
			<script type=\"text/javascript\">
				alert(\"Code incorrect. Veillez entrez le code reçu par mail\");
			</script>
		";
		include('code-verification.php');
	}
}else{
	if(isset($_POST['code']) && ($_SESSION['code']==$_POST['code']))
	{
		include('reset-password.php');
	}else
	{
		echo "
			<script type=\"text/javascript\">
				alert(\"Code incorrect. Veillez entrez le code reçu par mail\");
			</script>
		";
		include('code-verification.php');
	}
}
	
?>