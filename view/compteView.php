<!DOCTYPE html>
<html>

<head>
    <title>Compte</title>
</head>

<body>

<h1>Informations du compte</h1>
        <p>Pseudo : <?php echo $accountInfo['UTI_PSEUDO']; ?></p>
        <p>Email : <?php echo $accountInfo['UTI_EMAIL']; ?></p>

    <!--
    <form method="post" action="?action=modifier_mot_de_passe">
        <h1>Modifier le mot de passe</h1>
        <label for="nouveau_mot_de_passe">Nouveau mot de passe :</label>
        <input type="password" name="nouveau_mot_de_passe" required>
        <label for="confirmation_mot_de_passe">Confirmer le nouveau mot de passe :</label>
        <input type="password" name="confirmation_mot_de_passe" required>
        <input type="submit" name="modifier_mot_de_passe" value="Modifier le mot de passe">
    </form>

    <form method="post" action="?action=supprimer_compte">
        <h2>Supprimer le compte</h2>
        <p>Êtes-vous sûr de vouloir supprimer votre compte ?</p>
        <input type="submit" name="delete" value="Supprimer le compte"
            onclick="return confirm('Confirmez la suppression de votre compte.');">
    </form>-->
</body>

</html>