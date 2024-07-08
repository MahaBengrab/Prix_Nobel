<?php
require 'fonctions_Laureat.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $Laureat = array(
        "laureat_id" => $_POST['id'],
        "laureat_nom" => $_POST['nom'],
        "laureat_date_naissance" => $_POST['date_naissance'],
        "laureat_sexe" => $_POST['sexe'],
        "laureat_nationalite" => $_POST['nationalite']
    );
    print_r($Laureat);
    $newLaureat= insertIntoLaureat($Laureat);
    print_r($newLaureat);
    exit();
}
