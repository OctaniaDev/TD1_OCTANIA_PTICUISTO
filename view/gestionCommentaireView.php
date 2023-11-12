<?php ob_start(); ?>

<div class="container mx-auto my-8 p-8 bg-bleu text-blanc rounded shadow-md">
    <h1 class="text-4xl font-titre mb-4">Gestion des commentaires</h1>

    <?php if (!empty($commentaires)): ?>
        <ul class="list-disc pl-6">
            <?php foreach ($commentaires as $commentaire): ?>
                <li class="mb-4">
                    <p class="text-lg font-texte">
                        <span class="font-bold"><?php echo $commentaire['UTI_PSEUDO']; ?>:</span> <?php echo $commentaire['COM_COMMENTAIRE']; ?>
                    </p>

                    <div class="mt-2 flex space-x-4">
                        <form method="post" action="/index.php?action=valider_commentaire&com_id=<?php echo $commentaire['COM_ID']; ?>">
                            <button type="submit" class="bg-green-600 text-blanc hover:bg-green-400 px-4 py-2 rounded">Valider</button>
                        </form>

                        <form method="post" action="/index.php?action=supprimer_commentaire&com_id=<?php echo $commentaire['COM_ID']; ?>">
                            <button type="submit" class="bg-red-500 text-blanc hover:bg-red-400 px-4 py-2 rounded">Supprimer</button>
                        </form>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p class="text-xl font-texte text-red-950">Aucun commentaire trouvé</p>
    <?php endif; ?>

    <div class="mt-8">
        <a href="./index.php"
            class="bg-gray-500 text-white hover:bg-gray-400 px-4 py-2 rounded">Retour</a>
    </div>
</div>

<?php
$content = ob_get_clean();
$titre = 'Gestion des commentaires';
require $GLOBALS['root'] . 'view/template.php';
?>
