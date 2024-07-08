<?php
session_start();
require 'connexion.php';
include "fonctions_Gagne.php";

if(isset($_POST['id'])) {
    $id = $_POST['id'];

    // Mettre à jour l'élément dans la table Gagne
    updateGagne($_POST);

    // Rediriger vers la page précédente
    header("Location: contenu.php");
    exit;
} else {
    echo "Aucun identifiant spécifié.";
}
?>
