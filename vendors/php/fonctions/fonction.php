<?php
function senderRespoClasse(object $User){
    echo <<<html
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Filiere</label>
            <div class="col-sm-12 col-md-10">
                <select class="select1 custom-select col-12" name="filiere">
                    <option selected="">{$User->getuserFiliere()}</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Année</label>
            <div class="col-sm-12 col-md-10">
                <select class="select2 custom-select col-12" name="annee">
                <option selected>{$User->getuserAnnee()}</option>
                </select>
            </div>
        </div>
html;							
}

function senderRespoClub($User){
    echo <<<html
    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Filiere</label>
        <div class="col-sm-12 col-md-10">
            <select class="select1 custom-select col-12" name="filiere">
                <option selected="">{$User->getuserFiliere()}</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-12 col-md-2 col-form-label">Année</label>
        <div class="col-sm-12 col-md-10">
            <select class="select2 custom-select col-12" name="annee">
                <option value="1">1ere année</option>
                <option value="2">2eme année</option>
                <option value="3">3eme année</option>
                <option value="none">None</option>
            </select>
        </div>
    </div>
html;						
}

function senderRespo(){
    $var = $_SESSION['id'];
    $con = new mysqli('localhost','root','','news_bdd',3308);
    if($an=$con->query('SELECT * FROM filiere WHERE filiere.schools_id = 1')){
            echo <<<html
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Filiere</label>
                <div class="col-sm-12 col-md-10">
                    <select class="select1 custom-select col-12" name="filiere">
html;
                    foreach ($an as $value) {
                        echo "<option value=\"{$value['id']}\">{$value['name_Filiere']}</option>";
                    }
            echo <<<html
                        <option value="none">None</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Année</label>
                <div class="col-sm-12 col-md-10">
                    <select class="select2 custom-select col-12" name="annee">
                        <option value="1">1ere année</option>
                        <option value="2">2eme année</option>
                        <option value="3">3eme année</option>
                        <option value="none">None</option>
                    </select>
                </div>
            </div> <br>
            <div class="col-md-6 col-sm-12">
                <div class="custom-control custom-radio mb-5">
                    <input type="radio" id="customRadio1" name="cible" value="Tous" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio1">A tous</label> <br>
                </div>
            </div>
html;
        }}
       
    
   


function createtablepub($var){
    foreach($var as $value){
        echo <<<html
        <tr> 
            <td>{$value["datepub"]}</td>
            <td>{$value["title"]}</td>
            <td class="right">
                <form method="POST" action="tablepublication.php">
                        <button type="submit" name="action" value="M-{$value["id"]}" class="btn btn-primary">Modifier</button>
                        <button type="submit" name="action" value="D-{$value["id"]}" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>	
html;
    }
}



function cible($var)
{
    if(str_contains(' ',$var)){
        return 2;
    }else{
        return 1;
    }
}

function identifycible($var, &$filiere , &$annee , &$tous){
    $idx = cible($var);
    if($idx == 2){
        $tab = explode(' ',$var);
        $filiere = $tab[0];
        $annee = $tab[1];
    }else{
        $tous = "tous";
    }
}