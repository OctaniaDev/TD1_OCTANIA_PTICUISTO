<?php ob_start(); ?>
    <h1>Informations du compte</h1>
    <p>Pseudo :
        <?php echo $accountInfo['UTI_PSEUDO']; ?>
    </p>
    <?php
    if(isset($_SESSION['erreurSupprimerCompte']))
        echo '<p style=" color: red;">erreur lors de la suppression du compte</p>';
    if(isset($_SESSION['erreurMDPCompte']))
        echo '<p style=" color: red;">erreur lors de la modification du mot de passe</p>';
    ?>
    <form method="post" action="/index.php?action=modifier_mot_de_passe">
        <label for="nouveau_mot_de_passe">Nouveau mot de passe :</label>
        <input type="password" name="nouveau_mot_de_passe" required>
        <label for="confirmation_mot_de_passe">Confirmer le nouveau mot de passe :</label>
        <input type="password" name="confirmation_mot_de_passe" required>
        <input type="submit" name="modifier_mot_de_passe" value="Modifier le mot de passe">
    </form>


    <p>Email :
        <?php echo $accountInfo['UTI_EMAIL']; ?>
    </p>
    <p>Prénom :
        <?php echo $accountInfo['UTI_PRENOM']; ?>
    </p>
    <p>Nom :
        <?php echo $accountInfo['UTI_NOM']; ?>
    </p>
    <p>Date d'inscription :
        <?php echo $accountInfo['UTI_DATE_INSCRIPTION']; ?>
    </p>


    <form method="post" action="/index.php?action=supprimer_compte">
        <input type="submit" name="delete" value="Supprimer le compte"
            onclick="return confirm('Confirmez la suppression de votre compte.');">
    </form>

    <a href="/index.php?action=voir_recettes_compte">voir vos recettes</a>

<?php
$content = ob_get_clean();
$titre = 'Compte';
require $GLOBALS['root'] . 'view/template.php';
?>