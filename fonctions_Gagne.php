<?php

//Connexion à la bases de données 
require_once 'foncgen.php';

function getGagneById($laureat_id, $prix_id) {
    $ptrDB = connexion();
    $query = 'SELECT * FROM gagne WHERE laureat_id = $1 AND prix_id = $2';
    pg_prepare($ptrDB, 'reqGetGagneById', $query);
    $ptrQuery = pg_execute($ptrDB, 'reqGetGagneById', array($laureat_id, $prix_id));
    $result = array();
    if ($ptrQuery) {
        $result = pg_fetch_assoc($ptrQuery);
    }
    pg_free_result($ptrQuery);
    pg_close($ptrDB);
    return $result;
}


//Fonction GetAllByGagne
    function getAllByGagne() {
        $ptrDB = connexion();
        $query = 'SELECT l.laureat_id, l.laureat_nom, l.laureat_date_naissance, l.laureat_sexe, l.laureat_nationalite
                  FROM Laureat l
                  INNER JOIN gagne g ON l.laureat_id = g.laureat_id';
        $ptrQuery = pg_query($ptrDB, $query);
        $resu = array();
        if ($ptrQuery) {
            while ($ligne = pg_fetch_assoc($ptrQuery)) {
                $resu[] = $ligne;
            }
        }
        pg_free_result($ptrQuery);
        pg_close($ptrDB);
        return $resu;
    }


//Insertion dans la table Gagne

    function insertIntoGagne(array $gagne) : array {
    $ptrDB = connexion();

    // Préparation de la requête d'insertion avec des paramètres de requête
    $query = "INSERT INTO gagne (laureat_id, prix_id, prix_annee) VALUES ($1, $2, $3) RETURNING prix_id, laureat_id, prix_annee";
    pg_prepare($ptrDB, 'reqPrepInsertIntoGagne', $query);

    // Extraction des données individuelles
    $laureat_id = $gagne['laureat_id'];
    $prix_id = $gagne['prix_id'];
    $prix_annee = $gagne['prix_annee'];

    // Exécution de la requête avec les valeurs associées
    $result = pg_execute($ptrDB, 'reqPrepInsertIntoGagne', array($laureat_id, $prix_id, $prix_annee));
    
    if ($result) {
        // Récupération des données insérées
        $insertedData = pg_fetch_assoc($result);
        pg_free_result($result);
        pg_close($ptrDB);
        return $insertedData;
    } else {
        // Gestion des erreurs d'insertion
        pg_close($ptrDB);
        return array("error" => "Erreur lors de l'insertion dans la table 'gagne'");
    }
}


function deleteGagne(String $laureat_id, String $prix_id) {
    $ptrDB = connexion();

    // Préparation de la requête de suppression de la table gagne
    $query = 'DELETE FROM gagne WHERE laureat_id = $1 AND prix_id = $2';
    pg_prepare($ptrDB, 'reqPrepDeleteGagne', $query);
    $result = pg_execute($ptrDB, 'reqPrepDeleteGagne', array($laureat_id, $prix_id));

    if ($result) {
        // Suppression réussie, retourner un message ou effectuer d'autres opérations
        return array("success" => "Ligne supprimée avec succès de la table 'gagne'");
    } else {
        // Erreur lors de la suppression
        return array("error" => "Erreur lors de la suppression de la ligne dans la table 'gagne'");
    }
}


function updateGagne($donnees) {
    $ptrDB = connexion();

    // Assurez-vous que les données contiennent les identifiants du gagnant et du prix
    if (!isset($donnees['laureat_id']) || !isset($donnees['prix_id'])) {
        echo "Identifiants du lauréat et/ou du prix manquants.";
        exit;
    }

    // Préparez la requête SQL pour mettre à jour les données de la table gagne
    $query = 'UPDATE gagne SET prix_annee = $3 WHERE laureat_id = $1 AND prix_id = $2';
    $stmt = pg_prepare($ptrDB, 'reqUpdateGagne', $query);

    // Vérifiez si la préparation de la requête a réussi
    if (!$stmt) {
        echo "Erreur lors de la préparation de la requête.";
        exit;
    }

    // Exécutez la requête SQL pour mettre à jour les données de la table gagne
    $result = pg_execute($ptrDB, 'reqUpdateGagne', array(
        $donnees['laureat_id'],
        $donnees['prix_id'],
        $donnees['prix_annee']
    ));

    // Vérifiez si l'exécution de la requête a réussi
    if ($result) {
        return array("success" => "Données de la table Gagne mises à jour avec succès");
    } else {
        echo "Erreur lors de l'exécution de la requête d'update.";
        exit;
    }
}




function deleteGagneLaureat(String $id) {
    $ptrDB = connexion();
    //Preparation de la requete
    $query = 'DELETE FROM gagne WHERE laureat_id = $1';
    pg_prepare($ptrDB, 'reqPrepDeleteGagneLaureat',$query);
    pg_execute($ptrDB,'reqPrepDeleteGagneLaureat',array($id));
    return getAllByGagne();
}
function deleteGagnePrix(String $prixID){
    $ptrDB = connexion();
    $query = 'DELETE FROM gagne WHERE laureat_id = $1';
    //Preparation de la requete
    pg_prepare($ptrDB, 'requeteDeleteFromPrix',$query);
    pg_execute($ptrDB,'requeteDeleteFromPrix',array($prixID));
    return getAllByGagne();
}
//$pageHTML .= '<p><a href="introduction.php"> Page précédente </a></p>';