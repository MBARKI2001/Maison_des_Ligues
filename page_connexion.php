<?php
include 'connect_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo = $_POST['pseudo'];
    $mot_de_passe = $_POST['mot_de_passe'];

    $sql = "SELECT user.id_user, user.pseudo, user.id_usertype, usertype.lib_usertype, user.mdp 
            FROM user 
            JOIN usertype ON user.id_usertype = usertype.id_usertype 
            WHERE user.pseudo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $pseudo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($mot_de_passe, $row['mdp'])) { 
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['pseudo'] = $row['pseudo'];
            $_SESSION['role'] = $row['superadmin']; 
            header("Location: page_liste.php");
            exit;
        } else {
            $error = "Mot de passe incorrect.";
        }
    } else {
        $error = "Utilisateur introuvable.";
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<div class="container">
    <h1>Connexion</h1>
    <form method="post">
        <label for="pseudo">Pseudo :</label>
        <input type="text" id="pseudo" name="pseudo" required>
        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required>
        <button type="submit">Se connecter</button>
    </form>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
</div>
</body>
</html>
