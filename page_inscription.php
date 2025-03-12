<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="onglets">
        <p><a href="page_inscription.php">Inscription</a></p>
        <p><a href="page_liste.php">Liste</a></p>
        <p><a href="page_accueil.php">Accueil</a></p>
    </div>

    <section class="Formulaire">
        <h2>Inscription</h2>
        <form action="process_inscription.php" method="post">
            <label for="pseudo">Pseudo*:</label><br>
            <input type="text" id="pseudo" name="pseudo" required><br>
            <label for="email">Email*:</label><br>
            <input type="email" id="email" name="email" required><br>
            <label for="mot_de_passe">Mot de passe*:</label><br>
            <input type="password" id="mot_de_passe" name="mot_de_passe" required><br>
            <label for="sport">Sport préféré:</label><br>
            <select id="sport" name="sport">
                <option value="football">Football</option>
                <option value="basketball">Basketball</option>
                <option value="tennis">Tennis</option>
                <option value="natation">Natation</option>
                <option value="course">Course à pied</option>
            </select><br><br>
            <small>Les champs marqués * sont obligatoires.</small><br><br>
            <input type="submit" value="S'inscrire">
        </form>
    </section>
</body>
</html>
