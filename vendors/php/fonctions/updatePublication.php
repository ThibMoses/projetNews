<?php
	$categorie = "";
      $title = "";
      $content = "";
      $media = "";
      $cible = "";
      $id="";
      foreach($pub as $value){
            $id = $value["id"];
            $categorie = $value["categorie"];
            $title = $value["title"];
            $content = $value["content"];
            $media = $value["media"];
            $cible = $value["cible"];
      }
?>