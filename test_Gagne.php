<?php
// Inclure le fichier contenant les fonctions à tester
include 'fonctions_Gagne.php'; 

// Fonction de test pour getDebutHTML
function test_getDebutHTML() {
    $debutHtml = getDebutHTML();
    echo "Début du document HTML. $debutHtml<br>";
}

// Fonction de test pour getFinHTML
function test_getFinHTML() {
    $finHtml = getFinHTML();
    echo "Fin du document HTML. $finHtml<br>";
}

// Fonction de test pour getGagneById
function test_getGagneById() {
    $laureat_id = 1; 
    $prix_id = 1; 
    $prix_annee = 2023; 
    $gagne = getGagneById($laureat_id, $prix_id, $prix_annee);
    echo "Résultat de la fonction getGagneById pour le lauréat ID $laureat_id, le prix ID $prix_id, et l'année $prix_annee :<br>";
    var_dump($gagne);
    echo "<br>";
}



//Fonction de test pour getAllByGagne

function test_getAllByGagne() {
    // Appel de la fonction pour récupérer tous les lauréats avec les prix qu'ils ont gagnés
    $result = getAllByGagne();

    // Vérifier si des données ont été retournées
    if (empty($result)) {
        // Afficher un message d'erreur si aucune donnée n'est retournée
        echo "Aucun lauréat avec des prix gagnés n'a été trouvé.";
    } else {
        // Afficher les données des lauréats avec les prix gagnés
        foreach ($result as $row) {
            echo "ID : " . $row['laureat_id'] . ", Nom : " . $row['laureat_nom'] . ", Date de naissance : " . $row['laureat_date_naissance'] . ", Sexe : " . $row['laureat_sexe'] . ", Nationalité : " . $row['laureat_nationalite'] . "<br>";
        }
    }
}


//Fonction de test de l'insertion
function test_insertIntoGagne() {
    // Données de test pour l'insertion dans la table 'gagne'
    $gagneData = array('5', '2', '2023'); // Exemple de données :  prix_id= 3, laureat_id = 2, prix_annee = 2023

    // Appel de la fonction pour insérer les données
    $result = insertIntoGagne($gagneData);

    // Vérification si l'insertion s'est effectuée avec succès
    if (isset($result['error'])) {
        // Afficher un message d'erreur si l'insertion a échoué
        echo $result['error'];
    } else {
        // Afficher les données insérées en cas de succès
        echo "Données insérées avec succès : <br>";
        echo "Prix ID : " . $result['prix_id'] . "<br>";
        echo "Laureat ID : " . $result['laureat_id'] . "<br>";
        echo "Prix Année : " . $result['prix_annee'] . "<br>";
    }
}




// Fonction de test pour deleteGagneLaureat
function test_deleteGagneLaureat() {
    $laureat_id = 1; 
    deleteGagneLaureat($laureat_id);
    echo "Les prix gagnés par le laureat ont été supprimés avec succès.<br>";
}

// Fonction de test pour deleteGagnePrix
function test_deleteGagnePrix() {
    $prix_id = 1; 
    deleteGagnePrix($prix_id);
    echo "Les lauréats gagnants du prix ont été supprimés avec succès.<br>";
}


// Appel de la fonction principale de test
function test_all_functions() {
    // Test de getDebutHTML
    echo "<h2>Test de la fonction getDebutHTML :</h2>";
    test_getDebutHTML();

    // Test de getFinHTML
    echo "<h2>Test de la fonction getFinHTML :</h2>";
    test_getFinHTML();

    // Test de getGagneById
    echo "<h2>Test de la fonction getGagneById :</h2>";
    test_getGagneById();

    // Test de getGagneById
    echo "<h2>Test de la fonction getAllByGagne :</h2>";
    test_getAllByGagne();

    // Test de getGagneById
    echo "<h2>Test de la fonction insertIntoGagne :</h2>";
    test_insertIntoGagne();


    echo "<h2>Test de la fonction deleteGagneLaureat :</h2>";
    test_deleteGagneLaureat();

    echo "<h2>Test de la fonction deleteGagnePrix :</h2>";
    test_deleteGagnePrix();
}

// Appel de la fonction principale de test
test_all_functions();
?>