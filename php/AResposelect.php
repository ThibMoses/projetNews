<?php
    $defaultview = "ENEAM";
    $error = true ;
    $reponse = "";
    $connexion = new mysqli("localhost","root","","news_bdd",3306);
    $succes = " ";
    $failed = " ";
    $matricule = "";
    $profilRespo = "";
    /*$name = "";
    $surname = "";
    $filiere = "aazZEZE09";
    $clase = "aazZEZE09";*/
    $input = "Ajouter";
    $inputname = "valider";
    $inputvalue = "";
    if(isset($_POST["modifier"])){
        $input = "Mettre a jour";
        $inputvalue = $_POST["modifier"];
        $inputname = "@modifier";
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
                /*
                    name = $value['name'];
                    $surname = $value['surname'];*/
            }
            $req = "INSERT INTO RESPONSABLE VALUES( null , '$profilRespo' , '$id')";
            $result = $connexion->query($req);
      }
}

//modification du compte
if(isset($_POST["modifier"])){
    $id = $_POST["modifier"]; //on recupere le respo_id dont on veut modifier des valeurs
    $req = " SELECT * FROM RESPONSABLE WHERE id = '$id' ";
    $reponse = $connexion->query($req);
    if($reponse){
        $users_id = "";
        foreach($reponse as $value){
            $users_id = $value["users_id"];
            $profilRespo = $value["name"];
        }
        $req = " SELECT matricule FROM USERS WHERE id = '$users_id' ";
        $reponse = $connexion->query($req);
        if($reponse){
            foreach($reponse as $value){
               $matricule = $value["matricule"];
            }
        }
    }
}

if(isset($_POST["@modifier"])){
    $id = $_POST['@modifier']; //on recupere le respo_id dont on veut modifier des valeurs
    $matricule = $_POST['matricule'];
    $profilRespo = $_POST['role'];
    $succes = "Mise a jour reussi";
    $failed = "Mise a jour echoué";

      //si les fonctions de controle retroune false, alors il n'y a pas d'erreur de saisie
      $req = " SELECT id FROM USERS WHERE matricule = '$matricule' ";
      $result = $connexion->query($req);
      if($result){
            $users_id = "";
            foreach($result as $value){
                  $users_id = $value['id'];
            }
            $req = "UPDATE RESPONSABLE SET name ='$profilRespo' , users_id = '$users_id' WHERE id = '$id' ";
            $result = $connexion->query($req);
      }
}

//suppression 
    if(isset($_POST["suppr"])){
        $id = $_POST['suppr']; // respo_id
        $succes = "Suppression reussi";
        $failed = "Suppression echoué";

        $req = "DELETE FROM RESPONSABLE WHERE id = '$id' ";
        $result = $connexion->query($req);
        if($result){
                $req = "DELETE From USERS where id = '$id' ";
                $result = $connexion->query($req);
        }
    }

//affichage du compte de l'administration  (a revoir)
$d = "Direction";
$respo_id = "";

    $req1 = "SELECT USERS.name, surname,matricule,RESPONSABLE.name, RESPONSABLE.id FROM RESPONSABLE INNER JOIN USERS WHERE RESPONSABLE.name != '$d' AND users_id = USERS.id ";
    $result1 = $connexion->query($req1);

    function tabshow($var,$id){
        foreach($var as $value){
            echo <<< html
            <tr>
                  <td>{$value["matricule"]}</td>
                  <td>{$value["name"]} {$value["surname"]} </td>
                  <td>Informatique de Gestion 2eme année</td>
                  <td>{$value["name"]}</td>
                  <td>
                        <form action="ASelectRespo.php" method="POST">
                        <button type="submit" class="btn btn-primary" value="{$value["id"]}" name = "modifier"> Modifier </button>
                        <button type="submit" class="btn btn-secondary" value="{$value["id"]}" name = "suppr"> Supprimer </button>
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
        $connexion = new mysqli("localhost","root","","news_bdd",3306);
        $req1 = "SELECT matricule FROM USERS";
        $result1 = $connexion->query($req1);
        if($result1){
            foreach($result1 as $value){
                if($value['matricule'] == $var){
                    echo <<< html
                    <option value="{$value['matricule']}" selected>{$value["matricule"]}</option>
html;
                }else{
                    echo <<< html
                    <option value="{$value['matricule']}">{$value["matricule"]}</option>
html;       
                }
            }
        }
    }
?>