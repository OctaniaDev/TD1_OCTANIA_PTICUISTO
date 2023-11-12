<?php ob_start(); ?>

<div class="container mx-auto my-8 p-8 bg-bleu text-blanc rounded shadow-md">
    <h1 class="font-titre text-2xl font-bold mb-4">Informations du compte</h1>

    <div class="mb-4 font-texte">
        <p class="mb-1">Pseudo:
            <?= $accountInfo['UTI_PSEUDO']; ?>
        </p>
        <p class="mb-1">Email:
            <?= $accountInfo['UTI_EMAIL']; ?>
        </p>
        <p class="mb-1">Prénom:
            <?= $accountInfo['UTI_PRENOM']; ?>
        </p>
        <p class="mb-1">Nom:
            <?= $accountInfo['UTI_NOM']; ?>
        </p>
        <p class="mb-1">Date d'inscription:
            <?= $accountInfo['UTI_DATE_INSCRIPTION']; ?>
        </p>
    </div>


    <form method="post" action="/index.php?action=modifier_mot_de_passe" class="mb-4 font-texte">
        <label for="nouveau_mot_de_passe" class="block mb-2">Nouveau mot de passe :</label>
        <input type="password" name="nouveau_mot_de_passe" pattern=".{3,32}" required class="border p-2 mb-2 rounded">
        <label for="confirmation_mot_de_passe" class="block mb-2">Confirmer le nouveau mot de passe :</label>
        <input type="password" name="confirmation_mot_de_passe" pattern=".{3,32}" required class="border p-2 mb-2 rounded">
        <input type="submit" name="modifier_mot_de_passe" value="Modifier le mot de passe"
            class="bg-bleu text-blanc px-4 py-2 rounded hover:bg-bleu-clair">
    </form>

    <button class="bg-yellow-500 text-white rounded hover:bg-yellow-600 mb-4 block px-4 py-2">
        <a href="/index.php?action=voir_recettes_compte"
            class="">Voir vos recettes</a>
    </button>


    <form method="post" action="/index.php?action=supprimer_compte"
        onsubmit="return confirm('Confirmez la suppression de votre compte.');">
        <input type="submit" name="delete" value="Supprimer le compte"
            class="bg-red-500 text-blanc px-4 py-2 rounded hover:bg-red-400">
    </form>


    <div class="mt-8">
        <a href="javascript:history.go(-1)"
            class="bg-gray-500 text-white hover:bg-gray-400 px-4 py-2 rounded">Retour</a>
    </div>
</div>

<?php
$content = ob_get_clean();
$titre = 'Compte';
require $GLOBALS['root'] . 'view/template.php';
?>