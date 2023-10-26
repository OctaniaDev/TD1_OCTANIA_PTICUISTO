<!DOCTYPE html>
<html>
<head>
    <title>Liste des recettes</title>
</head>
<body>
    <h1>Liste des recettes</h1>
    <?php
        if (!empty($recettes)) {
            echo '<ul>';
                foreach ($recettes as $recette) {
                    echo '<li><p>'.$recette['REC_TITRE'].'</p><a href="./index.php?action=voir_recettes&rec_id='
                    .$recette['REC_ID'].
                    '">voir la recette</a></li>';
                }
            echo '</ul>';
        } else
            echo '<p>Aucune recette trouvée</p>';
    ?>
</body>
</html>
