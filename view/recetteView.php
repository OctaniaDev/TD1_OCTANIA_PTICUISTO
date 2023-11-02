<!DOCTYPE html>
<html>
<head>
    <title>Liste des recettes</title>
</head>
<body>
    <h1>Liste des recettes</h1>
    <?php
        echo 'count : '.count($recettes);
        echo 'post : '.$_POST['nombre_recette'];
        if (!empty($recettes)) {
            echo '<ul>';
            for($i = 0; $i < $_POST['nombre_recette']; $i++) {
                if($i < count($recettes) + 1) {
                echo '<li><h2><a href="./index.php?action=voir_recettes&rec_id='.$recettes[$i]['REC_ID'].'">'.$recettes[$i]['REC_TITRE'].'</a></h2>';
                echo '<p>'.$recettes[$i]['CAT_INTITULE'].'</p>';
                echo '<p>'.$recettes[$i]['REC_RESUME'].'</p></li>';
                }
            }
            echo '</ul>';
        } else
            echo '<p>Aucune recette trouvée</p>';
    ?>
    <form method="post" action="./index.php?action=voir_recettes">
        <input type="submit" name="nombre_recette" value="">
    </form>
</body>
</html>
