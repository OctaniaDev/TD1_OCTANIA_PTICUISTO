<?php ob_start(); ?>

<div class="container mx-auto my-8 p-8 bg-bleu text-blanc rounded shadow-md">
    <h1 class="text-4xl font-titre mb-4">Gestion de recettes</h1>

    <form action="./index.php?action=gestion_de_recette" method="get">
        <label for="default-search"
        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Rechercher un
        titre</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
                </div>
                <div class="ui-widget">
                    <input type="text" name="motCherche" id="default-search"
                    class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Rechercher un titre de recette" pattern="^[a-zA-Z'\s]{1,32}$" required>
                </div>
            <button type="submit"
            class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Rechercher</button>
        </div>
    </form>
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
