<?php
    include('connect_bddeneam.php');
class Publication{
    public $categorie;
    public $title;
    public $content;
    public $media;
    public $cible;
    public $author_id;
    public $datepub;
    public $erreurcible;

    public function __construct($user){
        $this->author_id = $user;
    }

    public function setvalue($tab):void{
        $this->categorie = $tab["categorie"];
        $this->title = $tab["title"];
        $this->content = $tab["content"];
        //$this->media = $tab["media"];
        if(isset($_FILES["media"]["name"])){
            $name = $_FILES["media"]["name"];
            $a = opendir("src");
            $result = move_uploaded_file($_FILES["media"]["tmp_name"],'src/images/webimg/'.$name);
            if($result == true){
                $this->media = $name;
            }else{
                echo "<hr /> Erreur de transfert n°".$_FILES["media"]["error"];
            }
        }
        $this->datepub = date('d/m/Y');
    }

    public function isvalide($tab): bool
    {    
        if(isset($tab["cible"])){
            $this->cible = $tab["cible"];
            return false;
        }else{
            if(isset($_POST["annee"]) && isset($_POST["filiere"])){
                $cible = "";
                if($_POST["filiere"] != "none"){
                    $cible .= $_POST["filiere"];
                }
                if($_POST["annee"] != "none"){
                    $cible .=' '.$_POST["annee"];
                }
                $this->cible = $cible;
                return false;
            }
        }
    }

    public function addpub(): string
    {
        //$connnexion = new mysqli("localhost", "root", "","news_bdd",3306);
        //if($connnexion){
        $con=connect('news_bdd');
        $this->datepub = date('Y-m-d H:i:s');
            $req = "INSERT INTO publications VALUES(null,'$this->datepub','$this->categorie','$this->title','$this->content','$this->media','$this->cible','$this->author_id',0,0)";
            $result = $con->query($req);
            if($result){
                return "Success";
            }else{
                return $con->error;
            }
        /*}else{
            return "Error";
        }*/
    }

    public function getallpubs()
    {
        $con=connect('news_bdd');
       // if($connnexion){
            $req = "SELECT datepub,id,title FROM PUBLICATIONS WHERE author_id = '$this->author_id'";
            $result = $con->query($req);
            if($result){
                return $result;
            }else{
                return explode(' ',$con->error);
            }
        /*}else{
            return "Error";
        }*/
    }

    public function getpub($idpub)
    {
        
        $con=connect('news_bdd');
            $requete = " ";
            $action = explode('-',$idpub);
            $req = "SELECT * FROM PUBLICATIONS WHERE id = '$action[1]'";
            $req1 = "DELETE FROM PUBLICATIONS WHERE id = '$action[1]'";
            
            if($action[0] == "M"){
                $requete = $req;
            }else{
                $requete = $req1;
            }
            $result = $con->query($requete);
            if($result){
                if($requete == $req){
                    return $result;
                }
            }else{
                return explode(' ',$con->error);
            }
        /*}else{
            return "Error";
        }*/
    }  
}