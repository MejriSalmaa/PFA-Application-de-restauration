
<?php
session_start();

define('SITEURL', 'http://localhost/pfa/');

function maConnexion()
{
    $base = 'food-order';
    $serveur = 'localhost';
    $user = 'root';
    $password = '';
    try {
        $bdd = new PDO("mysql:host=$serveur;dbname=$base", $user, $password);
        $bdd->query("SET NAMES 'utf8'");
        return $bdd;
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
?>