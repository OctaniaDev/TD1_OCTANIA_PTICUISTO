<!DOCTYPE html>
<html>
<head>
    <title>Liste des recettes</title>
</head>
<body>
    <?php
        if (!empty($recetteDetail)) {
            foreach ($recetteDetail as $recette) {
                echo '<h1>'.$recette['REC_TITRE'].'</h1>';
                echo '<p>date de creation : '.$recette['REC_DATE_CREATION'].'</p>';
                echo '<p>'.$recette['REC_CONTENU'].'</p>';
            }
            echo '<p>Liste ingredients :</p><ul>';
                foreach ($ingredients as $ingredient) {
                    echo '<li><p>'.$ingredient['ING_INTITULE'].'</p></li>';
                }
            echo '</ul>';
            
        } else
            echo '<p>Aucune recette trouvée</p>';
    ?>
</body>
</html>
