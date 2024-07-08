<?php
require 'fonctions_Prix.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $Prix = array(
        "prix_id" => $_POST['id'],
        "prix_discipline" => $_POST['prix_discipline'],
        "Montant" => $_POST['Montant'],
        "prix_comite" => $_POST['prix_comite']
    );
    print_r($Prix);
    $newPrix= insertIntoPrix($Prix);
    print_r($newPrix);
    exit();
}
?>
