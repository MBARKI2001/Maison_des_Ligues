<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création d'un message</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <header>
        <h1>Création d'un message</h1>
    </header>

    <section class="FormCreation">
        <form action="process_add.php" method="post">
            <label for="message">Message :</label><br>
            <textarea id="message" name="message" rows="4" cols="50"></textarea><br><br>
            <input type="submit" value="Envoyer">
        </form>
    </section>
</body>
</html>
