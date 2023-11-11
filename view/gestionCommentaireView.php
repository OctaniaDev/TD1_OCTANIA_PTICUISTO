<?php ob_start(); ?>

<h1>Gestion des commentaires</h1>

<?php
$content = ob_get_clean();
$titre = 'Gestion des commentaires';
require $GLOBALS['root'] . 'view/template.php';

if (!empty($commentaires)) {
    echo '<ul>';
    foreach ($commentaires as $commentaire) {
        echo '<li>';
        echo '<p>' . $commentaire['UTI_PSEUDO'] . ' : ' . $commentaire['COM_COMMENTAIRE'] . '</p>';

        echo '<form method="post" action="/index.php?action=valider_commentaire&com_id=' . $commentaire['COM_ID'] . '">
                <button type="submit">Valider commentaire</button>
              </form>';

        echo '<form method="post" action="/index.php?action=supprimer_commentaire&com_id=' . $commentaire['COM_ID'] . '">
                <button type="submit">Supprimer commentaire</button>
              </form>';

        echo '</li>';
    }
    echo '</ul>';
} else {
    echo '<p>Aucun commentaire trouvé</p>';
}
?>
