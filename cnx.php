<?php

$dbHost="localhost";
$dbName="";
$dbUser="";
$dbPassword="";

$strConnex="host=$dbHost dbname=$dbName user=$dbUser password=$dbPassword";
$cnx = pg_connect($strConnex);
if ($cnx) {
    //print "<p>Connexion établie !</p>";
}
else {
    print "<p>Erreur lors de la connexion ...</p>";
    exit;
}
?>
