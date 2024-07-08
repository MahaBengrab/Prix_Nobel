<?php
require 'connexion.php';
include "fonctions_Laureat.php";

$pageHTML = getDebutHTML("Insertion d'un élément dans la table");
$pageHTML .= "<form action='traitement_insertion.php' method='POST'>";
$pageHTML .= intoBalise("p", 'Formulaire d\'insertion');

// Champ pour le nom
$pageHTML .= "<label>Nom: <input type='text' name='Nom'></label><br>";

// Champ pour la date de naissance
$pageHTML .= "<label>Date de naissance: <input type='date' name='Date_de_naissance'></label><br>";

// Champ pour la nationalité
$pageHTML .= "<label>Nationalité: <input type='text' name='Nationalité'></label><br>";

// Champ pour le sexe
$pageHTML .= "<label>Sexe: 
    <select name='Sexe'>
        <option value='Homme'>Homme</option>
        <option value='Femme'>Femme</option>
    </select>
</label><br>";

$pageHTML .= "<label><input type='submit' name='Envoyer' value='Envoyer' /></label>
</form>";

$pageHTML .= getFinHTML();
echo $pageHTML;




?>


