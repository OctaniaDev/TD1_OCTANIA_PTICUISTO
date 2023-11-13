<?php ob_start(); ?>

<div class="max-w-2xl mx-auto p-6 bg-bleu-clair border rounded shadow-lg">
    <h2 class="text-2xl font-titre text-center mb-6 text-bleu">Gestion Administrative</h2>
    <nav class="space-y-4">
        <a href="/index.php?action=gestion_de_compte" class="block px-4 py-2 bg-blanc border rounded hover:bg-gris hover:text-blanc transition duration-300">Gestion de comptes</a>
        
        <a href="/index.php?action=gestion_de_recette" class="block px-4 py-2 bg-blanc border rounded hover:bg-gris hover:text-blanc transition duration-300">Gestion de recettes</a>

        <a href="/index.php?action=gestion_de_commentaire" class="block px-4 py-2 bg-blanc border rounded hover:bg-gris hover:text-blanc transition duration-300">Gestion des commentaires</a>

        <a href="/index.php?action=modifier_edito" class="block px-4 py-2 bg-blanc border rounded hover:bg-gris hover:text-blanc transition duration-300">Modifier l'edito</a>
    </nav>

    <div class="mt-8">
        <a href="/index.php"
            class="bg-gray-500 text-white hover:bg-gray-400 px-4 py-2 rounded">Retour</a>
    </div>
</div>

<?php
    $content = ob_get_clean();
    $titre = 'Pannel d\'Administrateur';
    require $GLOBALS['root'] . 'view/template.php';
?>
