<?php

class User{

    public function __construct(){

    }

    public function getuserRole(): string{
        $con=connect('news_bdd');
        if($result=$con->query("SELECT * FROM responsable WHERE responsable.id='" .$_SESSION['id']. "'")){
            foreach ($result as $value) {
               return $value['name_Respo'];
            }
        }    
    }
    public function getuserFiliere(): string{
        return $_SESSION['filiere'];
    }
    public function getuserAnnee(): string{
        return $_SESSION['annee'];
    }
}