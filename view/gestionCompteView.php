<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de comptes</title>
</head>
<body>
    <h1>Gestion de comptes</h1>

    <?php
        if (!empty($utilisateurs)) {
            echo '<ul>';
                foreach ($utilisateurs as $utilisateur) {
                    echo '<li><p>'.$utilisateur['UTI_PSEUDO'] . '</p><a href="./index.php?action=voir_utilisateur&user_id='
                    . $utilisateur['UTI_ID'].
                    '">voir le profil de l\'utilisateur</a></li>';
                }
            echo '</ul>';
        } else {
            echo '<p>Aucun utilisateur trouvé</p>';
        }
    ?>

</body>
</html>