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
            if(isset($ingredient)) {
                foreach ($ingredients as $ingredient)
                    echo '<li><p>'.$ingredient['ING_INTITULE'].'</p></li>';
            } else
                echo "pas d'ingredients (à faire)";
            echo '</ul>';
            echo '<p>Commentaires : </p>';
            if(isset($commentaires)) {
                echo '<div>';
                foreach ($commentaires as $commentaire){
                    echo '<div><h4>'.$commentaire['UTI_PSEUDO'].'</h4>';
                    if($commentaire['COM_STATUS'] != 1)
                        echo '<p>en attente</p>';
                    echo '<p>'.$commentaire['COM_COMMENTAIRE'].'</p></div>';
                }
                echo '</div>';
            }
        } else
            echo '<p>Aucune recette trouvée</p>';
    ?>
</body>
</html>
