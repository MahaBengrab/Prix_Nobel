<?php
// Inclure les fichiers nécessaires
require 'fonctions_Gagne.php';
require_once 'foncgen.php';

// Début du formulaire
$pageHTML = getDebutHTML("Insertion d'un élément dans la table");
$pageHTML .= "<form action='traitGagne.php' method='POST'>";
$pageHTML .= intoBalise("p", 'Formulaire d\'insertion');

// Champs pour le laureat_id et le prix_id
$pageHTML .= "<label>Laureat ID: <input type='text' name='laureat_id' required></label><br>";
$pageHTML .= "<label>Prix ID: <input type='text' name='prix_id' required></label><br>";

// Autres champs
$pageHTML .= "<label>Année: <input type='text' name='prix_annee' required></label><br>";

// Bouton d'envoi
$pageHTML .= "<label><input type='submit' name='Envoyer' value='Envoyer' /></label>";

// Fin du formulaire
$pageHTML .= "</form>";

$pageHTML .= getFinHTML();
echo $pageHTML;
?>
