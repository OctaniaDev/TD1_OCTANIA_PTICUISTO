<?php ob_start(); ?>

<div class="container mx-auto my-8 p-8 bg-bleu text-blanc rounded shadow-md">
    <h1 class="text-4xl font-titre mb-4">Gestion de recettes</h1>

    <?php if (!empty($recettes)): ?>
        <ul class="list-disc pl-6">
            <?php foreach ($recettes as $recette): ?>
                <li class="mb-4">
                    <p class="text-xl font-texte">
                        <span><?php echo $recette['REC_TITRE']; ?></span>
                    </p>
                    <a href="./index.php?action=voir_recette_details&rec_id=<?php echo $recette['REC_ID']; ?>"
                        class="text-bleu-clair hover:underline">Voir la recette</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p class="text-xl font-texte">Aucune recette trouvée</p>
    <?php endif; ?>

    <div class="mt-8">
        <a href="javascript:history.go(-1)"
            class="bg-gray-500 text-white hover:bg-gray-400 px-4 py-2 rounded">Retour</a>
    </div>
</div>

<?php
$content = ob_get_clean();
$titre = 'Gestion de recettes';
require $GLOBALS['root'] . 'view/template.php';
?>
