<?php
session_start();
    $_SESSION['ecole'] = "ENEAM";
        include('connect_bddeneam.php');
		$connexion=connect('news_bdd');

    //affichage du tableau des filieres d'une école enregistrées dans la base
    $req1 = "SELECT * FROM filiere, schools WHERE filiere.schools_id=schools.id AND schools.name_School='".$_SESSION['ecole']."'";
    $result1 = $connexion->query($req1);
    function tabshow($var){
        $i=0;
        foreach($var as $value){
            $i+=1;
            echo <<< html
            <tr>
                <td>{$i}</td>
                <td>IG</td>
                <td>{$value["name_Filiere"]}</td>
            </tr>
html;
        }
    }
    
    $d = "Direction";
    $req2 = "SELECT name,surname FROM RESPONSABLE R,USERS U WHERE R.name_Respo = '$d' AND R.id = U.id ";
    $result2 = $connexion->query($req2);

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

    

    $req3 = "SELECT matricule , name , surname , name_classe , name_Filiere , name_Respo , USERS.id  FROM RESPONSABLE,USERS,INFORMATIONS,CLASSE,FILIERE where RESPONSABLE.id = USERS.id AND  INFORMATIONS.users_id = USERS.id AND INFORMATIONS.classe_id = CLASSE.id AND CLASSE.filieres_id = FILIERE.id";
    $result3 = $connexion->query($req3);
    echo $connexion->error;

    function tabshow3($var){
        foreach($var as $value){
            echo <<< html
            <tr>
                  <td>{$value["matricule"]}</td>
                  <td>{$value["name"]} {$value["surname"]} </td>
                  <td>{$value["name_Filiere"]} {$value["name_classe"]} année</td>
                  <td>{$value["name_Respo"]}</td>
            </tr>
html;
            }
      }

?>