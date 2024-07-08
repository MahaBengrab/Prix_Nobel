<?php
require_once 'fonctions_Laureat.php';
require_once 'fonctions_Prix.php';
require_once 'fonctions_Gagne.php';
require_once 'connexion.php';
session_start();

// Vérifier si un identifiant et une table ont été passés en paramètre
if(isset($_GET['table']) && isset($_GET['id'])) {
    $table = $_GET['table'];
    $composite_id = $_GET['id'];

    // Récupérer les données de la table à modifier
    switch ($table) {
        case 'laureat':
            require_once 'fonctions_Laureat.php';
            $donnees = getLaureatById($composite_id);
            break;
        case 'prix':
            require_once 'fonctions_Prix.php';
            $donnees = getPrixById($composite_id);
            break;
        case 'gagne':
            // La table gagne a une clé composite, donc nous devons obtenir les deux identifiants
            list($id1, $id2) = explode("_", $composite_id);
            require_once 'fonctions_Gagne.php';
            $donnees = getGagneById($id1, $id2);
            break;
        default:
            // Si la table n'est pas reconnue, afficher un message d'erreur
            echo "Table non valide : $table";
            exit;
    }

    // Vérifier si les données ont été récupérées avec succès
    if($donnees) {
        // Afficher le formulaire de modification pour la table spécifiée
        echo getDebutHTML("Modification d'un élément");
        echo "<form action='vModif2.php' method='POST'>";
        echo intoBalise("p", 'Formulaire de modification');
        echo "<input type='hidden' name='table' value='" . $table . "'>";
        echo "<input type='hidden' name='id' value='" . $composite_id . "'>";
        
        // Afficher les champs du formulaire en fonction des données récupérées
        foreach ($donnees as $key => $value) {
            echo "<label>$key : <input type='text' name='$key' value='$value'></label><br>";
        }

        echo "<label><input type='submit' name='Modifier' value='Modifier'></label>";
        echo "</form>";
        echo getFinHTML();
    } else {
        // Si les données n'ont pas été trouvées, afficher un message d'erreur
        echo "Erreur : Les données de la table '$table' n'ont pas été trouvées.";
    }
} else {
    // Si aucun identifiant et/ou aucune table n'ont été passés, afficher un message d'erreur
    echo "Identifiants manquants dans l'URL.";
}
echo "<a class='box' href='contenu.php'>Revenir a la table</a>";

?>