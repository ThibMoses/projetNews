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
        if( !namefiliere_error($nomfiliere) && !cyglefiliere_error($cyglefiliere)){
            $req = "INSERT INTO FILIERE VALUES( null , '$nomfiliere' , null )";
            $result = $connexion->query($req);
        }
    }

//suppression d'une filiere
    if(isset($_POST["suppr"])){
        $id = $_POST['suppr'];
        $succes = "Suppression reussi";
        $failed = "Suppression echoué";

        $req = "DELETE From FILIERE where id = $id";
        $result = $connexion->query($req);
    }

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
                <td>
                    <form action="Afilierclubmodify" method="POST">
                    <button type="submit" class="btn btn-primary" value="{$value["id"]}" name = "modifier"> Modifier </button>
                    <button type="submit" class="btn btn-secondary" value="{$value["id"]}" name = "suppr"> Supprimer </button>
                    </form>
                </td>
            </tr>
    html;
        }
    }

?>