<?php
require 'fonctions_Gagne.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $Gagne = array(
        "prix_discipline" => $_POST['prix_discipline'],
        "Laureat_nom" => $_POST['Laureat_name'],
        "Prix_année" => $_POST['Prix_annee'],
    );
    print_r($Gagne);
    $newGagne= insertIntoGagne($Gagne);
    print_r($newGagne);
    exit();
}
?>
