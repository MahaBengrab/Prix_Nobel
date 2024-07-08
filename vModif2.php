<?php

session_start();
require_once 'fonctions_Laureat.php';
require_once 'fonctions_Gagne.php';
require_once 'fonctions_Prix.php';
require_once 'foncgen.php';

// Vérifier si les identifiants ont été passés en paramètre
if(isset($_POST['id'])) {
    $id = $_POST['id'];

    // Vérifier la table sélectionnée
    if(isset($_SESSION['selected_table'])) {
        $table = $_SESSION['selected_table'];

        // Supprimer l'élément en fonction de la table sélectionnée
        switch ($table) {
            case 'laureat':
                updateLaureat($_POST);
                break;
            case 'prix':
                updatePrix($_POST);
                break;
            
        // Case 'gagne'
            case 'gagne':
            // Vérifier si les identifiants sont présents
            if(isset($_POST['laureat_id']) && isset($_POST['prix_id'])) {
            // Récupérer les données du formulaire
                $donnees = array(
                'laureat_id' => $_POST['laureat_id'],
                'prix_id' => $_POST['prix_id'],
                'prix_annee' => $_POST['prix_annee']
            );
            // Mettre à jour la table "gagne" avec les données du formulaire
            updateGagne($donnees);
            } else {
                echo "Identifiants du lauréat et/ou du prix manquants.";
            exit;
            }
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
    echo "Aucun identifiant spécifié.";
}


$pageHTML .= getFinHTML();
echo $pageHTML;















?>
