<?php
session_start(); // Redémarre la session pour la supprimer
session_unset(); // Vide toutes les variables de session
session_destroy(); // Détruit la session
header("Location: page_connexion.php"); // Redirige vers la page de connexion
exit;
?>
