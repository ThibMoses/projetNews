<?php
    include('connect_bddeneam.php');
    $connexion=connect('news_bdd');
    $defaultview = "ENEAM";
    $error = true ;
    $reponse = "";
    //$connexion = new mysqli("localhost","root","","news_bdd",3308);
    $succes = "";
    $failed = "";
    $matricule = "";
    $profilRespo = "";
    /*$name = "";
    $surname = "";
    $filiere = "aazZEZE09";
    $clase = "aazZEZE09";*/
    $a1 = "";
    $actionname = "Nouveau Responsable";
    $input = "Ajouter";
    $inputname = "valider";
    $inputvalue = "";
    if(isset($_POST["modifier"])){
        $input = "Mettre a jour";
        $inputvalue = $_POST["modifier"];
        $inputname = "@modifier";
        $a1 = "modify";
        $actionname = "Changer de Responsable";
    }
    if(isset($_POST["@modifier"])){
        $input = "Mettre a jour";
        $inputvalue = $_POST["@modifier"];
        $inputname = "@modifier";
        $a1 = "modify";
        $actionname = "Changer de Responsale";
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
      $matricule = $_POST['matricule'];
      $profilRespo = $_POST['role'];
      $succes = "Enregistrement reussi";
      $failed = "Enregistrement echoué";

      //si les fonctions de controle retroune false, alors il n'y a pas d'erreur de saisie
      $req = " SELECT id FROM USERS WHERE matricule = '$matricule' ";
      $result = $connexion->query($req);
      if($result){
            foreach($result as $value){
                  $id = $value['id'];
            }
            $req = "INSERT INTO RESPONSABLE VALUES(  '$id' , '$profilRespo')";
            $result = $connexion->query($req);
            if($result){
                $req = "UPDATE users SET role = 'ReSponsable' WHERE id = '$id' ";
                $result = $connexion->query($req);
            }
      }
}

$respo_id = "";
//modification du compte
if(isset($_POST["modifier"])){
    $id = $_POST["modifier"]; //on recupere le respo_id dont on veut modifier des valeurs
    $respo_id = $_POST["modifier"];

    $req = " SELECT * FROM RESPONSABLE WHERE id = '$id' ";
    $reponse = $connexion->query($req);
    if($reponse){
        foreach($reponse as $value){
            $profilRespo = $value["name_Respo"];
        }
        $req = " SELECT matricule FROM USERS WHERE id = '$id' ";
        $reponse = $connexion->query($req);
        if($reponse){
            foreach($reponse as $value){
               $matricule = $value["matricule"];
            }
        }
    }
}

if(isset($_POST["@modifier"])){
    $Respo_id = $_POST['@modifier'];//on recupere le respo_id dont on veut modifier des valeurs
    $matricule = $_POST['matricule']; // le matricule du nouveau etudiant choisi comme responsable
    $profilRespo = $_POST['role'];  // le profil responsable du nouveau responsable
    $succes = "Mise a jour reussi";
    $failed = "Mise a jour echoué";

    //si les fonctions de controle retroune false, alors il n'y a pas d'erreur de saisie
      $req = " SELECT id FROM USERS WHERE matricule = '$matricule' ";
      $result = $connexion->query($req);
      if($result){
            $id = ""; // l'id du nouveau responsable designé
            foreach($result as $value){
                  $id = $value['id'];
            }
            $req = "UPDATE RESPONSABLE SET name_Respo ='$profilRespo' , id = '$id' WHERE id = '$Respo_id' "; 
            $result = $connexion->query($req);
            if($result){
                $req = "UPDATE users SET role = 'Etudiant' WHERE id = '$Respo_id' ";    
                $result = $connexion->query($req);
                $req = "UPDATE users SET role = 'Responsable' WHERE id = '$id' ";
                $result = $connexion->query($req);

                if($result){
                    echo '<script> alert(\'erroer\')</script>';
                }
            }else{
                //on remet son role precedent 
            }
            if(!$result){
                echo $connexion->error;
                $input = " ";
                $inputvalue = $_POST["@modifier"];
                $inputname = "@modifier";
            }
      }
}

//suppression 
    if(isset($_POST["suppr"])){
        $id = $_POST['suppr']; // respo_id
        $succes = "Suppression reussi";
        $failed = "Suppression echoué";

        $req = "DELETE FROM RESPONSABLE WHERE id = '$id' ";
        $result = $connexion->query($req);
    }

//affichage du compte des responsables  (a revoir)
$d = "Direction";
$respo_id = "";

$req1 = "SELECT matricule , name , surname , name_classe , name_Filiere , name_Respo , USERS.id  From RESPONSABLE,USERS,INFORMATIONS,CLASSE,FILIERE where  INFORMATIONS.users_id = USERS.id AND RESPONSABLE.id = USERS.id AND INFORMATIONS.classe_id = CLASSE.id AND CLASSE.filieres_id = FILIERE.id";
$result1 = $connexion->query($req1);

   //$req1 = "SELECT name , surname , classe_id , users_id From USERS INNER JOIN INFORMATIONS where users_id = USERS.id";
    //$result1 = $connexion->query($req1);
    //$req2 = "SELECT * FROM CLASSE INNER JOIN {$result1} Where classe_id = id";
    //$result2 = $connexion->query($req2);
    
    function tabshow($var,$id){
        foreach($var as $value){
            echo <<< html
            <tr>
                  <td>{$value["matricule"]}</td>
                  <td>{$value["name"]} {$value["surname"]} </td>
                  <td>{$value["name_Filiere"]} {$value["name_classe"]} </td>
                  <td>{$value["name_Respo"]}</td>
                  <td>
                        <form action="ASelectRespo.php" method="POST">
                        <button type="submit" id ="S" class="btn btn-primary" value="{$value["id"]}" name = "modifier"><i class="fa fa-pencil-square-o"></i>&nbsp; Modifier </button>
                        <button type="submit" class="btn btn-secondary" value="{$value["id"]}" name = "suppr"><i class="fa fa-trash-o"></i>&nbsp; Supprimer </button>
                        </form>
                  </td>
            </tr>
html;
            }
      }

    function isyourRole($profilRespo,$var){
        if($profilRespo == $var) { echo "checked"; }
    }

    function AllMatricule($var){
        //include('connect_bddeneam.php');
        //$connexion=connect('news_bdd'); 

        $connexion = new mysqli("localhost","root","","news_bdd",3308);
        $req1 = "SELECT matricule FROM USERS";
        $result1 = $connexion->query($req1);
        if($result1){
            foreach($result1 as $value){
                if($value['matricule'] == $var){
                    echo <<< html
                    <option value="{$value['matricule']}" selected>{$value["matricule"]}</option>
html;
                }else{
                    echo '<option value="'.$value['matricule'].'">'.$value["matricule"].'</option>';       
                }
            }
        }else{ echo "hbkj"; }
    }
?>