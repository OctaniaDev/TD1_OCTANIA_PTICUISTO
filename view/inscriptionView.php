<?php ob_start(); ?>

<div class="flex items-center justify-center min-h-screen">
    <div class="text-center border rounded-md p-12 bg-blanc">
        <h1 class="text-5xl font-titre mb-8 text-bleu">Inscription</h1>


        <form method="post" action="./index.php?action=inscription">
            <div class="mb-6">
                <label for="username" class="block text-sm font-medium text-gray-600">Nom :</label>
                <input type="text" pattern="[a-zA-Z]{1,32}$" id="nom" name="nom" placeholder="Entrez votre nom" required
                        class="mt-1 p-4 w-full border rounded-md focus:outline-none focus:border-bleu focus:ring focus:ring-bleu focus:ring-opacity-50">
                <br>
            </div>
            <div class="mb-6">
                <label for="username" class="block text-sm font-medium text-gray-600">Prénom :</label>
                <input type="text" pattern="[a-zA-Z]{1,32}$" id="prenom" name="prenom" placeholder="Entrez votre prénom" required
                       class="mt-1 p-4 w-full border rounded-md focus:outline-none focus:border-bleu focus:ring focus:ring-bleu focus:ring-opacity-50">
                <br>
            </div>

            <div class="mb-6">
                <label for="username" class="block text-sm font-medium text-gray-600">Email :</label>
                <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" id="email" name="email" placeholder="Entrez votre email" required
                       class="mt-1 p-4 w-full border rounded-md focus:outline-none focus:border-bleu focus:ring focus:ring-bleu focus:ring-opacity-50">
                <br>
            </div>

            <div class="mb-6">
                <label for="username" class="block text-sm font-medium text-gray-600">Pseudo :</label>
                <input type="text" pattern=".{1,32}$" id="pseudo" name="pseudo" placeholder="Entrez votre pseudo" required
                       class="mt-1 p-4 w-full border rounded-md focus:outline-none focus:border-bleu focus:ring focus:ring-bleu focus:ring-opacity-50">
                <br>
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-600">Mot de passe :</label>
                <input type="password" pattern="^[a-zA-Z0-9àèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ \']{1,32}$" id="password" name="password" placeholder="Entrez votre mot de passe" required
                    class="mt-1 p-4 w-full border rounded-md focus:outline-none focus:border-bleu focus:ring focus:ring-bleu focus:ring-opacity-50">
                <br>
            </div>

            <button type="submit"
                class="bg-bleu text-blanc p-4 rounded-md hover:bg-bleu-clair focus:outline-none focus:ring focus:border-bleu focus:ring-bleu focus:ring-opacity-50">
                S'inscrire
            </button>
        </form>

        <p class="mt-6 text-sm text-gray-600">
            Déjà un compte ? <a href="./index.php?action=connexion"
                class="text-bleu hover:text-bleu-fonce">Connectez-vous</a>
        </p>
    </div>
</div>

<?php
$content = ob_get_clean();
$titre = 'Inscription';
require $GLOBALS['root'] . 'view/template.php';
?>