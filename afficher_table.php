<?php

// Vérifie si des données ont été soumises
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si le champ 'table' existe dans les données postées
    if (isset($_POST['table'])) {
        // Récupère le nom de la table choisie
        $table = $_POST['table'];

        // Démarre la session
        session_start();

        // Stocke le nom de la table dans une variable de session
        $_SESSION['selected_table'] = $_POST['table'];

        // Redirige l'utilisateur vers la page appropriée
        header("Location: contenu.php");
        exit();
    }
}

?>