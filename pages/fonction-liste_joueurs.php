<?php
/*function getDate($file="liste_joueurs"){
 $data=file_get_contents("./data/".$file.".php");
 $data=json_decode($data,true);
 return $data;
}*/
$file='liste_joueurs.json';
$data=file_get_contents($file);
$obj=json_decode($data);
$json=file_get_contents("liste_joueurs.json");
var_dump(json_decode($json));
?>