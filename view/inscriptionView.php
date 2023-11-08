<?php ob_start(); ?>

<h1>Inscription</h1>
<form method="post" action="./index.php?action=inscription">
    <label for="username">Nom :</label>
    <input type="text" id="nom" name="nom" required><br>

    <label for="username">Prénom :</label>
    <input type="text" id="prenom" name="prenom" required><br>

    <label for="username">Email :</label>
    <input type="text" id="email" name="email" required><br>

    <label for="username">Pseudo :</label>
    <input type="text" id="pseudo" name="pseudo" required><br>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required><br>

    <input type="submit" value="S'inscrire">
</form>

<?php
    $content = ob_get_clean();
    $titre = 'Inscription';
    require $GLOBALS['root'] . 'view/template.php';
?>