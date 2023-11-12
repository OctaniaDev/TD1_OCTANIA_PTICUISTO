<?php ob_start(); ?>

<?php if (!empty($recetteDetail)) : ?>
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-titre mb-4"><?= $recetteDetail[0]['REC_TITRE'] ?></h1>
        <p class="mb-2">Date de création : <?= $recetteDetail[0]['REC_DATE_CREATION'] ?></p>

        <?php if (!empty($tags)) : ?>
            <p class="mb-2">Tags :</p>
            <div class="mb-4 flex flex-wrap">
                <?php foreach ($tags as $tag) : ?>
                    <form action="./index.php?action=voir_recettes_par_tag" method="post" class="mr-2 mb-2">
                        <button type="submit" name="tag" value="<?= $tag['TAG_ID'] ?>" class="bg-bleu text-white px-2 py-1 rounded"><?= $tag['TAG_LIBELLE'] ?></button>
                    </form>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <p class="mb-4"><?= $recetteDetail[0]['REC_CONTENU'] ?></p>

        <p class="mb-2">Liste d'ingrédients :</p>
        <?php if (!empty($ingredients)) : ?>
            <ul class="list-disc pl-6 mb-4">
                <?php foreach ($ingredients as $ingredient) : ?>
                    <li><?= $ingredient['ING_INTITULE'] ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <p class="mb-4">Pas d'ingrédients (à faire)</p>
        <?php endif; ?>

        <?php if ($_SESSION['connecter'] == 'oui' && $recetteDetail[0]['REC_STATUS'] == 1) : ?>
            <form method="post" action="./index.php?action=voir_recettes&rec_id=<?= $recetteDetail[0]['REC_ID'] ?>" class="mb-4">
                <label for="commentaire-input" class="block text-sm font-medium text-gray-600 mb-2">Postez votre commentaire</label>
                <textarea rows="4" id="commentaire-input" name="texte_commentaire" class="border rounded-md p-2 w-full focus:outline-none focus:border-bleu focus:ring focus:ring-bleu focus:ring-opacity-50 mb-2"></textarea>
                <input type="submit" value="Poster" class="bg-bleu text-white p-2 rounded-md hover:bg-bleu-clair focus:outline-none focus:ring focus:border-bleu focus:ring-bleu focus:ring-opacity-50">
            </form>
        <?php endif; ?>

        <p class="mb-2">Commentaires :</p>
        <?php if (!empty($commentaires)) : ?>
            <div class="mb-4">
                <?php foreach ($commentaires as $commentaire) : ?>
                    <div class="mb-2">
                        <p class="font-bold"><?= $commentaire['UTI_PSEUDO'] ?></p>
                        <?php if ($commentaire['COM_STATUS'] != 1) : ?>
                            <p class="italic text-red-500">En attente de validation</p>
                        <?php endif; ?>
                        <p><?= $commentaire['COM_COMMENTAIRE'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p>Pas de commentaires</p>
        <?php endif; ?>

        <div class="mt-8 mb-20">
            <a href="javascript:history.go(-1)" class="bg-gray-500 text-white hover:bg-gray-400 px-4 py-2 rounded">Retour</a>
        </div>

    </div>
<?php else : ?>
    <p class="text-red-500">Aucune recette trouvée</p>
<?php endif; ?>

<?php
$content = ob_get_clean();
$titre = 'Detail Recette';
require $GLOBALS['root'] . 'view/template.php';
?>
