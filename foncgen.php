<?php
require 'monEnv.php';
function connexion(){
    $strConnex = 'host='.$_ENV['dbHost'].' dbname='.$_ENV['dbName'].' user='.$_ENV['dbUser'].' password='.$_ENV['dbPassword'];
    $ptrDB = pg_connect($strConnex);
    return $ptrDB;
} 



function intoBalise(string $nomElement, string $contenuElement,
                    array $params = null) : string {
    $resu = "<$nomElement "; // amorce la construction de la balise ouvrante
    if (isset($params)) { // traite le 3e parametre s'il existe
        foreach ($params as $attribut => $valeur)
            $resu .= $attribut."='$valeur' "; // construit les attributs de la balise HTML
    }
    if ($contenuElement==='')
        $resu .=' />'; // ferme la balise s'il s'agit d'un élément vide
    else
        $resu .= ">$contenuElement</$nomElement>"; // termine la balise ouvrante, intègre le contenu et ferme la balise
    return $resu; // retourne la chaine de caractères construite
}


// La fonction du début du document HTML 
function getDebutHTML(string $title = "Title content"): string{
    return '<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Prix Nobel </title>
<!--  <link rel="stylesheet" href="style.css"> -->
<!--  <script src="script.js"></script> -->
<link rel="stylesheet" type="text/css" href="table.css">
<link rel="icon" type="image/jpg" href="prixnob.jpg">
</head>
<body>';
} 

// La fonction de la fin du document HTML
function getFinHTML(): string {
    return '</body></html>';
}
?>