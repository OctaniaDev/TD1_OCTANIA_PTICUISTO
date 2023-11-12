<?php ob_start(); ?>

<div class="container mx-auto my-8 p-8 bg-bleu text-blanc rounded shadow-md">
    <h1 class="text-4xl font-titre mb-4">Gestion de comptes</h1>

    <?php
    if (!empty($utilisateurs)) {
        echo '<ul>';
        foreach ($utilisateurs as $utilisateur) {
            echo '<li class="mb-2">
                    <p class="text-xl font-texte">' . $utilisateur['UTI_PSEUDO'] . '</p>
                    <a href="./index.php?action=voir_utilisateur&user_id=' . $utilisateur['UTI_ID'] . '" class="text-bleu-clair hover:underline">Voir le profil de l\'utilisateur</a>
                </li>';
        }
        echo '</ul>';
    } else {
        echo '<p class="text-xl font-texte">Aucun utilisateur trouvé</p>';
    }
    ?>
    
    <div class="mt-8">
        <a href="javascript:history.go(-1)"
            class="bg-gray-500 text-white hover:bg-gray-400 px-4 py-2 rounded">Retour</a>
    </div>
</div>

<?php
$content = ob_get_clean();
$titre = 'Gestion de comptes';
require $GLOBALS['root'] . 'view/template.php';
?>
