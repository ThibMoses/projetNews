<?php 
//session_start();
//include('connect_bddeneam.php');
//$id=connect('news_bdd');
//Sélection de la filière
//$_SESSION['id']=5;
$req1="SELECT name_classe, name_Filiere, name_School FROM classe, informations, users, filiere, schools WHERE users.id ='".$_SESSION['id']."' AND users.id=informations.users_id AND informations.classe_id=classe.id AND classe.filieres_id=filiere.id AND filiere.schools_id=schools.id";
$res=$connexion->query($req1);
if(!$res){
	echo "nonn";
	echo $connexion->error." ".$connexion->errno;
}else{
	foreach ($res as $value) {
		$_SESSION['filiere']=$value['name_Filiere'];
		$_SESSION['annee']=$value['name_classe'];
		$_SESSION['ecole']=$value['name_School'];
	}
}
































//Requête de sélection des filières et année de l'étudiant
/*'SELECT name_fil FROM filiere, informations, classes WHERE informtions.users_id=$_SESSION[\"id\"] AND informations.classe_id=classes.id AND classes.filieres_id=filieres.id';

	//include('connect_bddeneam.php');
	//$idcom=connect('news_bdd');
	//$nom="Bénito";
function selection($idcom,$nom$)
	{
		if($result=$idcom->query("SELECT id FROM responsable WHERE name=$nom"))
		{
			foreach ($result as $value) {
				return $value['id'];
			}
		}else{
			echo $idcom->error;
		}
	}
	/*echo mktime();
	$timepasse= mktime(6,26,0,10,3,2021);
$timeaujour = mktime();
$duree = $timeaujour-$timepasse;
echo "Entre le 30/05/1969 à 12h05m30s et maintenant, il s'est écoulé ",$duree,"
secondes <br />";
echo "Soit ",round($duree/3600), " heures <br />";
echo "Ou encore ",round($duree/3600/24)," jours <br />";
$timefutur = mktime(12,5,30,12,25,2016);
	//$a=selection($idcom,$name);
	//echo $a." ouiiiiiiiiii";*/
?>