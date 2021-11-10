<?php
	//$_SESSION['role']='responsable';
		if($_SESSION['role']=='Etudiant'){
			include('headerEtud.php');	
		}else if($_SESSION['role']=='Responsable' || $_SESSION['role']=='administrateur2'){
			include('headerRespo.php');	
		}else if($_SESSION['role']=='administrateur1'){
			
		}
		


            //include('connect_bddeneam.php');
            //$connexion=connect('news_bdd');
            //include('selection.php');
            //$who='BCS_BUE';
            //$author=selection($id,$who);
            $an = "";
            $fil = "";

            if(isset($_SESSION['annee']) && isset($_SESSION['filiere'])){
                  $an=$_SESSION['annee'];
                  $fil=$_SESSION['filiere'];
            }

            function recentPub($connexion,$an,$fil){
                  $request="SELECT * FROM publications P WHERE P.cible='A TOUS' OR P.cible='".$an."' OR P.cible='".$fil."' OR P.cible='".$fil." ".$an."'";
                  $result=$connexion->query($request);
                  if($result){
                        return $result;
                  }else{
                        echo $connexion->error;
                        echo $connexion->errno;
                        echo"<script type=\"text/javascript\">
                              alert('Un problème est survenu');
                        </script> ";
                  }
            }

            function timemanager($datepub){
                  $start=strtotime($datepub);
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
                        echo "<h6 class=\"h6\">".$datepub."</h6>";
                  }
            }

            function show($var){
                  $table = $var;
                  foreach ($table as $value) 
                  {
                        echo '<div class="pub bg-white pd-20 mb-30">';
                        timemanager($value['datepub']);
                        //affichage de la catégorie de publication
                        echo "<h5 class=\"h5 text-green text-center\">".$value['categorie']."</h5>";
                        //titre
                        echo "<pre class=\"text-center customscroll\"> <h6>".$value['title']."</h6> </pre>";
                        //affichage des vues likes commentaires
                        echo <<< html
                        <div class="row avis">
                              <span class="col-3 text-center"><i class="fa fa-thumbs-up"></i> {$value['nbLikes']}</span>
                              <span class="col-3 text-center"><i class="fa fa-eye"></i> {$value['nbVues']}</span>
                              <span class="col-3 text-center"><i class="fa fa-comment"></i></span>
                              <form action="commentaire.php" method="post">
                                    <button type=" submit" name="lire" class="btn btn-primary text-center" value="{$value['id']}">Lire</button>
                              </form>
                        </div>
                        </div>
html;
            }
      }
      

           