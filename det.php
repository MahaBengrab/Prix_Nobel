<?php

require_once 'foncgen.php';
$pageHTML = getDebutHTML("Les détails ");

if(isset($_POST['detail'])) {
    $row = json_decode($_POST['detail'], true);

    // Afficher les détails de $row ici
    echo "<div class='details-box'>";
    echo "<h2>Détails de l'élément</h2>";
    echo "<div class='details-content'>";
    foreach ($row as $key => $value) {
        echo "<div><strong>$key</strong>: $value</div>";
    }
    echo "</div>"; // Fermeture de la balise div.details-content
    echo "</div>"; // Fermeture de la balise div.details-box
} else {
    echo "Aucun détail spécifié.";
}
echo "<a class='box' href='contenu.php'>Revenir a la table</a>";
$pageHTML .= getFinHTML();
echo $pageHTML;

?>
