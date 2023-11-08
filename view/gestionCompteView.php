<?php ob_start(); ?>

<h1>Gestion de comptes</h1>

<?php
$content = ob_get_clean();
$titre = 'Gestion de comptes';
require $GLOBALS['root'] . 'view/template.php';

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