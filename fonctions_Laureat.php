<?php

//Connexion à la bases de données 
require_once 'foncgen.php';

function getInputText(array $name , array $value=[] ){
    $formulaire = "";
    foreach($name as $attribut){
        $valeur = isset($value[$attribut]) ? $value[$attribut] : ''; 
      $formulaire .= "<label> $attribut : <input value='$valeur'type='text' name='$attribut' size='15' /></label>";
    }
    return $formulaire;
}


function getRadiosFromArray(array $valeurs, string $nomVar): string {
    $lesRadios = "";
    foreach ($valeurs as $valeur) {
        $lesRadios .= "$valeur <input type='radio' name='$nomVar' ";
        if (isset($_REQUEST[$nomVar]) && $valeur == $_REQUEST[$nomVar]) {
            $lesRadios .= "checked='checked' ";
        }
        $lesRadios .= "value='$valeur'>\n";
    }
    return $lesRadios;
}


function getLaureatById($id) {
    $ptrDB = connexion();

    // Préparation de la requête SQL pour récupérer les données du lauréat par son ID
    $query = "SELECT * FROM laureat WHERE laureat_id = $1";
    pg_prepare($ptrDB, 'reqPrepGetLaureatById', $query);

    // Exécution de la requête avec l'ID du lauréat en tant que paramètre
    $result = pg_execute($ptrDB, 'reqPrepGetLaureatById', array($id));

    // Vérifier si la requête a réussi
    if ($result) {
        // Récupérer les données du lauréat sous forme de tableau associatif
        $laureat = pg_fetch_assoc($result);
        pg_free_result($result);
        pg_close($ptrDB);
        return $laureat;
    } else {
        // En cas d'erreur, retourner un tableau vide ou un message d'erreur
        pg_close($ptrDB);
        return array();
    }
}
    
     function getAllLaureat() : array {
        $ptrDB = connexion();
        $query = "SELECT * FROM Laureat";
        //Préparation de la requête
        pg_prepare($ptrDB, 'reqPrepSelectLaureatAll', $query);
        $ptrQuery = pg_execute($ptrDB, 'reqPrepSelectLaureatAll', array());
        $resu = pg_fetch_all($ptrQuery);
        pg_free_result($ptrQuery);
        pg_close($ptrDB);
        return $resu;
    }



function insertIntoLaureat(array $Laureat): array {
    $ptrDB = connexion(); 

    // Prépare la requête avec des paramètres positionnels ($1, $2, etc.).
    $query = "INSERT INTO Laureat (laureat_nom, laureat_date_naissance, laureat_sexe, laureat_nationalite) VALUES ($1, $2, $3, $4)";
    pg_prepare($ptrDB, 'reqPrepInsertIntoLaureat', $query);

    // Exécute la requête préparée avec les valeurs du tableau $Laureat.
    $result = pg_execute($ptrDB, 'reqPrepInsertIntoLaureat', array_values($Laureat));

    // Vérifie si l'insertion a réussi
    if ($result) {
        pg_close($ptrDB);
        return array("success" => "Laureat inséré avec succès.");
    } else {
        pg_close($ptrDB);
        return array("error" => "Erreur lors de l'insertion dans la table 'Laureat'");
    }
}


function updateLaureat($donnees) {
    $ptrDB = connexion();

    // Assurez-vous que les données contiennent l'identifiant du lauréat
    if (!isset($donnees['laureat_id'])) {
        echo "Identifiant du lauréat manquant.";
        exit;
    }

    // Préparez la requête SQL pour mettre à jour les données du lauréat
    $query = 'UPDATE laureat SET laureat_nom = $2, laureat_date_naissance = $3, laureat_sexe = $4, laureat_nationalite = $5 WHERE laureat_id = $1';
    $stmt = pg_prepare($ptrDB, 'reqUpdateLaureat', $query);

    // Vérifiez si la préparation de la requête a réussi
    if (!$stmt) {
        echo "Erreur lors de la préparation de la requête.";
        exit;
    }

    // Exécutez la requête SQL pour mettre à jour les données du lauréat
    $result = pg_execute($ptrDB, 'reqUpdateLaureat', array(
        $donnees['laureat_id'],
        $donnees['laureat_nom'],
        $donnees['laureat_date_naissance'],
        $donnees['laureat_sexe'],
        $donnees['laureat_nationalite']
    ));

    // Vérifiez si l'exécution de la requête a réussi
    if ($result) {
        return getLaureatById($donnees['laureat_id']); // Retournez les nouvelles données du lauréat après la mise à jour
    } else {
        echo "Erreur lors de l'exécution de la requête d'update.";
        exit;
    }
}





//Suppression dans la table Laureat
function deleteLaureat(String $id) {
    $ptrDB = connexion();
    
    //Preparation de la requete de supression de la Table Laureat
    $query = 'DELETE FROM Laureat WHERE laureat_id = $1';
    pg_prepare($ptrDB, 'reqPrepDeleteLaureat',$query);
    pg_execute($ptrDB,'reqPrepDeleteLaureat',array($id));
    return getAllLaureat();
    
    
}
$pageHTML = getDebutHTML("Page d'accueil");
$pageHTML .= intoBalise("h1","Les tables existantes");

$pageHTML .= intoBalise("p",'Le tableau des Laureats');
// Données simulées
$donnees = array(
    array("Laureat_Id" => 1, "Nom" => "John Doe", "Date de naissance" => "1990-05-15", "Nationalité" => "Française", "Sexe" => "Masculin"),
    array("Laureat_Id" => 2, "Nom" => "Jane Smith", "Date de naissance" => "1988-10-20", "Nationalité" => "Américaine", "Sexe" => "Féminin")
);

$connexion = pg_connect("host=172.16.20.14 dbname = bm213331 user= bm213331 password= 20213331");
// Vérification de la connexion
if (!$connexion) {
    echo "Erreur de connexion à la base de données.";
    exit;
}

// Exécution d'une requête SQL pour récupérer le contenu de la table
$result = pg_query($connexion, "SELECT * FROM Laureat");

// Vérification du résultat de la requête
if (!$result) {
    echo "Erreur lors de l'exécution de la requête.";
    exit;
}

// Récupération des données depuis la base de données
$donnees = [];
while ($row = pg_fetch_assoc($result)) {
    $donnees[] = $row;
}


// Triez les données par "Laureat_Id" en ordre croissant
usort($donnees, function($a, $b) {
    return $a['laureat_id'] - $b['laureat_id'];
});


