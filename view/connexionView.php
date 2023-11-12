<?php ob_start(); ?>

<div class="flex items-center justify-center min-h-screen">
    <div class="text-center border rounded-md p-16 bg-blanc">
        <h1 class="text-5xl font-titre mb-8 text-bleu">Connexion</h1>

        <form method="post" action="./index.php?action=connexion" class="mb-8">
            <div class="mb-6">
                <label for="username" class="block text-sm font-medium text-gray-600">Nom d'utilisateur :</label>
                <input type="text" pattern=".{3,32}" id="username" name="username" placeholder="Entrez votre nom d'utilisateur" required
                       class="mt-1 p-4 w-full border rounded-md focus:outline-none focus:border-bleu focus:ring focus:ring-bleu focus:ring-opacity-50">
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-600">Mot de passe :</label>
                <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" pattern=".{3,32}" required
                       class="mt-1 p-4 w-full border rounded-md focus:outline-none focus:border-bleu focus:ring focus:ring-bleu focus:ring-opacity-50">
            </div>

            <button type="submit"
                    class="bg-bleu text-blanc p-4 rounded-md hover:bg-bleu-clair focus:outline-none focus:ring focus:border-bleu focus:ring-bleu focus:ring-opacity-50">
                Se connecter
            </button>

            <p class="mt-6 text-sm text-gray-600">
                Pas encore de compte ? <a href="./index.php?action=inscription" class="text-bleu hover:text-bleu-fonce">Inscrivez-vous</a>
            </p>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
$titre = 'Connexion';
require $GLOBALS['root'] . 'view/template.php';
?>
