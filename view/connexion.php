<!DOCTYPE html>
<html>

<head>
    <title>Connexion</title>
</head>

<body>
    <h1>Connexion</h1>

    <?php
    if (isset($erreur) && !empty($erreur)) {
        echo '<p class="erreur">' . $erreur . '</p>';
    }
    ?>

    <form method="post" action="index.php?action=connexion">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Se connecter">
    </form>
</body>

</html>