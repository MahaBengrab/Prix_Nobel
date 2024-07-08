<?php
//require 'connexion.php';
include "fonctions_Prix.php";
require_once 'foncgen.php';

$pageHTML = getDebutHTML("Insertion d'un élément dans la table");
$pageHTML .= "<form action='traitprix.php' method='POST'>";
$pageHTML .= intoBalise("p", 'Formulaire d\'insertion');

// Champ pour le nom
$pageHTML .= "<label>Discipline <input type='text' name='Discipline'></label><br>";
$pageHTML .= "<label>Montant <input type='text' name='Montant'></label><br>";
$pageHTML .= "<label>comite <input type='text' name='comite'></label><br>";



$pageHTML .= "<label><input type='submit' name='Envoyer' value='Envoyer' /></label>
</form>";

$pageHTML .= getFinHTML();
echo $pageHTML;




?>


