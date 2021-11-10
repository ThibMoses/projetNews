<?php
$defaultview = "ENEAM";
$nomfiliere = "";
$cyglefiliere = "";
$error = " ";
$connexion = new mysqli("localhost", "root", "", "news_bdd", 3308);
$succes = " ";
$failed = " ";

if (isset($_POST["modifier"])) {
      $id = $_POST['modifier'];
      $req = "SELECT * FROM FILIERE WHERE id = $id";
      $result2 = $connexion->query($req);
      if ($result2) {
            foreach ($result2 as $value) {
                  $nomfiliere = $value["name_Filiere"];
                  $cyglefiliere = $value["cygle"];
            }
      }
}

if (isset($_POST["valider"])) {
      $id = $_POST['valider'];
      $nomfiliere = $_POST["nomfiliere"];
      $cyglefiliere = $_POST["cyglefiliere"];
      $succes = "Mise à jour reussie";
      $failed = "Mise à jour echouée";
      if( !namefiliere_error($nomfiliere) || !cyglefiliere_error($cyglefiliere)){
            $req = "UPDATE FILIERE SET name_Filiere = '$nomfiliere', cygle = '$cyglefiliere' WHERE id = '$id' ";
            $result = $connexion->query($req);
      }
}

//function de controle de saisie
function namefiliere_error($var)
{
      $modele = "/[[:punct:]]/";
      if (preg_match($modele, $var, $tab)) {
            return true;
      } else {
            return false;
      }
}
function cyglefiliere_error($var)
{
      $modele = "/[[:punct:]]/";
      if (preg_match($modele, $var, $tab)) {
            return true;
      } else {
            return false;
      }
}



//suppression d'une filiere
if (isset($_POST["suppr"])) {
      $id = $_POST['suppr'];
      $succes = "Suppression reussi";
      $failed = "Suppression echoué";

      $req = "DELETE From FILIERE where id = $id";
      $result = $connexion->query($req);
      if($result){
            header('Location: AfiliereClub.php');
      }
}

//affichage du tableau des filieres enregistrés dans la base
$req1 = "SELECT * FROM FILIERE";
$result1 = $connexion->query($req1);
function tabshow($var)
{
  $i=0;
      foreach ($var as $value) {
            $i++;
            echo <<< html
            <tr>
                <td>{$i}</td>
                <td>{$value["cygle"]}</td>
                <td>{$value["name_Filiere"]}</td>
                <td>
                    <form action="Afilierclubmodify.php" method="POST">
                    <button type="submit"  class="btn btn-primary" value="{$value["id"]}" name = "modifier"><i class="fa fa-fa-pencil-square-o"></i>&nbsp; Modifier </button>
                    <button type="submit" id="S" class="btn btn-secondary" value="{$value["id"]}" name = "suppr"><i class="fa fa-trash-o"></i>&nbsp; Supprimer </button>
                    </form>
                </td>
            </tr>
    html;
      }
}
