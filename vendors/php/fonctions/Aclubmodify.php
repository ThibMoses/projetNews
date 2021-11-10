<?php
$defaultview = "ENEAM";
$nomclub = "";
$cygleclub = "";
$error = " ";
$connexion = new mysqli("localhost", "root", "", "news_bdd", 3308);
$succes = " ";
$failed = " ";
$id="";
if (isset($_POST["modifier"])) {
      $id = $_POST['modifier'];
      $req = "SELECT * FROM FILIERE WHERE id = $id";
      $result2 = $connexion->query($req);
      if ($result2) {
            foreach ($result2 as $value) {
                  $nomclub = $value["name_Club"];
                  $cygleclub = $value["cygle_Club"];
            }
      }
}

if (isset($_POST["valider"])) {
      $id = $_POST['valider'];
      $nomclub = $_POST["nomclub"];
      $cygleclub = $_POST["cygleclub"];
      $succes = "Mise à jour reussie";
      $failed = "Mise à jour echouée";
      if( !nameclub_error($nomclub) || !cygleclub_error($cygleclub)){
            $req = "UPDATE FILIERE SET name_Club = '$nomclub', cygle_Club = '$cygleclub' WHERE id = '$id' ";
            $result = $connexion->query($req);
      }
}

//function de controle de saisie
function nameclub_error($var)
{
      $modele = "/[[:punct:]]/";
      if (preg_match($modele, $var, $tab)) {
            return true;
      } else {
            return false;
      }
}
function cygleclub_error($var)
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
      $nomclub = ' ';
      $cygleclub = ' ';      
      $succes = "Suppression reussie";
      $failed = "Suppression echouée";

      $req = "UPDATE FILIERE SET name_Club = '$nomclub', cygle_Club = '$cygleclub' WHERE id = '$id'";
      $result = $connexion->query($req);
      if($result){
            header('Location: AClub.php');
      }
}

//affichage du tableau des filieres enregistrés dans la base
$req1 = "SELECT * FROM FILIERE where name_Club !=' ' AND cygle_Club!= ' ' ";
$result1 = $connexion->query($req1);
function tabshow($var)
{$i=0;
      foreach ($var as $value) {
        $i++;
            echo <<< html
            <tr>
                <td>{$i}</td>
                <td>{$value["cygle_Club"]}</td>
                <td>{$value["name_Club"]}</td>
                <td>
                    <form action="Aclubmodify.php" method="POST">
                    <button type="submit"  class="btn btn-primary" value="{$value["id"]}" name = "modifier"><i class="fa fa-fa-pencil-square-o"></i>&nbsp; Modifier </button>
                    <button type="submit" id="S" class="btn btn-secondary" value="{$value["id"]}" name = "suppr"><i class="fa fa-trash-o"></i>&nbsp; Supprimer </button>
                    </form>
                </td>
            </tr>
    html;
      }
}

 function AllFiliere($var){
         $i=0;
         $req2 = "SELECT * FROM FILIERE";
         $connexion = new mysqli("localhost","root","","news_bdd",3308);
      $result2 = $connexion->query($req2);
        foreach($result2 as $value){
            $i++;
                        if($value['id'] == $var){
                  echo <<< html
                  <option value="{$value['id']}" selected>{$value["name_Filiere"]}</option>
html;
              }else{
                  echo '<option value="'.$value['id'].'">'.$value["name_Filiere"].'</option>';       
              }
        }

    }
