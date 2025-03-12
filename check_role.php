<?php
function check_role($required_role) {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== $required_role) {
        header("Location: page_connexion.php");
        exit;
    }
}
?>
