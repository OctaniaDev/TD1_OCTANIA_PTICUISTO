<!DOCTYPE html>
<html>
<head>
    <title>Liste des recettes</title>
</head>
<body>
    <h1>Liste des recettes</h1>
    <?php if (!empty($recettes)): ?>
        <ul>
            <?php foreach ($recettes as $recette): ?>
                <li>
                    <p><?php echo $recette['REC_TITRE']; ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Aucune recette trouvée</p>
    <?php endif; ?>
</body>
</html>
