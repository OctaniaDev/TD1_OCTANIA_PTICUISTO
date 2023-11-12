<?php ob_start(); ?>

<div class="flex items-center justify-center min-h-screen mb-20">
    <div class="text-center border rounded-md p-8 bg-blanc md:p-16">
        <h1 class="text-2xl md:text-5xl font-titre mb-4 md:mb-8 text-bleu">Ajout d'une recette</h1>

        <form enctype="multipart/form-data" method="post" action="/index.php?action=ajout_recette" class="mb-4">
            <div class="mb-4">
                <label for="titre-recette" class="block text-sm md:text-base font-medium text-gray-600">Titre :</label>
                <input id="titre-recette" type="text" name="titre_recette" placeholder="Entrez le titre de la recette" required
                    class="mt-1 p-2 md:p-4 w-full border rounded-md focus:outline-none focus:border-bleu focus:ring focus:ring-bleu focus:ring-opacity-50">
            </div>

            <div class="mb-4">
                <label for="contenu-recette" class="block text-sm md:text-base font-medium text-gray-600">Contenu :</label>
                <textarea id="contenu-recette" name="contenu_recette" placeholder="Entrez le contenu de la recette" required
                    class="mt-1 p-2 md:p-4 w-full border rounded-md focus:outline-none focus:border-bleu focus:ring focus:ring-bleu focus:ring-opacity-50"></textarea>
            </div>

            <div class="mb-4">
                <label for="resume-recette" class="block text-sm md:text-base font-medium text-gray-600">Résumé :</label>
                <textarea id="resume-recette" name="resume_recette" placeholder="Entrez le résumé de la recette" required
                    class="mt-1 p-2 md:p-4 w-full border rounded-md focus:outline-none focus:border-bleu focus:ring focus:ring-bleu focus:ring-opacity-50"></textarea>
            </div>

            <fieldset class="mb-4">
                <legend class="text-bleu text-sm md:text-base">Choisissez une catégorie</legend>
                <div class="flex gap-4">
                    <div>
                        <input id="entree-recette" value="1" type="radio" name="categorie_recette">
                        <label for="entree-recette" class="text-sm md:text-base text-bleu">Entrée</label>
                    </div>
                    <div>
                        <input id="plat-recette" value="2" type="radio" name="categorie_recette">
                        <label for="plat-recette" class="text-sm md:text-base text-bleu">Plat</label>
                    </div>
                    <div>
                        <input id="dessert-recette" value="3" type="radio" name="categorie_recette">
                        <label for="dessert-recette" class="text-sm md:text-base text-bleu">Dessert</label>
                    </div>
                </div>
            </fieldset>

            <div class="mb-4">
                <?php
                if (!empty($ingredients)) {
                    foreach ($ingredients as $ingredient) {
                        echo '<div class="flex items-center mb-2">';
                        echo '<input id="' . $ingredient['ING_INTITULE'] . '-recette" value="' . $ingredient['ING_ID'] . '" type="checkbox" name="ingredients_recette[]">';
                        echo '<label for="' . $ingredient['ING_INTITULE'] . '-recette" class="ml-2 text-sm md:text-base">' . $ingredient['ING_INTITULE'] . '</label>';
                        echo '</div>';
                    }
                }
                ?>
            </div>

            <div class="mb-4">
                <input placeholder="Choisir une image" type="file" id="image-recette" name="image_recette" accept="image/*"
                    class="p-2 md:p-4 w-full border rounded-md focus:outline-none focus:border-bleu focus:ring focus:ring-bleu focus:ring-opacity-50">
            </div>

            <input type="submit" value="Publier" class="bg-bleu text-blanc p-2 md:p-4 rounded-md hover:bg-bleu-clair focus:outline-none focus:ring focus:border-bleu focus:ring-bleu focus:ring-opacity-50">
        </form>
		
		<div class="mt-8">
        <a href="javascript:history.go(-1)"
            class="bg-gray-500 text-white hover:bg-gray-400 px-4 py-2 rounded">Retour</a>
    </div>
    </div>
</div>

<?php
$content = ob_get_clean();
$titre = 'Ajout Recette';
require $GLOBALS['root'] . 'view/template.php';
?>
