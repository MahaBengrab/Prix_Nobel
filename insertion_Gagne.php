<?php 
    require 'fonctions_Gagne.php';
?>
<!doctype html>
<html lang="fr" xmlns:text-decoration="http://www.w3.org/1999/xhtml"
      xmlns:background-color="http://www.w3.org/1999/xhtml" xmlns:text-align="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <title>Insertion table Gagne</title>

    <link rel="icon" href="/Users/33669/Desktop/phpproj/nobel-prize.jpg">

    <link rel="stylesheet" type="text/css" href="insertion_table.css">
</head>
<body>
<h2 style="margin:1% 10%; border:solid thick silver; text-align:center;">Formulaire d'Insertion de la table Gagne</h2>

<form action="inserer_Gagne.php" method="POST">
    <label for="prix_discipline">prix_discipline :</label>
    <select id="prix_discipline" name="prix_discipline" required>
        <option value=" disabled selected">Choisissez une discipline</option>
        <option value="Paix">Paix</option>
        <option value="Physique">Physique</option>
        <option value="Chimie">Chimie</option>
        <option value="Litterature">Litterature</option>
        <option value="Physiologie ou medecine">Physiologie ou medecine</option>
        <option value="Economie">Economie</option>

    </select><br><br>

    <label for="Laureat_nom">Laureat_nom :</label>
    <input type="text" id="Laureat_nom" name="Laureat_name" placeholder="Entrez le nom du laureat" required><br><br>

    <label for="Prix_année">Prix_année :</label>
    <input type="text" id="Prix_année" name="Prix_annee"  placeholder="Veuiller saisir une année" required><br><br>


    <button type="submit" class="btn btn-primary btn-block">Inserer</button>
</form>

</body>
</html>

