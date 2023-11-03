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
    echo '<p>Liste ingredients :</p>';
    if(isset($ingredient)) {
        echo '<ul>';
        foreach ($ingredients as $ingredient)
            echo '<li><p>'.$ingredient['ING_INTITULE'].'</p></li>';
        echo '</ul>';
    } else
        echo "<p>pas d'ingredients (à faire)</p>";
    
    if($_SESSION['connecter'] == 'oui') {
        echo '<form method="post" action="./index.php?action=voir_recettes&rec_id='.$recette['REC_ID'].'">';
?>
    
        <p><label for="commentaire-input">Postez votre commentaire</label></p>
        <textarea rows="4" cols="50" id="commentaire-input" name="texte_commentaire"></textarea>
        <input type="submit" value="Poster">
        </form>
<?php
    }
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
