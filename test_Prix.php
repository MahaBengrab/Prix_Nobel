<?php
// Inclure le fichier contenant les fonctions à tester
include_once 'fonctions_Prix.php'; 


echo "<h1>Contenu des Prix:</h1>";
$pageHTML .= intoBalise("p",'Pour retourner à la page d acceuil, veuillez suivre ce lien');
$pageHTML .= '<p><a href="Acceuil.php"> Acceuil </a></p>';


echo $pageHTML;
$pahtml = "";
$pahtml.=intoBalise("p",'Pour aller au formulaire insertion du prix, veuillez suivre ce lien');
$pahtml.="<form action='insertion_Prix.php' method='post'>
        
        <input type='submit' value='Formulaire pour inserer des Prix'>
    </form>";
    echo $pahtml;


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

//Fonction de test pour getPrixById
function test_getPrixById() {
    // ID du prix à récupérer
    $prix_id = 7; 

    // Appel de la fonction pour récupérer les détails du prix
    $result = getPrixById($prix_id);

    // Vérification si des données ont été retournées
    if (empty($result)) {
        // Afficher un message si aucun prix n'a été trouvé avec cet ID
        echo "Aucun prix trouvé avec l'ID : $prix_id";
    } else {
        // Afficher les détails du prix
        echo "Détails du prix avec l'ID $prix_id : <br>";
        
        echo "prix_discipline : " . $result['prix_discipline'] . "<br>";
        echo "prix_montant : " . $result['prix_montant'] . "<br>";
        echo "prix_comite : " . $result['prix_comite'] . "<br>";
        // Affichez d'autres champs du prix si nécessaire
    }
}



//Fonction de test pour getAllPrix

function test_getAllPrix($prix_id) {
    // Appel de la fonction pour récupérer les données liées au prix spécifié
    $prixData = getAllPrix($prix_id);
     
    // Vérification si des données ont été trouvées
    if (!empty($prixData)) {
        // Affichage des données récupérées
        foreach ($prixData as $row) {
            echo "ID du Laureat : " . $row['laureat_id'] . "<br>";
            echo "Nom : " . $row['laureat_nom'] . "<br>";
            echo "Date de Naissance : " . $row['laureat_date_naissance'] . "<br>";
            echo "Sexe : " . $row['laureat_sexe'] . "<br>";
            echo "Nationalité : " . $row['laureat_nationalite'] . "<br>";
            echo "<hr>";
        }
    } else {
        echo "Aucun lauréat trouvé pour ce prix.";
    }
}

//Fonction de test pour l'insertion du prix 



function test_insertIntoPrix($prixData) {
    // Vérifie si $prixData est null ou non
    if ($prixData === null) {
        echo "Erreur : Les données du prix sont manquantes.";
        return; // Arrête l'exécution de la fonction si les données sont manquantes
    }
    
    // Appel de la fonction pour insérer les données dans la table Prix
    $result = insertIntoPrix($prixData);
    
    // Vérification si l'insertion a réussi
    if (isset($result['prix_id'])) {
        // Affichage de l'ID du prix inséré en cas de succès
        echo "Nouveau prix inséré avec succès. ID: " . $result['prix_id'];
    } else {
        // Affichage du message d'erreur en cas d'échec de l'insertion
        echo $result['error'];
    }
}




// Fonction de test pour updateprix
function test_updatePrix() {
    $prix = array(
        'prix_id' => 1, 
        'prix_discipline' => 'Paix', 
        'prix_montant' => 920000, 
        'prix_comite' => 'Comite Nobel norvegien' 
    );
    updatePrix($prix);
    echo "Prix mis à jour avec succès.<br>";
}


// Fonction de test pour deleteprix
function test_deletePrix() {
    $prix_id = 1; 
    deletePrix($prix_id);
    echo "Prix supprimé avec succès.<br>";
    echo "Les lauréats gagnants du prix ont aussi été supprimés avec succès.<br>";
}



function afficherTableauAvecActions(array $donnees): string {
    // Entête du tableau
    $html = '<table border="2">';
    $html .= '<tr>';
    $html .= '<th>prix_id</th>';
    $html .= '<th>Discipline</th>';
    $html .= '<th>Montant</th>';
    $html .= '<th>Comité</th>';
    $html .= '<th>Actions</th>';
    $html .= '</tr>';

    // Corps du tableau (données de la base de données)
    foreach ($donnees as $ligne) {
        $html .= '<tr>';
        foreach ($ligne as $valeur) {
            $html .= "<td>$valeur</td>";
        }
        // Ajout des boutons Modifier et Supprimer
        $id = $ligne['prix_id'];
        $html .= "<td>
                    <form method='POST' action=''>
                        <input type='hidden' name='id' value='$id'>
                        <button type='submit' name='action' value='modifier'>Modifier</button>
                    </form>
                    <form method='POST' action=''>
                        <input type='hidden' name='id' value='$id'>
                        <button type='submit' name='action' value='supprimer'>Supprimer</button>
                    </form>
                </td>";
        $html .= '</tr>';
    }

    // Fin du tableau
    $html .= '</table>';

    return $html;
}

// Traitement des actions de modification et de suppression
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["action"] == "modifier") {
        // Appel de la méthode pour modifier le laureat
        updateLaureat($_POST["id"]);
    } elseif ($_POST["action"] == "supprimer") {
        // Appel de la méthode pour supprimer le laureat
        deleteLaureat($_POST["id"]);
    }
}


$tableau_html = afficherTableauAvecActions($donnees);

// Affichage du tableau HTML
echo $tableau_html;




// Appel de la fonction principale de test
function test_all_functions() {
    // Test de getDebutHTML
    echo "<h2>Test de la fonction getDebutHTML :</h2>";
    test_getDebutHTML();

    // Test de getFinHTML
    echo "<h2>Test de la fonction getFinHTML :</h2>";
    test_getFinHTML();

    // Test de getPrixById
    echo "<h2>Test de la fonction getPrixById :</h2>";
    test_getPrixById();
    
    // Test de getAllPrix
    echo "<h2>Test de la fonction getAllPrix :</h2>";
    test_getAllPrix(3);

    // Test de insertIntoPrix
    echo "<h2>Test de la fonction insertIntoPrix :</h2>";
    test_insertIntoPrix($prixData);

    // Test de updatePrix
    echo "<h2>Test de la fonction updatePrix :</h2>";
    test_updatePrix();

    // Test de deletePrix
    echo "<h2>Test de la fonction deletePrix :</h2>";
    test_deletePrix();

}

// Appel de la fonction principale de test
test_all_functions();
?>
