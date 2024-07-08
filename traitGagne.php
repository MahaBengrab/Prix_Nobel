<?php
require 'fonctions_Gagne.php';

if(isset($_POST['laureat_id'], $_POST['prix_id'], $_POST['prix_annee'])) {
    $laureat_id = $_POST['laureat_id'];
    $prix_id = $_POST['prix_id'];
    $prix_annee = $_POST['prix_annee'];

    // Création du tableau de données à insérer
    $gagneData = array(
        "laureat_id" => $laureat_id,
        "prix_id" => $prix_id,
        "prix_annee" => $prix_annee
    );

    // Appeler la fonction d'insertion dans la table 'gagne'
    $result = insertIntoGagne($gagneData);

    if(isset($result['error'])) {
        echo "Erreur lors de l'insertion : " . $result['error'];
    } else {
        echo "Insertion réussie dans la table 'gagne'.";
        header("Location: contenu.php");
        exit();

    }
} else {
    echo "Veuillez remplir tous les champs du formulaire.";
}
?>
