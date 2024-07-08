<?php
require_once 'foncgen.php';
require 'connexion.php';

session_start();

// Vérifier si une table est sélectionnée
if (isset($_SESSION['selected_table'])) {
    $table = $_SESSION['selected_table'];

    // Déterminer la clé primaire de la table
    switch ($table) {
        case 'laureat':
            $primary_key = 'laureat_id';
            break;
        case 'prix':
            $primary_key = 'prix_id';
            break;
        case 'gagne':
            // Clés primaires des tables laureat et prix
            $primary_key_1 = 'laureat_id';
            $primary_key_2 = 'prix_id';
            
            break;
        default:
            echo "Table non reconnue.";
            exit; // Sortir du script si la table n'est pas reconnue
            break;
    }
    $pageHTML = getDebutHTML("La table $table");
    // Sélectionner toutes les lignes de la table

    $query = "SELECT * FROM $table";
    $result = pg_query($ptrDB, $query);

    if ($result) {
        if (pg_num_rows($result) > 0) {
            echo "<h2>Contenu de la table $table :</h2>";
            echo "<a class='box' href='forminser.php'>Ajouter un élément</a>";
            echo "<table border='1'>";
            // En-têtes de colonnes
            echo "<tr>";
            foreach (pg_fetch_assoc($result) as $key => $value) {
                echo "<th>$key</th>";
            }
            echo "<th>Modifier</th>"; // Colonne pour la modification
            echo "<th>Supprimer</th>"; // Colonne pour la suppression
            echo "<th>Détail</th>"; // Colonne pour le détail // Colonne pour les actions
            echo "</tr>";

            // Afficher les données
            while ($row = pg_fetch_assoc($result)) {
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>$value</td>";
                }
                

                // Boutons Modifier, Supprimer et Détail
                echo "<td>";
                if(isset($primary_key_1) && isset($primary_key_2)) {
                    $composite_id = $row[$primary_key_1] . "_" . $row[$primary_key_2];
                    echo "<div class='box'><a class='modifier' href='vModif1.php?table=$table&id=$composite_id'>Modifier</a></div>";
                } elseif(isset($primary_key)) {
                    echo "<div class='box'><a class='modifier' href='vModif1.php?table=$table&id=" . $row[$primary_key] . "'>Modifier</a></div>";
                }
                echo "</td>";

                echo "<td>";
                if(isset($primary_key_1) && isset($primary_key_2)) {
                    $composite_id = $row[$primary_key_1] . "_" . $row[$primary_key_2];
                    echo "<a class='box' href='vSup0.php?table=$table&id=$composite_id'>Supprimer</a>";
                } elseif(isset($primary_key)) {
                    echo "<a class='box' href='vSup0.php?table=$table&id=" . $row[$primary_key] . "'>Supprimer</a>";
                }
                echo "</td>";

                echo "<td>";
                echo "<form action='det.php' method='post'>";
                echo "<input type='hidden' name='detail' value='" . json_encode($row) . "'>";
                echo "<input class='box' type='submit' value='Détail'>";
                echo "</form>";
                echo "</td>";

                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "La table est vide.";
        }
    } else {
        echo "Erreur lors de l'exécution de la requête : " . pg_last_error($ptrDB);
    }

    // Lien pour accéder au formulaire d'insertion
    
    echo "<a class='box' href='acceuil01.php'>Page d'acceuil</a>";

    // Fermer la connexion à la base de données
} else {
    echo "Aucune table sélectionnée.";
}


$pageHTML .= getFinHTML();
echo $pageHTML;



?>
