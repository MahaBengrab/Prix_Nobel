<?php
// Inclure les fichiers nécessaires et démarrer la session
require 'connexion.php';
session_start();

// Vérifier si une table est sélectionnée
if (isset($_SESSION['selected_table'])) {
    $table = $_SESSION['selected_table'];

    // Afficher le formulaire d'insertion correspondant à la table sélectionnée
    switch ($table) {
        case 'laureat':
            include 'forminse_laureat.php'; // Inclure le formulaire d'insertion pour la table laureat
            break;
        case 'gagne':
            include 'forminser_gagne.php'; // Inclure le formulaire d'insertion pour la table gagne
            break;
        case 'prix':
            include 'forminse_prix.php'; // Inclure le formulaire d'insertion pour la table prix
            break;
        default:
            echo "Table non reconnue.";
            break;
    }
} else {
    echo "Aucune table sélectionnée.";
}
echo "<a class='box' href='contenu.php'>Revenir a la table</a>";
?>
