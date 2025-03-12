<?php

session_start();

// connexion BDD
$servername = "localhost"; 
$password = "";          
$dbname = "maisonligue";   // nom bdd

// création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// vérifie la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}
?>
