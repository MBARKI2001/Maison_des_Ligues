<?php
include 'connect_db.php';
include 'check_role.php';
check_role('superadmin');

// Récupérer l'ID du message
$id_faq = $_GET['id'] ?? null;
if (!$id_faq) die("ID manquant.");

$sql = "SELECT question, reponse FROM faq WHERE id_faq = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_faq);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $question = $row['question'];
    $reponse = $row['reponse'];
} else {
    die("Message introuvable.");
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un message</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<div class="container">
    <h1>Modifier un message</h1>
    <form action="process_edit.php" method="post">
        <input type="hidden" name="id_faq" value="<?php echo $id_faq; ?>">
        <label for="question">Question :</label>
        <textarea id="question" name="question" rows="4"><?php echo htmlspecialchars($question); ?></textarea>
        <label for="reponse">Réponse :</label>
        <textarea id="reponse" name="reponse" rows="4"><?php echo htmlspecialchars($reponse); ?></textarea>
        <button type="submit">Enregistrer</button>
    </form>
</div>
</body>
</html>
