<?php

require 'connexion.php';
include "fonctions_Laureat.php";

if (isset($_POST['Envoyer'])) {
    // Récupérer les données du formulaire soumis
    $laureat = array(
        'laureat_nom' => $_POST['Nom'],
        'laureat_date_naissance' => $_POST['Date_de_naissance'],
        'laureat_sexe' => $_POST['Sexe'],
        'laureat_nationalite' => $_POST['Nationalité'],
    );

    // Insérer le laureat
    $inserted_laureat = insertIntoLaureat($laureat);

    if (isset($inserted_laureat['error'])) {
        // Gérer les erreurs d'insertion
        echo "Erreur lors de l'insertion : " . $inserted_laureat['error'];
    } else {
        // Redirection vers la page d'accueil après l'insertion
        header("Location: contenu.php");
        exit();
    }
}





?>
