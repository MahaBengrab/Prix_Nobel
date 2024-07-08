<?php


require_once 'foncgen.php';


//Fonction getPrixById
function getPrixById($prix_id) {
    $ptrDB = connexion();
    $query = 'SELECT * FROM Prix WHERE prix_id = $1';
    pg_prepare($ptrDB, 'reqGetPrixById', $query);
    $ptrQuery = pg_execute($ptrDB, 'reqGetPrixById', array($prix_id));
    $result = array();
    if ($ptrQuery) {
        $result = pg_fetch_assoc($ptrQuery);
    }
    pg_free_result($ptrQuery);
    pg_close($ptrDB);
    return $result;
}

//Fonction getAllPrix

function getAllPrix($prix_id) {
    $ptrDB = connexion();
    $query = 'SELECT * FROM Laureat l INNER JOIN gagne g ON l.laureat_id = g.laureat_id WHERE g.prix_id = $1';
    pg_prepare($ptrDB, 'reqPrepSelectAllPrix', $query);
    $ptrQuery = pg_execute($ptrDB, 'reqPrepSelectAllPrix', array($prix_id));
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


function insertIntoPrix(array $prixData): array {
    $ptrDB = connexion();
    
    // Préparation de la requête avec des paramètres nommés
    $query = "INSERT INTO Prix (prix_discipline, prix_montant, prix_comite) VALUES ($1, $2, $3) RETURNING prix_id";
    pg_prepare($ptrDB, 'reqPrepInsertIntoPrix', $query);
    
    // Exécution de la requête préparée avec les valeurs du tableau $prixData
    $result = pg_execute($ptrDB, 'reqPrepInsertIntoPrix', $prixData);
    
    if ($result) {
        // Récupération de l'identifiant de la nouvelle entrée insérée
        $insertedId = pg_fetch_result($result, 0);
        pg_free_result($result);
        pg_close($ptrDB);
        return array("prix_id" => $insertedId);
    } else {
        pg_close($ptrDB);
        return array("error" => "Erreur lors de l'insertion dans la table 'Prix'");
    }
}


function updatePrix(array $PA) {
    $ptrDB = connexion();

    // Vérifier si le tableau contient les clés nécessaires
    if (!isset($PA['prix_id']) || !isset($PA['prix_discipline']) || !isset($PA['prix_montant']) || !isset($PA['prix_comite'])) {
        echo "Données manquantes pour la mise à jour du Prix.";
        exit;
    }

    // Préparation de la requête
    $query = 'UPDATE Prix SET prix_discipline = $2, prix_montant = $3, prix_comite = $4 WHERE prix_id = $1';
    $stmt = pg_prepare($ptrDB, 'reqUpdatePrix', $query);

    // Vérification de la préparation de la requête
    if (!$stmt) {
        echo "Erreur lors de la préparation de la requête.";
        exit;
    }

    // Exécution de la requête
    $result = pg_execute($ptrDB, 'reqUpdatePrix', array($PA['prix_id'], $PA['prix_discipline'], $PA['prix_montant'], $PA['prix_comite']));

    // Vérification de l'exécution de la requête
    if ($result) {
        return getPrixById($PA['prix_id']);
    } else {
        echo "Erreur lors de l'exécution de la requête d'update.";
        exit;
    }
}


// Fonction de suppression dans la table Prix
function deletePrix(string $prix_id) {
    $ptrDB = connexion();

    // Préparation de la requête de suppression du prix de la table Prix
    $query = "DELETE FROM Prix WHERE prix_id = $1";
    pg_prepare($ptrDB, 'reqPrepDeletePrix', $query);
    $result = pg_execute($ptrDB, 'reqPrepDeletePrix', array($prix_id));

    if ($result) {
        // Suppression réussie, retourner un message ou effectuer d'autres opérations
        return array("success" => "Prix supprimé avec succès");
    } else {
        // Erreur lors de la suppression
        return array("error" => "Erreur lors de la suppression du prix");
    }
}


