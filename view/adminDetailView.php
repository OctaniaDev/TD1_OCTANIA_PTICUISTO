<?php ob_start(); ?>

<h1>Profil de l'utilisateur</h1>

<div>
    <p>Nom: <?php echo $utilisateur['UTI_NOM']; ?></p>
    <p>Prénom: <?php echo $utilisateur['UTI_PRENOM']; ?></p>
    <p>Adresse mail: <?php echo $utilisateur['UTI_EMAIL']; ?></p>
    <p>Status: <?php echo $utilisateur['STA_LIBELLE']; ?></p>

    <form method="post" action="/index.php?action=rendre_inactif&user_id=<?php echo $utilisateur['UTI_ID']; ?>">
        <button type="submit">Rendre inactif</button>
    </form>

    <form method="post" action="/index.php?action=supprimer_compte_utilisateur&user_id=<?php echo $utilisateur['UTI_ID']; ?>"
      onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce compte ?');">
        <button type="submit">Supprimer</button>
    </form>

</div>

<?php
$content = ob_get_clean(); 
$titre = 'Détails de l\'utilisateur';
require $GLOBALS['root'] . 'view/template.php';
?>

