<?php ob_start(); ?>

<div class="container mx-auto my-8 p-8 bg-bleu text-blanc rounded shadow-md">
    <h1 class="text-4xl font-titre mb-4">Profil de l'utilisateur</h1>

    <div>
        <div class="mb-4">
            <p class="text-xl font-texte">Nom:
                <?php echo $utilisateur['UTI_NOM']; ?>
            </p>
            <p class="text-xl font-texte">Prénom:
                <?php echo $utilisateur['UTI_PRENOM']; ?>
            </p>
            <p class="text-xl font-texte">Adresse mail:
                <?php echo $utilisateur['UTI_EMAIL']; ?>
            </p>
            <p class="text-xl font-texte">Status:
                <?php echo $utilisateur['STA_LIBELLE']; ?>
            </p>
        </div>

        <div class="flex space-x-4">
            <?php
            if ($utilisateur['STA_ID'] == 1) {
                echo '<form method="post" action="/index.php?action=rendre_inactif&user_id=' . $utilisateur['UTI_ID'] . '">
                    <button type="submit" class="bg-yellow-500 text-bleu hover:bg-yellow-300 px-4 py-2 rounded">Rendre inactif</button>
                </form>';
            } else {
                echo '<form method="post" action="/index.php?action=rendre_actif&user_id=' . $utilisateur['UTI_ID'] . '">
                    <button type="submit" class="bg-yellow-500 text-white hover:bg-yellow-300 px-4 py-2 rounded">Rendre actif</button>
                </form>';
            }
            ?>

            <form method="post"
                action="/index.php?action=supprimer_compte_utilisateur&user_id=<?php echo $utilisateur['UTI_ID']; ?>"
                onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce compte ?');">
                <button type="submit"
                    class="bg-red-500 text-white hover:bg-red-400 px-4 py-2 rounded">Supprimer</button>
            </form>
        </div>
    </div>

    <div class="mt-8">
        <a href="javascript:history.go(-1)"
            class="bg-gray-500 text-white hover:bg-gray-400 px-4 py-2 rounded">Retour</a>
    </div>
</div>


<?php
$content = ob_get_clean();
$titre = 'Détails de l\'utilisateur';
require $GLOBALS['root'] . 'view/template.php';
?>