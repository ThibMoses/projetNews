<?php
    $defaultview = "ENEAM";
    $connexion = new mysqli("localhost","root","","news_bdd",3308);

    //affichage du tableau des filieres enregistrés dans la base
    $req1 = "SELECT * FROM FILIERE";
    $result1 = $connexion->query($req1);
    function tabshow($var){
        foreach($var as $value){
            echo <<< html
            <tr>
                <td>1</td>
                <td>IG</td>
                <td>{$value["nomfiliere"]}</td>
            </tr>
    html;
        }
    }
    
    $d = "Direction";
    $req2 = "SELECT users_id FROM RESPONSABLE WHERE name = '$d' ";
      $result2 = $connexion->query($req2);
      if($result2){
            foreach($result2 as $value){
                $id1 = $value["users_id"];
            }
            $req2 = "SELECT name,surname FROM USERS WHERE id = '$id1' ";
            $result2 = $connexion->query($req2);
      }

      function tabshow2($var){
        foreach($var as $value){
            echo <<< html
            <tr>
                <td>________</td>
                <td>{$value["name"]} {$value["surname"]}</td>
                <td>Direction</td>
            </tr>
    html;
        }
    }

    

    $req3 = "SELECT USERS.name, surname,matricule,RESPONSABLE.name, RESPONSABLE.id FROM RESPONSABLE INNER JOIN USERS WHERE RESPONSABLE.name != '$d' AND users_id = USERS.id ";
    $result3 = $connexion->query($req3);

    function tabshow3($var){
        foreach($var as $value){
            echo <<< html
            <tr>
                  <td>{$value["matricule"]}</td>
                  <td>{$value["name"]} {$value["surname"]} </td>
                  <td>Informatique de Gestion 2eme année</td>
                  <td>{$value["name"]}</td>
            </tr>
    html;
            }
      }

?>
