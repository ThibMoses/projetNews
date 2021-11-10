<?php 
		define('HOST', 'localhost');
		define('PORT', 3308);
		define('USER', 'root');
		define('PASS','');
	function connect($base){
		$connected= new mysqli(HOST,USER,PASS,$base,PORT);
		if(!$connected){
			?>
			<script type="text/javascript">
				document.write('ERREUR D\' ACCES A LA BASE DE DONNEE DE L\'ENEAM');
				alert('ERREUR D\' ACCES A LA BASE DE DONNEE DE L\'ENEAM');
			</script>
			<?php
			exit();
		} else {
			return $connected;		
		}
	}
?>