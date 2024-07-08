<?php
/*require 'fonctions_Laureat.php';*/
include_once 'fonctions_Laureat.php';
?>
<!doctype html>
<html lang="fr" xmlns:text-decoration="http://www.w3.org/1999/xhtml"
      xmlns:background-color="http://www.w3.org/1999/xhtml" xmlns:text-align="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <title>Insertion table Laureat</title>

    <link rel="icon" href="/Users/33669/Desktop/phpproj/nobel-prize.jpg">

    <link rel="stylesheet" type="text/css" href="insertion_table.css">
</head>
<body>
<h2 style="margin:1% 10%; border:solid thick silver; text-align:center;">Formulaire d'Insertion</h2>

<form action="inserer_Laureat.php" method="POST">

    <label for="id" >id :</label><br>
    <input type="text" id="id" name="id" placeholder="Entrez l'id" required><br><br>
    <label for="nom" >Nom et Prénom :</label><br>
    <input type="text" id="nom" name="nom" placeholder="Entrez le nom et le prénom" required><br><br>

    <div class="form-group">
        <label for="date_naissance">Date de naissance :</label>
        <input type="date" class="form-control" id="date_naissance" name="date_naissance" required>
    </div>


    <label>Sexe :</label>
    <label>
        <input type="radio" id="homme" name="sexe" value="H" required>
        <label for="homme" class="radio-label">Homme</label>
    </label>

    <label>
        <input type="radio" id="femme" name="sexe" value="F" required>
        <label for="femme" class="radio-label">Femme</label>
    </label>
    <label for="nationalite">Nationalité :</label>
    <input type="text" id="nationalite" name="nationalite" placeholder="Entrez la nationalité" required><br><br>

    <button type="submit" class="btn btn-primary btn-block">Envoyer</button>
</form>

</body>
</html>