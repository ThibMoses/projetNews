<?php
    include('connect_bddeneam.php');
    $connexion=connect('news_bdd');
    //$connexion = new mysqli("localhost","root","","news_bdd",3306);
    //$user = 123;
    
    $result=" ";
    $name = $_SESSION['nom'];
    $surname = $_SESSION['prenom'];
    $mail = $_SESSION['mail'];
    $matricule = $_SESSION['matricule'];
 if(isset($_SESSION['ecole']) && isset($_SESSION['filiere']) && isset($_SESSION['annee']))
 {
    $ecole = $_SESSION['ecole'];
    $filiere = $_SESSION['filiere'];
    $annee = $_SESSION['annee'];
}

    //$_SESSION['id']=9;
    if(isset($_POST["modifier"])){
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $mail = $_POST["mail"];

        $req = "UPDATE USERS SET name = '$name' , surname = '$surname' , mail = '$mail' WHERE id = '".$_SESSION['id']."'";
        $result = $connexion->query($req);
        if($result){
            echo '<div class="alert alert-success">Modification reussie</div>';
        }else{
            echo '<div class="alert alert-danger">Echec de la modification</div>';
        }
    }else{
        $req = "SELECT id,matricule,name,surname,mail FROM USERS WHERE id ='".$_SESSION["id"]."'";
        $result = $connexion->query($req);
        foreach ($result as $value) {
            $name = $value["name"];
            $surname = $value["surname"];
            $mail = $value["mail"];
            $matricule = $value["matricule"];
            /*$ecole = $value["name"];
            $filiere = $value["annee"];
            $annee = $value["annee"];*/
        }
    }
    ?>
    <style type="text/css">
        .div1{
            height: 20px;
        }
    </style>