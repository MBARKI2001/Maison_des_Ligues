<?php
include 'connect_db.php';
include 'check_role.php';

// Vérifie que seul un superadmin peut accéder
check_role('superadmin');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des messages</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<header>
    <nav class="onglets">
        <ul>
            <li><a href="page_accueil.php">Accueil</a></li>
            <li><a href="logout.php">Déconnexion</a></li>
        </ul>
    </nav>
</header>
<div class="container">
    <h1>Liste des messages</h1>
    <table>
        <tr>
            <th>#</th>
            <th>Auteur</th>
            <th>Question</th>
            <th>Réponse</th>
            <th>Création</th>
            <th>Modification</th>
            <th>Actions</th>
        </tr>
        <?php
        $sql = "
            SELECT faq.id_faq, faq.question, faq.reponse, faq.dat_question, faq.dat_modif, user.pseudo 
            FROM faq 
            JOIN user ON faq.id_user = user.id_user 
            ORDER BY dat_modif ASC;
        ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $count = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$count}</td>
                    <td>" . htmlspecialchars($row['pseudo']) . "</td>
                    <td>" . htmlspecialchars($row['question']) . "</td>
                    <td>" . htmlspecialchars($row['reponse']) . "</td>
                    <td>{$row['dat_question']}</td>
                    <td>" . ($row['dat_modif'] ?? "Non modifié") . "</td>
                    <td>
                        <a href='page_modif_msg.php?id={$row['id_faq']}'>Modifier</a> | 
                        <a href='page_supp_msg.php?id={$row['id_faq']}'>Supprimer</a>
                    </td>
                </tr>";
                $count++;
            }
        } else {
            echo "<tr><td colspan='7'>Aucun message trouvé.</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</div>
</body>
</html>
