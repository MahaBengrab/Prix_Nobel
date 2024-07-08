<?php

require 'connexion.php';
include "fonctions_Prix.php";

if (isset($_POST['Envoyer'])) {
    // Récupérer les données du formulaire soumis
    $laureat = array(
        'prix_discipline' => $_POST['Discipline'],
        'prix_montant' => $_POST['Montant'],
        'prix_comite' => $_POST['comite'],
        
    );

    // Insérer le laureat
    $inserted_prix = insertIntoPrix($laureat);

    if (isset($inserted_prix['error'])) {
        // Gérer les erreurs d'insertion
        echo "Erreur lors de l'insertion : " . $inserted_prix['error'];
    } else {
        // Redirection vers la page d'accueil après l'insertion
        header("Location: contenu.php");
        exit();
    }
}





?>
