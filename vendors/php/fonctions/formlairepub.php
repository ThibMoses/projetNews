<?php
	$error = false;
	$result = "";
    $categorie = " ";
    $title = " ";
    $content = " ";
    $media = " ";
    $datepub = " ";
    $author_id = " ";

	require 'vendors/php/fonctions/Users.php';
	require 'vendors/php/fonctions/fonction.php';
	require 'vendors/php/fonctions/Publication.php';
	$user = new User;
	if(isset($_POST["valider"])){
		$Publication = new Publication(4454);
		$error = $Publication->isvalide();
		if(!$error){
			$result = $Publication->addPub();
		}else{
			// anything
		}
	}


    function setvalue($tab):void{
        $categorie = $tab["categorie"];
        $title = $tab["title"];
        $content = $tab["content"];
        $media = $tab["media"];
        $datepub = date('d/m/Y');
        $author_id = 123;
    }

    function isvalide(): bool
    {    
        if(isset($_POST["filiere"])){
            $cible = $_POST["filiere"].' '.$_POST["annee"];
            setvalue($_POST);
            return false;
        }else{
            if(isset($_POST["cible"])){
                $cible = $_POST['cible'];
                setvalue($_POST);
                return false;
            }else{
                return true;
            }
        }
    }

    function addpub(): string
    {
        $connnexion = new mysqli("localhost", "root", "","news_bdd",3308);
        if($connnexion){
            $req = "INSERT INTO PUBLICATIONS VALUES(1212,'$categorie','$title','$content','$media','$cible','$datepub',null,null,null)";
            $result = $connnexion->query($req);
            if($result){
                return "Success";
            }else{
                return $connnexion->error;
            }
        }else{
            return "Error";
        }
    }

?>