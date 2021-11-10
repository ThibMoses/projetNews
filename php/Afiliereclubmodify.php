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
                  $nomfiliere = $value["nomfiliere"];
                  $cyglefiliere = "og";
            }
      }
}

if (isset($_POST["valider"])) {
      $id = $_POST['valider'];
      $nomfiliere = $_POST["nomfiliere"];
      $succes = "Mise à jour reussi";
      $failed = "Mise à jour echoué";
      if( !namefiliere_error($nomfiliere)){
            $req = "UPDATE FILIERE SET nomfiliere = '$nomfiliere' WHERE id = '$id' ";
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
}

//affichage du tableau des filieres enregistrés dans la base
$req1 = "SELECT * FROM FILIERE";
$result1 = $connexion->query($req1);
function tabshow($var)
{
      foreach ($var as $value) {
            echo <<< html
            <tr>
                <td>1</td>
                <td>IG</td>
                <td>{$value["nomfiliere"]}</td>
                <td>
                    <form action="Afilierclubmodify.php" method="POST">
                    <button type="submit" class="btn btn-primary" value="{$value["id"]}" name = "modifier"> Modifier </button>
                    <button type="submit" class="btn btn-secondary" value="{$value["id"]}" name = "suppr"> Supprimer </button>
                    </form>
                </td>
            </tr>
    html;
      }
}
