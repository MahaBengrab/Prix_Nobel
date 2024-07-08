<?php



include 'fonctions_Laureat.php';

// Vérifier si les données du formulaire sont envoyées
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    //$id = $_POST['id'];
    $laureat_nom = $_POST['laureat_nom'];
    $laureat_date_naissance = $_POST['laureat_date_naissance'];
    $laureat_sexe = $_POST['laureat_sexe'];
    $laureat_nationalite = $_POST['laureat_nationalite'];
    // Récupérer les autres champs ici...

    // Mettre à jour le Laureat
    updateLaureat($id, $laureat_nom,$laureat_date_naissance,$laureat_sexe,$laureat_nationalite);
    // Rediriger vers la page de contenu
    header("Location: fonctions_Laureat.php?table=Laureat");
    exit();
} else {
    echo "Méthode non autorisée pour accéder à cette page.";
}
?>


