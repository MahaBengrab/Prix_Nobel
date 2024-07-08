<?php
// Inclure le fichier contenant les fonctions à tester
//include 'fonctions_Laureat.php'; 
include_once 'fonctions_Laureat.php';

echo "<h1>Contenu des laureats:</h1>";
$pageHTML .= intoBalise("p",'Pour retourner à la page d acceuil, veuillez suivre ce lien');
$pageHTML .= '<p><a href="acceuil01.html"> Acceuil </a></p>';


echo $pageHTML;
$pahtml = "";
$pahtml.=intoBalise("p",'Pour aller au formulaire insertion_Laureat, veuillez suivre ce lien');
$pahtml.="<form action='insertion_Laureat.php' method='post'>
        <!-- Bouton pour soumettre le formulaire et rediriger vers une autre page -->
        <input type='submit' value='Formulaire pour inserer des laureats'>
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

// Fonction de test pour getLaureatById
/*function test_getLaureatById() {
    $laureatId = 3; 
    $laureat = getLaureatById($laureatId);
    echo "Résultat de la fonction getLaureatById pour l'ID $laureatId :<br>";
    var_dump($laureat);
    echo "<br>";
}*/
// Fonction de test pour getLaureatById
// Fonction de test pour getLaureatById
function test_getLaureatById() {
    // Définir manuellement un identifiant de laureat valide
    $laureat_id = 3; 
    
    // Appeler la fonction getLaureatById avec l'identifiant défini
    $laureat = getLaureatById($laureat_id);
    
    // Afficher le résultat de la fonction
    echo "Résultat de la fonction getLaureatById pour l'ID $laureat_id :<br>";
    var_dump($laureat);
    echo "<br>";
}



//Fonction de test pour getAllLaureat 

function test_getAllLaureat() {
    // Appel de la fonction pour récupérer tous les lauréats
    $laureats = getAllLaureat();

    // Vérification si des lauréats ont été trouvés
    if (!empty($laureats)) {
        // Affichage du tableau de tous les lauréats
        foreach ($laureats as $row) {
            echo $row;
        }
    } else {
        echo "Aucun lauréat trouvé.";
    }
}


//Fonction de test pour l'insertion du Laureat

function test_insertIntoLaureat() {
    // Données de test pour un nouveau lauréat
    $Laureat = array("10","Jack", "1960-10-15", "H","française");

    // Appel de la fonction pour insérer un nouveau lauréat
    $result = insertIntoLaureat($Laureat);

    // Vérification si l'insertion a réussi
    if (isset($result['message'])) {
        // Afficher un message d'erreur en cas d'échec de l'insertion
        echo $result['message'];
    } else {
        // Afficher l'ID du nouveau lauréat en cas de succès
        echo "Nouveau lauréat inséré avec succès. ID : " . $Laureat[0];
    }
}




//Fonction de test pour updateLaureat
function test_updateLaureat() {
    $laureat = array(
        'laureat_id' => 1, // Remplacez 1 par l'ID du lauréat que vous souhaitez mettre à jour
        'laureat_nom' => 'Nom mis à jour', // Nouveau nom du lauréat
        'laureat_date_naissance' => '2000-01-01', // Nouvelle date de naissance du lauréat
        'laureat_sexe' => 'H', // Nouveau sexe du lauréat
        'laureat_nationalite' => 'Française' // Nouvelle nationalité du lauréat
    );
    updateLaureat($laureat);
    
    echo "Laureat mis à jour avec succès.<br>";
}




// Fonction de test pour deleteLaureat
function test_deleteLaureat() {
    $laureat_id = 2;
    deleteLaureat($laureat_id);
    echo "Laureat supprimé avec succès.<br>";
    echo "Les prix gagnés par le lauréat ont aussi été supprimés avec succès.<br>";
}

/*function afficherTableauAvecActions(array $donnees): string {
    // Entête du tableau
    $html = '<table border="2">';
    $html .= '<tr>';
    $html .= '<th>Laureat_Id</th>';
    $html .= '<th>Nom</th>';
    $html .= '<th>Date de naissance</th>';
    $html .= '<th>Nationalité</th>';
    $html .= '<th>Sexe</th>';
    $html .= '<th>Actions</th>';
    $html .= '</tr>';

    // Corps du tableau (données de la base de données)
    foreach ($donnees as $ligne) {
        $html .= '<tr>';
        foreach ($ligne as $valeur) {
            $html .= "<td>$valeur</td>";
        }
        // Ajout des boutons Modifier et Supprimer
        $id = $ligne['laureat_id'];
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
*/


// Appel de la fonction principale de test
function test_all_functions() {
    // Test de getDebutHTML
    echo "<h2>GetDebutHTML :</h2>";
    test_getDebutHTML();

    // Test de getFinHTML
    echo "<h2>GetFinHTML :</h2>";
    test_getFinHTML();

    // Test de getLaureatById
    $laureat_id = 3;
    echo "<h2>GetLaureatById :</h2>";
    test_getLaureatById($laureat_id);

    // Test de getAllLaureat

    echo "<h2>Test de la fonction test_getAllLaureat :</h2>";
    test_getAllLaureat();

    echo "<h2>Test de la fonction test_insertIntoLaureat :</h2>";
    test_insertIntoLaureat();
    
    //Test de updateLaureat
    echo "<h2>UpdateLaureat :</h2>";
    test_updateLaureat();
      
    //Test de deleteLaureat
    echo "<h2>DeleteLaureat :</h2>";
    test_deleteLaureat();


}

// Appel de la fonction principale de test
test_all_functions();
?>
