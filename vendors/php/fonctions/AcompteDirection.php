<?php
    $defaultview = "ENEAM";
    $error = true ;
    $reponse = "";
    //$connexion = new mysqli("localhost","root","","news_bdd",3308);
    include('connect_bddeneam.php');
    $connexion=connect('news_bdd');
    $succes = " ";
    $failed = " ";
    $name = "";
    $surname = "";
    $mail = "";
    $username = "";
    $pwd = "";
    $a1 = "";
    $actionname = "Nouveau Compte";
    $input = "Ajouter";
    $inputname = "valider";
    $inputvalue = "";
    
    if(isset($_POST["modifier"])){
        $input = "Mettre a jour";
        $inputvalue = $_POST["modifier"];
        $inputname = "@modifier";
        $a1 = "modify";
        $actionname = "Modifier un Compte";
    }
    if(isset($_POST["@modifier"])){
        $input = "Mettre a jour";
        $inputvalue = $_POST["@modifier"];
        $inputname = "@modifier";
        $a1 = "modify";
        $actionname = "Modifier un Compte";
    }
    
    
//function de controle de saisie
    function name_error($var){
        $modele = "/[[:punct:]]/";
        if( preg_match( $modele , $var , $tab ) ){
            $error = true;
            return true;
        }else{
            return false;
        }
    }
    function surname_error($var){
        $modele = "/[[:punct:]]/";
        if( preg_match( $modele , $var , $tab ) ){
            $error = true;
            return true;
        }else{
            return false;
        }
    }


//insertion dans la base
if(isset($_POST["valider"])){
      $name = $_POST['nom'];
      $surname = $_POST['prenom'];
      $mail = $_POST['mail'];
      $username = $_POST['username'];
      $pwd = $_POST['pwd'];
      $succes = "Enregistrement reussi";
      $failed = "Enregistrement echoué";

      //si les fonctions de controle retroune false, alors il n'y a pas d'erreur de saisie
        $req = "INSERT INTO USERS VALUES( null , null , '$name' , '$surname' , '$mail' , '$username' , '$pwd',null,null,null)";
        $result = $connexion->query($req);
        if($result){
            $req = " SELECT id FROM USERS WHERE mail = '$mail' AND username = '$username' AND pwd = '$pwd' ";
            $result = $connexion->query($req);
            if($result){
                $id="";
                foreach($result as $value){
                        $id = $value['id'];
                }
                $req = "INSERT INTO RESPONSABLE VALUES( '$id' , 'Direction')";
                $result = $connexion->query($req);
                if(!$result){
                        $req = "DELETE FROM USERS where id = '$id' ";
                        $tmp = $connexion->query($req);
                }
            }
        }
}

//modification du compte
if(isset($_POST["modifier"])){
    $id = $_POST["modifier"];
    $req = "SELECT * FROM USERS WHERE id = '$id' ";
    $reponse = $connexion->query($req);
    if($reponse){
        foreach($reponse as $value){
            $name = $value["name"];
            $surname = $value["surname"];
            $mail = $value["mail"];
            $username = $value["username"];
            $pwd = $value["pwd"];
        }
    }
}

if(isset($_POST["@modifier"])){
    $id = $_POST['@modifier']; // id du users
    $name = $_POST['nom'];
    $surname = $_POST['prenom'];
    $mail = $_POST['mail'];
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
    $succes = "Mise a jour reussi";
    $failed = "Mise a jour echoué";

      //si les fonctions de controle retroune false, alors il n'y a pas d'erreur de saisie
        $req = "UPDATE USERS SET  name = '$name', surname = '$surname', mail = '$mail', username = '$username', pwd = '$pwd' WHERE id = '$id' ";
        $result = $connexion->query($req);
}

//suppression 
    if(isset($_POST["suppr"])){
        $id = $_POST['suppr'];
        $succes = "Suppression reussi";
        $failed = "Suppression echoué";

        $req = "DELETE FROM RESPONSABLE WHERE id = '$id' ";
        $result = $connexion->query($req);
        if($result){
                $req = "DELETE From USERS where id = '$id' ";
                $result = $connexion->query($req);
        }
    }

//affichage du compte de l'administration
$d = "Direction";

      $req1 = "SELECT RESPONSABLE.id,name,surname FROM RESPONSABLE,USERS WHERE name_Respo = '$d' AND RESPONSABLE.id = USERS.id ";
      $result1 = $connexion->query($req1);

    function tabshow($var){
        foreach($var as $value){
            echo <<< html
            <tr>
                <td>________</td>
                <td>{$value["name"]} {$value["surname"]}</td>
                <td>Direction</td>
                <td>
                    <form action="AComptedirection.php" method="POST">
                    <button type="submit" id="M" class="btn btn-primary" value="{$value["id"]}" name = "modifier"><i class="fa fa-pencil-square-o"></i> Modifier </button>
                    <button type="submit" id="S" class="btn btn-secondary" value="{$value["id"]}" name = "suppr"><i class="fa fa-trash-o"></i> Supprimer </button>
                    </form>
                </td>
            </tr>
html;
        }
    }
