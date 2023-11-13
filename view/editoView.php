<?php ob_start(); ?>

<div class="flex items-center justify-center min-h-screen mb-20">
    <div class="text-center border rounded-md p-8 bg-blanc md:p-16">
        <h1 class="text-2xl md:text-5xl font-titre mb-4 md:mb-8 text-bleu">Modification de l'edito</h1>

        <form enctype="multipart/form-data" method="post" action="/index.php?action=modifier_edito" class="mb-4">
        <?php echo '<textarea id="resume-recette" name="edito" placeholder="Ecrivez l\'édito" required
                    class="mt-1 p-2 md:p-4 w-full border rounded-md focus:outline-none focus:border-bleu focus:ring focus:ring-bleu focus:ring-opacity-50 mb-20 h-96">'.$edito[0]['EDI_CONTENU'].'</textarea>' ?>
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
$titre = 'Recettes';
require $GLOBALS['root'] . 'view/template.php';
?>