<?php
session_start();
require_once 'fonctions_Laureat.php';
require_once 'fonctions_Gagne.php';
require_once 'fonctions_Prix.php';

// Vérifier si l'identifiant a été passé en paramètre
if(isset($_GET['id'])) {
    $composite_id = $_GET['id'];
    $ids = explode("_", $composite_id);

    // Vérifier la table sélectionnée
    if(isset($_GET['table'])) {
        $table = $_GET['table'];

        // Supprimer l'élément en fonction de la table sélectionnée
        switch ($table) {
            case 'laureat':
                deleteLaureat($ids[0]);
                break;
            case 'prix':
                deletePrix($ids[0]);
                break;
            case 'gagne':
                deleteGagne($ids[0], $ids[1]);
                break;
            default:
                echo "Table non reconnue : $table";
                break;
        }

        // Rediriger vers la page précédente
        header("Location: contenu.php");
        exit;
    } else {
        echo "Aucune table sélectionnée.";
    }
} else {
    echo "Identifiant manquant.";
}



?>
