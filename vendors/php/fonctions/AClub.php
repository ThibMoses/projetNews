<?php
    $defaultview = "ENEAM";
    $nomclub = " ";
    $cygleclub = " ";
    $error = " ";
    $connexion = new mysqli("localhost","root","","news_bdd",3308);
    $succes = " ";
    $failed = " ";

//function de controle de saisie
    function nameclub_error($var){
        $modele = "/[[:punct:]]/";
        if( preg_match( $modele , $var , $tab ) ){
            return true;
        }else{
            return false;
        }
    }
    function cygleclub_error($var){
        $modele = "/[[:punct:]]/";
        if( preg_match( $modele , $var , $tab ) ){
            return true;
        }else{
            return false;
        }
    }

//insertion des clubs dans la base
    if(isset($_POST["valider"])){
        $nomclub = $_POST['nomclub'];
        $cygleclub = strtoupper($_POST['cygleclub']);
        $id = $_POST['nomFiliere'];
        $succes = "Enregistrement reussi";
        $failed = "Enregistrement echoué";

        //si les fonctions de controle retroune false, alors il n'y a pas d'erreur rede saisie
            $req = "UPDATE FILIERE SET name_Club = '$nomclub', cygle_Club = '$cygleclub' WHERE id = '$id' ";
            $result = $connexion->query($req);
    }

//suppression d'une filiere
    if(isset($_POST["suppr"])){
        $id = $_POST['suppr'];
        $nomclub = ' ';
        $cygleclub = ' '; 
        $succes = "Suppression reussie";
        $failed = "Suppression echouée";

        $req = "UPDATE FILIERE SET name_Club = '$nomclub', cygle_Club = '$cygleclub' WHERE id = '$id'";
        $result = $connexion->query($req);


     
    }

//affichage du tableau des filieres enregistrés dans la base
    $req1 = "SELECT * FROM FILIERE where name_Club !=' ' AND cygle_Club!= ' ' ";
    $result1 = $connexion->query($req1);
    function tabshow($var){
        $i=0;
        foreach($var as $value){
            $i++;
            echo <<< html
            <tr>
                <td>{$i}</td>
                <td>{$value["name_Club"]}</td>
                <td>{$value["cygle_Club"]}</td>
                <td class="row">
                    <form action="Aclubmodify.php" method="POST">
                        <button type="submit" class="btn btn-primary" value="{$value["id"]}" name = "modifier"><i class="fa fa-pencil-square-o"></i>&nbsp; Modifier </button>
                    </form>
                    <div>&nbsp</div>
                    <form action="AClub.php" method="POST">
                        <button type="submit" id="S" class="btn btn-secondary" value="{$value["id"]}" name = "suppr"><i class="fa fa-trash-o"></i>&nbsp; Supprimer </button>
                    </form>
                </td>
            </tr>
    html;
        }
    }
    $req2 = "SELECT * FROM FILIERE";
    $result2 = $connexion->query($req2);
    function AllFiliere($var){
         $i=0;
        foreach($var as $value){
            $i++;
            echo <<< html
            <option value="{$value['id']}" selected>{$value["name_Filiere"]}</option>
    html;
        }

    }
?>