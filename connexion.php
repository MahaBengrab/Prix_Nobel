<?php
require'monEnv.php';
// Paramètres de connexion à la base de données PostgreSQL
$host = $_ENV['dbHost'];
  $dbname = $_ENV['dbName'];
  $user = $_ENV['dbUser'];
  $passwd = $_ENV['dbPassword'];

// Connexion à la base de données
$ptrDB = pg_connect("host=$host dbname=$dbname user=$user password=$passwd");
echo " connexion à la base de données.";
if (!$ptrDB) {
    echo "Erreur de connexion à la base de données.";
    exit;
}
?>
