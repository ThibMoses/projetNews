<?php
    $defaultview = "ENEAM";
    $nomfiliere = " ";
    $cyglefiliere = " ";
    $error = " ";
    $connexion = new mysqli("localhost","root","","news_bdd",3308);
    $succes = " ";
    $failed = " ";

//function de controle de saisie
    function namefiliere_error($var){
        $modele = "/[[:punct:]]/";
        if( preg_match( $modele , $var , $tab ) ){
            return true;
        }else{
            return false;
        }
    }
    function cyglefiliere_error($var){
        $modele = "/[[:punct:]]/";
        if( preg_match( $modele , $var , $tab ) ){
            return true;
        }else{
            return false;
        }
    }

//insertion des filieres dans la base
    if(isset($_POST["valider"])){
        $nomfiliere = $_POST['nomfiliere'];
        $cyglefiliere = strtoupper($_POST['cyglefiliere']);
        $succes = "Enregistrement reussi";
        $failed = "Enregistrement echoué";

        //si les fonctions de controle retroune false, alors il n'y a pas d'erreur de saisie
            $req = "INSERT INTO FILIERE VALUES( null , '$nomfiliere' , 1, '$cyglefiliere', ' ', ' ')";
            $result = $connexion->query($req);
    }

//suppression d'une filiere
    if(isset($_POST["suppr"])){
        $id = $_POST['suppr'];
        $succes = "Suppression reussie";
        $failed = "Suppression echouée";

        $req = "DELETE From FILIERE where id = $id";
        $result = $connexion->query($req);
    }

//affichage du tableau des filieres enregistrés dans la base
    $req1 = "SELECT * FROM FILIERE";
    $result1 = $connexion->query($req1);
    function tabshow($var){
        $i=0;
        foreach($var as $value){
            $i++;
            echo <<< html
            <tr>
                <td>{$i}</td>
                <td>{$value["cygle"]}</td>
                <td>{$value["name_Filiere"]}</td>
                <td class="row">
                    <form action="Afilierclubmodify.php" method="POST">
                        <button type="submit" class="btn btn-primary" value="{$value["id"]}" name = "modifier"><i class="fa fa-pencil-square-o"></i>&nbsp; Modifier </button>
                    </form>
                    <div>&nbsp</div>
                    <form action="AfiliereClub.php" method="POST">
                        <button type="submit" id="S" class="btn btn-secondary" value="{$value["id"]}" name = "suppr"><i class="fa fa-trash-o"></i>&nbsp; Supprimer </button>
                    </form>
                </td>
            </tr>
    html;
        }
    }
?>