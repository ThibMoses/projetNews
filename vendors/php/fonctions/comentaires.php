<?php
$connexion = new mysqli("localhost", "root", "", "news_bdd", 3308);

$cible = null;
$request=null;
//recuperer l'id de la publication a afficher pour le commentaire
$annee = "";
$filiere = "";
if(isset($_SESSION['annee']) && isset($_SESSION['filiere'])){
    $annee = $_SESSION['annee'];
    $filiere = $_SESSION['filiere'];
}
$idpub = "";
if (isset($_POST["lire"])) {
    $_SESSION['idpub'] = $_POST["lire"];
}

    $idpub =  $_SESSION["idpub"];

//retrouver l'auteur de la publication et on enregistre son ' id, nom, prenom, type de responsable '

$req1 = " ";
$author_pub_id = "";
$author_name = " ";
$author_surname = " ";
$author_typeRespo = "Respo";

// pour les vues
$req = "INSERT into VUES VALUES(null,'".$_SESSION["id"]."','$idpub')";
if ($connexion->query($req)) {
    if ($temp5 = $connexion->query("SELECT nbVues FROM publications WHERE publications.id='" . $_SESSION['idpub'] . "'")) {
        foreach ($temp5 as $value) {
            $nbVue = $value['nbVues'] + 1;
        }
    }
    $req = "UPDATE publications SET nbVues = '$nbVue' WHERE id = '" . $_SESSION['idpub'] . "'";
    $connexion->query($req);
}


//pour liker un contenu
if (isset($_POST['liker'])) {
    $req = "INSERT into LIKES VALUES(null,'124','$idpub')";
    if ($connexion->query($req)) {
        if ($temp5 = $connexion->query("SELECT nbLikes FROM publications WHERE publications.id='" . $_SESSION['idpub'] . "'")) {
            foreach ($temp5 as $value) {
                $nbLike = $value['nbLikes'] + 1;
            }
        }
        $req = "UPDATE publications SET nbLikes = '$nbLike' WHERE id = '" . $_SESSION['idpub'] . "'";
        $connexion->query($req);
    }
}

//pour commenter
if (isset($_POST['comment'])) {
    $content = $_POST["content"];
    $datecom = date("Y-m-d H-i-s");
    $req = "INSERT into COMMENTAIRES VALUES(null,'$content','$datecom','$idpub','".$_SESSION["id"]."')";
    if ($connexion->query($req)) {
    } else {
        echo 'error';
        echo $connexion->error;
    }
}
// nombre de commentaire
$nbreq = "SELECT count(id) FROM COMMENTAIRES where publications_id = '" . $_SESSION['idpub'] . "'";
$nbreq = $connexion->query($nbreq);
foreach ($nbreq as $value) {
    $nbreq = $value['count(id)'];
}

//recuperer l'id de l'auteur de la publication et le contenu de la publication aussi
$req1 = "SELECT * FROM PUBLICATIONS WHERE id = '" . $_SESSION['idpub'] . "'";
$tmp1 = $connexion->query($req1);

foreach ($tmp1 as $value) {
    $author_pub_id = $value["author_id"];
}


//recupere les infos sur l'auteur de la publication
$req2 = "SELECT * FROM USERS WHERE id = $author_pub_id";
$tmp2 = $connexion->query($req2);

foreach ($tmp2 as $value) {
    $author_name = $value["name"];
    $surname = $value["surname"];
}
$req3 = "SELECT * FROM RESPONSABLE WHERE id = $author_pub_id";
$tmp3 = $connexion->query($req3);
foreach ($tmp3 as $value) {
    $author_typeRespo = $value["name_Respo"];
}

function bloc($var,$author_pub_id,$request,$annee,$filiere)
{
    if ($var == "Respo") {
        $request ="SELECT * FROM publications P, WHERE P.author_id = '$author_pub_id' AND (P.cible='A TOUS' OR P.cible='".$annee."' OR P.cible='".$filiere."' OR P.cible='".$annee." ".$annee."')";
        return "Direction";
    } else if ($var == 'RespoClub') {
        $request ="SELECT * FROM publications P, WHERE P.author_id = '$author_pub_id' AND (P.cible='".$annee."' OR P.cible='".$filiere."' OR P.cible='".$filiere." ".$annee."')";
        return "Club";
    } else if ($var == "RespoClasse") {
        $request ="SELECT * FROM publications P, WHERE P.author_id = '$author_pub_id' AND (P.cible='".$filiere." ".$annee."')";
        return "Classe";
    } else {
        $request ="SELECT * FROM publications P, WHERE P.author_id = '$author_pub_id' AND (P.cible='A TOUS' OR P.cible='".$annee."' OR P.cible='".$filiere."' OR P.cible='".$filiere." ".$annee."')";
        return "BUE-BCS";
    }
}

