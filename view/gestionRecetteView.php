<?php ob_start(); ?>

<h1>Gestion de recettes</h1>

<?php
    $content = ob_get_clean();
    $titre = 'Gestion de comptes';
    require $GLOBALS['root'] . 'view/template.php';

    if (!empty($recettes)) {
        echo '<ul>';
            foreach ($recettes as $recette) {
                echo '<li><p>'.$recette['rec_nom'] . '</p><a href="./index.php?action=voir_recette&rec_id='
                . $recette['rec_id'].
                '">voir la recette</a></li>';
            }
        echo '</ul>';
    } else {
        echo '<p>Aucune recette trouvée</p>';
    }


?>