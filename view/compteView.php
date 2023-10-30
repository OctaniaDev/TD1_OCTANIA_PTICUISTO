<!DOCTYPE html>
<html>
<head>
    <title>Compte</title>
</head>
<body>
    <form method="post" action="?action=supprimer_compte">
        <h1>Supprimer le compte</h1>
        <p>Êtes-vous sûr de vouloir supprimer votre compte ?</p>
        <input type="submit" name="delete" value="Supprimer le compte" onclick="return confirm('Confirmez la suppression de votre compte.');">
    </form>
</body>
</html>
