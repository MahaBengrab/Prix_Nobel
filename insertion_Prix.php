<?php
require 'fonctions_Prix.php';
?>
<!doctype html>
<html lang="fr" xmlns:text-decoration="http://www.w3.org/1999/xhtml"
      xmlns:background-color="http://www.w3.org/1999/xhtml" xmlns:text-align="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <title>Insertion table Prix</title>

    <link rel="icon" href="/Users/33669/Desktop/phpproj/nobel-prize.jpg">

    <link rel="stylesheet" type="text/css" href="insertion_table.css">
</head>
<body>
<h2 style="margin:1% 10%; border:solid thick silver; text-align:center;">Formulaire d'Insertion de la table prix</h2>

<form action="inserer_Prix.php" method="POST">

<label for="Id">Id :</label>
    <input type="text" id="Id" name="id" placeholder="Entrez l'id" required><br><br>

    <label for="prix_discipline">prix_discipline :</label>
    <select id="prix_discipline" name="prix_discipline" required>
        <option value="" disabled selected>Choisissez une discipline</option>
        <option value="Paix">Paix</option>
        <option value="Physique">Physique</option>
        <option value="Chimie">Chimie</option>
        <option value="Litterature">Litterature</option>
        <option value="Physiologie ou medecine">Physiologie ou medecine</option>
        <option value="Economie">Economie</option>

    </select><br><br>

    <label for="Montant">Montant :</label>
    <input type="text" id="Montant" name="Montant" placeholder="Entrez le montant" required><br><br>

    <label for="prix_comite">prix_comite :</label>
    <select id="prix_comite" name="prix_comite" required>
        <option value="" disabled selected>Choisissez une comite</option>
        <option value="Comite Nobel norvegien">Comite Nobel norvegien</option>
        <option value="Academie royale des sciences de Suede">Academie royale des sciences de Suede</option>
        <option value="Academie suedoise">Academie suedoise</option>
        <option value="Institut Karolinska">Institut Karolinska</option>

    </select><br><br>


    <button type="submit" class="btn btn-primary btn-block">Inserer</button>
</form>

</body>
</html>