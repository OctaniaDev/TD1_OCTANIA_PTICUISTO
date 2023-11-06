<?php ob_start(); ?>

<a href="/index.php?action=gestion_de_compte">Gestion de comtpes</a>
<a href="/index.php?action=deconnexion">Gestion de recettes</a>
<a href="/index.php?action=deconnexion">Gestion des commentaires</a>

<?php
    $content = ob_get_clean();
    $titre = 'Pannel Administrateur';
    require $GLOBALS['root'] . 'view/template.php';
?>