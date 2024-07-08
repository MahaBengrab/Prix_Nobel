
<?php
require_once 'foncgen.php';
echo getDebutHTML("Sélection de la table");
//echo "<div class='container'>"; // Début du conteneur centré
echo "<form action='afficher_table.php' method='post'>";
echo intoBalise("p", 'Choisissez la table');

// Liste déroulante pour choisir la table
echo "<label>Table : 
<select name='table'>
    <option value='laureat'>Laureat</option>
    <option value='prix'>Prix</option>
    <option value='gagne'>Gagne</option>
</select>
</label><br>";

// Bouton de soumission du formulaire
echo "<input type='submit' name='submit' value='Choisir'>";
echo "</form>";
//echo "</div>"; // Fin du conteneur centré
echo getFinHTML();
?>