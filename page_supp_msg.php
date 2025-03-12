<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression d'un message</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="container">
        <h1>Suppression d'un message</h1>
        <p>Êtes-vous sûr de vouloir supprimer ce message ?</p>
        <form action="process_delete.php" method="post">
            <input type="hidden" name="message_id" value="ID_DU_MESSAGE_A_SUPPRIMER">
            <input type="submit" value="Confirmer la suppression">
        </form>
    </div>
</body>
</html>
