<?php ob_start(); ?>

<div class="container mx-auto my-8 p-8 bg-bleu text-blanc rounded shadow-md">
    <h1 class="text-4xl font-titre mb-4">Recette</h1>

    <div>
        <p class="text-xl font-texte">Titre: <?php echo $recette['REC_TITRE']; ?></p>
        <p class="text-xl font-texte">Contenu: <?php echo $recette['REC_CONTENU']; ?></p>
        <p class="text-xl font-texte">Date de création: <?php echo $recette['REC_DATE_CREATION']; ?></p>
        <p class="text-xl font-texte">Image: <?php echo $recette['REC_IMAGE']; ?></p>
        <p class="text-xl font-texte">Status: <?php echo $recette['REC_STATUS']; ?></p>

        <?php if ($recette['REC_STATUS'] != 1): ?>
            <div class="flex space-x-4 mt-4">
                <form method="post" action="/index.php?action=refuser_recette&rec_id=<?php echo $recette['REC_ID']; ?>">
                    <button type="submit" class="bg-red-500 text-white hover:bg-red-400 px-4 py-2 rounded">Refuser recette</button>
                </form>

                <form method="post" action="/index.php?action=accepter_recette&rec_id=<?php echo $recette['REC_ID']; ?>">
                    <button type="submit" class="bg-green-500 text-white hover:bg-green-400 px-4 py-2 rounded">Accepter recette</button>
                </form>
            </div>
        <?php endif; ?>
    </div>

    <div class="mt-8">
        <a href="javascript:history.go(-1)"
            class="bg-gray-500 text-white hover:bg-gray-400 px-4 py-2 rounded">Retour</a>
    </div>

</div>

<?php
$content = ob_get_clean();
$titre = 'Recette';
require $GLOBALS['root'] . 'view/template.php';
?>
