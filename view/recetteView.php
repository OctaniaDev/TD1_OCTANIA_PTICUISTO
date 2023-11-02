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
                    echo '<li><h2><a href="./index.php?action=voir_recettes&rec_id='.$recette['REC_ID'].'">'.$recette['REC_TITRE'].'</a></h2>';
                    echo '<p>'.$recette['CAT_INTITULE'].'</p>';
                    echo '<p>'.$recette['REC_RESUME'].'</p></li>';
                }
            echo '</ul>';
        } else
            echo '<p>Aucune recette trouvée</p>';
    ?>
</body>
</html>