$tete = bloc($author_typeRespo,$author_pub_id,$request,$annee,$filiere);


//.............. recuperer le commentaire de chaque publication

//Recupere les publication de l'auteur qui concerne l'utilisateur
if ($tete == "Respo") {
    $request ="SELECT * FROM publications P WHERE P.author_id = '$author_pub_id' AND (P.cible='A TOUS' OR P.cible='".$annee."' OR P.cible='".$filiere."' OR P.cible='".$filiere." ".$annee."')";
} else if ($tete == "RespoClub") {
    $request ="SELECT * FROM publications P WHERE P.author_id = '$author_pub_id' AND (P.cible='".$annee."' OR P.cible='".$filiere."' OR P.cible='".$filiere." ".$annee."')";
} else if ($tete == "RespoClasse") {
    $request ="SELECT * FROM publications P WHERE P.author_id = '$author_pub_id' AND (P.cible='".$filiere." ".$annee."')";
} else {
    $request ="SELECT * FROM publications P WHERE P.author_id = '$author_pub_id' AND (P.cible='A TOUS' OR P.cible='".$annee."' OR P.cible='".$filiere."' OR P.cible='".$filiere." ".$annee."')";
}

$tmp4 = $connexion->query($request);
if($tmp4){
    echo "<script type=\"text/javascript\">
							alert(\'Vous allez reçevoir un mail dans quelques instant. Veillez consulter votre boîte messagerie!!\');
							</script>";
}else{
    echo $connexion->error;
}

//AFFichage des informations dans la page

function createbloc($id, $datepub, $categorie, $title, $like, $vue, $comment)
{
    echo <<<html
        <div class="pub bg-white pd-20 card-box mb-30">
            <h6 class="h6">
html;
            temps($datepub);
            echo  <<<html
            </h6>
            <h5 class="h5 text-center">$categorie</h5>
            <div class="titrepub text-center">$title</div>
            <div class="row avis">
                <span class="col-3 text-center"><i class="fa fa-thumbs-up"></i> $like</span>
                <span class="col-3 text-center"><i class="fa fa-eye"></i> $vue</span>
                <span class="col-3 text-center"><i class="fa fa-comment"></i> $comment</span>
                <form action="commentaire.php" method="POST">
                    <button type=" submit" name="lire" class="btn btn-primary text-center" value="{$id}">Lire</button>
                </form>
            </div>
            </div>

html;
}

function blocshow($var)
{
    foreach ($var as $value) {
        createbloc($value["id"], $value["datepub"], $value["categorie"], $value["title"], $value["nbLikes"], $value['nbVues'], "25");
    }
}

function contenutete($author, $Categorie, $nbLike, $nbVue, $datepub, $nbreq)
{
    echo <<<html
        <div class="col-12 row mb-10">
            <span class="col-8 h3 text-blue">$Categorie</span>
            <span class="col-4 text-right" style="color: gray;">
html;
        temps($datepub);
    echo  <<<html
    </span>
        </div>
        <div class="col-12 row">
            <span class="col-3 text-left">$nbLike &nbsp <i class="fa fa-thumbs-up"></i></span>
            <span class="col-3 text-left">$nbVue &nbsp <i class="fa fa-eye"></i></span>
            <span class="col-3 text-left com">$nbreq &nbsp <i class="fa fa-comment"></i></span>
        </div>
html;
}

function contenuteteshow($var, $nbreq)
{
    if ($var) {
        foreach ($var as $value) {
            contenutete('Louis LDOSSOU', $value["categorie"], $value["nbLikes"], $value["nbVues"], $value['datepub'], $nbreq);
        }
    }
}

function contenucorp($content, $title, $media)
{
    echo <<<html
        <div class="text-center" style="width: 100%;"> <br>
            <h6 class="text-center">$title</h6> <br>
        </div>
        <div class="container message customscroll mb-10">
            <p class="pmsg"> 
            $content
html;
            if($media){
                $tab = explode('.',$media);
                echo <<<html
                    <img src="src/images/webimg/{$media}" alt="" width="50%" style="margin-left: 24%; margin-top: 20px;">
                    <form action="commentaire.php" method="POST">
                        <button type="submit" name="download" class="btn btn-primary text-center" value="{$media}">download {$tab[1]}</button>
                    </form>
html;
            }
            
            echo <<<html
            </p>
        </div>
html;
}
function contenucorpshow($var)
{
    foreach ($var as $value) {
        contenucorp($value["content"], $value["title"], $value["media"]);
    }
}
$a = "vdfvdv";


function commentaire($id, $connexion)
{
    $req = "SELECT * FROM COMMENTAIRES,USERS WHERE publications_id = '$id' AND users_id = USERS.id  ORDER BY date_Com DESC";
    $var = $connexion->query($req);
    if ($var) {
        foreach ($var as $value) {
            echo <<< html
            <div style="z-index: 4; box-shadow: 0px 0px 5px rgb(158, 158, 158); padding-left: 10px; border-radius: 20px;" class="pd-5 bg-white mb-20">
                <div class="row">
                    <div class="col-1">
                        <i class="icon-copy ion-ios-person" style="color: white; font-size: 40px; background-color: rgb(230, 230, 230); border-radius: 50px; padding-left: 10px; padding-right: 10px;"></i>
                    </div>
                    <div class="col-6 text-blue h4" style="vertical-align: middle; padding-left: 30px; top: 16px;">
                    {$value["name"]} {$value["surname"]}
                    </div>
                    <div class="col-5 text-right" style="top: 18.5px; left: -15px;">
                        <pre>
html;
                        temps($value["date_Com"]);
                    echo  <<<html
                    </pre>
                    </div>
                </div>
                <hr style="margin: 0px;" class="mb-2">
                <div style="text-align: justify; padding-left:10px; padding-right:15px">
                    <p>
                        {$value["content"]}
                    </p>
                </div>
            </div>
html;
        }
    } else {
        echo $connexion->error;
    }
}
//telechargement du fichier sur votre pc
if (isset($_POST["download"])) {
    if (basename($_POST["download"]) == $_POST["download"]) {
        $namefile = $_POST["download"];
        $filepath = "src/images/webimg/" . $namefile;
        if (is_file($filepath) ) {
            header("Content-type:application/octet-stream");
            header("Content-disposition:attachement;filename=\"$namefile\"");
            header("set-cookie:fileLoading=true");
            header("Cache-control: max-age=0");
            header("Cache-control: post-check = 0, pre-check = 0");
            header("Pragma: public");
            header("Expires: 0");
            /*$fp = fopen($namefile,'w+');
            fwrite($fp, file_get_contents($filepath));*/
            readfile($filepath);
        }else{
            echo 'error2';
        }
    }else{
        echo 'erroe1';
    }
}
       
function temps($var){
    $start=strtotime($var);
        $fin=abs(time()-$start);
        $duree=array();
        $duree['seconde']=$fin%60;//Détermination du nombre de seconde
        $fin=floor(($fin-$duree['seconde'])/60);//conversion de la durée en miniute
        $duree['minute']=$fin%60;//Détermination de la minute
        $fin=floor(($fin-$duree['minute'])/60);//Conversion en heure
        $duree['heure']=$fin%24;
        $fin=floor(($fin-$duree['heure'])/24);//Conversion en jour
        $duree['jour']=$fin;
        if($duree['minute']==0)
        {
            echo "<h6 class=\"h6\">il y a ".$duree['seconde']." seconde</h6>";
        }else if($duree['heure']==0)
        {
            echo "<h6 class=\"h6\">il y a ".$duree['minute']." minute</h6>";
        }else if($duree['jour']==0)
        {
            echo "<h6 class=\"h6\">il y a ".$duree['heure']." heure</h6>";
        }else if($duree['jour']<20)
        {
            echo "<h6 class=\"h6\">il y a ".$duree['jour']." jour</h6>";
        }else
        {
            echo "<h6 class=\"h6\">".$var."</h6>";
        }
}